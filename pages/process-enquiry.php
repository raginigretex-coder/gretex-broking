<?php
/**
 * Process Enquiry Form Submission
 * Gretex Share Broking Limited
 */

// Start session for flash messages
session_start();

// Include database and mail configuration
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../config/mail.php';
require_once __DIR__ . '/../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception as PHPMailerException;

function mail_log_line(string $line): void
{
    $entry = '[' . date('Y-m-d H:i:s') . '] ' . $line . PHP_EOL;
    if (defined('MAIL_LOG_PATH') && MAIL_LOG_PATH) {
        $dir = dirname(MAIL_LOG_PATH);
        if (!is_dir($dir)) {
            @mkdir($dir, 0775, true);
        }
        $bytes = @file_put_contents(MAIL_LOG_PATH, $entry, FILE_APPEND);
        if ($bytes !== false) {
            return;
        }
    }
    error_log($entry);
}

function e(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

function build_enquiry_email_html(array $data): string
{
    $brandName = defined('MAIL_FROM_NAME') ? MAIL_FROM_NAME : 'Website';
    $subject = $data['subject'] ?? 'New enquiry received';
    $preheader = $data['preheader'] ?? 'A new enquiry was submitted on your website.';
    $logoCid = $data['logoCid'] ?? null;
    $enquiryId = $data['enquiryId'] ?? '';
    $name = $data['name'] ?? '';
    $email = $data['email'] ?? '';
    $mobile = $data['mobile'] ?? '';
    $message = $data['message'] ?? '';
    // $submittedAt = $data['submittedAt'] ?? '';

    $messageSafe = trim((string) $message) !== '' ? nl2br(e((string) $message)) : '<span class="email-msg-empty">(No message)</span>';

    $cssPath = __DIR__ . '/../css/email-enquiry.css';
    $emailCss = (is_file($cssPath)) ? file_get_contents($cssPath) : '';
    if (!is_string($emailCss)) {
        $emailCss = '';
    }

    $mailto = 'mailto:' . rawurlencode((string) $email);
    $telHref = 'tel:' . preg_replace('/[^0-9+]/', '', (string) $mobile);
    $logoHtml = '';
    if (is_string($logoCid) && $logoCid !== '') {
        $logoHtml = '<img src="cid:' . e($logoCid) . '" width="120" alt="' . e($brandName) . '" style="display:block;border:0;outline:none;text-decoration:none;height:auto;max-width:100%;">';
    }

    return '<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="x-apple-disable-message-reformatting">
    <title>' . e($subject) . '</title>
    <style>' . $emailCss . '</style>
  </head>
  <body class="email-body email-wrap">
    <div class="email-preheader">' . e($preheader) . '</div>
    <table role="presentation" cellpadding="0" cellspacing="0" border="0" width="100%" class="email-outer-table">
      <tr>
        <td align="center" class="email-inner-cell">
          <table role="presentation" cellpadding="0" cellspacing="0" border="0" width="640" class="email-container">
            <tr>
              <td>
                <table role="presentation" cellpadding="0" cellspacing="0" border="0" width="100%" class="email-surface">
                  <tr>
                    <td class="email-hero email-font">
                      ' . ($logoHtml !== '' ? ('<div style="margin-bottom:10px;">' . $logoHtml . '</div>') : '') . '
                      <div class="email-hero-top">' . e($brandName) . '</div>
                      <div class="email-hero-title">New enquiry received</div>
                      <div class="email-badge">Enquiry #' . e((string) $enquiryId) . '</div>
                    </td>
                  </tr>

                  <tr>
                    <td class="email-px" style="padding-top:18px;">
                      <table role="presentation" cellpadding="0" cellspacing="0" border="0" width="100%" class="email-card">
                        <tr>
                          <td class="email-cardpad">
                            <div class="email-font email-section-title">Contact details</div>
                            <table role="presentation" cellpadding="0" cellspacing="0" border="0" width="100%">
                              <tr>
                                <td class="email-font email-field-label">Name</td>
                                <td class="email-font email-field-value">' . e((string) $name) . '</td>
                              </tr>
                              <tr>
                                <td class="email-font email-field-label">Email</td>
                                <td class="email-font email-field-value"><a href="' . e((string) $mailto) . '">' . e((string) $email) . '</a></td>
                              </tr>
                              <tr>
                                <td class="email-font email-field-label">Mobile</td>
                                <td class="email-font email-field-value"><a href="' . e((string) $telHref) . '">' . e((string) $mobile) . '</a></td>
                              </tr>
                            </table>

                            <div class="email-divider"></div>

                            <div class="email-font email-section-title" style="margin-top:16px;">Message</div>
                            <div class="email-font email-message-box">' . $messageSafe . '</div>

                            <div class="email-actions">
                              <table role="presentation" cellpadding="0" cellspacing="0" border="0">
                                <tr>
                                  <td>
                                    <a class="email-btn email-btn-primary" href="' . e((string) $mailto) . '">Reply by email</a>
                                  </td>
                                  <td class="email-actions-spacer"></td>
                                </tr>
                              </table>
                            </div>
                          </td>
                        </tr>
                      </table>
                    </td>
                  </tr>

                  <tr>
                    <td class="email-px email-footer">
                      <div class="email-font">This message was generated automatically from your website enquiry form.</div>
                    </td>
                  </tr>
                </table>
              </td>
            </tr>
          </table>
        </td>
      </tr>
    </table>
  </body>
</html>';
}

// Set content type to JSON
header('Content-Type: application/json');

// Only allow POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Method not allowed']);
    exit;
}

