<?php
/**
 * Created by PhpStorm.
 * User: Stuart Eske
 * Date: 27/07/2014
 * Time: 14:37
 */

header('Content-type: text/javascript');
ob_start("compress");
function compress($buffer) {
    /* remove comments */
    $buffer = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $buffer);
    /* remove tabs, spaces, newlines, etc. */
    $buffer = str_replace(array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', $buffer);
    return $buffer;
}

/* your css files */
include('bootstrap.min.js');
include('jquery-1.11.0.js');
include('custom.js');

ob_end_flush();