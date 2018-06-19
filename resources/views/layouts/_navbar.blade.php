<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav-content"
            aria-controls="nav-content" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Brand -->
    <a href="#"><h1 class="navbar-brand" href="#">فروشگاه اینترنتی</h1></a>

    <!-- Links -->
    <div class="collapse navbar-collapse justify-content-end" id="nav-content">
        <ul class="navbar-nav">
            <li class="nav-item">
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#login">
                    ورود به ناحیه کاربری<i class="fa fa-sign-in fa-right"></i>
                </button>
            </li>
            <!-- Modal -->
            <div class="modal fade" id="login">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">ورود به داشبورد</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="mobile">شماره تلفن</label>
                                    <input type="text" class="form-control ltr" id="mobile" aria-describedby="mobileHelp" placeholder="09">
                                    <small id="mobileHelp" class="form-text text-muted">شماره تلفن خود را وارد کنید.</small>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success btn-block">ورود</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
            <!-- /Modal -->
        </ul>
    </div>
</nav>