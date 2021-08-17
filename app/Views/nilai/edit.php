<?php echo view('_partials/header'); ?>
<?php echo view('_partials/sidebar'); ?>
 
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Edit Nilai</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Edit Nilai</li>
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
            <?php echo form_open_multipart('nilai/update/'.$nilai['ID_NILAI']); ?>
              <div class="card-header">Form Edit Produk</div>
              <div class="card-body">
                <?php echo form_hidden('ID_NILAI', $nilai['ID_NILAI']); ?>
                <div class="row">
                  <div class="col-md-8">
                  <div class="form-group"> 
                      <?php echo form_label('ID KP', 'ID KP'); ?>
                      <?php echo form_dropdown('ID_KP', $kerjapraktek, $nilai['ID_KP'], ['class' => 'form-control']); ?>
                    </div>
                    <div class="form-group"> 
                      <?php echo form_label('NIM', 'NIM'); ?>
                      <?php echo form_dropdown('NIM_NILAI', $mahasiswa, $nilai['NIM_NILAI'], ['class' => 'form-control']); ?>
                    </div>
                    <div class="form-group">
                      <?php echo form_label('NAMA', 'NAMA'); ?>
                      <?php echo form_input('NAMA_NILAI', $nilai['NAMA_NILAI'], ['class' => 'form-control', 'placeholder' => 'NAMA']); ?>
                    </div>
                    <div class="form-group">
                      <?php echo form_label('JUDUL', 'JUDUL'); ?>
                      <?php echo form_input('JUDUL_KP_NILAI', $nilai['JUDUL_KP_NILAI'], ['class' => 'form-control', 'placeholder' => 'JUDUL KP', 'type' => 'text']); ?>
                    </div>
                    <div class="form-group">
                      <?php echo form_label('TEMPAT KP', 'TEMPAT KP'); ?>
                      <?php echo form_input('TEMPAT_KP_NILAI', $nilai['TEMPAT_KP_NILAI'], ['class' => 'form-control', 'placeholder' => 'TEMPAT']); ?>
                    </div>
                    <div class="form-group">
                      <?php echo form_label('TANGGAL KP', 'TANGGAL KP'); ?>
                      <?php echo form_input('TANGGAL_NILAI', $nilai['TANGGAL_NILAI'], ['class' => 'form-control', 'placeholder' => 'TANGGAL']); ?>
                    </div>
                    <div class="form-group">
                      <?php echo form_label('STATUS', 'STATUS'); ?>
                      <?php echo form_dropdown('STATUS', ['' => 'Pilih', '1' => 'Setuju','0' => 'Tolak'], $nilai['STATUS'], ['class' => 'form-control']); ?>
                    </div>
                    <div class="form-group"> 
                      <?php echo form_label('DOSPEM', 'DOSPEM'); ?>
                      <?php echo form_dropdown('DOSPEM', $dosen, $nilai['DOSPEM'], ['class' => 'form-control']); ?>
                    </div>
                    
                    <div class="form-group">
                      <?php echo form_label('NILAI', 'NILAI'); ?>
                      <?php echo form_input('NILAI', $nilai['NILAI'], ['class' => 'form-control', 'placeholder' => 'NILAI']); ?>
                    </div>
                    <div class="form-group">
                      <?php echo form_label('KETERANGAN', 'KETERANGAN'); ?>
                      <?php echo form_input('KETERANGAN', $nilai['KETERANGAN'], ['class' => 'form-control', 'placeholder' => 'KETERANGAN']); ?>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer">
                  <a href="<?php echo base_url('nilai'); ?>" class="btn btn-outline-info">Back</a>
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