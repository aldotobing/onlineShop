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
                    echo form_hidden('redirect_page', str_replace('index.php/', '', current_url()));
                    ?>

                    <div class="card bg-light d-flex flex-fill">
                        <div class="card-head">
                            <div class="text-left">
                                <h4> <span class="badge bg-warning"> <?= $value->discount ?> % OFF </span></h4>
                            </div>

                        </div>
                        <div class="card-header text-muted border-bottom-0">
                            <h2 class="lead"><b><?= $value->name_goods ?></b></h2>
                            <p class="text-muted text-sm"><b>Category : </b> <?= $value->name_category ?> </p>
                        </div>
                        <div class="card-body pt-0">
                            <div class="row">
                                <div class="col-12 text-center">
                                    <img src="<?= base_url('assets/picture/' . $value->picture) ?>" width="250px" height="240px" max-width="100%" max-height="auto">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="text-left">

                                        <h4> <span class="badge bg-primary">Rp. <?= number_format($value->price, 0) ?> </span></h4>
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