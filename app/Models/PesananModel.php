<?php 
namespace App\Models;

use CodeIgniter\Model;

class PesananModel extends Model{
    protected $table      = 'tb_pesanan';
    // Uncomment below if you want add primary key
     protected $primaryKey = 'id';
     protected $allowedFields = ['pesanan_id','tgl','nama_pemesan','no_meja','total_harga'];
}