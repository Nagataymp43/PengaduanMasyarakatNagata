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
                     <h3>Masyarakat</h3>
                     <a href="" data-toggle="modal" data-target="#fMasyarakat" data-masyarakat="add" class="btn btn-outline-light"><i class="fas fa-fw fa-solid fa-user-plus"></i>Tambah Data</a>
                 </div>
                 <div class="card-body">
                     <table class="table table-border">
                         <tr>
                             <th>No</th>
                             <th>NIK</th>
                             <th>Nama</th>
                             <th>Username</th>
                             <th>Telp</th>
                             <th>Aksi</th>
                         </tr>
                         <?php
                            $no = 0;
                            foreach ($masyarakat as $row) {
                                $data = $row['id_masyarakat'] . "," . $row['nik'] . "," . $row['nama'] . "," . $row['username'] . "," . $row['password'] . "," . $row['telp'] . "," . base_url('masyarakat/edit/' . $row['id_masyarakat']);
                                #code...
                                $no++;
                            ?>
                             <tr>
                                 <td><?= $no ?></td>
                                 <td><?= $row['nik'] ?></td>
                                 <td><?= $row['nama'] ?></td>
                                 <td><?= $row['username'] ?></td>
                                 <td><?= $row['telp'] ?></td>
                                 <td>
                                     <a href="" data-toggle="modal" data-target="#fMasyarakat" data-masyarakat="<?= $data ?>" class="btn btn-warning"><i class="fas fa-edit"></i>Edit</a>
                                     <a href="masyarakat/delete/<?= $row['id_masyarakat'] ?>" onclick="return confirm('Yakin mau hapus data?')" class="btn btn-danger"><i class="fas fa-trash"></i>Hapus</a>
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

         
     </div>
 </div>
 <div class="modal fade" id="fMasyarakat" tabindex="1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5>Form Masyarakat</h5>
                        <button type="button" class="close" aria-labelledby="Close"></button>
                    </div>
                    <form action="" id="editMasyarakat" method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="">NIK</label>
                                <input type="text" name="nik" id="nik" value="" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Nama</label>
                                <input type="text" name="nama" id="nama" value="" class="form-control">
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
 <?= $this->endSection() ?>
 <?= $this->section('script')?>
 <script>
    $(document).ready(function(){
        $("#fMasyarakat").on('show.bs.modal', function(e){
            var button = $(e.relatedTarget);
            var data = button.data('masyarakat');

            if(data != "add")
            {
                const barisdata = data.split(",");
                $("#nik").val(barisdata[1]);
                $("#nama").val(barisdata[2]);
                $("#username").val(barisdata[3]);
                $("#password").val(barisdata[4]);
                $("#telp").val(barisdata[5]);
                $("#editMasyarakat").attr('action', barisdata[6]);
                $("#ubahpassword").show();
            }else{
                $("#nik").val("");
                $("#nama").val("");
                $("#username").val("");
                $("#password").val("");
                $("#telp").val("");
                $("#editMasyarakat").attr('action', 'masyarakat');
                $("#ubahpassword").hide();
            }
        });
    });
 </script>
 <?= $this->endSection() ?>