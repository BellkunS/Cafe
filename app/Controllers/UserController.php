<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;
class UserController extends Controller{
    public function __construct()
    {
        $this->users = new UserModel();
    }

    public function tampil()
    {
        $data['data'] = $this->users->findAll();
        return view('UserList',$data);
    }
    public function create()
    {
        $data = array(
        'nama'=>$this->request->getPost('nama'),
        'username'=>$this->request->getPost('username'),
        'password'=>password_hash($this->request->getPost('password'),PASSWORD_DEFAULT),
        'role'=>$this->request->getPost('role')
        );
        $this->users->insert($data);
        return redirect('user')->with('success','Data Berhasi Disimpan');;
    }
    public function delete($id)
    {
        $this->users->delete($id);
        return redirect('user')->with('success','Data Berhasi Di Delete');
    }
    public function Edit($id)
    {
        $data = array(
            'nama'=>$this->request->getPost('nama'),
            'username'=>$this->request->getPost('username'),
            'role'=>$this->request->getPost('role')
            );
            $this->users->update($id,$data);
            return redirect('user')->with('success','Data Berhasi Di Edit');
    }
    public function tlogin()
    {
        return \view('login');
    }
    public function login()
    {
        $session = session();
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $data = $this->users->where('username',$username)->first();
        if($data){
            $pass = $data['password'];
            $cek_pass = password_verify($password,$pass);
            if($cek_pass){
                $ses_data = [
                    'id' =>$data['id'],
                    'username' =>$data['username'],
                    'role'=> $data['role'],
                ];
                $session->set($ses_data);
                return \redirect()->to('/dashboard');
            }else{
                $session->setFlashdata('msg','Password Salah');
                return \redirect('login');
            }
        }else{
            $session->getFlashdata('msg','Username Salah');
            return \redirect('login');
        }
    }

    public function logout()
    {
       $session = session();
       $session->destroy();
       return redirect('login');
    }
}