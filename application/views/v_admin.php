<div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-info">
        <div class="inner">
            <h3><?= $total_transfer ?></h3>

            <p>ORDERS</p>
        </div>
        <div class="icon">
            <i class="fa fa-shopping-bag" aria-hidden="true"></i>
        </div>
        <a href="<?= base_url('my_order') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>

<div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-success">
        <div class="inner">
            <h3><?= $total_goods ?></h3>

            <p>Goods</p>
        </div>
        <div class="icon">
            <i class="fas fa-cubes"></i>
        </div>
        <a href="<?= base_url('goods') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>
<div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-warning">
        <div class="inner">
            <h3><?= $total_user ?></h3>

            <p>User</p>
        </div>
        <div class="icon">
            <i class="fas fa-users"></i>
        </div>
        <a href="<?= base_url('user') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>
<div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-danger">
        <div class="inner">
            <h3><?= $total_category ?></h3>

            <p>Category</p>
        </div>
        <div class="icon">
            <i class="fas fa-list"></i>
        </div>
        <a href="<?= base_url('category') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>

