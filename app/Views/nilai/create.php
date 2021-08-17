<?php echo view('_partials/header'); ?>
<?php echo view('_partials/sidebar'); ?>
 
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Create Nilai</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Create Nilai</li>
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
          <?php echo form_open_multipart('nilai/store'); ?>
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
                      echo form_label('NIM', 'NIM');
                      echo form_dropdown('NIM_NILAI', $mahasiswa, $inputs['NIM_NILAI'], ['class' => 'form-control']); 
                    ?>
                  </div>
                  <div class="form-group">
                    <?php 
                      echo form_label('NAMA');
                      $nama_mhs_kp = [
                        'type'  => 'text',
                        'name'  => 'NAMA_NILAI',
                        'id'    => 'NAMA_NILAI',
                        'value' => $inputs['NAMA_NILAI'],
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
                        'name'  => 'JUDUL_KP_NILAI',
                        'id'    => 'JUDUL_KP_NILAI',
                        'value' => $inputs['JUDUL_KP_NILAI'],
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
                        'name'  => 'TEMPAT_KP_NILAI',
                        'id'    => 'TEMPAT_KP_NILAI',
                        'value' => $inputs['TEMPAT_KP_NILAI'],
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
                        'name'  => 'TANGGAL_NILAI',
                        'id'    => 'TANGGAL_NILAI',
                        'value' => $inputs['TANGGAL_NILAI'],
                        'class' => 'form-control',
                        'placeholder' => 'TANGGAL KERJA PRAKTEK'
                      ];
                      echo form_input($tanggal_kp); 
                    ?>
                  </div>
                  <div class="form-group">
                    <?php 
                      echo form_label('DISETUJUI', 'DISETUJUI');
                      echo form_dropdown('STATUS', ['' => 'Pilih', '1' => 'Setuju','0' => 'Tolak'], $inputs['STATUS'], ['class' => 'form-control']); 
                    ?>
                  </div>
                  <div class="form-group"> 
                    <?php 
                      echo form_label('DOSEN PEMBIMBING', 'DOSPEM');
                      echo form_dropdown('DOSPEM', $dosen, $inputs['DOSPEM'], ['class' => 'form-control']); 
                    ?>
                  </div>
                  <div class="form-group">
                    <?php 
                      echo form_label('NILAI');
                      $nilai = [
                        'type'  => 'text',
                        'name'  => 'NILAI',
                        'id'    => 'NILAI',
                        'value' => $inputs['NILAI'],
                        'class' => 'form-control',
                        'placeholder' => '0'
                      ];
                      echo form_input($nilai); 
                    ?>
                  </div>

                  <div class="form-group">
                    <?php 
                      echo form_label('KETERANGAN');
                      $keterangan = [
                        'type'  => 'text',
                        'name'  => 'KETERANGAN',
                        'id'    => 'KETERANGAN',
                        'value' => $inputs['KETERANGAN'],
                        'class' => 'form-control',
                        'placeholder' => 'KETERANGAN'
                      ];
                      echo form_input($keterangan); 
                    ?>
                  </div>
                 
              </div>
            </div>
            <div class="card-footer">
                <a href="<?php echo base_url('nilai'); ?>" class="btn btn-outline-info">Back</a>
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