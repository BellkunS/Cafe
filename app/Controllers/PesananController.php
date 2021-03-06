<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\PesananModel;
use App\Models\MenuModel;
use App\Models\DetailModel;
class PesananController extends Controller{
    protected $_REQUEST;
    public function __Construct()
    {
        $this->pesan = new PesananModel();
        $this->menu = new MenuModel();
        $this->pesandetail = new DetailModel();
        $this->session = session();
    }

    public function index()
    {
        $data['menus'] = $this->menu->select('id,nama')->findAll();
        if(session('cart') != null)
        {
            $data['menu']= array_values(session('cart'));
        }else{
            $data['menu'] = null;
        }
        return view('PesananList',$data);
    }

    public function addCart()
    {
        $id = $this->request->getPost('menu_id');
        $jumlah = $this->request->getPost('jumlah');
        $men = $this->menu->find($id);
        if($men){
        }
       $isi = array(
          'menu_id'=> $id,
          'nama'=>$men['nama'],
          'harga'=>$men['harga'],
          'jumlah'=>$jumlah
       );
       if($this->session->has('cart')){
          $index = $this->cek($id);
          $cart = array_values(session('cart'));
          if ($index == -1){
             array_push($cart,$isi);
          }else{
             $cart[$index]['jumlah'] +=$jumlah;
          }
          $this->session->set('cart',$cart);
       }else{
          $this->session->set('cart',array($isi));
       }
       return redirect('pesan')->with('succsess','Data Berhasil Ditambahkan'.$men['nama']);
     }
    public function cek($id)
    {
        $cart = array_values(session('cart'));
        for($i = 0; $i < count($cart); $i++){
            if($cart[$i]['menu_id'] == $id){
                return $i;
            }
        }
        return -1;
    }
    public function hapusCart($id)
    {
        $index =$this->cek($id);
        $cart =\array_values(session('cart'));
        unset($cart[$index]);
        $this->session->set('cart',$cart);
        return \redirect('pesan')->with('success','Data Berhasi Di Hapus');
    }

    public function simpan()
    {
        if(session('cart')!=null){
            date_default_timezone_set('Asia/Jakarta');
            $date = date('Y/m/d');
            $datatrans = array(
                'tgl' =>$date,
                'pesanan_id'=>1,
                'no_meja'=>$this->request->getPost('no_meja'),
                'nama_pemesan'=> $this->request->getPost('nama_pemesan'),
                'total_harga'=>'0',
            );
            $id = $this->pesan->insert($datatrans);
            $cart = array_values(session('cart'));
            $tHarga=0;
            foreach($cart as $val){
                $datadetail = array(
                    'pesanan_id'=>$id,
                    'menu_id'=>$val['menu_id'],
                    'jumlah'=>$val['jumlah'],
                );
                $tHarga += $val['jumlah']*$val['harga'];
                $this->pesandetail->insert($datadetail);
            }
            $dtHarga = array(
                'total_harga'=>$tHarga
            );
            $this->pesan->update($id,$dtHarga);
            $this->session->remove('cart');
            return \redirect('pesan')->with('success','Data Berhasi Disimpan');
        }
       
    }

}