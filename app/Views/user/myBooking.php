<?= $this->extend('user/index'); ?>
<?= $this->section('content'); ?>
<?php 
                    if(isset($dataBooking)):
?>
    <div class="container">
        <h4 class="text-center">รายการจองของฉัน</h4>
        <div class="row">
            <?php 
                    foreach($dataBooking as $data):
            ?>
            <div class="col-sm-12 col-md-6 col-lg-3 col-xl-3 col-xxl-3">
                <div class="card">
                    <div class="card-header bg-white">
                        <img src="<?= base_url('../img/room/'.$data['room_img']); ?>" alt="">
                    </div>
                    <div class="card-body text-center">
                                <h5>ห้องที่ <?= $data['room_number']; ?></h5>
                                <p>วันที่:  </p>
                                <p><?= date('d-m-Y',strtotime($data['check_in']))." ถึง ".date('d-m-Y',strtotime($data['check_in'])); ?></p>
                                <p>ราคาทั้งหมด <?= $data['total_price']; ?> ฿</p> 
                                <p>สถานะ: <?php 
                                    if($data['c_status'] == 1){
                                        echo 'จองแล้ว';
                                    }elseif($data['c_status'] == 2) {
                                        echo 'เช็คอินแล้ว';
                                    }elseif($data['c_status'] == 3){
                                        echo 'เช็คเอาท์แล้ว';
                                    }else{
                                        echo 'ยกเลิกการจอง';
                                    }
                                ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            endforeach;
         
         ?>
        </div>
    </div>
    <?php endif;  ?>
<?= $this->endsection(); ?>