@extends('frontend.layouts.layout')

@section('title','Property Type')
@section('kaywords','About Us')
@section('description','About Us')

@section('main-content')
    <div class="container-fluid header bg-white p-0">
        <div class="row g-0 align-items-center flex-column-reverse flex-md-row">
            <div class="col-md-6 p-5 mt-lg-5">
                <h1 class="display-5 animated fadeIn mb-4">Property Type</h1>
                <nav aria-label="breadcrumb animated fadeIn">
                    <ol class="breadcrumb text-uppercase">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Pages</a></li>
                        <li class="breadcrumb-item text-body active" aria-current="page">Property Type</li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-6 animated fadeIn">
                <img class="img-fluid" src="{{ asset('frontend/img/header.jpg') }}" alt="">
            </div>
        </div>
    </div>
    <!-- Header End -->


    <!-- Search Start -->
    @include('frontend.components.search-component')
    <!-- Search End -->


    <!-- Category Start -->
    @include('frontend.components.property-type')

    <!-- Category End -->
@endsection
