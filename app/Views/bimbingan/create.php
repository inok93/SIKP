<?php echo view('_partials/header'); ?>
<?php echo view('_partials/sidebar'); ?>
 
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Create Bimbingan</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Create Bimbingan</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
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
          <?php echo form_open_multipart('bimbingan/store'); ?>
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group"> 
                    <?php 
                      echo form_label('ID KP', 'ID_KP');
                      echo form_dropdown('ID_KP', $kerjapraktek, $inputs['ID_KP'], ['class' => 'form-control']); 
                    ?>
                  </div>
          
                  <div class="form-group">
                    <?php 
                      echo form_label('URAIAN');
                      $nama_mhs_kp = [
                        'type'  => 'text',
                        'name'  => 'URAIAN',
                        'id'    => 'URAIAN',
                        'value' => $inputs['URAIAN'],
                        'class' => 'form-control',
                        'placeholder' => 'URAIAN'
                      ];
                      echo form_input($nama_mhs_kp); 
                    ?>
                  </div>
                 
                  <div class="form-group">
                    <?php 
                      echo form_label('DISETUJUI', 'DISETUJUI');
                      echo form_dropdown('VALID', ['' => 'Pilih', '1' => 'Setuju','0' => 'Tolak'], $inputs['VALID'], ['class' => 'form-control']); 
                    ?>
                  </div>
                 
              </div>
            </div>
            <div class="card-footer">
                <a href="<?php echo base_url('bimbingan'); ?>" class="btn btn-outline-info">Back</a>
                <button type="submit" class="btn btn-primary float-right">Simpan</button>
            </div>
          </div>
          <?php echo form_close(); ?>
        </div>
      </div>
    </div>
  </div>
</div>
<?php echo view('_partials/footer'); ?>