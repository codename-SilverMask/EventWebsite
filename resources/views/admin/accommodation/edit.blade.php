@extends('admin.layout.master')
@section('main_content')
@include('admin.layout.nav')
@include('admin.layout.sidebar')
        <div class="main-content">
            <section class="section">
                <div class="section-header justify-content-between">
                    <h1>Edit Accomodation</h1>
                    <div class="section-header-button">
                        <a href="{{ route('admin_accommodation_index') }}" class="btn btn-primary">View All</a>
                    </div>
                </div>
                <div class="section-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <form action="{{ route('admin_accommodation_update' , $accommodation->id) }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="mb-4">
                                            <label class="form-label">Existing Photo</label>
                                            <div><img src="{{ asset('uploads/'.$accommodation->photo) }}" alt="" class="w_100"></div>
                                        </div>
                                        <div class="mb-4">
                                            <label class="form-label">Change Photo</label>
                                            <div><input type="file" name="photo"></div>
                                        </div>
                                        <div class="mb-4">
                                            <label class="form-label">Name *</label>
                                            <input type="text" class="form-control" name="name" value="{{ $accommodation->name }}">
                                        </div>
                                        <div class="mb-4">
                                            <label class="form-label">Description *</label>
                                            <textarea class="form-control h_100" name="description" rows="5">{{ $accommodation->description }}</textarea>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-4">
                                                    <label class="form-label">Address</label>
                                                    <input type="text" class="form-control" name="address" value="{{ $accommodation->address }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-4">
                                                    <label class="form-label">Website</label>
                                                    <input type="text" class="form-control" name="website" value="{{ $accommodation->website }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-4">
                                                    <label class="form-label">Email</label>
                                                    <input type="text" class="form-control" name="email" value="{{ $accommodation->email }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-4">
                                                    <label class="form-label">Phone</label>
                                                    <input type="text" class="form-control" name="phone" value="{{ $accommodation->phone }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-4">
                                            <label class="form-label"></label>
                                            <button type="submit" class="btn btn-primary">Update</button>
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