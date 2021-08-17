<?php echo view('_partials/header'); ?>
<?php echo view('_partials/sidebar'); ?>
 
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Kerja Praktek</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Kerja Praktek</li>
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
                        <div class="card-header">
                            List Kerja Praktek
                            <a href="<?php echo base_url('kerjapraktek/create'); ?>" class="btn btn-primary float-right">Tambah</a>
                        </div>
                        <div class="card-body">
                         
                            <?php
                            if(!empty(session()->getFlashdata('success'))){ ?>
                            <div class="alert alert-success">
                                <?php echo session()->getFlashdata('success');?>
                            </div>     
                            <?php } ?>
 
                            <?php if(!empty(session()->getFlashdata('info'))){ ?>
                            <div class="alert alert-info">
                                <?php echo session()->getFlashdata('info');?>
                            </div>
                            <?php } ?>
 
                            <?php if(!empty(session()->getFlashdata('warning'))){ ?>
                            <div class="alert alert-warning">
                                <?php echo session()->getFlashdata('warning');?>
                            </div>
                            <?php } ?>
 
                            <div class="table-responsive">
                                <table class="table table-bordered table-hovered">
                                    <thead>
                                        <tr>
                                            <th width="10px" class="text-center">No</th>
                                            <th>NIM</th>
                                            <th>NAMA</th>
                                            <th>JUDUL</th>
                                            <th>TEMPAT</th>
                                            <th>TANGGAL</th>
                                            <th>DOSPEM</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $nomor = 0; foreach($kerjapraktek as $key => $row){ ?>
                                        <tr>
                                            <td class="text-center"><?php echo ++$nomor; ?></td>
                                            <td><?php echo $row['NIM_KP']; ?></td>
                                            <td><?php echo $row['NAMA_MHS_KP']; ?></td>
                                            <td><?php echo $row['JUDUL_KP']; ?></td>
                                            <td><?php echo $row['TEMPAT_KP']; ?></td>
                                            <td><?php echo $row['TANGGAL_KP']; ?></td>
                                            <td><?php echo $row['DOSPEM_KP']; ?></td>
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <a href="<?php echo base_url('kerjapraktek/show/'.$row['ID_KP']); ?>" class="btn btn-sm btn-info">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                    <a href="<?php echo base_url('kerjapraktek/edit/'.$row['ID_KP']); ?>" class="btn btn-sm btn-success">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <a href="<?php echo base_url('kerjapraktek/delete/'.$row['ID_KP']); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus ini?');">
                                                        <i class="fa fa-trash-alt"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
 
        </div>
    </div>
</div>
<?php echo view('_partials/footer'); ?>