<!DOCTYPE html>
<html lang="en">

@include("layouts.header", ["title" => "Change Password - VocaMusic"])
<body id="page-top">
@include("layouts.top-head")
<div id="wrapper">
    <!-- Sidebar -->
    @include("account.account_sidebar")
    <div id="content-wrapper">
        <div class="container-fluid upload-details">
            <div class="row">
                <div class="col-lg-12">
                    <div class="main-title">
                        <h6>Settings</h6>
                    </div>
                </div>
            </div>
            <form>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="control-label">Email <span class="required">*</span></label>
                            <input class="form-control border-form-control" value="" placeholder="Gurdeep" type="text">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="control-label">Display Name <span class="required">*</span></label>
                            <input class="form-control border-form-control" value="" placeholder="Osahan" type="text">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="control-label">Password <span class="required">*</span></label>
                            <input class="form-control border-form-control" value="" placeholder="123 456 7890" type="number">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="control-label">Re-type Password <span class="required">*</span></label>
                            <input class="form-control border-form-control " value="" placeholder="iamosahan@gmail.com" disabled="" type="email">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12 text-right">
                        <button type="button" class="btn btn-success border-none"> Save Changes </button>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.container-fluid -->
        <!-- Sticky Footer -->
        @include("layouts.footer")
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
                <a class="btn btn-primary" href="login.html">Logout</a>
            </div>
        </div>
    </div>
</div>
<!-- Bootstrap core JavaScript-->
@include("layouts.jsloading")
</body>

</html>
