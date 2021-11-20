<div class="row">
    <div class="col-sm-4"></div>
    <div class="col-sm-4">
        <div class="login-box">
            <!-- /.login-logo -->
            <div class="card card-outline card-primary">
                <div class="card-body">
                    <p class="login-box-msg">login </p>

                    <?php
                    echo validation_errors('<div class="alert alert-warning alert-dismissible">
                     <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                     <h5><i class="icon fas fa-exclamation-triangle"></i> Alert!</h5>', '</div>');

                    if ($this->session->flashdata('Great')) {
                        echo '  <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
                        echo $this->session->flashdata('Great');
                        echo '</div>';
                    }
                    if ($this->session->flashdata('error')) {
                        echo '  <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';

                        echo $this->session->flashdata('error');
                        echo '</div>';
                    }


                    echo form_open('customer/login');  ?>

                    <div class="input-group mb-3">
                        <input type="email" name="email" value="<?= set_value('email') ?>" class="form-control" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password" value="<?= set_value('password') ?>" class=" form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <!-- <div class="col-8">
                                <div class="icheck-primary">
                                    <input type="checkbox" id="remember">
                                    <label for="remember">
                                        Remember Me
                                    </label>
                                </div>
                            </div> -->
                        <!-- /.col -->
                        <div class="col-12">
                            <button type="submit" class="btn btn-success btn-block">Login</button>
                        </div>


                        <!-- /.col -->
                    </div>
                    <?php echo form_close() ?>
                    <hr>
                    <a href="<?= base_url('customer/register') ?>" class="text-center">I Don't Have Account ...</a>
                    <!-- /.social-auth-links -->


                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
    <div class="col-sm-4"></div>
</div>