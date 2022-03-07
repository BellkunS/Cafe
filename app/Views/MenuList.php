<?= $this->extend('layouts/admin'); ?>
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
<div class="container">
        <h3>Data Menu</h3>
        <button class="btn btn-primary mb-2" data-target="#addMenu" data-toggle="modal">Tambah Data</button>
        <table class="table table-bordered">
            <thead>
                <th>No</th>
                <th>Nama</th>
                <th>Harga</th>
                <th>Stock</th>
                <th>Jenis</th>
                <th>Option</th>
            </thead>
            <tbody>
            <?php
            $no=1;
            foreach($data as $row):
            ?> 
                    <tr>
                    <td><?= $no?></td>
                    <td><?= $row['nama']?></td>
                    <td><?= $row['harga']?></td>
                    <td><?= $row['stock']?></td>
                    <td><?= $row['jenis']?></td>
                    <td>
                        <a href="#" class="btn btn-edit btn-warning" data-target="#editMenu-<?=$row['id']?>" data-toggle="modal">Edit</a>
                        <a href="<?= base_url('MenuController/delete/'.$row['id'])?>" onclick="return confirm('Yakin Mau Di Hapus?')" class="btn btn-danger">Hapus</a>
                    </td>
                </tr>
<form action="<?= base_url('menu/edit/'.$row['id'])?>" method="post">
    <div class="modal fade" id="editMenu-<?=$row['id']?>" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">Edit Menu</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" name="nama" placeholder="Makanan / Minuman / Cemilan" value="<?=$row['nama'] ?>">
                    </div>
                    <div class="form-group">
                        <label>Harga</label>
                        <input type="number" class="form-control" name="harga" placeholder="HARGA" value="<?=$row['harga'] ?>">
                    </div>
                    <div class="form-group">
                        <label>Stock</label>
                        <input type="number" class="form-control" name="stock" placeholder="STOCK" value="<?=$row['stock'] ?>">
                    </div>
                    <div class="form-group">
                        <label>Jenis</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="jenis" id="flexRadioDefault1" value="makanan" <?= $row['jenis']=="makanan"?"checked":""?> >
                            <label class="form-check-label" for="flexRadioDefault1">Makanan</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="jenis" id="flexRadioDefault2" value="minuman" <?= $row['jenis']=="minuman"?"checked":""?> >
                            <label class="form-check-label" for="flexRadioDefault2">Minuman</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="jenis" id="flexRadioDefault3" value="cemilan" <?= $row['jenis']=="cemilan"?"checked":""?> >
                            <label class="form-check-label" for="flexRadioDefault3">Cemilan</label>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <button type="close" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</form>
            </tbody>
            <?php
            $no++;
            endforeach
            ?>
        </table>
</div>
<form action="<?=base_url('menu/')?>" method="post">
    <div class="modal fade" id="addMenu" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">Add Menu</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" name="nama" placeholder="Makanan / Minuman / Cemilan" >
                    </div>
                    <div class="form-group">
                        <label>Harga</label>
                        <input type="number" class="form-control" name="harga" placeholder="HARGA">
                    </div>
                    <div class="form-group">
                        <label>Stock</label>
                        <input type="number" class="form-control" name="stock" placeholder="STOCK">
                    </div>
                    <div class="form-group">
                        <label>Jenis</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="jenis" id="flexRadioDefault1" value="makanan"  >
                            <label class="form-check-label" for="flexRadioDefault1">Makanan</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="jenis" id="flexRadioDefault2" value="minuman"  >
                            <label class="form-check-label" for="flexRadioDefault2">Minuman</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="jenis" id="flexRadioDefault3" value="cemilan"  >
                            <label class="form-check-label" for="flexRadioDefault3">Cemilan</label>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <button type="close" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</form>
<?= $this->endsection();?>

