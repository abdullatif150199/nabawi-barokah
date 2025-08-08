@extends('backend.layouts.main')

@section('content')
    <div class="content-body">
        <div class="container-fluid">

            <div class="row page-titles mx-0">
                <div class="col-sm-6">
                    <div class="welcome-text">
                        <h4>All Articles</h4>
                    </div>
                </div>
                <div class="col-sm-6 justify-content-sm-end d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Article</li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Article List</h4>
                            <a href="{{ route('articles.create') }}" class="btn btn-primary">+ Add New</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example5" class="display" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th>Gambar</th>
                                            {{-- <th>Author</th> --}}
                                            <th>Judul</th>
                                            {{-- <th>Slug</th> --}}
                                            <th>Excerpt</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($articles as $article)
                                            <tr>
                                                <td>
                                                    @if ($article->img)
                                                        <img width="70" src="{{ asset('storage/' . $article->img) }}"
                                                            alt="Article Image">
                                                    @else
                                                        <span class="text-muted">No Image</span>
                                                    @endif
                                                </td>
                                                {{-- <td>{{ $article->user->name ?? '-' }}</td> --}}
                                                <td>{{ $article->title }}</td>
                                                {{-- <td>{{ $article->slug }}</td> --}}
                                                <td>{{ \Illuminate\Support\Str::limit(strip_tags($article->content), 50) }}
                                                </td>
                                                <td>
                                                    <a href="{{ route('articles.edit', $article->id) }}"
                                                        class="btn btn-sm btn-primary">
                                                        <i class="la la-pencil"></i>
                                                    </a>
                                                    <form action="{{ route('articles.destroy', $article->id) }}"
                                                        method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger"
                                                            onclick="return confirm('Yakin ingin menghapus?')">
                                                            <i class="la la-trash-o"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6" class="text-center text-muted">Tidak ada artikel
                                                    tersedia.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
