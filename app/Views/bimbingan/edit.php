<?php echo view('_partials/header'); ?>
<?php echo view('_partials/sidebar'); ?>
 
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Edit Bimbingan</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Edit Bimbingan</li>
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
          <div class="card">
            <?php echo form_open_multipart('bimbingan/update/'.$bimbingan['ID_BIMBINGAN']); ?>
              <div class="card-header">Form Edit Bimbingan</div>
              <div class="card-body">
                <?php echo form_hidden('ID_BIMBINGAN', $bimbingan['ID_BIMBINGAN']); ?>
                <div class="row">
                  <div class="col-md-8">
                  <div class="form-group"> 
                      <?php echo form_label('ID KP', 'ID KP'); ?>
                      <?php echo form_dropdown('ID_KP', $kerjapraktek, $bimbingan['ID_KP'], ['class' => 'form-control']); ?>
                    </div>
                    <div class="form-group">
                      <?php echo form_label('URAIAN', 'URAIAN'); ?>
                      <?php echo form_input('URAIAN', $bimbingan['URAIAN'], ['class' => 'form-control', 'placeholder' => 'NAMA']); ?>
                    </div>
                    <div class="form-group">
                      <?php echo form_label('DISETUJUI', 'DISETUJUI'); ?>
                      <?php echo form_dropdown('VALID', ['' => 'Pilih', '1' => 'Setuju','0' => 'Tolak'], $bimbingan['VALID'], ['class' => 'form-control']); ?>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer">
                  <a href="<?php echo base_url('bimbingan'); ?>" class="btn btn-outline-info">Back</a>
                  <button type="submit" class="btn btn-primary float-right">Update</button>
              </div>
            <?php echo form_close(); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php echo view('_partials/footer'); ?>