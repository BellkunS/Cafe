<?= $this->extend('layouts/admin')?>
<?= $this->section('content')?>
    <div class="container">
        <h3>Data Detail Pesanan</h3>
        <table class="table table-bordered">
            <thead>
                <th>No</th>
                <th>No Pesanan</th>
                <th>No Meja</th>
                <th>User ID</th>
            </thead>
            <?php
            $no=1;
            foreach($data as $row):
            ?> 
            <tbody>
                <tr>
                    <td><?= $no?></td>
                    <td><?= $row['pesanan_id']?></td>
                    <td><?= $row['no_meja']?></td>
                    <td><?= $row['user_id']?></td>
                </tr>
            </tbody>
            <?php
            $no++;
            endforeach
            ?>
        </table>
    </div>

    <?= $this->endsection();?>