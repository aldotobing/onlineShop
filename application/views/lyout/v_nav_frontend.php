 <!-- Navbar -->
 <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
     <div class="container">
         <a href="<?= base_url() ?>" class="navbar-brand">
             <i class="fas fa-store text-primary "> </i>
             <span class="brand-text font-weight-light"><b>ONLINE STORE</b></span>
         </a>


         <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
             <span class="navbar-toggler-icon"></span>
         </button>

         <div class="collapse navbar-collapse order-3" id="navbarCollapse">
             <!-- Left navbar links -->
             <ul class="navbar-nav">
                 <li class="nav-item">

                     <a href="<?php echo site_url('admin') ?>" class="nav-link">Admin</a>
                 </li>
                 <?php $category = $this->m_home->get_all_Data_category(); ?>
                 <li class="nav-item dropdown">
                     <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Category</a>
                     <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                      
                         <?php foreach ($category as $key => $value) { ?>
                             <li><a href="<?= base_url('home/category/' . $value->id_category) ?>" class="dropdown-item"><?= $value->name_category ?> </a></li>
                         <?php } ?>
                     </ul>
                 </li>
             </ul>


         </div>





         <!-- Right navbar links -->
         <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
             <!-- Messages Dropdown Menu -->
             <li class="nav-item">
                 <?php if ($this->session->userdata('email') == "") { ?>
                     <a class="nav-link" href="<?= base_url('customer/register') ?>">
                         <span class="brand-text font-weight-light">Login/Register</span>
                         <img src="<?= base_url() ?>template/dist/img/user1-128x128.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">

                     </a>
                 <?php  } else { ?>
                     <a class="nav-link" data-toggle="dropdown" href="#">
                         <span class="brand-text font-weight-light"><?= $this->session->userdata('name_customer')  ?></span>
                         <img src="<?= base_url('assets/foto/' . $this->session->userdata('foto')) ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                     </a>

                     <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                         <div class="dropdown-divider"></div>
                         <a href="<?= base_url('customer/accuont') ?>" class="dropdown-item">
                             <i class="fas fa-user mr-2"></i> My Account
                         </a>
                         <div class="dropdown-divider"></div>
                         <a href="<?= base_url('my_order') ?>" class="dropdown-item">
                             <i class="fas fa-shopping-cart mr-2"></i> My Order
                         </a>
                         <div class="dropdown-divider"></div>
                         <a href="<?= base_url('customer/logout') ?>" class="dropdown-item dropdown-footer">Log Out</a>
                     </div>
                 <?php } ?>
             </li>
             <?php
                $toshopping = $this->cart->contents();
                $total_item = 0;
                foreach ($toshopping as $key => $value) {
                    $total_item = $total_item + $value['qty'];
                }

                ?>
             <li class="nav-item dropdown">
                 <a class="nav-link" data-toggle="dropdown" href="#">
                     <i class="fas fa-shopping-cart"></i>
                     <span class="badge badge-danger navbar-badge"><?= $total_item  ?></span>
                 </a>
                 <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                     <?php if (empty($toshopping)) { ?>
                         <a href="#" class="dropdown-item">
                             <p>Empty Shopping Cart</p>
                         </a>
                         <?php } else {
                            foreach ($toshopping as $key => $value) {
                                $goods = $this->m_home->detail_goods($value['id']);
                            ?>


                             <a href="#" class="dropdown-item">
                                 <div class="media">
                                     <img src="<?= base_url('assets/picture/' . $goods->picture) ?>" alt=" User Avatar" class="img-size-50 mr-3">
                                     <div class="media-body">
                                         <h3 class="dropdown-item-title">
                                             <?= $value['name'] ?>
                                         </h3>
                                         <p class="text-sm"> <?= $value['qty'] ?> xRp. <?= number_format($value['price'], 0) ?></p>
                                         <p class="text-sm text-muted"><i class="fa fa-calculator"></i> <?= $this->cart->format_number($value['subtotal']);  ?></p>
                                     </div>
                                 </div>
                             </a>

                             <div class="dropdown-divider"></div>
                         <?php } ?>
                         <!-- goods start -->
                         <a href="#" class="dropdown-item">
                             <div class="media">
                                 <div class="media-body">
                                     <tr>
                                         <td colspan="2"> </td>
                                         <td class="right"><strong>Total:</strong></td>
                                         <td class="right">Rp.<?= $this->cart->format_number($this->cart->total()); ?></td>
                                     </tr>
                                 </div>
                             </div>
                         </a>

                         <div class="dropdown-divider"></div>
                         <a href="<?= base_url('shopping') ?>" class="dropdown-item dropdown-footer">View Cart</a>
                         <a href="#" class="dropdown-item dropdown-footer">check Out</a>
                     <?php   } ?>

                 </div>
             </li>
             <!-- Notifications Dropdown Menu -->

         </ul>
     </div>
 </nav>
 <!-- /.navbar -->
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <div class="content-header">
         <div class="container">
             <div class="row mb-2">
                 <div class="col-sm-6">
                     <h1 class="m-0"> <?= $title ?></h1>
                 </div><!-- /.col -->
                 <div class="col-sm-6">
                     <ol class="breadcrumb float-sm-right">
                         <li class="breadcrumb-item"><a href="<?php echo site_url('home') ?>">Online Store</a></li>
                         <li class="breadcrumb-item"><a href="<?php echo site_url('home') ?>"><?= $title ?></a></li>

                     </ol>
                 </div><!-- /.col -->
             </div><!-- /.row -->
         </div><!-- /.container-fluid -->
     </div>
     <!-- /.content-header -->
     <div class="content">
         <div class="container">