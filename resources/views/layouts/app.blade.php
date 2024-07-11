<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="icon" href="{{ asset('assets/image/sepeda.png') }}" type="image/png">
    <style>
        .bg-custom-color {
            background-color: #135D66 !important;
        }
    </style>
    <title>TK Turtle</title>
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
            <nav id="sidebar" class="col-5 col-sm-4 col-md-3 col-lg-2 sidebar"
                style="position: fixed; top: 0; bottom: 0; overflow-y: auto; height: 100%; z-index: 1; border-right: 1px solid black">
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
                                <i class="fa-solid fa-box pt-1"></i>
                                <p class="px-2 py-0 mb-2">Produk</p>
                            </a>
                        </li>
                        <span>Transaksi</span>
                        {{-- <li class="nav-item">
                        <a class="nav-link {{ Request::routeIs('pemesanans.index') ? 'active bg-custom-color' : 'text-dark' }}" href="{{ route('pemesanans.index') }}" style="color : #DBE7C9 !important">
                            <i class="fa-solid fa-cart-shopping mr-2"></i>Pemesanan
                        </a>
                    </li> --}}
                        <span>Laporan</span>
                        {{-- <li class="nav-item">
                        <a class="nav-link {{ Request::routeIs('jurnal.laporan') ? 'active bg-custom-color' : 'text-dark' }}" href="{{ route('jurnal.laporan') }}" style="color : #DBE7C9 !important">
                            <i class="fa-solid fa-book mr-2"></i>  Jurnal
                        </a>
                    </li> --}}
                    </ul>
                </div>
            </nav>
            <main role="main" class="col-7 col-sm-8 col-md-9 col-lg-10"
                style="overflow-y: auto; min-height: 100%; position: relative; margin-left:16.6vw">
                @yield('content')
            </main>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://kit.fontawesome.com/e94cdb9596.js" crossorigin="anonymous"></script>
</body>

</html>
