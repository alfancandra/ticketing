<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>Ticket </h3>
        </div>
        <div class="card-body">
            <?php foreach($ticket as $row){ ?>
              <form action="<?= base_url('ticket/sendmessage') ?>" method="post">
              <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                  <input type="hidden" name="id" value="<?= $row['idticket']; ?>">
                  <span class="form-control"><?= $row['nama']; ?></span>
                </div>
              </div>
              <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="hidden" name="email" value="<?= $row['email']; ?>">
                    <span class="form-control"><?= $row['email']; ?></span>
                </div>
              </div>
              <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Category</label>
                <div class="col-sm-10">
                    <span class="form-control"><?= $row['category']; ?></span>
                </div>
              </div>
              <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Message</label>
                <div class="col-sm-10">
                    <span class="ml-2"><?= $row['message']; ?></span>
                </div>
              </div>
              <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Update Terakhir</label>
                <div class="col-sm-10">
                  <span class="form-control"><?= $row['tanggal_update']; ?></span>
                </div>
              </div>
              <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Status</label>
                <div class="col-sm-10">
                  <?php if($row['statusTicket']==0){
                            echo "<span class='text-danger'>Belum Diatasi</span>";
                        }elseif($row['statusTicket']==1){
                            echo "<span class='text-success'>Sudah Diatasi</span>";
                        }else{
                            echo 'Tidak Dapat Diatasi';
                        } ?>
                </div>
              </div>
              <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Priority</label>
                <div class="col-sm-10">
                  <?php if($row['statusUrgent']==1){
                            echo "<span class='text-danger'>Critical</span>";
                        }elseif($row['statusUrgent']==2){
                            echo "<span class='text-warning'>Normal</span>";
                        }else{
                            echo "<span class='text-success'>Low</span>";
                        } ?>
                </div>
              </div>
              
              <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Kirim Pesan ke user</label>
                <div class="col-sm-10">
                    <div class="form-floating">
                      <textarea class="form-control" name="message" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                      
                    </div>
                </div>
              </div>
              <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10">
                  <button type="submit" class="btn btn-success">Kirim</button>
                </div>
              </div>
              </form>
              
              <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label"></label>
                <a title="Edit" onclick="return confirm('Yakin untuk Solve Ticket ini?');" href="<?php echo base_url().'/ticket/solved/'.$row['idticket']; ?>" class="btn btn-success">Solved</a>
                
              </div>

          <?php } ?>
        </div>
    </div>
</div>
<?= $this->endSection('content'); ?>