<?= $this->extend('admin/dashboard'); ?>
<?= $this->section('content'); ?>
<?php 
    if(isset($profile)):
        foreach($profile as $fet_profile):
?>
    <div class="container rounded-3 bg-white shadow-sm mt-3 ">
        <div class="text-center pt-4">
            <img width="130" height="130" class="object-fit-cover rounded-circle shadow" src="<?= base_url('../img/profile/'.$fet_profile['user_img']); ?>" alt="">
            <h4 class="fw-bold mt-2">แก้ไขข้อมูลส่วนตัว</h4>
        </div>

        <form class="needs-validation" id="frm_profile" enctype="multipart/form-data" action="/admin/profile" method="post" novalidate>
            <div class="row px-5">
                <div class="col-12 col-lg-6">
                    <div class="mt-1">
                        <label for="" class="form-label">ชื่อผู้ใช้</label>
                        <input type="text" name="username" value="<?= $fet_profile['username']; ?>" id="username" class="form-control" placeholder="" readonly>
                        <div class="invalid-feedback">
                            โปรดกรอกชื่อผู้ใช้ของท่าน
                        </div>
                    </div>

                    <div class="mt-2">
                        <label for="" class="form-label">ชื่อ</label>
                        <input type="text" name="fname" id="fname" class="form-control" placeholder="" value="<?= $fet_profile['fname'];  ?>" required>
                        
                        <div class="invalid-feedback">
                            โปรดกรอกชื่อของท่าน
                        </div>
                    </div>
                    
                </div>
                <div class="col-12 col-lg-6">
                    <div class="mt-2">
                        <label for="" class="form-label">ที่อยู่อีเมล</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="" value="<?= $fet_profile['email']; ?>" required>
                        
                        <div class="invalid-feedback">
                            โปรดกรอกที่อยู่อีเมลของท่าน
                        </div>
                    </div>
                    <div class="mt-2">
                        <label for="" class="form-label">นามสกุล</label>
                        <input type="text" name="lname" id="lname" class="form-control" placeholder="" value="<?= $fet_profile['lname'];  ?>" required>
                        
                        <div class="invalid-feedback">
                            โปรดกรอกนามสกุลของท่าน
                        </div>
                    </div>
                

                    <div class="mt-3">
                        <label for="" class="form-label d-block">รูปโปรไฟล์</label>
                        <input type="file" name="user_img" id="user_img">
                    </div>
                </div>
            </div>

            <div class="text-center mt-5">
                <button class="btn btn-success mb-4" type="submit" style="width: 130px;">ยืนยัน</button>
                <a href="/admin/dashboard" class="btn btn-dark mb-4" style="width: 130px;">ยกเลิก</a>
            </div>
        </form>
    </div>
    <?php 
    endforeach;
endif; 
?>


<?= $this->endsection(); ?>