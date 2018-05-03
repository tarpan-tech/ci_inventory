<div id="page-wrapper">

    <div class="row">
        <div class="col-lg-12" style="padding-top: 25px;">
            <h1 class="page-header">Data User</h1>
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
                <a href="<?= site_url('/admin/user/report/excel') ?>" class="btn btn-success hide-on-print"> <i class="fa fa-file-excel-o"></i> Excel </a>
                <a href="<?= site_url('/admin/user/report/pdf') ?>" class="btn btn-danger hide-on-print"> <i class="fa fa-print"></i> PDF </a>
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <i class="fa fa-bar-chart-o fa-fw"></i> Data User
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>ID User</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Level</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $i = 1;
                    foreach($user as $row):
                    ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= $row->id_user; ?></td>
                            <td><?= $row->nama; ?></td>
                            <td><?= $row->username; ?></td>
                            <td>
                            <?php
                            if($row->level == 1){
                                echo "Admin";
                            } elseif ($row->level == 2){
                                echo "Operator";
                            }
                            ?></td>
                            <td style="min-width: 175px;">
                                <a data-target="#modal-edit-data<?= $row->id_user; ?>" data-toggle="modal" class="btn btn-info"> <i class="fa fa-pencil"></i> Edit </a>
                                <a data-target="#modal-hapus-data<?= $row->id_user; ?>" data-toggle="modal" class="btn btn-danger"> <i class="fa fa-trash"></i> Delete </a>
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
          <?= form_open('/admin/user/add', ['class' => 'form-horizontal']); ?>
            <div class="form-group">
                <label class="control-label col-md-3">ID User</label>
                <div class="col-md-9">
                    <input class="form-control" type="number" class="form-control" name="id_user" placeholder="ID User" value="<?= $kode_baru; ?>" readonly>
                </div>
            </div>
            <div class="form-group">
              <label for="nama" class="control-label col-md-3"> Nama </label>
                <div class="col-md-9">
                  <input class="form-control" type="text" placeholder="Nama" name="nama" id="nama">
                </div>
            </div>
            <div class="form-group">
              <label for="username" class="control-label col-md-3"> Username </label>
                <div class="col-md-9">
                  <input class="form-control" type="text" placeholder="Username" name="username" id="username">
                </div>
            </div>
            <div class="form-group">
              <label for="password" class="control-label col-md-3"> Password</label>
                <div class="col-md-9">
                  <input class="form-control" type="password" placeholder="Password" name="password" id="password">
                </div>
            </div>
            <div class="form-group">
              <label for="level" class="control-label col-md-3"> Level </label>
                <div class="col-md-9">
                  <select class="form-control" class="form-control" name="level" id="level">
                    <option class="form-control"  value="1">Admin</option>
                    <option class="form-control"  value="2">Operator</option>
                  </select>
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

<?php foreach($user as $row): ?>
<!-- Modal Edit Data -->
<div class="modal fade" id="modal-edit-data<?= $row->id_user; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"> <i class="fa fa-bar-chart-o fa-fw"></i> Ubah Data Barang</h4>
      </div>
      <div class="modal-body">
          <?= form_open("/admin/user/update/{$row->id_user}", ['class' => 'form-horizontal']); ?>
          <div class="form-group">
                <label class="control-label col-md-3">ID User</label>
                <div class="col-md-9">
                    <input class="form-control" type="number" class="form-control" name="id_user" placeholder="ID User" value="<?= $row->id_user; ?>" readonly>
                </div>
            </div>
            <div class="form-group">
              <label for="nama" class="control-label col-md-3"> Nama </label>
                <div class="col-md-9">
                  <input class="form-control" type="text" placeholder="Nama" name="nama" id="nama" value="<?= $row->nama; ?>">
                </div>
            </div>
            <div class="form-group">
              <label for="username" class="control-label col-md-3"> Username </label>
                <div class="col-md-9">
                  <input class="form-control" type="text" placeholder="Username" name="username" id="username" value="<?= $row->username; ?>">
                </div>
            </div>
            <div class="form-group">
              <label for="level" class="control-label col-md-3"> Level </label>
                <div class="col-md-9">
                  <select class="form-control" class="form-control" name="level" id="level">
                    <option class="form-control"  value="1"<?php if($row->level == 1){ echo "selected";}?>>Admin</option>
                    <option class="form-control"  value="2"<?php if($row->level == 2){ echo "selected";}?>>Operator</option>
                  </select>
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
<div class="modal fade" id="modal-hapus-data<?= $row->id_user; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
        <a href="<?php echo site_url('/admin/user/delete/'.$row->id_user); ?>" class="btn btn-danger">Hapus</a>
      </div>
    </div>
  </div>
</div>

<?php endforeach; //Endforeach ?>

</div>
<!-- /.page-wrapper -->

