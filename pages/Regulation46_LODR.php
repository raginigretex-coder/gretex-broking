<?php
/**
 * Disclosures under Regulation 46 of the LODR - Gretex Financial
 * Gretex Share Broking Limited
 */

// Page configuration
$pageTitle = 'Disclosures under Regulation 46 of the LODR - Gretex Financial';
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

        .lodr-empty-state {
            text-align: center;
            padding: 3rem 2rem;
            color: var(--calc-text-medium);
        }

        .lodr-empty-state i {
            width: 64px;
            height: 64px;
            color: var(--calc-primary-teal);
            margin-bottom: 1rem;
            opacity: 0.5;
        }

        .lodr-empty-state p {
            font-family: ''Plus Jakarta Sans'', sans-serif;
            font-size: 1rem;
            margin: 0;
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
                    <h1 class="lodr-page-title">Disclosures under Regulation 46 of the LODR</h1>
                </div>
            </div>
        </div>

        <div class="lodr-main-section">
            <div class="lodr-wrapper">
                <!-- Left Sidebar -->
                <aside class="lodr-sidebar">
                    <h2 class="lodr-sidebar-title">Regulations</h2>
                    
                    <div class="lodr-dropdown-group">
                        <button class="lodr-dropdown-btn" onclick="toggleDropdown(this)">
                            <span>SEBI ICDR Regulations</span>
                            <span class="lodr-dropdown-arrow"></span>
                        </button>
                        <div class="lodr-dropdown-menu">
                            <ul>
                                <li><a href="#standalone-financial" onclick="showSection('standalone-financial')">Standalone audited financial of the Company for the past three years</a></li>
                                <li><a href="#subsidiary-financial" onclick="showSection('subsidiary-financial')">subsidiary[1] for the past three years</a></li>
                                <li><a href="#restated-consolidated" onclick="showSection('restated-consolidated')">Restated Consolidated financial statement for the Company and its subsidiary for the past three years</a></li>
                                <li><a href="#material-documents" onclick="showSection('material-documents')">Material documents for inspection (including the industry report) as disclosed in the DRHP.</a></li>
                                <li><a href="#drhp-industry-report" onclick="showSection('drhp-industry-report')">DRHP and industry report</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="lodr-dropdown-group">
                        <button class="lodr-dropdown-btn" onclick="toggleDropdown(this)">
                            <span>SEBI Listing Regulations regulation 46 all documents</span>
                            <span class="lodr-dropdown-arrow"></span>
                        </button>
                        <div class="lodr-dropdown-menu">
                            <ul>
                                <li><a href="#other-policies" onclick="showSection('other-policies')">Other Policies</a></li>
                                <li><a href="#archival-policy" onclick="showSection('archival-policy')">Archival Policy</a></li>
                                <li><a href="#materiality-policy" onclick="showSection('materiality-policy')">Policy on determination of materiality for disclosure</a></li>
                                <li><a href="#annual-report-agm" onclick="showSection('annual-report-agm')">Annual Report and Notice of Annual General Meeting</a></li>
                                <li><a href="#business-details" onclick="showSection('business-details')">Details of the business of the Company</a></li>
                                <li><a href="#committee-composition" onclick="showSection('committee-composition')">Composition of Committees</a></li>
                                <li><a href="#code-of-conduct" onclick="showSection('code-of-conduct')">Code of Conduct by board of directors and senior managerial personnel</a></li>
                                <li><a href="#whistle-blower" onclick="showSection('whistle-blower')">Whistle Blower Policy</a></li>
                                <li><a href="#related-party-transactions" onclick="showSection('related-party-transactions')">Policy on related party transactions</a></li>
                                <li><a href="#material-subsidiaries" onclick="showSection('material-subsidiaries')">Policy for determining "material" subsidiaries</a></li>
                                <li><a href="#shareholding-pattern" onclick="showSection('shareholding-pattern')">Shareholding pattern</a></li>
                                <li><a href="#familiarization-programs" onclick="showSection('familiarization-programs')">Details of familiarization programs for independent directors</a></li>
                                <li><a href="#dividend-policy" onclick="showSection('dividend-policy')">Dividend Distribution Policies</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="lodr-dropdown-group">
                        <button class="lodr-dropdown-btn" onclick="toggleDropdown(this)">
                            <span>Insider Trading Regulations</span>
                            <span class="lodr-dropdown-arrow"></span>
                        </button>
                        <div class="lodr-dropdown-menu">
                            <ul>
                                <li><a href="#insider-trading-policy" onclick="showSection('insider-trading-policy')">Insider Trading Policy</a></li>
                                <li><a href="#fair-disclosure-code" onclick="showSection('fair-disclosure-code')">Code of practices and procedures for fair disclosure of unpublished price sensitive information including fair disclosure of</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="lodr-dropdown-group">
                        <button class="lodr-dropdown-btn" onclick="toggleDropdown(this)">
                            <span>Companies Act</span>
                            <span class="lodr-dropdown-arrow"></span>
                        </button>
                        <div class="lodr-dropdown-menu">
                            <ul>
                                <li><a href="#directors-remuneration-policy" onclick="showSection('directors-remuneration-policy')">Policy relating to qualification and remuneration of directors and key managerial personnel</a></li>
                                <li><a href="#csr-policy" onclick="showSection('csr-policy')">CSR Policy and projects approved by board of directors</a></li>
                                <li><a href="#annual-return" onclick="showSection('annual-return')">Annual Return</a></li>
                            </ul>
                        </div>
                    </div>
                </aside>

                <!-- Main Content -->
                <div class="lodr-content">
                    <div class="lodr-content-header">
                        <h2 class="lodr-content-title">Disclosures under Regulation 46 of the LODR</h2>
                        <p class="lodr-content-subtitle">This section contains all mandatory disclosures as required under Regulation 46 of the SEBI (Listing Obligations and Disclosure Requirements) Regulations, 2015.</p>
                    </div>

                    <!-- Standalone audited financial Section -->
                    <div id="standalone-financial" class="lodr-document-section" style="display: none;">
                        <h3 class="lodr-section-title">Standalone audited financial of the Company for the past three years</h3>
                        <div class="lodr-year-selector" style="margin-bottom: 2rem; display: flex; align-items: center; gap: 1rem; justify-content: flex-end;">
                            <label style="font-family: 'Inter', sans-serif; font-size: 0.9375rem; font-weight: 600; color: var(--calc-primary-blue);">Select Year:</label>
                            <select id="selectyear-standalone" onchange="YearOnChangeStandalone()" style="padding: 0.5rem 1rem; border: 2px solid #e0e0e0; border-radius: 8px; font-family: 'Plus Jakarta Sans', sans-serif; font-size: 0.9375rem; min-width: 150px;">
                                <option value="2023" selected>2022-2023</option>
                                <option value="2022">2021-2022</option>
                                <option value="2021">2020-2021</option>
                            </select>
                        </div>
                        <div id="standalone-2021" style="display: none;">
                            <ul class="lodr-document-list">
                                <li class="lodr-document-item">
                                    <a href="../assets/documents/Point_1/FS_2021/REVISED GSBPL_FINANCIAL.pdf" target="_blank" class="lodr-document-link">
                                        <div class="lodr-document-info">
                                            <div class="lodr-document-name">REVISED GSBPL FINANCIAL</div>
                                            <div class="lodr-document-meta">PDF • Updated: 2020-2021</div>
                                        </div>
                                        <div class="lodr-document-icon">
                                            <i data-lucide="file-text"></i>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div id="standalone-2022" style="display: none;">
                            <ul class="lodr-document-list">
                                <li class="lodr-document-item">
                                    <a href="../assets/documents/Point_1/FS_2022/Standalone Auditr Report,2022.pdf" target="_blank" class="lodr-document-link">
                                        <div class="lodr-document-info">
                                            <div class="lodr-document-name">Standalone Auditr Report,2022</div>
                                            <div class="lodr-document-meta">PDF • Updated: 2021-2022</div>
                                        </div>
                                        <div class="lodr-document-icon">
                                            <i data-lucide="file-text"></i>
                                        </div>
                                    </a>
                                </li>
                                <li class="lodr-document-item">
                                    <a href="../assets/documents/Point_1/FS_2022/Standalone balance sheet, 2022 (1).pdf" target="_blank" class="lodr-document-link">
                                        <div class="lodr-document-info">
                                            <div class="lodr-document-name">Standalone balance sheet, 2022</div>
                                            <div class="lodr-document-meta">PDF • Updated: 2021-2022</div>
                                        </div>
                                        <div class="lodr-document-icon">
                                            <i data-lucide="file-text"></i>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div id="standalone-2023" style="display: block;">
                            <ul class="lodr-document-list">
                                <li class="lodr-document-item">
                                    <a href="../assets/documents/Point_1/FS_2023/GSBL_Standalone_Audit Report_2023.pdf" target="_blank" class="lodr-document-link">
                                        <div class="lodr-document-info">
                                            <div class="lodr-document-name">GSBL Standalone Audit Report 2023</div>
                                            <div class="lodr-document-meta">PDF • Updated: 2022-2023</div>
                                        </div>
                                        <div class="lodr-document-icon">
                                            <i data-lucide="file-text"></i>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- Subsidiary financial Section -->
                    <div id="subsidiary-financial" class="lodr-document-section" style="display: none;">
                        <h3 class="lodr-section-title">subsidiary[1] for the past three years</h3>
                        <div class="lodr-year-selector" style="margin-bottom: 2rem; display: flex; align-items: center; gap: 1rem; justify-content: flex-end;">
                            <label style="font-family: 'Inter', sans-serif; font-size: 0.9375rem; font-weight: 600; color: var(--calc-primary-blue);">Select Year:</label>
                            <select id="selectyear-subsidiary" onchange="SubsidiaryOnChange()" style="padding: 0.5rem 1rem; border: 2px solid #e0e0e0; border-radius: 8px; font-family: 'Plus Jakarta Sans', sans-serif; font-size: 0.9375rem; min-width: 150px;">
                                <option value="2023" selected>2022-2023</option>
                                <option value="2022">2021-2022</option>
                                <option value="2021">2020-2021</option>
                            </select>
                        </div>
                        <div id="subsidiary-2021" style="display: none;">
                            <ul class="lodr-document-list">
                                <li class="lodr-document-item">
                                    <a href="../assets/documents/Point 2/FS_2021/Ambuja Standalone.pdf" target="_blank" class="lodr-document-link">
                                        <div class="lodr-document-info">
                                            <div class="lodr-document-name">Ambuja Standalone</div>
                                            <div class="lodr-document-meta">PDF • Updated: 2020-2021</div>
                                        </div>
                                        <div class="lodr-document-icon">
                                            <i data-lucide="file-text"></i>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div id="subsidiary-2022" style="display: none;">
                            <ul class="lodr-document-list">
                                <li class="lodr-document-item">
                                    <a href="../assets/documents/Point 2/FS_2022/Balance Sheet_2022.pdf" target="_blank" class="lodr-document-link">
                                        <div class="lodr-document-info">
                                            <div class="lodr-document-name">Balance Sheet_2022</div>
                                            <div class="lodr-document-meta">PDF • Updated: 2021-2022</div>
                                        </div>
                                        <div class="lodr-document-icon">
                                            <i data-lucide="file-text"></i>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div id="subsidiary-2023" style="display: block;">
                            <ul class="lodr-document-list">
                                <li class="lodr-document-item">
                                    <a href="../assets/documents/Point 2/FS_2023/Signageus_Standalone Final BS_2023.pdf" target="_blank" class="lodr-document-link">
                                        <div class="lodr-document-info">
                                            <div class="lodr-document-name">Signageus_Standalone Final BS_2023</div>
                                            <div class="lodr-document-meta">PDF • Updated: 2022-2023</div>
                                        </div>
                                        <div class="lodr-document-icon">
                                            <i data-lucide="file-text"></i>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- Restated Consolidated financial statement Section -->
                    <div id="restated-consolidated" class="lodr-document-section" style="display: none;">
                        <h3 class="lodr-section-title">Restated Consolidated financial statement for the Company and its subsidiary for the past three years</h3>
                        <ul class="lodr-document-list">
                            <li class="lodr-document-item">
                                <a href="../assets/documents/Point 3/Signed_Restated Consol_Financials_31072023.pdf" target="_blank" class="lodr-document-link">
                                    <div class="lodr-document-info">
                                        <div class="lodr-document-name">Signed Restated Consol Financials_31072023</div>
                                        <div class="lodr-document-meta">PDF • Updated: July 2023</div>
                                    </div>
                                    <div class="lodr-document-icon">
                                        <i data-lucide="file-text"></i>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <!-- Material documents for inspection Section -->
                    <div id="material-documents" class="lodr-document-section" style="display: none;">
                        <h3 class="lodr-section-title">Material documents for inspection (including the industry report) as disclosed in the DRHP.</h3>
                        <ul class="lodr-document-list">
                            <li class="lodr-document-item">
                                <a href="../assets/documents/Point 6/02. COI_2010.pdf" target="_blank" class="lodr-document-link">
                                    <div class="lodr-document-info">
                                        <div class="lodr-document-name">COI_2010</div>
                                        <div class="lodr-document-meta">PDF</div>
                                    </div>
                                    <div class="lodr-document-icon">
                                        <i data-lucide="file-text"></i>
                                    </div>
                                </a>
                            </li>
                            <li class="lodr-document-item">
                                <a href="../assets/documents/Point 6/03. COI_Change in Registered Office_06012017.pdf" target="_blank" class="lodr-document-link">
                                    <div class="lodr-document-info">
                                        <div class="lodr-document-name">COI_Change in Registered Office_06012017</div>
                                        <div class="lodr-document-meta">PDF</div>
                                    </div>
                                    <div class="lodr-document-icon">
                                        <i data-lucide="file-text"></i>
                                    </div>
                                </a>
                            </li>
                            <li class="lodr-document-item">
                                <a href="../assets/documents/Point 6/05. COI_2023.pdf" target="_blank" class="lodr-document-link">
                                    <div class="lodr-document-info">
                                        <div class="lodr-document-name">COI_2023</div>
                                        <div class="lodr-document-meta">PDF</div>
                                    </div>
                                    <div class="lodr-document-icon">
                                        <i data-lucide="file-text"></i>
                                    </div>
                                </a>
                            </li>
                            <li class="lodr-document-item">
                                <a href="../assets/documents/Point 6/06. CTC_071223_BM.pdf" target="_blank" class="lodr-document-link">
                                    <div class="lodr-document-info">
                                        <div class="lodr-document-name">CTC_071223_BM</div>
                                        <div class="lodr-document-meta">PDF</div>
                                    </div>
                                    <div class="lodr-document-icon">
                                        <i data-lucide="file-text"></i>
                                    </div>
                                </a>
                            </li>
                            <li class="lodr-document-item">
                                <a href="../assets/documents/Point 6/07. CTC_EGM_IPO_11122023.pdf" target="_blank" class="lodr-document-link">
                                    <div class="lodr-document-info">
                                        <div class="lodr-document-name">CTC_EGM_IPO_11122023</div>
                                        <div class="lodr-document-meta">PDF</div>
                                    </div>
                                    <div class="lodr-document-icon">
                                        <i data-lucide="file-text"></i>
                                    </div>
                                </a>
                            </li>
                            <li class="lodr-document-item">
                                <a href="../assets/documents/Point 6/08. CTC_BR - 14122023.pdf" target="_blank" class="lodr-document-link">
                                    <div class="lodr-document-info">
                                        <div class="lodr-document-name">CTC_BR - 14122023</div>
                                        <div class="lodr-document-meta">PDF</div>
                                    </div>
                                    <div class="lodr-document-icon">
                                        <i data-lucide="file-text"></i>
                                    </div>
                                </a>
                            </li>
                            <li class="lodr-document-item">
                                <a href="../assets/documents/Point 6/09. CTC_BR_DRHP.pdf" target="_blank" class="lodr-document-link">
                                    <div class="lodr-document-info">
                                        <div class="lodr-document-name">CTC_BR_DRHP</div>
                                        <div class="lodr-document-meta">PDF</div>
                                    </div>
                                    <div class="lodr-document-icon">
                                        <i data-lucide="file-text"></i>
                                    </div>
                                </a>
                            </li>
                            <li class="lodr-document-item">
                                <a href="../assets/documents/Point 6/13. RFS.pdf" target="_blank" class="lodr-document-link">
                                    <div class="lodr-document-info">
                                        <div class="lodr-document-name">RFS</div>
                                        <div class="lodr-document-meta">PDF</div>
                                    </div>
                                    <div class="lodr-document-icon">
                                        <i data-lucide="file-text"></i>
                                    </div>
                                </a>
                            </li>
                            <li class="lodr-document-item">
                                <a href="../assets/documents/Point 6/15. Statement of Possible Tax Benefits.pdf" target="_blank" class="lodr-document-link">
                                    <div class="lodr-document-info">
                                        <div class="lodr-document-name">Statement of Possible Tax Benefits</div>
                                        <div class="lodr-document-meta">PDF</div>
                                    </div>
                                    <div class="lodr-document-icon">
                                        <i data-lucide="file-text"></i>
                                    </div>
                                </a>
                            </li>
                            <li class="lodr-document-item">
                                <a href="../assets/documents/Point 6/16. Certificate on Basis for Offer Price.pdf" target="_blank" class="lodr-document-link">
                                    <div class="lodr-document-info">
                                        <div class="lodr-document-name">Certificate on Basis for Offer Price</div>
                                        <div class="lodr-document-meta">PDF</div>
                                    </div>
                                    <div class="lodr-document-icon">
                                        <i data-lucide="file-text"></i>
                                    </div>
                                </a>
                            </li>
                            <li class="lodr-document-item">
                                <a href="../assets/documents/Point 6/17. Certificate on KPI.pdf" target="_blank" class="lodr-document-link">
                                    <div class="lodr-document-info">
                                        <div class="lodr-document-name">Certificate on KPI</div>
                                        <div class="lodr-document-meta">PDF</div>
                                    </div>
                                    <div class="lodr-document-icon">
                                        <i data-lucide="file-text"></i>
                                    </div>
                                </a>
                            </li>
                            <li class="lodr-document-item">
                                <a href="../assets/documents/Point 6/18. Final CTC_KPI_ACM.pdf" target="_blank" class="lodr-document-link">
                                    <div class="lodr-document-info">
                                        <div class="lodr-document-name">Final CTC_KPI_ACM</div>
                                        <div class="lodr-document-meta">PDF</div>
                                    </div>
                                    <div class="lodr-document-icon">
                                        <i data-lucide="file-text"></i>
                                    </div>
                                </a>
                            </li>
                            <li class="lodr-document-item">
                                <a href="../assets/documents/Point 6/20. Care mandate.pdf" target="_blank" class="lodr-document-link">
                                    <div class="lodr-document-info">
                                        <div class="lodr-document-name">Care mandate</div>
                                        <div class="lodr-document-meta">PDF</div>
                                    </div>
                                    <div class="lodr-document-icon">
                                        <i data-lucide="file-text"></i>
                                    </div>
                                </a>
                            </li>
                            <li class="lodr-document-item">
                                <a href="../assets/documents/Point 6/21. Care Consent Letter.pdf" target="_blank" class="lodr-document-link">
                                    <div class="lodr-document-info">
                                        <div class="lodr-document-name">Care Consent Letter</div>
                                        <div class="lodr-document-meta">PDF</div>
                                    </div>
                                    <div class="lodr-document-icon">
                                        <i data-lucide="file-text"></i>
                                    </div>
                                </a>
                            </li>
                            <li class="lodr-document-item">
                                <a href="../assets/documents/Point 6/22. Industry Report on Capital Markets and Stock Broking 18.12.23.pdf" target="_blank" class="lodr-document-link">
                                    <div class="lodr-document-info">
                                        <div class="lodr-document-name">Industry Report on Capital Markets and Stock Broking 18.12.23</div>
                                        <div class="lodr-document-meta">PDF</div>
                                    </div>
                                    <div class="lodr-document-icon">
                                        <i data-lucide="file-text"></i>
                                    </div>
                                </a>
                            </li>
                            <li class="lodr-document-item">
                                <a href="../assets/documents/Point 6/24. NSDL_Tripartite Agreement_Final.pdf" target="_blank" class="lodr-document-link">
                                    <div class="lodr-document-info">
                                        <div class="lodr-document-name">NSDL_Tripartite Agreement_Final</div>
                                        <div class="lodr-document-meta">PDF</div>
                                    </div>
                                    <div class="lodr-document-icon">
                                        <i data-lucide="file-text"></i>
                                    </div>
                                </a>
                            </li>
                            <li class="lodr-document-item">
                                <a href="../assets/documents/Point 6/25. CDSL_Tripartite Agreement_Final.pdf" target="_blank" class="lodr-document-link">
                                    <div class="lodr-document-info">
                                        <div class="lodr-document-name">CDSL_Tripartite Agreement_Final</div>
                                        <div class="lodr-document-meta">PDF</div>
                                    </div>
                                    <div class="lodr-document-icon">
                                        <i data-lucide="file-text"></i>
                                    </div>
                                </a>
                            </li>
                            <li class="lodr-document-item">
                                <a href="../assets/documents/Point 6/26. SEBI - Cover Letter.pdf" target="_blank" class="lodr-document-link">
                                    <div class="lodr-document-info">
                                        <div class="lodr-document-name">SEBI - Cover Letter</div>
                                        <div class="lodr-document-meta">PDF</div>
                                    </div>
                                    <div class="lodr-document-icon">
                                        <i data-lucide="file-text"></i>
                                    </div>
                                </a>
                            </li>
                            <li class="lodr-document-item">
                                <a href="../assets/documents/Point 6/29. RTA Contract 14 December 2023.pdf" target="_blank" class="lodr-document-link">
                                    <div class="lodr-document-info">
                                        <div class="lodr-document-name">RTA Contract 14 December 2023</div>
                                        <div class="lodr-document-meta">PDF</div>
                                    </div>
                                    <div class="lodr-document-icon">
                                        <i data-lucide="file-text"></i>
                                    </div>
                                </a>
                            </li>
                            <li class="lodr-document-item">
                                <a href="../assets/documents/Point 6/Kanga Consent.pdf" target="_blank" class="lodr-document-link">
                                    <div class="lodr-document-info">
                                        <div class="lodr-document-name">Kanga Consent</div>
                                        <div class="lodr-document-meta">PDF</div>
                                    </div>
                                    <div class="lodr-document-icon">
                                        <i data-lucide="file-text"></i>
                                    </div>
                                </a>
                            </li>
                            <li class="lodr-document-item" style="margin-top: 2rem; padding-top: 2rem; border-top: 2px solid #e8f4f8;">
                                <div style="font-family: 'Inter', sans-serif; font-size: 1rem; font-weight: 700; color: var(--calc-primary-blue); margin-bottom: 1rem;">MOA_AOA</div>
                            </li>
                            <li class="lodr-document-item">
                                <a href="../assets/documents/Point 6/01. MOA_AOA/AOA.pdf" target="_blank" class="lodr-document-link">
                                    <div class="lodr-document-info">
                                        <div class="lodr-document-name">AOA</div>
                                        <div class="lodr-document-meta">PDF</div>
                                    </div>
                                    <div class="lodr-document-icon">
                                        <i data-lucide="file-text"></i>
                                    </div>
                                </a>
                            </li>
                            <li class="lodr-document-item">
                                <a href="../assets/documents/Point 6/01. MOA_AOA/MOA.pdf" target="_blank" class="lodr-document-link">
                                    <div class="lodr-document-info">
                                        <div class="lodr-document-name">MOA</div>
                                        <div class="lodr-document-meta">PDF</div>
                                    </div>
                                    <div class="lodr-document-icon">
                                        <i data-lucide="file-text"></i>
                                    </div>
                                </a>
                            </li>
                            <li class="lodr-document-item" style="margin-top: 2rem; padding-top: 2rem; border-top: 2px solid #e8f4f8;">
                                <div style="font-family: 'Inter', sans-serif; font-size: 1rem; font-weight: 700; color: var(--calc-primary-blue); margin-bottom: 1rem;">Resolution</div>
                            </li>
                            <li class="lodr-document-item">
                                <a href="../assets/documents/Point 6/10. Resolution/10. EGM-JMD.pdf" target="_blank" class="lodr-document-link">
                                    <div class="lodr-document-info">
                                        <div class="lodr-document-name">EGM-JMD</div>
                                        <div class="lodr-document-meta">PDF</div>
                                    </div>
                                    <div class="lodr-document-icon">
                                        <i data-lucide="file-text"></i>
                                    </div>
                                </a>
                            </li>
                            <li class="lodr-document-item">
                                <a href="../assets/documents/Point 6/10. Resolution/10. EGM-MD.pdf" target="_blank" class="lodr-document-link">
                                    <div class="lodr-document-info">
                                        <div class="lodr-document-name">EGM-MD</div>
                                        <div class="lodr-document-meta">PDF</div>
                                    </div>
                                    <div class="lodr-document-icon">
                                        <i data-lucide="file-text"></i>
                                    </div>
                                </a>
                            </li>
                            <li class="lodr-document-item">
                                <a href="../assets/documents/Point 6/10. Resolution/10. EGM-WTD.pdf" target="_blank" class="lodr-document-link">
                                    <div class="lodr-document-info">
                                        <div class="lodr-document-name">EGM-WTD</div>
                                        <div class="lodr-document-meta">PDF</div>
                                    </div>
                                    <div class="lodr-document-icon">
                                        <i data-lucide="file-text"></i>
                                    </div>
                                </a>
                            </li>
                            <li class="lodr-document-item" style="margin-top: 2rem; padding-top: 2rem; border-top: 2px solid #e8f4f8;">
                                <div style="font-family: 'Inter', sans-serif; font-size: 1rem; font-weight: 700; color: var(--calc-primary-blue); margin-bottom: 1rem;">Consent and Transmittal Letter</div>
                            </li>
                            <li class="lodr-document-item">
                                <a href="../assets/documents/Point 6/11. Consent and Transmittal Letter/Alok Harlalka HUF_Consent.pdf" target="_blank" class="lodr-document-link">
                                    <div class="lodr-document-info">
                                        <div class="lodr-document-name">Alok Harlalka HUF_Consent</div>
                                        <div class="lodr-document-meta">PDF</div>
                                    </div>
                                    <div class="lodr-document-icon">
                                        <i data-lucide="file-text"></i>
                                    </div>
                                </a>
                            </li>
                            <li class="lodr-document-item">
                                <a href="../assets/documents/Point 6/11. Consent and Transmittal Letter/Alok Harlalka HUF_Transmittal.pdf" target="_blank" class="lodr-document-link">
                                    <div class="lodr-document-info">
                                        <div class="lodr-document-name">Alok Harlalka HUF_Transmittal</div>
                                        <div class="lodr-document-meta">PDF</div>
                                    </div>
                                    <div class="lodr-document-icon">
                                        <i data-lucide="file-text"></i>
                                    </div>
                                </a>
                            </li>
                            <li class="lodr-document-item">
                                <a href="../assets/documents/Point 6/11. Consent and Transmittal Letter/Sashi Harlalka_Consent.pdf" target="_blank" class="lodr-document-link">
                                    <div class="lodr-document-info">
                                        <div class="lodr-document-name">Sashi Harlalka_Consent</div>
                                        <div class="lodr-document-meta">PDF</div>
                                    </div>
                                    <div class="lodr-document-icon">
                                        <i data-lucide="file-text"></i>
                                    </div>
                                </a>
                            </li>
                            <li class="lodr-document-item">
                                <a href="../assets/documents/Point 6/11. Consent and Transmittal Letter/Sashi Harlalka_Transmittal.pdf" target="_blank" class="lodr-document-link">
                                    <div class="lodr-document-info">
                                        <div class="lodr-document-name">Sashi Harlalka_Transmittal</div>
                                        <div class="lodr-document-meta">PDF</div>
                                    </div>
                                    <div class="lodr-document-icon">
                                        <i data-lucide="file-text"></i>
                                    </div>
                                </a>
                            </li>
                            <li class="lodr-document-item">
                                <a href="../assets/documents/Point 6/11. Consent and Transmittal Letter/Sumeet Harlalka_Consent.pdf" target="_blank" class="lodr-document-link">
                                    <div class="lodr-document-info">
                                        <div class="lodr-document-name">Sumeet Harlalka_Consent</div>
                                        <div class="lodr-document-meta">PDF</div>
                                    </div>
                                    <div class="lodr-document-icon">
                                        <i data-lucide="file-text"></i>
                                    </div>
                                </a>
                            </li>
                            <li class="lodr-document-item">
                                <a href="../assets/documents/Point 6/11. Consent and Transmittal Letter/Sumeet Harlalka_Transmittal.pdf" target="_blank" class="lodr-document-link">
                                    <div class="lodr-document-info">
                                        <div class="lodr-document-name">Sumeet Harlalka_Transmittal</div>
                                        <div class="lodr-document-meta">PDF</div>
                                    </div>
                                    <div class="lodr-document-icon">
                                        <i data-lucide="file-text"></i>
                                    </div>
                                </a>
                            </li>
                            <li class="lodr-document-item" style="margin-top: 2rem; padding-top: 2rem; border-top: 2px solid #e8f4f8;">
                                <div style="font-family: 'Inter', sans-serif; font-size: 1rem; font-weight: 700; color: var(--calc-primary-blue); margin-bottom: 1rem;">Annual Returns</div>
                            </li>
                            <li class="lodr-document-item">
                                <a href="../assets/documents/Point 6/14. AR/AR_2020-21.pdf" target="_blank" class="lodr-document-link">
                                    <div class="lodr-document-info">
                                        <div class="lodr-document-name">Annual_Returns_2020-21</div>
                                        <div class="lodr-document-meta">PDF</div>
                                    </div>
                                    <div class="lodr-document-icon">
                                        <i data-lucide="file-text"></i>
                                    </div>
                                </a>
                            </li>
                            <li class="lodr-document-item">
                                <a href="../assets/documents/Point 6/14. AR/AR_2021-22.pdf" target="_blank" class="lodr-document-link">
                                    <div class="lodr-document-info">
                                        <div class="lodr-document-name">Annual_Returns_2021-22</div>
                                        <div class="lodr-document-meta">PDF</div>
                                    </div>
                                    <div class="lodr-document-icon">
                                        <i data-lucide="file-text"></i>
                                    </div>
                                </a>
                            </li>
                            <li class="lodr-document-item">
                                <a href="../assets/documents/Point 6/14. AR/AR_2022-23.pdf" target="_blank" class="lodr-document-link">
                                    <div class="lodr-document-info">
                                        <div class="lodr-document-name">Annual_Returns_2022-23</div>
                                        <div class="lodr-document-meta">PDF</div>
                                    </div>
                                    <div class="lodr-document-icon">
                                        <i data-lucide="file-text"></i>
                                    </div>
                                </a>
                            </li>
                            <li class="lodr-document-item">
                                <a href="../assets/documents/Point 6/14. AR/FS_2023/GSBL_Standalone_Audit Report_2023.pdf" target="_blank" class="lodr-document-link">
                                    <div class="lodr-document-info">
                                        <div class="lodr-document-name">GSBL_Standalone_Audit Report_2023</div>
                                        <div class="lodr-document-meta">PDF</div>
                                    </div>
                                    <div class="lodr-document-icon">
                                        <i data-lucide="file-text"></i>
                                    </div>
                                </a>
                            </li>
                            <li class="lodr-document-item" style="margin-top: 2rem; padding-top: 2rem; border-top: 2px solid #e8f4f8;">
                                <div style="font-family: 'Inter', sans-serif; font-size: 1rem; font-weight: 700; color: var(--calc-primary-blue); margin-bottom: 1rem;">Consents - Directors</div>
                            </li>
                            <li class="lodr-document-item">
                                <a href="../assets/documents/Directors/Anjali Sakpal consent 13th December 2023.pdf" target="_blank" class="lodr-document-link">
                                    <div class="lodr-document-info">
                                        <div class="lodr-document-name">Anjali Sakpal consent 13th December 2023</div>
                                        <div class="lodr-document-meta">PDF</div>
                                    </div>
                                    <div class="lodr-document-icon">
                                        <i data-lucide="file-text"></i>
                                    </div>
                                </a>
                            </li>
                            <li class="lodr-document-item">
                                <a href="../assets/documents/Directors/Arvind Harlalka .pdf" target="_blank" class="lodr-document-link">
                                    <div class="lodr-document-info">
                                        <div class="lodr-document-name">Arvind Harlalka</div>
                                        <div class="lodr-document-meta">PDF</div>
                                    </div>
                                    <div class="lodr-document-icon">
                                        <i data-lucide="file-text"></i>
                                    </div>
                                </a>
                            </li>
                            <li class="lodr-document-item">
                                <a href="../assets/documents/Directors/Jiten Shah Consent Letter.pdf" target="_blank" class="lodr-document-link">
                                    <div class="lodr-document-info">
                                        <div class="lodr-document-name">Jiten Shah Consent Letter</div>
                                        <div class="lodr-document-meta">PDF</div>
                                    </div>
                                    <div class="lodr-document-icon">
                                        <i data-lucide="file-text"></i>
                                    </div>
                                </a>
                            </li>
                            <li class="lodr-document-item">
                                <a href="../assets/documents/Directors/NAVDEEP JI consent 13th December 2023.pdf" target="_blank" class="lodr-document-link">
                                    <div class="lodr-document-info">
                                        <div class="lodr-document-name">NAVDEEP JI consent 13th December 2023</div>
                                        <div class="lodr-document-meta">PDF</div>
                                    </div>
                                    <div class="lodr-document-icon">
                                        <i data-lucide="file-text"></i>
                                    </div>
                                </a>
                            </li>
                            <li class="lodr-document-item">
                                <a href="../assets/documents/Directors/Consent Letter_Vivek.pdf" target="_blank" class="lodr-document-link">
                                    <div class="lodr-document-info">
                                        <div class="lodr-document-name">Consent Letter Vivek</div>
                                        <div class="lodr-document-meta">PDF</div>
                                    </div>
                                    <div class="lodr-document-icon">
                                        <i data-lucide="file-text"></i>
                                    </div>
                                </a>
                            </li>
                            <li class="lodr-document-item">
                                <a href="../assets/documents/Directors/Consent_Deepak1.PDF" target="_blank" class="lodr-document-link">
                                    <div class="lodr-document-info">
                                        <div class="lodr-document-name">Consent Letter Deepak</div>
                                        <div class="lodr-document-meta">PDF</div>
                                    </div>
                                    <div class="lodr-document-icon">
                                        <i data-lucide="file-text"></i>
                                    </div>
                                </a>
                            </li>
                            <li class="lodr-document-item">
                                <a href="../assets/documents/Directors/Consent_Alok1.PDF" target="_blank" class="lodr-document-link">
                                    <div class="lodr-document-info">
                                        <div class="lodr-document-name">Consent Letter Alok</div>
                                        <div class="lodr-document-meta">PDF</div>
                                    </div>
                                    <div class="lodr-document-icon">
                                        <i data-lucide="file-text"></i>
                                    </div>
                                </a>
                            </li>
                            <li class="lodr-document-item" style="margin-top: 2rem; padding-top: 2rem; border-top: 2px solid #e8f4f8;">
                                <div style="font-family: 'Inter', sans-serif; font-size: 1rem; font-weight: 700; color: var(--calc-primary-blue); margin-bottom: 1rem;">Consents - Promotors</div>
                            </li>
                            <li class="lodr-document-item">
                                <a href="../assets/documents/Point 6/19. Consent/02. Promotors/Promotors - 9.pdf" target="_blank" class="lodr-document-link">
                                    <div class="lodr-document-info">
                                        <div class="lodr-document-name">Promotors - 9</div>
                                        <div class="lodr-document-meta">PDF</div>
                                    </div>
                                    <div class="lodr-document-icon">
                                        <i data-lucide="file-text"></i>
                                    </div>
                                </a>
                            </li>
                            <li class="lodr-document-item" style="margin-top: 2rem; padding-top: 2rem; border-top: 2px solid #e8f4f8;">
                                <div style="font-family: 'Inter', sans-serif; font-size: 1rem; font-weight: 700; color: var(--calc-primary-blue); margin-bottom: 1rem;">Consents - Bankers to Company</div>
                            </li>
                            <li class="lodr-document-item">
                                <a href="../assets/documents/Point 6/19. Consent/03. Bankers to Company/Gretex_Consent Letter.pdf" target="_blank" class="lodr-document-link">
                                    <div class="lodr-document-info">
                                        <div class="lodr-document-name">Gretex_Consent Letter</div>
                                        <div class="lodr-document-meta">PDF</div>
                                    </div>
                                    <div class="lodr-document-icon">
                                        <i data-lucide="file-text"></i>
                                    </div>
                                </a>
                            </li>
                            <li class="lodr-document-item" style="margin-top: 2rem; padding-top: 2rem; border-top: 2px solid #e8f4f8;">
                                <div style="font-family: 'Inter', sans-serif; font-size: 1rem; font-weight: 700; color: var(--calc-primary-blue); margin-bottom: 1rem;">Consents - CFO</div>
                            </li>
                            <li class="lodr-document-item">
                                <a href="../assets/documents/Point 6/19. Consent/04. CFO/Deepak Shah_Consent CFO.pdf" target="_blank" class="lodr-document-link">
                                    <div class="lodr-document-info">
                                        <div class="lodr-document-name">Deepak Shah_Consent CFO</div>
                                        <div class="lodr-document-meta">PDF</div>
                                    </div>
                                    <div class="lodr-document-icon">
                                        <i data-lucide="file-text"></i>
                                    </div>
                                </a>
                            </li>
                            <li class="lodr-document-item" style="margin-top: 2rem; padding-top: 2rem; border-top: 2px solid #e8f4f8;">
                                <div style="font-family: 'Inter', sans-serif; font-size: 1rem; font-weight: 700; color: var(--calc-primary-blue); margin-bottom: 1rem;">Consents - CS and Compliance Officer</div>
                            </li>
                            <li class="lodr-document-item">
                                <a href="../assets/documents/Point 6/19. Consent/05. CS and Compliance Officer/Consent_CS_Niket Thakkar.pdf" target="_blank" class="lodr-document-link">
                                    <div class="lodr-document-info">
                                        <div class="lodr-document-name">Consent CS Niket Thakkar</div>
                                        <div class="lodr-document-meta">PDF</div>
                                    </div>
                                    <div class="lodr-document-icon">
                                        <i data-lucide="file-text"></i>
                                    </div>
                                </a>
                            </li>
                            <li class="lodr-document-item">
                                <a href="../assets/documents/Point 6/19. Consent/05. CS and Compliance Officer/Consent_Compliance Officer _Meenu Walia.pdf" target="_blank" class="lodr-document-link">
                                    <div class="lodr-document-info">
                                        <div class="lodr-document-name">Consent_Compliance Officer _Meenu Walia</div>
                                        <div class="lodr-document-meta">PDF</div>
                                    </div>
                                    <div class="lodr-document-icon">
                                        <i data-lucide="file-text"></i>
                                    </div>
                                </a>
                            </li>
                            <li class="lodr-document-item" style="margin-top: 2rem; padding-top: 2rem; border-top: 2px solid #e8f4f8;">
                                <div style="font-family: 'Inter', sans-serif; font-size: 1rem; font-weight: 700; color: var(--calc-primary-blue); margin-bottom: 1rem;">Consents - RTA</div>
                            </li>
                            <li class="lodr-document-item">
                                <a href="../assets/documents/Point 6/19. Consent/06. RTA/RTA -28-09-2023.pdf" target="_blank" class="lodr-document-link">
                                    <div class="lodr-document-info">
                                        <div class="lodr-document-name">RTA -28-09-2023</div>
                                        <div class="lodr-document-meta">PDF</div>
                                    </div>
                                    <div class="lodr-document-icon">
                                        <i data-lucide="file-text"></i>
                                    </div>
                                </a>
                            </li>
                            <li class="lodr-document-item" style="margin-top: 2rem; padding-top: 2rem; border-top: 2px solid #e8f4f8;">
                                <div style="font-family: 'Inter', sans-serif; font-size: 1rem; font-weight: 700; color: var(--calc-primary-blue); margin-bottom: 1rem;">Consents - BRLM</div>
                            </li>
                            <li class="lodr-document-item">
                                <a href="../assets/documents/Point 6/19. Consent/07. BRLM/BRLM Consent - Signed.pdf" target="_blank" class="lodr-document-link">
                                    <div class="lodr-document-info">
                                        <div class="lodr-document-name">BRLM Consent - Signed</div>
                                        <div class="lodr-document-meta">PDF</div>
                                    </div>
                                    <div class="lodr-document-icon">
                                        <i data-lucide="file-text"></i>
                                    </div>
                                </a>
                            </li>
                            <li class="lodr-document-item" style="margin-top: 2rem; padding-top: 2rem; border-top: 2px solid #e8f4f8;">
                                <div style="font-family: 'Inter', sans-serif; font-size: 1rem; font-weight: 700; color: var(--calc-primary-blue); margin-bottom: 1rem;">Consents - Legal</div>
                            </li>
                            <li class="lodr-document-item">
                                <a href="../assets/documents/Point 6/19. Consent/08. Legal/Kanga Consent.pdf" target="_blank" class="lodr-document-link">
                                    <div class="lodr-document-info">
                                        <div class="lodr-document-name">Kanga Consent</div>
                                        <div class="lodr-document-meta">PDF</div>
                                    </div>
                                    <div class="lodr-document-icon">
                                        <i data-lucide="file-text"></i>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <!-- DRHP and industry report Section -->
                    <div id="drhp-industry-report" class="lodr-document-section" style="display: none;">
                        <h3 class="lodr-section-title">DRHP and industry report</h3>
                        <ul class="lodr-document-list">
                            <li class="lodr-document-item">
                                <a href="../assets/documents/Point 7/DRHP.pdf" target="_blank" class="lodr-document-link">
                                    <div class="lodr-document-info">
                                        <div class="lodr-document-name">DRHP</div>
                                        <div class="lodr-document-meta">PDF</div>
                                    </div>
                                    <div class="lodr-document-icon">
                                        <i data-lucide="file-text"></i>
                                    </div>
                                </a>
                            </li>
                            <li class="lodr-document-item">
                                <a href="../assets/documents/Point 7/Industry Report on Capital Markets and Stock Broking 18.12.23.pdf" target="_blank" class="lodr-document-link">
                                    <div class="lodr-document-info">
                                        <div class="lodr-document-name">Industry Report on Capital Markets and Stock Broking 18.12.23</div>
                                        <div class="lodr-document-meta">PDF</div>
                                    </div>
                                    <div class="lodr-document-icon">
                                        <i data-lucide="file-text"></i>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <!-- Insider Trading Policy Section -->
                    <div id="insider-trading-policy" class="lodr-document-section" style="display: none;">
                        <h3 class="lodr-section-title">Insider Trading Policy</h3>
                        <div style="background: #ffffff; border-radius: 12px; padding: 2rem; border: 1px solid #e8f4f8; margin-bottom: 2rem; box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);">
                            <h4 style="font-family: 'Inter', sans-serif; font-size: 1.125rem; font-weight: 700; color: var(--calc-primary-blue); margin: 0 0 1rem 0;">
                                Insider Trading Policy
                            </h4>
                            <p style="font-family: 'Plus Jakarta Sans', sans-serif; font-size: 0.9375rem; line-height: 1.7; color: #4a4a4a; margin: 0;">
                                Code of practices and procedures for fair disclosure of unpublished price sensitive information including fair disclosure of UPSI and policy for legitimate purposes for sharing UPSI
                            </p>
                        </div>
                        <ul class="lodr-document-list">
                            <li class="lodr-document-item">
                                <a href="../assets/documents/Point 31/Code of Conduct for Prohibition of Insider Trading_Done.pdf" target="_blank" class="lodr-document-link">
                                    <div class="lodr-document-info">
                                        <div class="lodr-document-name">Code of Conduct for Prohibition of Insider Trading_Done</div>
                                        <div class="lodr-document-meta">PDF</div>
                                    </div>
                                    <div class="lodr-document-icon">
                                        <i data-lucide="file-text"></i>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <!-- Code of practices and procedures for fair disclosure Section -->
                    <div id="fair-disclosure-code" class="lodr-document-section" style="display: none;">
                        <h3 class="lodr-section-title">Code of practices and procedures for fair disclosure of unpublished price sensitive information including fair disclosure of</h3>
                        <div style="background: #ffffff; border-radius: 12px; padding: 2rem; border: 1px solid #e8f4f8; margin-bottom: 2rem; box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);">
                            <p style="font-family: 'Plus Jakarta Sans', sans-serif; font-size: 0.9375rem; line-height: 1.7; color: #4a4a4a; margin: 0;">
                                Code of practices and procedures for fair disclosure of unpublished price sensitive information including fair disclosure of UPSI and policy for legitimate purposes for sharing UPSI
                            </p>
                        </div>
                        <ul class="lodr-document-list">
                            <li class="lodr-document-item">
                                <a href="../assets/documents/Point 32/Code of Practice & Procedure of UPSI_Done.pdf" target="_blank" class="lodr-document-link">
                                    <div class="lodr-document-info">
                                        <div class="lodr-document-name">Code of Practice & Procedure of UPSI_Done</div>
                                        <div class="lodr-document-meta">PDF</div>
                                    </div>
                                    <div class="lodr-document-icon">
                                        <i data-lucide="file-text"></i>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <!-- Policy relating to qualification and remuneration of directors Section -->
                    <div id="directors-remuneration-policy" class="lodr-document-section" style="display: none;">
                        <h3 class="lodr-section-title">Policy relating to qualification and remuneration of directors and key managerial personnel</h3>
                        <ul class="lodr-document-list">
                            <li class="lodr-document-item">
                                <a href="../assets/documents/Point 33/Nomination & Remuneration Policy Done.pdf" target="_blank" class="lodr-document-link">
                                    <div class="lodr-document-info">
                                        <div class="lodr-document-name">Nomination & Remuneration Policy Done</div>
                                        <div class="lodr-document-meta">PDF</div>
                                    </div>
                                    <div class="lodr-document-icon">
                                        <i data-lucide="file-text"></i>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <!-- CSR Policy and projects approved by board Section -->
                    <div id="csr-policy" class="lodr-document-section" style="display: none;">
                        <h3 class="lodr-section-title">CSR Policy and projects approved by board of directors</h3>
                        <ul class="lodr-document-list">
                            <li class="lodr-document-item">
                                <a href="../assets/documents/Point 34/CSR Policy.pdf" target="_blank" class="lodr-document-link">
                                    <div class="lodr-document-info">
                                        <div class="lodr-document-name">CSR Policy</div>
                                        <div class="lodr-document-meta">PDF</div>
                                    </div>
                                    <div class="lodr-document-icon">
                                        <i data-lucide="file-text"></i>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <!-- Annual Return Section -->
                    <div id="annual-return" class="lodr-document-section" style="display: none;">
                        <h3 class="lodr-section-title">Annual Return</h3>
                        <ul class="lodr-document-list">
                            <li class="lodr-document-item">
                                <a href="../assets/documents/Point 35/2020-21.pdf" target="_blank" class="lodr-document-link">
                                    <div class="lodr-document-info">
                                        <div class="lodr-document-name">2020-21</div>
                                        <div class="lodr-document-meta">PDF</div>
                                    </div>
                                    <div class="lodr-document-icon">
                                        <i data-lucide="file-text"></i>
                                    </div>
                                </a>
                            </li>
                            <li class="lodr-document-item">
                                <a href="../assets/documents/Point 35/2021-22.pdf" target="_blank" class="lodr-document-link">
                                    <div class="lodr-document-info">
                                        <div class="lodr-document-name">2021-22</div>
                                        <div class="lodr-document-meta">PDF</div>
                                    </div>
                                    <div class="lodr-document-icon">
                                        <i data-lucide="file-text"></i>
                                    </div>
                                </a>
                            </li>
                            <li class="lodr-document-item">
                                <a href="../assets/documents/Point 35/2022-23.pdf" target="_blank" class="lodr-document-link">
                                    <div class="lodr-document-info">
                                        <div class="lodr-document-name">2022-23</div>
                                        <div class="lodr-document-meta">PDF</div>
                                    </div>
                                    <div class="lodr-document-icon">
                                        <i data-lucide="file-text"></i>
                                    </div>
                                </a>
                            </li>
                            <li class="lodr-document-item">
                                <a href="../assets/documents/GSBL_Annual Return_FY 23-24.pdf" target="_blank" class="lodr-document-link">
                                    <div class="lodr-document-info">
                                        <div class="lodr-document-name">2023-24</div>
                                        <div class="lodr-document-meta">PDF</div>
                                    </div>
                                    <div class="lodr-document-icon">
                                        <i data-lucide="file-text"></i>
                                    </div>
                                </a>
                            </li>
                            <li class="lodr-document-item">
                                <a href="../assets/documents/gsbl-mgt-7-2024-25.pdf" target="_blank" class="lodr-document-link">
                                    <div class="lodr-document-info">
                                        <div class="lodr-document-name">2024-25</div>
                                        <div class="lodr-document-meta">PDF</div>
                                    </div>
                                    <div class="lodr-document-icon">
                                        <i data-lucide="file-text"></i>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <!-- Other Policies Section -->
                    <div id="other-policies" class="lodr-document-section">
                        <h3 class="lodr-section-title">Other Policies</h3>
                        <ul class="lodr-document-list">
                            <li class="lodr-document-item">
                                <a href="../assets/documents/Point 8/Other Policies/Antibribery Policy.pdf" target="_blank" class="lodr-document-link">
                                    <div class="lodr-document-info">
                                        <div class="lodr-document-name">Antibribery Policy</div>
                                        <div class="lodr-document-meta">PDF</div>
                                    </div>
                                    <div class="lodr-document-icon">
                                        <i data-lucide="file-text"></i>
                                    </div>
                                </a>
                            </li>
                            <li class="lodr-document-item">
                                <a href="../assets/documents/Point 8/Other Policies/Policy on Board Diversity Done.pdf" target="_blank" class="lodr-document-link">
                                    <div class="lodr-document-info">
                                        <div class="lodr-document-name">Policy on Board Diversity Done</div>
                                        <div class="lodr-document-meta">PDF</div>
                                    </div>
                                    <div class="lodr-document-icon">
                                        <i data-lucide="file-text"></i>
                                    </div>
                                </a>
                            </li>
                            <li class="lodr-document-item">
                                <a href="../assets/documents/Point 8/Other Policies/Policy on Board Evaluation_Done.pdf" target="_blank" class="lodr-document-link">
                                    <div class="lodr-document-info">
                                        <div class="lodr-document-name">Policy on Board Evaluation_Done</div>
                                        <div class="lodr-document-meta">PDF</div>
                                    </div>
                                    <div class="lodr-document-icon">
                                        <i data-lucide="file-text"></i>
                                    </div>
                                </a>
                            </li>
                            <li class="lodr-document-item">
                                <a href="../assets/documents/Point 8/Other Policies/Audit Committee Done.pdf" target="_blank" class="lodr-document-link">
                                    <div class="lodr-document-info">
                                        <div class="lodr-document-name">Audit Committee Done</div>
                                        <div class="lodr-document-meta">PDF</div>
                                    </div>
                                    <div class="lodr-document-icon">
                                        <i data-lucide="file-text"></i>
                                    </div>
                                </a>
                            </li>
                            <li class="lodr-document-item">
                                <a href="../assets/documents/Point 8/Other Policies/Policy on Succession Planning.pdf" target="_blank" class="lodr-document-link">
                                    <div class="lodr-document-info">
                                        <div class="lodr-document-name">Policy on Succession Planning</div>
                                        <div class="lodr-document-meta">PDF</div>
                                    </div>
                                    <div class="lodr-document-icon">
                                        <i data-lucide="file-text"></i>
                                    </div>
                                </a>
                            </li>
                            <li class="lodr-document-item">
                                <a href="../assets/documents/Point 8/Other Policies/Prevention of Sexual Harassment Policy.pdf" target="_blank" class="lodr-document-link">
                                    <div class="lodr-document-info">
                                        <div class="lodr-document-name">Prevention of Sexual Harassment Policy</div>
                                        <div class="lodr-document-meta">PDF</div>
                                    </div>
                                    <div class="lodr-document-icon">
                                        <i data-lucide="file-text"></i>
                                    </div>
                                </a>
                            </li>
                            <li class="lodr-document-item">
                                <a href="../assets/documents/Point 8/Other Policies/Risk assessment and management plan policy.pdf" target="_blank" class="lodr-document-link">
                                    <div class="lodr-document-info">
                                        <div class="lodr-document-name">Risk assessment and management plan policy</div>
                                        <div class="lodr-document-meta">PDF</div>
                                    </div>
                                    <div class="lodr-document-icon">
                                        <i data-lucide="file-text"></i>
                                    </div>
                                </a>
                            </li>
                            <li class="lodr-document-item">
                                <a href="../assets/documents/Point 8/Other Policies/Stakeholder Relationship Committe Done.pdf" target="_blank" class="lodr-document-link">
                                    <div class="lodr-document-info">
                                        <div class="lodr-document-name">Stakeholder Relationship Committe Done</div>
                                        <div class="lodr-document-meta">PDF</div>
                                    </div>
                                    <div class="lodr-document-icon">
                                        <i data-lucide="file-text"></i>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <!-- Archival Policy Section -->
                    <div id="archival-policy" class="lodr-document-section" style="display: none;">
                        <h3 class="lodr-section-title">Archival Policy</h3>
                        <ul class="lodr-document-list">
                            <li class="lodr-document-item">
                                <a href="../assets/documents/Point 8/Archival Policy.pdf" target="_blank" class="lodr-document-link">
                                    <div class="lodr-document-info">
                                        <div class="lodr-document-name">Archival Policy</div>
                                        <div class="lodr-document-meta">PDF</div>
                                    </div>
                                    <div class="lodr-document-icon">
                                        <i data-lucide="file-text"></i>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <!-- Policy on determination of materiality for disclosure Section -->
                    <div id="materiality-policy" class="lodr-document-section" style="display: none;">
                        <h3 class="lodr-section-title">Policy on determination of materiality for disclosure</h3>
                        <ul class="lodr-document-list">
                            <li class="lodr-document-item">
                                <a href="../assets/documents/Point 9/Policy on determination of materiality for disclosure.pdf" target="_blank" class="lodr-document-link">
                                    <div class="lodr-document-info">
                                        <div class="lodr-document-name">Policy on determination of materiality for disclosure</div>
                                        <div class="lodr-document-meta">PDF</div>
                                    </div>
                                    <div class="lodr-document-icon">
                                        <i data-lucide="file-text"></i>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <!-- Annual Report and Notice of Annual General Meeting Section -->
                    <div id="annual-report-agm" class="lodr-document-section" style="display: none;">
                        <h3 class="lodr-section-title">Annual Report and Notice of Annual General Meeting</h3>
                        <ul class="lodr-document-list">
                            <li class="lodr-document-item">
                                <a href="../assets/documents/Point 10/Annual Report and Notice of Annual General Meeting 2023.pdf" target="_blank" class="lodr-document-link">
                                    <div class="lodr-document-info">
                                        <div class="lodr-document-name">Annual Report 2022–2023</div>
                                        <div class="lodr-document-meta">PDF</div>
                                    </div>
                                    <div class="lodr-document-icon">
                                        <i data-lucide="file-text"></i>
                                    </div>
                                </a>
                            </li>
                            <li class="lodr-document-item">
                                <a href="../assets/documents/Annual Report 2023-2024.pdf" target="_blank" class="lodr-document-link">
                                    <div class="lodr-document-info">
                                        <div class="lodr-document-name">Annual Report 2023-2024</div>
                                        <div class="lodr-document-meta">PDF</div>
                                    </div>
                                    <div class="lodr-document-icon">
                                        <i data-lucide="file-text"></i>
                                    </div>
                                </a>
                            </li>
                            <li class="lodr-document-item">
                                <a href="../assets/documents/gsbl-annual-report-2024-2025-min.pdf" target="_blank" class="lodr-document-link">
                                    <div class="lodr-document-info">
                                        <div class="lodr-document-name">Annual Report 2024-2025</div>
                                        <div class="lodr-document-meta">PDF</div>
                                    </div>
                                    <div class="lodr-document-icon">
                                        <i data-lucide="file-text"></i>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <!-- Details of the business of the Company Section -->
                    <div id="business-details" class="lodr-document-section" style="display: none;">
                        <h3 class="lodr-section-title">Details of the business of the Company</h3>
                        <ul class="lodr-document-list">
                            <li class="lodr-document-item">
                                <a href="../assets/documents/Point 11/Alok Harlalka HUF_Transmittal.pdf" target="_blank" class="lodr-document-link">
                                    <div class="lodr-document-info">
                                        <div class="lodr-document-name">Alok Harlalka HUF_Transmittal</div>
                                        <div class="lodr-document-meta">PDF</div>
                                    </div>
                                    <div class="lodr-document-icon">
                                        <i data-lucide="file-text"></i>
                                    </div>
                                </a>
                            </li>
                            <li class="lodr-document-item">
                                <a href="../assets/documents/Point 11/Alok Harlalka_Consent.pdf" target="_blank" class="lodr-document-link">
                                    <div class="lodr-document-info">
                                        <div class="lodr-document-name">Alok Harlalka_Consent</div>
                                        <div class="lodr-document-meta">PDF</div>
                                    </div>
                                    <div class="lodr-document-icon">
                                        <i data-lucide="file-text"></i>
                                    </div>
                                </a>
                            </li>
                            <li class="lodr-document-item">
                                <a href="../assets/documents/Point 11/Sashi Harlalka_Consent.pdf" target="_blank" class="lodr-document-link">
                                    <div class="lodr-document-info">
                                        <div class="lodr-document-name">Sashi Harlalka_Consent</div>
                                        <div class="lodr-document-meta">PDF</div>
                                    </div>
                                    <div class="lodr-document-icon">
                                        <i data-lucide="file-text"></i>
                                    </div>
                                </a>
                            </li>
                            <li class="lodr-document-item">
                                <a href="../assets/documents/Point 11/Sashi Harlalka_Transmittal.pdf" target="_blank" class="lodr-document-link">
                                    <div class="lodr-document-info">
                                        <div class="lodr-document-name">Sashi Harlalka_Transmittal</div>
                                        <div class="lodr-document-meta">PDF</div>
                                    </div>
                                    <div class="lodr-document-icon">
                                        <i data-lucide="file-text"></i>
                                    </div>
                                </a>
                            </li>
                            <li class="lodr-document-item">
                                <a href="../assets/documents/Point 11/Sumeet Harlalka_Consent.pdf" target="_blank" class="lodr-document-link">
                                    <div class="lodr-document-info">
                                        <div class="lodr-document-name">Sumeet Harlalka_Consent</div>
                                        <div class="lodr-document-meta">PDF</div>
                                    </div>
                                    <div class="lodr-document-icon">
                                        <i data-lucide="file-text"></i>
                                    </div>
                                </a>
                            </li>
                            <li class="lodr-document-item">
                                <a href="../assets/documents/Point 11/Sumeet Harlalka_Transmittal.pdf" target="_blank" class="lodr-document-link">
                                    <div class="lodr-document-info">
                                        <div class="lodr-document-name">Sumeet Harlalka_Transmittal</div>
                                        <div class="lodr-document-meta">PDF</div>
                                    </div>
                                    <div class="lodr-document-icon">
                                        <i data-lucide="file-text"></i>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <!-- Composition of Committees Section -->
                    <div id="committee-composition" class="lodr-document-section" style="display: none;">
                        <h3 class="lodr-section-title">Composition of Committees</h3>
                        <ul class="lodr-document-list">
                            <li class="lodr-document-item">
                                <a href="../assets/documents/Point 13/Committes Details.pdf" target="_blank" class="lodr-document-link">
                                    <div class="lodr-document-info">
                                        <div class="lodr-document-name">Committes Details</div>
                                        <div class="lodr-document-meta">PDF</div>
                                    </div>
                                    <div class="lodr-document-icon">
                                        <i data-lucide="file-text"></i>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <!-- Code of Conduct by board of directors and senior managerial personnel Section -->
                    <div id="code-of-conduct" class="lodr-document-section" style="display: none;">
                        <h3 class="lodr-section-title">Code of Conduct by board of directors and senior managerial personnel</h3>
                        <ul class="lodr-document-list">
                            <li class="lodr-document-item">
                                <a href="../assets/documents/Point 14/Code of Conduct for BoD and SMP_Done (1).pdf" target="_blank" class="lodr-document-link">
                                    <div class="lodr-document-info">
                                        <div class="lodr-document-name">Code of Conduct for BoD and SMP_Done</div>
                                        <div class="lodr-document-meta">PDF</div>
                                    </div>
                                    <div class="lodr-document-icon">
                                        <i data-lucide="file-text"></i>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <!-- Whistle Blower Policy Section -->
                    <div id="whistle-blower" class="lodr-document-section" style="display: none;">
                        <h3 class="lodr-section-title">Whistle Blower Policy</h3>
                        <ul class="lodr-document-list">
                            <li class="lodr-document-item">
                                <a href="../assets/documents/Point 15/Vigil Mechanism - Whistleblower Policy.pdf" target="_blank" class="lodr-document-link">
                                    <div class="lodr-document-info">
                                        <div class="lodr-document-name">Vigil Mechanism - Whistleblower Policy</div>
                                        <div class="lodr-document-meta">PDF</div>
                                    </div>
                                    <div class="lodr-document-icon">
                                        <i data-lucide="file-text"></i>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <!-- Policy on related party transactions Section -->
                    <div id="related-party-transactions" class="lodr-document-section" style="display: none;">
                        <h3 class="lodr-section-title">Policy on related party transactions</h3>
                        <ul class="lodr-document-list">
                            <li class="lodr-document-item">
                                <a href="../assets/documents/Point 16/Policy on related party transactions.pdf" target="_blank" class="lodr-document-link">
                                    <div class="lodr-document-info">
                                        <div class="lodr-document-name">Policy on related party transactions</div>
                                        <div class="lodr-document-meta">PDF</div>
                                    </div>
                                    <div class="lodr-document-icon">
                                        <i data-lucide="file-text"></i>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <!-- Policy for determining "material" subsidiaries Section -->
                    <div id="material-subsidiaries" class="lodr-document-section" style="display: none;">
                        <h3 class="lodr-section-title">Policy for determining "material" subsidiaries</h3>
                        <ul class="lodr-document-list">
                            <li class="lodr-document-item">
                                <a href="../assets/documents/Point 17/Material_Subsidiary_Policy.pdf" target="_blank" class="lodr-document-link">
                                    <div class="lodr-document-info">
                                        <div class="lodr-document-name">Material_Subsidiary_Policy</div>
                                        <div class="lodr-document-meta">PDF</div>
                                    </div>
                                    <div class="lodr-document-icon">
                                        <i data-lucide="file-text"></i>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <!-- Shareholding pattern Section -->
                    <div id="shareholding-pattern" class="lodr-document-section" style="display: none;">
                        <h3 class="lodr-section-title">Shareholding pattern</h3>
                        <div class="lodr-year-selector" style="margin-bottom: 2rem; display: flex; align-items: center; gap: 1rem; justify-content: flex-end;">
                            <label style="font-family: 'Inter', sans-serif; font-size: 0.9375rem; font-weight: 600; color: var(--calc-primary-blue);">Select Year:</label>
                            <select id="selectyear-shareholding" onchange="ShareholdingOnChange()" style="padding: 0.5rem 1rem; border: 2px solid #e0e0e0; border-radius: 8px; font-family: 'Plus Jakarta Sans', sans-serif; font-size: 0.9375rem; min-width: 150px;">
                                <option value="2023" selected>2022-2023</option>
                                <option value="2022">2021-2022</option>
                                <option value="2021">2020-2021</option>
                            </select>
                        </div>
                        <div id="shareholding-2021" style="display: none;">
                            <ul class="lodr-document-list">
                                <li class="lodr-document-item">
                                    <a href="../assets/documents/Point 21/2021/list of shareholders gretex share broking pvt ltd.pdf" target="_blank" class="lodr-document-link">
                                        <div class="lodr-document-info">
                                            <div class="lodr-document-name">list of shareholders gretex share broking pvt ltd</div>
                                            <div class="lodr-document-meta">PDF • 2020-2021</div>
                                        </div>
                                        <div class="lodr-document-icon">
                                            <i data-lucide="file-text"></i>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div id="shareholding-2022" style="display: none;">
                            <ul class="lodr-document-list">
                                <li class="lodr-document-item">
                                    <a href="../assets/documents/Point 21/2022/GSBPL - LIst of shareholders.pdf" target="_blank" class="lodr-document-link">
                                        <div class="lodr-document-info">
                                            <div class="lodr-document-name">GSBPL - LIst of shareholders</div>
                                            <div class="lodr-document-meta">PDF • 2021-2022</div>
                                        </div>
                                        <div class="lodr-document-icon">
                                            <i data-lucide="file-text"></i>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div id="shareholding-2023" style="display: block;">
                            <ul class="lodr-document-list">
                                <li class="lodr-document-item">
                                    <a href="../assets/documents/Point 21/2023/List of Shareholders_31032023.pdf" target="_blank" class="lodr-document-link">
                                        <div class="lodr-document-info">
                                            <div class="lodr-document-name">List of Shareholders_31032023</div>
                                            <div class="lodr-document-meta">PDF • 2022-2023</div>
                                        </div>
                                        <div class="lodr-document-icon">
                                            <i data-lucide="file-text"></i>
                                        </div>
                                    </a>
                                </li>
                                <li class="lodr-document-item">
                                    <a href="../assets/documents/Point 21/2023/SH-31122023.pdf" target="_blank" class="lodr-document-link">
                                        <div class="lodr-document-info">
                                            <div class="lodr-document-name">SH-31122023</div>
                                            <div class="lodr-document-meta">PDF • 2022-2023</div>
                                        </div>
                                        <div class="lodr-document-icon">
                                            <i data-lucide="file-text"></i>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- Details of familiarization programs for independent directors Section -->
                    <div id="familiarization-programs" class="lodr-document-section" style="display: none;">
                        <h3 class="lodr-section-title">Details of familiarization programs for independent directors</h3>
                        <ul class="lodr-document-list">
                            <li class="lodr-document-item">
                                <a href="../assets/documents/Point 22/Familiarisation programmes for independent directors_Done (1).pdf" target="_blank" class="lodr-document-link">
                                    <div class="lodr-document-info">
                                        <div class="lodr-document-name">Familiarisation programmes for independent directors_Done</div>
                                        <div class="lodr-document-meta">PDF</div>
                                    </div>
                                    <div class="lodr-document-icon">
                                        <i data-lucide="file-text"></i>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <!-- Dividend Distribution Policies Section -->
                    <div id="dividend-policy" class="lodr-document-section" style="display: none;">
                        <h3 class="lodr-section-title">Dividend Distribution Policies</h3>
                        <ul class="lodr-document-list">
                            <li class="lodr-document-item">
                                <a href="../assets/documents/Point 26/Dividend Distribution Policy.pdf" target="_blank" class="lodr-document-link">
                                    <div class="lodr-document-info">
                                        <div class="lodr-document-name">Dividend Distribution Policy</div>
                                        <div class="lodr-document-meta">PDF</div>
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
    </main>

    <script src="../js/gretex-financial.js"></script>

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

