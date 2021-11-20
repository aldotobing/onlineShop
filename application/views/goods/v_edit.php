<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Form Goods Edit</h3>
        </div>
        <div class="card-body">
            <?php
            echo validation_errors(' <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-info"></i>', '</h5></div>');
            if (isset($error_upload)) {
                echo '<div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-info"></i>' . $error_upload . '</h5></div>';
            }
            echo form_open_multipart('goods/edit/' . $goods->id_goods) ?>
            <div class="form-group">
                <label>Goods Name</label>
                <input name="name_goods" class="form-control" placeholder="goods name ..." value="<?= $goods->name_goods ?>">
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Category</label>
                        <select name="id_category" class="form-control">
                            <option value="<?= $goods->id_category ?>"><?= $goods->name_category ?></option>
                            <?php foreach ($category as $key => $value) { ?>
                                <option value="<?= $value->id_category ?>"><?= $value->name_category ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <!-- text input -->
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Price</label>
                        <input name="price" class="form-control" placeholder="price ..." value="<?= $goods->price ?>">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Discount (%0)</label>
                        <input type="number" name="discount" min="0" max="100" class="form-control" placeholder="discount ..." value="<?= $goods->discount ?>">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Weight (GR)</label>
                        <input type="number" name="weight" min="0" class="form-control" placeholder="weight in one gram ..." value="<?= $goods->weight ?>">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label>Description</label>
                <input name="description" class="form-control" rows="5" placeholder="Doods Description ..." value="<?= $goods->description ?>">
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Picture Picture</label>
                        <input type="file" name="picture" class="form-control" id="preview_picture">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <img src="<?= base_url('assets/picture/' . $goods->picture) ?>" id="picture_load" width="250px"></img>

                    </div>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-sm">Save</button>
                <a href="<?= base_url('goods') ?>" class="btn btn-success btn-sm">Back</a>
            </div>

            <?php echo form_close() ?>
        </div>
    </div>
</div>
<script>
    function readpicture(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#picture_load').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#preview_picture").change(function() {
        readpicture(this);
    });
</script>
<!-- <script>
    $("#preview_picture").change(function() {
        if (this.files && this.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#picture_load').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        }
    });
</script> -->