<div class="row">
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
                        <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true">Order</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill" href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false">Processed</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-four-messages-tab" data-toggle="pill" href="#custom-tabs-four-messages" role="tab" aria-controls="custom-tabs-four-messages" aria-selected="false">Sent</a>
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
                            <!-- order -->
                            <tr>
                                <th>No.Order</th>
                                <th>Date</th>
                                <th>Expedition</th>
                                <th>Total Payment</th>
                                <th>Action</th>
                            </tr>
                            <?php foreach ($not_payment as $key => $value) { ?>
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
                                        <?php if ($value->status_payment == 0) { ?>
                                            <a href="<?= base_url('my_order/payment/' . $value->id_transfer) ?>" class="btn btn-xs btn-flat btn-primary">Payment</a>
                                        <?php  } ?>

                                    </td>
                                </tr>
                            <?php  } ?>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
                        <table class="table">
                            <!-- proses -->
                            <tr>
                                <th>No.Order</th>
                                <th>Date</th>
                                <th>Expedition</th>
                                <th>Total Payment</th>
                            </tr>
                            <?php foreach ($proses as $key => $value) { ?>
                                <tr>
                                    <td><?= $value->no_order ?></td>
                                    <td><?= $value->tgl_order ?></td>
                                    <td>
                                        <b> <?= $value->expedition ?></b> <br>
                                        Package: <?= $value->package ?> <br>
                                        Shipping: <?= $value->ongkir ?> <br>
                                    </td>
                                    <td> <b>Rp. <?= number_format($value->total_payment, 0) ?> </b> <br>
                                        <span class="badge badge-success">Verification</span><br>
                                        <span class="badge badge-primary">Processed</span>
                                    </td>
                                </tr>
                            <?php  } ?>
                        </table>
                    </div>

                    <div class="tab-pane fade" id="custom-tabs-four-messages" role="tabpanel" aria-labelledby="custom-tabs-four-messages-tab">
                        <table class="table">
                            <!--send -->
                            <tr>
                                <th>No.Order</th>
                                <th>Date</th>
                                <th>Expedition</th>
                                <th>Total Payment</th>
                                <th>Resi No.</th>
                            </tr>
                            <?php foreach ($send as $key => $value) { ?>
                                <tr>
                                    <td><?= $value->no_order ?></td>
                                    <td><?= $value->tgl_order ?></td>
                                    <td>
                                        <b> <?= $value->expedition ?></b> <br>
                                        Package: <?= $value->package ?> <br>
                                        Shipping: <?= $value->ongkir ?> <br>
                                    </td>
                                    <td>
                                        <b>Rp. <?= number_format($value->total_payment, 0) ?></b><br>
                                        <span class="badge badge-success">Send</span><br>
                                    </td>
                                    <td>
                                        <h5><?= $value->no_resi ?> <br>
                                            <button class="btn btn-xs btn-primary btn-flat" data-toggle="modal" data-target="#accept<?= $value->id_transfer ?>">Accept</button>
                                        </h5>
                                    </td>
                                </tr>
                            <?php  } ?>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="custom-tabs-four-settings" role="tabpanel" aria-labelledby="custom-tabs-four-settings-tab">
                        <table class="table">
                            <!--finshed -->
                            <tr>
                                <th>No.Order</th>
                                <th>Date</th>
                                <th>Expedition</th>
                                <th>Total Payment</th>
                                <th>Resi No.</th>
                            </tr>
                            <?php foreach ($finshed as $key => $value) { ?>
                                <tr>
                                    <td><?= $value->no_order ?></td>
                                    <td><?= $value->tgl_order ?></td>
                                    <td>
                                        <b> <?= $value->expedition ?></b> <br>
                                        Package: <?= $value->package ?> <br>
                                        Shipping: <?= $value->ongkir ?> <br>
                                    </td>
                                    <td>
                                        <b>Rp. <?= number_format($value->total_payment, 0) ?></b><br>
                                        <span class="badge badge-success">Finshed</span><br>
                                    </td>
                                    <td>
                                        <h5><?= $value->no_resi ?> <br>

                                        </h5>
                                    </td>
                                </tr>
                            <?php  } ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php foreach ($send as $key => $value) { ?>
    <div class="modal fade" id="accept<?= $value->id_transfer ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Accept Order</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are You Sure Your Order Have Sent ...?</p>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">NO</button>
                    <a href="<?= base_url('my_order/accept/' . $value->id_transfer) ?>" class="btn btn-success">YES</a>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
<?php  } ?>