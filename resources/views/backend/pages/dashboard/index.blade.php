@extends('backend.layouts.main')

@push('style')
    <style>
        .more-link {
            font-size: 16px;
            padding: 10px 0;
            /* border: 1px solid rgba(255, 255, 255, 0.4); */
            border-radius: 6px;
            width: 100%;
            transition: all 0.3s ease;
            display: block;
            letter-spacing: 0.03em;
            text-decoration: none;
        }

        .more-link:hover {
            background-color: rgba(255, 255, 255, 0.15);
            transform: scale(1.03);
            color: #fff;
            text-decoration: none;
        }

        .more-link .arrow {
            font-weight: bold;
            margin-left: 8px;
            transition: margin-left 0.3s ease;
        }

        .more-link:hover .arrow {
            margin-left: 15px;
        }
    </style>
@endpush

@section('content')
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">

            <div class="row">
                <div class="col-xl-3 col-xxl-3 col-sm-6">
                    <div class="widget-stat card bg-primary">
                        <div class="card-body">
                            <div class="media">
                                <span class="mr-3">
                                    <i class="la la-book"></i> {{-- Icon untuk Artikel --}}
                                </span>
                                <div class="media-body text-white">
                                    <p class="mb-1">Total Artikel</p>
                                    <h3 class="text-white">{{ $totalArticles }}</h3>
                                    <a href="{{ route('articles.index') }}"
                                        class="more-link text-white d-block fw-semibold text-center">
                                        More <span class="arrow">>></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-xxl-3 col-sm-6">
                    <div class="widget-stat card bg-warning">
                        <div class="card-body">
                            <div class="media">
                                <span class="mr-3">
                                    <i class="la la-cube"></i>
                                </span>
                                <div class="media-body text-white">
                                    <p class="mb-1">Total Paket</p>
                                    <h3 class="text-white">{{ $totalPackages }}</h3>
                                    <a href="{{ route('packages.index') }}"
                                        class="more-link text-white d-block fw-semibold text-center">
                                        More <span class="arrow">>></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-xxl-3 col-sm-6">
                    <div class="widget-stat card bg-secondary">
                        <div class="card-body">
                            <div class="media">
                                <span class="mr-3">
                                    <i class="la la-camera"></i>
                                </span>
                                <div class="media-body text-white">
                                    <p class="mb-1">Dokumentasi</p>
                                    <h3 class="text-white">{{ $totalDocumentations }}</h3>
                                    <a href="{{ route('documentations.index') }}"
                                        class="more-link text-white d-block fw-semibold text-center">
                                        More <span class="arrow">>></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-xxl-3 col-sm-6">
                    <div class="widget-stat card bg-danger">
                        <div class="card-body">
                            <div class="media">
                                <span class="mr-3">
                                    <i class="la la-comments"></i>
                                </span>
                                <div class="media-body text-white">
                                    <p class="mb-1">Total Testimoni</p>
                                    <h3 class="text-white">{{ $totalTestimonials }}</h3>
                                    <a href="{{ route('testimonials.index') }}"
                                        class="more-link text-white d-block fw-semibold text-center">
                                        More <span class="arrow">>></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                {{-- <div class="col-xl-6 col-xxl-6 col-lg-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">University Survey</h3>
                        </div>
                        <div class="card-body">
                            <div id="morris_bar_stalked" class="morris_chart_height" style="height: 300px !important;">
                            </div>
                        </div>
                    </div>
                </div> --}}
                {{-- <div class="row"> --}}
                <div class="col-xl-6 col-xxl-6 col-lg-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">Kunjungan Bulanan</div>
                        <div class="card-body">
                            <div id="chart-monthly" style="height: 300px;"></div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-6 col-xxl-6 col-lg-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">Kunjungan Harian</div>
                        <div class="card-body">
                            <div id="chart-weekly" style="height: 300px;"></div>
                        </div>
                    </div>
                </div>


                <div class="col-xl-12 col-xxl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">New Visitors List</h4>
                            <a href="{{ route('visitors.export') }}">
                                <button class="btn btn-primary mb-3 text-white" data-bs-toggle="modal"
                                    data-bs-target="#exportModal">
                                    Export Excel
                                </button>
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example5" class="display" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th>Tanggal</th>
                                            <th>Paket</th>
                                            <th>Nama</th>
                                            <th>Wa</th>
                                            <th>Pesan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($visitors as $visitor)
                                            <tr>
                                                <td>{{ \Carbon\Carbon::parse($visitor->created_at)->translatedFormat('d F Y') }}
                                                </td>
                                                <td>{{ $visitor->package->name }}</td>
                                                <td>{{ $visitor->name }}</td>
                                                <td>{{ $visitor->wa }}</td>
                                                <td>{{ $visitor->message }}</td>
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

    {{-- Export Modal --}}

    <div class="modal fade" id="exportModal" tabindex="-1" aria-labelledby="exportModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ route('visitors.export') }}" method="GET">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exportModalLabel">Filter Data Export</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <label>Tanggal Mulai</label>
                        <input type="date" name="start_date" class="form-control mb-2">

                        <label>Tanggal Selesai</label>
                        <input type="date" name="end_date" class="form-control mb-2">

                        <label>Paket</label>
                        <select name="package_id" class="form-control">
                            <option value="">-- Semua Paket --</option>
                            @foreach ($packages as $package)
                                <option value="{{ $package->id }}">{{ $package->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Download</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('script')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Load monthly data
            fetch("/api/visitors/monthly")
                .then(res => res.json())
                .then(data => {
                    let months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov',
                        'Dec'
                    ];
                    let chartData = [];

                    for (let i = 1; i <= 12; i++) {
                        chartData.push({
                            month: months[i - 1],
                            total: data[i] || 0
                        });
                    }

                    Morris.Bar({
                        element: 'chart-monthly',
                        data: chartData,
                        xkey: 'month',
                        ykeys: ['total'],
                        labels: ['Pengunjung'],
                        barColors: ['#6673fd'],
                        hideHover: 'auto',
                        resize: true
                    });
                });

            // Load weekly data
            fetch("/api/visitors/weekly")
                .then(res => res.json())
                .then(data => {
                    const days = ['Min', 'Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab'];

                    const formattedData = data.map(item => {
                        const dateObj = new Date(item.date);
                        const dayName = days[dateObj.getDay()];
                        return {
                            day: dayName,
                            total: item.total
                        };
                    });

                    Morris.Bar({
                        element: 'chart-weekly',
                        data: formattedData,
                        xkey: 'day',
                        ykeys: ['total'],
                        labels: ['Pengunjung'],
                        barColors: ['#F1C40F'],
                        hideHover: 'auto',
                        resize: true
                    });
                });

        });
    </script>
@endpush
