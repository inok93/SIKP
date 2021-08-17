<?php echo view('_partials/header'); ?>
<?php echo view('_partials/sidebar'); ?>
 
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Show Kerja Praktek</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Show Kerja Praktek</li>
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
                    <dt>ID KP</dt>
                    <dd><?php echo $kerjapraktek['ID_KP']; ?></dd>
                    <dt>NIM</dt>
                    <dd><?php echo $kerjapraktek['NIM_KP']; ?></dd>
                    <dt>Nama</dt>
                    <dd><?php echo $kerjapraktek['NAMA_MHS_KP']; ?></dd>
                    <dt>JUDUL</dt>
                    <dd><?php echo $kerjapraktek['JUDUL_KP']; ?></dd>       
                    <dt>TEMPAT</dt>
                    <dd><?php echo $kerjapraktek['TEMPAT KP']; ?></dd>       
                    <dt>TANGGAL</dt>
                    <dd><?php echo $kerjapraktek['TANGGAL_KP']; ?></dd>  
                    <dt>DOSPEM</dt>
                    <dd><?php echo $kerjapraktek['DOSPEM_KP']; ?></dd>       
                  </dl>
                </div>
              </div>
            </div>
            <div class="card-footer">
              <a href="<?php echo base_url('kerjapraktek'); ?>" class="btn btn-outline-info float-right">Back</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php echo view('_partials/footer'); ?>