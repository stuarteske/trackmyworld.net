<?php
/**
 * Created by PhpStorm.
 * User: Stuart Eske
 * Date: 10/07/2014
 * Time: 07:00
 */
?>

@extends('layouts.backend')

@section('site_title')
User Edit
@stop

@section('breadcrumb')
<li href="{{ URL::action('DashboardController@dashboard') }}"><a href="">Dashboard</a></li>
<li href="{{ URL::action('UserController@listAll') }}">User List</li>
<li class="active">User Edit</li>
@stop

@section('content')
<section class="col-lg-6">
    {{ $edit }}
</section>
@stop