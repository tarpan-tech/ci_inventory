<div id="page-wrapper">

    <div class="row">
        <div class="col-lg-12" style="padding-top: 25px;">
            <h1 class="page-header">Data Keluar Barang</h1>
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
                <a href="<?= site_url('/admin/keluar_barang/report/excel') ?>" class="btn btn-success hide-on-print"> <i class="fa fa-file-excel-o"></i> Excel </a>
                <a href="<?= site_url('/admin/keluar_barang/report/pdf') ?>" class="btn btn-danger hide-on-print"> <i class="fa fa-print"></i> PDF </a>
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <i class="fa fa-bar-chart-o fa-fw"></i> Data Keluar Barang
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>ID Keluar Barang</th>
                            <th>No Pinjam</th>
                            <th>Tanggal Keluar</th>
                            <th>Penerima</th>
                            <th>Jumlah Barang Keluar</th>
                            <th>Keperluan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $i = 1;
                    foreach($keluar_barang as $row):
                    ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= $row->id_keluar_barang; ?></td>
                            <td><?= $row->no_pinjam; ?></td>
                            <td><?= $row->tanggal_keluar; ?></td>
                            <td><?= $row->penerima; ?></td>
                            <td><?= $row->jumlah_barang_keluar; ?></td>
                            <td><?= $row->keperluan; ?></td>
                            <td style="min-width: 175px;">
                                <a data-target="#modal-edit-data<?= $row->id_keluar_barang; ?>" data-toggle="modal" class="btn btn-info"> <i class="fa fa-pencil"></i> Edit </a>
                                <a data-target="#modal-hapus-data<?= $row->id_keluar_barang; ?>" data-toggle="modal" class="btn btn-danger"> <i class="fa fa-trash"></i> Delete </a>
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
        <h4 class="modal-title" id="myModalLabel"> <i class="fa fa-bar-chart-o fa-fw"></i> Tambah Data Keluar Barang</h4>
      </div>
      <div class="modal-body">
          <?= form_open('/admin/keluar_barang/add', ['class' => 'form-horizontal']); ?>
            <div class="form-group">
                <label class="control-label col-md-3">ID Keluar Barang</label>
                <div class="col-md-9">
                    <input type="number" class="form-control" name="id_keluar_barang" placeholder="ID Keluar Barang" value="<?= $kode_baru; ?>" readonly>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">No Pinjam</label>
                <div class="col-md-9">
                    <select name="no_pinjam" class="form-control">
                        <?php foreach ($no_pinjam as $np): ?>
                            <option value="<?= $np->no_pinjam; ?>" class="form-control"><?= $np->no_pinjam; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">Tanggal Keluar</label>
                <div class="col-md-9">
                    <input type="date" class="form-control" name="tanggal_keluar" placeholder="Tanggal Keluar">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">Penerima</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" name="penerima" placeholder="Penerima">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">Jumlah Barang Keluar</label>
                <div class="col-md-9">
                    <input type="number" class="form-control" name="jumlah_barang_keluar" placeholder="Jumlah Barang Keluar">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">Keperluan</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" name="keperluan" placeholder="Keperluan">
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

<?php foreach($keluar_barang as $row): ?>
<!-- Modal Edit Data -->
<div class="modal fade" id="modal-edit-data<?= $row->id_keluar_barang; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"> <i class="fa fa-bar-chart-o fa-fw"></i> Ubah Data Keluar Barang</h4>
      </div>
      <div class="modal-body">
          <?= form_open("/admin/keluar_barang/update/{$row->id_keluar_barang}", ['class' => 'form-horizontal']); ?>
          <div class="form-group">
                <label class="control-label col-md-3">ID Keluar Barang</label>
                <div class="col-md-9">
                    <input type="number" class="form-control" name="id_keluar_barang" placeholder="ID Keluar Barang" value="<?= $row->id_keluar_barang; ?>" readonly>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">No Pinjam</label>
                <div class="col-md-9">
                    <select name="no_pinjam" class="form-control">
                        <?php foreach ($no_pinjam as $np): ?>
                            <option value="<?= $np->no_pinjam; ?>" class="form-control" <?php if($np->no_pinjam == $row->no_pinjam){ echo "selected"; }?>><?= $np->no_pinjam; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">Tanggal Keluar</label>
                <div class="col-md-9">
                    <input type="date" class="form-control" name="tanggal_keluar" placeholder="Tanggal Keluar" value="<?= $row->tanggal_keluar; ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">Penerima</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" name="penerima" placeholder="Penerima" value="<?= $row->penerima; ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">Jumlah Barang Keluar</label>
                <div class="col-md-9">
                    <input type="number" class="form-control" name="jumlah_barang_keluar" placeholder="Jumlah Barang Keluar" value="<?= $row->jumlah_barang_keluar; ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">Keperluan</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" name="keperluan" placeholder="Keperluan" value="<?= $row->keperluan; ?>">
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
<div class="modal fade" id="modal-hapus-data<?= $row->id_keluar_barang; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"> <i class="fa fa-bar-chart-o fa-fw"></i> Hapus Data Keluar Barang</h4>
      </div>
      <div class="modal-body">
        <p> Apakah anda yakin akan menghapus data ini? </p>
        <p> Data yang dihapus <b>tidak dapat</b> dikembalikan lagi seperti semula </p>
      </div><!-- Modal Body -->
      <div class="modal-footer">
        <button type="button" class="btn btn-info" data-dismiss="modal">Kembali</button>
        <a href="<?php echo site_url('/admin/keluar_barang/delete/'.$row->id_keluar_barang); ?>" class="btn btn-danger">Hapus</a>
      </div>
    </div>
  </div>
</div>

<?php endforeach; //Endforeach ?>

</div>
<!-- /.page-wrapper -->