// Basic bot protection: hidden honeypot should stay empty.
$website = isset($_POST['website']) ? trim((string) $_POST['website']) : '';
if ($website !== '') {
    http_response_code(200);
    echo json_encode(['success' => true, 'message' => 'Thank you.']);
    exit;
}

// CSRF protection
$csrfToken = isset($_POST['csrf_token']) ? (string) $_POST['csrf_token'] : '';
$sessionToken = isset($_SESSION['csrf_token']) ? (string) $_SESSION['csrf_token'] : '';
if ($csrfToken === '' || $sessionToken === '' || !hash_equals($sessionToken, $csrfToken)) {
    http_response_code(403);
    echo json_encode(['success' => false, 'message' => 'Invalid request. Please refresh and try again.']);
    exit;
}

// Simple session-level throttle to reduce spam bursts.
$now = time();
$lastSubmitAt = isset($_SESSION['last_enquiry_submit_at']) ? (int) $_SESSION['last_enquiry_submit_at'] : 0;
if ($lastSubmitAt > 0 && ($now - $lastSubmitAt) < 3) {
    http_response_code(429);
    echo json_encode(['success' => false, 'message' => 'Please wait a few seconds before submitting again.']);
    exit;
}
$_SESSION['last_enquiry_submit_at'] = $now;

// Get and sanitize input data
$name = isset($_POST['name']) ? trim($_POST['name']) : '';
$email = isset($_POST['email']) ? trim($_POST['email']) : '';
$mobile = isset($_POST['mobile']) ? trim($_POST['mobile']) : '';
$message = isset($_POST['message']) ? trim($_POST['message']) : '';

// Validation - field-level errors for display below each field
$fieldErrors = [];

if (empty($name)) {
    $fieldErrors['name'] = 'Name is required';
} elseif (strlen($name) < 2) {
    $fieldErrors['name'] = 'Name must be at least 2 characters';
}

if (empty($email)) {
    $fieldErrors['email'] = 'Email is required';
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $fieldErrors['email'] = 'Invalid email format';
}

if (empty($mobile)) {
    $fieldErrors['mobile'] = 'Mobile number is required';
} elseif (preg_match('/[^0-9]/', $mobile)) {
    $fieldErrors['mobile'] = 'Mobile number must contain only numbers';
} elseif (!preg_match('/^[0-9]{10}$/', $mobile)) {
    $fieldErrors['mobile'] = 'Mobile number must be exactly 10 digits';
}

// Message field is optional - no validation

// If there are validation errors, return them with field-level details
if (!empty($fieldErrors)) {
    http_response_code(400);
    echo json_encode([
        'success' => false,
        'message' => 'Please correct the errors below.',
        'errors' => $fieldErrors
    ]);
    exit;
}

// Connect to database
try {
    $conn = getDBConnection();
} catch (RuntimeException $e) {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'message' => 'Sorry, there was an error submitting your enquiry. Please try again later.'
    ]);
    exit;
}

// Prepare and execute insert statement
$stmt = $conn->prepare("INSERT INTO enquiries (name, email, mobile, message, status) VALUES (?, ?, ?, ?, 'new')");
$stmt->bind_param("ssss", $name, $email, $mobile, $message);

