<?php
/**
 * Contact Us - Gretex | Indian Equity Market Leader
 * Gretex Share Broking Limited
 */

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

// Page configuration
$pageTitle = 'Contact Us - Gretex | Indian Equity Market Leader';
$additionalCSS = [
    '../css/contact.css',
    [
        'href' => 'https://unpkg.com/leaflet@1.9.4/dist/leaflet.css',
        'integrity' => 'sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=',
        'crossorigin' => ''
    ]
];

$additionalScripts = [
    'https://unpkg.com/leaflet@1.9.4/dist/leaflet.js',
];

// Include header
require_once '../includes/header.php';
require_once '../includes/navbar.php';
?>



    <!-- Navigation -->

    <!-- Contact Hero Section -->
    <section class="contact-hero-section">
        <div class="grid-background"></div>
        <div class="contact-hero-content">
            <h1 class="contact-hero-title">CONTACT US</h1>
        </div>
    </section>

    <!-- Contact Main Section -->
    <section class="contact-main-section">
        <div class="contact-main-container">
            <div class="contact-main-content">
                <!-- Contact Details Panel -->
                <div class="contact-details-panel">
                    <h2>CONTACT DETAILS</h2>

                    <div class="contact-detail-item">
                        <div class="contact-detail-icon">
                            <i data-lucide="map-pin"></i>
                        </div>
                        <div class="contact-detail-content">
                            <p><strong>Naman Midtown, A wing</strong><br>
                                Unit 401, FP No. 616, Tulsi Pipe Road<br>
                                Dr. Ambedkar Nagar, Senapati Bapat Marg,<br>
                                Behind Kamgar Kala Kendra, Prabhadevi,<br>
                                Mumbai, Maharashtra 400013</p>
                        </div>
                    </div>

                    <div class="contact-detail-item">
                        <div class="contact-detail-icon">
                            <i data-lucide="phone"></i>
                        </div>
                        <div class="contact-detail-content">
                            <p><strong>(022) 69308500 / 501</strong></p>
                        </div>
                    </div>

                    <div class="contact-detail-item">
                        <div class="contact-detail-icon">
                            <i data-lucide="mail"></i>
                        </div>
                        <div class="contact-detail-content">
                            <p><a href="mailto:support@gretexbroking.com">support@gretexbroking.com</a><br>
                                <a
                                    href="mailto:investor.grievances@gretexbroking.com">investor.grievances@gretexbroking.com
                                </a>
                            </p>
                        </div>
                    </div>

                    <div class="contact-detail-item">
                        <div class="contact-detail-icon">
                            <i data-lucide="user"></i>
                        </div>
                        <div class="contact-detail-content">
                            <button type="button" class="authorized-person-trigger" id="authorizedPersonTrigger" aria-haspopup="dialog" aria-controls="authorizedPersonModal">
                                <strong>Authorized Person details</strong>
                            </button>
                        </div>
                    </div>

                    <div class="social-cta" aria-label="Gretex social media links">
                        <div class="facebook">
                            <a href="https://www.facebook.com/GretexCorporate/" target="_blank" rel="noopener noreferrer" aria-label="Facebook">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                    <path fill="#fff" d="M22 12c0-5.52-4.48-10-10-10S2 6.48 2 12c0 4.84 3.44 8.87 8 9.8V15H8v-3h2V9.5C10 7.57 11.57 6 13.5 6H16v3h-2c-.55 0-1 .45-1 1v2h3v3h-3v6.95c5.05-.5 9-4.76 9-9.95"></path>
                                </svg>
                            </a>
                        </div>
                        <div class="instagram">
                            <a href="https://www.instagram.com/gretex_corporate_services/" target="_blank" rel="noopener noreferrer" aria-label="Instagram">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                    <g fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" color="#fff">
                                        <path d="M2.5 12c0-4.478 0-6.718 1.391-8.109S7.521 2.5 12 2.5c4.478 0 6.718 0 8.109 1.391S21.5 7.521 21.5 12c0 4.478 0 6.718-1.391 8.109S16.479 21.5 12 21.5c-4.478 0-6.718 0-8.109-1.391S2.5 16.479 2.5 12"></path>
                                        <path d="M16.5 12a4.5 4.5 0 1 1-9 0a4.5 4.5 0 0 1 9 0m1.008-5.5h-.01"></path>
                                    </g>
                                </svg>
                            </a>
                        </div>
                        <div class="twitter">
                            <a href="https://twitter.com/gretexl?lang=en" target="_blank" rel="noopener noreferrer" aria-label="Twitter">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 14 14">
                                    <g fill="none">
                                        <g clip-path="url(#primeTwitter0)">
                                            <path fill="#fff" d="M11.025.656h2.147L8.482 6.03L14 13.344H9.68L6.294 8.909l-3.87 4.435H.275l5.016-5.75L0 .657h4.43L7.486 4.71zm-.755 11.4h1.19L3.78 1.877H2.504z"></path>
                                        </g>
                                        <defs>
                                            <clipPath id="primeTwitter0">
                                                <path fill="#fff" d="M0 0h14v14H0z"></path>
                                            </clipPath>
                                        </defs>
                                    </g>
                                </svg>
                            </a>
                        </div>
                        <div class="linkedin">
                            <a href="https://www.linkedin.com/company/gretex-corporate-services-limited/posts/?feedView=all" target="_blank" rel="noopener noreferrer" aria-label="LinkedIn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                    <path fill="#fff" d="M19 3a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2zm-.5 15.5v-5.3a3.26 3.26 0 0 0-3.26-3.26c-.85 0-1.84.52-2.32 1.3v-1.11h-2.79v8.37h2.79v-4.93c0-.77.62-1.4 1.39-1.4a1.4 1.4 0 0 1 1.4 1.4v4.93zM6.88 8.56a1.68 1.68 0 0 0 1.68-1.68c0-.93-.75-1.69-1.68-1.69a1.69 1.69 0 0 0-1.69 1.69c0 .93.76 1.68 1.69 1.68m1.39 9.94v-8.37H5.5v8.37z"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Enquiry Form Panel -->
                <div class="enquiry-form-panel">
                    <h2>ENQUIRY FORM</h2>
                    <div id="formMessage"></div>
                    <form class="enquiry-form" id="enquiryForm" method="POST" action="process-enquiry.php" novalidate>
                        <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($_SESSION['csrf_token'], ENT_QUOTES, 'UTF-8'); ?>">
                        <input type="text" name="website" value="" tabindex="-1" autocomplete="off" aria-hidden="true" style="position:absolute;left:-9999px;opacity:0;">
                        <div class="form-group" data-field="name">
                            <label for="name">NAME :<span class="required-mark">*</span></label>
                            <input type="text" id="name" name="name" placeholder="Enter full name">
                            <span class="field-error" id="error-name" aria-live="polite"></span>
                        </div>

                        <div class="form-group" data-field="email">
                            <label for="email">EMAIL ADDRESS :<span class="required-mark">*</span></label>
                            <input type="email" id="email" name="email" placeholder="Enter email address">
                            <span class="field-error" id="error-email" aria-live="polite"></span>
                        </div>

                        <div class="form-group" data-field="mobile">
                            <label for="mobile">MOBILE NUMBER :<span class="required-mark">*</span></label>
                            <input type="tel" id="mobile" name="mobile" placeholder="Enter mobile number (10 digits)" maxlength="10" inputmode="numeric" autocomplete="tel" pattern="[0-9]*">
                            <span class="field-error" id="error-mobile" aria-live="polite"></span>
                        </div>

                        <div class="form-group" data-field="message">
                            <label for="message">MESSAGE :</label>
                            <textarea id="message" name="message" placeholder="Enter message"></textarea>
                            <span class="field-error" id="error-message" aria-live="polite"></span>
                        </div>

                        <button type="submit" class="form-submit-btn" id="submitBtn">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Authorized Person Details Modal -->
    <div class="ap-modal" id="authorizedPersonModal" aria-hidden="true">
        <div class="ap-modal__overlay" data-ap-modal-close></div>
        <div class="ap-modal__dialog" role="dialog" aria-modal="true" aria-labelledby="authorizedPersonModalTitle" tabindex="-1">
            <button type="button" class="ap-modal__close" aria-label="Close" data-ap-modal-close>&times;</button>
            <h3 class="ap-modal__title" id="authorizedPersonModalTitle">Authorized Person Details</h3>
            <div class="ap-modal__body">
                <div class="ap-modal__table-wrap">
                    <table class="ap-modal__table">
                        <thead>
                            <tr>
                                <th>A.P Name</th>
                                <th>Registered in</th>
                                <th>Address</th>
                                <th>Contact name</th>
                                <th>Contact no</th>
                                <th>Contact email</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Citizen Teamworks Private Limited</td>
                                <td>BSE &amp; NSE</td>
                                <td>Office No.F-19, 1st Floor, Shah Arcade (S.R.A) CHSL, Rani Sati Marg, Malad (East), Mumbai - 400 097</td>
                                <td>Mr. Vivek Vishnu Bait</td>
                                <td>97026 46326</td>
                                <td>citizenteamworks23@gmail.com</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Map Section -->
    <section class="map-section">
        <div class="map-wrapper-new">
            <div class="map-content">
                <div class="map-info-side">
                    <div class="map-info-content">
                        <span class="location-badge">Our Location</span>
                        <h2>Visit Our Office</h2>
                        <h3>Naman Midtown Office</h3>
                        <div class="address-block">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/>
                                <circle cx="12" cy="10" r="3"/>
                            </svg>
                            <div>
                                <p>A 401, 4th Floor, Naman Midtown</p>
                                <p>Senapati Bapat Marg, Delisle Rd</p>
                                <p>Near Indiabulls, Dadar West</p>
                                <p>Mumbai, Maharashtra 400013</p>
                            </div>
                        </div>
                        <a href="https://www.google.com/maps/dir/?api=1&destination=19.010429541058436,72.83628702126015" 
                           target="_blank" 
                           class="get-directions-btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M3 11l19-9-9 19-2-8-8-2z"/>
                            </svg>
                            Get Directions
                        </a>
                    </div>
                </div>
                <div class="map-display">
                    <div id="office-map"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->

    <script>
        // Map initialization
        function initLeafletMap() {
            if (typeof L === 'undefined') return;
            const map = L.map('office-map').setView([19.010429541058436, 72.83628702126015], 17);
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', { 
                maxZoom: 19,
                attribution: '© OpenStreetMap contributors'
            }).addTo(map);
            
            const marker = L.marker([19.010429541058436, 72.83628702126015]).addTo(map);
            marker.bindPopup(`
                <div style="text-align: center; padding: 8px;">
                    <b style="font-size: 14px;">Gretex Share Broking Limited</b><br>
                    <span style="font-size: 12px;">A 401, 4th Floor, Naman Midtown<br>Senapati Bapat Marg, Dadar West<br>Mumbai-400013</span>
                </div>
            `).openPopup();
        }
        
        function waitForLeaflet() {
            let attempts = 0;
            function check() {
                if (typeof L !== 'undefined') { try { initLeafletMap(); } catch(e) { console.error(e); } }
                else if (attempts++ < 50) setTimeout(check, 100);
            }
            check();
        }
        
        setTimeout(waitForLeaflet, 500);
        
        // Form handler with AJAX
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('enquiryForm');
            const submitBtn = document.getElementById('submitBtn');
            const formMessage = document.getElementById('formMessage');
            const fieldNames = ['name', 'email', 'mobile', 'message'];
            const apTrigger = document.getElementById('authorizedPersonTrigger');
            const apModal = document.getElementById('authorizedPersonModal');
            const apDialog = apModal ? apModal.querySelector('.ap-modal__dialog') : null;
            let apLastFocused = null;
            let messageHideTimer = null;

            function showTempMessage(html, durationMs = 4200) {
                if (!formMessage) return;

                // Stop any previous hide
                if (messageHideTimer) {
                    clearTimeout(messageHideTimer);
                    messageHideTimer = null;
                }

                formMessage.style.opacity = '1';
                formMessage.style.transition = 'opacity 0.35s ease';
                formMessage.innerHTML = html;

                messageHideTimer = setTimeout(function() {
                    formMessage.style.opacity = '0';
                    setTimeout(function() {
                        // Clear after fade
                        formMessage.innerHTML = '';
                        formMessage.style.opacity = '1';
                    }, 360);
                    messageHideTimer = null;
                }, durationMs);
            }

            function clearFieldErrors() {
                fieldNames.forEach(function(field) {
                    const el = document.getElementById('error-' + field);
                    const group = form.querySelector('.form-group[data-field="' + field + '"]');
                    if (el) { el.textContent = ''; }
                    if (group) { group.classList.remove('has-error'); }
                });
            }

            function showFieldErrors(errors) {
                clearFieldErrors();
                if (errors && typeof errors === 'object') {
                    Object.keys(errors).forEach(function(field) {
                        const el = document.getElementById('error-' + field);
                        const group = form.querySelector('.form-group[data-field="' + field + '"]');
                        if (el && group) {
                            el.textContent = errors[field];
                            group.classList.add('has-error');
                        }
                    });
                }
            }

            function validateForm() {
                var errors = {};
                var nameVal = (document.getElementById('name').value || '').trim();
                var emailVal = (document.getElementById('email').value || '').trim();
                var mobileVal = (document.getElementById('mobile').value || '').trim();

                if (!nameVal) {
                    errors.name = 'Please fill in this field.';
                } else if (nameVal.length < 2) {
                    errors.name = 'Name must be at least 2 characters.';
                }
                if (!emailVal) {
                    errors.email = 'Please fill in this field.';
                } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(emailVal)) {
                    errors.email = 'Please enter a valid email address.';
                }
                if (!mobileVal) {
                    errors.mobile = 'Please fill in this field.';
                } else if (/[^0-9]/.test(mobileVal)) {
                    errors.mobile = 'Mobile number must contain only numbers.';
                } else if (mobileVal.length !== 10) {
                    errors.mobile = 'Mobile number must be exactly 10 digits.';
                }
                return errors;
            }

            // Mobile field: block/strip non-digits early for better UX
            const mobileInput = document.getElementById('mobile');
            if (mobileInput) {
                mobileInput.addEventListener('input', function() {
                    const before = mobileInput.value || '';
                    const digitsOnly = before.replace(/[^0-9]/g, '');
                    if (before !== digitsOnly) {
                        mobileInput.value = digitsOnly;
                        showFieldErrors({ mobile: 'Mobile number must contain only numbers.' });
                    }
                });
                mobileInput.addEventListener('paste', function() {
                    // allow paste; input handler will sanitize
                    setTimeout(function() {
                        const v = (mobileInput.value || '').replace(/[^0-9]/g, '');
                        mobileInput.value = v;
                    }, 0);
                });
            }

            if (form) {
                form.addEventListener('submit', function(e) {
                    e.preventDefault();

                    // Clear previous messages and field errors
                    formMessage.innerHTML = '';
                    if (messageHideTimer) {
                        clearTimeout(messageHideTimer);
                        messageHideTimer = null;
                    }
                    clearFieldErrors();

                    // Client-side validation (name, email, mobile only - no validation for message)
                    var clientErrors = validateForm();
                    if (Object.keys(clientErrors).length > 0) {
                        showFieldErrors(clientErrors);
                        showTempMessage('<div class="alert alert-error">Please correct the errors below.</div>');
                        var firstError = form.querySelector('.form-group.has-error');
                        if (firstError) firstError.scrollIntoView({ behavior: 'smooth', block: 'center' });
                        return;
                    }

                    // Disable submit button
                    submitBtn.disabled = true;
                    submitBtn.textContent = 'Submitting...';

                    // Get form data
                    const formData = new FormData(form);

                    // Submit via AJAX
                    fetch('process-enquiry.php', {
                        method: 'POST',
                        body: formData
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            showTempMessage('<div class="alert alert-success">' + data.message + '</div>');
                            form.reset();
                            clearFieldErrors();
                        } else {
                            if (data.errors) {
                                showFieldErrors(data.errors);
                            }
                            showTempMessage('<div class="alert alert-error">' + data.message + '</div>');
                        }
                    })
                    .catch(error => {
                        showTempMessage('<div class="alert alert-error">Sorry, there was an error. Please try again later.</div>');
                        console.error('Error:', error);
                    })
                    .finally(() => {
                        submitBtn.disabled = false;
                        submitBtn.textContent = 'Submit';

                        // Scroll to first error or message
                        const firstError = form.querySelector('.form-group.has-error');
                        if (firstError) {
                            firstError.scrollIntoView({ behavior: 'smooth', block: 'center' });
                        } else {
                            formMessage.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
                        }
                    });
                });
            }

            // Authorized person modal
            function apSetOpen(isOpen) {
                if (!apModal || !apDialog) return;
                if (isOpen) {
                    apLastFocused = document.activeElement;
                    apModal.setAttribute('data-open', 'true');
                    apModal.setAttribute('aria-hidden', 'false');
                    document.body.classList.add('ap-modal-open');
                    apDialog.focus();
                } else {
                    apModal.removeAttribute('data-open');
                    apModal.setAttribute('aria-hidden', 'true');
                    document.body.classList.remove('ap-modal-open');
                    if (apLastFocused && typeof apLastFocused.focus === 'function') {
                        apLastFocused.focus();
                    } else if (apTrigger && typeof apTrigger.focus === 'function') {
                        apTrigger.focus();
                    }
                }
            }

            if (apTrigger && apModal) {
                apTrigger.addEventListener('click', function() {
                    apSetOpen(true);
                });

                apModal.addEventListener('click', function(e) {
                    const target = e.target;
                    if (target && target.closest && target.closest('[data-ap-modal-close]')) {
                        apSetOpen(false);
                    }
                });

                document.addEventListener('keydown', function(e) {
                    if (!apModal.hasAttribute('data-open')) return;
                    if (e.key === 'Escape') {
                        e.preventDefault();
                        apSetOpen(false);
                        return;
                    }
                    if (e.key === 'Tab') {
                        const focusable = apModal.querySelectorAll('button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])');
                        if (!focusable.length) return;
                        const first = focusable[0];
                        const last = focusable[focusable.length - 1];
                        if (e.shiftKey && document.activeElement === first) {
                            e.preventDefault();
                            last.focus();
                        } else if (!e.shiftKey && document.activeElement === last) {
                            e.preventDefault();
                            first.focus();
                        }
                    }
                });
            }
        });
        
        // Initialize Lucide icons
        if (typeof lucide !== 'undefined') {
            lucide.createIcons();
        }
    </script>


<?php
// Include footer
require_once '../includes/footer.php';
?>

