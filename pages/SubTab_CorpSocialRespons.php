<?php
/**
 * Corporate Social Responsibility - Gretex Financial
 * Gretex Share Broking Limited
 */

// Page configuration
$pageTitle = 'Corporate Social Responsibility - Gretex Financial';
$additionalCSS = [
    '../css/calculator-page.css',
];

$pageStyles = ".csr-page {
            min-height: 100vh;
            background: linear-gradient(180deg, #f5f7fa 0%, #e8f0f5 100%);
            padding: 90px 0 4rem 0;
        }

        .csr-hero {
            background: linear-gradient(135deg, #1e5a7d 0%, #2d9c8f 100%);
            padding: 5rem 0;
            position: relative;
            overflow: hidden;
        }

        .csr-hero::before {
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

        .csr-hero::after {
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

        .csr-hero-content {
            position: relative;
            z-index: 2;
            text-align: center;
            color: #ffffff;
        }

        .csr-title {
            font-family: ''Inter'', sans-serif;
            font-size: 3.5rem;
            font-weight: 800;
            margin: 0;
            color: #ffffff;
            text-shadow: 0 2px 20px rgba(0, 0, 0, 0.2);
            letter-spacing: -0.02em;
        }

        .csr-content {
            padding: 5rem 0;
            background: transparent;
        }

        .csr-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        .csr-main-card {
            background: #ffffff;
            border-radius: 20px;
            padding: 3rem;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08), 0 2px 8px rgba(0, 0, 0, 0.04);
            border: 1px solid rgba(0, 0, 0, 0.05);
        }

        .csr-year-selector {
            display: flex;
            align-items: center;
            gap: 1.5rem;
            margin-bottom: 2.5rem;
            padding-bottom: 2rem;
            border-bottom: 2px solid #e8f4f8;
        }

        .csr-year-selector label {
            font-family: ''Inter'', sans-serif;
            font-size: 1rem;
            font-weight: 600;
            color: var(--calc-primary-blue);
        }

        .csr-year-selector select {
            padding: 0.75rem 1.25rem;
            border: 2px solid #e0e0e0;
            border-radius: 10px;
            font-family: ''Plus Jakarta Sans'', sans-serif;
            font-size: 1rem;
            font-weight: 500;
            min-width: 180px;
            background: #ffffff;
            color: var(--calc-text-dark);
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .csr-year-selector select:hover {
            border-color: var(--calc-primary-teal);
        }

        .csr-year-selector select:focus {
            outline: none;
            border-color: var(--calc-primary-blue);
            box-shadow: 0 0 0 3px rgba(30, 90, 125, 0.1);
        }

        .csr-document-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .csr-document-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 1.5rem;
            background: #f8faff;
            border-radius: 12px;
            margin-bottom: 1rem;
            border: 1px solid #e8f4f8;
            transition: all 0.3s ease;
        }

        .csr-document-item:hover {
            background: #ffffff;
            border-color: var(--calc-primary-teal);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            transform: translateX(5px);
        }

        .csr-document-left {
            display: flex;
            align-items: center;
            gap: 1.25rem;
            flex: 1;
        }

        .csr-document-icon {
            width: 48px;
            height: 48px;
            background: linear-gradient(135deg, #ff4444 0%, #ff6666 100%);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            box-shadow: 0 2px 8px rgba(255, 68, 68, 0.2);
        }

        .csr-document-icon i {
            width: 24px;
            height: 24px;
            color: #ffffff;
        }

        .csr-document-info {
            flex: 1;
        }

        .csr-document-name {
            font-family: ''Inter'', sans-serif;
            font-size: 1.0625rem;
            font-weight: 600;
            color: var(--calc-primary-blue);
            margin-bottom: 0.25rem;
        }

        .csr-document-meta {
            font-family: ''Plus Jakarta Sans'', sans-serif;
            font-size: 0.875rem;
            color: var(--calc-text-medium);
        }

        .csr-document-download {
            width: 44px;
            height: 44px;
            background: linear-gradient(135deg, var(--calc-primary-teal) 0%, var(--calc-primary-blue) 100%);
            border: none;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 2px 8px rgba(45, 156, 143, 0.2);
        }

        .csr-document-download:hover {
            transform: scale(1.1);
            box-shadow: 0 4px 16px rgba(45, 156, 143, 0.3);
        }

        .csr-document-download i {
            width: 20px;
            height: 20px;
            color: #ffffff;
        }

        .csr-empty-state {
            text-align: center;
            padding: 4rem 2rem;
            color: var(--calc-text-medium);
        }

        .csr-empty-state i {
            width: 64px;
            height: 64px;
            color: var(--calc-primary-teal);
            margin-bottom: 1rem;
            opacity: 0.5;
        }

        .csr-empty-state p {
            font-family: ''Plus Jakarta Sans'', sans-serif;
            font-size: 1rem;
            margin: 0;
        }

        @media (max-width: 768px) {
            .csr-hero {
                padding: 3rem 0;
            }

            .csr-title {
                font-size: 2rem;
            }

            .csr-content {
                padding: 3rem 0;
            }

            .csr-main-card {
                padding: 2rem;
            }

            .csr-year-selector {
                flex-direction: column;
                align-items: flex-start;
                gap: 1rem;
            }

            .csr-year-selector select {
                width: 100%;
            }

            .csr-document-item {
                flex-direction: column;
                align-items: flex-start;
                gap: 1rem;
            }

            .csr-document-download {
                align-self: flex-end;
            }
        }";

// Include header
require_once '../includes/header.php';
require_once '../includes/navbar.php';
?>



<!-- Navigation -->

    <main class="csr-page">
        <div class="csr-hero">
            <div class="container">
                <div class="csr-hero-content">
                    <h1 class="csr-title">Corporate Social Responsibility</h1>
                </div>
            </div>
        </div>

        <div class="csr-content">
            <div class="csr-container">
                <div class="csr-main-card">
                    <div class="csr-year-selector">
                        <label for="select-year-csr">Select Year:</label>
                        <select id="select-year-csr" onchange="CSRYearOnChange()">
                            <option value="2023" selected>2022-2023</option>
                            <option value="2022">2021-2022</option>
                            <option value="2021">2020-2021</option>
                        </select>
                    </div>

                    <!-- Documents for 2022-2023 -->
                    <div id="csr-2023" class="csr-year-documents">
                        <ul class="csr-document-list">
                            <li class="csr-document-item">
                                <div class="csr-document-left">
                                    <div class="csr-document-icon">
                                        <i data-lucide="file-text"></i>
                                    </div>
                                    <div class="csr-document-info">
                                        <div class="csr-document-name">CSR_Programmes_2022-2023</div>
                                        <div class="csr-document-meta">PDF • Updated: 2022-2023</div>
                                    </div>
                                </div>
                                <a href="#" class="csr-document-download" onclick="downloadCSR('2023')" title="Download">
                                    <i data-lucide="download"></i>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <!-- Documents for 2021-2022 -->
                    <div id="csr-2022" class="csr-year-documents" style="display: none;">
                        <ul class="csr-document-list">
                            <li class="csr-document-item">
                                <div class="csr-document-left">
                                    <div class="csr-document-icon">
                                        <i data-lucide="file-text"></i>
                                    </div>
                                    <div class="csr-document-info">
                                        <div class="csr-document-name">CSR_Programmes_2021-2022</div>
                                        <div class="csr-document-meta">PDF • Updated: 2021-2022</div>
                                    </div>
                                </div>
                                <a href="#" class="csr-document-download" onclick="downloadCSR('2022')" title="Download">
                                    <i data-lucide="download"></i>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <!-- Documents for 2020-2021 -->
                    <div id="csr-2021" class="csr-year-documents" style="display: none;">
                        <ul class="csr-document-list">
                            <li class="csr-document-item">
                                <div class="csr-document-left">
                                    <div class="csr-document-icon">
                                        <i data-lucide="file-text"></i>
                                    </div>
                                    <div class="csr-document-info">
                                        <div class="csr-document-name">CSR_Programmes_2020-2021</div>
                                        <div class="csr-document-meta">PDF • Updated: 2020-2021</div>
                                    </div>
                                </div>
                                <a href="#" class="csr-document-download" onclick="downloadCSR('2021')" title="Download">
                                    <i data-lucide="download"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->

    <script src="../js/gretex-financial.js"></script>
    <script>
        lucide.createIcons();

        function CSRYearOnChange() {
            var yearSelect = document.getElementById("select-year-csr").value;
            
            // Hide all year documents
            document.querySelectorAll('.csr-year-documents').forEach(doc => {
                doc.style.display = 'none';
            });

            // Show selected year documents
            var selectedDoc = document.getElementById('csr-' + yearSelect);
            if (selectedDoc) {
                selectedDoc.style.display = 'block';
            }
        }

        function downloadCSR(year) {
            // This function can be updated with actual file paths when available
            var fileName = 'CSR_Programmes_' + (year === '2023' ? '2022-2023' : year === '2022' ? '2021-2022' : '2020-2021') + '.pdf';
            // Example: window.open('path/to/file/' + fileName, '_blank');
            console.log('Downloading:', fileName);
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

