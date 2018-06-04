<div id="page-wrapper">

    <div class="row">
        <div class="col-lg-12" style="padding-top: 25px;">
            <h1 class="page-header">Data Pinjam Barang</h1>
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
                <a href="<?= site_url('/admin/pinjam_barang/report/excel') ?>" class="btn btn-success hide-on-print"> <i class="fa fa-file-excel-o"></i> Excel </a>
                <a href="<?= site_url('/admin/pinjam_barang/report/pdf') ?>" class="btn btn-danger hide-on-print"> <i class="fa fa-print"></i> PDF </a>
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <i class="fa fa-bar-chart-o fa-fw"></i> Data Pinjam Barang
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>No Pinjam</th>
                            <th>Kode Barang</th>
                            <th>Jumlah Pinjam</th>
                            <th>Peminjam</th>
                            <th>Tanggal Pinjam</th>
                            <th>Tanggal Kembali</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $i = 1;
                    foreach($pinjam_barang as $row):
                    ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= $row->no_pinjam; ?></td>
                            <td><?= $row->kode_barang; ?></td>
                            <td><?= $row->jumlah_pinjam; ?></td>
                            <td><?= $row->peminjam; ?></td>
                            <td><?= $row->tanggal_pinjam; ?></td>
                            <td><?= $row->tanggal_kembali; ?></td>
                            <td><?= $row->keterangan; ?></td>
                            <td style="min-width: 175px;">
                                <a data-target="#modal-edit-data<?= $row->no_pinjam; ?>" data-toggle="modal" class="btn btn-info"> <i class="fa fa-pencil"></i> Edit </a>
                                <a data-target="#modal-hapus-data<?= $row->no_pinjam; ?>" data-toggle="modal" class="btn btn-danger"> <i class="fa fa-trash"></i> Delete </a>
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
        <h4 class="modal-title" id="myModalLabel"> <i class="fa fa-bar-chart-o fa-fw"></i> Tambah Data Pinjam Barang</h4>
      </div>
      <div class="modal-body">
          <?= form_open('/admin/pinjam_barang/add', ['class' => 'form-horizontal']); ?>
            <div class="form-group">
                <label class="control-label col-md-3">No Pinjam</label>
                <div class="col-md-9">
                    <input type="number" class="form-control" name="no_pinjam" placeholder="No Pinjam" value="<?= $kode_baru; ?>" readonly>
                </div>
            </div>         
            <div class="form-group">
                <label class="control-label col-md-3">Kode Barang</label>
                <div class="col-md-9">
                    <select name="kode_barang" class="form-control">
                        <?php foreach ($kode_barang as $kb): ?>
                            <option value="<?= $kb->kode_barang; ?>" class="form-control"><?= $kb->kode_barang." - ".$kb->nama_barang; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">Jumlah Pinjam</label>
                <div class="col-md-9">
                    <input type="number" class="form-control" name="jumlah_pinjam" placeholder="Jumlah Pinjam">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">Peminjam</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" name="peminjam" placeholder="Peminjam">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">Tanggal Pinjam</label>
                <div class="col-md-9">
                    <input type="date" class="form-control" name="tanggal_pinjam" placeholder="Tanggal Pinjam">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">Tanggal Kembali</label>
                <div class="col-md-9">
                    <input type="date" class="form-control" name="tanggal_kembali" placeholder="Tanggal Kembali">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">Keterangan</label>
                <div class="col-md-9">
                    <textarea name="keterangan" class="form-control"></textarea>
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

<?php foreach($pinjam_barang as $row): ?>
<!-- Modal Edit Data -->
<div class="modal fade" id="modal-edit-data<?= $row->no_pinjam; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"> <i class="fa fa-bar-chart-o fa-fw"></i> Ubah Data Pinjam Barang</h4>
      </div>
      <div class="modal-body">
          <?= form_open("/admin/pinjam_barang/update/{$row->no_pinjam}", ['class' => 'form-horizontal']); ?>
          <div class="form-group">
                <label class="control-label col-md-3">No Pinjam</label>
                <div class="col-md-9">
                    <input type="number" class="form-control" name="no_pinjam" placeholder="No Pinjam" value="<?= $row->no_pinjam; ?>" readonly>
                </div>
            </div>         
            <div class="form-group">
                <label class="control-label col-md-3">Kode Barang</label>
                <div class="col-md-9">
                    <select name="kode_barang" class="form-control">
                        <?php foreach ($kode_barang as $kb): ?>
                            <option value="<?= $kb->kode_barang; ?>" class="form-control" <?php if($kb->kode_barang == $row->kode_barang){ echo "selected"; } ?> ><?= $kb->kode_barang." - ".$kb->nama_barang; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">Jumlah Pinjam</label>
                <div class="col-md-9">
                    <input type="number" class="form-control" name="jumlah_pinjam" placeholder="Jumlah Pinjam" value="<?= $row->jumlah_pinjam; ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">Peminjam</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" name="peminjam" placeholder="Peminjam" value="<?= $row->peminjam; ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">Tanggal Pinjam</label>
                <div class="col-md-9">
                    <input type="date" class="form-control" name="tanggal_pinjam" placeholder="Tanggal Pinjam" value="<?= $row->tanggal_pinjam; ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">Tanggal Kembali</label>
                <div class="col-md-9">
                    <input type="date" class="form-control" name="tanggal_kembali" placeholder="Tanggal Kembali" value="<?= $row->tanggal_kembali; ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">Keterangan</label>
                <div class="col-md-9">
                    <textarea name="keterangan" class="form-control"><?= $row->keterangan; ?></textarea>
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
<div class="modal fade" id="modal-hapus-data<?= $row->no_pinjam; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"> <i class="fa fa-bar-chart-o fa-fw"></i> Hapus Data Pinjam Barang</h4>
      </div>
      <div class="modal-body">
        <p> Apakah anda yakin akan menghapus data ini? </p>
        <p> Data yang dihapus <b>tidak dapat</b> dikembalikan lagi seperti semula </p>
      </div><!-- Modal Body -->
      <div class="modal-footer">
        <button type="button" class="btn btn-info" data-dismiss="modal">Kembali</button>
        <a href="<?php echo site_url('/admin/pinjam_barang/delete/'.$row->no_pinjam); ?>" class="btn btn-danger">Hapus</a>
      </div>
    </div>
  </div>
</div>

<?php endforeach; //Endforeach ?>

</div>
<!-- /.page-wrapper -->

