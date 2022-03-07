<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\DetailModel;
class DetailController extends Controller{

    public function __construct()
    {
        $this->detail = new DetailModel ;
    }

    public function tampil()
    {
        $data['data'] = $this->detail->findAll();
        return view('DetailList',$data);
    }
}