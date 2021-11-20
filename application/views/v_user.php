<div class="col-md-12">
    <div class="card card-primary shadow-none">
        <div class="card-header">
            <h3 class="card-title">User Data</h3>

            <div class="card-tools">
                <button data-toggle="modal" data-target="#add" type="button" class="btn btn-primary btn-xm">
                    <i class="fas fa-plus"></i>
                    Add </button>
            </div>
            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <?php
            if ($this->session->flashdata('Great')) {
                echo '  <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-check"></i>';
                echo $this->session->flashdata('Great');
                echo '</h5></div>';
            }

            ?>
            <table class="table table-bordered" id="example1">
                <thead class="text-center">

                    <tr>
                        <th>NO</th>
                        <th>User Name </th>
                        <th>username</th>
                        <th> password</th>
                        <th>level </th>
                        <th>Action </th>
                    </tr>

                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($user as $key => $value) { ?>
                        <tr>
                            <td class="text-center"><?= $no++; ?></td>
                            <td class="text-center"><?= $value->user_name ?></td>
                            <td class="text-center"><?= $value->username ?></td>
                            <td class="text-center"><?= $value->password ?></td>
                            <td><?php
                                if ($value->level_user == 1) {
                                    echo '<span class="badge bg-primary">Admin</span>';
                                } else {
                                    echo '<span class="badge bg-success">User</span>';
                                }

                                ?></td>
                            <td class="text-center">
                                <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit<?= $value->id_user ?>"><i class="fas fa-edit"></i></button>
                                <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete<?= $value->id_user ?>"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>

<!-- /.modal-add -->
<div class="modal fade" id="add">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add User</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php
                echo form_open('user/add');
                ?>

                <div class="form-group">
                    <label>User Name</label>
                    <input type="text" name="user_name" class="form-control" placeholder="user name" required>
                </div>

                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" placeholder="username" required>
                </div>

                <div class="form-group">
                    <label>password</label>
                    <input type="text" name="password" class="form-control" placeholder="Password" required>
                </div>
                <div class="form-group">
                    <label>level_user</label>
                    <select name="level_user" class="form-control">
                        <option value="1" selected>Admin </option>
                        <option value="2">User </option>
                    </select>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
            <?php
            echo form_close();
            ?>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!-- /.modal-edit -->
<?php foreach ($user as $key => $value) { ?>

    <div class="modal fade" id="edit<?= $value->id_user ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit User</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php
                    echo form_open('user/edit/' . $value->id_user);
                    ?>

                    <div class="form-group">
                        <label>User Name</label>
                        <input type="text" name="user_name" value="<?= $value->user_name ?>" class="form-control" placeholder="user name" required>
                    </div>

                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" value="<?= $value->username ?>" class="form-control" placeholder="username" required>
                    </div>

                    <div class="form-group">
                        <label>password</label>
                        <input type="text" name="password" value="<?= $value->password ?>" class="form-control" placeholder="Password" required>
                    </div>
                    <div class="form-group">
                        <label>level_user</label>
                        <select name="level_user" class="form-control">
                            <option value="1" <?php if ($value->level_user == 1) {
                                                    echo 'selected';
                                                } ?>>Admin </option>
                            <option value="2" <?php if ($value->level_user == 2) {
                                                    echo 'selected';
                                                } ?>>User </option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
                <?php
                echo form_close();
                ?>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<?php } ?>

<!-- /.modal-delete -->
<?php foreach ($user as $key => $value) { ?>

    <div class="modal fade" id="delete<?= $value->id_user ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Delete <?= $value->user_name ?> Data</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h5> Do You Want To Delete This Data ..?</h5>


                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Back</button>
                    <a href="<?= base_url('user/delete/' . $value->id_user) ?>" class="btn btn-danger">Delete</a>
                </div>


            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<?php } ?>