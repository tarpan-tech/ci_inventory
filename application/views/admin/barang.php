<div id="page-wrapper">

    <div class="row">
        <div class="col-lg-12" style="padding-top: 25px;">
            <h1 class="page-header">Data Barang</h1>
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
                <a href="<?= site_url('/admin/barang/report/pdf') ?>" class="btn btn-warning hide-on-print"> <i class="fa fa-print"></i> Cetak Data </a>
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <i class="fa fa-bar-chart-o fa-fw"></i> Data Barang
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Spesifikasi</th>
                            <th>Lokasi Barang</th>
                            <th>Kategori</th>
                            <th>Jumlah Barang</th>
                            <th>Kondisi</th>
                            <th>Jenis Barang</th>
                            <th>Sumber Dana</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $i = 1;
                    foreach($barang as $row):
                    ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= $row->kode_barang; ?></td>
                            <td><?= $row->nama_barang; ?></td>
                            <td><?= substr($row->spesifikasi, 0, 50)."..."; ?></td>
                            <td><?= $row->lokasi_barang; ?></td>
                            <td><?= $row->kategori; ?></td>
                            <td><?= $row->jml_barang; ?></td>
                            <td><?= $row->kondisi; ?></td>
                            <td><?= $row->jenis_barang; ?></td>
                            <td><?= $row->sumber_dana; ?></td>
                            <td style="min-width: 175px;">
                                <a data-target="#modal-edit-data<?= $row->kode_barang; ?>" data-toggle="modal" class="btn btn-info"> <i class="fa fa-pencil"></i> Edit </a>
                                <a data-target="#modal-hapus-data<?= $row->kode_barang; ?>" data-toggle="modal" class="btn btn-danger"> <i class="fa fa-trash"></i> Delete </a>
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
        <h4 class="modal-title" id="myModalLabel"> <i class="fa fa-bar-chart-o fa-fw"></i> Tambah Data Barang</h4>
      </div>
      <div class="modal-body">
          <?= form_open('/admin/barang/add', ['class' => 'form-horizontal']); ?>
            <div class="form-group">
                <label class="control-label col-md-3">Kode Barang</label>
                <div class="col-md-9">
                    <input type="number" class="form-control" name="kode_barang" placeholder="Kode Barang" value="<?= $kode_baru; ?>" readonly>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">Nama Barang</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" name="nama_barang" placeholder="Nama Barang" autofocus>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">Spesifikasi</label>
                <div class="col-md-9">
                    <textarea name="spesifikasi" placeholder="Spesifikasi" class="form-control"></textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">Lokasi Barang</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" name="lokasi_barang" placeholder="Lokasi Barang">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">Kategori</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" name="kategori" placeholder="Kategori">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">Jumlah Barang</label>
                <div class="col-md-9">
                    <input type="number" class="form-control" name="jumlah_barang" placeholder="Jumlah Barang">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">Kondisi</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" name="kondisi" placeholder="Kondisi">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">Jenis Barang</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" name="jenis_barang" placeholder="Jenis Barang">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">Sumber Dana</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" name="sumber_dana" placeholder="Sumber Dana">
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

<?php foreach($barang as $row): ?>
<!-- Modal Edit Data -->
<div class="modal fade" id="modal-edit-data<?= $row->kode_barang; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"> <i class="fa fa-bar-chart-o fa-fw"></i> Ubah Data Barang</h4>
      </div>
      <div class="modal-body">
          <?= form_open("/admin/barang/update/{$row->kode_barang}", ['class' => 'form-horizontal']); ?>
            <div class="form-group">
                <label class="control-label col-md-3">Kode Barang</label>
                <div class="col-md-9">
                    <input type="number" class="form-control" name="kode_barang" placeholder="Kode Barang" value="<?= $row->kode_barang; ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">Nama Barang</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" name="nama_barang" placeholder="Nama Barang"  value="<?= $row->nama_barang; ?>" autofocus>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">Spesifikasi</label>
                <div class="col-md-9">
                    <textarea name="spesifikasi" placeholder="Spesifikasi" class="form-control"><?= $row->spesifikasi; ?></textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">Lokasi Barang</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" name="lokasi_barang" placeholder="Lokasi Barang"  value="<?= $row->lokasi_barang; ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">Kategori</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" name="kategori" placeholder="Kategori"  value="<?= $row->kategori; ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">Jumlah Barang</label>
                <div class="col-md-9">
                    <input type="number" class="form-control" name="jumlah_barang" placeholder="Jumlah Barang"  value="<?= $row->jml_barang; ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">Kondisi</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" name="kondisi" placeholder="Kondisi"  value="<?= $row->kondisi; ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">Jenis Barang</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" name="jenis_barang" placeholder="Jenis Barang"  value="<?= $row->jenis_barang; ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">Sumber Dana</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" name="sumber_dana" placeholder="Sumber Dana"  value="<?= $row->sumber_dana; ?>">
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
<div class="modal fade" id="modal-hapus-data<?= $row->kode_barang; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"> <i class="fa fa-bar-chart-o fa-fw"></i> Hapus Data Barang</h4>
      </div>
      <div class="modal-body">
        <p> Apakah anda yakin akan menghapus data ini? </p>
        <p> Data yang dihapus <b>tidak dapat</b> dikembalikan lagi seperti semula </p>
      </div><!-- Modal Body -->
      <div class="modal-footer">
        <button type="button" class="btn btn-info" data-dismiss="modal">Kembali</button>
        <a href="<?php echo site_url('/admin/barang/delete/'.$row->kode_barang); ?>" class="btn btn-danger">Hapus</a>
      </div>
    </div>
  </div>
</div>

<?php endforeach; //Endforeach ?>

</div>
<!-- /.page-wrapper -->

