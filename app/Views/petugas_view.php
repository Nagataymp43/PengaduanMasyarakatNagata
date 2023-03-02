<?= $this->extend('layouts/admin') ?>
 <?= $this->section('title') ?>
 Masyarakat
 <?= $this->endSection() ?>
 <?= $this->section('content') ?>
 <div class="container-fluid">
     <div class="row">
         <div class="col-lg-12">
             <div class="card">
                 <div class="card-header text-white bg-gradient-primary">
                     <h3>Petugas</h3>
                     <a href="" data-toggle="modal" data-target="#fPetugas" data-petugas="add" class="btn btn-outline-light"><i class="fas fa-fw fa-solid fa-user-plus"></i>Tambah Data</a>
                 </div>
                 <div class="card-body">
                     <table class="table table-border">
                         <tr>
                             <th>No</th>
                             <th>Nama Petugas</th>
                             <th>Username</th>
                             <th>Telp</th>
                             <th>Level</th>
                             <th>Aksi</th>
                         </tr>
                         <?php
                            $no = 0;
                            foreach ($petugas as $row) {
                                $data = $row['id_petugas'] . "," . $row['nama_petugas'] . "," . $row['username'] . "," . $row['password'] . "," . $row['telp'] . "," .$row['level'] . "," .  base_url('petugas/edit/' . $row['id_petugas']);
                                #code...
                                $no++;
                            ?>
                             <tr>
                                 <td><?= $no ?></td>
                                 <td><?= $row['nama_petugas'] ?></td>
                                 <td><?= $row['username'] ?></td>
                                 <td><?= $row['telp'] ?></td>
                                 <td><?= $row['level'] ?></td>
                                 <td>
                                     <a href="" data-toggle="modal" data-target="#fPetugas" data-petugas="<?= $data ?>" class="btn btn-warning"><i class="fas fa-edit"></i>Edit</a>
                                     <a href="petugas/delete/<?= $row['id_petugas'] ?>" onclick="return confirm('Yakin mau hapus data?')" class="btn btn-danger"><i class="fas fa-trash"></i>Hapus</a>
                                 </td>
                             </tr>
                         <?php
                            }
                            ?>
                     </table>
                 </div>
             </div>
         </div>

         <?php if (!empty(session()->getFlashdata("message"))) : ?>
             <div class="alert alert-success">
                 <?= session()->getFlashdata("message") ?>
             </div>
         <?php endif ?>

         <div class="modal fade" id="fPetugas" tabindex="1" aria-labelledby="exampleModalLabel" data-dissmiss="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Form Petugas</h5>
                        <button type="button" class="close" data-toggle="modal" data-dissmiss="Close"></button>
                    </div>
                    <form action="" id="editPetugas" method="post">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="">Nama Petugas</label>
                                <input type="text" name="nama_petugas" id="nama_petugas" value="" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Username</label>
                                <input type="text" name="username" id="username" value="" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="password" name="password" id="password" value="" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Telpon</label>
                                <input type="number" name="telp" id="telp" value="" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Level</label>
                                <select name="level" id="level" class="form-control">
                                    <option value="">Pilih Level</option>
                                    <option value="admin">Admin</option>
                                    <option value="petugas">Petugas</option>
                                </select>
                            </div>
                            <div class="form-group" id="ubahpassword">
                                <label for=""></label>
                                <input type="checkbox" name="ubahpassword" value="" class="form-control">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" data-dissmiss="modal" class="btn btn-secondary">Close</button>
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
         </div>
     </div>
 </div>
 <?= $this->endSection() ?>
 <?= $this->section('script')?>
 <script>
    $(document).ready(function(){
        $("#fPetugas").on('show.bs.modal', function(e){
            var button = $(e.relatedTarget);
            var data = button.data('petugas');

            if(data!="add")
            {
                const barisdata = data.split(",");
                $("#nama_petugas").val(barisdata[1]);
                $("#username").val(barisdata[2]);
                $("#password").val(barisdata[3]);
                $("#telp").val(barisdata[4]);
                $("#level").val(barisdata[5]).change();
                $("#editPetugas").attr('action', barisdata[6]);
                $("#ubahpassword").show();
            }else{
                $("#nama_petugas").val("");
                $("#username").val("");
                $("#password").val("");
                $("#telp").val("");
                $("#level").val("");
                $("#editPetugas").attr('action', 'petugas');
                $("#ubahpassword").hide();
            }
        });
    });
 </script>
 <?= $this->endSection() ?>