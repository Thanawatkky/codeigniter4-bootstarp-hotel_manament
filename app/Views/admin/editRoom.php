<?= $this->extend('admin/dashboard'); ?>
<?= $this->section('content'); ?>
<div class="card card-default">
          <div class="card-header">
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <!-- /.card-header -->
          <?php 
            if (isset($validation)):
          ?>
          <div class="alert alert-danger"><?= $validation->listErrors(); ?></div>
          <?php endif; ?>
            <?php if(isset($oneRoom)): ?>
                <?php foreach($oneRoom as $room): ?>
          <form action="/admin/editRoom" method="post" enctype="multipart/form-data" id="frm_editRoom">
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="RoomNumber"><i class="fas fa-key"></i> เลขที่ห้อง</label>
                  <input type="hidden" name="room_id" id="room_id" value="<?= $room['id']; ?>">
                  <input type="text" name="room_number" id="room_number" class="form-control" readonly value="<?= $room['room_number']; ?>" placeholder="Please enter room number.">
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                <label for="RoomNumber"><i class="fas fa-dollar-sign"></i> ราคา</label>
                  <input type="number" name="price" id="price" class="form-control" value="<?= $room['price']; ?>" placeholder="Please enter price.">
                </div>
                <div class="form-group">
                <label for="RoomNumber"><i class="fas fa-dollar-sign"></i> จำนวนที่สามารถรองรับได้</label>
                  <input type="number"  min="1"  name="max_people" id="max_people" value="<?= $room['people_qty']; ?>" class="form-control" placeholder="Please enter people max.">
                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                <div class="form-group">
                <label for="RoomNumber"><i class="fas fa-bed"></i> จำนวนเตียง</label>
                  <input type="number" min="1" name="bed_qty" id="bed_qty" class="form-control" value="<?= $room['bed_qty']; ?>" placeholder="Please enter beds quality.">
                </div>
                
                
                <!-- INPUT -->
                <!-- /.form-group -->
                <div class="form-group">
                <label for="RoomNumber"><i class="fas fa-images"></i> รูปภาพ</label>
                  <input type="file" name="room_img" id="room_img" class="d-block" placeholder="Please enter room image.">
                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
            <div class="btn-gruop text-center my-4">
                <button type="reset" class="btn btn-secondary">ยกเลิก</button>
              <button type="submit" class="btn btn-primary">ยืนยัน</button>
            </div>
          </div>
          </form>
          <?php endforeach; ?>
            <?php endif; ?>
        </div>



           
        
<?= $this->endSection(); ?>
