<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="icon" href="{{ asset('assets/image/sepeda.png') }}" type="image/png">
    <style>
        .bg-custom-color {
            background-color: #135D66 !important;
        }
    </style>
    <title>KAYUH</title>
</head>

<body>
    <div class="container-fluid p-0" style="overflow: hidden">
        <div class="row">
            <div class="col-12"
                style="min-height: 100%;overflow : hidden; z-index : 10; position :relative;background-color:#003C43">
                {{-- <div class="d-flex justify-content-between align-items-center py-1">
                    <img src="{{ asset('assets/image/sepeda.png') }}" alt="" style="width:250px;height:60px">
                </div> --}}
                <h1 class="text-light ps-4">DASHBOARD</h1>
                <a class="mr-4 mt-3" style="color: black; position:fixed ;right:0;top:0" href="#"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fa-solid fa-door-open text-light pe-4">Logout</i>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </div>
        <div class="row p-0 m-0">
            <div class="col-2 ">

                <nav id="sidebar" class="sidebar p-0"
                    style="position: fixed; top: 0; bottom: 0; overflow-y: auto; height: 100%; z-index: 1; border-right: 1px solid black; width: 15vw">
                    <div class="sidebar-sticky">
                        <ul class="nav flex-column" style="color : rgb(74, 72, 72) !important">
                            <li class="nav-item">
                                <i class="fa-solid fa-house mr-2"></i>Dashboard
                                </a>
                            </li>
                            <span class="mt-5">Master-Data</span>
                            <li class="nav-item">
                                <a class="py-2 pb-0 m-0 d-flex nav-link {{ Request::routeIs('produks.index') ? 'active bg-custom-color' : 'text-dark' }}"
                                    href="{{ route('produks.index') }}" style="color : #DBE7C9 !important">
                                    <i class="fa-solid fa-box pt-1" style="color: #003C43"></i>
                                    <p class="px-2 py-0 mb-2 " style="color: #9c9c9c">Produk</p>
                                </a>
                            </li>
                            <span>Transaksi</span>
                            <li class="nav-item">
                                <a class="py-2 pb-0 m-0 d-flex nav-link {{ Request::routeIs('penjualans.index') ? 'active bg-custom-color' : 'text-dark' }}"
                                    href="{{ route('penjualans.index') }}" style="color : #DBE7C9 !important">
                                    <i class="fa-solid fa-box pt-1" style="color:#003C43"></i>
                                    <p class="px-2 py-0 mb-2 " style="color: #9c9c9c">Pemesanan</p>
                                </a>
                            </li>
                            <span>Laporan</span>
                            <li class="nav-item">
                                <a class="py-2 pb-0 m-0 d-flex nav-link {{ Request::routeIs('penjualans.laporan') ? 'active bg-custom-color' : 'text-dark' }}"
                                    href="{{ route('penjualans.laporan') }}" style="color : #DBE7C9 !important">
                                    <i class="fa-solid fa-box pt-1" style="color:#003C43"></i>
                                    <p class="px-2 py-0 mb-2 " style="color: #9c9c9c">Laporan Penjualan</p>
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
            <div class="col-10">
                <main role="main " style="overflow-y: auto;">
                    @yield('content')
                </main>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/e94cdb9596.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
</body>

</html>
