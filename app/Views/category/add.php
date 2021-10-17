<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="card">
	<div class="card-header">
		<h3>Data Category</h3>
	</div>
	<div class="card-body">
		<div class="container mt-3">
        <form action="<?= base_url('category/store') ?>" method="post">
            <?= csrf_field(); ?>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Category</label>
                <input type="text" name="category" class="form-control" value="<?= old('category') ?>" placeholder="Input Nama Category">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Status</label>
                <select class="form-select" name="statusUrgent" aria-label="Default select example">
                    <option value="3"><span class="text-success">Low</span></option>
                    <option value="2"><span class="text-warning">Normal</span></option>
                    <option value="1"><span class="text-danger">Critical</span></option>
                </select>
            </div>
            <div class="mb-3">
                <button class="btn btn-success" type="submit">Kirim</button>
            </div>
        </form>
    	</div>
	</div>

</div>
<?= $this->endSection('content'); ?>