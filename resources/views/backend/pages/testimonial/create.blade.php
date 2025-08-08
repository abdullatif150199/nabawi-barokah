@extends('backend.layouts.main')

@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>Add Testimonial</h4>
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Add Testimonial</li>
                    </ol>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <form action="{{ route('testimonials.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">

                            {{-- Image --}}
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Gambar</label>
                                    <input type="file" name="img" class="form-control-file">
                                    @error('img')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            {{-- User --}}
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>User</label>
                                    <input type="text" name="user" class="form-control" value="{{ old('user') }}">
                                    @error('user')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            {{-- Content --}}
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Content</label>
                                    <textarea name="content" rows="6" class="form-control">{{ old('content') }}</textarea>
                                    @error('content')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            {{-- Submit --}}
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="{{ route('testimonials.index') }}" class="btn btn-light">Cancel</a>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
