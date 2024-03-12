<?php namespace App\Controllers;

use App\Models\BookingModel;
use App\Models\RoomModel;
use App\Models\UserModel;
use CodeIgniter\Controller;
class User extends BaseController
{
    public function index($page = 'index', $id = null) {
        $session = session();
        if (!is_file(APPPATH . 'Views/user/' . $page . '.php')) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
        }

        $model = new UserModel();
        $User = $model->where('user_id',$session->get('user_id'))->findAll();

        $RoomModel = new RoomModel();
        $BookinkModel = new BookingModel();
        $Room = $RoomModel->where("is_active",0)->orderBy('id', 'asc')->findAll();
        $dataRoom = false;
        $dataBooking = false;
        $dataHistory = false;
        if($id != null) {
            $singRoom = $RoomModel->where('id',$id)->findAll();
            $dataRoom = $singRoom;
        }
        if($page == 'myBooking') {
            
            $where = [
                'user' => session()->get('user_id'),
                'c_status <=' => 2
            ];
            $dataBooking = $BookinkModel->join('tb_room','tb_booking.room = tb_room.id')->where($where)->findAll();

        }
        if($page == 'history') {
            $where = [
                'tb_booking.user' => session()->get("user_id"),
                'tb_booking.c_status >' => 2
            ];

            $dataHistory = $BookinkModel->join('tb_room','tb_booking.room = tb_room.id')->where($where)->findAll();
        }
        $data = [
            'title' => ucfirst($page), // กำหนด title โดยใช้ ucfirst เพื่อทำให้ตัวแรกเป็นตัวใหญ่
            'profile' => $User,
            'rooms' => $Room,
            'dataRoom' => $dataRoom,
            'dataBooking' => $dataBooking,
            'histories' => $dataHistory
        ];
        
        // กำหนด layout ที่จะใช้
        // echo view('da', $data);

        // แสดงหน้าที่เลือก
        // return $this->request->getUri(1);
        echo view('/user/'.$page, $data);
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
    public function booking() {
        $rules = [
            'check_in' => 'required',
            'check_out' => 'required'
        ];
        if($this->validate($rules)){
            $model = new BookingModel();
            $roomModel = new RoomModel();
        $data = [
            'room' => $this->request->getVar('room'),
            'total_price' => $this->request->getVar('total_price'),
            'c_status' => 1,
            'check_in' => $this->request->getVar('check_in'),
            'check_out' => $this->request->getVar('check_out'),
            'user' => session()->get('user_id')
        ];
        if($model->insert($data) && $roomModel->set('is_active',1)->where('id',$this->request->getVar('room'))->update()){
            return $this->response->setJSON(['status' => true, "msg" => "จองห้องพักสำเร็จ" , "type" => "success"]);
        }else{
            return $this->response->setJSON(['status' => false, "msg" => "จองห้องพักไม่สำเร็จ" , "type" => "error"]);
        }
        }else{
            return $this->response->setJSON(['status' => false, "msg" => "กรุณาเลือกวันที่" , "type"=>"error"]);
        }
    }
    
}