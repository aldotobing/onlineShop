<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Goods Picture Data</h3>

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
                        <th>Goods Name </th>
                        <th>Cover</th>
                        <th> Total</th>
                        <th>Action </th>

                    </tr>

                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($picturegoods as $key => $value) { ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $value->name_goods ?></td>
                            <td class="text-center"><img src="<?= base_url('assets/picture/' . $value->picture) ?>" width="100px"></td>
                            <td class="text-center"><span class="badge bg-primary">
                                    <h5><?= $value->total_picture ?></h5>
                                </span>
                            </td>
                            <td class="text-center">
                                <a href="<?= base_url('picturegoods/add/' . $value->id_goods) ?>" class="btn btn-success btn-sm"><i class="fas fa-plus"></i> Add Pic</a>

                            </td>
                        </tr>
                    <?php  } ?>

                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>