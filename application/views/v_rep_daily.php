<div class="col-12">
    <!-- Main content -->
    <div class="invoice p-3 mb-3">
        <!-- title row -->
        <div class="row">
            <div class="col-12">
                <h4>
                    <i class="fas fa-shopping-cart"></i> <?= $title ?>
                    <small class="float-right">Date: <?= $date ?>/<?= $month ?>/<?= $year ?></small>
                </h4>
            </div>
            <!-- /.col -->
        </div>
        <!-- info row -->
        <!-- /.row -->

        <!-- Table row -->
        <div class="row">
            <div class="col-12 table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>No.Order</th>
                            <th>Goods Name</th>
                            <th>Price</th>
                            <th>Qty</th>
                            <th>Total Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        $grand_total = 0;
                        foreach ($report as $key => $value) {
                            $total_price = $value->qty * $value->price;
                            $grand_total = $grand_total +  $total_price;
                        ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $value->no_order ?></td>
                                <td><?= $value->name_goods ?></td>
                                <td>Rp. <?= number_format($value->price, 0) ?></td>
                                <td><?= $value->qty ?></td>
                                <td>Rp. <?= number_format($total_price, 0) ?></td>
                            </tr>
                        <?php  } ?>
                    </tbody>
                </table>
                <h3> Grand Total : Rp. <?= number_format($grand_total, 0) ?></h3>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->


        <!-- /.row -->

        <!-- this row will not appear when printing -->
        <div class="row no-print">
            <div class="col-12">
                <button class="btn btn-default" onclick=" window.print()"><i class="fas fa-print"></i> Print</button>
            </div>
        </div>
    </div>
    <!-- /.invoice -->
</div><!-- /.col -->
</div><!-- /.row -->
</div><!-- /.container-fluid -->