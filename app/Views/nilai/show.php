<?php echo view('_partials/header'); ?>
<?php echo view('_partials/sidebar'); ?>
 
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Show Nilai</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Show Nilai</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
 
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-md-8">
                  <dl class="dl-horizontal">
                    <dt>ID NILAI</dt>
                    <dd><?php echo $nilai['ID_NILAI']; ?></dd>
                    <dt>ID KP</dt>
                    <dd><?php echo $nilai['ID_KP']; ?></dd>
                    <dt>NIM</dt>
                    <dd><?php echo $nilai['NIM_NILAI']; ?></dd>
                    <dt>Nama</dt>
                    <dd><?php echo $nilai['NAMA_NILAI']; ?></dd>
                    <dt>JUDUL</dt>
                    <dd><?php echo $nilai['JUDUL_KP_NILAI']; ?></dd>       
                    <dt>TEMPAT</dt>
                    <dd><?php echo $nilai['TEMPAT_KP_NILAI']; ?></dd>       
                    <dt>TANGGAL</dt>
                    <dd><?php echo $nilai['TANGGAL_NILAI']; ?></dd>  
                    <dt>DOSPEM</dt>
                    <dd><?php echo $nilai['DOSPEM']; ?></dd> 
                    <dt>NILAI</dt>
                    <dd><?php echo $nilai['NILAI']; ?></dd>   
                    <dt>STATUS</dt>
                    <dd><?php echo $nilai['STATUS']; ?></dd>     
                    <dt>KETERANGAN</dt>
                    <dd><?php echo $nilai['KETERANGAN']; ?></dd>  
                  </dl>
                </div>
              </div>
            </div>
            <div class="card-footer">
              <a href="<?php echo base_url('nilai'); ?>" class="btn btn-outline-info float-right">Back</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php echo view('_partials/footer'); ?>