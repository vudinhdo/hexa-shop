<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8ffff;
        }

        .card {
            border-radius: 5px;
        }
    </style>
</head>

<body>
    @include("error.error")
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card p-4 shadow-lg p-3 mb-5 bg-body-tertiary rounded border-0" style="width: 400px;">
            <h3 class="text-center mb-4"><b>Đăng Nhập</b></h3>
            <form action="{{ route('login.post') }}" method="POST">
                @csrf
                <div class="mb-3 ">
                    <label for="exampleFormControlInput1" class="form-label"><b>Email</b></label>
                    <input type="email" class="form-control" name="email" id="exampleFormControlInput1"
                        placeholder="name@example.com">
                    @error('email')
                        <div style="color:red;">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label"><b>Mật Khẩu</b></label>
                    <input type="password" class="form-control" name="password" id="exampleFormControlInput1"
                        placeholder="@Password123">
                    @error('password')
                        <div style="color:red;">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn w-100 btn-secondary">Login</button>
            </form>

            <div class="mt-3 row g-0 text-center">
                <div class="col-sm-6 col-md-6">
                    <a href="{{ route('register') }}" class="text-black " style="text-decoration: none">Đăng ký</a>
                </div>
                <div class="col-6 col-md-6">
                    <a href="{{ route('forgot.password') }}" class="text-black" style="text-decoration: none">Quên mật khẩu?</a>
                </div>
            </div>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
