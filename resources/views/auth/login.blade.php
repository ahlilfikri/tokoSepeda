    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login Page</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <link rel="icon" href="{{ asset('assets/image/sepeda.png') }}" type="image/png">
        <style>
            .bg-custom-color {
                background-color: black;
            }
            /* background: rgb(22,26,48);background: linear-gradient(90deg, rgba(22,26,48,1) 0%, rgba(27,27,105,1) 35%, rgba(22,26,48,1) 100%); */
        </style>
    </head>
    <body class="d-flex align-items-center justify-content-center my-4" style="min-height: 100vh;background:white">
        <div class="col-lg-5">
            <div class="card " style="border: 1px solid black; border-radius: 2vw;">
                <div class="card-header">
                    <h1 class="card-title text-center py-3" style="color:black">Welcome</h1>
                </div>
                <div class="card-body">
                    @if(Session::has('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ Session::get('error') }}
                        </div>
                    @endif
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" id="password" required>
                        </div>
                        <div class="mb-3">
                            <div class="d-grid">
                                <button class="btn btn-outline-dark">Login</button>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="d-grid">
                                <a href="{{ route('dashboard') }}" >Kembali Ke Laman Utama?</a>
                                <a href="{{ route('register') }}" >Belum Punya Akun?</a>
                            </div>
                        </div>
                    </form>                    
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <script src="https://kit.fontawesome.com/e94cdb9596.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    </body>
    </html>
