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
                        <div class="text-danger">
                            @error("display_name")
                                {{$message}}
                            @enderror
                            @error("old_password")
                            {{$message}}
                            @enderror
                            @error("new_password")
                            {{$message}}
                            @enderror
                            @error("renew_password")
                            {{$message}}
                            @enderror
                            @if(isset($alert))
                                {{$alert}}
                                @endif

                        </div>
                    </div>
                </div>
            </div>
            <form action="" method="post">
                @csrf
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="control-label">Email <span class="required">*</span></label>
                            <input class="form-control border-form-control" value="{{session("LoggedUser")->email}}"  type="text" disabled>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="control-label">Display Name <span class="required">*</span></label>
                            <input class="form-control border-form-control" value="{{session("LoggedUser")->name}}" placeholder="Osahan" type="text" name="display_name">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="control-label">Old Passwrod <span class="required">*</span></label>
                            <input class="form-control border-form-control" placeholder="Enter the current password." type="password" name="old_password">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="control-label">Password <span class="required">*</span></label>
                            <input class="form-control border-form-control" value="" placeholder="Enter new password." type="password" name="new_password">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="control-label">Re-type Password <span class="required">*</span></label>
                            <input class="form-control border-form-control " value="" placeholder="Enter new password." type="password" name="renew_password">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12 text-right">
                        <button type="submit" class="btn btn-success border-none"> Save Changes </button>
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
