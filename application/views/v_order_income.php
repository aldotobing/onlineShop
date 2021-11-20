<div class=" col-sm-12">
    <?php
    if ($this->session->flashdata('Great')) {
        echo '  <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-check"></i>';
        echo $this->session->flashdata('Great');
        echo '</h5></div>';
    } ?>
    <div class="card card-primary card-outline card-outline-tabs">
        <div class="card-header p-0 border-bottom-0">
            <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true">Incoming Order</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill" href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false">Processed</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-four-messages-tab" data-toggle="pill" href="#custom-tabs-four-messages" role="tab" aria-controls="custom-tabs-four-messages" aria-selected="false">Send</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-four-settings-tab" data-toggle="pill" href="#custom-tabs-four-settings" role="tab" aria-controls="custom-tabs-four-settings" aria-selected="false">Finshed</a>
                </li>
            </ul>
        </div>
        <div class="card-body">
            <div class="tab-content" id="custom-tabs-four-tabContent">
                <div class="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                    <table class="table">
                        <tr>
                            <th>No.Order</th>
                            <th>Date</th>
                            <th>Expedition</th>
                            <th>Total Payment</th>
                            <th></th>
                        </tr>
                        <?php foreach ($order as $key => $value) { ?>
                            <tr>
                                <td><?= $value->no_order ?></td>
                                <td><?= $value->tgl_order ?></td>
                                <td>
                                    <b> <?= $value->expedition ?></b> <br>
                                    Package: <?= $value->package ?> <br>
                                    Shipping: <?= $value->ongkir ?> <br>
                                </td>
                                <td> <b>Rp. <?= number_format($value->total_payment, 0) ?> </b> <br>
                                    <?php if ($value->status_payment == 0) { ?>
                                        <span class="badge badge-warning">not payment</span>
                                    <?php } else { ?>
                                        <span class="badge badge-success">payment successfully</span><br>
                                        <span class="badge badge-primary">Waiting For Verification</span>
                                    <?php  } ?>
                                </td>
                                <td>
                                    <?php if ($value->status_payment == 1) { ?>
                                        <button class="btn btn-sm btn-dark btn-flat" data-toggle="modal" data-target="#check<?= $value->id_transfer ?>">Check Payment Proof</button>
                                        <a href="<?= base_url('admin/proses/' . $value->id_transfer) ?>" class="btn btn-sm btn-flat btn-primary">Proses</a>
                                    <?php  } ?>
                                </td>
                            </tr>
                        <?php  } ?>
                    </table>
                </div>
                <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
                    <table class="table">
                        <tr>
                            <th>No.Order</th>
                            <th>Date</th>
                            <th>Expedition</th>
                            <th>Total Payment</th>
                            <th></th>
                        </tr>
                        <?php foreach ($order_proses as $key => $value) { ?>
                            <tr>
                                <td><?= $value->no_order ?></td>
                                <td><?= $value->tgl_order ?></td>
                                <td>
                                    <b> <?= $value->expedition ?></b> <br>
                                    Package: <?= $value->package ?> <br>
                                    Shipping: <?= $value->ongkir ?> <br>
                                </td>
                                <td> <b>Rp. <?= number_format($value->total_payment, 0) ?> </b> <br>

                                    <span class="badge badge-primary">Processed</span>

                                </td>
                                <td>
                                    <?php if ($value->status_payment == 1) { ?>

                                        <button class="btn btn-xs btn-flat btn-primary" data-toggle="modal" data-target="#send<?=
                                                                                                                                $value->id_transfer ?>"><i class="fa fa-paper-plane"></i> Sent</button>
                                    <?php  } ?>
                                </td>
                            </tr>
                        <?php  } ?>
                    </table>
                </div>
                <div class="tab-pane fade" id="custom-tabs-four-messages" role="tabpanel" aria-labelledby="custom-tabs-four-messages-tab">
                    <table class="table">
                        <tr>
                            <th>No.Order</th>
                            <th>Date</th>
                            <th>Expedition</th>
                            <th>Total Payment</th>
                            <th>Resi No.</th>
                        </tr>
                        <?php foreach ($order_send as $key => $value) { ?>
                            <tr>
                                <td><?= $value->no_order ?></td>
                                <td><?= $value->tgl_order ?></td>
                                <td>
                                    <b><?= $value->expedition ?></b> <br>
                                    Package: <?= $value->package ?> <br>
                                    Shipping: <?= $value->ongkir ?> <br>
                                </td>
                                <td> <b>Rp. <?= number_format($value->total_payment, 0) ?> </b> <br>

                                    <span class="badge badge-success">Sent</span>

                                </td>
                                <td>
                                    <h3><?= $value->no_resi ?></h3>
                                </td>
                            </tr>
                        <?php  } ?>
                    </table>
                </div>
                <div class="tab-pane fade" id="custom-tabs-four-settings" role="tabpanel" aria-labelledby="custom-tabs-four-settings-tab">
                    <table class="table">
                        <tr>
                            <th>No.Order</th>
                            <th>Date</th>
                            <th>Expedition</th>
                            <th>Total Payment</th>
                            <th>Resi No.</th>
                        </tr>
                        <?php foreach ($order_finshed as $key => $value) { ?>
                            <tr>
                                <td><?= $value->no_order ?></td>
                                <td><?= $value->tgl_order ?></td>
                                <td>
                                    <b><?= $value->expedition ?></b> <br>
                                    Package: <?= $value->package ?> <br>
                                    Shipping: <?= $value->ongkir ?> <br>
                                </td>
                                <td> <b>Rp. <?= number_format($value->total_payment, 0) ?> </b> <br>

                                    <span class="badge badge-success">Accpet</span>

                                </td>
                                <td>
                                    <h3><?= $value->no_resi ?></h3>
                                </td>
                            </tr>
                        <?php  } ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php foreach ($order as $key => $value) { ?>


    <!-- /. modle check payment -->
    <div class="modal fade" id="check<?= $value->id_transfer ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><?= $value->no_order ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table">
                        <tr>
                            <th>Bank Name</th>
                            <th>:</th>
                            <td><?= $value->name_bank ?></td>
                        </tr>
                        <tr>
                            <th>Account No.</th>
                            <th>:</th>
                            <td><?= $value->no_rek ?></td>
                        </tr>
                        <tr>
                            <th>Atas Name</th>
                            <th>:</th>
                            <td><?= $value->atas_name ?></td>
                        </tr>
                        <tr>
                            <th>Total Payment</th>
                            <th>:</th>
                            <td>Rp. <?= number_format($value->total_payment, 0) ?></td>
                        </tr>
                    </table>
                    <img class="img-fluid pad" src="<?= base_url('assets/bukti_payment/' . $value->bukti_payment) ?>" alt="">

                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
<?php } ?>


<?php foreach ($order_proses as $key => $value) { ?>
    <div class="modal fade" id="send<?= $value->id_transfer ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><?= $value->no_order ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php echo form_open('admin/send/' . $value->id_transfer) ?>
                    <table class="table">
                        <tr>
                            <td>Expedition</td>
                            <th>:</th>
                            <th><?= $value->expedition ?></th>
                        </tr>
                        <tr>
                            <td>Package</td>
                            <th>:</th>
                            <th><?= $value->package ?></th>
                        </tr>
                        <tr>
                            <td>Shipping</td>
                            <th>:</th>
                            <th>Rp. <?= number_format($value->ongkir, 0) ?></th>
                        </tr>
                        <tr>
                            <td>Resi No.</td>
                            <th>:</th>
                            <th><input name="no_resi" class="form-control" placeholder="resi number" required> </th>
                        </tr>


                    </table>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Send</button>
                </div>
                <?php echo form_close() ?>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
<?php } ?>