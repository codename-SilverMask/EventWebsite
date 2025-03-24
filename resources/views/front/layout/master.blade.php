<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        
        <link rel="icon" type="image/png" href="{{asset('dist-front/images/favicon.png')}}">

        <title>SingleEvent - Event & Conference Management Website</title>

        @include('front.layout.styles')

        <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,500,700,900" rel="stylesheet">
        
    </head>

    <body data-spy="scroll" data-target=".navbar" data-offset="50">

        @include('front.layout.nav')

        @yield('main_content')

        <footer class="main-footer"> 
            <div class="widgets-section">
                <div class="container">
                    <div class="clearfix"> 
                        <div class="col-lg-12 col-sm-12 col-xs-12">
                            <div class="row clearfix">

                                <div class="footer-column col-lg-2 col-sm-6 col-xs-12">
                                    <div class="footer-widget links-widget">
                                        <h2>Links</h2>
                                        <div class="widget-content">
                                            <ul class="list">
                                                <li><a href="{{ route('home') }}">Home</a></li>
                                                <li><a href="sponsors.html">Sponsors</a></li>
                                                <li><a href="speakers.html">Speakers</a></li>
                                                <li><a href="organizers.html">Organizers</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                        
                                <div class="footer-column col-lg-2 col-sm-6 col-xs-12">
                                    <div class="footer-widget links-widget">
                                        <h2>Pages</h2>
                                        <div class="widget-content">
                                            <ul class="list">
                                                <li><a href="terms.html">Terms of Use</a></li>
                                                <li><a href="privacy.html">Privacy Policy</a></li>
                                                <li><a href="schedule.html">Schedule</a></li>
                                                <li><a href="{{ route('contact') }}">Contact Us</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="footer-column col-lg-4 col-sm-6 col-xs-12">
                                    <div class="footer-widget links-widget">
                                        <h2>Contact</h2>
                                        <div class="widget-content">
                                            <ul class="list">
                                                <li>Address: 34, Park Street, NYC, USA</li>
                                                <li>Email: contact@example.com</li>
                                                <li>Phone: 123-322-1248</li>
                                            </ul>
                                            <ul class="social-icon mt_15">
                                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                
                        
                                <div class="footer-column col-lg-4 col-sm-6 col-xs-12">
                                    <div class="footer-widget subscribe-widget">
                                        <h2>Newsletter</h2>
                                        <div class="widget-content">
                                            <div class="newsletter-form">
                                                <form method="post" action="">
                                                    <div class="form-group">
                                                        <input type="email" name="email" value="" placeholder="Enter Email Address" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="global_btn"><a class="btn_two" href="#">SUBSCRIBE</a> </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                
            <!--Footer Bottom-->
            <div class="footer-bottom">
                <div class="auto-container container">
                <div class="text">Copyright 2025, SingleEvent. All Rights Reserved.<br> Amaney Hussain</div>
                </div>
            </div>
        </footer>
       @include('front.layout.scripts')

@if($errors->any())
    @foreach ($errors->all() as $error)
        <script>
            iziToast.show({
                message: '{{ $error }}',
                position: 'topRight',
                color: 'red',
                
        });
        </script>
    @endforeach
@endif

@if(session('success'))
<script>
    iziToast.show({
        message: '{{ session("success") }}',
        position: 'topRight',
        color: 'green',
        
});
</script>
@endif

@if(session('error'))
    <script>
        iziToast.show({
            message: '{{ session("error") }}',
            position: 'topRight',
            color: 'red',
            
    });
    </script>
@endif

    </body>
</html>