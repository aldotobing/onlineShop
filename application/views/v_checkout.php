 <!-- Main content -->
 <div class="invoice p-3 mb-3">
     <!-- title row -->
     <div class="row">
         <div class="col-12">
             <h4>
                 <i class="fas fa-shopping-cart"></i> Check Out
                 <small class="float-right">Date: <?= date('d-m-Y') ?></small>
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
                         <th>Qty</th>
                         <th width="120px" class="text-center">Price </th>
                         <th>Goods</th>
                         <th class="text-center">Total</th>
                         <th class="text-center">Weight</th>
                     </tr>
                 </thead>
                 <tbody>
                     <?php $i = 1;


                        $total_weight = 0;
                        foreach ($this->cart->contents() as $items) {
                            $goods =  $this->m_home->detail_goods($items['id']);
                            $weight = $items['qty'] * $goods->weight;
                            $total_weight =   $total_weight + $weight;
                        ?>
                         <tr>
                             <td><?php echo  $items['qty']; ?></td>
                             <td class="text-center">Rp. <?php echo  number_format($items['price'], 0); ?></td>
                             <td><?php echo $items['name']; ?></td>
                             <td class="text-center">Rp. <?php echo  number_format($items['subtotal'], 0); ?></td>
                             <td class="text-center"> <?= $weight ?> Gr</td>
                         </tr>
                     <?php } ?>
                 </tbody>
             </table>
         </div>
         <!-- /.col -->
     </div>
     <!-- /.row -->
     <?php
        echo validation_errors(' <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>', '</div>');
        ?>
     <?php
        echo form_open('shopping/checkout');
        $no_order = date('Ymd') . strtoupper(random_string('alnum', 8));

        ?>
     <div class="row">
         <div class="col-sm-8 invoice-col">
             Purpose :
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
                         <select name="city" class="form-control"></select>
                     </div>
                 </div>
                 <div class="col-sm-6">
                     <div class="form-group">
                         <label>Expedition</label>
                         <select name="expedition" class="form-control"></select>
                     </div>
                 </div>
                 <div class="col-sm-6">
                     <div class="form-group">
                         <label>Package</label>
                         <select name="package" class="form-control"></select>
                     </div>
                 </div>
                 <div class="col-sm-8">
                     <div class="form-group">
                         <label>Address</label>
                         <input name="address" class="form-control" required></input>
                     </div>
                 </div>
                 <div class="col-sm-4">
                     <div class="form-group">
                         <label>Code pos</label>
                         <input name="code_pos" class="form-control" required></input>
                     </div>
                 </div>
                 <div class="col-sm-6">
                     <div class="form-group">
                         <label>Penerima</label>
                         <input name="name_penerima" class="form-control" required></input>
                     </div>
                 </div>
                 <div class="col-sm-6">
                     <div class="form-group">
                         <label>HP Penerima</label>
                         <input name="hp_penerima" class="form-control" required></input>
                     </div>
                 </div>
             </div>
         </div>
         <!-- /.col -->
         <div class="col-4">
             <div class="table-responsive">
                 <table class="table">
                     <tr>
                         <th style="width:50%">Grand Total:</th>
                         <th><?php echo number_format($this->cart->total(), 0); ?></th>
                     </tr>
                     <tr>
                         <th>Weight:</th>
                         <th> <?= $total_weight ?> Gr</th>
                     </tr>
                     <tr>
                         <th>Shipping: </th>
                         <th><label id="ongkir"></label> </th>
                     </tr>
                     <tr>
                         <th>Total Payment:</th>
                         <th><label id="total_payment"></label></th>
                     </tr>
                 </table>
             </div>
         </div>
         <!-- /.col -->
     </div>
     <!-- /.row -->
     <!-- sampi transfer -->
     <input name="no_order" value="<?= $no_order ?>" hidden>
     <input name="estimasi" hidden>
     <input name="ongkir" hidden>
     <input name="weight" value=" <?= $total_weight ?> Gr" hidden><br>
     <input name="grand_total" value="<?php echo $this->cart->total(); ?>" hidden>
     <input name="total_payment" hidden>

     <!-- sampi rinci transfer -->
     <?php
        $i = 1;
        foreach ($this->cart->contents() as $items) {
            echo form_hidden('qty' . $i++, $items['qty']);
        }
        ?>
     <hr>
     <!-- this row will not appear when printing -->
     <div class="row no-print">
         <div class="col-12">
             <a href="<?= base_url('shopping') ?>" class="btn btn-warning"><i class="fas fa-backward"></i>Back To Basket</a>
             <button type="submit" class="btn btn-primary float-right" style="margin-right: 5px;">
                 <i class="fas fa-shopping-cart"></i> Check Out Proses
             </button>
         </div>
     </div>
     <?php form_close() ?>
 </div>
 <!-- /.invoice -->


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
             var data_province = $("option:selected", this).attr("id_province");
             $.ajax({

                 type: "POST",
                 url: "<?= base_url('rajaongkir/city') ?>",
                 data: 'id_province=' + data_province,
                 success: function(hasil_city) {
                     $("select[name=city]").html(hasil_city);
                 }
             });
         });

         $("select[name=city]").on("change", function() {
             var data_city = $("option:selected", this).attr("id_city");

             $.ajax({

                 type: "POST",
                 url: "<?= base_url('rajaongkir/expedition') ?>",
                 data: 'city_id=' + data_city,
                 success: function(hasil_expedition) {

                     $("select[name=expedition]").html(hasil_expedition);
                 }

             });
         });
         //data package
         $("select[name=expedition]").on("change", function() {
             var expedition_selected = $("select[name=expedition]").val();
             var id_city_purpose_selected = $("option:selected", "select[name=city]").attr('id_city');
             var total_weight = <?= $total_weight ?>;



             $.ajax({
                 type: "POST",
                 url: "<?= base_url('rajaongkir/package') ?>",
                 data: 'expedition=' + expedition_selected + '&id_city=' + id_city_purpose_selected + '&weight=' + total_weight,
                 success: function(hasil_package) {

                     $("select[name=package]").html(hasil_package);
                 }
             });

         });



         $("select[name=package]").on("change", function() {
             var dataongkir = $("option:selected", this).attr('ongkir');
             var reverse = dataongkir.toString().split('').reverse().join('');
             ribuan_ongkir = reverse.match(/\d{1,3}/g);
             ribuan_ongkir = ribuan_ongkir.join(',').split('').reverse().join('');
             $("#ongkir").html("Rp. " + ribuan_ongkir);

             //  total_payment
             var data_total_payment = parseInt(dataongkir) + parseInt(<?= $this->cart->total() ?>);
             var reverse2 = data_total_payment.toString().split('').reverse().join('');
             ribuan_total_payment = reverse2.match(/\d{1,3}/g);
             ribuan_total_payment = ribuan_total_payment.join(',').split('').reverse().join('');
             $("#total_payment").html("Rp." + ribuan_total_payment);
             //estimasi and ongkir 
             var estimasi = $("option:selected", this).attr('estimasi');
             $("input[name=estimasi]").val(estimasi);
             $("input[name=ongkir]").val(dataongkir);
             $("input[name=total_payment]").val(data_total_payment);


         });


     });
 </script>