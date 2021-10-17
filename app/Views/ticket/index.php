<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>Data Ticket</h3>
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
            <a href="<?= base_url('/pegawai/create'); ?>" class="btn btn-primary">Tambah</a>
            <hr />
            <table class="table table-bordered">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Category</th>
                    <th>Pesan</th>
                    <th>Status</th>
                    <th>Priority</th>
                    <th>Action</th>
                </tr>
                <?php
                $no = 1;
                foreach ($ticket as $row) {
                ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $row['nama']; ?></td>
                        <td><?= $row['email']; ?></td>
                        <td><?= $row['category']; ?></td>
                        <td><?= $row['message']; ?></td>
                        <td><?php if($row['statusTicket']==0){
                            echo 'Belum Diatasi';
                        }elseif($row['statusTicket']==1){
                            echo 'Sudah Diatasi';
                        }else{
                            echo 'Tidak Dapat Diatasi';
                        } ?></td>
                        <td><?php if($row['statusUrgent']==1){
                            echo "<span class='text-danger'>Critical</span>";
                        }elseif($row['statusUrgent']==2){
                            echo "<span class='text-warning'>Normal</span>";
                        }else{
                            echo "<span class='text-success'>Low</span>";
                        } ?></td>
                        <td>
                            <a title="Edit" href="<?= base_url("pegawai/edit/$row->id"); ?>" class="btn btn-info">Edit</a>
                            <a title="Delete" href="<?= base_url("pegawai/delete/$row->id") ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ?')">Delete</a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection('content'); ?>