<div class="container main-menu" id="navbar">
    <div class="row">
        <div class="col-lg-2 col-sm-12"> 
            <a href="{{ route('home')  }}" id="logo" class="grid_2"> <img src="{{asset('dist-front/images/logo.png')}}"> </a> 
        </div>
        <div class="col-lg-10 col-sm-12">
            <nav class="navbar navbar-expand-lg navbar-light">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent"> 
                    <ul id="navContent" class="navbar-nav mr-auto navigation">
                        <li>
                            <a class="smooth-scroll nav-link" href="{{ route('home')}}">Home</a>
                        </li>
                        <li>
                            <a class="smooth-scroll nav-link" href="speakers.html">Speakers</a>
                        </li>
                        <li>
                            <a class="smooth-scroll nav-link" href="schedule.html">Schedule</a>
                        </li>
                        <li>
                            <a class="smooth-scroll nav-link" href="pricing.html">Pricing</a>
                        </li>
                        <li>
                            <a class="smooth-scroll nav-link" href="blog.html">Blog</a>
                        </li>
                        <li class="nav-item dropdown"> <a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Pages </a>
                            <div class="dropdown-menu" id="dropmenu" aria-labelledby="navbarDropdown"> 
                                <a class="dropdown-item" href="sponsors.html">Sponsors</a>
                                <a class="dropdown-item" href="organizers.html">Organizers</a>
                                <a class="dropdown-item" href="accommodations.html">Accommodations</a>
                                <a class="dropdown-item" href="photo-gallery.html">Photo Gallery</a>
                                <a class="dropdown-item" href="video-gallery.html">Video Gallery</a>
                                <a class="dropdown-item" href="faq.html">FAQ</a>
                                <a class="dropdown-item" href="testimonials.html">Testimonials</a> 
                            </div>
                        </li>
                        <li>
                            <a class="smooth-scroll nav-link" href="{{ route('contact') }}">Contact</a>
                        </li>
                        <li class="member-login-button">
                            <div class="inner">
                                <a class="smooth-scroll nav-link" href="{{ route('login') }}">
                                    <i class="fa fa-sign-in"></i> Login
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</div>