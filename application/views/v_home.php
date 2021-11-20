<div id="carouselExampleIndicators" class="carousel slider" data_ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100" src="<?php echo base_url('assets/slider/slider1.jpg.jpg'); ?>" alt="First slide">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="<?php echo base_url('assets/slider/slider2.jpg.jpg'); ?>" alt="Second slide">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="<?php echo base_url('assets/slider/slider3.jpg.jpg'); ?>" alt="Third slide">
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-custom-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-custom-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
</div>
</div>

<div class="card card-solid">
    <div class="card-body pb-0">
        <div class="row">
            <?php foreach ($goods as $key => $value) { ?>
                <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column text-center">
                    <?php
                    echo form_open('shopping/add');
                    echo form_hidden('id', $value->id_goods);
                    echo form_hidden('qty', 1);
                    echo form_hidden('price', $value->price);
                    echo form_hidden('name', $value->name_goods);
                    echo form_hidden(
                        'redirect_page',
                        str_replace('index.php/', '', current_url())
                    );

                    //CHECK IF THE VALUE OF DISCOUNT IS NULL, SO IT SET TO DEFAULT VALUE OF 0 (ZERO)
                    //TO AVOID ERROR MULTIPLICATION OF NULL VALUE
                    if ($value->discount == null) {
                        $value->discount = 0;
                    }
                    // var_dump($value->discount);

                    //CHECK IF THERE IS A DISCOUNT AMOUNT IN EACH ITEM
                    if ($value->discount <= 0 || $value->discount == null) {
                        //IF RESULT IS 0 OR HAS A NULL VALUE (NO DISCOUNT), THEN FINAL PRICE = VALUE REAL PRICE (AS IN DATABASE), NO CHANGES
                        $final_price = $value->price;
                    } else {
                        //CALCULATE THE AMOUNT OF DISCOUNT
                        $disc_value = $value->price * ($value->discount / 100);
                        //IF RESULT IS GREATER THAN 0 THAT MEANS IT HAS A DISCOUNT VALUE, CALCULATE THE FINAL PRICE TO GET THE PRICE AFER DISCOUNT
                        //SO IT WILL BE REAL PRICE - AMOUNT OF DISCOUNT ABOVE
                        $final_price = ($value->price - $disc_value);
                    }

                    ?> <div class="card bg-light d-flex flex-fill">
                        <div class="card-head">
                            <!-- SHOW DISCOUNT BADGE ONLY IN ITEM WITH DISCOUNT -->
                            <?php if ($value->discount > 0) { ?>
                                <?php echo '<div class="text-left">' ?>
                                <h4> <span class="badge bg-warning"> <?= $value->discount ?> <?php echo '% OFF'  ?>
                                    </span></h4> <?php echo '</div>' ?>
                            <?php } else { ?>
                                <?php echo '<div class="text-left">' ?>
                                <h4> <span class="badge"> </span></h4> <?php echo '</div>' ?>
                            <?php } ?>
                            <!-- END BAGDE -->
                        </div>
                        <div class="card-header text-muted border-bottom-0">
                            <h2 class="lead"><b><?= $value->name_goods ?></b></h2>
                            <p class="text-muted text-sm"><b>Category : </b> <?= $value->name_category ?> </p>
                        </div>
                        <div class="card-body pt-0">
                            <div class="row">
                                <div class="col-12 text-center">
                                    <img src="<?= base_url('assets/picture/' . $value->picture) ?>" width="250px" height="250px" max-width="100%" max-height="auto">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="text-left">
                                        <!-- CALL THE FINAL PRICE FROM ABOVE -->
                                        <h4> <span class="badge bg-primary">Rp. <?= number_format($final_price, 0) ?> </span>
                                            <?php
                                            //CHECK IF THERE IS A DISCOUNT, IF IT GREATER THAN 0 (HAS A DISCOUNT)
                                            //THEN ADD THE STRIKETHROUGH TEXT OF REAL PRICE (BEFORE DISCOUNT) BELOW THE FINAL PRICE
                                            if ($value->discount > 0) {
                                            ?>
                                                <?php echo  '&nbsp; <del> <p class = "small"> Rp.' ?> <?= number_format($value->price, 0) ?> <?php echo '</p></del>' ?>
                                            <?php } else { ?>
                                                <?php echo  '&nbsp; <p class = "small">' ?>&nbsp;<?php echo '</p>' ?>
                                            <?php } ?>
                                        </h4>
                                        <!-- ----------------------------------------------------------------------------------------- -->
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="text-right">
                                        <a href="<?= base_url('home/detail_goods/' . $value->id_goods) ?>" class="btn btn-sm btn-success">
                                            <i class="fas fa-eye"></i>
                                        </a>

                                        <button type="submit" class="btn btn-sm btn-primary swalDefaultSuccess">
                                            <i class="fas fa-cart-plus"> Add</i>
                                        </button>
                                    </div>
                                </div>
                                <?php echo form_close(); ?>
                            </div>
                        </div>
                    </div>
                </div>

            <?php } ?>
            <!-- SweetAlert2 -->
            <script src="<?= base_url() ?>template/plugins/sweetalert2/sweetalert2.min.js"></script>
            <script>
                $(function() {
                    var Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000
                    });
                    $('.swalDefaultSuccess').click(function() {
                        Toast.fire({
                            icon: 'success',
                            title: 'Items Added to Shopping Basket.'
                        })
                    });
                });
            </script>