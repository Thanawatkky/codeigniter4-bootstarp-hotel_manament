<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Hotel Mamament</title>
  
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('../plugins/fontawesome-free/css/all.min.css'); ?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="<?= base_url('../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css'); ?>">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?= base_url('../plugins/icheck-bootstrap/icheck-bootstrap.min.css'); ?>">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?= base_url('../plugins/jqvmap/jqvmap.min.css'); ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('../dist/css/adminlte.min.css'); ?>">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?= base_url('../plugins/overlayScrollbars/css/OverlayScrollbars.min.css'); ?>">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?= base_url('../plugins/daterangepicker/daterangepicker.css'); ?>">
  <!-- summernote -->
  <link rel="stylesheet" href="<?= base_url('../plugins/summernote/summernote-bs4.min.css'); ?>">
  <link rel="stylesheet" href="https://cdn.datatables.net/2.0.2/css/dataTables.dataTables.min.css">
  <style>
    #btn-edit:hover { 
      background-color: #FFC500; 
      color: white; 
    }
    #btn-checkin:hover { 
      background-color: green; 
      color: white; 
    }
    #btn-checkout:hover { 
      background-color: #FF002E; 
      color: white; 
    }
    #btn-del:hover { 
      background-color: #FF002E; 
      color: white; 
    }
    #btn-cancel:hover { 
      background-color: #FF002E; 
      color: white; 
    }
  </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="<?= base_url('../dist/img/AdminLTELogo.png'); ?>" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?= base_url('admin/dashboard'); ?>" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>
    </a>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="btn-logout" href="#" role="button">
          <i class="fas fa-door-open"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="<?= base_url('../dist/img/AdminLTELogo.png'); ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Dashboard</span>
    </a>
<?php 
  if(isset($profile)):
    foreach($profile as $fet_profile):
  
?>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?= base_url('../img/profile/'.$fet_profile['user_img']); ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?= session()->get('fname').' '.session()->get('lname'); ?></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="/admin/dashboard" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

          <li class="nav-item menu-hidden">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cogs"></i>
              <p>
                จัดการห้องพัก
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/admin/addRoom" class="nav-link active">
                  <i class="fas fa-plus nav-icon"></i>
                  <p>เพิ่มข้อมูลห้องพัก</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/admin/manageBooking" class="nav-link active">
                  <i class="fas fa-plus nav-icon"></i>
                  <p>ดูข้อมูลการจอง</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="/admin/profile" class="nav-link">
              <i class="nav-icon 	far fa-address-card"></i>
              <p>
                แก้ไขข้อมูลส่วนตัว
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/admin/forgetpassword" class="nav-link">
              <i class="nav-icon 	far fa-id-badge	"></i>
              <p>
                เปลี่ยนรหัสผ่าน
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <?php endforeach; ?>
    <?php endif; ?>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2 bg-white vh-10 shadow-sm">
          <div class="col-sm-6 py-4  px-4 text-muted ">
            <?php if(isset($title)): ?>
              
            <h4 class="m-0"><?php 
              if($title == 'AddRoom'){

                echo 'เพิ่มข้อมูลห้องพัก';
              }else if($title == 'EditRoom') {
                echo 'แก้ไขข้อมูลห้องพัก';
              }else if($title == 'Profile') {
                echo 'แก้ไขข้อมูลส่วนตัว';
              }else if($title == 'Forgetpassword') {
                echo 'เปลี่ยนรหัสผ่าน';
              }else{
                echo $title;
              }
                ?></h4>
            <?php endif; ?>
          </div><!-- /.col -->
        </div><!-- /.row -->
        <?php if($title == "Dashboard"): ?>
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
                         <th>เข้าพักได้/คน</th>
                         <th>สถานะ</th>
                         <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php
                          if($rooms):
                            $i=0;
                            foreach($rooms as $room):
                              $i++;
                        ?>
                      <tr>
                        <td><?= $i; ?></td>
                        <td><img src="<?= base_url('../img/room/'.$room['room_img']); ?>" alt="Room Images" class="rounded" width="100" height="100"></td>
                        <td><?= $room['room_number']; ?></td>
                        <td> <?= $room['bed_qty']; ?></td>
                        <td><?= $room['price']; ?></td>
                        <td><?= $room['people_qty']; ?></td>
                        <td><?php 
                          if($room['is_active'] == 0) {
                            echo "ว่าง";
                          }else{
                            echo "ไม่ว่าง";
                          }
                        ?></td>
                        <td>
                          <div class="dropdown">
                            <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton1" data-toggle="dropdown" aria-expanded="false">
                              Action
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                              <li><a class="dropdown-item " id="btn-edit" href="/admin/editRoom/<?= $room['id']; ?>"><i class="fas fa-edit	"></i> Edit</a></li>
                              <li><button class="dropdown-item"  id="btn-del" data-id="<?= $room['id']; ?>"	><i class="far fa-trash-alt"></i> Delete</button></li>
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
            <?php endif; ?>
            <?php if($title != "Dashboard"): ?>
              <?= $this->renderSection('content');  ?>
            <?php endif; ?>
      </div><!-- /.container-fluid -->
    </div>
  </div>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>

  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<!-- jQuery -->
