<?php
/**
 * Group Companies Financials and Annual Returns - Gretex Financial
 * Gretex Share Broking Limited
 */

// Page configuration
$pageTitle = 'Group Companies Financials and Annual Returns - Gretex Financial';
$additionalCSS = [
    '../css/calculator-page.css',
];

$pageStyles = "/* LODR Page Specific Styles */
        .lodr-page {
            min-height: 100vh;
            background-color: var(--calc-bg-light);
            padding: 90px 0 4rem 0;
        }

        .lodr-hero {
            background: var(--calc-gradient);
            padding: 3rem 0;
            position: relative;
            overflow: hidden;
        }

        .lodr-hero::before {
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

        .lodr-hero-content {
            position: relative;
            z-index: 2;
            text-align: center;
            color: #ffffff;
        }

        .lodr-page-title {
            font-family: ''Inter'', sans-serif;
            font-size: 2.5rem;
            font-weight: 700;
            margin: 0;
            color: #ffffff;
        }

        .lodr-main-section {
            padding: 3rem 0;
        }

        .lodr-wrapper {
            display: grid;
            grid-template-columns: 280px 1fr;
            gap: 2.5rem;
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        /* Sidebar Styles */
        .lodr-sidebar {
            position: sticky;
            top: 100px;
            background: var(--calc-bg-white);
            border-radius: 12px;
            padding: 1.5rem;
            box-shadow: var(--calc-shadow-md);
            border: 1px solid var(--calc-border-light);
            height: fit-content;
        }

        .lodr-sidebar-title {
            font-family: ''Inter'', sans-serif;
            font-size: 0.875rem;
            font-weight: 700;
            color: var(--calc-primary-blue);
            margin: 0 0 1.5rem 0;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            padding-bottom: 1rem;
            border-bottom: 2px solid #e8f4f8;
        }

        .lodr-dropdown-group {
            margin-bottom: 1rem;
        }

        .lodr-dropdown-btn {
            width: 100%;
            padding: 0.875rem 1rem;
            background: linear-gradient(135deg, var(--calc-primary-blue) 0%, var(--calc-primary-teal) 100%);
            color: #ffffff;
            border: none;
            border-radius: 8px;
            font-family: ''Inter'', sans-serif;
            font-size: 0.875rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: space-between;
            text-align: left;
            box-shadow: 0 2px 8px rgba(26, 77, 122, 0.2);
        }

        .lodr-dropdown-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(26, 77, 122, 0.3);
        }

        .lodr-dropdown-btn.active {
            background: linear-gradient(135deg, var(--calc-primary-teal) 0%, var(--calc-primary-blue) 100%);
        }

        .lodr-dropdown-arrow {
            transition: transform 0.3s ease;
            font-size: 0.75rem;
        }

        .lodr-dropdown-btn.active .lodr-dropdown-arrow {
            transform: rotate(180deg);
        }

        .lodr-dropdown-menu {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease;
            margin-top: 0.5rem;
        }

        .lodr-dropdown-menu.active {
            max-height: 800px;
            overflow-y: auto;
        }

        .lodr-dropdown-menu ul {
            list-style: none;
            padding: 0;
            margin: 0;
            background: #f8faff;
            border-radius: 8px;
            padding: 0.5rem;
            border: 1px solid #e8f4f8;
        }

        /* Custom scrollbar for dropdown menu */
        .lodr-dropdown-menu.active::-webkit-scrollbar {
            width: 6px;
        }

        .lodr-dropdown-menu.active::-webkit-scrollbar-track {
            background: rgba(0, 0, 0, 0.05);
            border-radius: 10px;
        }

        .lodr-dropdown-menu.active::-webkit-scrollbar-thumb {
            background: rgba(26, 77, 122, 0.3);
            border-radius: 10px;
        }

        .lodr-dropdown-menu.active::-webkit-scrollbar-thumb:hover {
            background: rgba(26, 77, 122, 0.5);
        }

        .lodr-dropdown-menu li {
            margin-bottom: 0.25rem;
        }

        .lodr-dropdown-menu a {
            display: block;
            padding: 0.75rem 1rem;
            color: var(--calc-text-medium);
            text-decoration: none;
            border-radius: 6px;
            font-family: ''Plus Jakarta Sans'', sans-serif;
            font-size: 0.8125rem;
            transition: all 0.2s ease;
        }

        .lodr-dropdown-menu a:hover {
            background: rgba(45, 156, 143, 0.1);
            color: var(--calc-primary-teal);
            padding-left: 1.25rem;
        }

        /* Main Content Styles */
        .lodr-content {
            background: var(--calc-bg-white);
            border-radius: 16px;
            padding: 3rem;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            border: 1px solid #e8f4f8;
        }

        .lodr-content-header {
            margin-bottom: 2.5rem;
            padding-bottom: 1.5rem;
            border-bottom: 2px solid #e8f4f8;
        }

        .lodr-content-title {
            font-family: ''Inter'', sans-serif;
            font-size: 2rem;
            font-weight: 700;
            color: var(--calc-primary-blue);
            margin: 0 0 0.75rem 0;
        }

        .lodr-content-subtitle {
            font-family: ''Plus Jakarta Sans'', sans-serif;
            font-size: 1rem;
            color: var(--calc-text-medium);
            margin: 0;
            line-height: 1.6;
        }

        .lodr-document-section {
            margin-bottom: 2.5rem;
        }

        .lodr-section-title {
            font-family: ''Inter'', sans-serif;
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--calc-primary-blue);
            margin: 0 0 1.5rem 0;
            padding-bottom: 0.75rem;
            border-bottom: 1px solid #e8f4f8;
        }

        .lodr-document-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .lodr-document-item {
            padding: 1.25rem;
            background: #f8faff;
            border-radius: 10px;
            margin-bottom: 1rem;
            border: 1px solid #e8f4f8;
            transition: all 0.3s ease;
        }

        .lodr-document-item:hover {
            border-color: var(--calc-primary-blue);
            box-shadow: 0 2px 8px rgba(26, 77, 122, 0.1);
            transform: translateY(-2px);
        }

        .lodr-document-link {
            display: flex;
            align-items: center;
            justify-content: space-between;
            text-decoration: none;
            color: var(--calc-text-dark);
        }

        .lodr-document-info {
            flex: 1;
        }

        .lodr-document-name {
            font-family: ''Inter'', sans-serif;
            font-size: 0.9375rem;
            font-weight: 600;
            color: var(--calc-primary-blue);
            margin-bottom: 0.25rem;
        }

        .lodr-document-meta {
            font-family: ''Plus Jakarta Sans'', sans-serif;
            font-size: 0.8125rem;
            color: var(--calc-text-medium);
        }

        .lodr-document-icon {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, var(--calc-primary-blue) 0%, var(--calc-primary-teal) 100%);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #ffffff;
            flex-shrink: 0;
            margin-left: 1rem;
        }

        .lodr-document-icon i {
            width: 20px;
            height: 20px;
        }

        .lodr-year-selector {
            margin-bottom: 2rem;
            display: flex;
            align-items: center;
            gap: 1rem;
            justify-content: flex-end;
        }

        .lodr-year-selector label {
            font-family: ''Inter'', sans-serif;
            font-size: 0.9375rem;
            font-weight: 600;
            color: var(--calc-primary-blue);
        }

        .lodr-year-selector select {
            padding: 0.5rem 1rem;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            font-family: ''Plus Jakarta Sans'', sans-serif;
            font-size: 0.9375rem;
            min-width: 150px;
        }

        /* Responsive Design */
        @media (max-width: 968px) {
            .lodr-wrapper {
                grid-template-columns: 1fr;
                gap: 2rem;
            }

            .lodr-sidebar {
                position: static;
                order: 2;
            }

            .lodr-content {
                order: 1;
            }

            .lodr-page-title {
                font-size: 2rem;
            }

            .lodr-content-title {
                font-size: 1.5rem;
            }
        }

        @media (max-width: 768px) {
            .lodr-content {
                padding: 2rem 1.5rem;
            }

            .lodr-sidebar {
                padding: 1.25rem;
            }

            .lodr-dropdown-btn {
                font-size: 0.8125rem;
                padding: 0.75rem 0.875rem;
            }
        }";

