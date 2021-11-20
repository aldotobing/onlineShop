<div class="row">
    <div class="col-sm-6">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">No. Store Account</h3>
            </div>
            <div class="card-body">
                <p>please, Transfar The Money to This Account:
                <h1 class="text-primary">Rp.<?= number_format($order->total_payment, 0) ?>.-</h1>
                </p><br>
                <table class="table">
                    <tr>
                        <th>Bank</th>
                        <th>No.Account</th>
                        <th>Atas Name</th>
                    </tr>
                    <?php foreach ($account as $key => $value) { ?>
                        <tr>
                            <td><?= $value->name_bank ?></td>
                            <td><?= $value->no_rek ?></td>
                            <td><?= $value->atas_name ?></td>
                        </tr>
                    <?php  } ?>

                </table>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Upload Payment Proof</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <?php
            echo form_open_multipart('my_order/payment/' . $order->id_transfer);
            ?>
            <div class="card-body">
                <div class="form-group">
                    <label>Atas Name</label>
                    <input name="atas_name" class="form-control" placeholder="atas name" required>
                </div>
                <div class="form-group">
                    <label>Bank Name</label>
                    <input name="name_bank" class="form-control" placeholder="bank name" required>
                </div>
                <div class="form-group">
                    <label>No. Accuont</label>
                    <input name="no_rek" class="form-control" placeholder="no. accuont" required>
                </div>

                <div class="form-group">
                    <label for="exampleInputFile">Proof Of Payment</label>
                    <input type="file" name="bukti_payment" class="form-control" required>
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="<?= base_url('my_order') ?>" class="btn btn-success">Back</a>
            </div>
            <?php form_close() ?>
        </div>
    </div>
</div>