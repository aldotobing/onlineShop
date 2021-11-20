 <div class="col-md-12">
     <div class="card card-primary">
         <div class="card-header">
             <h3 class="card-title">Form Goods Add</h3>
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
                echo form_open_multipart('goods/add') ?>
             <div class="form-group">
                 <label>Goods Name</label>
                 <input name="name_goods" class="form-control" placeholder="goods name ..." value="<?= set_value('name_goods') ?>">
             </div>
             <div class="row">
                 <div class="col-sm-3">
                     <div class="form-group">
                         <label>Category</label>
                         <select name="id_category" class="form-control">
                             <option value="">--choose Category--</option>
                             <?php foreach ($category as $key => $value) { ?>
                                 <option value="<?= $value->id_category ?>"><?= $value->name_category ?></option>
                             <?php } ?>
                         </select>
                     </div>
                     <!-- text input -->
                 </div>
                 <div class="col-sm-3">
                     <div class="form-group">
                         <label>Price</label>
                         <input name="price" class="form-control" placeholder="price ..." value="<?= set_value('price') ?>">
                     </div>
                 </div>
                 <div class="col-sm-3">
                     <div class="form-group">
                         <label>Discount (%0)</label>
                         <input type="number" name="discount" min="0" max="100" class="form-control" placeholder="discount ..." value="<?= set_value('discount') ?>">
                     </div>
                 </div>
                 <div class="col-sm-3">
                     <div class="form-group">
                         <label>Weight (GR)</label>
                         <input type="number" name="weight" min="0" class="form-control" placeholder="weight in one gram ..." value="<?= set_value('weight') ?>">
                     </div>
                 </div>
                 <div class="col-sm-12">
                     <div class="form-group">
                         <label>Description</label>
                         <textarea name="description" class="form-control" placeholder="Doods Description ..." rows="5" <?= set_value('description') ?>></textarea>
                     </div>
                 </div>
                 <hr>
                 <div class="row">
                     <div class="col-sm-6">
                         <div class="form-group">
                             <label> Picture</label>
                             <input type="file" name="picture" class="form-control" id="preview_picture" required>
                         </div>
                     </div>
                     <div class="col-sm-6">
                         <div class="form-group">
                             <img src="<?= base_url('assets/picture/nofoto.png') ?>" id="picture_load" width="250px"></img>

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