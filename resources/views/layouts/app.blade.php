<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link rel="shortcut icon" type="image/png" href="images/logos/logo1.png" />
    <link rel="stylesheet" href="css/styles.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <!-- Sidebar Start -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div>
                <div class="brand-logo d-flex align-items-center justify-content-center mt-2">
                    <a href="/dashboard" class="text-nowrap logo-img " id="logo">
                        <img src="images/logos/logo-k.png" alt="" />
                        {{-- <h2><span>D-</span>Surat</h2> --}}
                    </a>
                    <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                        <i class="ti ti-x fs-8"></i>
                    </div>
                </div>
                <div class="py-1 px-6 text-center">
                    <h5>KOPKAR<br> Mitra Energi Sejahtera</h5>
                </div>

                <!-- Sidebar navigation-->
                <x-navbar></x-navbar>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!--  Sidebar End -->
        <!--  Main wrapper -->
        <div class="body-wrapper">
            <!--  Header Start -->
            <header class="app-header">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <ul class="navbar-nav">
                        <li class="nav-item d-block d-xl-none">
                            <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse"
                                href="javascript:void(0)">
                                <i class="ti ti-menu-2"></i>
                            </a>
                        </li>
                    </ul>
                    <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
                        <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
                            <li class="nav-item dropdown">
                                <a class="nav-link nav-icon d-flex align-items-center gap-2" href="javascript:void(0)"
                                    id="drop2" data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="images/profile/user-3.jpg" alt="" width="40" height="40"
                                        class="rounded-circle">
                                    <!-- Menampilkan nama pengguna -->
                                    <div class="flex flex-col text-left">
                                        <!-- Menampilkan nama pengguna -->
                                        <h6 class="text-base font-semibold m-0">{{ Auth::user()->name ?? 'Guest' }}</h6>
                                        <!-- Menampilkan role pengguna -->
                                        <h6 class="text-sm text-gray-500">{{ Auth::user()->role ?? 'No Role' }}</h6>
                                    </div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up text-center"
                                    aria-labelledby="drop2">
                                    <div class="message-body">
                                        <!-- Link Profilku -->
                                        <a href="javascript:void(0)"
                                            class="d-flex align-items-center justify-center gap-2 dropdown-item">
                                            <i class="ti ti-user fs-6"></i>
                                            <p class="mb-0 fs-3">Profilku</p>
                                        </a>
                                        <!-- Tombol Logout -->
                                        <form action="{{ route('logout') }}" method="POST" class="mt-3">
                                            @csrf
                                            <button type="submit"
                                                class="btn btn-outline-primary w-full">Logout</button>
                                        </form>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>

                </nav>
            </header>
            <!--  Header End -->
            <div class="container-fluid">
                @yield('content')

                <x-footer></x-footer>
            </div>
        </div>
    </div>
    <script src="libs/jquery/dist/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="libs/apexcharts/dist/apexcharts.min.js"></script>
    <script src="libs/simplebar/dist/simplebar.js"></script>
    <script src="js/sidebarmenu.js"></script>
    <script src="js/app.min.js"></script>
    <script src="js/dashboard.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>

</body>

</html>
