<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Askbootstrap">
    <meta name="author" content="Askbootstrap">
    <title>VocaMusic - Register</title>
    <!-- Favicon Icon -->
    <link rel="icon" type="image/png" href="img/favicon.png">
    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <!-- Custom styles for this template-->
    <link href="css/osahan.css" rel="stylesheet">
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="vendor/owl-carousel/owl.carousel.css">
    <link rel="stylesheet" href="vendor/owl-carousel/owl.theme.css">
</head>
<body class="login-main-body">
<section class="login-main-wrapper">
    <div class="container-fluid pl-0 pr-0">
        <div class="row no-gutters">
            <div class="col-md-5 p-5 bg-white full-height">
                <div class="login-main-left">
                    <div class="text-center mb-5 login-main-left-header pt-4">
                        <img src="img/favicon.png" class="img-fluid" alt="LOGO">
                        <h5 class="mt-3 mb-3">Welcome to VocaMusic</h5>
                        <p>A world where Vocaloid and Utaite will touch your heart.</p>
                    </div>
                    <form action="" method="post">
                        @csrf
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" placeholder="Enter email" name="email" value="{{old("email")}}">
                            <span class="text-danger">@error("email") {{$message}} @enderror</span>
                        </div>
                        <div class="form-group">
                            <label>Display name</label>
                            <input type="text" class="form-control" placeholder="Enter display name" name="name" value="{{old("name")}}">
                            <span class="text-danger">@error("name") {{$message}} @enderror</span>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" placeholder="Password" name="password">
                            <span class="text-danger">@error("password") {{$message}} @enderror</span>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" placeholder="Re-type Password" name="re-password">
                            <span class="text-danger">@error("re-password") {{$message}} @enderror</span>
                        </div>
                        <div class="mt-4">
                            <div class="row">
                                <div class="col-12">
                                    <button type="submit" class="btn btn-outline-primary btn-block btn-lg">Sign Up</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="text-center mt-5">
                        <p class="light-gray">Already Have Account? <a href="{{route('login')}}">Sign In</a></p>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="login-main-right bg-white p-5 mt-5 mb-5">
                    <div class="owl-carousel owl-carousel-login">
                        <div class="item">
                            <div class="carousel-login-card text-center">
                                <img src="img/login.png" class="img-fluid" alt="LOGO">
                                <h5 class="mt-5 mb-3">Completely Open-source</h5>
                                <p class="mb-4">Here, we want to create a wonderful world  <br> where everything can be shared. <br></p>
                            </div>
                        </div>
                        <div class="item">
                            <div class="carousel-login-card text-center">
                                <img src="img/video.png" class="img-fluid" alt="LOGO" width="264px">
                                <h5 class="mt-5 mb-3">Download video directly</h5>
                                <p class="mb-4">Not blob video anymore.<br> All video contents here can be downloaded <br>with any downloader.</p>
                            </div>
                        </div>
                        <div class="item">
                            <div class="carousel-login-card text-center">
                                <img src="https://image.flaticon.com/icons/png/512/564/564793.png" class="img-fluid" alt="LOGO" width="264px">
                                <h5 class="mt-5 mb-3">Easy to Upload.</h5>
                                <p class="mb-4">Just fill in your form and upload.<br> Your video will be removed <br> if it contains inappropriate thing.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
<!-- Owl Carousel -->
<script src="vendor/owl-carousel/owl.carousel.js"></script>
<!-- Custom scripts for all pages-->
<script src="js/custom.js"></script>
</body>

</html>
