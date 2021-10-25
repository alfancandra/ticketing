<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

    <?php if (!empty(session()->getFlashdata('error'))) : ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <?php echo session()->getFlashdata('error'); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>
    <?php if (!empty(session()->getFlashdata('message'))) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?php echo session()->getFlashdata('message'); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>
    <div class="container mt-3">
        <form action="<?= base_url('ticket/store') ?>" method="post">
            <?= csrf_field(); ?>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Nama</label>
                <input type="text" name="nama" class="form-control" value="<?= old('nama') ?>" placeholder="Input Nama Lengkap">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" value="<?= old('email') ?>" placeholder="Input Email">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Category</label>
                <select class="form-select" name="category_id" aria-label="Default select example">
                    <?php
                    foreach ($category as $row) {
                        ?>
                        <option value="<?= $row['id']; ?>"><?= $row['category']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Pesan</label>
                <textarea class="form-control" value="<?= old('message') ?>" name="message" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <div class="mb-3">
                <button class="btn btn-success" type="submit">Kirim</button>
            </div>
        </form>
    </div>
    <?= $this->endSection('content'); ?>