<?php echo view('_partials/header'); ?>
<?php echo view('_partials/sidebar'); ?>
 
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Dashboard</h1>
            </div>
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
            </div>
        </div>
        </div>
    </div>
 
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="m-0">JUMLAH MAHASISWA</h5>
                        </div>
                        <div class="card-body">
                            <p>0</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="m-0">JUMLAH KERJA PRAKTEK</h5>
                        </div>
                        <div class="card-body">
                            <p>0</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
 
<?php echo view('_partials/footer'); ?>
