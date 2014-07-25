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
    User List
@stop

@section('breadcrumb')
    <li class="{{ URL::action('DashboardController@dashboard') }}"><a href="">Dashboard</a></li>
    <li class="active">User List</li>
@stop

@section('content')
    <section class="col-lg-6">
        {{ $filter }}
        {{ $grid }}
    </section>
@stop