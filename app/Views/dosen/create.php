<?php echo view('_partials/header'); ?>
<?php echo view('_partials/sidebar'); ?>
 
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Create Dosen</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Create Dosen</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
 
  <div class="content">
    <div class="container-fluid">
      <div class="row">
          <div class="col-md-12">
            <form action="<?php echo base_url('dosen/store'); ?>" method="post">
              <div class="card">
                <div class="card-body">
                  <?php 
                  $inputs = session()->getFlashdata('inputs');
                  $errors = session()->getFlashdata('errors');
                  if(!empty($errors)){ ?>
                  <div class="alert alert-danger" role="alert">
                    Whoops! Ada kesalahan saat input data, yaitu:
                    <ul>
                    <?php foreach ($errors as $error) : ?>
                        <li><?= esc($error) ?></li>
                    <?php endforeach ?>
                    </ul>
                  </div>
                  <?php } ?>
 
                  <div class="form-group">
                      <label for="">NIP</label>
                      <input type="number" class="form-control" name="NIP" placeholder="Enter NIP" value="<?php echo $inputs['NIP']; ?>">
                  </div>

                  <div class="form-group">
                      <label for="">Nama</label>
                      <input type="text" class="form-control" name="NAMA_DOSEN" placeholder="Enter name" value="<?php echo $inputs['NAMA_DOSEN']; ?>">
                  </div>
                  <div class="form-group">
                      <label for="">PASSWORD</label>
                      <input type="text" class="form-control" name="PASSWORD_DOSEN" placeholder="Enter PASSWORD" value="<?php echo $inputs['PASSWORD_DOSEN']; ?>">
                  </div>
                  <div class="form-group">
                      <label for="">Pilih Jabatan</label>
                      <select name="LEVEL" id="" class="form-control">
                          <option value="">Pilih Jabatan</option>
                          <option <?php echo $inputs['LEVEL'] == "1" ? "selected" : ""; ?> value="1">DOSEN</option>
                          <option <?php echo $inputs['LEVEL'] == "2" ? "selected" : ""; ?> value="2">KAPRODI</option>
                      </select>
                  </div>
                </div>
                <div class="card-footer">
                    <a href="<?php echo base_url('dosen'); ?>" class="btn btn-outline-info">Back</a>
                    <button type="submit" class="btn btn-primary float-right">Simpan</button>
                </div>
              </div>
            </form>
          </div>
      </div>
    </div>
  </div>
</div>
<?php echo view('_partials/footer'); ?>