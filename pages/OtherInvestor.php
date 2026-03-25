<?php
/**
 * Other Investor Information - Gretex Financial
 * Gretex Share Broking Limited
 */

// Page configuration
$pageTitle = 'Other Investor Information - Gretex Financial';
$additionalCSS = [
    '../css/calculator-page.css',
];

$pageStyles = ".other-investor-page {
            min-height: 100vh;
            background: linear-gradient(180deg, #f5f7fa 0%, #e8f0f5 100%);
            padding: 90px 0 4rem 0;
        }

        .other-investor-hero {
            background: linear-gradient(135deg, #1e5a7d 0%, #2d9c8f 100%);
            padding: 5rem 0;
            position: relative;
            overflow: hidden;
        }

        .other-investor-hero::before {
            content: '''';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image: 
                linear-gradient(rgba(255, 255, 255, 0.1) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255, 255, 255, 0.1) 1px, transparent 1px);
            background-size: 50px 50px;
            opacity: 0.3;
        }

        .other-investor-hero::after {
            content: '''';
            position: absolute;
            top: -50%;
            right: -10%;
            width: 500px;
            height: 500px;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 0%, transparent 70%);
            border-radius: 50%;
            animation: float 20s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translate(0, 0) rotate(0deg); }
            50% { transform: translate(-30px, -30px) rotate(180deg); }
        }

        .other-investor-hero-content {
            position: relative;
            z-index: 2;
            text-align: center;
            color: #ffffff;
        }

        .other-investor-title {
            font-family: ''Inter'', sans-serif;
            font-size: 3.5rem;
            font-weight: 800;
            margin: 0;
            color: #ffffff;
            text-shadow: 0 2px 20px rgba(0, 0, 0, 0.2);
            letter-spacing: -0.02em;
        }

        .other-investor-content {
            padding: 5rem 0;
            background: transparent;
        }

        .other-investor-boxes {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 3rem;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        .other-investor-box {
            background: #ffffff;
            border-radius: 20px;
            padding: 3rem;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08), 0 2px 8px rgba(0, 0, 0, 0.04);
            border: 1px solid rgba(0, 0, 0, 0.05);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
        }

        .other-investor-box::before {
            content: '''';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: linear-gradient(90deg, var(--calc-primary-blue), var(--calc-primary-teal));
            transform: scaleX(0);
            transform-origin: left;
            transition: transform 0.4s ease;
        }

        .other-investor-box:hover::before {
            transform: scaleX(1);
        }

        .other-investor-box:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.12), 0 4px 16px rgba(0, 0, 0, 0.08);
        }

        .other-investor-box-left {
            background: linear-gradient(135deg, #fff5f5 0%, #ffe8e8 100%);
            border-left: 4px solid #ff6b6b;
        }

        .other-investor-box-right {
            background: linear-gradient(135deg, #f0f0ff 0%, #e8e8ff 100%);
            border-left: 4px solid #6b6bff;
        }

        .other-investor-box-title {
            font-family: ''Inter'', sans-serif;
            font-size: 1.75rem;
            font-weight: 700;
            margin: 0 0 2rem 0;
            color: var(--calc-primary-blue);
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .other-investor-box-title::before {
            content: '''';
            width: 4px;
            height: 2rem;
            background: linear-gradient(180deg, var(--calc-primary-blue), var(--calc-primary-teal));
            border-radius: 2px;
        }

        .other-investor-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .other-investor-list-item {
            margin-bottom: 1rem;
        }

        .other-investor-list-item:last-child {
            margin-bottom: 0;
        }

        .other-investor-list-item a {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 1.25rem 1.5rem;
            background: rgba(255, 255, 255, 0.9);
            border-radius: 12px;
            text-decoration: none;
            font-family: ''Inter'', sans-serif;
            font-size: 1rem;
            font-weight: 600;
            color: #2c3e50;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            border: 1px solid rgba(0, 0, 0, 0.08);
            position: relative;
            overflow: hidden;
        }

        .other-investor-list-item a::before {
            content: '''';
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 4px;
            background: linear-gradient(180deg, var(--calc-primary-blue), var(--calc-primary-teal));
            transform: scaleY(0);
            transform-origin: bottom;
            transition: transform 0.3s ease;
        }

        .other-investor-list-item a:hover::before {
            transform: scaleY(1);
        }

        .other-investor-list-item a .item-icon {
            width: 24px;
            height: 24px;
            color: var(--calc-primary-teal);
            flex-shrink: 0;
            transition: transform 0.3s ease;
        }

        .other-investor-list-item a:hover .item-icon {
            transform: scale(1.2) rotate(5deg);
        }

        .other-investor-box-left .other-investor-list-item a {
            color: #2c1810;
        }

        .other-investor-box-left .other-investor-list-item a:hover {
            background: #ffffff;
            border-color: #ff6b6b;
            box-shadow: 0 4px 12px rgba(255, 107, 107, 0.15);
            transform: translateX(8px);
        }

        .other-investor-box-right .other-investor-list-item a {
            color: #1a1a3e;
        }

        .other-investor-box-right .other-investor-list-item a:hover {
            background: #ffffff;
            border-color: #6b6bff;
            box-shadow: 0 4px 12px rgba(107, 107, 255, 0.15);
            transform: translateX(8px);
        }

        .other-investor-list-item a .item-text {
            flex: 1;
        }

        .other-investor-list-item a .item-arrow {
            width: 20px;
            height: 20px;
            color: var(--calc-primary-teal);
            opacity: 0;
            transform: translateX(-10px);
            transition: all 0.3s ease;
        }

        .other-investor-list-item a:hover .item-arrow {
            opacity: 1;
            transform: translateX(0);
        }

        @media (max-width: 968px) {
            .other-investor-boxes {
                grid-template-columns: 1fr;
                gap: 2rem;
                max-width: 600px;
            }

            .other-investor-title {
                font-size: 2.5rem;
            }
        }

        @media (max-width: 768px) {
            .other-investor-hero {
                padding: 3rem 0;
            }

            .other-investor-title {
                font-size: 2rem;
            }

            .other-investor-content {
                padding: 3rem 0;
            }

            .other-investor-box {
                padding: 2rem;
            }

            .other-investor-box-title {
                font-size: 1.5rem;
            }
        }";

// Include header
require_once '../includes/header.php';
require_once '../includes/navbar.php';
?>



<!-- Navigation -->

    <main class="other-investor-page">
        <div class="other-investor-hero">
            <div class="container">
                <div class="other-investor-hero-content">
                    <h1 class="other-investor-title">Other Investor Information</h1>
                </div>
            </div>
        </div>

        <div class="other-investor-content">
            <div class="other-investor-boxes">
                <!-- Left Box -->
                <div class="other-investor-box other-investor-box-left">
                    <h2 class="other-investor-box-title">Code and Policies</h2>
                    <ul class="other-investor-list">
                        <li class="other-investor-list-item">
                            <a href="SubTab_CodeandPolicies.php">
                                <i data-lucide="file-text" class="item-icon"></i>
                                <span class="item-text">Code and Policies</span>
                                <i data-lucide="arrow-right" class="item-arrow"></i>
                            </a>
                        </li>
                        <li class="other-investor-list-item">
                            <a href="javascript:void(0)" aria-disabled="true" title="Coming soon">
                                <i data-lucide="shield-check" class="item-icon"></i>
                                <span class="item-text">Corporate Governance</span>
                                <i data-lucide="arrow-right" class="item-arrow"></i>
                            </a>
                        </li>
                        <li class="other-investor-list-item">
                            <a href="javascript:void(0)" aria-disabled="true" title="Coming soon">
                                <i data-lucide="users" class="item-icon"></i>
                                <span class="item-text">Investor Relation</span>
                                <i data-lucide="arrow-right" class="item-arrow"></i>
                            </a>
                        </li>
                        <li class="other-investor-list-item">
                            <a href="javascript:void(0)" aria-disabled="true" title="Coming soon">
                                <i data-lucide="book-open" class="item-icon"></i>
                                <span class="item-text">Annual Report</span>
                                <i data-lucide="arrow-right" class="item-arrow"></i>
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Right Box -->
                <div class="other-investor-box other-investor-box-right">
                    <h2 class="other-investor-box-title">Financial Information</h2>
                    <ul class="other-investor-list">
                        <li class="other-investor-list-item">
                            <a href="javascript:void(0)" aria-disabled="true" title="Coming soon">
                                <i data-lucide="trending-up" class="item-icon"></i>
                                <span class="item-text">Financial Results</span>
                                <i data-lucide="arrow-right" class="item-arrow"></i>
                            </a>
                        </li>
                        <li class="other-investor-list-item">
                            <a href="javascript:void(0)" aria-disabled="true" title="Coming soon">
                                <i data-lucide="pie-chart" class="item-icon"></i>
                                <span class="item-text">Shareholding Pattern</span>
                                <i data-lucide="arrow-right" class="item-arrow"></i>
                            </a>
                        </li>
                        <li class="other-investor-list-item">
                            <a href="javascript:void(0)" aria-disabled="true" title="Coming soon">
                                <i data-lucide="file-check" class="item-icon"></i>
                                <span class="item-text">Statutory Disclosure</span>
                                <i data-lucide="arrow-right" class="item-arrow"></i>
                            </a>
                        </li>
                        <li class="other-investor-list-item">
                            <a href="javascript:void(0)" aria-disabled="true" title="Coming soon">
                                <i data-lucide="rocket" class="item-icon"></i>
                                <span class="item-text">Initial Public Offering</span>
                                <i data-lucide="arrow-right" class="item-arrow"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->

<?php
// Include footer
require_once '../includes/footer.php';
?>

