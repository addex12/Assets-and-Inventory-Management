<?php
// filepath: /home/orbalia/Assets-and-Inventory-Management/bootstrap/helpers.php
<?php

if (!function_exists('str_contains')) {
    /**
     * Polyfill for str_contains (available in PHP 8.0+).
     */
    function str_contains(string $haystack, string $needle): bool
    {
        return strpos($haystack, $needle) !== false;
    }
}