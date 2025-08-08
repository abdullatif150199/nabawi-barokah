@extends('backend.layouts.main')

@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>Add Announcement</h4>
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Add Announcement</li>
                    </ol>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <form action="{{ route('announcements.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            {{-- content --}}
                            <div class="col-md-12 mt-3">
                                <label for="content" class="form-label">Konten</label>
                                <input id="text" type="hidden" name="text" value="{{ old('text') }}">


                                <trix-editor input="text" class="trix-content trix-lg"></trix-editor>

                                @error('text')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            {{-- Submit --}}
                            <div class="col-md-12 mt-3">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="{{ route('announcements.index') }}" class="btn btn-light">Cancel</a>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
