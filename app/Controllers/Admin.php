<?php namespace App\Controllers;

use App\Models\BookingModel;
use App\Models\RoomModel;
use App\Models\UserModel;
use CodeIgniter\Controller;

use function PHPUnit\Framework\throwException;

class Admin extends BaseController
{
    public function index($page = 'dashboard', $id = null) {
        $session = session();
        if (!is_file(APPPATH . 'Views/admin/' . $page . '.php')) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
        }

        $model = new UserModel();
        $User = $model->where('user_id',$session->get('user_id'))->findAll();
        $RoomModel = new RoomModel();
        $Room = $RoomModel->orderBy('id', 'asc')->findAll();
        $dataRoom = false;
        $dataBooking = false;
        if($id != null) {
            $singleRoom = $RoomModel->where('id',$id)->findAll();
            $dataRoom = $singleRoom;
        }
        if($page == 'manageBooking') {
            $bookModel = new BookingModel();
            $dataBooking = $bookModel->join('tb_room','tb_booking.room = tb_room.id')->join('tb_user','tb_booking.user = tb_user.user_id')->where('tb_booking.c_status <',3)->findAll();
        }
        $data = [
            'title' => ucfirst($page), // กำหนด title โดยใช้ ucfirst เพื่อทำให้ตัวแรกเป็นตัวใหญ่
            'profile' => $User,
            'rooms' => $Room,
            'oneRoom' => $dataRoom,
            'dataBook' => $dataBooking

        ];
        // กำหนด layout ที่จะใช้
        // echo view('da', $data);

