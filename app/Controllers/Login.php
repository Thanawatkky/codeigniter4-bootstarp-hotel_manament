<?php namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\UserModel;

class Login extends BaseController 
{
    public function index() {
        $data = [];
        helper('form');
        return view('login',$data);
    }
    public function auth() {
        $session = session();
        $rules = [
            'email' => 'required|min_length[6]|max_length[20]|valid_email',
            'password' => 'required'
        ];
        if($this->validate($rules)) {
            $model = new UserModel();
            $email = $this->request->getVar('email');
            $password = $this->request->getVar('password');
            $data = $model->where("email",$email)->first();
           if($data) {
            if(password_verify($password, $data['password'])) {
                $sess_data = [
                    'user_id'=>$data['user_id'],
                    'username'=>$data['username'],
                    'fname'=>$data['fname'],
                    'lname'=>$data['lname'],
                    'email'=>$data['email'],
                    'logged_in'=>TRUE
                ];
                $session->set($sess_data);
                if($data['user_role'] == 1) {
                    return $this->response->redirect(base_url('/admin/dashboard'));
                }else{
                    return $this->response->redirect(base_url('/user/index'));
                }
            }else{
                $session->setFlashdata("msg","รหัสผ่านไม่ถูกต้อง");
            return $this->response->redirect(base_url('Login'));
            }
           }else{
            $session->setFlashdata("msg","ไม่พบอีเมลนี้ในระบบ");
            return $this->response->redirect(base_url('Login'));
           }
        }else{
            $data['validation'] = $this->validator;
            return view('login',$data);
        }
    }
    public function logout() {
        $session = session();
        $session->destroy();
        return $this->response->redirect(base_url('Login'));
    }
}