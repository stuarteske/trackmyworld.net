<?php
/**
 * Created by PhpStorm.
 * User: cfa
 * Date: 18/07/2014
 * Time: 18:08
 */
?>

@extends('layouts.backend')

@section('site_title')
Organisation List
@stop

@section('breadcrumb')
<li class="{{ URL::action('DashboardController@dashboard') }}"><a href="">Dashboard</a></li>
<li class="active">Organisation List</li>
@stop

@section('content')

<section class="col-lg-6">
    <row>
@foreach($organisations as $organisation )
    <div class="col-lg-4">
        <div style="margin-bottom:10px;background-color: #fff;box-shadow: 0px 0px 10px rgba(0,0,0,0.2);height: 140px;">
        {{{ $organisation->name}}}
        </div>
    </div>
@endforeach
    <row>
</section>

@stop