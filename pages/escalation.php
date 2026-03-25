<?php
/**
 * Grievance Escalation - Gretex | Complaints and Redressals
 * Escalation matrix contact information by level.
 */

$pageTitle = 'Grievance Escalation - Gretex | Indian Equity Market Leader';
$pageStyles = '
/* Grievance Escalation Page */
.escalation-page {
    margin-top: 80px;
    min-height: 100vh;
    background: #f4f8fb;
    position: relative;
    overflow: hidden;
}
.escalation-page::before {
    content: "";
    position: absolute;
    top: 0;
    right: 0;
    // width: 40%;
    // height: 50%;
    background: linear-gradient(135deg, rgba(0, 51, 102, 0.06) 0%, transparent 50%),
                linear-gradient(225deg, rgba(0, 51, 102, 0.04) 0%, transparent 50%);
    pointer-events: none;
}
.escalation-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 3rem 2rem 4rem;
    position: relative;
    z-index: 1;
}
.escalation-label {
    font-size: 0.75rem;
    font-weight: 700;
    letter-spacing: 0.12em;
    text-transform: uppercase;
    color: #c9302c;
    margin-bottom: 0.5rem;
    font-family: "Inter", sans-serif;
}
.escalation-title {
    font-size: 2.25rem;
    font-weight: 800;
    color: #1a1a1a;
    margin-bottom: 2.5rem;
    font-family: "Inter", sans-serif;
}
.escalation-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 1.5rem;
}
.escalation-card {
    background: #fff;
    border-radius: 12px;
    padding: 1.5rem 1.75rem;
    box-shadow: 0 2px 12px rgba(0, 0, 0, 0.06);
    border: 1px solid rgba(0, 51, 102, 0.08);
}
.escalation-card-title {
    font-size: 1.1rem;
    font-weight: 700;
    color: #003366;
    margin-bottom: 1rem;
    padding-bottom: 0.75rem;
    border-bottom: 1px solid #e8ecef;
    font-family: "Inter", sans-serif;
}
.escalation-card-list {
    list-style: none;
    padding: 0;
    margin: 0;
}
.escalation-card-list li {
    display: flex;
    align-items: flex-start;
    gap: 0.75rem;
    margin-bottom: 0.85rem;
    font-size: 0.9rem;
    color: #333;
    line-height: 1.5;
}
.escalation-card-list li:last-child {
    margin-bottom: 0;
}
.escalation-card-list .icon-wrap {
    flex-shrink: 0;
    width: 20px;
    height: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #6c757d;
}
.escalation-card-list .icon-wrap svg {
    width: 18px;
    height: 18px;
}
.escalation-download {
    margin-top: 2rem;
    text-align: center;
}
.escalation-download a {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.6rem 1.25rem;
    background: #003366;
    color: #fff;
    text-decoration: none;
    border-radius: 8px;
    font-weight: 600;
    font-size: 0.9rem;
    transition: background 0.2s;
}
.escalation-download a:hover {
    background: #002244;
}
@media (max-width: 768px) {
    .escalation-grid {
        grid-template-columns: 1fr;
    }
    .escalation-title {
        font-size: 1.75rem;
    }
}
';

require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/navbar.php';

// Escalation levels – update names, address, phone, email, hours as per your matrix
$levels = [
    [
        'title' => 'Level 1: Customer care / Complaints',
        'name' => 'Customer Care Team',
        'address' => 'Naman Midtown, A wing, Unit 401, Fl No. 616, Tulsi Pipe Road, Dr. Ambedkar Nagar Santacruz Bapat Marg, Dadar West, Mumbai-400013',
        'phone' => '022-69006500 / 501',
        'email' => 'support@gretexbroking.com',
        'hours' => '9:00 a.m. to 6:00 p.m. (All trading days)',
    ],
    [
        'title' => 'Level 2: Head of Customer Service',
        'name' => 'Head of Customer Service',
        'address' => 'Office No. 1720, 17th Floor, B wing, One BKC, Plot No C-66, G Block, Bandra Kurla Complex, Bandra East, Mumbai 400051',
        'phone' => '022-69006500',
        'email' => 'support@gretexbroking.com',
        'hours' => '9:00 a.m. to 6:00 p.m. (All trading days)',
    ],
    [
        'title' => 'Level 3: Compliance Officer',
        'name' => 'Compliance Officer',
        'address' => 'Naman Midtown, A wing, Unit 401, Tulsi Pipe Road, Dadar West, Mumbai-400013',
        'phone' => '022-69006500',
        'email' => 'compliance@gretexbroking.com',
        'hours' => '9:00 a.m. to 6:00 p.m. (All trading days)',
    ],
    [
        'title' => 'Level 4: CEO',
        'name' => 'Chief Executive Officer',
        'address' => 'Naman Midtown, A wing, Unit 401, Tulsi Pipe Road, Dadar West, Mumbai-400013',
        'phone' => '022-69006500',
        'email' => 'investor.grievances@gretexbroking.com',
        'hours' => '9:00 a.m. to 6:00 p.m. (All trading days)',
    ],
];
?>

<main class="escalation-page">
    <div class="escalation-container">
        <p class="escalation-label">Complaints and Redressals</p>
        <h1 class="escalation-title">Grievance Escalation</h1>

        <div class="escalation-grid">
            <?php foreach ($levels as $level): ?>
            <article class="escalation-card">
                <h2 class="escalation-card-title"><?php echo htmlspecialchars($level['title']); ?></h2>
                <ul class="escalation-card-list">
                    <li>
                        <span class="icon-wrap" aria-hidden="true"><i data-lucide="user" stroke-width="1.8"></i></span>
                        <span><?php echo htmlspecialchars($level['name']); ?></span>
                    </li>
                    <li>
                        <span class="icon-wrap" aria-hidden="true"><i data-lucide="map-pin" stroke-width="1.8"></i></span>
                        <span><?php echo nl2br(htmlspecialchars($level['address'])); ?></span>
                    </li>
                    <li>
                        <span class="icon-wrap" aria-hidden="true"><i data-lucide="phone" stroke-width="1.8"></i></span>
                        <a href="tel:<?php echo preg_replace('/\s+/', '', $level['phone']); ?>"><?php echo htmlspecialchars($level['phone']); ?></a>
                    </li>
                    <li>
                        <span class="icon-wrap" aria-hidden="true"><i data-lucide="mail" stroke-width="1.8"></i></span>
                        <a href="mailto:<?php echo htmlspecialchars($level['email']); ?>"><?php echo htmlspecialchars($level['email']); ?></a>
                    </li>
                    <li>
                        <span class="icon-wrap" aria-hidden="true"><i data-lucide="clock" stroke-width="1.8"></i></span>
                        <span><?php echo htmlspecialchars($level['hours']); ?></span>
                    </li>
                </ul>
            </article>
            <?php endforeach; ?>
        </div>

        <!-- <div class="escalation-download">
            <a href="<?php echo $assetPath; ?>assets/documents/2025-08-04 Escalation Matrix-3.pdf" target="_blank" rel="noopener noreferrer">
                <i data-lucide="file-down" width="18" height="18"></i>
                Download Escalation Matrix (PDF)
            </a>
        </div> -->
    </div>
</main>

<script>
document.addEventListener('DOMContentLoaded', function() {
    if (typeof lucide !== 'undefined') lucide.createIcons();
});
</script>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
