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
    <title>{{config('app.name')}} - Register</title>
    <!--Scripts-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>
        body {
            background-color: #f3f6ff;
        }
    </style>
</head>

<body>
    <section class="auth-section auth-section-signup">
        <div class="container">
            <div class="row">
                <div class="col-md-6 form-area">
                    <div class="col-lg-12 text-center header-form">
                        <a href="/">
                            <img src="{{URL::asset('assets/images/logo.png')}}" alt="LBS Logo">
                        </a>
                        <h4>Let's Get You Started</h4>
                        <p>Already have an account? <a href="/login">Login</a></p>
                    </div>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="row">
                            <!--Fullname-->
                            <div class="col-lg-12 py-3">
                                <label for="fullname">Your Full Name</label>
                                <input type="text" class="input @error('name') is-invalid @enderror" placeholder="Enter your fullname" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <!--Email-->
                            <div class="col-lg-12 py-3">
                                <label for="email">Email</label>
                                <input type="email" class="input" placeholder="Enter email address" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <!--Telephone Number-->
                            <div class="col-lg-12 py-3">
                                <label for="telephone number">Telephone Number</label>
                                <input type="tel" class="input" placeholder="Enter telephone number" name="phone_number" value="{{ old('phone_number') }}" required autocomplete="phone_number" autofocus>
                                @error('phone_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <!--Address-->
                            <div class="col-lg-12 py-3">
                                <label for="address">Address</label>
                                <textarea cols="30" rows="2" class="input" placeholder="Enter your home address" name="address" value="{{ old('address') }}" required autocomplete="address" autofocus></textarea>
                                @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <!--Password-->
                            <div class="col-lg-12 py-3">
                                <label for="password">Password</label>
                                <input type="password" class="input" placeholder="*********" name="password" value="{{ old('password') }}" required autocomplete="password" autofocus>
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <!--Confirm Password-->
                            <div class="col-lg-12 py-3">
                                <label for="coonfirm password">Confirm Password</label>
                                <input type="password" class="input" placeholder="Re-type your password" name="password_confirmation" required autocomplete="new-password">
                            </div>
                            <!--login button-->
                            <div class="col-lg-12 py-3">
                                <input type="submit" class="submit" value="Sign Up">
                            </div>
                            <!--Forgot password-->
                            <div class="col-lg-12 py-3 text-center forgotten">
                                <p>By signing up, you agree to our <a href="/terms_conditions">Terms & Conditions</a> and <a href="/privacy">Privacy Policy.</a></p>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-6 img-bg-area img-bg-area-signup">
                    <h2>Mastermind Better <br> Succeed Together</h2>
                    <p>LBS has become the first institution in West Africa to be accredited by the Association to Advance Collegiate Schools of Business.</p>
                </div>
            </div>
        </div>
    </section>
</body>

</html>