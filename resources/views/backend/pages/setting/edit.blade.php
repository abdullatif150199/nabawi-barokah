@extends('backend.layouts.main')

@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>Pengaturan</h4>
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Setting</li>
                    </ol>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <form action="{{ route('setting.update') }}" method="POST">
                        @csrf

                        <div class="row">
                            {{-- WhatsApp --}}
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>WhatsApp</label>
                                    <input type="text" name="wa" class="form-control"
                                        value="{{ old('wa', optional($setting)->wa) }}">
                                    @error('wa')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            {{-- Facebook --}}
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Facebook</label>
                                    <input type="url" name="fb" class="form-control"
                                        value="{{ old('fb', optional($setting)->fb) }}">
                                    @error('fb')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            {{-- Instagram --}}
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Instagram</label>
                                    <input type="url" name="ig" class="form-control"
                                        value="{{ old('ig', optional($setting)->ig) }}">
                                    @error('ig')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            {{-- YouTube --}}
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>YouTube</label>
                                    <input type="url" name="yt" class="form-control"
                                        value="{{ old('yt', optional($setting)->yt) }}">
                                    @error('yt')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            {{-- Submit --}}
                            <div class="col-md-12 mt-3">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="{{ route('dashboard') }}" class="btn btn-light">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
