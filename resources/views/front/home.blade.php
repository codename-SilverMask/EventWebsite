@extends('front.layout.master')


@section('main_content')

<div class="container-fluid home-banner" style="background-image:url({{asset('uploads/'.$home_banner->background)}});">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="static-banner-detail">
                    <h4>{{ $home_banner->subheading }}</h4>
                    <h2>{{ $home_banner->heading }}</h2>
                    @if($home_banner->text != '')
                    <p>{!! $home_banner->text !!}</p>
                    @endif

                    
                    @php
                        $dt = new DateTime();
                        $d1 = $dt->createFromFormat('m/d/Y H:i:s', date('m/d/Y H:i:s'));
                        $d2 = $dt->createFromFormat('m/d/Y H:i:s', date($home_banner->event_date . ' ' . $home_banner->event_time));
                        $interval = $d1->diff($d2);
                        $days = $interval->days;
                        if(strlen($days) == 1){
                            $days = '0'.$days;
                        }
                        $hours = $interval->h;
                        if(strlen($hours) == 1){
                            $hours = '0'.$hours;
                        }
                        $minutes = $interval->i;
                        if(strlen($minutes) == 1){
                            $minutes = '0'.$minutes;
                        }
                        $seconds = $interval->s;
                        if(strlen($seconds) == 1){
                            $seconds = '0'.$seconds;
                        }
                    @endphp
                    <div class="counter-area">
                        <div class="countDown clearfix">
                            <div class="row count-down-bg">
                                <div class="col-lg-3 col-sm-6 col-xs-12">
                                    <div class="single-count day">
                                        <h1 class="days">{{ $days }}</h1>
                                        <p class="days_ref">days</p>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6 col-xs-12">
                                    <div class="single-count hour">
                                        <h1 class="hours">{{ $hours }}</h1>
                                        <p class="hours_ref">hours</p>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6 col-xs-12">
                                    <div class="single-count min">
                                        <h1 class="minutes">{{ $minutes }}</h1>
                                        <p class="minutes_ref">minutes</p>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6 col-xs-12">
                                    <div class="single-count second">
                                        <h1 class="seconds">{{ $seconds }}</h1>
                                        <p class="seconds_ref">seconds</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="" class="banner_btn video_btn">BUY TICKETS</a>
                </div>
            </div>
        </div>
    </div>
</div>

@if ($home_welcome->status == 'show')
<section id="about-section" class="pt_70 pb_70 white">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-sm-12 col-xs-12">
                <div class="row">
                    <div class="col-lg-12">
                        <h2> <span class="color_green"> {{ $home_welcome->heading }} </span> </h2>
                    </div>
                </div>
                <div class="about-details">
                    <p>{!! nl2br($home_welcome->description) !!}</p>
                    @if ($home_welcome->button_text != '')
                    <div class="global_btn mt_20">
                        <a class="btn_one" href="{{ $home_welcome->button_link }}">{{ $home_welcome->button_text }}</a>
                    </div>
                    @endif
                </div>
            </div>
            <div class="col-lg-5 col-sm-12 col-xs-12">
                <div class="about-details-img">
                    <img src="{{asset('uploads/'.$home_welcome->photo)}}" alt="image">
                </div>
            </div>
        </div>
    </div>
</section>
@endif



