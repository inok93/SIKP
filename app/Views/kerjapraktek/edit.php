<?php echo view('_partials/header'); ?>
<?php echo view('_partials/sidebar'); ?>
 
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Edit Kerja Praktek</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Edit Kerja Praktek</li>
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
            <?php echo form_open_multipart('kerjapraktek/update/'.$kerjapraktek['ID_KP']); ?>
              <div class="card-header">Form Edit Produk</div>
              <div class="card-body">
                <?php echo form_hidden('ID_KP', $kerjapraktek['ID_KP']); ?>
                <div class="row">
                  <div class="col-md-8">
                    <div class="form-group"> 
                      <?php echo form_label('NIM', 'NIM'); ?>
                      <?php echo form_dropdown('NIM_KP', $mahasiswa, $kerjapraktek['NIM_KP'], ['class' => 'form-control']); ?>
                    </div>
                    <div class="form-group">
                      <?php echo form_label('NAMA', 'NAMA'); ?>
                      <?php echo form_input('NAMA_MHS_KP', $kerjapraktek['NAMA_MHS_KP'], ['class' => 'form-control', 'placeholder' => 'NAMA']); ?>
                    </div>
                    <div class="form-group">
                      <?php echo form_label('JUDUL', 'JUDUL'); ?>
                      <?php echo form_input('JUDUL_KP', $kerjapraktek['JUDUL_KP'], ['class' => 'form-control', 'placeholder' => 'JUDUL KP', 'type' => 'text']); ?>
                    </div>
                    <div class="form-group">
                      <?php echo form_label('TEMPAT KP', 'TEMPAT KP'); ?>
                      <?php echo form_input('TEMPAT_KP', $kerjapraktek['TEMPAT_KP'], ['class' => 'form-control', 'placeholder' => 'TEMPAT']); ?>
                    </div>
                    <div class="form-group">
                      <?php echo form_label('TANGGAL KP', 'TANGGAL KP'); ?>
                      <?php echo form_input('TANGGAL_KP', $kerjapraktek['TANGGAL_KP'], ['class' => 'form-control', 'placeholder' => 'TANGGAL']); ?>
                    </div>
                    <div class="form-group"> 
                      <?php echo form_label('DOSPEM', 'DOSPEM'); ?>
                      <?php echo form_dropdown('DOSPEM_KP', $dosen, $kerjapraktek['DOSPEM_KP'], ['class' => 'form-control']); ?>
                    </div>
                    <div class="form-group">
                      <?php echo form_label('DISETUJUI DOSPEM', 'DISETUJUI DOSPEM'); ?>
                      <?php echo form_dropdown('DISETUJUI_DOSPEM_KP', ['' => 'Pilih', '1' => 'Setuju','0' => 'Tolak'], $kerjapraktek['DISETUJUI_DOSPEM_KP'], ['class' => 'form-control']); ?>
                    </div>
                    <div class="form-group">
                      <?php echo form_label('DISETUJUI KAPRODI', 'DISETUJUI KAPRODI'); ?>
                      <?php echo form_dropdown('DISETUJUI_KAPRO', ['' => 'Pilih', '1' => 'Setuju','0' => 'Tolak'], $kerjapraktek['DISETUJUI_KAPRO'], ['class' => 'form-control']); ?>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer">
                  <a href="<?php echo base_url('kerjapraktek'); ?>" class="btn btn-outline-info">Back</a>
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