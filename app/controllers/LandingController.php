<?php
/**
 * Created by PhpStorm.
 * User: Stuart Eske
 * Date: 25/07/2014
 * Time: 06:53
 */

class LandingController extends BaseController {

    public function __construct()
    {

    }

    public function index()
    {
        return View::make(
            'landing.index'
        );
    }
}