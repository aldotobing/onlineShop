      <!-- Default box -->
      <?php if ($goods->discount == null) {
            $goods->discount = 0;
        }

        //CHECK IF THERE IS A DISCOUNT AMOUNT IN EACH ITEM
        if ($goods->discount <= 0 || $goods->discount == null) {
            //IF RESULT IS 0 OR HAS A NULL VALUE (NO DISCOUNT), THEN FINAL PRICE = VALUE REAL PRICE (AS IN DATABASE), NO CHANGES
            $final_price = $goods->price;
        } else {
            //CALCULATE THE AMOUNT OF DISCOUNT
            $disc_value = $goods->price * ($goods->discount / 100);
            //IF RESULT IS GREATER THAN 0 THAT MEANS IT HAS A DISCOUNT VALUE, CALCULATE THE FINAL PRICE TO GET THE PRICE AFER DISCOUNT
            //SO IT WILL BE REAL PRICE - AMOUNT OF DISCOUNT ABOVE
            $final_price = ($goods->price - $disc_value);
        }
        ?>

      <div class="card card-solid">
          <div class="card-body">
              <div class="row">

                  <div class="col-12 col-sm-6">
                      <div class="text-left">
                          <h4> <span class="badge bg-warning"> <?= $goods->discount ?> % OFF </span></h4>
                      </div>
                      <h3 class="d-inline-block d-sm-none"><?= $goods->name_goods ?></h3>
                      <div class="col-6 ">
                          <img src="<?= base_url('assets/picture/' . $goods->picture) ?>" class="product-image" alt="Product Image">
                      </div>

                      <div class="col-6 product-image-thumbs">
                          <div class="product-image-thumb active"><img src="<?= base_url('assets/picture/' . $goods->picture) ?>" alt="Product Image"></div>
                          <?php foreach ($picture as $key => $value) { ?>
                              <div class="product-image-thumb"><img src="<?= base_url('assets/picturegoods/' . $value->picture) ?>" alt="Product Image"></div>
                          <?php   } ?>
                      </div>
                  </div>
                  <div class="col-12 col-sm-6">
                      <h3 class="my-3"><?= $goods->name_goods ?></h3>
                      <hr>
                      <h5><?= $goods->name_category ?></h5>
                      <hr>
                      <p><?= $goods->description ?></p>
                      <hr>

                      <div class="bg-gray py-2 px-3 mt-4">
                          <del>Rp.<?= number_format($goods->price, 0) ?> .00</del>
                          <h2 class="mb-0">
                              Rp.<?= number_format($final_price, 0) ?> .00
                          </h2>

                          </h2>
                      </div>
                      <hr>
                      <?php
                        echo form_open('shopping/add');
                        echo form_hidden('id', $goods->id_goods);
                        echo form_hidden('price', $goods->price);
                        echo form_hidden('name', $goods->name_goods);
                        echo form_hidden(
                            'redirect_page',
                            str_replace('index.php/', '', current_url())
                        ); ?>
                      <div class="mt-4">
                          <div class="row">
                              <div class="col-sm-2">
                                  <input type="number" name="qty" class="form-control" value="1" min="1">
                              </div>

                              <div class=" col-sm-6">
                                  <button type="submit" class="btn btn-primary  btn-flat  swalDefaultSuccess">
                                      <i class="fas fa-cart-plus fa-lg mr-2"></i>
                                      Add to Cart
                                  </button>
                              </div>
                          </div>
                      </div>
                      <?php echo form_close(); ?>
                      <div class="mt-4 product-share">
                          <a href="#" class="text-gray">
                              <i class="fab fa-facebook-square fa-2x"></i>
                          </a>
                          <a href="#" class="text-gray">
                              <i class="fab fa-twitter-square fa-2x"></i>
                          </a>
                          <a href="#" class="text-gray">
                              <i class="fas fa-envelope-square fa-2x"></i>
                          </a>
                          <a href="#" class="text-gray">
                              <i class="fas fa-rss-square fa-2x"></i>
                          </a>
                      </div>

                  </div>
              </div>

          </div>
          <!-- /.card-body -->
      </div>
      <!-- /.card -->

      <script>
          $(document).ready(function() {
              $('.product-image-thumb').on('click', function() {
                  var $image_element = $(this).find('img')
                  $('.product-image').prop('src', $image_element.attr('src'))
                  $('.product-image-thumb.active').removeClass('active')
                  $(this).addClass('active')
              })
          })
      </script>
      <!-- jQuery -->
      <script src="<?= base_url() ?>template/plugins/jquery/jquery.min.js"></script>
      <!-- Bootstrap 4-->
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