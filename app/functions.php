<?php

defined('SYSPATH') or die ('No Direct Access Allowed!');

// -- Configuration specific functions -----------------------------------------

// Set up
if (!function_exists('set_error_reporting')) {
    function set_error_reporting() {
        error_reporting(E_ALL | E_STRICT);
        if (DEVELOPMENT_ENVIRONMENT == true) {
            ini_set('display_errors', 'On');
        } else {
            ini_set('display_errors', 'Off');
        }
        ini_set('log_errors', 'On');
        ini_set('error_log', ROOT . DS . 'tmp' . DS . 'logs' . DS . 'error.log');
    }
}

// -- Helper functions ---------------------------------------------------------
/**
 * @name base_url()
 * @description returns base url set in the config file
 */
if (!function_exists('base_url')) {
    function base_url() {
        $c = new Config();
        return $c->baseurl;
    }
}

/**
 * @name asset_url()
 * @description returns asset url set in the config file
 */
if (!function_exists('asset_url')) {
    function asset_url() {
        $c = new Config();
        return $c->asseturl;
    }
}

/**
 * @name link_file
 * @description This function help scripts and stylesheet linking
 * @note Original function created by Aaron Noel De Leon
 * @note Modified by Joey Hipolito @link http://joeyhipolito.com/
 * @uses asset_url() that returns asset directory
 */
if (!function_exists('link_file')) {
    function link_file($file, $rel) {
        if (!is_array($file)) { $file = array($file); }
        if ($rel === 'script') {
            foreach ($file as $js) {
                echo '<script src="' . asset_url() . 'js/' . $js . '.js"></script>' . "\n";
            }
        } elseif ($rel === 'icon') {
            foreach ($file as $ico)
                echo '<link rel="shortcut icon" href="' . asset_url() . 'images/icons/' . $ico . '.ico">'. "\n";
        } else {
            foreach ($file as $css)
                echo '<link rel="' . $rel . '" href="' . asset_url() . 'css/' . $css . '.css">'. "\n";
        }
    }
}

// Handle Error Pages
if (!function_exists('notfound')) {
    function notfound() {
        header('Location: ' . base_url() . 'notfound');
    }
}

// output reports
if (!function_exists('output_report')) {
    function output_report($template) {
        ob_start();
        include($template);
        return ob_end_clean();
    }
}

// enable general functions files
set_error_reporting();
