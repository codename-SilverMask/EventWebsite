@extends('admin.layout.master')
@section('main_content')
@include('admin.layout.nav')
@include('admin.layout.sidebar')
        <div class="main-content">
            <section class="section">
                <div class="section-header justify-content-between">
                    <h1>Create Video Gallery</h1>
                    <div class="section-header-button">
                        <a href="{{ route('admin_video_index') }}" class="btn btn-primary">View All</a>
                    </div>
                </div>
                <div class="section-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <form action="{{ route('admin_video_store') }}" method="post">
                                        @csrf
                                        <div class="mb-4">
                                            <label class="form-label">Video *</label>
                                            <input type="text" class="form-control" name="video" value="{{ old('video') }}" placeholder="Enter video id (e.g., 'VbWi4T-gy98')">
                                        </div>
                                        <div class="mb-4">
                                            <label class="form-label">Caption</label>
                                            <input type="text" class="form-control" name="caption" value="{{ old('caption') }}">
                                        </div>
                                        <div class="mb-4">
                                            <label class="form-label"></label>
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </form>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
@endsection