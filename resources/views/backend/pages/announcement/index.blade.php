@extends('backend.layouts.main')

@push('style')
    <style>
        /* The switch - the box around the slider */
        .switch {
            position: relative;
            display: inline-block;
            width: 50px;
            height: 26px;
        }

        /* Hide default HTML checkbox */
        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        /* The slider */
        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #6c757d;
            /* secondary */
            transition: .4s;
            border-radius: 34px;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 18px;
            width: 18px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            transition: .4s;
            border-radius: 50%;
        }

        input:checked+.slider {
            background-color: #0d6efd;
            /* primary */
        }

        input:checked+.slider:before {
            transform: translateX(24px);
        }

        /* Disabled state */
        .switch input:disabled+.slider {
            cursor: not-allowed;
            opacity: 0.6;
        }
    </style>
@endpush

@section('content')
    <div class="content-body">
        <div class="container-fluid">

            <div class="row page-titles mx-0">
                <div class="col-sm-6">
                    <div class="welcome-text">
                        <h4>All Announcements</h4>
                    </div>
                </div>
                <div class="col-sm-6 justify-content-sm-end d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Announcements</li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Announcement List</h4>
                            <a href="{{ route('announcements.create') }}" class="btn btn-primary">+ Add New</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example5" class="display" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th>Text</th>
                                            <th>Status</th>
                                            {{-- <th>Created At</th> --}}
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($announcements as $announcement)
                                            <tr>
                                                <td>{!! $announcement->text !!}</td>
                                                <td>
                                                    @if ($announcement->is_active)
                                                        <label class="switch">
                                                            <input type="checkbox" checked disabled>
                                                            <span class="slider round"></span>
                                                        </label>
                                                    @else
                                                        <form
                                                            action="{{ route('announcements.activate', $announcement->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            <label class="switch">
                                                                <input type="checkbox"
                                                                    onchange="if(confirm('Aktifkan pengumuman ini?')) { this.form.submit(); } else { this.checked = false; }">
                                                                <span class="slider round"></span>
                                                            </label>
                                                        </form>
                                                    @endif
                                                </td>



                                                <td class="d-flex gap-1">
                                                    <a href="{{ route('announcements.edit', $announcement->id) }}"
                                                        class="btn btn-sm btn-primary me-1">
                                                        <i class="la la-pencil"></i>
                                                    </a>

                                                    <form action="{{ route('announcements.destroy', $announcement->id) }}"
                                                        method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger mx-2"
                                                            onclick="return confirm('Yakin ingin menghapus?')">
                                                            <i class="la la-trash-o"></i>
                                                        </button>
                                                    </form>
                                                    {{-- @if (!$announcement->is_active)
                                                        <form
                                                            action="{{ route('announcements.activate', $announcement->id) }}"
                                                            method="POST" class="me-1">
                                                            @csrf
                                                            <button class="btn btn-sm btn-success"
                                                                onclick="return confirm('Aktifkan pengumuman ini?')">
                                                                Aktifkan
                                                            </button>
                                                        </form>
                                                    @endif --}}
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="4" class="text-center text-muted">Tidak ada data tersedia.
                                                </td>
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
