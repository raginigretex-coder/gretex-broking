<?php
require_once __DIR__ . '/../config/app.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="<?php echo gt_asset_url('images/icon.png'); ?>">
    <title><?php echo isset($pageTitle) ? $pageTitle : 'Gretex | Indian Equity Market Leader'; ?></title>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">
    <!-- Main CSS -->
    <link rel="stylesheet" href="<?php echo gt_asset_url('css/gretex-financial.css'); ?>">
    <link rel="stylesheet" href="<?php echo gt_asset_url('css/scroll-animations.css'); ?>">
    <?php if (isset($additionalCSS)): ?>
        <?php foreach ($additionalCSS as $css): ?>
            <?php if (is_array($css)): ?>
                <link rel="stylesheet" href="<?php echo $css['href']; ?>" 
                      <?php if (isset($css['integrity'])): ?>integrity="<?php echo $css['integrity']; ?>"<?php endif; ?>
                      <?php if (isset($css['crossorigin'])): ?>crossorigin="<?php echo $css['crossorigin']; ?>"<?php endif; ?>>
            <?php else: ?>
                <link rel="stylesheet" href="<?php echo $css; ?>">
            <?php endif; ?>
        <?php endforeach; ?>
    <?php endif; ?>
    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script>
    
    <!-- AccessibleWeb Widget -->
    <script>
        window.AccessibleWebWidgetOptions = {
            primaryColor: "#1976d2",
            ttsNativeVoiceName: "",
            ttsRate: 1.0,
            ttsPitch: 1.0,
            ...(window.AccessibleWebWidgetOptions || {})
        };
    </script>
    <script
        src="https://cdn.jsdelivr.net/gh/ifrederico/accessible-web-widget@latest/dist/accessible-web-widget.min.js"></script>
    
    <?php if (isset($pageStyles)): ?>
        <style>
            <?php echo $pageStyles; ?>
        </style>
    <?php endif; ?>
</head>

<body>
    <!-- AccessibleWeb Widget -->
    <div data-acc-position="bottom-right"></div>
    <div data-acc-offset="24,24"></div>
    <div data-acc-size="52"></div>
    <div data-acc-icon="default"></div>
