@extends('backend.layouts.main')

@section('content')
    <div class="content-body">
        <div class="container-fluid">

            {{-- Page Title & Breadcrumb --}}
            <div class="row page-titles mx-0 mb-3">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>Package Detail</h4>
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('packages.index') }}">Packages</a></li>
                        <li class="breadcrumb-item active">Package Detail</li>
                    </ol>
                </div>
            </div>

            <div class="row">
                {{-- Sidebar kiri --}}
                {{-- <div class="col-xl-3 col-xxl-4 col-lg-4">
                    <div class="card">
                        <div class="text-center p-3 overlay-box"
                            style="background-image: url('{{ $package->image ? asset('storage/' . $package->image) : asset('backend-assets/images/big/img1.jpg') }}'); background-size: cover; background-position: center;">
                            <div class="profile-photo">
                                <img src="{{ $package->image ? asset('storage/' . $package->image) : asset('backend-assets/images/profile/profile.png') }}"
                                    width="100" class="img-fluid rounded-circle" alt="Package Image">
                            </div>
                            <h3 class="mt-3 mb-1 text-white">{{ $package->name }}</h3>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between">
                                <span class="mb-0">Duration</span>
                                <strong class="text-muted">{{ $package->duration }}</strong>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <span class="mb-0">Departure Date</span>
                                <strong
                                    class="text-muted">{{ \Carbon\Carbon::parse($package->departure_date)->translatedFormat('d F Y') }}</strong>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <span class="mb-0">Hotel 1</span>
                                <strong class="text-muted">{{ $package->hotel_1 }}</strong>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <span class="mb-0">Hotel 2</span>
                                <strong class="text-muted">{{ $package->hotel_2 }}</strong>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <span class="mb-0">Ziarah</span>
                                <strong class="text-muted">{{ $package->ziarah }}</strong>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <span class="mb-0">Acomodation</span>
                                <strong class="text-muted">{{ $package->acomodation }}</strong>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <span class="mb-0">Price</span>
                                <strong class="text-muted">Rp {{ number_format($package->price, 0, ',', '.') }}</strong>
                            </li>
                        </ul>
                        <div class="card-footer text-center border-0 mt-0">
                            <a href="{{ route('packages.index') }}" class="btn btn-secondary btn-rounded px-4">Back</a>
                            <a href="{{ route('packages.edit', $package->id) }}"
                                class="btn btn-primary btn-rounded px-4 ms-2">Edit</a>
                        </div>
                    </div>
                </div> --}}

                {{-- Konten kanan --}}
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="profile-tab">
                                <div class="custom-tab-1">
                                    <ul class="nav nav-tabs">
                                        <li class="nav-item"><a href="#about-me" data-toggle="tab"
                                                class="nav-link active show">About Package</a></li>
                                        {{-- <li class="nav-item"><a href="#my-posts" data-toggle="tab"
                                                class="nav-link">Posts</a></li> --}}
                                    </ul>
                                    <div class="tab-content">
                                        <div id="about-me" class="tab-pane fade active show">
                                            <div class="profile-personal-info pt-4">
                                                {{-- <h4 class="text-primary mb-4">Package Information</h4> --}}

                                                {{-- Display key fields --}}
                                                <div class="row mb-4">
                                                    <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                                                        <h5 class="f-w-500">Nama Paket <span class="pull-right">:</span>
                                                        </h5>
                                                    </div>
                                                    <div class="col-lg-9 col-md-8 col-sm-6 col-6">{{ $package->name }}
                                                    </div>
                                                </div>

                                                <div class="row mb-4">
                                                    <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                                                        <h5 class="f-w-500">Durasi <span class="pull-right">:</span></h5>
                                                    </div>
                                                    <div class="col-lg-9 col-md-8 col-sm-6 col-6">{{ $package->duration }}
                                                    </div>
                                                </div>

                                                <div class="row mb-4">
                                                    <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                                                        <h5 class="f-w-500">Tanggal Keberangkatan <span class="pull-right">:</span>
                                                        </h5>
                                                    </div>
                                                    <div class="col-lg-9 col-md-8 col-sm-6 col-6">
                                                        {{ \Carbon\Carbon::parse($package->departure_date)->translatedFormat('d F Y') }}
                                                    </div>
                                                </div>

                                                <div class="row mb-4">
                                                    <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                                                        <h5 class="f-w-500">Hotel Madinah <span class="pull-right">:</span></h5>
                                                    </div>
                                                    <div class="col-lg-9 col-md-8 col-sm-6 col-6">{{ $package->hotel_1 }}
                                                    </div>
                                                </div>

                                                <div class="row mb-4">
                                                    <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                                                        <h5 class="f-w-500">Hotel Makkah <span class="pull-right">:</span></h5>
                                                    </div>
                                                    <div class="col-lg-9 col-md-8 col-sm-6 col-6">{{ $package->hotel_2 }}
                                                    </div>
                                                </div>

                                                <div class="row mb-4">
                                                    <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                                                        <h5 class="f-w-500">Ziarah <span class="pull-right">:</span></h5>
                                                    </div>
                                                    <div class="col-lg-9 col-md-8 col-sm-6 col-6">{{ $package->ziarah }}
                                                    </div>
                                                </div>

                                                <div class="row mb-4">
                                                    <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                                                        <h5 class="f-w-500">Akomodasi <span class="pull-right">:</span>
                                                        </h5>
                                                    </div>
                                                    <div class="col-lg-9 col-md-8 col-sm-6 col-6">
                                                        {{ $package->acomodation }}</div>
                                                </div>

                                                <div class="row mb-4">
                                                    <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                                                        <h5 class="f-w-500">Harga Paket <span class="pull-right">:</span></h5>
                                                    </div>
                                                    <div class="col-lg-9 col-md-8 col-sm-6 col-6">Rp
                                                        {{ number_format($package->price, 0, ',', '.') }}</div>
                                                </div>

                                                {{-- Detail panjang di bawah --}}
                                                {{-- <div class="profile-about-me mt-5">
                                                    <div class="border-bottom-1 pb-4">
                                                        {!! $package->detail !!}
                                                    </div>
                                                </div> --}}
                                            </div>
                                        </div>

                                        {{-- Tab Posts (optional) --}}
                                        <div id="my-posts" class="tab-pane fade">
                                            <div class="my-post-content pt-3">
                                                <div class="post-input">
                                                    <textarea name="textarea" id="textarea" cols="30" rows="5" class="form-control bg-transparent"
                                                        placeholder="Please type what you want...."></textarea>
                                                    <a href="javascript:void()"><i class="ti-clip"></i></a>
                                                    <a href="javascript:void()"><i class="ti-camera"></i></a>
                                                    <a href="javascript:void()" class="btn btn-primary">Post</a>
                                                </div>
                                                <div class="profile-uoloaded-post border-bottom-1 pb-5">
                                                    <img src="{{ asset('backend-assets/images/profile/8.jpg') }}"
                                                        alt="" class="img-fluid">
                                                    <a class="post-title" href="javascript:void()">
                                                        <h4>Collection of textile samples lay spread</h4>
                                                    </a>
                                                    <p>A wonderful serenity has taken possession of my entire soul like
                                                        these sweet mornings...</p>
                                                    <button class="btn btn-primary mr-3"><span class="mr-3"><i
                                                                class="fa fa-heart"></i></span>Like</button>
                                                    <button class="btn btn-secondary"><span class="mr-3"><i
                                                                class="fa fa-reply"></i></span>Reply</button>
                                                </div>
                                                {{-- Tambahkan post lain jika perlu --}}
                                                <div class="text-center mb-2">
                                                    <a href="javascript:void()" class="btn btn-primary">Load More</a>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
