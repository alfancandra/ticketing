<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container-fluid">

    <div class="card">
        <div class="card-header">
            <h3>Data Ticket Non Aktif</h3>
        </div>
        <div class="card-body">
            <?php if (!empty(session()->getFlashdata('message'))) : ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?php echo session()->getFlashdata('message'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>
            <hr />
            <table class="table table-striped" id="table1">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Status</th>
                    <th>Email</th>
                    <th>Category</th>
                    <th>Pesan</th>
                    <th>Priority</th>
                    <th>Update Terakhir</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $no = 1;
                foreach ($ticket as $row) {
                ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $row['nama']; ?></td>
                        <td><?php if($row['statusTicket']==0){
                            echo "<span class='text-danger'>Belum Diatasi</span>";
                        }elseif($row['statusTicket']==1){
                            echo "<span class='text-success'>Sudah Diatasi</span>";
                        }else{
                            echo 'Tidak Dapat Diatasi';
                        } ?></td>
                        <td><?= $row['email']; ?></td>
                        <td><?= $row['category']; ?></td>
                        <td style="max-width:200px;white-space: nowrap;overflow: hidden;text-overflow: ellipsis;">
                            <?= $row['message']; ?></td>
                        <td><?php if($row['statusUrgent']==1){
                            echo "<span class='text-danger'>Critical</span>";
                        }elseif($row['statusUrgent']==2){
                            echo "<span class='text-warning'>Normal</span>";
                        }else{
                            echo "<span class='text-success'>Low</span>";
                        } ?></td>
                        <td><?= date('d-F-Y H:i', strtotime($row['tanggal_update'])); ?></td>
                        <td>
                            <a href="<?php echo base_url().'/ticket/'.$row['idticket']; ?>" class="btn btn-primary">Show</a>
                            <a title="Edit" href="<?= base_url("pegawai/edit/"); ?>" class="btn btn-success">Edit</a>
                            <a title="Delete" href="<?= base_url("pegawai/delete/") ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ?')">Delete</a>
                        </td>
                    </tr>
                <?php
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    $(document).ready( function () {
        $('#table1').DataTable({
            "order": [[ 0, "desc" ]]
        });
    } );
</script>
<?= $this->endSection('content'); ?>