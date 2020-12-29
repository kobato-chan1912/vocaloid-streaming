<!DOCTYPE html>
<html lang="en">

@include("layouts.header", ["title" => 'admin - edit video'])
<body id="page-top">
@include('layouts.top-head')
<div id="wrapper">
    <!-- Sidebar -->
    @include('admin.sidebar')

    <div id="content-wrapper">
        <div class="container-fluid upload-details">
            <form action="" method="post">
                @csrf
                <div class="row">
                    <div class="col-lg-12">
                        <div class="main-title">
                            <h6>Video Edtior</h6>
                        </div>
                    </div>

                </div>
                <hr>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="osahan-form">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="e1">Video Title</label>
                                        <input type="text" name="title" placeholder="Type video title here. Recommend in a clear way." id="e1" class="form-control" value="{{$data[0]->title}}">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="e2">About</label>
                                        <textarea rows="3" id="e2" name="e2" class="form-control" value="">{{$data[0]->description}}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="e3">Categories</label>
                                        <select id="e3" class="custom-select" onchange="getvalue()" name="cate">
                                            <option value="-1" disabled selected>Select Categories</option>
                                            @foreach($categories as $category)
                                                <option value = "{{$category->id}}">{{$category->name}}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="e4">Artist/Detail</label>
                                        <select id="e4" class="custom-select" name="cate_detail">

                                        </select>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <div class="osahan-area text-center mt-3">
                            <input class="btn btn-outline-primary" type="submit">
                        </div>
                        <hr>
                        <div class="terms text-center">
                            <p class="mb-0">There are many variations of passages of Lorem Ipsum available, but the majority <a href="#">Terms of Service</a> and <a href="#">Community Guidelines</a>.</p>
                            <p class="hidden-xs mb-0">Ipsum is therefore always free from repetition, injected humour, or non</p>
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
</div>
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
<script src="https://unpkg.com/aksfileupload@1.0.0/dist/aksFileUpload.min.js"></script>
<script>

</script>
<script>
    function getvalue() {
        d = document.getElementById("e3").value;

        $.ajax({
            url: 'http://localhost:8888/vocaloid/public/get_categories/cate_id=' + d,
            type: 'GET',
        }).done(function (response) {
            // alertify.success('Đã thêm vào giỏ hàng!');
            $("#e4").html(response);
        });
    }
</script>
</body>


</html>