<div id="speakers" class="pt_70 pb_70 gray team">
    <div class="container">
        <div class="row">
            <div class="col-sm-1 col-lg-2"></div>
            <div class="col-xs-12 col-sm-10 col-lg-8 text-center">
                <h2 class="title-1 mb_10">
                    <span class="color_green">Speakers</span>
                </h2>
                <p class="heading-space">
                    You will find below the list of our valuable speakers. They are all experts in their field and will share their knowledge with you.
                </p>
            </div>
            <div class="col-sm-1 col-lg-2"></div>
        </div>
        <div class="row pt_40">
            @foreach($speakers as $speaker)
            <div class="col-lg-3 col-sm-6 col-xs-12">
                <div class="team-img mb_20">
                    <a href="{{ route('speaker', $speaker->slug) }}"><img src="{{asset('uploads/'.$speaker->photo)}}"></a>
                </div>
                <div class="team-info text-center">
                    <h6><a href="{{ route('speaker', $speaker->slug) }}">{{ $speaker->name }}</a></h6>
                    <p>{{ $speaker->designation }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

@if ($home_counter->status == 'show')
<div id="counter-section" class="pt_70 pb_70" style="background-image: url({{asset('uploads/'. $home_counter->background)}});">
    <div class="container">
        <div class="row number-counters text-center">
            <div class="col-lg-3 col-sm-6 col-xs-12"> 
                <div class="counters-item">
                    <i class="{{ $home_counter->item1_icon }}"></i>
                    <strong data-to="{{ $home_counter->item1_number }}">0</strong>
                    <p>{{ $home_counter->item1_title }}</p>
                </div>
            </div>
            
            <div class="col-lg-3 col-sm-6 col-xs-12"> 
                <div class="counters-item">
                <i class="{{ $home_counter->item2_icon }}"></i>
                    <strong data-to="{{ $home_counter->item2_number }}">0</strong>
                    <p>{{ $home_counter->item2_title }}</p>
                </div>
            </div>
            
            <div class="col-lg-3 col-sm-6 col-xs-12">
                <div class="counters-item">
                    <i class="{{ $home_counter->item3_icon }}"></i>
                    <strong data-to="{{ $home_counter->item3_number }}">0</strong>
                    <p>{{ $home_counter->item3_title }}</p>
                </div>
            </div>
            
            <div class="col-lg-3 col-sm-6 col-xs-12">
                <div class="counters-item">
                    <i class="{{ $home_counter->item4_icon }}"></i>
                    <strong data-to="{{ $home_counter->item4_number }}">0</strong>
                    <p>{{ $home_counter->item4_title }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endif



<div id="price-section" class="pt_70 pb_70 gray prices">
    <div class="container">

        <div class="row">
            <div class="col-sm-1 col-lg-2"></div>
            <div class="col-xs-12 col-sm-10 col-lg-8 text-center">
                <h2 class="title-1 mb_10"><span class="color_green">Pricing</span></h2>
                <p class="heading-space">
                    You will find below the different pricing options for our event. Choose the one that suits you best and register now! You will have access to all sessions, unlimited coffee and food, and the opportunity to meet with your favorite speakers.
                </p>
            </div>
            <div class="col-sm-1 col-lg-2"></div>
        </div>


        <div class="row pt_40"> 

            <div class="col-md-4 col-sm-12">
                <div class="info">
                    <h5 class="event-ti-style">Standard</h5>
                    <h3 class="event-ti-style">$49</h3>
                    <ul>
                        <li><i class="fa fa-check"></i> Access to all sessions</li>
                        <li><i class="fa fa-check"></i> Unlimited Drinkgs & Coffee</li>
                        <li><i class="fa fa-times"></i> Lunch Facility</li>
                        <li><i class="fa fa-times"></i> Meet with Speakers</li>
                    </ul>
                    <div class="global_btn mt_20">
                        <a class="btn_two" href="buy.html">Buy Ticket</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-12">
                <div class="info">
                    <h5 class="event-ti-style">Business</h5>
                    <h3 class="event-ti-style">$99</h3>
                    <ul>
                        <li><i class="fa fa-check"></i> Access to all sessions</li>
                        <li><i class="fa fa-check"></i> Unlimited Drinkgs & Coffee</li>
                        <li><i class="fa fa-check"></i> Lunch Facility</li>
                        <li><i class="fa fa-times"></i> Meet with Speakers</li>
                    </ul>
                    <div class="global_btn mt_20">
                        <a class="btn_two" href="buy.html">Buy Ticket</a>
                    </div>
                </div>
            </div>

        <div class="col-md-4 col-sm-12">
            <div class="info">
                <h5 class="event-ti-style">Premium</h5>
                <h3 class="event-ti-style">$139</h3>
                <ul>
                    <li><i class="fa fa-check"></i> Access to all sessions</li>
                    <li><i class="fa fa-check"></i> Unlimited Drinkgs & Coffee</li>
                    <li><i class="fa fa-check"></i> Lunch Facility</li>
                    <li><i class="fa fa-check"></i> Meet with Speakers</li>
                </ul>
                <div class="global_btn mt_20">
                    <a class="btn_two" href="buy.html">Buy Ticket</a>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>

 
<div id="blog-section" class="pt_70 pb_70 white blog-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-1 col-lg-2"></div>
            <div class="col-xs-12 col-sm-10 col-lg-8 text-center">
                <h2 class="title-1 mb_15">
                    <span class="color_green">Latest News</span>
                </h2>
                <p class="heading-space">
                    All the latest news and updates about our event and conference are available here. Stay informed and don't miss any important information!
                </p>
            </div>
            <div class="col-sm-1 col-lg-2"></div>
        </div>
        <div class="row pt_40">
            <div class="col-lg-4 col-sm-6 col-xs-12">
                <div class="blog-box text-center">
                    <div class="blog-post-images">
                        <a href="post.html">
                            <img src="{{asset('dist-front/images/post-1.jpg')}}" alt="image">
                        </a>
                    </div>
                    <div class="blogs-post">
                        <h4><a href="post.html">Essential Tips for a Successful Virtual Conference</a></h4>
                        <p>
                            Organizing a virtual conference can be challenging. Focus on engaging content, interactive sessions, & reliable technology to ensure a successful event.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6 col-xs-12">
                <div class="blog-box text-center">
                    <div class="blog-post-images">
                        <a href="post.html"><img src="{{asset('dist-front/images/post-2.jpg')}}" alt="image"></a>
                    </div>
                    <div class="blogs-post">
                        <h4><a href="post.html">Maximizing Your Networking Opportunities at Events</a></h4>
                        <p>
                            Networking at events requires strategic planning. Attend relevant sessions, participate in discussions, and utilize apps to connect with professionals.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6 col-xs-12">
                <div class="blog-box text-center">
                    <div class="blog-post-images">
                        <a href="post.html"><img src="{{asset('dist-front/images/post-3.jpg')}}" alt="image"></a>
                    </div>
                    <div class="blogs-post">
                        <h4><a href="post.html">How to Choose the Perfect Venue for Your Conference</a></h4>
                        <p>
                            Selecting the ideal venue involves considering location, capacity, and amenities. Ensure it aligns with your goals, and fits within your budget.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div id="sponsor-section" class="pt_70 pb_70 gray">
    <div class="container">
        <div class="row">
            <div class="col-sm-1 col-lg-2"></div>
            <div class="col-xs-12 col-sm-10 col-lg-8 text-center">
                <h2 class="title-1 mb_15">
                    <span class="color_green">Our Sponsers</span>
                </h2>
                <p class="heading-space">
                    If you want to become a sponsor, please contact us. We offer different sponsorship packages that will help you promote your brand and reach a wider audience.
                </p>
            </div>
            <div class="col-sm-1 col-lg-2"></div>
        </div>
        <div class="row pt_40">
            <div class="col-md-12">
                <div class="owl-carousel">
                    <div class="sponsors-logo">
                        <img src="{{asset('dist-front/images/partner-1.png')}}" class="img-responsive" alt="sponsor logo">
                    </div>
                    <div class="sponsors-logo">
                        <img src="{{asset('dist-front/images/partner-2.png')}}" class="img-responsive" alt="sponsor logo">
                    </div>
                    <div class="sponsors-logo">
                        <img src="{{asset('dist-front/images/partner-3.png')}}" class="img-responsive" alt="sponsor logo">
                    </div>
                    <div class="sponsors-logo">
                        <img src="{{asset('dist-front/images/partner-4.png')}}" class="img-responsive" alt="sponsor logo">
                    </div>
                    <div class="sponsors-logo">
                        <img src="{{asset('dist-front/images/partner-5.png')}}" class="img-responsive" alt="sponsor logo">
                    </div>
                    <div class="sponsors-logo">
                        <img src="{{asset('dist-front/images/partner-6.png')}}" class="img-responsive" alt="sponsor logo">
                    </div>
                    <div class="sponsors-logo">
                        <img src="{{asset('dist-front/images/partner-7.png')}}" class="img-responsive" alt="sponsor logo">
                    </div>
                    <div class="sponsors-logo">
                        <img src="{{asset('dist-front/images/partner-8.png')}}" class="img-responsive" alt="sponsor logo">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection