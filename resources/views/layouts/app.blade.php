<!DOCTYPE html>

<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Responsive HTML Admin Dashboard Template based on Bootstrap 5">
    {{-- <meta name="author" content="NobleUI">
    <meta name="keywords"
        content="nobleui, bootstrap, bootstrap 5, bootstrap5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web"> --}}

    <title>@yield('template_title') | {{ config('app.name') }}</title>

    <!-- Fonts -->
    {{-- <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> --}}
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <!-- End fonts -->

    <!-- core:css -->
    <link rel="stylesheet" href="{{ asset('admin/assets/vendors/core/core.css') }}">
    <!-- endinject -->

    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('admin/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/vendors/datatables.net-bs5/dataTables.bootstrap5.css') }}">
    <!-- End plugin css for this page -->

    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/fonts/feather-font/css/iconfont.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">
    <!-- endinject -->

    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/demo1/style.css') }}">
    <!-- End layout styles -->

    <link rel="shortcut icon" href="{{ asset('admin/assets/images/favicon.ico') }}" />
    <link rel="stylesheet" href="{{ asset('plugins/light-box/lightbox.css') }}">
    <style>

    </style>
    @yield('css')
    @livewireStyles
</head>

<body>
    <div class="main-wrapper">

        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar">
            <div class="sidebar-header">
                <a href="#" class="sidebar-brand">
                    {{-- <img src="{{ asset('admin/assets/images/favicon.png') }}" style="width: 25px"> --}}
                    <small>SOFT</small> <span>{{ config('app.name') }}</span>
                </a>
                <div class="sidebar-toggler not-active">
                    <span style="background-color: #000865"></span>
                    <span style="background-color: #000865"></span>
                    <span style="background-color: #000865"></span>
                </div>
            </div>
            @include('layouts.partials.sidebar')
        </nav>

        <!-- partial -->

        <div class="page-wrapper">

            <!-- partial:partials/_navbar.html -->
            @include('layouts.partials.user-menu')
            <!-- partial -->

            <div class="page-content">
                @yield('content')
                {{-- <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
                    <div>
                        <h4 class="mb-3 mb-md-0">Welcome to Dashboard</h4>
                    </div> --}}
                {{-- <div class="d-flex align-items-center flex-wrap text-nowrap">
                        <div class="input-group date datepicker wd-200 me-2 mb-2 mb-md-0" id="dashboardDate">
                            <span class="input-group-text input-group-addon bg-transparent border-primary"><i
                                    data-feather="calendar" class=" text-primary"></i></span>
                            <input type="text" class="form-control border-primary bg-transparent">
                        </div>
                        <button type="button" class="btn btn-outline-primary btn-icon-text me-2 mb-2 mb-md-0">
                            <i class="btn-icon-prepend" data-feather="printer"></i>
                            Print
                        </button>
                        <button type="button" class="btn btn-primary btn-icon-text mb-2 mb-md-0">
                            <i class="btn-icon-prepend" data-feather="download-cloud"></i>
                            Download Report
                        </button>
                    </div> --}}
                {{-- </div> --}}

                {{-- <div class="row">
                    <div class="col-12 col-xl-12 stretch-card">
                        <div class="row flex-grow-1">

                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-baseline">
                                        BIENVENIDO
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div> <!-- row --> --}}
            </div>

            <!-- partial:partials/_footer.html -->
            {{-- <footer
                class="footer d-flex flex-column flex-md-row align-items-center justify-content-between px-4 py-3 border-top small">
                <p class="text-muted mb-1 mb-md-0">Copyright © 2022 <a href="https://www.nobleui.com"
                        target="_blank">NobleUI</a>.</p>
                <p class="text-muted">Handcrafted With <i class="mb-1 text-primary ms-1 icon-sm"
                        data-feather="heart"></i></p>
            </footer> --}}
            <!-- partial -->

        </div>
    </div>

    <!-- core:js -->
    <script src="{{ asset('admin/assets/vendors/core/core.js') }}"></script>
    <!-- endinject -->

    <!-- Plugin js for this page -->
    <script src="{{ asset('admin/assets/vendors/chartjs/Chart.min.js') }}"></script>
    <script src="{{ asset('admin/assets/vendors/jquery.flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('admin/assets/vendors/jquery.flot/jquery.flot.resize.js') }}"></script>
    <script src="{{ asset('admin/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('admin/assets/vendors/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('admin/assets/vendors/datatables.net/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('admin/assets/vendors/datatables.net-bs5/dataTables.bootstrap5.js') }}"></script>
    <!-- End plugin js for this page -->

    <!-- inject:js -->
    <script src="{{ asset('admin/assets/vendors/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/template.js') }}"></script>
    <script src="{{ asset('plugins/fontawesome/js/all.js') }}"></script>
    <!-- endinject -->

    <!-- Custom js for this page -->
    <script src="{{ asset('admin/assets/js/dashboard-light.js') }}"></script>
    <script src="{{ asset('admin/assets/js/datepicker.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- End custom js for this page -->

    <script>
        $(document).ready(() => {
            $('.dataTable').dataTable({
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/es-ES.json',
                },
            });
        })
        $(document).ready(() => {
            $('.dataTableLite').dataTable({
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/es-ES.json',
                },
                "paging": true,
                "ordering": false,
                "info": false
            });
        })
        $(document).ready(() => {
            $('.dataTableD').dataTable({
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/es-ES.json',
                },
                order: [
                    [0, 'desc']
                ]
            });
        })

        $('.delete').submit(function(e) {
            Swal.fire({
                title: "ELIMINAR REGISTRO",
                text: "¿Está seguro de realizar esta operación?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Si, continuar",
                cancelButtonText: "No, cancelar"
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                }
            });
        })

        function preview(elem, output = '') {
            Array.from(elem.files).map((file) => {
                const blobUrl = window.URL.createObjectURL(file)
                output += `<img src=${blobUrl}>`
            })
            elem.nextElementSibling.innerHTML = output
        }
    </script>
    @livewireScripts

    <script>
        Livewire.on('successL', msg => {
            const Toast = Swal.mixin({
                toast: true,
                position: 'bottom-end',
                showConfirmButton: false,
                timer: 1500,
                timerProgressBar: true,
            });

            Toast.fire({
                icon: 'success',
                title: msg
            })
        });
        Livewire.on('errorL', msg => {
            const Toast = Swal.mixin({
                toast: true,
                position: 'bottom-end',
                showConfirmButton: false,
                timer: 1500,
                timerProgressBar: true,
            });

            Toast.fire({
                icon: 'error',
                title: msg
            })
        });

        Livewire.on('successOK', msg =>{
            Swal.fire({
                title: "Excelente!",
                text: msg,
                icon: "success"
            });
        });
        Livewire.on('errorOK', msg =>{
            Swal.fire({
                title: "Error",
                text: msg,
                icon: "error"
            });
        });
    </script>
    @yield('js')


    @if ($message = Session::get('success'))
        <script>
            Swal.fire({
                title: "Excelente!",
                text: "{{ $message }}",
                icon: "success"
            });
        </script>
    @endif

</body>

</html>
