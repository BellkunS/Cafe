<?= $this->extend('layouts/admin')?>
<?= $this->section('content')?>
<?php
 if (session()->getFlashdata('success')){
?>
<div class="alert alert-success alert-dismissible fade show" role="alert">
<?= session()->getFlashdata('success')?>
<button type="button" class="close" data-dismiss="alert" aria-label="close">Succes</button>
</div>
<?php
 }
 ?>
<div class="row">
    <div class="col-md-6">
        <form action="<?= base_url('pesan')?>" method="post">
        <div class="card shadow mb-3 border-left-primary">
            <div class="card-body">
                <div class="form-group">
                    <label for="menu">Menu</label>
                    <select name="menu_id" id="menu_id" class="form-control">
                        <option value="">=== Silahkan Pilih Menu</option>
                        <?php
                        foreach($menus as $key =>$val){
                            ?>
                            <option value="<?= $val['id']?>"><?= $val['nama']?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="jumlah">Jumlah</label>
                    <input type="number" class="form-control" name="jumlah" id="jumlah">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Masukan Kranjang</button>
                </div>
            </div>
        </div>
        </form>
    </div>
    <div class="col-md-6">
        <form action="<?= base_url('pesans')?>" method="post">
            <div class="card shadow mb-3 border-left-primary">
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama_pemesan">Nama Pesanan</label>
                        <input type="text" class="form-control" name="nama_pemesan" id="nama_pemesan">
                    </div>
                    <div class="form-group">
                        <label for="no_meja">Nomer Meja</label>
                        <input type="number" class="form-control" name="no_meja" id="no_meja">
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="container">
    <div class="card">
        <card class="header">
            <h3 class="card-title">Pesanan</h3>
        </card>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
        <th>No</th>
        <th>Nama Pesanan</th>
        <th>Jumlah</th>
        <th>Harga</th>
        <th>Total Harga</th>
        <th>Option</th>
                </thead>
                <tbody>
                    <?php
                    if($menu != null){
                        $no = 0;
                        foreach($menu as $row){
                            $no++;
                            ?>
                            <tr>
                            <td><?= $no?></td>
                            <td><?= $row['nama']?></td>
                            <td><?= $row['jumlah']?></td>
                            <td><?= $row['harga']?></td>
                            <td><?= $row['harga'] * $row['jumlah']?></td>
                            <td>
                                <a href="<?= base_url('pesan/delete/'.$row['menu_id'])?>" class="btn btn-danger">Hapus</a>
                            </td>
                            </tr>
                            <?php
                        }
                    }?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer">
            <div class=""> 
                <button class="btn btn-primary">Bayar</button>
            </div>
    </div>
</div>
<?= $this->endsection()?> 