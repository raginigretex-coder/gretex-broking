<?php

/**
 * Downloads - Gretex Financial
 * Gretex Share Broking Limited
 */

// Page configuration
$pageTitle = 'Downloads - Gretex Financial';
$additionalCSS = [
    '../css/downloads.css',
];

$pageScripts = "// Tab switching functionality
        document.querySelectorAll(''.download-tab'').forEach(tab => {
            tab.addEventListener(''click'', function() {
                const category = this.getAttribute(''data-category'');
                
                // If e-Voting tab is clicked, redirect to NSDL website
                if (category === ''evoting'') {
                    window.open(''https://eservices.nsdl.com/'', ''_blank'');
                    return;
                }
                
                // Remove active class from all tabs
                document.querySelectorAll(''.download-tab'').forEach(t => t.classList.remove(''active''));
                // Add active class to clicked tab
                this.classList.add(''active'');
                
                // Hide all categories
                document.querySelectorAll(''.download-category'').forEach(cat => {
                    cat.style.display = ''none'';
                });
                
                // Show selected category
                document.getElementById(category).style.display = ''grid'';
                
                // Load file sizes for visible category
                loadFileSizes(category);
            });
        });
        
        // Function to format file size
        function formatFileSize(bytes) {
            if (bytes === 0 || !bytes) return ''0 Bytes'';
            
            const k = 1024;
            const sizes = [''Bytes'', ''KB'', ''MB'', ''GB''];
            const i = Math.floor(Math.log(bytes) / Math.log(k));
            
            // Check if i is valid (prevent potential array index out of bounds)
            if (i < 0 || i >= sizes.length) return ''PDF'';
            
            return Math.round((bytes / Math.pow(k, i)) * 100) / 100 + '' '' + sizes[i];
        }
        
        // Function to get file size using HEAD request, with fallback to GET
        async function getFileSize(filePath) {
            try {
                const headResponse = await fetch(filePath, { method: ''HEAD'' });
                if (headResponse.ok) {
                    const contentLength = headResponse.headers.get(''Content-Length'');
                    if (contentLength && parseInt(contentLength, 10) > 0) {
                        return parseInt(contentLength, 10);
                    }
                }
                const getResponse = await fetch(filePath, { method: ''GET'', headers: { ''Range'': ''bytes=0-0'' } });
                if (getResponse.ok || getResponse.status === 206) {
                    const contentRange = getResponse.headers.get(''Content-Range'');
                    if (contentRange) {
                        const size = contentRange.split(''/'')[1];
                        if (size) return parseInt(size, 10);
                    }
                    const contentLength = getResponse.headers.get(''Content-Length'');
                    if (contentLength && (getResponse.status === 200 || getResponse.status === 206)) {
                        return parseInt(contentLength, 10);
                    }
                }
                return null;
            } catch (error) {
                console.warn(`Could not fetch file size for \${filePath}:`, error);
                return null;
            }
        }

        function inferTypeFromExt(filePath) {
            const ext = (filePath.split(''?'')[0].split(''#'')[0].split(''.'').pop() || '''').toLowerCase();
            const map = {
                ''pdf'': ''PDF'',''doc'':''DOC'',''docx'':''DOCX'',''xls'':''XLS'',''xlsx'':''XLSX'',''csv'':''CSV'',
                ''png'':''PNG'',''jpg'':''JPG'',''jpeg'':''JPG'',''gif'':''GIF'',''webp'':''WEBP'',''txt'':''TXT'',
                ''zip'':''ZIP'',''rar'':''RAR''
            };
            return map[ext] || ext.toUpperCase() || ''FILE'';
        }

        async function getFileType(filePath) {
            try {
                const headResponse = await fetch(filePath, { method: ''HEAD'' });
                if (headResponse.ok) {
                    const ct = headResponse.headers.get(''Content-Type'') || '''';
                    if (ct) {
                        if (ct.includes(''pdf'')) return ''PDF'';
                        if (ct.includes(''msword'')) return ''DOC'';
                        if (ct.includes(''officedocument.wordprocessingml'')) return ''DOCX'';
                        if (ct.includes(''spreadsheet'')) return ''XLSX'';
                        if (ct.includes(''excel'')) return ''XLS'';
                        if (ct.includes(''png'')) return ''PNG'';
                        if (ct.includes(''jpeg'') || ct.includes(''jpg'')) return ''JPG'';
                        if (ct.includes(''gif'')) return ''GIF'';
                        if (ct.includes(''plain'')) return ''TXT'';
                        if (ct.includes(''zip'')) return ''ZIP'';
                    }
                }
            } catch (e) {
                /* silent */
            }
            return inferTypeFromExt(filePath);
        }
        
        // Function to load file sizes for all documents in a category
        async function loadFileSizes(categoryId) {
            const category = document.getElementById(categoryId);
            if (!category) return;
            
            const documentCards = category.querySelectorAll(''.document-card[data-file-path]'');
            
            for (const card of documentCards) {
                const filePath = card.getAttribute(''data-file-path'');
                const hardcodedSize = card.getAttribute(''data-file-size'');
                const sizeElement = card.querySelector(''.doc-size'');
                
                if (sizeElement) {
                    // Reset to clean state
                    sizeElement.style.color = ''#1f2937'';
                    sizeElement.style.fontStyle = ''normal'';

                    // 1. Determine file type early
                    const fileType = filePath ? await getFileType(filePath) : ''FILE'';

                    // 2. Check for pre-calculated size in attribute first
                    if (hardcodedSize) {
                        const sizeBytes = parseInt(hardcodedSize, 10);
                        if (!isNaN(sizeBytes) && sizeBytes > 0) {
                            sizeElement.textContent = `\${fileType} • \${formatFileSize(sizeBytes)}`;
                            continue; // Skip fetch if we have a valid hardcoded size
                        }
                    }

                    // 3. Fallback to dynamic fetch if no hardcoded size
                    if (filePath) {
                        // Fetch file size
                        try {
                            const fileSize = await getFileSize(filePath);
                            
                            if (fileSize !== null && fileSize > 0) {
                                sizeElement.textContent = `\${fileType} • \${formatFileSize(fileSize)}`;
                            } else {
                                // Show type only if size unavailable
                                sizeElement.textContent = fileType;
                                sizeElement.style.color = ''#999'';
                            }
                        } catch (err) {
                            sizeElement.textContent = fileType;
                            sizeElement.style.color = ''#999'';
                        }
                    } else {
                        // No path and no hardcoded size
                        sizeElement.textContent = fileType;
                        sizeElement.style.color = ''#999'';
                    }
                }
            }
        }
        
        // Load file sizes when page loads
        document.addEventListener(''DOMContentLoaded'', function() {
            // Load types and sizes for all categories on start
            loadFileSizes(''kyc-forms'');
            loadFileSizes(''customer-docs'');
            loadFileSizes(''evoting'');
        });
";

// Include header
require_once '../includes/header.php';
require_once '../includes/navbar.php';
?>



<!-- Navigation -->

<!-- Downloads Page Content -->
<section class="downloads-page">
    <div class="container">
        <!-- Page Title -->
        <h1 class="downloads-page-title">Download</h1>

        <!-- Category Tabs -->
        <div class="download-tabs">
            <button class="download-tab active" data-category="kyc-forms">Kyc Forms</button>
            <button class="download-tab" data-category="customer-docs">Documents/Information for Customers</button>
            <!-- <button class="download-tab" data-category="evoting">e-Voting platform of NSDL</button> -->
        </div>

        <!-- Document Cards Grid -->
        <div class="downloads-grid" id="downloads-grid">
            <!-- KYC Forms Documents -->
            <div class="download-category" id="kyc-forms">
                <!-- ACCOUNT OPENING FORMS Section -->
                <div class="doc-section-header">
                    <h3>ACCOUNT OPENING FORMS</h3>
                </div>

                <div class="document-card" data-file-path="../assets/downloads/Client Request for MTF.pdf" data-file-size="17928">
                    <div class="doc-pdf-icon">
                        <svg width="72" height="72" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="64" height="64" rx="16" fill="#A0A9CF" />
                            <path d="M15 18.625C15 16.074 17.074 14 19.625 14H31.1875V23.25C31.1875 24.5291 32.2209 25.5625 33.5 25.5625H42.75V35.9688H27.7188C25.1678 35.9688 23.0938 38.0428 23.0938 40.5938V51H19.625C17.074 51 15 48.926 15 46.375V18.625ZM42.75 23.25H33.5V14L42.75 23.25ZM27.7188 39.4375H30.0312C32.2643 39.4375 34.0781 41.2514 34.0781 43.4844C34.0781 45.7174 32.2643 47.5312 30.0312 47.5312H28.875V49.8438C28.875 50.4797 28.3547 51 27.7188 51C27.0828 51 26.5625 50.4797 26.5625 49.8438V40.5938C26.5625 39.9578 27.0828 39.4375 27.7188 39.4375ZM30.0312 45.2188C30.9924 45.2188 31.7656 44.4455 31.7656 43.4844C31.7656 42.5232 30.9924 41.75 30.0312 41.75H28.875V45.2188H30.0312ZM36.9688 39.4375H39.2812C41.1963 39.4375 42.75 40.9912 42.75 42.9062V47.5312C42.75 49.4463 41.1963 51 39.2812 51H36.9688C36.3328 51 35.8125 50.4797 35.8125 49.8438V40.5938C35.8125 39.9578 36.3328 39.4375 36.9688 39.4375ZM39.2812 48.6875C39.9172 48.6875 40.4375 48.1672 40.4375 47.5312V42.9062C40.4375 42.2703 39.9172 41.75 39.2812 41.75H38.125V48.6875H39.2812ZM45.0625 40.5938C45.0625 39.9578 45.5828 39.4375 46.2188 39.4375H49.6875C50.3234 39.4375 50.8438 39.9578 50.8438 40.5938C50.8438 41.2297 50.3234 41.75 49.6875 41.75H47.375V44.0625H49.6875C50.3234 44.0625 50.8438 44.5828 50.8438 45.2188C50.8438 45.8547 50.3234 46.375 49.6875 46.375H47.375V49.8438C47.375 50.4797 46.8547 51 46.2188 51C45.5828 51 45.0625 50.4797 45.0625 49.8438V40.5938Z" fill="#EEF1FB" />
                        </svg>
                    </div>
                    <div class="doc-content">
                        <h3 class="doc-title">Client Request for MTF</h3>
                        <p class="doc-size">Loading size...</p>
                    </div>
                    <button class="doc-download-btn" onclick="window.open('../assets/downloads/Client Request for MTF.pdf', '_blank'); return false;">
                        <span>Download</span>
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 16L7 11L8.4 9.55L11 12.15V4H13V12.15L15.6 9.55L17 11L12 16Z" fill="currentColor" />
                            <path d="M5 20H19V18H5V20Z" fill="currentColor" />
                        </svg>
                    </button>
                </div>

                <div class="document-card" data-file-path="../assets/downloads/GSBL-KYC-Form-Individual.pdf">
                    <div class="doc-pdf-icon">
                        <svg width="72" height="72" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="64" height="64" rx="16" fill="#A0A9CF" />
                            <path d="M15 18.625C15 16.074 17.074 14 19.625 14H31.1875V23.25C31.1875 24.5291 32.2209 25.5625 33.5 25.5625H42.75V35.9688H27.7188C25.1678 35.9688 23.0938 38.0428 23.0938 40.5938V51H19.625C17.074 51 15 48.926 15 46.375V18.625ZM42.75 23.25H33.5V14L42.75 23.25ZM27.7188 39.4375H30.0312C32.2643 39.4375 34.0781 41.2514 34.0781 43.4844C34.0781 45.7174 32.2643 47.5312 30.0312 47.5312H28.875V49.8438C28.875 50.4797 28.3547 51 27.7188 51C27.0828 51 26.5625 50.4797 26.5625 49.8438V40.5938C26.5625 39.9578 27.0828 39.4375 27.7188 39.4375ZM30.0312 45.2188C30.9924 45.2188 31.7656 44.4455 31.7656 43.4844C31.7656 42.5232 30.9924 41.75 30.0312 41.75H28.875V45.2188H30.0312ZM36.9688 39.4375H39.2812C41.1963 39.4375 42.75 40.9912 42.75 42.9062V47.5312C42.75 49.4463 41.1963 51 39.2812 51H36.9688C36.3328 51 35.8125 50.4797 35.8125 49.8438V40.5938C35.8125 39.9578 36.3328 39.4375 36.9688 39.4375ZM39.2812 48.6875C39.9172 48.6875 40.4375 48.1672 40.4375 47.5312V42.9062C40.4375 42.2703 39.9172 41.75 39.2812 41.75H38.125V48.6875H39.2812ZM45.0625 40.5938C45.0625 39.9578 45.5828 39.4375 46.2188 39.4375H49.6875C50.3234 39.4375 50.8438 39.9578 50.8438 40.5938C50.8438 41.2297 50.3234 41.75 49.6875 41.75H47.375V44.0625H49.6875C50.3234 44.0625 50.8438 44.5828 50.8438 45.2188C50.8438 45.8547 50.3234 46.375 49.6875 46.375H47.375V49.8438C47.375 50.4797 46.8547 51 46.2188 51C45.5828 51 45.0625 50.4797 45.0625 49.8438V40.5938Z" fill="#EEF1FB" />
                        </svg>
                    </div>
                    <div class="doc-content">
                        <h3 class="doc-title">GSBL KYC Form - Individual</h3>
                        <p class="doc-size">Loading size...</p>
                    </div>
                    <button class="doc-download-btn" onclick="window.open('../assets/downloads/GSBL-KYC-Form-Individual.pdf', '_blank'); return false;">
                        <span>Download</span>
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 16L7 11L8.4 9.55L11 12.15V4H13V12.15L15.6 9.55L17 11L12 16Z" fill="currentColor" />
                            <path d="M5 20H19V18H5V20Z" fill="currentColor" />
                        </svg>
                    </button>
                </div>

                <div class="document-card" data-file-path="../assets/downloads/Individual-KRA-Form.pdf">
                    <div class="doc-pdf-icon">
                        <svg width="72" height="72" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="64" height="64" rx="16" fill="#A0A9CF" />
                            <path d="M15 18.625C15 16.074 17.074 14 19.625 14H31.1875V23.25C31.1875 24.5291 32.2209 25.5625 33.5 25.5625H42.75V35.9688H27.7188C25.1678 35.9688 23.0938 38.0428 23.0938 40.5938V51H19.625C17.074 51 15 48.926 15 46.375V18.625ZM42.75 23.25H33.5V14L42.75 23.25ZM27.7188 39.4375H30.0312C32.2643 39.4375 34.0781 41.2514 34.0781 43.4844C34.0781 45.7174 32.2643 47.5312 30.0312 47.5312H28.875V49.8438C28.875 50.4797 28.3547 51 27.7188 51C27.0828 51 26.5625 50.4797 26.5625 49.8438V40.5938C26.5625 39.9578 27.0828 39.4375 27.7188 39.4375ZM30.0312 45.2188C30.9924 45.2188 31.7656 44.4455 31.7656 43.4844C31.7656 42.5232 30.9924 41.75 30.0312 41.75H28.875V45.2188H30.0312ZM36.9688 39.4375H39.2812C41.1963 39.4375 42.75 40.9912 42.75 42.9062V47.5312C42.75 49.4463 41.1963 51 39.2812 51H36.9688C36.3328 51 35.8125 50.4797 35.8125 49.8438V40.5938C35.8125 39.9578 36.3328 39.4375 36.9688 39.4375ZM39.2812 48.6875C39.9172 48.6875 40.4375 48.1672 40.4375 47.5312V42.9062C40.4375 42.2703 39.9172 41.75 39.2812 41.75H38.125V48.6875H39.2812ZM45.0625 40.5938C45.0625 39.9578 45.5828 39.4375 46.2188 39.4375H49.6875C50.3234 39.4375 50.8438 39.9578 50.8438 40.5938C50.8438 41.2297 50.3234 41.75 49.6875 41.75H47.375V44.0625H49.6875C50.3234 44.0625 50.8438 44.5828 50.8438 45.2188C50.8438 45.8547 50.3234 46.375 49.6875 46.375H47.375V49.8438C47.375 50.4797 46.8547 51 46.2188 51C45.5828 51 45.0625 50.4797 45.0625 49.8438V40.5938Z" fill="#EEF1FB" />
                        </svg>
                    </div>
                    <div class="doc-content">
                        <h3 class="doc-title">Individual KRA Form</h3>
                        <p class="doc-size">Loading size...</p>
                    </div>
                    <button class="doc-download-btn" onclick="window.open('../assets/downloads/Individual-KRA-Form.pdf', '_blank'); return false;">
                        <span>Download</span>
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 16L7 11L8.4 9.55L11 12.15V4H13V12.15L15.6 9.55L17 11L12 16Z" fill="currentColor" />
                            <path d="M5 20H19V18H5V20Z" fill="currentColor" />
                        </svg>
                    </button>
                </div>

                <div class="document-card" data-file-path="../assets/downloads/Non-Individual-KRA-Form.pdf">
                    <div class="doc-pdf-icon">
                        <svg width="72" height="72" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="64" height="64" rx="16" fill="#A0A9CF" />
                            <path d="M15 18.625C15 16.074 17.074 14 19.625 14H31.1875V23.25C31.1875 24.5291 32.2209 25.5625 33.5 25.5625H42.75V35.9688H27.7188C25.1678 35.9688 23.0938 38.0428 23.0938 40.5938V51H19.625C17.074 51 15 48.926 15 46.375V18.625ZM42.75 23.25H33.5V14L42.75 23.25ZM27.7188 39.4375H30.0312C32.2643 39.4375 34.0781 41.2514 34.0781 43.4844C34.0781 45.7174 32.2643 47.5312 30.0312 47.5312H28.875V49.8438C28.875 50.4797 28.3547 51 27.7188 51C27.0828 51 26.5625 50.4797 26.5625 49.8438V40.5938C26.5625 39.9578 27.0828 39.4375 27.7188 39.4375ZM30.0312 45.2188C30.9924 45.2188 31.7656 44.4455 31.7656 43.4844C31.7656 42.5232 30.9924 41.75 30.0312 41.75H28.875V45.2188H30.0312ZM36.9688 39.4375H39.2812C41.1963 39.4375 42.75 40.9912 42.75 42.9062V47.5312C42.75 49.4463 41.1963 51 39.2812 51H36.9688C36.3328 51 35.8125 50.4797 35.8125 49.8438V40.5938C35.8125 39.9578 36.3328 39.4375 36.9688 39.4375ZM39.2812 48.6875C39.9172 48.6875 40.4375 48.1672 40.4375 47.5312V42.9062C40.4375 42.2703 39.9172 41.75 39.2812 41.75H38.125V48.6875H39.2812ZM45.0625 40.5938C45.0625 39.9578 45.5828 39.4375 46.2188 39.4375H49.6875C50.3234 39.4375 50.8438 39.9578 50.8438 40.5938C50.8438 41.2297 50.3234 41.75 49.6875 41.75H47.375V44.0625H49.6875C50.3234 44.0625 50.8438 44.5828 50.8438 45.2188C50.8438 45.8547 50.3234 46.375 49.6875 46.375H47.375V49.8438C47.375 50.4797 46.8547 51 46.2188 51C45.5828 51 45.0625 50.4797 45.0625 49.8438V40.5938Z" fill="#EEF1FB" />
                        </svg>
                    </div>
                    <div class="doc-content">
                        <h3 class="doc-title">Non Individual KRA Form</h3>
                        <p class="doc-size">Loading size...</p>
                    </div>
                    <button class="doc-download-btn" onclick="window.open('../assets/downloads/Non-Individual-KRA-Form.pdf', '_blank'); return false;">
                        <span>Download</span>
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 16L7 11L8.4 9.55L11 12.15V4H13V12.15L15.6 9.55L17 11L12 16Z" fill="currentColor" />
                            <path d="M5 20H19V18H5V20Z" fill="currentColor" />
                        </svg>
                    </button>
                </div>

                <div class="document-card" data-file-path="../assets/downloads/Declaration-for-Common-Email-Id-Mobile-Number.pdf">
                    <div class="doc-pdf-icon">
                        <svg width="72" height="72" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="64" height="64" rx="16" fill="#A0A9CF" />
                            <path d="M15 18.625C15 16.074 17.074 14 19.625 14H31.1875V23.25C31.1875 24.5291 32.2209 25.5625 33.5 25.5625H42.75V35.9688H27.7188C25.1678 35.9688 23.0938 38.0428 23.0938 40.5938V51H19.625C17.074 51 15 48.926 15 46.375V18.625ZM42.75 23.25H33.5V14L42.75 23.25ZM27.7188 39.4375H30.0312C32.2643 39.4375 34.0781 41.2514 34.0781 43.4844C34.0781 45.7174 32.2643 47.5312 30.0312 47.5312H28.875V49.8438C28.875 50.4797 28.3547 51 27.7188 51C27.0828 51 26.5625 50.4797 26.5625 49.8438V40.5938C26.5625 39.9578 27.0828 39.4375 27.7188 39.4375ZM30.0312 45.2188C30.9924 45.2188 31.7656 44.4455 31.7656 43.4844C31.7656 42.5232 30.9924 41.75 30.0312 41.75H28.875V45.2188H30.0312ZM36.9688 39.4375H39.2812C41.1963 39.4375 42.75 40.9912 42.75 42.9062V47.5312C42.75 49.4463 41.1963 51 39.2812 51H36.9688C36.3328 51 35.8125 50.4797 35.8125 49.8438V40.5938C35.8125 39.9578 36.3328 39.4375 36.9688 39.4375ZM39.2812 48.6875C39.9172 48.6875 40.4375 48.1672 40.4375 47.5312V42.9062C40.4375 42.2703 39.9172 41.75 39.2812 41.75H38.125V48.6875H39.2812ZM45.0625 40.5938C45.0625 39.9578 45.5828 39.4375 46.2188 39.4375H49.6875C50.3234 39.4375 50.8438 39.9578 50.8438 40.5938C50.8438 41.2297 50.3234 41.75 49.6875 41.75H47.375V44.0625H49.6875C50.3234 44.0625 50.8438 44.5828 50.8438 45.2188C50.8438 45.8547 50.3234 46.375 49.6875 46.375H47.375V49.8438C47.375 50.4797 46.8547 51 46.2188 51C45.5828 51 45.0625 50.4797 45.0625 49.8438V40.5938Z" fill="#EEF1FB" />
                        </svg>
                    </div>
                    <div class="doc-content">
                        <h3 class="doc-title">Declaration for Common Email Id & Mobile Number</h3>
                        <p class="doc-size">Loading size...</p>
                    </div>
                    <button class="doc-download-btn" onclick="window.open('../assets/downloads/Declaration-for-Common-Email-Id-Mobile-Number.pdf', '_blank'); return false;">
                        <span>Download</span>
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 16L7 11L8.4 9.55L11 12.15V4H13V12.15L15.6 9.55L17 11L12 16Z" fill="currentColor" />
                            <path d="M5 20H19V18H5V20Z" fill="currentColor" />
                        </svg>
                    </button>
                </div>

                <div class="document-card" data-file-path="../assets/downloads/DP-Tariff-Sheet.pdf">
                    <div class="doc-pdf-icon">
                        <svg width="72" height="72" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="64" height="64" rx="16" fill="#A0A9CF" />
                            <path d="M15 18.625C15 16.074 17.074 14 19.625 14H31.1875V23.25C31.1875 24.5291 32.2209 25.5625 33.5 25.5625H42.75V35.9688H27.7188C25.1678 35.9688 23.0938 38.0428 23.0938 40.5938V51H19.625C17.074 51 15 48.926 15 46.375V18.625ZM42.75 23.25H33.5V14L42.75 23.25ZM27.7188 39.4375H30.0312C32.2643 39.4375 34.0781 41.2514 34.0781 43.4844C34.0781 45.7174 32.2643 47.5312 30.0312 47.5312H28.875V49.8438C28.875 50.4797 28.3547 51 27.7188 51C27.0828 51 26.5625 50.4797 26.5625 49.8438V40.5938C26.5625 39.9578 27.0828 39.4375 27.7188 39.4375ZM30.0312 45.2188C30.9924 45.2188 31.7656 44.4455 31.7656 43.4844C31.7656 42.5232 30.9924 41.75 30.0312 41.75H28.875V45.2188H30.0312ZM36.9688 39.4375H39.2812C41.1963 39.4375 42.75 40.9912 42.75 42.9062V47.5312C42.75 49.4463 41.1963 51 39.2812 51H36.9688C36.3328 51 35.8125 50.4797 35.8125 49.8438V40.5938C35.8125 39.9578 36.3328 39.4375 36.9688 39.4375ZM39.2812 48.6875C39.9172 48.6875 40.4375 48.1672 40.4375 47.5312V42.9062C40.4375 42.2703 39.9172 41.75 39.2812 41.75H38.125V48.6875H39.2812ZM45.0625 40.5938C45.0625 39.9578 45.5828 39.4375 46.2188 39.4375H49.6875C50.3234 39.4375 50.8438 39.9578 50.8438 40.5938C50.8438 41.2297 50.3234 41.75 49.6875 41.75H47.375V44.0625H49.6875C50.3234 44.0625 50.8438 44.5828 50.8438 45.2188C50.8438 45.8547 50.3234 46.375 49.6875 46.375H47.375V49.8438C47.375 50.4797 46.8547 51 46.2188 51C45.5828 51 45.0625 50.4797 45.0625 49.8438V40.5938Z" fill="#EEF1FB" />
                        </svg>
                    </div>
                    <div class="doc-content">
                        <h3 class="doc-title">DP Tariff Sheet</h3>
                        <p class="doc-size">Loading size...</p>
                    </div>
                    <button class="doc-download-btn" onclick="window.open('../assets/downloads/DP-Tariff-Sheet.pdf', '_blank'); return false;">
                        <span>Download</span>
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 16L7 11L8.4 9.55L11 12.15V4H13V12.15L15.6 9.55L17 11L12 16Z" fill="currentColor" />
                            <path d="M5 20H19V18H5V20Z" fill="currentColor" />
                        </svg>
                    </button>
                </div>

                <div class="document-card" data-file-path="../assets/downloads/Running-Account-Authorisation-Form.pdf">
                    <div class="doc-pdf-icon">
                        <svg width="72" height="72" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="64" height="64" rx="16" fill="#A0A9CF" />
                            <path d="M15 18.625C15 16.074 17.074 14 19.625 14H31.1875V23.25C31.1875 24.5291 32.2209 25.5625 33.5 25.5625H42.75V35.9688H27.7188C25.1678 35.9688 23.0938 38.0428 23.0938 40.5938V51H19.625C17.074 51 15 48.926 15 46.375V18.625ZM42.75 23.25H33.5V14L42.75 23.25ZM27.7188 39.4375H30.0312C32.2643 39.4375 34.0781 41.2514 34.0781 43.4844C34.0781 45.7174 32.2643 47.5312 30.0312 47.5312H28.875V49.8438C28.875 50.4797 28.3547 51 27.7188 51C27.0828 51 26.5625 50.4797 26.5625 49.8438V40.5938C26.5625 39.9578 27.0828 39.4375 27.7188 39.4375ZM30.0312 45.2188C30.9924 45.2188 31.7656 44.4455 31.7656 43.4844C31.7656 42.5232 30.9924 41.75 30.0312 41.75H28.875V45.2188H30.0312ZM36.9688 39.4375H39.2812C41.1963 39.4375 42.75 40.9912 42.75 42.9062V47.5312C42.75 49.4463 41.1963 51 39.2812 51H36.9688C36.3328 51 35.8125 50.4797 35.8125 49.8438V40.5938C35.8125 39.9578 36.3328 39.4375 36.9688 39.4375ZM39.2812 48.6875C39.9172 48.6875 40.4375 48.1672 40.4375 47.5312V42.9062C40.4375 42.2703 39.9172 41.75 39.2812 41.75H38.125V48.6875H39.2812ZM45.0625 40.5938C45.0625 39.9578 45.5828 39.4375 46.2188 39.4375H49.6875C50.3234 39.4375 50.8438 39.9578 50.8438 40.5938C50.8438 41.2297 50.3234 41.75 49.6875 41.75H47.375V44.0625H49.6875C50.3234 44.0625 50.8438 44.5828 50.8438 45.2188C50.8438 45.8547 50.3234 46.375 49.6875 46.375H47.375V49.8438C47.375 50.4797 46.8547 51 46.2188 51C45.5828 51 45.0625 50.4797 45.0625 49.8438V40.5938Z" fill="#EEF1FB" />
                        </svg>
                    </div>
                    <div class="doc-content">
                        <h3 class="doc-title">Running-Account-Authorisation-Form</h3>
                        <p class="doc-size">Loading size...</p>
                    </div>
                    <button class="doc-download-btn" onclick="window.open('../assets/downloads/Running-Account-Authorisation-Form.pdf', '_blank'); return false;">
                        <span>Download</span>
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 16L7 11L8.4 9.55L11 12.15V4H13V12.15L15.6 9.55L17 11L12 16Z" fill="currentColor" />
                            <path d="M5 20H19V18H5V20Z" fill="currentColor" />
                        </svg>
                    </button>
                </div>

                <div class="document-card" data-file-path="../assets/downloads/Segment-Activation.pdf">
                    <div class="doc-pdf-icon">
                        <svg width="72" height="72" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="64" height="64" rx="16" fill="#A0A9CF" />
                            <path d="M15 18.625C15 16.074 17.074 14 19.625 14H31.1875V23.25C31.1875 24.5291 32.2209 25.5625 33.5 25.5625H42.75V35.9688H27.7188C25.1678 35.9688 23.0938 38.0428 23.0938 40.5938V51H19.625C17.074 51 15 48.926 15 46.375V18.625ZM42.75 23.25H33.5V14L42.75 23.25ZM27.7188 39.4375H30.0312C32.2643 39.4375 34.0781 41.2514 34.0781 43.4844C34.0781 45.7174 32.2643 47.5312 30.0312 47.5312H28.875V49.8438C28.875 50.4797 28.3547 51 27.7188 51C27.0828 51 26.5625 50.4797 26.5625 49.8438V40.5938C26.5625 39.9578 27.0828 39.4375 27.7188 39.4375ZM30.0312 45.2188C30.9924 45.2188 31.7656 44.4455 31.7656 43.4844C31.7656 42.5232 30.9924 41.75 30.0312 41.75H28.875V45.2188H30.0312ZM36.9688 39.4375H39.2812C41.1963 39.4375 42.75 40.9912 42.75 42.9062V47.5312C42.75 49.4463 41.1963 51 39.2812 51H36.9688C36.3328 51 35.8125 50.4797 35.8125 49.8438V40.5938C35.8125 39.9578 36.3328 39.4375 36.9688 39.4375ZM39.2812 48.6875C39.9172 48.6875 40.4375 48.1672 40.4375 47.5312V42.9062C40.4375 42.2703 39.9172 41.75 39.2812 41.75H38.125V48.6875H39.2812ZM45.0625 40.5938C45.0625 39.9578 45.5828 39.4375 46.2188 39.4375H49.6875C50.3234 39.4375 50.8438 39.9578 50.8438 40.5938C50.8438 41.2297 50.3234 41.75 49.6875 41.75H47.375V44.0625H49.6875C50.3234 44.0625 50.8438 44.5828 50.8438 45.2188C50.8438 45.8547 50.3234 46.375 49.6875 46.375H47.375V49.8438C47.375 50.4797 46.8547 51 46.2188 51C45.5828 51 45.0625 50.4797 45.0625 49.8438V40.5938Z" fill="#EEF1FB" />
                        </svg>
                    </div>
                    <div class="doc-content">
                        <h3 class="doc-title">Segment Activation</h3>
                        <p class="doc-size">Loading size...</p>
                    </div>
                    <button class="doc-download-btn" onclick="window.open('../assets/downloads/Segment-Activation.pdf', '_blank'); return false;">
                        <span>Download</span>
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 16L7 11L8.4 9.55L11 12.15V4H13V12.15L15.6 9.55L17 11L12 16Z" fill="currentColor" />
                            <path d="M5 20H19V18H5V20Z" fill="currentColor" />
                        </svg>
                    </button>
                </div>

                <!-- OTHER DOCUMENTS Section -->
                <div class="doc-section-header">
                    <h3>OTHER DOCUMENTS</h3>
                </div>

                <div class="document-card" data-file-path="../assets/downloads/Signature-verification-by-the-Banker.pdf">
                    <div class="doc-pdf-icon">
                        <svg width="72" height="72" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="64" height="64" rx="16" fill="#A0A9CF" />
                            <path d="M15 18.625C15 16.074 17.074 14 19.625 14H31.1875V23.25C31.1875 24.5291 32.2209 25.5625 33.5 25.5625H42.75V35.9688H27.7188C25.1678 35.9688 23.0938 38.0428 23.0938 40.5938V51H19.625C17.074 51 15 48.926 15 46.375V18.625ZM42.75 23.25H33.5V14L42.75 23.25ZM27.7188 39.4375H30.0312C32.2643 39.4375 34.0781 41.2514 34.0781 43.4844C34.0781 45.7174 32.2643 47.5312 30.0312 47.5312H28.875V49.8438C28.875 50.4797 28.3547 51 27.7188 51C27.0828 51 26.5625 50.4797 26.5625 49.8438V40.5938C26.5625 39.9578 27.0828 39.4375 27.7188 39.4375ZM30.0312 45.2188C30.9924 45.2188 31.7656 44.4455 31.7656 43.4844C31.7656 42.5232 30.9924 41.75 30.0312 41.75H28.875V45.2188H30.0312ZM36.9688 39.4375H39.2812C41.1963 39.4375 42.75 40.9912 42.75 42.9062V47.5312C42.75 49.4463 41.1963 51 39.2812 51H36.9688C36.3328 51 35.8125 50.4797 35.8125 49.8438V40.5938C35.8125 39.9578 36.3328 39.4375 36.9688 39.4375ZM39.2812 48.6875C39.9172 48.6875 40.4375 48.1672 40.4375 47.5312V42.9062C40.4375 42.2703 39.9172 41.75 39.2812 41.75H38.125V48.6875H39.2812ZM45.0625 40.5938C45.0625 39.9578 45.5828 39.4375 46.2188 39.4375H49.6875C50.3234 39.4375 50.8438 39.9578 50.8438 40.5938C50.8438 41.2297 50.3234 41.75 49.6875 41.75H47.375V44.0625H49.6875C50.3234 44.0625 50.8438 44.5828 50.8438 45.2188C50.8438 45.8547 50.3234 46.375 49.6875 46.375H47.375V49.8438C47.375 50.4797 46.8547 51 46.2188 51C45.5828 51 45.0625 50.4797 45.0625 49.8438V40.5938Z" fill="#EEF1FB" />
                        </svg>
                    </div>
                    <div class="doc-content">
                        <h3 class="doc-title">Signature verification by the Banker</h3>
                        <p class="doc-size">Loading size...</p>
                    </div>
                    <button class="doc-download-btn" onclick="window.open('../assets/downloads/Signature-verification-by-the-Banker.pdf', '_blank'); return false;">
                        <span>Download</span>
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 16L7 11L8.4 9.55L11 12.15V4H13V12.15L15.6 9.55L17 11L12 16Z" fill="currentColor" />
                            <path d="M5 20H19V18H5V20Z" fill="currentColor" />
                        </svg>
                    </button>
                </div>

                <div class="document-card" data-file-path="../assets/downloads/Modification-Form.pdf">
                    <div class="doc-pdf-icon">
                        <svg width="72" height="72" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="64" height="64" rx="16" fill="#A0A9CF" />
                            <path d="M15 18.625C15 16.074 17.074 14 19.625 14H31.1875V23.25C31.1875 24.5291 32.2209 25.5625 33.5 25.5625H42.75V35.9688H27.7188C25.1678 35.9688 23.0938 38.0428 23.0938 40.5938V51H19.625C17.074 51 15 48.926 15 46.375V18.625ZM42.75 23.25H33.5V14L42.75 23.25ZM27.7188 39.4375H30.0312C32.2643 39.4375 34.0781 41.2514 34.0781 43.4844C34.0781 45.7174 32.2643 47.5312 30.0312 47.5312H28.875V49.8438C28.875 50.4797 28.3547 51 27.7188 51C27.0828 51 26.5625 50.4797 26.5625 49.8438V40.5938C26.5625 39.9578 27.0828 39.4375 27.7188 39.4375ZM30.0312 45.2188C30.9924 45.2188 31.7656 44.4455 31.7656 43.4844C31.7656 42.5232 30.9924 41.75 30.0312 41.75H28.875V45.2188H30.0312ZM36.9688 39.4375H39.2812C41.1963 39.4375 42.75 40.9912 42.75 42.9062V47.5312C42.75 49.4463 41.1963 51 39.2812 51H36.9688C36.3328 51 35.8125 50.4797 35.8125 49.8438V40.5938C35.8125 39.9578 36.3328 39.4375 36.9688 39.4375ZM39.2812 48.6875C39.9172 48.6875 40.4375 48.1672 40.4375 47.5312V42.9062C40.4375 42.2703 39.9172 41.75 39.2812 41.75H38.125V48.6875H39.2812ZM45.0625 40.5938C45.0625 39.9578 45.5828 39.4375 46.2188 39.4375H49.6875C50.3234 39.4375 50.8438 39.9578 50.8438 40.5938C50.8438 41.2297 50.3234 41.75 49.6875 41.75H47.375V44.0625H49.6875C50.3234 44.0625 50.8438 44.5828 50.8438 45.2188C50.8438 45.8547 50.3234 46.375 49.6875 46.375H47.375V49.8438C47.375 50.4797 46.8547 51 46.2188 51C45.5828 51 45.0625 50.4797 45.0625 49.8438V40.5938Z" fill="#EEF1FB" />
                        </svg>
                    </div>
                    <div class="doc-content">
                        <h3 class="doc-title">Modification Form</h3>
                        <p class="doc-size">Loading size...</p>
                    </div>
                    <button class="doc-download-btn" onclick="window.open('../assets/downloads/Modification-Form.pdf', '_blank'); return false;">
                        <span>Download</span>
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 16L7 11L8.4 9.55L11 12.15V4H13V12.15L15.6 9.55L17 11L12 16Z" fill="currentColor" />
                            <path d="M5 20H19V18H5V20Z" fill="currentColor" />
                        </svg>
                    </button>
                </div>

                <div class="document-card" data-file-path="../assets/downloads/Name-Correction-Form.pdf">
                    <div class="doc-pdf-icon">
                        <svg width="72" height="72" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="64" height="64" rx="16" fill="#A0A9CF" />
                            <path d="M15 18.625C15 16.074 17.074 14 19.625 14H31.1875V23.25C31.1875 24.5291 32.2209 25.5625 33.5 25.5625H42.75V35.9688H27.7188C25.1678 35.9688 23.0938 38.0428 23.0938 40.5938V51H19.625C17.074 51 15 48.926 15 46.375V18.625ZM42.75 23.25H33.5V14L42.75 23.25ZM27.7188 39.4375H30.0312C32.2643 39.4375 34.0781 41.2514 34.0781 43.4844C34.0781 45.7174 32.2643 47.5312 30.0312 47.5312H28.875V49.8438C28.875 50.4797 28.3547 51 27.7188 51C27.0828 51 26.5625 50.4797 26.5625 49.8438V40.5938C26.5625 39.9578 27.0828 39.4375 27.7188 39.4375ZM30.0312 45.2188C30.9924 45.2188 31.7656 44.4455 31.7656 43.4844C31.7656 42.5232 30.9924 41.75 30.0312 41.75H28.875V45.2188H30.0312ZM36.9688 39.4375H39.2812C41.1963 39.4375 42.75 40.9912 42.75 42.9062V47.5312C42.75 49.4463 41.1963 51 39.2812 51H36.9688C36.3328 51 35.8125 50.4797 35.8125 49.8438V40.5938C35.8125 39.9578 36.3328 39.4375 36.9688 39.4375ZM39.2812 48.6875C39.9172 48.6875 40.4375 48.1672 40.4375 47.5312V42.9062C40.4375 42.2703 39.9172 41.75 39.2812 41.75H38.125V48.6875H39.2812ZM45.0625 40.5938C45.0625 39.9578 45.5828 39.4375 46.2188 39.4375H49.6875C50.3234 39.4375 50.8438 39.9578 50.8438 40.5938C50.8438 41.2297 50.3234 41.75 49.6875 41.75H47.375V44.0625H49.6875C50.3234 44.0625 50.8438 44.5828 50.8438 45.2188C50.8438 45.8547 50.3234 46.375 49.6875 46.375H47.375V49.8438C47.375 50.4797 46.8547 51 46.2188 51C45.5828 51 45.0625 50.4797 45.0625 49.8438V40.5938Z" fill="#EEF1FB" />
                        </svg>
                    </div>
                    <div class="doc-content">
                        <h3 class="doc-title">Name Correction Form</h3>
                        <p class="doc-size">Loading size...</p>
                    </div>
                    <button class="doc-download-btn" onclick="window.open('../assets/downloads/Name-Correction-Form.pdf', '_blank'); return false;">
                        <span>Download</span>
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 16L7 11L8.4 9.55L11 12.15V4H13V12.15L15.6 9.55L17 11L12 16Z" fill="currentColor" />
                            <path d="M5 20H19V18H5V20Z" fill="currentColor" />
                        </svg>
                    </button>
                </div>

                <div class="document-card" data-file-path="../assets/downloads/Account-Closer-Form.pdf">
                    <div class="doc-pdf-icon">
                        <svg width="72" height="72" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="64" height="64" rx="16" fill="#A0A9CF" />
                            <path d="M15 18.625C15 16.074 17.074 14 19.625 14H31.1875V23.25C31.1875 24.5291 32.2209 25.5625 33.5 25.5625H42.75V35.9688H27.7188C25.1678 35.9688 23.0938 38.0428 23.0938 40.5938V51H19.625C17.074 51 15 48.926 15 46.375V18.625ZM42.75 23.25H33.5V14L42.75 23.25ZM27.7188 39.4375H30.0312C32.2643 39.4375 34.0781 41.2514 34.0781 43.4844C34.0781 45.7174 32.2643 47.5312 30.0312 47.5312H28.875V49.8438C28.875 50.4797 28.3547 51 27.7188 51C27.0828 51 26.5625 50.4797 26.5625 49.8438V40.5938C26.5625 39.9578 27.0828 39.4375 27.7188 39.4375ZM30.0312 45.2188C30.9924 45.2188 31.7656 44.4455 31.7656 43.4844C31.7656 42.5232 30.9924 41.75 30.0312 41.75H28.875V45.2188H30.0312ZM36.9688 39.4375H39.2812C41.1963 39.4375 42.75 40.9912 42.75 42.9062V47.5312C42.75 49.4463 41.1963 51 39.2812 51H36.9688C36.3328 51 35.8125 50.4797 35.8125 49.8438V40.5938C35.8125 39.9578 36.3328 39.4375 36.9688 39.4375ZM39.2812 48.6875C39.9172 48.6875 40.4375 48.1672 40.4375 47.5312V42.9062C40.4375 42.2703 39.9172 41.75 39.2812 41.75H38.125V48.6875H39.2812ZM45.0625 40.5938C45.0625 39.9578 45.5828 39.4375 46.2188 39.4375H49.6875C50.3234 39.4375 50.8438 39.9578 50.8438 40.5938C50.8438 41.2297 50.3234 41.75 49.6875 41.75H47.375V44.0625H49.6875C50.3234 44.0625 50.8438 44.5828 50.8438 45.2188C50.8438 45.8547 50.3234 46.375 49.6875 46.375H47.375V49.8438C47.375 50.4797 46.8547 51 46.2188 51C45.5828 51 45.0625 50.4797 45.0625 49.8438V40.5938Z" fill="#EEF1FB" />
                        </svg>
                    </div>
                    <div class="doc-content">
                        <h3 class="doc-title">Account Closer Form</h3>
                        <p class="doc-size">Loading size...</p>
                    </div>
                    <button class="doc-download-btn" onclick="window.open('../assets/downloads/Account-Closer-Form.pdf', '_blank'); return false;">
                        <span>Download</span>
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 16L7 11L8.4 9.55L11 12.15V4H13V12.15L15.6 9.55L17 11L12 16Z" fill="currentColor" />
                            <path d="M5 20H19V18H5V20Z" fill="currentColor" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Customer Documents -->
            <div class="download-category" id="customer-docs" style="display: none;">
                <div class="document-card" data-file-path="../assets/downloads/Rights-Obligation-of-Stock-Brokers-Clients-for-MTF.pdf">
                    <div class="doc-pdf-icon">
                        <svg width="72" height="72" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="64" height="64" rx="16" fill="#A0A9CF" />
                            <path d="M15 18.625C15 16.074 17.074 14 19.625 14H31.1875V23.25C31.1875 24.5291 32.2209 25.5625 33.5 25.5625H42.75V35.9688H27.7188C25.1678 35.9688 23.0938 38.0428 23.0938 40.5938V51H19.625C17.074 51 15 48.926 15 46.375V18.625ZM42.75 23.25H33.5V14L42.75 23.25ZM27.7188 39.4375H30.0312C32.2643 39.4375 34.0781 41.2514 34.0781 43.4844C34.0781 45.7174 32.2643 47.5312 30.0312 47.5312H28.875V49.8438C28.875 50.4797 28.3547 51 27.7188 51C27.0828 51 26.5625 50.4797 26.5625 49.8438V40.5938C26.5625 39.9578 27.0828 39.4375 27.7188 39.4375ZM30.0312 45.2188C30.9924 45.2188 31.7656 44.4455 31.7656 43.4844C31.7656 42.5232 30.9924 41.75 30.0312 41.75H28.875V45.2188H30.0312ZM36.9688 39.4375H39.2812C41.1963 39.4375 42.75 40.9912 42.75 42.9062V47.5312C42.75 49.4463 41.1963 51 39.2812 51H36.9688C36.3328 51 35.8125 50.4797 35.8125 49.8438V40.5938C35.8125 39.9578 36.3328 39.4375 36.9688 39.4375ZM39.2812 48.6875C39.9172 48.6875 40.4375 48.1672 40.4375 47.5312V42.9062C40.4375 42.2703 39.9172 41.75 39.2812 41.75H38.125V48.6875H39.2812ZM45.0625 40.5938C45.0625 39.9578 45.5828 39.4375 46.2188 39.4375H49.6875C50.3234 39.4375 50.8438 39.9578 50.8438 40.5938C50.8438 41.2297 50.3234 41.75 49.6875 41.75H47.375V44.0625H49.6875C50.3234 44.0625 50.8438 44.5828 50.8438 45.2188C50.8438 45.8547 50.3234 46.375 49.6875 46.375H47.375V49.8438C47.375 50.4797 46.8547 51 46.2188 51C45.5828 51 45.0625 50.4797 45.0625 49.8438V40.5938Z" fill="#EEF1FB" />
                        </svg>
                    </div>
                    <div class="doc-content">
                        <h3 class="doc-title">Rights & Obligation of Stock Brokers & Clients for MTF</h3>
                        <p class="doc-size">Loading size...</p>
                    </div>
                    <button class="doc-download-btn" onclick="window.open('img/Rights-Obligation-of-Stock-Brokers-Clients-for-MTF.pdf', '_blank'); return false;">
                        <span>Download</span>
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 16L7 11L8.4 9.55L11 12.15V4H13V12.15L15.6 9.55L17 11L12 16Z" fill="currentColor" />
                            <path d="M5 20H19V18H5V20Z" fill="currentColor" />
                        </svg>
                    </button>
                </div>

                <div class="document-card" data-file-path="../assets/downloads/RIGHTS-AND-OBLIGATIONS-Trading.pdf">
                    <div class="doc-pdf-icon">
                        <svg width="72" height="72" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="64" height="64" rx="16" fill="#A0A9CF" />
                            <path d="M15 18.625C15 16.074 17.074 14 19.625 14H31.1875V23.25C31.1875 24.5291 32.2209 25.5625 33.5 25.5625H42.75V35.9688H27.7188C25.1678 35.9688 23.0938 38.0428 23.0938 40.5938V51H19.625C17.074 51 15 48.926 15 46.375V18.625ZM42.75 23.25H33.5V14L42.75 23.25ZM27.7188 39.4375H30.0312C32.2643 39.4375 34.0781 41.2514 34.0781 43.4844C34.0781 45.7174 32.2643 47.5312 30.0312 47.5312H28.875V49.8438C28.875 50.4797 28.3547 51 27.7188 51C27.0828 51 26.5625 50.4797 26.5625 49.8438V40.5938C26.5625 39.9578 27.0828 39.4375 27.7188 39.4375ZM30.0312 45.2188C30.9924 45.2188 31.7656 44.4455 31.7656 43.4844C31.7656 42.5232 30.9924 41.75 30.0312 41.75H28.875V45.2188H30.0312ZM36.9688 39.4375H39.2812C41.1963 39.4375 42.75 40.9912 42.75 42.9062V47.5312C42.75 49.4463 41.1963 51 39.2812 51H36.9688C36.3328 51 35.8125 50.4797 35.8125 49.8438V40.5938C35.8125 39.9578 36.3328 39.4375 36.9688 39.4375ZM39.2812 48.6875C39.9172 48.6875 40.4375 48.1672 40.4375 47.5312V42.9062C40.4375 42.2703 39.9172 41.75 39.2812 41.75H38.125V48.6875H39.2812ZM45.0625 40.5938C45.0625 39.9578 45.5828 39.4375 46.2188 39.4375H49.6875C50.3234 39.4375 50.8438 39.9578 50.8438 40.5938C50.8438 41.2297 50.3234 41.75 49.6875 41.75H47.375V44.0625H49.6875C50.3234 44.0625 50.8438 44.5828 50.8438 45.2188C50.8438 45.8547 50.3234 46.375 49.6875 46.375H47.375V49.8438C47.375 50.4797 46.8547 51 46.2188 51C45.5828 51 45.0625 50.4797 45.0625 49.8438V40.5938Z" fill="#EEF1FB" />
                        </svg>
                    </div>
                    <div class="doc-content">
                        <h3 class="doc-title">RIGHTS AND OBLIGATIONS (Trading)</h3>
                        <p class="doc-size">Loading size...</p>
                    </div>
                    <button class="doc-download-btn" onclick="window.open('img/RIGHTS-AND-OBLIGATIONS-Trading.pdf', '_blank'); return false;">
                        <span>Download</span>
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 16L7 11L8.4 9.55L11 12.15V4H13V12.15L15.6 9.55L17 11L12 16Z" fill="currentColor" />
                            <path d="M5 20H19V18H5V20Z" fill="currentColor" />
                        </svg>
                    </button>
                </div>

                <div class="document-card" data-file-path="../assets/downloads/RIGHTS-AND-OBLIGATIONS-DP.pdf">
                    <div class="doc-pdf-icon">
                        <svg width="72" height="72" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="64" height="64" rx="16" fill="#A0A9CF" />
                            <path d="M15 18.625C15 16.074 17.074 14 19.625 14H31.1875V23.25C31.1875 24.5291 32.2209 25.5625 33.5 25.5625H42.75V35.9688H27.7188C25.1678 35.9688 23.0938 38.0428 23.0938 40.5938V51H19.625C17.074 51 15 48.926 15 46.375V18.625ZM42.75 23.25H33.5V14L42.75 23.25ZM27.7188 39.4375H30.0312C32.2643 39.4375 34.0781 41.2514 34.0781 43.4844C34.0781 45.7174 32.2643 47.5312 30.0312 47.5312H28.875V49.8438C28.875 50.4797 28.3547 51 27.7188 51C27.0828 51 26.5625 50.4797 26.5625 49.8438V40.5938C26.5625 39.9578 27.0828 39.4375 27.7188 39.4375ZM30.0312 45.2188C30.9924 45.2188 31.7656 44.4455 31.7656 43.4844C31.7656 42.5232 30.9924 41.75 30.0312 41.75H28.875V45.2188H30.0312ZM36.9688 39.4375H39.2812C41.1963 39.4375 42.75 40.9912 42.75 42.9062V47.5312C42.75 49.4463 41.1963 51 39.2812 51H36.9688C36.3328 51 35.8125 50.4797 35.8125 49.8438V40.5938C35.8125 39.9578 36.3328 39.4375 36.9688 39.4375ZM39.2812 48.6875C39.9172 48.6875 40.4375 48.1672 40.4375 47.5312V42.9062C40.4375 42.2703 39.9172 41.75 39.2812 41.75H38.125V48.6875H39.2812ZM45.0625 40.5938C45.0625 39.9578 45.5828 39.4375 46.2188 39.4375H49.6875C50.3234 39.4375 50.8438 39.9578 50.8438 40.5938C50.8438 41.2297 50.3234 41.75 49.6875 41.75H47.375V44.0625H49.6875C50.3234 44.0625 50.8438 44.5828 50.8438 45.2188C50.8438 45.8547 50.3234 46.375 49.6875 46.375H47.375V49.8438C47.375 50.4797 46.8547 51 46.2188 51C45.5828 51 45.0625 50.4797 45.0625 49.8438V40.5938Z" fill="#EEF1FB" />
                        </svg>
                    </div>
                    <div class="doc-content">
                        <h3 class="doc-title">RIGHTS AND OBLIGATIONS (DP)</h3>
                        <p class="doc-size">Loading size...</p>
                    </div>
                    <button class="doc-download-btn" onclick="window.open('img/RIGHTS-AND-OBLIGATIONS-DP.pdf', '_blank'); return false;">
                        <span>Download</span>
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 16L7 11L8.4 9.55L11 12.15V4H13V12.15L15.6 9.55L17 11L12 16Z" fill="currentColor" />
                            <path d="M5 20H19V18H5V20Z" fill="currentColor" />
                        </svg>
                    </button>
                </div>

                <div class="document-card" data-file-path="../assets/downloads/POLICIES-AND-PROCEDURES-FOR-CLIENT-DEALINGS.pdf">
                    <div class="doc-pdf-icon">
                        <svg width="72" height="72" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="64" height="64" rx="16" fill="#A0A9CF" />
                            <path d="M15 18.625C15 16.074 17.074 14 19.625 14H31.1875V23.25C31.1875 24.5291 32.2209 25.5625 33.5 25.5625H42.75V35.9688H27.7188C25.1678 35.9688 23.0938 38.0428 23.0938 40.5938V51H19.625C17.074 51 15 48.926 15 46.375V18.625ZM42.75 23.25H33.5V14L42.75 23.25ZM27.7188 39.4375H30.0312C32.2643 39.4375 34.0781 41.2514 34.0781 43.4844C34.0781 45.7174 32.2643 47.5312 30.0312 47.5312H28.875V49.8438C28.875 50.4797 28.3547 51 27.7188 51C27.0828 51 26.5625 50.4797 26.5625 49.8438V40.5938C26.5625 39.9578 27.0828 39.4375 27.7188 39.4375ZM30.0312 45.2188C30.9924 45.2188 31.7656 44.4455 31.7656 43.4844C31.7656 42.5232 30.9924 41.75 30.0312 41.75H28.875V45.2188H30.0312ZM36.9688 39.4375H39.2812C41.1963 39.4375 42.75 40.9912 42.75 42.9062V47.5312C42.75 49.4463 41.1963 51 39.2812 51H36.9688C36.3328 51 35.8125 50.4797 35.8125 49.8438V40.5938C35.8125 39.9578 36.3328 39.4375 36.9688 39.4375ZM39.2812 48.6875C39.9172 48.6875 40.4375 48.1672 40.4375 47.5312V42.9062C40.4375 42.2703 39.9172 41.75 39.2812 41.75H38.125V48.6875H39.2812ZM45.0625 40.5938C45.0625 39.9578 45.5828 39.4375 46.2188 39.4375H49.6875C50.3234 39.4375 50.8438 39.9578 50.8438 40.5938C50.8438 41.2297 50.3234 41.75 49.6875 41.75H47.375V44.0625H49.6875C50.3234 44.0625 50.8438 44.5828 50.8438 45.2188C50.8438 45.8547 50.3234 46.375 49.6875 46.375H47.375V49.8438C47.375 50.4797 46.8547 51 46.2188 51C45.5828 51 45.0625 50.4797 45.0625 49.8438V40.5938Z" fill="#EEF1FB" />
                        </svg>
                    </div>
                    <div class="doc-content">
                        <h3 class="doc-title">POLICIES AND PROCEDURES FOR CLIENT DEALINGS</h3>
                        <p class="doc-size">Loading size...</p>
                    </div>
                    <button class="doc-download-btn" onclick="window.open('img/POLICIES-AND-PROCEDURES-FOR-CLIENT-DEALINGS.pdf', '_blank'); return false;">
                        <span>Download</span>
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 16L7 11L8.4 9.55L11 12.15V4H13V12.15L15.6 9.55L17 11L12 16Z" fill="currentColor" />
                            <path d="M5 20H19V18H5V20Z" fill="currentColor" />
                        </svg>
                    </button>
                </div>

                <div class="document-card" data-file-path="../assets/downloads/RISK-DISCLOSURE-DOCUMENT-FOR-CAPITAL-MARKET-AND-DERIVATIVES-SEGMENTS.pdf">
                    <div class="doc-pdf-icon">
                        <svg width="72" height="72" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="64" height="64" rx="16" fill="#A0A9CF" />
                            <path d="M15 18.625C15 16.074 17.074 14 19.625 14H31.1875V23.25C31.1875 24.5291 32.2209 25.5625 33.5 25.5625H42.75V35.9688H27.7188C25.1678 35.9688 23.0938 38.0428 23.0938 40.5938V51H19.625C17.074 51 15 48.926 15 46.375V18.625ZM42.75 23.25H33.5V14L42.75 23.25ZM27.7188 39.4375H30.0312C32.2643 39.4375 34.0781 41.2514 34.0781 43.4844C34.0781 45.7174 32.2643 47.5312 30.0312 47.5312H28.875V49.8438C28.875 50.4797 28.3547 51 27.7188 51C27.0828 51 26.5625 50.4797 26.5625 49.8438V40.5938C26.5625 39.9578 27.0828 39.4375 27.7188 39.4375ZM30.0312 45.2188C30.9924 45.2188 31.7656 44.4455 31.7656 43.4844C31.7656 42.5232 30.9924 41.75 30.0312 41.75H28.875V45.2188H30.0312ZM36.9688 39.4375H39.2812C41.1963 39.4375 42.75 40.9912 42.75 42.9062V47.5312C42.75 49.4463 41.1963 51 39.2812 51H36.9688C36.3328 51 35.8125 50.4797 35.8125 49.8438V40.5938C35.8125 39.9578 36.3328 39.4375 36.9688 39.4375ZM39.2812 48.6875C39.9172 48.6875 40.4375 48.1672 40.4375 47.5312V42.9062C40.4375 42.2703 39.9172 41.75 39.2812 41.75H38.125V48.6875H39.2812ZM45.0625 40.5938C45.0625 39.9578 45.5828 39.4375 46.2188 39.4375H49.6875C50.3234 39.4375 50.8438 39.9578 50.8438 40.5938C50.8438 41.2297 50.3234 41.75 49.6875 41.75H47.375V44.0625H49.6875C50.3234 44.0625 50.8438 44.5828 50.8438 45.2188C50.8438 45.8547 50.3234 46.375 49.6875 46.375H47.375V49.8438C47.375 50.4797 46.8547 51 46.2188 51C45.5828 51 45.0625 50.4797 45.0625 49.8438V40.5938Z" fill="#EEF1FB" />
                        </svg>
                    </div>
                    <div class="doc-content">
                        <h3 class="doc-title">RISK DISCLOSURE DOCUMENT FOR CAPITAL MARKET AND DERIVATIVES SEGMENTS</h3>
                        <p class="doc-size">Loading size...</p>
                    </div>
                    <button class="doc-download-btn" onclick="window.open('img/RISK-DISCLOSURE-DOCUMENT-FOR-CAPITAL-MARKET-AND-DERIVATIVES-SEGMENTS.pdf', '_blank'); return false;">
                        <span>Download</span>
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 16L7 11L8.4 9.55L11 12.15V4H13V12.15L15.6 9.55L17 11L12 16Z" fill="currentColor" />
                            <path d="M5 20H19V18H5V20Z" fill="currentColor" />
                        </svg>
                    </button>
                </div>

                <div class="document-card" data-file-path="../assets/downloads/GUIDANCE-NOTE-DOS-AND-DONTS-FOR-TRADING-ON-THE-EXCHANGE-FOR-INVESTORS.pdf">
                    <div class="doc-pdf-icon">
                        <svg width="72" height="72" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="64" height="64" rx="16" fill="#A0A9CF" />
                            <path d="M15 18.625C15 16.074 17.074 14 19.625 14H31.1875V23.25C31.1875 24.5291 32.2209 25.5625 33.5 25.5625H42.75V35.9688H27.7188C25.1678 35.9688 23.0938 38.0428 23.0938 40.5938V51H19.625C17.074 51 15 48.926 15 46.375V18.625ZM42.75 23.25H33.5V14L42.75 23.25ZM27.7188 39.4375H30.0312C32.2643 39.4375 34.0781 41.2514 34.0781 43.4844C34.0781 45.7174 32.2643 47.5312 30.0312 47.5312H28.875V49.8438C28.875 50.4797 28.3547 51 27.7188 51C27.0828 51 26.5625 50.4797 26.5625 49.8438V40.5938C26.5625 39.9578 27.0828 39.4375 27.7188 39.4375ZM30.0312 45.2188C30.9924 45.2188 31.7656 44.4455 31.7656 43.4844C31.7656 42.5232 30.9924 41.75 30.0312 41.75H28.875V45.2188H30.0312ZM36.9688 39.4375H39.2812C41.1963 39.4375 42.75 40.9912 42.75 42.9062V47.5312C42.75 49.4463 41.1963 51 39.2812 51H36.9688C36.3328 51 35.8125 50.4797 35.8125 49.8438V40.5938C35.8125 39.9578 36.3328 39.4375 36.9688 39.4375ZM39.2812 48.6875C39.9172 48.6875 40.4375 48.1672 40.4375 47.5312V42.9062C40.4375 42.2703 39.9172 41.75 39.2812 41.75H38.125V48.6875H39.2812ZM45.0625 40.5938C45.0625 39.9578 45.5828 39.4375 46.2188 39.4375H49.6875C50.3234 39.4375 50.8438 39.9578 50.8438 40.5938C50.8438 41.2297 50.3234 41.75 49.6875 41.75H47.375V44.0625H49.6875C50.3234 44.0625 50.8438 44.5828 50.8438 45.2188C50.8438 45.8547 50.3234 46.375 49.6875 46.375H47.375V49.8438C47.375 50.4797 46.8547 51 46.2188 51C45.5828 51 45.0625 50.4797 45.0625 49.8438V40.5938Z" fill="#EEF1FB" />
                        </svg>
                    </div>
                    <div class="doc-content">
                        <h3 class="doc-title">GUIDANCE NOTE - DO'S AND DON'TS FOR TRADING ON THE EXCHANGE(S) FOR INVESTORS</h3>
                        <p class="doc-size">Loading size...</p>
                    </div>
                    <button class="doc-download-btn" onclick="window.open('img/GUIDANCE-NOTE-DOS-AND-DONTS-FOR-TRADING-ON-THE-EXCHANGE-FOR-INVESTORS.pdf', '_blank'); return false;">
                        <span>Download</span>
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 16L7 11L8.4 9.55L11 12.15V4H13V12.15L15.6 9.55L17 11L12 16Z" fill="currentColor" />
                            <path d="M5 20H19V18H5V20Z" fill="currentColor" />
                        </svg>
                    </button>
                </div>

                <div class="document-card" data-file-path="../assets/downloads/INTERNET-WIRELESS-TECHNOLOGY.pdf">
                    <div class="doc-pdf-icon">
                        <svg width="72" height="72" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="64" height="64" rx="16" fill="#A0A9CF" />
                            <path d="M15 18.625C15 16.074 17.074 14 19.625 14H31.1875V23.25C31.1875 24.5291 32.2209 25.5625 33.5 25.5625H42.75V35.9688H27.7188C25.1678 35.9688 23.0938 38.0428 23.0938 40.5938V51H19.625C17.074 51 15 48.926 15 46.375V18.625ZM42.75 23.25H33.5V14L42.75 23.25ZM27.7188 39.4375H30.0312C32.2643 39.4375 34.0781 41.2514 34.0781 43.4844C34.0781 45.7174 32.2643 47.5312 30.0312 47.5312H28.875V49.8438C28.875 50.4797 28.3547 51 27.7188 51C27.0828 51 26.5625 50.4797 26.5625 49.8438V40.5938C26.5625 39.9578 27.0828 39.4375 27.7188 39.4375ZM30.0312 45.2188C30.9924 45.2188 31.7656 44.4455 31.7656 43.4844C31.7656 42.5232 30.9924 41.75 30.0312 41.75H28.875V45.2188H30.0312ZM36.9688 39.4375H39.2812C41.1963 39.4375 42.75 40.9912 42.75 42.9062V47.5312C42.75 49.4463 41.1963 51 39.2812 51H36.9688C36.3328 51 35.8125 50.4797 35.8125 49.8438V40.5938C35.8125 39.9578 36.3328 39.4375 36.9688 39.4375ZM39.2812 48.6875C39.9172 48.6875 40.4375 48.1672 40.4375 47.5312V42.9062C40.4375 42.2703 39.9172 41.75 39.2812 41.75H38.125V48.6875H39.2812ZM45.0625 40.5938C45.0625 39.9578 45.5828 39.4375 46.2188 39.4375H49.6875C50.3234 39.4375 50.8438 39.9578 50.8438 40.5938C50.8438 41.2297 50.3234 41.75 49.6875 41.75H47.375V44.0625H49.6875C50.3234 44.0625 50.8438 44.5828 50.8438 45.2188C50.8438 45.8547 50.3234 46.375 49.6875 46.375H47.375V49.8438C47.375 50.4797 46.8547 51 46.2188 51C45.5828 51 45.0625 50.4797 45.0625 49.8438V40.5938Z" fill="#EEF1FB" />
                        </svg>
                    </div>
                    <div class="doc-content">
                        <h3 class="doc-title">INTERNET & WIRELESS TECHNOLOGY</h3>
                        <p class="doc-size">Loading size...</p>
                    </div>
                    <button class="doc-download-btn" onclick="window.open('img/INTERNET-WIRELESS-TECHNOLOGY.pdf', '_blank'); return false;">
                        <span>Download</span>
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 16L7 11L8.4 9.55L11 12.15V4H13V12.15L15.6 9.55L17 11L12 16Z" fill="currentColor" />
                            <path d="M5 20H19V18H5V20Z" fill="currentColor" />
                        </svg>
                    </button>
                </div>

                <div class="document-card" data-file-path="../assets/downloads/PROCEDURE-FOR-VALIDATING-KRA-STATUS.pdf">
                    <div class="doc-pdf-icon">
                        <svg width="72" height="72" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="64" height="64" rx="16" fill="#A0A9CF" />
                            <path d="M15 18.625C15 16.074 17.074 14 19.625 14H31.1875V23.25C31.1875 24.5291 32.2209 25.5625 33.5 25.5625H42.75V35.9688H27.7188C25.1678 35.9688 23.0938 38.0428 23.0938 40.5938V51H19.625C17.074 51 15 48.926 15 46.375V18.625ZM42.75 23.25H33.5V14L42.75 23.25ZM27.7188 39.4375H30.0312C32.2643 39.4375 34.0781 41.2514 34.0781 43.4844C34.0781 45.7174 32.2643 47.5312 30.0312 47.5312H28.875V49.8438C28.875 50.4797 28.3547 51 27.7188 51C27.0828 51 26.5625 50.4797 26.5625 49.8438V40.5938C26.5625 39.9578 27.0828 39.4375 27.7188 39.4375ZM30.0312 45.2188C30.9924 45.2188 31.7656 44.4455 31.7656 43.4844C31.7656 42.5232 30.9924 41.75 30.0312 41.75H28.875V45.2188H30.0312ZM36.9688 39.4375H39.2812C41.1963 39.4375 42.75 40.9912 42.75 42.9062V47.5312C42.75 49.4463 41.1963 51 39.2812 51H36.9688C36.3328 51 35.8125 50.4797 35.8125 49.8438V40.5938C35.8125 39.9578 36.3328 39.4375 36.9688 39.4375ZM39.2812 48.6875C39.9172 48.6875 40.4375 48.1672 40.4375 47.5312V42.9062C40.4375 42.2703 39.9172 41.75 39.2812 41.75H38.125V48.6875H39.2812ZM45.0625 40.5938C45.0625 39.9578 45.5828 39.4375 46.2188 39.4375H49.6875C50.3234 39.4375 50.8438 39.9578 50.8438 40.5938C50.8438 41.2297 50.3234 41.75 49.6875 41.75H47.375V44.0625H49.6875C50.3234 44.0625 50.8438 44.5828 50.8438 45.2188C50.8438 45.8547 50.3234 46.375 49.6875 46.375H47.375V49.8438C47.375 50.4797 46.8547 51 46.2188 51C45.5828 51 45.0625 50.4797 45.0625 49.8438V40.5938Z" fill="#EEF1FB" />
                        </svg>
                    </div>
                    <div class="doc-content">
                        <h3 class="doc-title">PROCEDURE FOR VALIDATING KRA STATUS</h3>
                        <p class="doc-size">Loading size...</p>
                    </div>
                    <button class="doc-download-btn" onclick="window.open('img/PROCEDURE-FOR-VALIDATING-KRA-STATUS.pdf', '_blank'); return false;">
                        <span>Download</span>
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 16L7 11L8.4 9.55L11 12.15V4H13V12.15L15.6 9.55L17 11L12 16Z" fill="currentColor" />
                            <path d="M5 20H19V18H5V20Z" fill="currentColor" />
                        </svg>
                    </button>
                </div>

                <div class="document-card" data-file-path="../assets/downloads/Most-Important-Terms-Conditions-MITC.pdf">
                    <div class="doc-pdf-icon">
                        <svg width="72" height="72" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="64" height="64" rx="16" fill="#A0A9CF" />
                            <path d="M15 18.625C15 16.074 17.074 14 19.625 14H31.1875V23.25C31.1875 24.5291 32.2209 25.5625 33.5 25.5625H42.75V35.9688H27.7188C25.1678 35.9688 23.0938 38.0428 23.0938 40.5938V51H19.625C17.074 51 15 48.926 15 46.375V18.625ZM42.75 23.25H33.5V14L42.75 23.25ZM27.7188 39.4375H30.0312C32.2643 39.4375 34.0781 41.2514 34.0781 43.4844C34.0781 45.7174 32.2643 47.5312 30.0312 47.5312H28.875V49.8438C28.875 50.4797 28.3547 51 27.7188 51C27.0828 51 26.5625 50.4797 26.5625 49.8438V40.5938C26.5625 39.9578 27.0828 39.4375 27.7188 39.4375ZM30.0312 45.2188C30.9924 45.2188 31.7656 44.4455 31.7656 43.4844C31.7656 42.5232 30.9924 41.75 30.0312 41.75H28.875V45.2188H30.0312ZM36.9688 39.4375H39.2812C41.1963 39.4375 42.75 40.9912 42.75 42.9062V47.5312C42.75 49.4463 41.1963 51 39.2812 51H36.9688C36.3328 51 35.8125 50.4797 35.8125 49.8438V40.5938C35.8125 39.9578 36.3328 39.4375 36.9688 39.4375ZM39.2812 48.6875C39.9172 48.6875 40.4375 48.1672 40.4375 47.5312V42.9062C40.4375 42.2703 39.9172 41.75 39.2812 41.75H38.125V48.6875H39.2812ZM45.0625 40.5938C45.0625 39.9578 45.5828 39.4375 46.2188 39.4375H49.6875C50.3234 39.4375 50.8438 39.9578 50.8438 40.5938C50.8438 41.2297 50.3234 41.75 49.6875 41.75H47.375V44.0625H49.6875C50.3234 44.0625 50.8438 44.5828 50.8438 45.2188C50.8438 45.8547 50.3234 46.375 49.6875 46.375H47.375V49.8438C47.375 50.4797 46.8547 51 46.2188 51C45.5828 51 45.0625 50.4797 45.0625 49.8438V40.5938Z" fill="#EEF1FB" />
                        </svg>
                    </div>
                    <div class="doc-content">
                        <h3 class="doc-title">Most Important Terms & Conditions (MITC)</h3>
                        <p class="doc-size">Loading size...</p>
                    </div>
                    <button class="doc-download-btn" onclick="window.open('img/Most-Important-Terms-Conditions-MITC.pdf', '_blank'); return false;">
                        <span>Download</span>
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 16L7 11L8.4 9.55L11 12.15V4H13V12.15L15.6 9.55L17 11L12 16Z" fill="currentColor" />
                            <path d="M5 20H19V18H5V20Z" fill="currentColor" />
                        </svg>
                    </button>
                </div>

                <div class="document-card" data-file-path="../assets/documents/GSBL_Standalone_Audit Report_2023.pdf" data-file-size="32104821">
                    <div class="doc-pdf-icon">
                        <svg width="72" height="72" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="64" height="64" rx="16" fill="#A0A9CF" />
                            <path d="M15 18.625C15 16.074 17.074 14 19.625 14H31.1875V23.25C31.1875 24.5291 32.2209 25.5625 33.5 25.5625H42.75V35.9688H27.7188C25.1678 35.9688 23.0938 38.0428 23.0938 40.5938V51H19.625C17.074 51 15 48.926 15 46.375V18.625ZM42.75 23.25H33.5V14L42.75 23.25ZM27.7188 39.4375H30.0312C32.2643 39.4375 34.0781 41.2514 34.0781 43.4844C34.0781 45.7174 32.2643 47.5312 30.0312 47.5312H28.875V49.8438C28.875 50.4797 28.3547 51 27.7188 51C27.0828 51 26.5625 50.4797 26.5625 49.8438V40.5938C26.5625 39.9578 27.0828 39.4375 27.7188 39.4375ZM30.0312 45.2188C30.9924 45.2188 31.7656 44.4455 31.7656 43.4844C31.7656 42.5232 30.9924 41.75 30.0312 41.75H28.875V45.2188H30.0312ZM36.9688 39.4375H39.2812C41.1963 39.4375 42.75 40.9912 42.75 42.9062V47.5312C42.75 49.4463 41.1963 51 39.2812 51H36.9688C36.3328 51 35.8125 50.4797 35.8125 49.8438V40.5938C35.8125 39.9578 36.3328 39.4375 36.9688 39.4375ZM39.2812 48.6875C39.9172 48.6875 40.4375 48.1672 40.4375 47.5312V42.9062C40.4375 42.2703 39.9172 41.75 39.2812 41.75H38.125V48.6875H39.2812ZM45.0625 40.5938C45.0625 39.9578 45.5828 39.4375 46.2188 39.4375H49.6875C50.3234 39.4375 50.8438 39.9578 50.8438 40.5938C50.8438 41.2297 50.3234 41.75 49.6875 41.75H47.375V44.0625H49.6875C50.3234 44.0625 50.8438 44.5828 50.8438 45.2188C50.8438 45.8547 50.3234 46.375 49.6875 46.375H47.375V49.8438C47.375 50.4797 46.8547 51 46.2188 51C45.5828 51 45.0625 50.4797 45.0625 49.8438V40.5938Z" fill="#EEF1FB" />
                        </svg>
                    </div>
                    <div class="doc-content">
                        <h3 class="doc-title">GSBL Standalone Audit Report 2023</h3>
                        <p class="doc-size">Loading size...</p>
                    </div>
                    <button class="doc-download-btn" onclick="window.open('../assets/documents/GSBL_Standalone_Audit Report_2023.pdf', '_blank'); return false;">
                        <span>Download</span>
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 16L7 11L8.4 9.55L11 12.15V4H13V12.15L15.6 9.55L17 11L12 16Z" fill="currentColor" />
                            <path d="M5 20H19V18H5V20Z" fill="currentColor" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- e-Voting Documents -->
            <div class="download-category" id="evoting" style="display: none;">
                <div class="document-card" data-file-path="../assets/downloads/nsdl-evoting-guide.pdf">
                    <div class="doc-pdf-icon">
                        <svg width="72" height="72" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="64" height="64" rx="16" fill="#A0A9CF" />
                            <path
                                d="M15 18.625C15 16.074 17.074 14 19.625 14H31.1875V23.25C31.1875 24.5291 32.2209 25.5625 33.5 25.5625H42.75V35.9688H27.7188C25.1678 35.9688 23.0938 38.0428 23.0938 40.5938V51H19.625C17.074 51 15 48.926 15 46.375V18.625ZM42.75 23.25H33.5V14L42.75 23.25ZM27.7188 39.4375H30.0312C32.2643 39.4375 34.0781 41.2514 34.0781 43.4844C34.0781 45.7174 32.2643 47.5312 30.0312 47.5312H28.875V49.8438C28.875 50.4797 28.3547 51 27.7188 51C27.0828 51 26.5625 50.4797 26.5625 49.8438V40.5938C26.5625 39.9578 27.0828 39.4375 27.7188 39.4375ZM30.0312 45.2188C30.9924 45.2188 31.7656 44.4455 31.7656 43.4844C31.7656 42.5232 30.9924 41.75 30.0312 41.75H28.875V45.2188H30.0312ZM36.9688 39.4375H39.2812C41.1963 39.4375 42.75 40.9912 42.75 42.9062V47.5312C42.75 49.4463 41.1963 51 39.2812 51H36.9688C36.3328 51 35.8125 50.4797 35.8125 49.8438V40.5938C35.8125 39.9578 36.3328 39.4375 36.9688 39.4375ZM39.2812 48.6875C39.9172 48.6875 40.4375 48.1672 40.4375 47.5312V42.9062C40.4375 42.2703 39.9172 41.75 39.2812 41.75H38.125V48.6875H39.2812ZM45.0625 40.5938C45.0625 39.9578 45.5828 39.4375 46.2188 39.4375H49.6875C50.3234 39.4375 50.8438 39.9578 50.8438 40.5938C50.8438 41.2297 50.3234 41.75 49.6875 41.75H47.375V44.0625H49.6875C50.3234 44.0625 50.8438 44.5828 50.8438 45.2188C50.8438 45.8547 50.3234 46.375 49.6875 46.375H47.375V49.8438C47.375 50.4797 46.8547 51 46.2188 51C45.5828 51 45.0625 50.4797 45.0625 49.8438V40.5938Z"
                                fill="#EEF1FB" />
                        </svg>
                    </div>
                    <div class="doc-content">
                        <h3 class="doc-title">NSDL e-Voting Guide</h3>
                        <p class="doc-date">10-03-2024</p>
                        <p class="doc-size">Loading size...</p>
                    </div>
                    <button class="doc-download-btn" onclick="window.open('img/nsdl-evoting-guide.pdf', '_blank'); return false;">
                        <span>Download</span>
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 16L7 11L8.4 9.55L11 12.15V4H13V12.15L15.6 9.55L17 11L12 16Z" fill="currentColor" />
                            <path d="M5 20H19V18H5V20Z" fill="currentColor" />
                        </svg>
                    </button>
                </div>

                <div class="document-card" data-file-path="../assets/downloads/how-to-vote-electronically.pdf">
                    <div class="doc-pdf-icon">
                        <svg width="72" height="72" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="64" height="64" rx="16" fill="#A0A9CF" />
                            <path
                                d="M15 18.625C15 16.074 17.074 14 19.625 14H31.1875V23.25C31.1875 24.5291 32.2209 25.5625 33.5 25.5625H42.75V35.9688H27.7188C25.1678 35.9688 23.0938 38.0428 23.0938 40.5938V51H19.625C17.074 51 15 48.926 15 46.375V18.625ZM42.75 23.25H33.5V14L42.75 23.25ZM27.7188 39.4375H30.0312C32.2643 39.4375 34.0781 41.2514 34.0781 43.4844C34.0781 45.7174 32.2643 47.5312 30.0312 47.5312H28.875V49.8438C28.875 50.4797 28.3547 51 27.7188 51C27.0828 51 26.5625 50.4797 26.5625 49.8438V40.5938C26.5625 39.9578 27.0828 39.4375 27.7188 39.4375ZM30.0312 45.2188C30.9924 45.2188 31.7656 44.4455 31.7656 43.4844C31.7656 42.5232 30.9924 41.75 30.0312 41.75H28.875V45.2188H30.0312ZM36.9688 39.4375H39.2812C41.1963 39.4375 42.75 40.9912 42.75 42.9062V47.5312C42.75 49.4463 41.1963 51 39.2812 51H36.9688C36.3328 51 35.8125 50.4797 35.8125 49.8438V40.5938C35.8125 39.9578 36.3328 39.4375 36.9688 39.4375ZM39.2812 48.6875C39.9172 48.6875 40.4375 48.1672 40.4375 47.5312V42.9062C40.4375 42.2703 39.9172 41.75 39.2812 41.75H38.125V48.6875H39.2812ZM45.0625 40.5938C45.0625 39.9578 45.5828 39.4375 46.2188 39.4375H49.6875C50.3234 39.4375 50.8438 39.9578 50.8438 40.5938C50.8438 41.2297 50.3234 41.75 49.6875 41.75H47.375V44.0625H49.6875C50.3234 44.0625 50.8438 44.5828 50.8438 45.2188C50.8438 45.8547 50.3234 46.375 49.6875 46.375H47.375V49.8438C47.375 50.4797 46.8547 51 46.2188 51C45.5828 51 45.0625 50.4797 45.0625 49.8438V40.5938Z"
                                fill="#EEF1FB" />
                        </svg>
                    </div>
                    <div class="doc-content">
                        <h3 class="doc-title">How to Vote Electronically</h3>
                        <p class="doc-date">15-07-2024</p>
                        <p class="doc-size">Loading size...</p>
                    </div>
                    <button class="doc-download-btn" onclick="window.open('img/how-to-vote-electronically.pdf', '_blank'); return false;">
                        <span>Download</span>
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 16L7 11L8.4 9.55L11 12.15V4H13V12.15L15.6 9.55L17 11L12 16Z" fill="currentColor" />
                            <path d="M5 20H19V18H5V20Z" fill="currentColor" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->

<script src="../js/gretex-financial.js"></script>
<script src="../js/calculator-functions.js"></script>

<script>
    // Tab switching functionality
    document.querySelectorAll('.download-tab').forEach(tab => {
        tab.addEventListener('click', function() {
            const category = this.getAttribute('data-category');

            // If e-Voting tab is clicked, redirect to NSDL website
            if (category === 'evoting') {
                window.open('https://eservices.nsdl.com/', '_blank');
                return;
            }

            // Remove active class from all tabs
            document.querySelectorAll('.download-tab').forEach(t => t.classList.remove('active'));
            // Add active class to clicked tab
            this.classList.add('active');

            // Hide all categories
            document.querySelectorAll('.download-category').forEach(cat => {
                cat.style.display = 'none';
            });

            // Show selected category
            document.getElementById(category).style.display = 'grid';

            // Load file sizes for visible category
            loadFileSizes(category);
        });
    });

    // Function to format file size
    function formatFileSize(bytes) {
        if (bytes === 0 || !bytes) return '0 Bytes';

        const k = 1024;
        const sizes = ['Bytes', 'KB', 'MB', 'GB'];
        const i = Math.floor(Math.log(bytes) / Math.log(k));

        // Check if i is valid (prevent potential array index out of bounds)
        if (i < 0 || i >= sizes.length) return 'PDF';

        return Math.round((bytes / Math.pow(k, i)) * 100) / 100 + ' ' + sizes[i];
    }

    // Function to get file size using HEAD request, with fallback to GET
    async function getFileSize(filePath) {
        try {
            const headResponse = await fetch(filePath, {
                method: 'HEAD'
            });
            if (headResponse.ok) {
                const contentLength = headResponse.headers.get('Content-Length');
                if (contentLength && parseInt(contentLength, 10) > 0) {
                    return parseInt(contentLength, 10);
                }
            }
            const getResponse = await fetch(filePath, {
                method: 'GET',
                headers: {
                    'Range': 'bytes=0-0'
                }
            });
            if (getResponse.ok || getResponse.status === 206) {
                const contentRange = getResponse.headers.get('Content-Range');
                if (contentRange) {
                    const size = contentRange.split('/')[1];
                    if (size) return parseInt(size, 10);
                }
                const contentLength = getResponse.headers.get('Content-Length');
                if (contentLength && (getResponse.status === 200 || getResponse.status === 206)) {
                    return parseInt(contentLength, 10);
                }
            }
            return null;
        } catch (error) {
            console.warn(`Could not fetch file size for ${filePath}:`, error);
            return null;
        }
    }

    function inferTypeFromExt(filePath) {
        const ext = (filePath.split('?')[0].split('#')[0].split('.').pop() || '').toLowerCase();
        const map = {
            'pdf': 'PDF',
            'doc': 'DOC',
            'docx': 'DOCX',
            'xls': 'XLS',
            'xlsx': 'XLSX',
            'csv': 'CSV',
            'png': 'PNG',
            'jpg': 'JPG',
            'jpeg': 'JPG',
            'gif': 'GIF',
            'webp': 'WEBP',
            'txt': 'TXT',
            'zip': 'ZIP',
            'rar': 'RAR'
        };
        return map[ext] || ext.toUpperCase() || 'FILE';
    }

    async function getFileType(filePath) {
        try {
            const headResponse = await fetch(filePath, {
                method: 'HEAD'
            });
            if (headResponse.ok) {
                const ct = headResponse.headers.get('Content-Type') || '';
                if (ct) {
                    if (ct.includes('pdf')) return 'PDF';
                    if (ct.includes('msword')) return 'DOC';
                    if (ct.includes('officedocument.wordprocessingml')) return 'DOCX';
                    if (ct.includes('spreadsheet')) return 'XLSX';
                    if (ct.includes('excel')) return 'XLS';
                    if (ct.includes('png')) return 'PNG';
                    if (ct.includes('jpeg') || ct.includes('jpg')) return 'JPG';
                    if (ct.includes('gif')) return 'GIF';
                    if (ct.includes('plain')) return 'TXT';
                    if (ct.includes('zip')) return 'ZIP';
                }
            }
        } catch (e) {
            /* silent */
        }
        return inferTypeFromExt(filePath);
    }

    // Function to load file sizes for all documents in a category
    async function loadFileSizes(categoryId) {
        const category = document.getElementById(categoryId);
        if (!category) return;

        const documentCards = category.querySelectorAll('.document-card[data-file-path]');

        for (const card of documentCards) {
            const filePath = card.getAttribute('data-file-path');
            const hardcodedSize = card.getAttribute('data-file-size');
            const sizeElement = card.querySelector('.doc-size');

            if (sizeElement) {
                // Reset to clean state
                sizeElement.style.color = '#1f2937';
                sizeElement.style.fontStyle = 'normal';

                // 1. Determine file type early
                const fileType = filePath ? await getFileType(filePath) : 'FILE';

                // 2. Check for pre-calculated size in attribute first
                if (hardcodedSize) {
                    const sizeBytes = parseInt(hardcodedSize, 10);
                    if (!isNaN(sizeBytes) && sizeBytes > 0) {
                        sizeElement.textContent = `${fileType} • ${formatFileSize(sizeBytes)}`;
                        continue; // Skip fetch if we have a valid hardcoded size
                    }
                }

                // 3. Fallback to dynamic fetch if no hardcoded size
                if (filePath) {
                    // Fetch file size
                    try {
                        const fileSize = await getFileSize(filePath);

                        if (fileSize !== null && fileSize > 0) {
                            sizeElement.textContent = `${fileType} • ${formatFileSize(fileSize)}`;
                        } else {
                            // Show type only if size unavailable
                            sizeElement.textContent = fileType;
                            sizeElement.style.color = '#999';
                        }
                    } catch (err) {
                        sizeElement.textContent = fileType;
                        sizeElement.style.color = '#999';
                    }
                } else {
                    // No path and no hardcoded size
                    sizeElement.textContent = fileType;
                    sizeElement.style.color = '#999';
                }
            }
        }
    }

    // Load file sizes when page loads
    document.addEventListener('DOMContentLoaded', function() {
        // Load types and sizes for all categories on start
        loadFileSizes('kyc-forms');
        loadFileSizes('customer-docs');
        loadFileSizes('evoting');
    });
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

<script src="../js/downloads-icons.js"></script>


<?php
// Include footer
require_once '../includes/footer.php';
?>