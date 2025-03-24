@extends('front.layout.master')


@section('main_content')

<div class="common-banner" style="background-image:url({{ asset('dist-front/images/banner.jpg') }})">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="item">
                    <h2>Dashboard</h2>
                    <div class="breadcrumb-container">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="user-section pt_70 pb_70">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="user-sidebar">
                    <div class="card">
                    @include('front.layout.sidebar')
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <h4 class="mb_15 fw600">User Information:</h4>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <th>Name: </th>
                            <td>{{ Auth::guard('web')->user()->name; }}</td>
                        </tr>
                        <tr>
                            <th>Email: </th>
                            <td>{{ Auth::guard('web')->user()->email; }}</td>
                        </tr>
                        <tr>
                            <th>Phone: </th>
                            @if (Auth::guard('web')->user()->phone != '')
                            <td>{{ Auth::guard('web')->user()->phone; }}</td>
                            @else 
                            <td>Not Available</td>
                            @endif
                        </tr>
                        <tr>
                            <th>Address: </th>
                            @if (Auth::guard('web')->user()->address != '')
                            <td>{{ Auth::guard('web')->user()->address; }}</td>
                            @else 
                            <td>Not Available</td>
                            @endif
                        </tr>
                        <tr>
                            <th>State: </th>
                            @if (Auth::guard('web')->user()->state != '')
                            <td>{{ Auth::guard('web')->user()->state; }}</td>
                            @else 
                            <td>Not Available</td>
                            @endif
                        </tr>
                        <tr>
                            <th>City: </th>
                            @if (Auth::guard('web')->user()->city != '')
                            <td>{{ Auth::guard('web')->user()->city; }}</td>
                            @else 
                            <td>Not Available</td>
                            @endif
                        </tr>
                        <tr>
                            <th>Country: </th>
                            @if (Auth::guard('web')->user()->country != '')
                            <td>{{ Auth::guard('web')->user()->country; }}</td>
                            @else 
                            <td>Not Available</td>
                            @endif
                        </tr>
                        <tr>
                            <th>Zip Code: </th>
                            @if (Auth::guard('web')->user()->zip != '')
                            <td>{{ Auth::guard('web')->user()->zip; }}</td>
                            @else 
                            <td>Not Available</td>
                            @endif
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection