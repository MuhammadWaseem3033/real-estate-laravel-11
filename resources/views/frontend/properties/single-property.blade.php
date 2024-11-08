@extends('frontend.layouts.layout')

@section('title', $Property->title)

@section('MetaTitle', $Property->meta_title)

@section('kaywords', $Property->meta_title)

@section('description', $Property->meta_description)

<style>
    /* Make images responsive */
    img {
        max-width: 100%;
        height: auto;
        display: block;
    }

    .agent-box {
        margin-top: 50px;
        border: 2px solid #efefef;
        padding: 20px;
        border-radius: 4px;
    }

    .agent-box .img {
        -webkit-box-flex: 0;
        -ms-flex: 0 0 100px;
        flex: 0 0 100px;
    }

    .agent-box .img img {
        width: 80px;
        border-radius: 50%;
    }

    .agent-box .text h3,
    .agent-box .text .h3 {
        font-size: 16px;
    } 
</style>

@section('main-content')
    <!-- Header Start -->
    <div class="container-fluid header bg-white my-1">
        <div class="row g-0 align-items-center flex-column-reverse flex-md-row">
            <div class="col-md-6 p-5 mt-lg-5">
                <h1 class="display-5 animated fadeIn mb-4">Property List</h1>
                <nav aria-label="breadcrumb animated fadeIn">
                    <ol class="breadcrumb text-uppercase">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Pages</a></li>
                        <li class="breadcrumb-item text-body active" aria-current="page">
                            {{ $Property->category->name ?? null }}</li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-6 animated fadeIn">
                <img class="img-fluid" src="{{ asset('storage/' . $Property->image) }}" alt="">
            </div>
        </div>
    </div>
    <!-- Search Start -->
    <div class="container-fluid bg-primary mb-5 wow fadeIn" data-wow-delay="0.1s" style="padding: 35px;">
        <div class="container">
            <div class="row g-2">
                <h2 class="heading text-white text-center text-capitalize">{{ $Property->title }}</h2>
            </div>
        </div>
    </div>
    <!-- Search End -->

    <div class="section">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-7">
                    @forelse ($Property->Images as $Image)
                        <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                @foreach ($Image['image'] as $index => $imagePath)
                                    <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                        <img src="{{ asset('storage/' . $imagePath) }}" class="d-block w-100"
                                            alt="Property image">
                                    </div>
                                @endforeach
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample"
                                data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample"
                                data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    @empty
                        <p>No images available for this property.</p>
                    @endforelse

                    <div class="progress mt-3" role="progressbar" aria-label="Animated striped example" aria-valuenow="75"
                        aria-valuemin="0" aria-valuemax="100">
                        <div class="progress-bar progress-bar-striped progress-bar-animated" style="width: 100%"></div>
                    </div>

                    <div class="d-flex p-2 mt-2">
                        <small class="flex-fill text-center border-end py-2"><i
                                class="fa fa-ruler-combined text-primary me-2"></i>{{ $Property['area_sqft'] }} Sqft</small>
                        <small class="flex-fill text-center border-end py-2"><i
                                class="fa fa-bed text-primary me-2"></i>{{ $Property['bedrooms'] }}Bed</small>
                        <small class="flex-fill text-center py-2"><i
                                class="fa fa-bath text-primary me-2"></i>{{ $Property['bathrooms'] }} Bath</small>
                    </div>
                    <hr>
                    <div class="bg-white p-4 text-align">
                        {!! str($Property->description)->markdown()->sanitizeHtml() !!}
                        {{-- {!! $Property->description !!} --}}
                        <hr>
                        <div class="py-2">
                            <h2>
                                Property Video
                            </h2>
                        </div>
                        <div style="position: relative; padding-top: 56.25%; height: 0; overflow: hidden; max-width: 100%;">
                            @if (isset($Property->video) && !empty($Property->video))
                                <video style="position: absolute; width: 100%; height: 100%; top: 0; left: 0;" controls>
                                    <source src="{{ asset('storage/' . $Property->video) }}" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                            @else
                                <p>No video available.</p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="d-block agent-box p-5">
                        <div class="img mb-4">
                            <img src="{{ asset('/') }}frontend/img/person_2-min.jpg" alt="Image" class="img-fluid" />
                        </div>
                        <div class="text position-relative">
                            <h3 class="mb-0">Chohan Associate</h3>
                            <div class="meta mb-3">Real Estate</div>
                            <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Ratione laborum quo quos omnis sed magnam id ducimus saepe
                            </p>
                            <div class="position-absolute start-50 translate-middle d-flex align-items-center mt-4">
                                <a class="btn btn-square bg-primary text-white mx-1" href="#"><i
                                        class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square bg-primary text-white mx-1" href="#"><i
                                        class="fab fa-twitter"></i></a>
                                <a class="btn btn-square bg-primary text-white mx-1" href="#"><i
                                        class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
