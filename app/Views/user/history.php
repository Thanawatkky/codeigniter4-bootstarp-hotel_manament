<?= $this->extend('user/index'); ?>
<?= $this->section('content'); ?>
็  <h3 class="text-center">ประวัติการจอง</h3>
    <div class="table-responsive">
            <table class="table table-bordered" id="table-history">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>รูปภาพ</th>
                        <th>ห้อง</th>
                        <th>จำนวนเตียง</th>
                        <th>ผู้จอง</th>
                        <th>ราคาทั้งหมด</th>
                        <th>สถานะ</th>
                        <th>วันที่เช็คอิน</th>
                        <th>วันที่เช็คเอาท์</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        if(isset($histories)):
                            $i=0;
                            foreach($histories as $data):
                                $i++;
                    ?>
                    <tr>
                        <td><?= $i;  ?></td>
                        <td><img src="<?= base_url('../img/room/'.$data['room_img']); ?>" alt="Room Images" class="rounded" width="100" height="100"></td>
                        <td>ห้อง <?= $data['room_number'];  ?></td>
                        <td><?= $data['bed_qty']; ?></td>
                        <td><?= session()->get('fname')."".session()->get('lname'); ?></td>
                        <td><?=  $data['total_price']; ?></td>
                        <td><?php  if($data['c_status'] == 1) {
                            echo "จองแล้ว";
                          }else if($data['c_status'] == 2){
                            echo "เช็คอินแล้ว";
                          }else if($data['c_status'] == 3) {
                            echo "เช็คเอาท์แล้ว";
                          }else{
                            echo "ยกเลิกการจองแล้ว";
                          } ?></td>
                        <td><?= date('d-m-Y',strtotime($data['check_in'])); ?></td>
                        <td><?= date('d-m-Y',strtotime($data['check_out'])); ?></td>
                    </tr>
                    <?php
                    endforeach;
                 endif; 
                 ?>
                </tbody>
            </table>
    </div>
<?= $this->endsection(); ?>