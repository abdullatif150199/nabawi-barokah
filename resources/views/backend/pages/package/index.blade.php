@extends('backend.layouts.main')

@section('content')
    <div class="content-body">
        <div class="container-fluid">

            <div class="row page-titles mx-0">
                <div class="col-sm-6">
                    <div class="welcome-text">
                        <h4>All Packages</h4>
                    </div>
                </div>
                <div class="col-sm-6 justify-content-sm-end d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Packages</li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Package List</h4>
                            <a href="{{ route('packages.create') }}" class="btn btn-primary">+ Add New</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example5" class="display" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th>Paket</th>
                                            <th>Durasi</th>
                                            <th>keberangkatan</th>
                                            <th>Harga</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($packages as $package)
                                            <tr>
                                                <td>{{ $package->name }}</td>
                                                <td>{{ $package->duration ?? '-' }}</td>
                                                <td>{{ $package->departure_date ? \Carbon\Carbon::parse($package->departure_date)->format('d M Y') : '-' }}
                                                </td>
                                                <td>Rp {{ number_format($package->price, 0, ',', '.') }}</td>
                                                <td>
                                                    <a href="{{ route('packages.show', $package->id) }}"
                                                        class="btn btn-sm btn-info me-1">
                                                        <i class="la la-eye"></i>
                                                    </a>

                                                    <a href="{{ route('packages.edit', $package->id) }}"
                                                        class="btn btn-sm btn-primary me-1">
                                                        <i class="la la-pencil"></i>
                                                    </a>

                                                    <form action="{{ route('packages.destroy', $package->id) }}"
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
                                                <td colspan="5" class="text-center text-muted">Tidak ada data tersedia.
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
