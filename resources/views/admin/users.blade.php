<!DOCTYPE html>
<html lang="en">
@include("layouts.header", ["title" => " ADMIN - VocaMusic"])
<body id="page-top">
@include("layouts.top-head")
<div id="wrapper">
@include("admin.sidebar")
<!-- Sidebar -->
    <div id="content-wrapper">
        <div class="container-fluid pb-0">
            <div class="video-block section-padding">
                <div class="row">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">#ID</th>
                            <th scope="col">username</th>
                            <th scope="col">Reset</th>
                            <th scope="col">Remove</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($videos as $video)
                            <tr>
                                <th>{{$video->id}}</th>
                                <td>{{$video->name}}</td>
                                <td><a href="{{route("reset", $video->id)}}">Reset</a></td>
                                <td><a href="{{route('account_remove', $video->id)}}">X</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    @include("layouts.footer")
    <!-- Sticky Footer -->

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

@include("layouts.jsloading")
</body>

</html>
