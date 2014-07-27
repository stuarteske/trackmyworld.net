<?php
/**
 * Created by PhpStorm.
 * User: Stuart Eske
 * Date: 27/07/2014
 * Time: 14:30
 */
ob_start("compress");
header ("content-type: text/css; charset: UTF-8");
header ("cache-control: must-revalidate");
$offset = 60 * 60 * 24 * 30;
$expire = "expires: " . gmdate ("D, d M Y H:i:s", time() + $offset) . " GMT";
header ($expire);

function compress($buffer) {
    /* remove comments */
    $buffer = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $buffer);
    /* remove tabs, spaces, newlines, etc. */
    $buffer = str_replace(array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', $buffer);
    return $buffer;
}

/* your css files */
include('bootstrap.min.css');
include('custom.css');
include('../font-awesome-4.1.0/css/font-awesome.min.css');

ob_end_flush();