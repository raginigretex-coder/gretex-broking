<?php
/**
 * Application URL and environment helpers.
 */

if (!function_exists('gt_app_env')) {
    function gt_app_env(): string
    {
        $env = getenv('APP_ENV');
        if (is_string($env) && $env !== '') {
            return strtolower($env);
        }

        $host = $_SERVER['HTTP_HOST'] ?? '';
        if (stripos($host, 'localhost') !== false || stripos($host, '127.0.0.1') !== false) {
            return 'local';
        }

        return 'production';
    }
}

if (!function_exists('gt_base_path')) {
    function gt_base_path(): string
    {
        $configured = getenv('BASE_PATH');
        if (is_string($configured) && $configured !== '') {
            $trimmed = '/' . trim($configured, '/');
            return $trimmed === '/' ? '' : $trimmed;
        }

        $scriptName = $_SERVER['SCRIPT_NAME'] ?? '';
        if (!is_string($scriptName) || $scriptName === '') {
            return '';
        }

        $pagesPos = strpos($scriptName, '/pages/');
        if ($pagesPos !== false) {
            $prefix = substr($scriptName, 0, $pagesPos);
            return rtrim($prefix, '/');
        }

        $dir = rtrim(dirname($scriptName), '/\\');
        return $dir === '' || $dir === '.' ? '' : str_replace('\\', '/', $dir);
    }
}

if (!function_exists('gt_base_url')) {
    function gt_base_url(): string
    {
        $configured = getenv('APP_URL');
        if (is_string($configured) && $configured !== '') {
            return rtrim($configured, '/');
        }

        $isHttps = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off')
            || (($_SERVER['SERVER_PORT'] ?? null) === '443');
        $scheme = $isHttps ? 'https' : 'http';
        $host = $_SERVER['HTTP_HOST'] ?? 'localhost';
        return $scheme . '://' . $host . gt_base_path();
    }
}

if (!function_exists('gt_asset_url')) {
    function gt_asset_url(string $relativePath = ''): string
    {
        $path = ltrim($relativePath, '/');
        $basePath = gt_base_path();
        return $basePath . '/' . $path;
    }
}

if (!function_exists('gt_page_url')) {
    function gt_page_url(string $relativePagePath = ''): string
    {
        $path = ltrim($relativePagePath, '/');
        $basePath = gt_base_path();
        return $basePath . '/pages/' . $path;
    }
}

