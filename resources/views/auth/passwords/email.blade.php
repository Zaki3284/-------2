
<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="utf-8">
    <title> استعادة كلمة المرور </title>
    <link rel="icon" href="{{ asset('images/logo.jpeg') }}" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/ForgetPass.css') }}">
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container h-100">
        <div class="d-flex justify-content-center h-100">
            <div class="user_card">
                <div class="d-flex justify-content-center">
                    <div class="brand_logo_container">
                        <img src="{{ asset('images/logo.jpeg') }}"  class="brand_logo" alt="Logo">
                    </div>
                </div>
                <div class="d-flex justify-content-center form_container">
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                            </div>
                            <input type="email" name="email" class="form-control input_user @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="البريد الإلكتروني" required autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="d-flex justify-content-center mt-3 forget_container">
                            <button type="submit" name="button" class="btn forget_btn">استعادة كلمة المرور</button>
                        </div>
                    </form>
                </div>
                <div class="mt-4">
                    <div class="d-flex justify-content-center links">
                        <a href="{{ route('login') }}">تسجيل الدخول</a>
                    </div>
                    <div class="d-flex justify-content-center links">
                        ليس لديك حساب؟ <a href="{{ route('register') }}" class="ml-2">إنشاء حساب</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
