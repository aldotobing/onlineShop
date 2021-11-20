<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Goods Data</h3>

            <div class="card-tools">
                <a href="<?= base_url('goods/add') ?>" type="button" class="btn btn-primary btn-sm">
                    <i class="fas fa-plus"></i>
                    Add </a>
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
                        <th>Goods Name </th>
                        <th>Category</th>
                        <th>price</th>
                        <th>Picture </th>
                        <th>Action </th>
                    </tr>

                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($goods as $key => $value) { ?>
                        <tr>
                            <td class="text-center"><?= $no++; ?></td>
                            <td class="text-center"><?= $value->name_goods ?><br> Weight: <?= $value->weight ?> Gr</td>
                            <td class="text-center"><?= $value->name_category ?></td>
                            <td class="text-center">Rp. <?= number_format($value->price, 0) ?> <br> Discount: <?= $value->discount ?> %</td>
                            <td><img src="<?= base_url('assets/picture/' . $value->picture) ?>" width="150px"></td>
                            <td class="text-center">
                                <a href="<?= base_url('goods/edit/' . $value->id_goods) ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete<?= $value->id_goods ?>"><i class="fas fa-trash"></i></button>
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
<!-- /.modal-delete -->
<?php foreach ($goods as $key => $value) { ?>

    <div class="modal fade" id="delete<?= $value->id_goods ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Delete <?= $value->name_goods ?> </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h5> Do You Want To Delete <?= $value->name_goods ?> ..?</h5>


                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Back</button>
                    <a href="<?= base_url('goods/delete/' . $value->id_goods) ?>" class="btn btn-danger">Delete</a>
                </div>


            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<?php } ?>