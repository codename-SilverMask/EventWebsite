@extends('front.layout.master')


@section('main_content')

<div class="common-banner" style="background-image:url({{ asset('dist-front/images/banner.jpg') }})">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="item">
                    <h2>{{ $organiser->name }}</h2>
                    <div class="breadcrumb-container">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('organisers') }}">Organisers</a></li>
                            <li class="breadcrumb-item active">{{ $organiser->name }}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="speakers" class="pt_70 pb_70 white team speakers-item">
    <div class="container">

        <div class="row">
            <div class="col-lg-4 col-sm-12 col-xs-12">
                <div class="speaker-detail-img">
                    <img src="{{ asset('uploads/'.$organiser->photo) }}">
                </div>
            </div>
            <div class="col-lg-8 col-sm-12 col-xs-12">
                <div class="speaker-detail">
                    <h2>{{ $organiser->name }}</h2>
                    <h4 class="mb_20">{{ $organiser->designation }}</h4>
                    @if ($organiser->biography != null)
                    <p>
                        {!! nl2br($organiser->biography) !!}
                    </p>
                    @endif

                    <h4>More Information</h4>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr>
                                @if ($organiser->address != null)
                                <th><b>Address:</b></th>
                                <td>{{ $organiser->address }}</td>
                                @endif
                            </tr>
                            <tr>
                                <th><b>Email:</b></th>
                                <td>{{ $organiser->email }}</td>
                            </tr>
                            <tr>
                                <th><b>Phone:</b></th>
                                <td>{{ $organiser->phone }}</td>
                            </tr>
                            @if ($organiser->facebook != null || $organiser->twitter != null || $organiser->linkedin != null || $organiser->instagram != null)
                            <tr>
                                <th><b>Social:</b></th>
                                <td>
                                    <ul class="social-icon">
                                        @if ($organiser->facebook != null)
                                        <li>
                                            <a href="{{ $organiser->facebook }}"><i class="fa fa-facebook"></i></a>
                                        </li>
                                        @endif
                                        @if ($organiser->twitter != null)
                                        <li>
                                            <a href="{{ $organiser->twitter }}"><i class="fa fa-twitter"></i></a>
                                        </li>
                                        @endif
                                        @if ($organiser->linkedin != null)
                                        <li>
                                            <a href="{{ $organiser->linkedin }}"><i class="fa fa-linkedin"></i></a>
                                        </li>
                                        @endif
                                        @if ($organiser->instagram != null)
                                        <li>
                                            <a href="{{ $organiser->instagram }}"><i class="fa fa-instagram"></i></a>
                                        </li>
                                        @endif
                                    </ul>
                                </td>
                            </tr>
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection