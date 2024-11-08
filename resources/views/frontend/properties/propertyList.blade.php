@extends('frontend.layouts.layout')

@section('title','Our Property Lists')
@section('kaywords','About Us')
@section('description','About Us')

@section('main-content')
 <!-- Header Start -->
 <div class="container-fluid header bg-white p-0">
  <div class="row g-0 align-items-center flex-column-reverse flex-md-row">
      <div class="col-md-6 p-5 mt-lg-5">
          <h1 class="display-5 animated fadeIn mb-4">Property List</h1> 
              <nav aria-label="breadcrumb animated fadeIn">
              <ol class="breadcrumb text-uppercase">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item"><a href="#">Pages</a></li>
                  <li class="breadcrumb-item text-body active" aria-current="page">Property List</li>
              </ol>
          </nav>
      </div>
      <div class="col-md-6 animated fadeIn">
          <img class="img-fluid" src="{{asset('frontend/img/header.jpg')}}" alt="">
      </div>
  </div>
</div>
<!-- Header End -->
 
@include('frontend.components.search-component')


<!-- Property List Start -->
@include('frontend.components.property-listing-component')
<!-- Property List End -->


<!-- Call to Action Start -->
<div class="container-xxl py-5">
  <div class="container">
      <div class="bg-light rounded p-3">
          <div class="bg-white rounded p-4" style="border: 1px dashed rgba(0, 185, 142, .3)">
              <div class="row g-5 align-items-center">
                  <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                      <img class="img-fluid rounded w-100" src="img/call-to-action.jpg" alt="">
                  </div>
                  <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                      <div class="mb-4">
                          <h1 class="mb-3">Contact With Our Certified Agent</h1>
                          <p>Eirmod sed ipsum dolor sit rebum magna erat. Tempor lorem kasd vero ipsum sit sit diam justo sed vero dolor duo.</p>
                      </div>
                      <a href="" class="btn btn-primary py-3 px-4 me-2"><i class="fa fa-phone-alt me-2"></i>Make A Call</a>
                      <a href="" class="btn btn-dark py-3 px-4"><i class="fa fa-calendar-alt me-2"></i>Get Appoinment</a>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
<!-- Call to Action End -->
@endsection