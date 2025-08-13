@extends('backend.layouts.main')

@push('style')
    <style>
        .trix-lg {
            min-height: 300px;
        }

        trix-editor.trix-content {
            min-height: 300px;
        }
    </style>
@endpush

@section('content')
    <div class="content-body">
        <div class="container-fluid">

            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>Edit Package</h4>
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Edit Package</li>
                    </ol>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <form action="{{ route('packages.update', $package->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row g-3">

                            {{-- Name --}}
                            <div class="col-md-6">
                                <label class="form-label">Nama Paket</label>
                                <input type="text" name="name" class="form-control"
                                    value="{{ old('name', $package->name) }}" required>
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Gambar</label>
                                    @if ($package->image)
                                        <div class="mb-2">
                                            <img src="{{ asset('storage/' . $package->image) }}" width="75"
                                                alt="Current Image">
                                        </div>
                                    @endif
                                    <input type="file" name="image" class="form-control-file"
                                        value="{{ old('image', $package->image) }}">
                                    @error('image')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            {{-- Duration --}}
                            <div class="col-md-6">
                                <label class="form-label">Durasi</label>
                                <input type="text" name="duration" class="form-control"
                                    value="{{ old('duration', $package->duration) }}">
                                @error('duration')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            {{-- Departure Date --}}
                            <div class="col-md-6">
                                <label class="form-label">Tanggal Keberangkatan</label>
                                <input type="date" name="departure_date" class="form-control"
                                    value="{{ old('departure_date', $package->departure_date) }}">
                                @error('departure_date')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            {{-- Hotel 1 --}}
                            <div class="col-md-6">
                                <label class="form-label">Maskapai</label>
                                <input type="text" name="airline" class="form-control"
                                    value="{{ old('airline', $package->airline) }}">
                                @error('airline')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            {{-- Hotel 1 --}}
                            <div class="col-md-6">
                                <label class="form-label">Hotel Madinah</label>
                                <input type="text" name="hotel_1" class="form-control"
                                    value="{{ old('hotel_1', $package->hotel_1) }}">
                                @error('hotel_1')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            {{-- Hotel 2 --}}
                            <div class="col-md-6">
                                <label class="form-label">Hotel Makkah</label>
                                <input type="text" name="hotel_2" class="form-control"
                                    value="{{ old('hotel_2', $package->hotel_2) }}">
                                @error('hotel_2')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            {{-- Ziarah --}}
                            <div class="col-md-6">
                                <label class="form-label">Ziarah</label>
                                <input type="text" name="ziarah" class="form-control"
                                    value="{{ old('ziarah', $package->ziarah) }}">
                                @error('ziarah')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            {{-- Acomodation --}}
                            <div class="col-md-6">
                                <label class="form-label">Akomodasi</label>
                                <input type="text" name="acomodation" class="form-control"
                                    value="{{ old('acomodation', $package->acomodation) }}">
                                @error('acomodation')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            {{-- Price --}}
                            <div class="col-md-6">
                                <label class="form-label">Harga Paket</label>
                                <input type="number" step="0.01" name="price" class="form-control"
                                    value="{{ old('price', $package->price) }}" required>
                                @error('price')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            {{-- Detail --}}
                            <div class="col-md-12 mt-3">
                                <label for="detail" class="form-label">Detail</label>


                                <input id="detail" type="hidden" name="detail"
                                    value="{{ old('detail', $package->detail) }}">


                                <trix-editor input="detail" class="trix-content trix-lg"></trix-editor>

                                @error('detail')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-md-12 mt-3">
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