// Include header
require_once '../includes/header.php';
require_once '../includes/navbar.php';
?>



<!-- Navigation -->

    <main class="lodr-page">
        <div class="lodr-hero">
            <div class="container">
                <div class="lodr-hero-content">
                    <h1 class="lodr-page-title">Group Companies Financials and Annual Returns</h1>
                </div>
            </div>
        </div>

        <div class="lodr-main-section">
            <div class="lodr-wrapper">
                <!-- Left Sidebar -->
                <aside class="lodr-sidebar">
                    <h2 class="lodr-sidebar-title">Group Of Company</h2>
                    
                    <div class="lodr-dropdown-group">
                        <button class="lodr-dropdown-btn" onclick="showFinancialDetails()">
                            <span>Financial Details</span>
                        </button>
                    </div>
                </aside>

                <!-- Main Content -->
                <div class="lodr-content">
                    <div class="lodr-content-header">
                        <h2 class="lodr-content-title">Group Companies Financials and Annual Returns</h2>
                        <p class="lodr-content-subtitle">This section contains financial statements and annual returns of all group companies as required under Regulation 62 of the SEBI (Listing Obligations and Disclosure Requirements) Regulations, 2015.</p>
                    </div>

                    <!-- Financial Details Section -->
                    <div id="financial-details" class="lodr-document-section">
                        <div style="display: flex; gap: 2rem; margin-bottom: 2rem; align-items: center; flex-wrap: wrap;">
                            <div style="display: flex; align-items: center; gap: 1rem;">
                                <label style="font-family: 'Inter', sans-serif; font-size: 0.9375rem; font-weight: 600; color: var(--calc-primary-blue);">List Of Company:</label>
                                <select id="select-company" onchange="CompanyOnChange()" style="padding: 0.5rem 1rem; border: 2px solid #e0e0e0; border-radius: 8px; font-family: 'Plus Jakarta Sans', sans-serif; font-size: 0.9375rem; min-width: 300px;">
                                    <option value="ambition">AMBITION TIE UP PRIVATE LIMITED</option>
                                    <option value="apsara">APSARA SELECTIONS LIMITED</option>
                                    <option value="gretex-corporate">GRETEX CORPORATE SERVICES LIMITED</option>
                                    <option value="gretex-industries">GRETEX INDUSTRIES LIMITED</option>
                                    <option value="sankhu">SANKHU MERCHANDISE PRIVATE LIMITED</option>
                                    <option value="sunview">SUNVIEW NIRMAN PRIVATE LIMITED</option>
                                </select>
                            </div>
                            <div style="display: flex; align-items: center; gap: 1rem;">
                                <label style="font-family: 'Inter', sans-serif; font-size: 0.9375rem; font-weight: 600; color: var(--calc-primary-blue);">Select Year:</label>
                                <select id="select-year" onchange="YearOnChange()" style="padding: 0.5rem 1rem; border: 2px solid #e0e0e0; border-radius: 8px; font-family: 'Plus Jakarta Sans', sans-serif; font-size: 0.9375rem; min-width: 150px;">
                                    <option value="2023" selected>2022-2023</option>
                                    <option value="2022">2021-2022</option>
                                    <option value="2021">2020-2021</option>
                                </select>
                            </div>
                        </div>

                        <!-- Documents will be displayed here based on company and year selection -->
                        <div id="documents-container">
                            <!-- AMBITION TIE UP PRIVATE LIMITED - 2023 -->
                            <div id="ambition-2023" class="company-year-docs" style="display: block;">
                                <ul class="lodr-document-list">
                                    <li class="lodr-document-item">
                                        <a href="#" class="lodr-document-link">
                                            <div class="lodr-document-info">
                                                <div class="lodr-document-name">Signed Standalone Ambition Tie Up</div>
                                                <div class="lodr-document-meta">PDF • Updated: 2022-2023</div>
                                            </div>
                                            <div class="lodr-document-icon">
                                                <i data-lucide="file-text"></i>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            
                            <!-- AMBITION TIE UP PRIVATE LIMITED - 2022 -->
                            <div id="ambition-2022" class="company-year-docs" style="display: none;">
                                <ul class="lodr-document-list">
                                    <li class="lodr-document-item">
                                        <a href="#" class="lodr-document-link">
                                            <div class="lodr-document-info">
                                                <div class="lodr-document-name">Signed Standalone Ambition Tie Up - FY 2021-22</div>
                                                <div class="lodr-document-meta">PDF • Updated: 2021-2022</div>
                                            </div>
                                            <div class="lodr-document-icon">
                                                <i data-lucide="file-text"></i>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            
                            <!-- AMBITION TIE UP PRIVATE LIMITED - 2021 -->
                            <div id="ambition-2021" class="company-year-docs" style="display: none;">
                                <ul class="lodr-document-list">
                                    <li class="lodr-document-item">
                                        <a href="#" class="lodr-document-link">
                                            <div class="lodr-document-info">
                                                <div class="lodr-document-name">Signed Standalone Ambition Tie Up - FY 2020-21</div>
                                                <div class="lodr-document-meta">PDF • Updated: 2020-2021</div>
                                            </div>
                                            <div class="lodr-document-icon">
                                                <i data-lucide="file-text"></i>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            
                            <!-- APSARA SELECTIONS LIMITED -->
                            <div id="apsara-2023" class="company-year-docs" style="display: none;">
                                <ul class="lodr-document-list">
                                    <li class="lodr-document-item">
                                        <a href="#" class="lodr-document-link">
                                            <div class="lodr-document-info">
                                                <div class="lodr-document-name">Apsara Selections Limited - Financial Statements - FY 2022-23</div>
                                                <div class="lodr-document-meta">PDF • Updated: 2022-2023</div>
                                            </div>
                                            <div class="lodr-document-icon">
                                                <i data-lucide="file-text"></i>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div id="apsara-2022" class="company-year-docs" style="display: none;">
                                <ul class="lodr-document-list">
                                    <li class="lodr-document-item">
                                        <a href="#" class="lodr-document-link">
                                            <div class="lodr-document-info">
                                                <div class="lodr-document-name">Apsara Selections Limited - Financial Statements - FY 2021-22</div>
                                                <div class="lodr-document-meta">PDF • Updated: 2021-2022</div>
                                            </div>
                                            <div class="lodr-document-icon">
                                                <i data-lucide="file-text"></i>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div id="apsara-2021" class="company-year-docs" style="display: none;">
                                <ul class="lodr-document-list">
                                    <li class="lodr-document-item">
                                        <a href="#" class="lodr-document-link">
                                            <div class="lodr-document-info">
                                                <div class="lodr-document-name">Apsara Selections Limited - Financial Statements - FY 2020-21</div>
                                                <div class="lodr-document-meta">PDF • Updated: 2020-2021</div>
                                            </div>
                                            <div class="lodr-document-icon">
                                                <i data-lucide="file-text"></i>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            
                            <!-- GRETEX CORPORATE SERVICES LIMITED -->
                            <div id="gretex-corporate-2023" class="company-year-docs" style="display: none;">
                                <ul class="lodr-document-list">
                                    <li class="lodr-document-item">
                                        <a href="#" class="lodr-document-link">
                                            <div class="lodr-document-info">
                                                <div class="lodr-document-name">Gretex Corporate Services Limited - Financial Statements - FY 2022-23</div>
                                                <div class="lodr-document-meta">PDF • Updated: 2022-2023</div>
                                            </div>
                                            <div class="lodr-document-icon">
                                                <i data-lucide="file-text"></i>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div id="gretex-corporate-2022" class="company-year-docs" style="display: none;">
                                <ul class="lodr-document-list">
                                    <li class="lodr-document-item">
                                        <a href="#" class="lodr-document-link">
                                            <div class="lodr-document-info">
                                                <div class="lodr-document-name">Gretex Corporate Services Limited - Financial Statements - FY 2021-22</div>
                                                <div class="lodr-document-meta">PDF • Updated: 2021-2022</div>
                                            </div>
                                            <div class="lodr-document-icon">
                                                <i data-lucide="file-text"></i>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div id="gretex-corporate-2021" class="company-year-docs" style="display: none;">
                                <ul class="lodr-document-list">
                                    <li class="lodr-document-item">
                                        <a href="#" class="lodr-document-link">
                                            <div class="lodr-document-info">
                                                <div class="lodr-document-name">Gretex Corporate Services Limited - Financial Statements - FY 2020-21</div>
                                                <div class="lodr-document-meta">PDF • Updated: 2020-2021</div>
                                            </div>
                                            <div class="lodr-document-icon">
                                                <i data-lucide="file-text"></i>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            
                            <!-- GRETEX INDUSTRIES LIMITED -->
                            <div id="gretex-industries-2023" class="company-year-docs" style="display: none;">
                                <ul class="lodr-document-list">
                                    <li class="lodr-document-item">
                                        <a href="#" class="lodr-document-link">
                                            <div class="lodr-document-info">
                                                <div class="lodr-document-name">Gretex Industries Limited - Financial Statements - FY 2022-23</div>
                                                <div class="lodr-document-meta">PDF • Updated: 2022-2023</div>
                                            </div>
                                            <div class="lodr-document-icon">
                                                <i data-lucide="file-text"></i>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div id="gretex-industries-2022" class="company-year-docs" style="display: none;">
                                <ul class="lodr-document-list">
                                    <li class="lodr-document-item">
                                        <a href="#" class="lodr-document-link">
                                            <div class="lodr-document-info">
                                                <div class="lodr-document-name">Gretex Industries Limited - Financial Statements - FY 2021-22</div>
                                                <div class="lodr-document-meta">PDF • Updated: 2021-2022</div>
                                            </div>
                                            <div class="lodr-document-icon">
                                                <i data-lucide="file-text"></i>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div id="gretex-industries-2021" class="company-year-docs" style="display: none;">
                                <ul class="lodr-document-list">
                                    <li class="lodr-document-item">
                                        <a href="#" class="lodr-document-link">
                                            <div class="lodr-document-info">
                                                <div class="lodr-document-name">Gretex Industries Limited - Financial Statements - FY 2020-21</div>
                                                <div class="lodr-document-meta">PDF • Updated: 2020-2021</div>
                                            </div>
                                            <div class="lodr-document-icon">
                                                <i data-lucide="file-text"></i>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            
                            <!-- SANKHU MERCHANDISE PRIVATE LIMITED -->
                            <div id="sankhu-2023" class="company-year-docs" style="display: none;">
                                <ul class="lodr-document-list">
                                    <li class="lodr-document-item">
                                        <a href="#" class="lodr-document-link">
                                            <div class="lodr-document-info">
                                                <div class="lodr-document-name">Sankhu Merchandise Private Limited - Financial Statements - FY 2022-23</div>
                                                <div class="lodr-document-meta">PDF • Updated: 2022-2023</div>
                                            </div>
                                            <div class="lodr-document-icon">
                                                <i data-lucide="file-text"></i>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div id="sankhu-2022" class="company-year-docs" style="display: none;">
                                <ul class="lodr-document-list">
                                    <li class="lodr-document-item">
                                        <a href="#" class="lodr-document-link">
                                            <div class="lodr-document-info">
                                                <div class="lodr-document-name">Sankhu Merchandise Private Limited - Financial Statements - FY 2021-22</div>
                                                <div class="lodr-document-meta">PDF • Updated: 2021-2022</div>
                                            </div>
                                            <div class="lodr-document-icon">
                                                <i data-lucide="file-text"></i>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div id="sankhu-2021" class="company-year-docs" style="display: none;">
                                <ul class="lodr-document-list">
                                    <li class="lodr-document-item">
                                        <a href="#" class="lodr-document-link">
                                            <div class="lodr-document-info">
                                                <div class="lodr-document-name">Sankhu Merchandise Private Limited - Financial Statements - FY 2020-21</div>
                                                <div class="lodr-document-meta">PDF • Updated: 2020-2021</div>
                                            </div>
                                            <div class="lodr-document-icon">
                                                <i data-lucide="file-text"></i>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            
                            <!-- SUNVIEW NIRMAN PRIVATE LIMITED -->
                            <div id="sunview-2023" class="company-year-docs" style="display: none;">
                                <ul class="lodr-document-list">
                                    <li class="lodr-document-item">
                                        <a href="#" class="lodr-document-link">
                                            <div class="lodr-document-info">
                                                <div class="lodr-document-name">Sunview Nirman Private Limited - Financial Statements - FY 2022-23</div>
                                                <div class="lodr-document-meta">PDF • Updated: 2022-2023</div>
                                            </div>
                                            <div class="lodr-document-icon">
                                                <i data-lucide="file-text"></i>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div id="sunview-2022" class="company-year-docs" style="display: none;">
                                <ul class="lodr-document-list">
                                    <li class="lodr-document-item">
                                        <a href="#" class="lodr-document-link">
                                            <div class="lodr-document-info">
                                                <div class="lodr-document-name">Sunview Nirman Private Limited - Financial Statements - FY 2021-22</div>
                                                <div class="lodr-document-meta">PDF • Updated: 2021-2022</div>
                                            </div>
                                            <div class="lodr-document-icon">
                                                <i data-lucide="file-text"></i>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div id="sunview-2021" class="company-year-docs" style="display: none;">
                                <ul class="lodr-document-list">
                                    <li class="lodr-document-item">
                                        <a href="#" class="lodr-document-link">
                                            <div class="lodr-document-info">
                                                <div class="lodr-document-name">Sunview Nirman Private Limited - Financial Statements - FY 2020-21</div>
                                                <div class="lodr-document-meta">PDF • Updated: 2020-2021</div>
                                            </div>
                                            <div class="lodr-document-icon">
                                                <i data-lucide="file-text"></i>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->

    <script src="../js/gretex-financial.js"></script>
    <script>
        lucide.createIcons();

        // Toggle dropdown
        function toggleDropdown(button) {
            const dropdown = button.nextElementSibling;
            dropdown.classList.toggle('active');
            button.classList.toggle('active');
        }

        // Show specific section
        function showSection(sectionId) {
            // Hide all sections
            document.querySelectorAll('.lodr-document-section').forEach(section => {
                section.style.display = 'none';
            });
            
            // Show selected section
            const section = document.getElementById(sectionId);
            if (section) {
                section.style.display = 'block';
                section.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        }

        // Show financial details section by default
        function showFinancialDetails() {
            showSection('financial-details');
        }

        // Show first section by default on page load
        document.addEventListener('DOMContentLoaded', function() {
            showSection('financial-details');
            updateDocuments();
        });

        // Close dropdowns when clicking outside
        document.addEventListener('click', function(e) {
            if (!e.target.closest('.lodr-dropdown-group')) {
                document.querySelectorAll('.lodr-dropdown-menu').forEach(menu => {
                    menu.classList.remove('active');
                });
                document.querySelectorAll('.lodr-dropdown-btn').forEach(btn => {
                    btn.classList.remove('active');
                });
            }
        });

        // Company and Year selector functions
        function CompanyOnChange() {
            updateDocuments();
        }

        function YearOnChange() {
            updateDocuments();
        }

        function updateDocuments() {
            // Hide all company-year document sections
            document.querySelectorAll('.company-year-docs').forEach(doc => {
                doc.style.display = 'none';
            });

            // Get selected company and year
            var company = document.getElementById("select-company").value;
            var year = document.getElementById("select-year").value;

            // Show the appropriate document section
            var docId = company + "-" + year;
            var docSection = document.getElementById(docId);
            if (docSection) {
                docSection.style.display = "block";
            }
        }
    </script>

    <script src="../js/search.js"></script>
    <script src="../js/mobile-menu.js"></script>
    <script src="../js/chatbot-knowledge.js"></script>
    <script src="../js/chatbot-config.js"></script>
    <script src="../js/chatbot.js"></script>
    <script>
        if (typeof lucide !== 'undefined') {
            lucide.createIcons();
        }
    </script>


<?php
// Include footer
require_once '../includes/footer.php';
?>

