<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Askbootstrap">
    <meta name="author" content="Askbootstrap">
    <title>Profile Picture - VocaMusic</title>
    <!-- Favicon Icon -->
    <link rel="icon" type="image/png" href="img/favicon.png">
    <!-- Bootstrap core CSS-->
    <link rel="icon" type="image/png" href="{{asset('img/favicon.png')}}">
    <!-- Bootstrap core CSS-->
    <link href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="{{asset("vendor/fontawesome-free/css/all.min.css")}}" rel="stylesheet" type="text/css">
    <!-- Custom styles for this template-->
    <link href="{{asset("css/osahan.css")}}" rel="stylesheet">
    <link href="{{asset("css/loader.css")}}" rel="stylesheet">
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="{{asset("vendor/owl-carousel/owl.carousel.css")}}">
    <link rel="stylesheet" href="{{asset("vendor/owl-carousel/owl.theme.css")}}">
    <link rel="stylesheet" href="https://unpkg.com/aksfileupload@1.0.0/dist/aksFileUpload.min.css">
    <style>
        #aks-file-upload {
            width: 310px;
            display: block;
            margin: 0 auto;
        }
        #uploadfile{
            width: 80%;
            margin: 0 auto;
            color: #002c7b;
            line-height:1.5;
            margin-top: 2rem;
            margin-bottom: 2rem;
        }

    </style>
</head>
<body id="page-top">
@include("layouts.top-head")
<div id="wrapper">
@include("account.account_sidebar")
<!-- Sidebar -->
    <div id="content-wrapper">
        <div class="container-fluid upload-details">
            <form action="" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-12">
                        <div class="main-title">
                            <h6>Updating Avatar</h6>
                        </div>
                    </div>

                    <div class="col-lg-10">
                        <div id="aks-file-upload"></div>

                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-lg-12">

                        <div class="osahan-area text-center mt-3">
                            <input class="btn btn-outline-primary" type="submit">
                        </div>
                        <hr>
                        <div class="terms text-center">
                            <p class="hidden-xs mb-0">Click submit to change the avatar</p>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.container-fluid -->
        <!-- Sticky Footer -->
        @include('layouts.footer')
    </div>
    <!-- /.content-wrapper -->

    <!-- /#wrapper -->
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="{{route('logout')}}">Logout</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap core JavaScript-->



    @include('layouts.jsloading');
    <script src="https://unpkg.com/aksfileupload@1.0.0/dist/aksFileUpload.min.js"></script>
    <script>
        $(function () {
            $("#aks-file-upload").aksFileUpload({
                fileUpload: "#uploadfile",
                // File Format
                fileType: ["pdf", "docx", "rtf", "jpg", "jpeg", "png", "mp4"],
                // File Format
                /* (default) - [ "pdf", "docx", "rtf", "jpg", "jpeg", "png", "txt", "mpa", "ogg", "aif", "cda", "mid", "midi", "mp3", "wav", "wma", "wpl", "7z", "arj", "deb", "pkg", "rar", "rpm", "tar.gz", "z", "zip", "csv", "dat", "db", "dbf", "log", "mdb", "sav", "sql", "tar", "xml", "apk", "exe", "jar", "py", "fnt", "fon", "otf", "ttf", "ai", "bmp", "gif", "ico", "jpeg", "jpg", "png", "ps", "psd", "svg", "tif", "tiff", "asp", "aspx", "css", "htm", "html", "js", "jsp", "php", "rss", "pps", "ppt", "pptx", "avi", "flv", "mov", "mp4", "mpg", "mpeg", "vob", "wmv", "doc", "rtf", "eps", "opus", "aep", "fig", "sketch" ] */
                multiple: true,
                maxSize: "1 GB",
            });
        });
    </script>
</body>

</html>
