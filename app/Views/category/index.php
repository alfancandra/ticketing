<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>Data Category</h3>
        </div>
        <div class="card-body">
            <a href="<?= base_url('/category/create'); ?>" class="btn btn-primary">Tambah</a>
            <hr />
            <table class="table table-bordered">
                <tr>
                    <th>No</th>
                    <th>Category</th>
                    <th>Priority</th>
                    <th>Action</th>
                </tr>
                <?php
                $no = 1;
                foreach ($category as $row) {
                ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $row['category']; ?></td>
                        <td><?php if($row['statusUrgent']==1){
                            echo "<span class='text-danger'>Critical</span>";
                        }elseif($row['statusUrgent']==2){
                            echo "<span class='text-warning'>Normal</span>";
                        }else{
                            echo "<span class='text-success'>Low</span>";
                        } ?></td>
                        <td>
                            <a title="Edit" href="" class="btn btn-success">Edit</a>
                            <a title="Delete" href="" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ?')">Delete</a>
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