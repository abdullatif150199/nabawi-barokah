@extends('backend.layouts.main')

@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>Edit Documentation</h4>
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Edit Documentation</li>
                    </ol>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <form action="{{ route('documentations.update', $documentation->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf @method('PUT')
                        <div class="row">

                            {{-- Thumb --}}
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Thumbnail Image</label><br>
                                    <img src="{{ asset('storage/' . $documentation->img_thumb) }}" width="100"
                                        class="mb-2"><br>
                                    <input type="file" name="img_thumb" class="form-control-file" required>
                                    @error('img_thumb')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            {{-- Title --}}
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" name="title" class="form-control"
                                        value="{{ old('title', $documentation->title) }}">
                                    @error('title')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            {{-- Description --}}
                            {{-- <div class="col-md-12">
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea name="description" class="form-control" rows="6">{{ old('description', $documentation->description) }}</textarea>
                                    @error('description')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div> --}}

                                  <div class="col-md-12 mt-3">
                                <label for="description" class="form-label">Desckripsi</label>
                                <input id="description" type="hidden" name="description" value="{{ old('description', $documentation->description) }}">
                                <trix-editor input="description" class="trix-content trix-lg"></trix-editor>
                                @error('description')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            {{-- Add More Images --}}
                            <div class="col-md-12 mt-3">
                                <div class="form-group">
                                    <label>Add More Images</label>
                                    <input type="file" name="images[]" class="form-control-file" multiple>
                                    @error('images')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            {{-- Existing Images --}}
                            <div class="col-md-12">
                                <label>Existing Images</label><br>
                                <div class="row">
                                    @foreach ($documentation->images as $image)
                                        <div class="col-md-3 mb-3">
                                            <img src="{{ asset('storage/' . $image->url) }}" class="img-fluid" />
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            {{-- Submit --}}
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">Update</button>
                                <a href="{{ route('documentations.index') }}" class="btn btn-light">Cancel</a>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
