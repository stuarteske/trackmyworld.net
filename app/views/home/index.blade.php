@extends('layouts.front')

@section('site_title')
    Welcome
@stop

@section('content')
<section class="intro">
    <div class="intro-body">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <h1>Prayer Planner</h1>
                    <p class="intro-text">Organise you, your Team and your Prayer Spaces.</p>
                    <div class="page-scroll">
                        <a href="#about" class="btn btn-circle">
                            <i class="fa fa-angle-double-down animated"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@include('shared.front.index-about-section')

@if (!Auth::check())
@include('shared.front.index-signup-section')
@endif


@include('shared.front.index-contact-section')

@include('shared.front.index-map-section')

@stop