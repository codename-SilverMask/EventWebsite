@extends('admin.layout.master')
@section('main_content')
@include('admin.layout.nav')
@include('admin.layout.sidebar')
        <div class="main-content">
            <section class="section">
                <div class="section-header justify-content-between">
                    <h1>Organisers</h1>
                    <div class="section-header-button">
                        <a href="{{ route('admin_organiser_create') }}" class="btn btn-primary">Add New</a>
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
                                                    <th>Photo</th>
                                                    <th>Name</th>
                                                    <th>Designation</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($organisers as $organiser) 
                                                <tr>
                                                    <td>{{ $loop->iteration }} </td>
                                                    <td>
                                                        <img src="{{ asset('uploads/'.$organiser->photo) }}" alt="" style="width: 50px; height: 50px;">
                                                    </td>
                                                    <td>{{ $organiser->name }} </td>
                                                    <td>{{ $organiser->designation }} </td>
                                                    <td>
                                                        <a href="{{ route('admin_organiser_edit', $organiser->id) }}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                                        <a href="{{ route('admin_organiser_delete', $organiser->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fas fa-trash"></i></a>
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