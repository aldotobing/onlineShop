<div class="col-md-12">
    <div class="card card-primary shadow-none">
        <div class="card-header">
            <h3 class="card-title">Category Data</h3>

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
                        <th> category Name </th>

                        <th>Action </th>
                    </tr>

                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($category as $key => $value) { ?>
                        <tr>
                            <td class="text-center"><?= $no++; ?></td>
                            <td class="text-center"><?= $value->name_category ?></td>
                            <td class="text-center">
                                <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit<?= $value->id_category ?>"><i class="fas fa-edit"></i></button>
                                <button class="btn btn-danger btn-sm" data-toggle="modal" 
                                data-target="#delete<?= $value->id_category ?>"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <!-- /.modal-add -->
        <div class="modal fade" id="add">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Add category</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <?php
                        echo form_open('category/add');
                        ?>

                        <div class="form-group">
                            <label>Category Name</label>
                            <input type="text" name="name_category" class="form-control" placeholder="Category Name" required>
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
        <?php foreach ($category as $key => $value) { ?>

            <div class="modal fade" id="edit<?= $value->id_category ?>">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Edit category</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <?php
                            echo form_open('category/edit/' . $value->id_category);
                            ?>

                            <div class="form-group">
                                <label>Category Name</label>
                                <input type="text" name="name_category" value="<?= $value->name_category ?>" class="form-control" placeholder="Category Name" required>
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
        <?php foreach ($category as $key => $value) { ?>

            <div class="modal fade" id="delete<?= $value->id_category ?>">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Delete <?= $value->name_category ?> </h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <h5> Do You Want To Delete <?= $value->name_category ?> ..?</h5>


                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Back</button>
                            <a href="<?= base_url('category/delete/' . $value->id_category) ?>" class="btn btn-danger">Delete</a>
                        </div>


                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
        <?php } ?>