if ($stmt->execute()) {
    // Success
    $enquiryId = $conn->insert_id;

    // Send email notification via SMTP (PHPMailer) for reliable delivery
    $emailSent = false;
    $emailError = null;
    if (!defined('MAIL_SMTP_PASS') || MAIL_SMTP_PASS === '') {
        mail_log_line('MAIL: SMTP not configured (missing MAIL_SMTP_PASS). Skipping email send.');
    } else {
        try {
            $mail = new PHPMailer(true);
            $mail->isSMTP();
            mail_log_line('MAIL: Attempt send. enquiryId=' . $enquiryId . ' to=' . ENQUIRY_NOTIFY_EMAIL . ' host=' . MAIL_SMTP_HOST . ' port=' . MAIL_SMTP_PORT . ' secure=' . MAIL_SMTP_SECURE);
            if (defined('MAIL_DEBUG') && MAIL_DEBUG) {
                $mail->SMTPDebug = SMTP::DEBUG_SERVER;
                $mail->Debugoutput = function ($str, $level) {
                    mail_log_line('[PHPMailer:' . $level . '] ' . $str);
                };
            }
            $mail->Host       = MAIL_SMTP_HOST;
            $mail->SMTPAuth   = true;
            $mail->Username   = MAIL_SMTP_USER;
            $mail->Password   = MAIL_SMTP_PASS;
            $mail->SMTPSecure = MAIL_SMTP_SECURE === 'ssl' ? PHPMailer::ENCRYPTION_SMTPS : PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = (int) MAIL_SMTP_PORT;
            $mail->CharSet    = 'UTF-8';

            $mail->setFrom(MAIL_FROM_EMAIL, MAIL_FROM_NAME);
            $mail->addAddress(ENQUIRY_NOTIFY_EMAIL);
            // if (defined('ENQUIRY_NOTIFY_CC_EMAIL') && ENQUIRY_NOTIFY_CC_EMAIL) {
            //     $mail->addCC(ENQUIRY_NOTIFY_CC_EMAIL);
            // }
            $mail->addReplyTo($email, $name);

            $mail->Subject = 'New Enquiry from Gretex Broking Website' ;
            $submittedAt = date('d M Y, h:i A');
            $mail->isHTML(true);

            // Embed logo so it renders without external URLs
            $logoCid = null;
            $logoPath = __DIR__ . '/../images/Gretex.png';
            if (is_file($logoPath)) {
                $logoCid = 'gretex-logo';
                $mail->addEmbeddedImage($logoPath, $logoCid, 'Gretex.png');
            }

            $mail->Body = build_enquiry_email_html([
                'subject' => $mail->Subject,
                'preheader' => 'Enquiry #' . $enquiryId . ' from ' . $name . ' (' . $email . ')',
                'logoCid' => $logoCid,
                'enquiryId' => $enquiryId,
                'name' => $name,
                'email' => $email,
                'mobile' => $mobile,
                'message' => $message,
                'submittedAt' => $submittedAt,
            ]);
            $mail->AltBody = "New enquiry received:\n\n"
                . "Enquiry ID: $enquiryId\n"
                . "Submitted: $submittedAt\n"
                . "Name: $name\n"
                . "Email: $email\n"
                . "Mobile: $mobile\n"
                . "Message:\n" . ($message ?: '(No message)') . "\n";

            $mail->send();
            $emailSent = true;
            mail_log_line('MAIL: Sent OK. enquiryId=' . $enquiryId);
        } catch (PHPMailerException $e) {
            // Log or ignore - enquiry is still saved; don't fail the request
            $emailSent = false;
            $emailError = $e->getMessage();
            mail_log_line('MAIL ERROR: ' . $emailError);
        }
    }

    closeDBConnection($conn);
    
    http_response_code(200);
    echo json_encode([
        'success' => true, 
        'message' => 'Thank you! We have received your enquiry and will get back to you soon.',
        'enquiryId' => $enquiryId,
        'emailSent' => $emailSent
    ]);
} else {
    // Database error
    error_log('Enquiry submit execute failed: ' . ($stmt ? $stmt->error : 'unknown stmt error'));
    closeDBConnection($conn);
    
    http_response_code(500);
    echo json_encode([
        'success' => false, 
        'message' => gt_app_env() === 'local'
            ? 'Database insert failed. Check that the `enquiries` table exists and columns match.'
            : 'Sorry, there was an error submitting your enquiry. Please try again later.'
    ]);
}

$stmt->close();
?>

