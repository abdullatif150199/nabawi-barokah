@extends('backend.layouts.main')

@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>Add Documentation</h4>
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Add Documentation</li>
                    </ol>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <form action="{{ route('documentations.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">

                            {{-- Thumb --}}
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Thumbnail Image</label>
                                    <input type="file" name="img_thumb" class="form-control-file" required>
                                    @error('img_thumb')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            {{-- Title --}}
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Judul</label>
                                    <input type="text" name="title" class="form-control" value="{{ old('title') }}">
                                    @error('title')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            {{-- Description --}}
                            {{-- <div class="col-md-12">
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea name="description" class="form-control" rows="6">{{ old('description') }}</textarea>
                                    @error('description')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div> --}}

                            <div class="col-md-12 mt-3">
                                <label for="description" class="form-label">Deskripsi</label>
                                <input id="description" type="hidden" name="description" value="{{ old('description') }}">
                                <trix-editor input="description" class="trix-content trix-lg"></trix-editor>
                                @error('description')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            {{-- Images --}}
                            <div class="col-md-12 mt-3">
                                <div class="form-group">
                                    <label>Images</label>
                                    <input type="file" name="images[]" class="form-control-file" multiple>
                                    @error('images')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                    @if ($errors->has('images.*'))
                                        @foreach ($errors->get('images.*') as $message)
                                            <small class="text-danger">{{ $message[0] }}</small><br>
                                        @endforeach
                                    @endif
                                </div>
                            </div>

                            {{-- Submit --}}
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="{{ route('documentations.index') }}" class="btn btn-light">Cancel</a>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
