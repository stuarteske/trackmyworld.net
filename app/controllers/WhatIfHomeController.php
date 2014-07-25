<?php
/**
 * Created by PhpStorm.
 * User: Stuart Eske
 * Date: 21/07/2014
 * Time: 15:38
 */
class WhatIfHomeController extends BaseController {

    public function index()
    {
        return View::make('whatif.home.index');
    }
}