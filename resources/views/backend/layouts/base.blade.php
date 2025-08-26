<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>@yield('title', 'Nabawi Barokah - Umroh Amanah & Eksklusif')</title>

    <meta name="description" content="@yield('meta_description', 'Nabawi Barokah menyediakan layanan perjalanan Umroh dan Haji dengan amanah, eksklusif, dan sesuai syariat Islam.')">
    <meta name="keywords" content="@yield('meta_keywords', 'umroh, haji, travel umroh, nabawi barokah, umroh amanah, haji eksklusif')">
    <meta name="author" content="Nabawi Barokah">

    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('backend-assets/images/logo.png') }}">
    <link rel="stylesheet" href="{{ asset('backend-assets/vendor/jqvmap/css/jqvmap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend-assets/vendor/chartist/css/chartist.min.css') }}">
    <!-- Summernote -->
    <link href="{{ asset('backend-assets/vendor/summernote/summernote.css') }}" rel="stylesheet">
    <link rel="stylesheet"
        href="{{ asset('backend-assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend-assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('backend-assets/css/skin-3.css') }}">
    {{-- toastr --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" />
    <!-- Datatable -->
    <link rel="stylesheet" href="{{ asset('backend-assets/vendor/datatables/css/jquery.dataTables.min.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('backend-assets/css/style.css') }}"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.css">

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=AW-16575357948"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'AW-16575357948');
    </script>

    <style>
        .trix-lg {
            min-height: 300px;
        }

        trix-editor.trix-content {
            min-height: 300px;
        }
    </style>
    @stack('style')



</head>

<body>

    {{-- @include('sweetalert::alert') --}}

    @yield('container')

    @if (session('success'))
        <script>
            Swal.fire({
                title: 'Success',
                text: '{{ session('success') }}',
                icon: 'success',
                confirmButtonText: 'OK'
            });
        </script>
    @endif

    <!-- Required vendors -->
    <script src="{{ asset('backend-assets/vendor/global/global.min.js') }}"></script>
    <script src="{{ asset('backend-assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('backend-assets/js/custom.min.js') }}"></script>
    <script src="{{ asset('backend-assets/js/dlabnav-init.js') }}"></script>

    <!-- Chart sparkline plugin files -->
    <script src="{{ asset('backend-assets/vendor/jquery-sparkline/jquery.sparkline.min.js') }}"></script>
    <script src="{{ asset('backend-assets/js/plugins-init/sparkline-init.js') }}"></script>

    <!-- Chart Morris plugin files -->
    <script src="{{ asset('backend-assets/vendor/raphael/raphael.min.js') }}"></script>
    <script src="{{ asset('backend-assets/vendor/morris/morris.min.js') }}"></script>

    <!-- Init file -->
    <script src="{{ asset('backend-assets/js/plugins-init/widgets-script-init.js') }}"></script>

    <!-- Demo scripts -->
    <script src="{{ asset('backend-assets/js/dashboard/dashboard.js') }}"></script>

    <!-- Summernote -->
    <script src="{{ asset('backend-assets/vendor/summernote/js/summernote.min.js') }}"></script>
    <!-- Summernote init -->
    <script src="{{ asset('backend-assets/js/plugins-init/summernote-init.js') }}"></script>

    <!-- Svganimation scripts -->
    <script src="{{ asset('backend-assets/vendor/svganimation/vivus.min.js') }}"></script>
    <script src="{{ asset('backend-assets/vendor/svganimation/svg.animation.js') }}"></script>
    <script src="{{ asset('backend-assets/js/styleSwitcher.js') }}"></script>

    <!-- Datatable -->
    <script src="{{ asset('backend-assets/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('backend-assets/js/plugins-init/datatables.init.js') }}"></script>
    <!-- JS Toastify -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    {{-- trix editor --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.js"></script>
    {{-- @if (session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Toastify({
                    text: "{{ session('success') }}",
                    duration: 3000,
                    close: true,
                    gravity: "top",
                    position: "right",
                    backgroundColor: "#10B981",
                }).showToast();
            });
        </script>
    @endif
    @if (session('error'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Toastify({
                    text: "{{ session('error') }}",
                    duration: 3000,
                    close: true,
                    gravity: "top",
                    position: "right",
                    backgroundColor: "#EF4444",
                }).showToast();
            });
        </script>
    @endif --}}
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

    @if (session('success'))
        <script>
            toastr.success("{{ session('success') }}");
        </script>
    @endif
    @if (session('error'))
        <script>
            toastr.error("{{ session('error') }}");
        </script>
    @endif
    @stack('script')

</body>

</html>
