 <!-- Spinner Start -->
 <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
    <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
        <span class="sr-only">Loading...</span>
    </div>
</div>
<!-- Spinner End -->


<!-- Navbar Start -->
<div class="container-fluid nav-bar bg-transparent">
    <nav class="navbar navbar-expand-lg bg-white navbar-light py-0 px-4">
        <a href="{{route('frontend.index')}}" class="navbar-brand d-flex align-items-center text-center">
            <div class="icon p-2 me-2">
                <img class="img-fluid" src="{{asset('frontend/img/chohan-assciates.png')}}" alt="Icon" style="width: 30px; height: 30px;">
            </div>
            <h4 class="m-0 text-primary ">CHOHAN ASSOCIATES</h4>
        </a>
        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto">
                <a href="{{route('frontend.index')}}" class="nav-item nav-link active">Home</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Property</a>
                    <div class="dropdown-menu rounded-0 m-0">
                        <a href="{{route('frontend.properties')}}" class="dropdown-item">Property List</a>
                        <a href="{{route('frontend.properties-type')}}" class="dropdown-item">Property Type</a>
                        <a href="{{route('frontend.properties-agent')}}" class="dropdown-item">Property Agent</a>
                    </div>
                </div>
                <a href="{{route('frontend.about')}}" class="nav-item nav-link">About</a>
                {{-- <a href="{{route('frontend.blog')}}" class="nav-item nav-link">blog</a> --}}
                {{-- <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                    <div class="dropdown-menu rounded-0 m-0">
                        <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                        <a href="404.html" class="dropdown-item">404 Error</a>
                    </div>
                </div> --}}
                <a href="{{route('frontend.content')}}" class="nav-item nav-link">Contact</a>
            </div>
            <a href="" class="btn btn-primary px-3 d-none d-lg-flex">Add Property</a>
        </div>
    </nav>
</div>
<!-- Navbar End -->
