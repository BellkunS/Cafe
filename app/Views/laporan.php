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
<div class="row">
    <div class="col-md-6">
        <h3 class="h1">LAPORAN</h3>
    
        <table class="table table-bordered">
            <thead>
                <th>No</th>
                <th>Tanggal</th>
                <th>Nama Pemesan</th>
                <th>No Meja</th>
                <th>Total Harga</th>
            </thead>
            <tbody>
                <?php
                $no=1;
                foreach($laporan as $row):
                ?> 
                    <tr>
                    <td><?= $no?></td>
                    <td><?= $row['tgl']?></td>
                    <td><?= $row['nama_pemesan']?></td>
                    <td><?= $row['no_meja']?></td>
                    <td><?= $row['total_harga']?></td>
                </tr>
            </tbody>
            <?php
            $no++;
            endforeach
            ?>
        </table>
    </div>
    <div class="col-md-6">
            <h3 class="h1">Details</h3>
            <table class="table table-bordered">
                <thead>
                    <th>No</th>
                    <th>N0 Pesanan</th>
                    <th>Menu</th>
                    <th>Jumlah</th>
                </thead>
                <tbody>
                <?php
                $no=1;
                foreach($detail as $row):
                ?> 
                    <tr>
                        <td><?= $no?></td>
                        <td><?= $row['pesanan_id']?></td>
                        <td><?= $row['menu_id']?></td>
                        <td><?= $row['jumlah']?></td>
                    </tr>
                </tbody>
                <?php
                $no++;
                endforeach
                ?>
            </table>
    </div>
</div>
<?= $this->endsection();?>

