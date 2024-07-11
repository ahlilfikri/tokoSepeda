<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <style>
        .bg-custom-color {
            background-color: #5AB2FF;
        }
    </style>
</head>
<body class="d-flex align-items-center justify-content-center" style="min-height: 100vh;background:#5AB2FF">
    <div class="col-lg-5">
        <div class="card shadow-lg" style="border: none; border-radius: 3vw;">
            <div class="card-header">
                <h1 class="card-title text-center py-3" style="color:#5AB2FF">Welcome</h1>
            </div>
            <div class="card-body">
                @if(Session::has('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ Session::get('error') }}
                    </div>
                @endif
                <form action="{{ route('register') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama:</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Input your name here" required>
                        @if ($errors->has('name'))
                            <div class="text-danger">
                                {{ $errors->first('name') }}
                            </div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Alamat Email:</label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="Input your email here" required>
                        @if ($errors->has('email'))
                            <div class="text-danger">
                                {{ $errors->first('email') }}
                            </div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password:</label>
                        <input type="password" name="password" class="form-control" id="password" required>
                        @if ($errors->has('password'))
                            <div class="text-danger">
                                {{ $errors->first('password') }}
                            </div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Confirm Password:</label>
                        <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" required>
                        @if ($errors->has('password_confirmation'))
                            <div class="text-danger">
                                {{ $errors->first('password_confirmation') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="kode">Daftar Sebagai:</label>
                        <select id="kode" name="kode" class="form-control" required>
                            <option value="">---Pilih Role---</option>
                            <option value="buyer">Pembeli</option>
                            <option value="seller">Penjual</option>
                        </select>
                        @if ($errors->has('kode'))
                            <div class="text-danger">
                                {{ $errors->first('kode') }}
                            </div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <div class="d-grid">
                            <button class="btn btn-primary bg-custom-color text-light">Register</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>
