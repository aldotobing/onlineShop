<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Add Goods Picture: <?= $goods->name_goods ?> </h3>

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
            <?php
            echo validation_errors(' <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-info"></i>', '</h5></div>');
            if (isset($error_upload)) {
                echo '<div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-info"></i>' . $error_upload . '</h5></div>';
            }
            echo form_open_multipart('picturegoods/add/' . $goods->id_goods) ?>

            <div class="row">
                <div class="form-group">
                    <label>Ket Picture</label>
                    <input name="ket" class="form-control" placeholder="Ket Picture ..." value="<?= set_value('ket') ?>">
                </div>

                <div class="col-sm-4">
                    <div class="form-group">
                        <label> Picture</label>
                        <input type="file" name="picture" class="form-control" id="preview_picture" required>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <img src="<?= base_url('assets/picture/nofoto.png') ?>" id="picture_load" width="150px"></img>

                    </div>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-sm">Save</button>
                <a href="<?= base_url('picturegoods') ?>" class="btn btn-success btn-sm">Back</a>
            </div>


            <?php echo form_close() ?>


            <hr>
            <div class="row">
                <?php foreach ($picture as $key => $value) { ?>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <img src="<?= base_url('assets/picturegoods/' . $value->picture) ?>" id="picture_load" width="180px" height="190px">

                        </div>
                        <label for="">Ket: <?= $value->ket ?></label>
                        <button data-toggle="modal" data-target="#delete<?= $value->id_picture ?>" class="btn btn-danger btn-xs btn-block"><i class="fas fa-trash"></i> Delete</button>
                    </div>
                <?php }  ?>


            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.modal-delete -->
    <?php foreach ($picture as $key => $value) { ?>

        <div class="modal fade" id="delete<?= $value->id_picture ?>">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Delete <?= $value->ket ?> </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body text-center">
                        <div class="form-group">
                            <img src="<?= base_url('assets/picturegoods/' . $value->picture) ?>" id="picture_load" width="100px" height="110px">

                        </div>
                        <h5> Delete This Picture ..?</h5>


                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Back</button>
                        <a href="<?= base_url('picturegoods/delete/' . $value->id_goods . '/' . $value->id_picture) ?>" class="btn btn-danger">Delete</a>
                    </div>


                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    <?php } ?>
    <script>
        $("#preview_picture").change(function() {
            if (this.files && this.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#picture_load').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            }
        });
    </script>