<script src="<?= base_url('../plugins/jquery/jquery.min.js'); ?>"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= base_url('../plugins/jquery-ui/jquery-ui.min.js'); ?>"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('../plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
<!-- ChartJS -->
<script src="<?= base_url('../plugins/chart.js/Chart.min.js'); ?>"></script>
<!-- Sparkline -->
<script src="<?= base_url('../plugins/sparklines/sparkline.js'); ?>"></script>
<!-- JQVMap -->
<script src="<?= base_url('../plugins/jqvmap/jquery.vmap.min.js'); ?>"></script>
<script src="<?= base_url('../plugins/jqvmap/maps/jquery.vmap.usa.js'); ?>"></script>
<!-- jQuery Knob Chart -->
<script src="<?= base_url('../plugins/jquery-knob/jquery.knob.min.js'); ?>"></script>
<!-- daterangepicker -->
<script src="<?= base_url('../plugins/moment/moment.min.js'); ?>"></script>
<script src="<?= base_url('../plugins/daterangepicker/daterangepicker.js'); ?>"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= base_url('../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js'); ?>"></script>
<!-- Summernote -->
<script src="<?= base_url('../plugins/summernote/summernote-bs4.min.js'); ?>"></script>
<!-- overlayScrollbars -->
<script src="<?= base_url('../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js'); ?>"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('../dist/js/adminlte.js'); ?>"></script>
<!-- AdminLTE for demo purposes -->
<!-- <script src="dist/js/demo.js"></script> -->
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?= base_url('../dist/js/pages/dashboard.js'); ?>"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.datatables.net/2.0.2/js/dataTables.min.js"></script>

<script>
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
  $(document).on('click','#btn-del',function() {
    let id = $(this).data('id');
    Swal.fire({
        title: "แจ้งเตือน",
        text: "ต้องการลบข้อมูลห้องพักรายการนี้หรือไม่?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "ใช่",
        cancelButtonText: "ไม่ใช่"
      }).then((result) => {
        if (result.isConfirmed) {
         $.ajax({
          url: "/admin/delete",
          type: "post",
          dataType: "JSON",
          data: {
            id: id
          },success:function(data){
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
          }
         })
        }
      });
  })
  $(document).on('click',"#btn-checkin",function() {
    let id = $(this).data("id");
    $.ajax({
      url: "/admin/check_in",
      type: "post",
      dataType: "json",
      data: {
        id: id
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
  })
  $(document).on('click',"#btn-checkout",function() {
    let id = $(this).data("id");
    let room = $(this).data("room");
    $.ajax({
      url: "/admin/check_out",
      type: "post",
      dataType: "json",
      data: {
        id: id,
        room: room
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
  })
  $(document).on('click',"#btn-cancel",function() {
    let id = $(this).data("id");
    let room = $(this).data('room');
    $.ajax({
      url: "/admin/cancel",
      type: "post",
      dataType: "json",
      data: {
        id: id,
        room: room
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
  })
  $(document).on("submit","#frm_addRoom", function() {
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
  })
  $(document).on("submit","#frm_editRoom", function() {
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
          
            window.location.replace('/admin/dashboard');
          
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
          
            window.location.replace('/admin/dashboard');
          
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
  let table = new DataTable("#roomTable");
</script>
</body>
</html>
