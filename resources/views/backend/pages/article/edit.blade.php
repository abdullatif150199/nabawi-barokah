@extends('backend.layouts.main')

@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>Edit Article</h4>
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Edit Article</li>
                    </ol>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <form action="{{ route('articles.update', $article->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">

                            {{-- Image --}}
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Gambar</label>
                                    @if ($article->img)
                                        <div class="mb-2">
                                            <img src="{{ asset('storage/' . $article->img) }}" width="120"
                                                alt="Current Image">
                                        </div>
                                    @endif
                                    <input type="file" name="img" class="form-control-file">
                                    @error('img')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            {{-- Title --}}
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Judul</label>
                                    <input type="text" name="title" class="form-control"
                                        value="{{ old('title', $article->title) }}">
                                    @error('title')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            {{-- Content --}}
                            {{-- <div class="col-md-12">
                                <div class="form-group">
                                    <label>Content</label>
                                    <textarea name="content" rows="6" class="form-control">{{ old('content', $article->content) }}</textarea>
                                    @error('content')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div> --}}

                            <div class="col-md-12 mt-3">
                                <label for="content" class="form-label">Konten</label>
                                <input id="content" type="hidden" name="content"
                                    value="{{ old('content', $article->content ?? '') }}">


                                <trix-editor input="content" class="trix-content trix-lg"></trix-editor>

                                @error('content')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>


                            {{-- Submit --}}
                            <div class="col-md-12 mt-3">
                                <button type="submit" class="btn btn-primary">Update</button>
                                <a href="{{ route('articles.index') }}" class="btn btn-light">Cancel</a>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
