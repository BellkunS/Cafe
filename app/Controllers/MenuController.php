<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\MenuModel;
class MenuController extends Controller{
    public function __construct()
    {
        $this->menus = new MenuModel();
    }
    public function tampil()
    {
        $data['data'] = $this->menus->findAll();
        return view('MenuList',$data);
    }
    public function create()
    {
        $data = array(
        'nama'=>$this->request->getPost('nama'),
        'harga'=>$this->request->getPost('harga'),
        'stock'=>$this->request->getPost('stock'),
        'jenis'=>$this->request->getPost('jenis')
        );
        $this->menus->insert($data);
        return redirect('menu')->with('success','Data Berhasi Disimpan');
    }
    public function delete($id)
    {
        $this->menus->delete($id);
        return redirect('menu')->with('success','Data Berhasi Delete');
    }

    public function edit($id)
    {
        $data=array(
            'nama'=>$this->request->getPost('nama'),
            'harga'=>$this->request->getPost('harga'),
            'stock'=>$this->request->getPost('stock'),
            'jenis'=>$this->request->getPost('jenis')
        );
        $this->menus->update($id,$data);
        return redirect('menu')->with('success','Data Berhasi Di Edit');
    }

}