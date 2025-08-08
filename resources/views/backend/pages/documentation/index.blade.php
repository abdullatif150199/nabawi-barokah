@extends('backend.layouts.main')

@section('content')
    <div class="content-body">
        <div class="container-fluid">

            <div class="row page-titles mx-0">
                <div class="col-sm-6">
                    <div class="welcome-text">
                        <h4>All Documentations</h4>
                    </div>
                </div>
                <div class="col-sm-6 justify-content-sm-end d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Documentation</li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Documentation List</h4>
                            <a href="{{ route('documentations.create') }}" class="btn btn-primary">+ Add New</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example5" class="display" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th>Thumbnail</th>
                                            <th>Judul</th>
                                            {{-- <th>Deskrip</th> --}}
                                            <th>Total Images</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($documentations as $documentation)
                                            <tr>
                                                <td>
                                                    @if ($documentation->img_thumb)
                                                        <img width="70"
                                                            src="{{ asset('storage/' . $documentation->img_thumb) }}"
                                                            alt="Thumb Image">
                                                    @else
                                                        <span class="text-muted">No Image</span>
                                                    @endif
                                                </td>
                                                <td>{{ $documentation->title }}</td>
                                                {{-- <td>{{ \Illuminate\Support\Str::limit(strip_tags($documentation->description), 50) }}
                                                </td> --}}
                                                <td>{{ $documentation->images->count() }}</td>
                                                <td>
                                                    <a href="{{ route('documentations.edit', $documentation->id) }}"
                                                        class="btn btn-sm btn-primary">
                                                        <i class="la la-pencil"></i>
                                                    </a>
                                                    <form action="{{ route('documentations.destroy', $documentation->id) }}"
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
                                                <td colspan="5" class="text-center text-muted">Tidak ada dokumentasi
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