        // แสดงหน้าที่เลือก
        // return $this->request->getUri(1);
        echo view('/admin/'.$page, $data);
    }
    public function store()
    {
        helper('form');
        $model = new RoomModel();
        $rules = [
            'room_number' => 'required|is_unique[tb_room.room_number]',
            'price' => 'required',
            'bed_qty' => 'required',
            'max_people' => 'required',
            // 'room_img' => 'required',
        ];
        
        if ($this->validate($rules)) {
            $file = $this->request->getFile('room_img');
            if ($file->isValid() && !$file->hasMoved()) {
                $fileName = $file->getRandomName();
                $file->move('img/room/', $fileName);
            } else {
                return $this->response->setJSON([
                    'status' => false,
                    'msg' => "กรุณาแนบรูปภาพห้องพักด้วยค่ะ",
                    'type' => "error"
                ]);
            }
    
            $data = [
                'room_number' => $this->request->getVar('room_number'),
                'price' => $this->request->getVar('price'),
                'bed_qty' => $this->request->getVar('bed_qty'),
                'people_qty' => $this->request->getVar('max_people'),
                'room_img' => $fileName
            ];
    
            if ($model->insert($data)) {
                return $this->response->setJSON([
                    'status' => true,
                    'msg' => "เพิ่มข้อมูลห้องพักสำเร็จ",
                    'type' => "success"
                ]);
            } else {
                return $this->response->setJSON([
                    'status' => false,
                    'msg' => "เพิ่มข้อมูลห้องพักไม่สำเร็จ",
                    'type' => "error"
                ]);
            }
        } else {
            // $data['validation'] = $this->validator;
            // return view('/admin/addRoom', $data);
            $msg = "กรุณากรอกข้อมูลให้ครบถ้วน"; 
            if($model->where('room_number',$this->request->getVar('room_number'))->countAllResults() != 0) {
                $msg = "มีเลขห้องดังกล่าวอยู่ในระบบแล้ว";
            }
            return $this->response->setJSON(array('status'=>false, "msg"=>"{$msg}", "type"=>"error"));
        }
    }
    public function update() {
        $id = $this->request->getVar('room_id');
        $rules = [
            'room_number' => 'required',
            'bed_qty' => 'required',
            'price' => 'required',
            'max_people' => 'required',
        ];
        if($this->validate($rules)) {
            $model = new RoomModel();
            if($this->request->getFile('room_img') != "") {
                $file = $this->request->getFile('room_img')->getName();
                $this->request->getFile('room_img')->move('img/room/',$file);               
            }else{
                $roomImg = $model->where('id',$id)->findAll();
                $file = $roomImg[0]['room_img'];
            }
            $data = [
                'room_number' => $this->request->getVar('room_number'),
                'price' => $this->request->getVar('price'),
                'bed_qty' => $this->request->getVar('bed_qty'),
                'people_qty' => $this->request->getVar('max_people'),
                'room_img' => $file
            ];
            if($model->set($data)->where('id',$id)->update()) {
                return $this->response->setJSON(['status'=>true, 'msg'=>'แก้ไขข้อมูลห้องพักสำเร็จ', 'type'=>'success']);
            }else{
                return $this->response->setJSON(['status'=>false, 'msg'=>'ดำเนินการไม่สำเร็จ','type'=>'error']);
            }
        }else{
            return $this->response->setJSON(['status'=>false, 'msg'=>'กรุณากรอกข้อมูลให้ครบถ้วน','type'=>'error']);
        }
    }
    public function delete() {
        $model = new RoomModel();
        if($model->where('id',$this->request->getVar('id'))->delete()) {
            return $this->response->setJSON(['status'=>true, 'msg'=>'ลบข้อมูลห้องพักสำเร็จ', 'type'=>'success']);
        }else{
            return $this->response->setJSON(['status'=>false, 'msg'=>'ลบข้อมูลห้องพักไม่สำเร็จ', 'type'=>'error']);
        }
    }
    public function profile() {
        $rules = [
            'username' => 'required|min_length[3]|max_length[20]',
            'fname' => 'required|min_length[5]|max_length[50]',
            'lname' => 'required|min_length[5]|max_length[50]',
            'email' => 'required|min_length[6]|max_length[50]|valid_email',
        ];
        if($this->validate($rules)) {
            $model = new UserModel();
            if($this->request->getFile("user_img") != "") {
                $file = $this->request->getFile("user_img")->getName();
                $this->request->getFile('user_img')->move('img/profile/',$file);
            }else{
                $userImg = $model->select('user_img')->where('user_id',session()->get('user_id'))->findAll();
                $file = $userImg[0]['user_img'];
            }
            $data = [
                'username' => $this->request->getVar('username'),
                'fname' => $this->request->getVar('fname'),
                'lname' => $this->request->getVar('lname'),
                'email' => $this->request->getVar('email'),
                'user_img'=>$file,
            ];
            if($model->set($data)->where('user_id',session()->get('user_id'))->update()) {
                return $this->response->setJSON(['status'=>true, 'msg'=>'ข้อมูลส่วนตัวสำเร็จ', 'type'=>'success']);
            }else{
                return $this->response->setJSON(['status'=>false, 'msg'=>'ข้อมูลส่วนตัวไม่สำเร็จ', 'type'=>'success']);
            }
        }else{
            return $this->response->setJSON(['status'=>false, 'msg'=>'กรุณากรอกข้อมูลให้ครบถ้วน','type'=>'error']);
        }
    }
    public function forgetPassword() {
        $rules = [
            'oldpass' => 'required',
            'newpass' => 'required',
            'compass' => 'required|matches[newpass]',
        ];
        
        // สร้าง error message สำหรับการ validate
        $messages = [
            'compass' => [
                'matches' => 'การยืนยันรหัสผ่านไม่ตรงกัน'
            ],
            'newpass' => [
                'required' => 'กรุณากรอกรหัสผ่านใหม่ที่ต้องการเปลี่ยน',
            ],
            'oldpass' => [
                'required' => 'กรุณากรอกรหัสผ่านปัจจุบันที่ต้องการเปลี่ยน',
            ],
        ];

        if($this->validate($rules, $messages)) {
            $model = new UserModel();
            $user = $model->select('password')->where('user_id',session()->get('user_id'))->first();
            if(password_verify($this->request->getVar('oldpass'),$user['password'])) {
                $data['password'] = password_hash($this->request->getVar('newpass'),PASSWORD_BCRYPT);
                if($model->set($data)->where('user_id',session()->get('user_id'))->update()) {
                    return $this->response->setJSON(['status'=>true, 'msg'=>'เปลี่ยนรหัสผ่านสำเร็จ','type'=>'success']);
                }else{
                    return $this->response->setJSON(['status'=>false, 'msg'=>'เปลี่ยนรหัสผ่านไม่สำเร็จ','type'=>'error']);
                }
            }else{
                return $this->response->setJSON(['status'=>false, 'msg'=>'รหัสผ่านปัจจุบันไม่ตรงกัน','type'=>'error']);
            }
        }else{
                    $errors = $this->validator->getErrors();
        $error = false;

        if (array_key_exists('oldpass', $errors)) {
            $error = $errors['oldpass'];
        } else if (array_key_exists('newpass', $errors)) {
            $error = $errors['newpass'];
        } else if (array_key_exists('compass', $errors)) {
            $error = $errors['compass'];
        }

            return $this->response->setJSON([
                'status'=>false,
                'msg' => "{$error}",
                'type' => 'error'
            ]);

        }
        
    }
    public function checkIn(){
        $model = new BookingModel();
        if($model->set('c_status',2)->where('b_id',$this->request->getVar('id'))->update()) {
            return $this->response->setJSON(['status'=>true, "msg"=>"ดำเนินการสำเร็จ","type"=>"success"]);

        }else{
            return $this->response->setJSON(['status'=>false, "msg"=>"ดำเนินการไม่สำเร็จ","type"=>"error"]);

        }
    }
    public function cancel(){
        $model = new BookingModel();
        $Room = new RoomModel();
        if($model->set('c_status',999)->where('b_id',$this->request->getVar('id'))->update() && $Room->set('is_active',0)->where('id',$this->request->getVar('room'))->update()) {
            return $this->response->setJSON(['status'=>true, "msg"=>"ดำเนินการสำเร็จ","type"=>"success"]);

        }else{
            return $this->response->setJSON(['status'=>false, "msg"=>"ดำเนินการไม่สำเร็จ","type"=>"error"]);

        }
    }
    public function checkOut(){
        $model = new BookingModel();
        $Room = new RoomModel();

        if($model->set('c_status',3)->where('b_id',$this->request->getVar('id'))->update() && $Room->set('is_active',0)->where('id',$this->request->getVar('room'))->update()) {
            return $this->response->setJSON(['status'=>true, "msg"=>"ดำเนินการสำเร็จ","type"=>"success"]);

        }else{
            return $this->response->setJSON(['status'=>false, "msg"=>"ดำเนินการไม่สำเร็จ","type"=>"error"]);

        }
    }
    
}