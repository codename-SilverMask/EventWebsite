@extends('admin.layout.master')
@section('main_content')
@include('admin.layout.nav')
@include('admin.layout.sidebar')
        <div class="main-content">
            <section class="section">
                <div class="section-header justify-content-between">
                    <h1>Sponsors</h1>
                    <div class="section-header-button">
                        <a href="{{ route('admin_sponsor_create') }}" class="btn btn-primary">Add New</a>
                    </div>
                </div>
                <div class="section-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="example1" class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>SL</th>
                                                    <th>Logo</th>
                                                    <th>Featured Photo</th>
                                                    <th>Name</th>
                                                    <th>Sponsor Category</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($sponsors as $item) 
                                                <tr>
                                                    <td>{{ $loop->iteration }} </td>
                                                    <td>
                                                        <img src="{{ asset('uploads/'.$item->logo) }}" alt="" style="width: 50px; height: 50px;">
                                                    </td>
                                                    <td>
                                                        <img src="{{ asset('uploads/'.$item->featured_photo) }}" alt="" style="width: 50px; height: 50px;">
                                                    </td>
                                                    <td>{{ $item->name }} </td>
                                                    <td>{{ $item->sponsor_category->name }} </td>
                                                    <td>
                                                        <a href="{{ route('admin_sponsor_edit', $item->id) }}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                                        <a href="{{ route('admin_sponsor_delete', $item->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fas fa-trash"></i></a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
@endsection