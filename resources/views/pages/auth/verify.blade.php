<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
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
            <h3 class="text-center mb-4"><b>Vui lòng nhập mã gửi về email của bạn</b></h3>
            <form action="/verify-code" method="POST">
                @csrf
                <div class="mb-3 ">
                    <input type="hidden" name="email" value="{{ session('email') }}">

                    <label for="codecode" class="form-label"><b>CODE</b></label>
                    <input type="text" class="form-control" name="code" id="codecode" placeholder="Mã code" required>
                    @error('code')
                        <div style="color:red;">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn w-100 btn-secondary">Xác nhận</button>
            </form>

            <div class="mt-3 row g-0 text-center">
                <a href="{{ route('forgot.password') }}" class="text-black " style="text-decoration: none">Quay lại
                    trang trước</a>
            </div>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
