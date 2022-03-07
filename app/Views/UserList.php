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
<div class="container">
    <h3>Data User</h3>
    <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#addUser">Tambah Data</button>
    <table class="table table-bordered">
        <thead>
            <th>No</th>
            <th>Nama</th>
            <th>Username</th>
            <th>Role</th>
            <th>Option</th>
        </thead>
        <tbody>
            <?php
            $no=1;
            foreach ($data as $row):
            ?>
            <tr>
                <td><?=$no?></td>
                <td><?=$row['nama']?></td>
                <td><?=$row['username']?></td>
                <td><?=$row['role']?></td>
                <td>
                    <a href="#" class="btn btn-warning btn-edit" data-target="#editUser-<?=$row['id']?>" data-toggle="modal">Edit</a>   
                    <a href="<?= base_url('UserController/delete/'.$row['id'])?>" onclick="return confirm('Yakin Mau Dihapus?')" class="btn btn-danger btn-hapus">Hapus</a>
                </td> 
            </tr>
            
<form action="<?=base_url('user/edit/'.$row['id'])?>" method="post">
    <div class="modal fade" id="editUser-<?=$row['id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" name="nama" placeholder="Nama User" value="<?=$row['nama'] ?>">
                    </div>
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" name="username" placeholder="Username" value="<?=$row['username'] ?>">
                    </div>
                    
                    <div class="form-group">
                        <label>Role</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="role"  value="kasir" <?= $row['role']=="kasir"?"checked":""?> >
                            <label class="form-check-label">Kasir</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="role"  value="manager" <?= $row['role']=="manager"?"checked":""?> >
                            <label class="form-check-label">Manager</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="role"  value="admin" <?= $row['role']=="admin"?"checked":""?> >
                            <label class="form-check-label">Admin</label>
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


            <?php
            $no++;
            endforeach
            ?>
        </tbody>
    </table>
</div>
<form action="<?=base_url('user/')?>" method="post">
    <div class="modal fade" id="addUser" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">Add User</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" name="nama" placeholder="Nama" >
                    </div>
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" name="username" placeholder="Username">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" placeholder="PASSWORD">
                    </div>
                    <div class="form-group">
                        <label>Role</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="role" id="flexRadioDefault1" value="kasir"  >
                            <label class="form-check-label" for="flexRadioDefault1">Kasir</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="role" id="flexRadioDefault2" value="manager"  >
                            <label class="form-check-label" for="flexRadioDefault2">Manager</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="role" id="flexRadioDefault3" value="admin"  >
                            <label class="form-check-label" for="flexRadioDefault3">Admin</label>
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