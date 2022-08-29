<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--Stylesheet-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" integrity="sha384-tKLJeE1ALTUwtXlaGjJYM3sejfssWdAaWR2s97axw4xkiAdMzQjtOjgcyw0Y50KU" crossorigin="anonymous">
    <link rel="stylesheet" href="{{URL::asset('assets/css/responsiveness.css')}}">
    <link rel="stylesheet" href="{{URL::asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="bootstrap-icons/bootstrap-icons.css">
    <!--Fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <!--Webpage title & Favicon-->
    <link rel="shortcut icon" href="{{URL::asset('assets/images/favicon.png')}}" type="image/x-icon">
    <title>{{config('app.name')}} - Login</title>
    <!--Scripts-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>
        body {
            background-color: #f3f6ff;
        }
    </style>
</head>

<body>
    <section class="auth-section">
        <div class="container">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-5 form-area">
                    <div class="col-lg-12 text-center header-form">
                        <a href="/">
                            <img src="{{URL::asset('assets/images/logo.png')}}" alt="LBS Logo">
                        </a>
                        <h4>Login to your account</h4>
                        <p>Don't have an account? <a href="#">Contact Administrator</a></p>
                    </div>
                    <div class="line-rule">
                        @includeIf('layouts.error_template')
                    </div>
                    <form method="POST" action="{{ route('member.login') }}">
                        @csrf
                        <div class="row">
                            <!--Membership ID-->
                            <div class="col-lg-12 py-3">
                                <label for="membership_id">Membership ID</label>
                                <input type="text" class="input @error('membership_id') is-invalid @enderror" placeholder="Enter membership id" name="membership_id" value="{{ old('membership_id') }}" required autocomplete="membership_id" autofocus>
                                @error('membership_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <input name="password" value="Password" hidden>
                            <!--login button-->
                            <div class="col-lg-12 py-3">
                                <input type="submit" class="submit" value="Login">
                            </div>
                            <!--Forgot password-->
                        </div>
                    </form>
                </div>
                <div class="col-md-5 img-bg-area">
                    <h2>Mastermind Better <br> Succeed Together</h2>
                    <p>LBS has become the first institution in West Africa to be accredited by the Association to Advance Collegiate Schools of Business.</p>
                </div>
                <div class="col-md-1"></div>
            </div>
        </div>
    </section>
</body>

</html>