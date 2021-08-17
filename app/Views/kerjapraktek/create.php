<?php echo view('_partials/header'); ?>
<?php echo view('_partials/sidebar'); ?>
 
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Create Kerja Praktek</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Create Kerja Praktek</li>
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
          <?php echo form_open_multipart('kerjapraktek/store'); ?>
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group"> 
                    <?php 
                      echo form_label('NIM', 'NIM');
                      echo form_dropdown('NIM_KP', $mahasiswa, $inputs['NIM_KP'], ['class' => 'form-control']); 
                    ?>
                  </div>
                  <div class="form-group">
                    <?php 
                      echo form_label('NAMA');
                      $nama_mhs_kp = [
                        'type'  => 'text',
                        'name'  => 'NAMA_MHS_KP',
                        'id'    => 'NAMA_MHS_KP',
                        'value' => $inputs['NAMA_MHS_KP'],
                        'class' => 'form-control',
                        'placeholder' => 'NAMA MAHASISWA'
                      ];
                      echo form_input($nama_mhs_kp); 
                    ?>
                  </div>
                  <div class="form-group">
                    <?php 
                      echo form_label('JUDUL');
                      $judul_kp = [
                        'type'  => 'text',
                        'name'  => 'JUDUL_KP',
                        'id'    => 'JUDUL_KP',
                        'value' => $inputs['JUDUL_KP'],
                        'class' => 'form-control',
                        'placeholder' => 'JUDUL KERJA PRAKTEK'
                      ];
                      echo form_input($judul_kp); 
                    ?>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <?php 
                      echo form_label('TEMPAT KERJA PRAKTEK');
                      $tempat_kp = [
                        'type'  => 'text',
                        'name'  => 'TEMPAT_KP',
                        'id'    => 'TEMPAT_KP',
                        'value' => $inputs['TEMPAT_KP'],
                        'class' => 'form-control',
                        'placeholder' => 'TEMPAT KERJA PRAKTEK'
                      ];
                      echo form_input($tempat_kp); 
                    ?>
                  </div>

                  <div class="col-md-6">
                  <div class="form-group">
                    <?php 
                      echo form_label('TANGGAL KERJA PRAKTEK');
                      $tanggal_kp = [
                        'type'  => 'text',
                        'name'  => 'TANGGAL_KP',
                        'id'    => 'TANGGAL_KP',
                        'value' => $inputs['TANGGAL_KP'],
                        'class' => 'form-control',
                        'placeholder' => 'TANGGAL KERJA PRAKTEK'
                      ];
                      echo form_input($tanggal_kp); 
                    ?>
                  </div>

                  <div class="form-group"> 
                    <?php 
                      echo form_label('DOSEN PEMBIMBING', 'DOSPEM_KP');
                      echo form_dropdown('DOSPEM_KP', $dosen, $inputs['DOSPEM_KP'], ['class' => 'form-control']); 
                    ?>
                  </div>
                  <div class="form-group">
                    <?php 
                      echo form_label('DISETUJUI DOSPEM', 'DISETUJUI DOSPEM');
                      echo form_dropdown('DISETUJUI_DOSPEM_KP', ['' => 'Pilih', '1' => 'Setuju','0' => 'Tolak'], $inputs['DISETUJUI_DOSPEM_KP'], ['class' => 'form-control']); 
                    ?>
                  </div>
                  <div class="form-group">
                    <?php 
                      echo form_label('DISETUJUI KAPRO', 'DISETUJUI KAPRO');
                      echo form_dropdown('DISETUJUI_KAPRO', ['' => 'Pilih', '1' => 'Setuju','0' => 'Tolak' ], $inputs['DISETUJUI_KAPRO'], ['class' => 'form-control']); 
                    ?>
                  </div>
              </div>
            </div>
            <div class="card-footer">
                <a href="<?php echo base_url('kerjapraktek'); ?>" class="btn btn-outline-info">Back</a>
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