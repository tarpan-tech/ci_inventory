<div id="page-wrapper">

    <div class="row">
        <div class="col-lg-12" style="padding-top: 25px;">
            <h1 class="page-header">Data Supplier</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12" style="padding: 15px;">
            <?php if ( isset($this->session->success) ): ?>
                <div class="alert alert-success">
                    <div class="alert-heading">
                        <div class="pull-right">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        </div>
                        <?= $this->session->success; ?>
                    </div>
                </div>
            <?php endif; ?>
            <?php if ( isset($this->session->failed) ): ?>
                <div class="alert alert-error">
                    <div class="alert-heading">
                        <div class="pull-right">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        </div>
                        <?= $this->session->failed; ?>
                    </div>
                </div>
            <?php endif; ?>
            <a data-target="#modal-tambah-data" data-toggle="modal" class="btn btn-success hide-on-print"> <i class="fa fa-plus"></i> Tambah Data </a>
            <div class="pull-right">
                <a href="<?= site_url('/admin/supplier/report/excel') ?>" class="btn btn-success hide-on-print"> <i class="fa fa-file-excel-o"></i> Excel </a>
                <a href="<?= site_url('/admin/supplier/report/pdf') ?>" class="btn btn-danger hide-on-print"> <i class="fa fa-print"></i> PDF </a>
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <i class="fa fa-bar-chart-o fa-fw"></i> Data Supplier
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Kode Supplier</th>
                            <th>Nama Supplier</th>
                            <th>Alamat Supplier</th>
                            <th>Telp Supplier</th>
                            <th>Kota Supplier</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $i = 1;
                    foreach($supplier as $row):
                    ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= $row->kode_supplier; ?></td>
                            <td><?= $row->nama_supplier; ?></td>
                            <td><?= $row->alamat_supplier; ?></td>
                            <td><?= $row->telp_supplier; ?></td>
                            <td><?= $row->kota_supplier; ?></td>
                            <td style="min-width: 175px;">
                                <a data-target="#modal-edit-data<?= $row->kode_supplier; ?>" data-toggle="modal" class="btn btn-info"> <i class="fa fa-pencil"></i> Edit </a>
                                <a data-target="#modal-hapus-data<?= $row->kode_supplier; ?>" data-toggle="modal" class="btn btn-danger"> <i class="fa fa-trash"></i> Delete </a>
                            </td>
                        </tr>
                    <?php endforeach; //Endwhile ?>
                    </tbody>
                </table>
            </div>
            <!-- /.table-responsive -->
        </div>
        <!-- /.panel-body -->
    </div>
    <!-- /.panel -->

<!-- Modal Tambah Data -->
<div class="modal fade" id="modal-tambah-data" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"> <i class="fa fa-bar-chart-o fa-fw"></i> Tambah Data Supplier</h4>
      </div>
      <div class="modal-body">
          <?= form_open('/admin/supplier/add', ['class' => 'form-horizontal']); ?>
            <div class="form-group">
                <label class="control-label col-md-3">Kode Supplier</label>
                <div class="col-md-9">
                    <input type="number" class="form-control" name="kode_supplier" placeholder="Kode Supplier" value="<?= $kode_baru; ?>" readonly>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">Nama Supplier</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" name="nama_supplier" placeholder="Nama Supplier" autofocus>
                </div>
            </div>            
            <div class="form-group">
                <label class="control-label col-md-3">Alamat Supplier</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" name="alamat_supplier" placeholder="Alamat Supplier">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">Telp Supplier</label>
                <div class="col-md-9">
                    <input type="number" class="form-control" name="telp_supplier" placeholder="Telp Supplier">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">Kota Supplier</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" name="kota_supplier" placeholder="Kota Supplier">
                </div>
            </div>
          </div><!-- Modal Body -->
          <div class="modal-footer">
             <button type="button" class="btn btn-danger" data-dismiss="modal">Kembali</button>
             <button type="submit" class="btn btn-primary">Tambah</button>
          </div>
      <?= form_close(); ?>
    </div>
  </div>
</div>

<?php foreach($supplier as $row): ?>
<!-- Modal Edit Data -->
<div class="modal fade" id="modal-edit-data<?= $row->kode_supplier; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"> <i class="fa fa-bar-chart-o fa-fw"></i> Ubah Data Supplier</h4>
      </div>
      <div class="modal-body">
          <?= form_open("/admin/supplier/update/{$row->kode_supplier}", ['class' => 'form-horizontal']); ?>
            <div class="form-group">
                <label class="control-label col-md-3">Kode Supplier</label>
                <div class="col-md-9">
                    <input type="number" class="form-control" name="kode_supplier" placeholder="Kode Supplier" value="<?= $row->kode_supplier; ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">Nama Supplier</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" name="nama_supplier" placeholder="Nama Supplier"  value="<?= $row->nama_supplier; ?>" autofocus>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">Alamat Supplier</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" name="alamat_supplier" placeholder="Alamat Supplier"  value="<?= $row->alamat_supplier; ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">Telp Supplier</label>
                <div class="col-md-9">
                    <input type="number" class="form-control" name="telp_supplier" placeholder="Telp Supplier"  value="<?= $row->telp_supplier; ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">Kota Supplier</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" name="kota_supplier" placeholder="Kota Supplier"  value="<?= $row->kota_supplier; ?>">
                </div>
            </div>
          </div><!-- Modal Body -->
          <div class="modal-footer">
             <button type="button" class="btn btn-danger" data-dismiss="modal">Kembali</button>
             <button type="submit" class="btn btn-primary">Ubah</button>
          </div>
      </form>
    </div>
  </div>
</div>


<!-- Modal Hapus Data -->
<div class="modal fade" id="modal-hapus-data<?= $row->kode_supplier; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"> <i class="fa fa-bar-chart-o fa-fw"></i> Hapus Data Supplier</h4>
      </div>
      <div class="modal-body">
        <p> Apakah anda yakin akan menghapus data ini? </p>
        <p> Data yang dihapus <b>tidak dapat</b> dikembalikan lagi seperti semula </p>
      </div><!-- Modal Body -->
      <div class="modal-footer">
        <button type="button" class="btn btn-info" data-dismiss="modal">Kembali</button>
        <a href="<?php echo site_url('/admin/supplier/delete/'.$row->kode_supplier); ?>" class="btn btn-danger">Hapus</a>
      </div>
    </div>
  </div>
</div>

<?php endforeach; //Endforeach ?>

</div>
<!-- /.page-wrapper -->

