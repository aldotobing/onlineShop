<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Website Setting</h3>
        </div>
        <div class="card-body">
            <?php
            if ($this->session->flashdata('Great')) {
                echo '  <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-check"></i>';
                echo $this->session->flashdata('Great');
                echo '</h5></div>';
            }
            echo form_open('admin/setting'); ?>

            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Province</label>
                        <select name="province" class="form-control"></select>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label> City</label>
                        <select name="city" class="form-control">
                            <option value="<?= $setting->location ?>"><?= $setting->location ?></option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Name Store</label>
                        <input type="text" name="name_store" class="form-control" value="<?= $setting->name_store ?>" required>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>No.Telpon</label>
                        <input type="text" name="no_telepon" class="form-control" value="<?= $setting->no_telepon ?>" required>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label> Store Address</label>
                <input type="text" name="address_store" class="form-control" value="<?= $setting->address_store ?>" required>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-sm">Save</button>
                <a href="<?= base_url('admin') ?>" class="btn btn-success btn-sm">Back</a>
            </div>

            <?php echo
            form_close();
            ?>

        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $.ajax({
            type: "POST",
            url: "<?= base_url('rajaongkir/province') ?>",
            success: function(hasil_province) {

                $("select[name=province]").html(hasil_province);
            }

        });

        $("select[name=province]").on("change", function() {
            var id_province_selected = $("option:selected", this).attr("id_province");
            $.ajax({

                type: "POST",
                url: "<?= base_url('rajaongkir/city') ?>",
                data: 'id_province=' + id_province_selected,
                success: function(hasil_city) {
                    console.log(hasil_city);
                    $("select[name=city]").html(hasil_city);
                }
            });
        });
    });
</script>