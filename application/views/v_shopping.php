<div class="card card-solid">
    <div class="card-body pb-0">
        <div class="row">
            <div class="col-sm-12">
                <?php
                if ($this->session->flashdata('Great')) {
                    echo '  <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-check"></i>';
                    echo $this->session->flashdata('Great');
                    echo '</h5></div>';
                }
                ?>
            </div>
            <div class="col-sm-12">
                <?php echo form_open('shopping/update'); ?>

                <table class="table" cellpadding="6" cellspacing="1" style="width:100%">
                    <tr>
                        <th width="100px">QTY</th>
                        <th>Goods Name</th>
                        <th style="text-align:right">Price/Qty</th>
                        <th style="text-align:right">Total Discount</th>
                        <th style="text-align:right">Sub-Total</th>
                        <th style="text-align:center">Weight</th>
                        <th class="text-center">Action</th>
                    </tr>

                    <?php $i = 1; ?>

                    <?php
                    $total_weight = 0;
                    $total_final_price = 0;
                    foreach ($this->cart->contents() as $items) {
                        $goods =  $this->m_home->detail_goods($items['id']);
                        $weight = $items['qty'] * $goods->weight;
                        $total_weight =  $total_weight + $weight;

                        if ($goods->discount == null) {
                            $goods->discount = 0;
                        }
                        //CALCULATE THE AMOUNT OF DISCOUNT
                        //--------------------------------
                        $disc_value = ($items['price'] * ($goods->discount / 100));
                        $disc_price = $disc_value * $items['qty'];
                        $total_afer_discount = ($items['price'] * $items['qty'])  - ($disc_value * $items['qty']);
                        $total_final_price = $total_final_price + $total_afer_discount;
                        //END CALCULATED DISCOUNT
                    ?>
                        <tr>
                            <td><?php echo form_input(array('name' => $i . '[qty]', 'value' => $items['qty'], 'maxlength' => '3', 'min' => '0', 'size' => '5', 'type' => 'number', 'class' => 'form-control')); ?></td>
                            <td>
                                <?php echo $items['name']; ?>
                                <!-- SHOW DISCOUNT BADGE ONLY IN ITEM WITH DISCOUNT -->
                                <?php if ($goods->discount > 0) { ?>
                                    <?php echo '<div class="text-left">' ?>
                                    <h4> <span class="badge bg-warning"> <?= $goods->discount ?><?php echo '% OFF </span></h4>' ?>
                                            <?php echo '</div>' ?>
                                        <?php } ?>
                            </td>
                            <!-- END DISCOUNT BADGE -->
                            <td style="text-align:right">Rp. <?php echo  number_format($items['price'], 0); ?></td>
                            <td style="text-align:right">Rp. <?php echo number_format($disc_price, 0); ?></td>
                            <!-- CALL THE PRICE AFTER DISCOUNT -->
                            <td style="text-align:right">Rp. <?php echo  number_format($total_afer_discount, 0); ?></td>
                            <!-- END SUBTOTAL -->
                            <td class="text-center"> <?= $weight ?> Gr</td>
                            <td class="text-center">
                                <a href="<?= base_url('shopping/delete/' . $items['rowid']) ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php } ?>
                    <tr>
                        <td class="right">
                            <h3>Total : </h3>
                        </td>
                        <td class="right">
                            <h3>Rp. <?php echo number_format($total_final_price, 0);
                                   // var_dump($this->cart->total());
                                    ?></h3>
                        </td>
                        <th>Weight Total : <?= $total_weight ?> Gr</th>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </table>
                <button type="submit" class="btn btn-primary tbn-flat"><i class="fas fa-save"></i> Update Cart</button>
                <a href="<?= base_url('shopping/clear') ?>" class="btn btn-danger tbn-flat"><i class="fa fa-recycle"></i> Clear Cart</a>
                <a href="<?= base_url('shopping/checkout')  ?>" class="btn btn-success tbn-flat"><i class="fa fa-check-square"></i> Check Out</a>
                <?php echo form_close(); ?>
                <hr>
            </div>
        </div>
    </div>
</div>