<?= $this->extend('admin/dashboard'); ?>
<?= $this->section('content'); ?>
<div class="bg-white vh-10 px-5 py-5">
            <div class="table-responsive">
                <table class="table table-striped table-bordered" id="roomTable">
                    <thead class="text-end">
                      <tr>
                         <th>#</th>
                         <th>รูปภาพ</th>
                         <th>เลขห้อง</th>
                         <th>จำนวนเตียง</th>
                         <th>ราคา</th>
                         <th>ผู้จอง</th>
                         <th>วันที่เช็คอิน</th>
                         <th>สถานะ</th>
                         <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php
                          if($dataBook):
                            $i=0;
                            foreach($dataBook as $data):
                              $i++;
                        ?>
                      <tr>
                        <td><?= $i; ?></td>
                        <td><img src="<?= base_url('../img/room/'.$data['room_img']); ?>" alt="Room Images" class="rounded" width="100" height="100"></td>
                        <td><?= $data['room_number']; ?></td>
                        <td> <?= $data['bed_qty']; ?></td>
                        <td><?= $data['total_price']; ?></td>
                        <td><?= $data['fname']." ".$data['lname']; ?></td>
                        <td><?= date('d-m-Y',strtotime($data['check_in']))." ถึง ".date('d-m-Y',strtotime($data['check_out'])); ?></td>
                        <td><?php 
                          if($data['c_status'] == 1) {
                            echo "จองแล้ว";
                          }else if($data['c_status'] == 2){
                            echo "เช็คอินแล้ว";
                          }else if($data['c_status'] == 3) {
                            echo "เช็คเอาท์แล้ว";
                          }else{
                            echo "ยกเลิกการจองแล้ว";
                          }
                        ?></td>
                        <td>
                          <div class="dropdown">
                            <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton1" data-toggle="dropdown" aria-expanded="false">
                              Action
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li>
                                  <?php if($data['c_status'] == 1) { ?>
                                <button class="dropdown-item " id="btn-checkin" data-id="<?= $data['b_id']; ?>"><i class="fas fa-edit	"></i> เช็คอิน</button>
                                <?php }else if($data['c_status'] == 2){?>
                                    <button class="dropdown-item " id="btn-checkout" data-id="<?= $data['b_id']; ?>" data-room="<?= $data['room']; ?>"><i class="fas fa-edit	"></i> เช็คเอาท์</button>

                                <?php } ?>
                            </li>
                            <?php 
                                if($data['c_status'] == 1):
                            ?>
                              <li><button class="dropdown-item"  id="btn-cancel" data-id="<?= $data['b_id']; ?>"	data-room="<?= $data['room']; ?>"><i class="far fa-trash-alt"></i> ยกเลิก</button></li>
                              <?php endif; ?>
                            </ul>
                        </div>
                        </td>
                      </tr>
                      <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
            </div>
<?= $this->endSection(); ?>