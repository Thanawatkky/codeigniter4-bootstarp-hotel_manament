<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>DD Hotel</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="<?= base_url('../assets/favicon.ico') ?>" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.datatables.net/2.0.2/css/dataTables.dataTables.min.css">

    </head>
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="/user/index">DD HOTEL</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="/user/index">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="/user/myBooking">การจองของฉัน</a></li>
                        <li class="nav-item"><a class="nav-link" id="navbarDropdown" href="/user/history" role="button">ประวัติการจอง</a></li>
                     </ul>
                     <?php 
                        if(isset($profile)): 
                            foreach($profile as $fet_profile):
                     ?>
                   <div class="d-flex dropdown me-5">
                        <img src="<?= base_url('../img/profile/'.$fet_profile['user_img']); ?>" class="dropdown-toggle rounded-circle" role="button" data-bs-toggle="dropdown" width="48" height="48">
                        <ul class="dropdown-menu">
                            <li><a href="/user/profile"  class="dropdown-item">แก้ไขข้อมูลส่วนตัว</a></li>
                            <li><a href="/user/forgetpassword"  class="dropdown-item">เปลี่ยนรหัสผ่าน</a></li>
                            <li><a href="#"  class="dropdown-item" id="btn-logout">ออกจากระบบ</a></li>
                        </ul> 
                    </div>
                    <?php 
                    endforeach;
                endif; 
                ?>
                </div>
            </div>
        </nav>
        <!-- Header-->
                <?php 
                    if($title != "Index"):
                ?>
                        <div class="container-fluid my-5 py-5">
                        <?= $this->renderSection('content'); ?>
                        </div>
                        <footer class="py-5 bg-dark position-absolute bottom-0  w-100">
                            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2023</p></div>
                        </footer>
                <?php endif; ?>
                <?php if($title == "Index"): ?>
                    <header class="bg-dark py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">จองห้องพักกับเรา DD Hotel</h1>
                    <p class="lead fw-normal text-white-50 mb-0">จองห้องพักเราเริ่มต้นที่ 500 บาท</p>
                </div>
            </div>
        </header>
        <!-- Section-->
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                  <?php 
                    if(isset($rooms)) :
                        foreach($rooms as $room):
                  ?>
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="<?= base_url('../img/room/'.$room['room_img']); ?>" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">ห้องที่ <?= $room['room_number']; ?></h5>
                                    <hr>
                                    <!-- Product reviews-->
                                    <h6 class="fw-bolder">จำนวน <?= $room['bed_qty']; ?> เตียง</h6>
                                    <p class="text-danger fw-bolder"> ฿<?= $room['price']; ?>/คืน</p>
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="/user/room_detail/<?= $room['id']; ?>">ดูรายละเอียด</a></div>
                            </div>
                        </div>
                    </div>
                    <?php 
                    endforeach;
                endif; 
                ?>
                </div>
            </div>
        </section>
        <footer class="py-5 bg-dark position-absolute  w-100">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2023</p></div>
        </footer>
                    <?php endif; ?>
        <!-- Footer-->
        
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="<?= base_url('../js/scripts.js'); ?>"></script>
        <script src="<?= base_url('../js/jquery.min.js'); ?>"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://cdn.datatables.net/2.0.2/js/dataTables.min.js"></script>

        <script>
            $(document).on("click","#btn-booking",function() {
                 let id = $(this).data('id');
                 let check_in = $('input#check_in').val();
                 let check_out = $('input#check_out').val();
                 let price = $(this).data('price');
                 // แปลงค่า string ของวันที่เป็น Date object
const checkInDate = new Date(check_in);
const checkOutDate = new Date(check_out);

// หาจำนวนวัน (milliseconds)
const diffInMs = checkOutDate.getTime() - checkInDate.getTime();

// แปลง milliseconds เป็นวัน
const daysDiff = Math.floor(diffInMs / (1000 * 60 * 60 * 24));

// คูณจำนวนวันด้วยราคา
const totalCost = daysDiff * price;

                 $.ajax({
                    url: "/user/booking",
                    type: "post",
                    dataType: "json",
                    data: {
                        room: id,
                        check_in: check_in,
                        check_out: check_out,
                        total_price: totalCost
                    },success:function(data) {
                        const Toast = Swal.mixin({
                    toast: true,
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 1500,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;
                    }
                    });
                    
                    if(data.status) {
                    
                    Toast.fire({
                    icon: data.type,
                    title: data.msg
                    }).then(function() {
                    
                        window.location.replace('/user/index');
                    
                    })
                    }else{          
                    Toast.fire({
                    icon: data.type,
                    title: data.msg
                    })
                    }
                },error:function(err) {
                    console.log(err);
                }
                 })
            })
            $(document).on('click','#btn-back',function() {
                window.location.replace('/user/index');
            })
            $(document).on("submit","#frm_profile", function() {
                let url = $(this).attr('action');
                let data = new FormData(this);
                $.ajax({
                url: url,
                type: $(this).attr("method"),
                dataType: "JSON",
                data: data,
                processData: false,
                contentType: false,
                success:function(data) {
                    const Toast = Swal.mixin({
                    toast: true,
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 1500,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;
                    }
                    });
                    
                    if(data.status) {
                    
                    Toast.fire({
                    icon: data.type,
                    title: data.msg
                    }).then(function() {
                    
                        window.location.reload();
                    
                    })
                    }else{          
                    Toast.fire({
                    icon: data.type,
                    title: data.msg
                    })
                    }
                },error:function(err) {
                    console.log(err);
                }
                })
            return false;
                $("#frm_profile").addClass('was-validated');
            })
$(document).on("submit","#frm_repass", function() {
    let url = $(this).attr('action');
    let data = new FormData(this);
    $.ajax({
      url: url,
      type: $(this).attr("method"),
      dataType: "JSON",
      data: data,
      processData: false,
      contentType: false,
      success:function(data) {
        const Toast = Swal.mixin({
          toast: true,
          position: "top-end",
          showConfirmButton: false,
          timer: 1500,
          timerProgressBar: true,
          didOpen: (toast) => {
            toast.onmouseenter = Swal.stopTimer;
            toast.onmouseleave = Swal.resumeTimer;
          }
        });
        
        if(data.status) {
         
        Toast.fire({
          icon: data.type,
          title: data.msg
        }).then(function() {
          
            window.location.replace('/user/index');
          
        })
        }else{          
          Toast.fire({
          icon: data.type,
          title: data.msg
        })
        }
      },error:function(err) {
        console.log(err);
      }
    })
return false;
  })
  $(document).on('click','#btn-logout',function() {
    let id = $(this).data('id');
    Swal.fire({
        title: "แจ้งเตือน",
        text: "ต้องการออกจากระบบใช่ไหม?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "ใช่",
        cancelButtonText: "ไม่ใช่"
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.replace('/logout');

        }
      });
  })
  let table = new DataTable('#table-history');
        </script>
    </body>
</html>
