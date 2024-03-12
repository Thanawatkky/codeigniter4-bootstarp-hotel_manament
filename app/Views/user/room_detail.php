<?= $this->extend('user/index'); ?>
<?= $this->section('content'); ?>
<?php 
    if(isset($dataRoom)):
        foreach($dataRoom as $room):
?>
<!-- content -->
<section class="py-4">
  <div class="container">
    <div class="row gx-5">
      <aside class="col-lg-6">
        <div class="border rounded-4 mb-3 py-5 px-5  d-flex justify-content-center">
            <img style="max-width: 100%; max-height: 100vh; margin: auto;" class="rounded-4 w-100 fit img-fluid" src="<?= base_url('../img/room/'.$room['room_img']); ?>" />
        </div>
        <!-- thumbs-wrap.// -->
        <!-- gallery-wrap .end// -->
      </aside>
      <main class="col-lg-6">
        <div class="ps-lg-3">
          <h4 class="title text-dark"><?= "ห้องที่ ".$room['room_number']; ?></h4>

          </div>

          <div class="mb-3">
            <span class="h5">฿ <?= $room['price']; ?></span>
            <span class="text-muted">/per night</span>
          </div>
          <div class="row">
            <dt class="col-3">จำนวนเตียง:</dt>
            <dd class="col-9"><?= $room['bed_qty']; ?> เตียง</dd>
            <dt class="col-3">พักได้สูงสุด:</dt>
            <dd class="col-9"><?= $room['people_qty']; ?> คน</dd>
<!-- 
            <dt class="col-3">Color</dt>
            <dd class="col-9">Brown</dd>

            <dt class="col-3">Material</dt>
            <dd class="col-9">Cotton, Jeans</dd>

            <dt class="col-3">Brand</dt>
            <dd class="col-9">Reebook</dd> -->
          </div>

          <hr />

          <div class="row mb-4">
            <div class="col-md-4 col-6">
              <label class="mb-2">วันที่เข้าพัก</label>
              <input type="date" name="check_in" id="check_in" class="form-control"> 
            </div>
            <div class="col-md-4 col-6 mb-3">
              <label class="mb-2 d-block">วันที่ออกจากที่พัก</label>
              <div class="input-group mb-3" style="width: 170px;">
              <input type="date" name="check_out" id="check_out" class="form-control">

              </div>
            </div>
          </div>
            <div class="text-center mt-3"> 
            <button type="button" class="btn btn-primary btn-lg px-3" data-id="<?= $room['id']; ?>" data-price="<?= $room['price']; ?>" id="btn-booking">จอง</button>
            <button type="button" class="btn btn-secondary btn-lg mx-3 px-3" id="btn-back">กลับ</button>
            </div>
        </div>
      </main>
    </div>
  </div>
</section>
<!-- content -->
<?php 
endforeach;
endif;


?>
<?= $this->endsection(); ?>