@extends('admin.layout.master')
@section('main_content')
@include('admin.layout.nav')
@include('admin.layout.sidebar')
        <div class="main-content">
            <section class="section">
                <div class="section-header justify-content-between">
                    <h1>Edit FAQ</h1>
                    <div class="section-header-button">
                        <a href="{{ route('admin_faq_index') }}" class="btn btn-primary">View All</a>
                    </div>
                </div>
                <div class="section-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <form action="{{ route('admin_faq_update' , $faq->id) }}" method="post">
                                        @csrf
                                        <div class="mb-4">
                                            <label class="form-label">Question *</label>
                                            <input type="text" class="form-control" name="question" value="{{ $faq->question }}" placeholder="Enter Question" required>
                                        </div>
                                        <div class="mb-4">
                                            <label class="form-label">Answer *</label>
                                            <textarea class="form-control editor" name="answer" rows="5" placeholder="Enter Answer">{{ $faq->answer }}</textarea>
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