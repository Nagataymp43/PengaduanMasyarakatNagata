<?= $this->extend('layouts/admin') ?>
<?= $this->section('title') ?>
Profil Masyarakat
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="container-fluid">
    <button class="btn btn-primary mb-3">
        <a href="/" class="text-light"><i class="fas fa-arrow-left"></i> Back</a>
    </button>
    <br>
    <br>

    <div class="col-md-6">
        <?php
        if (!empty(session()->getFlashdata("sukses"))) : ?>
            <div class="alert alert-success">
                <?= session()->getFlashdata("sukses") ?>
            </div>
        <?php endif ?>
        <div class="card">
            <div class="card-header text-center">
                <h5>Profil Anda</h5>
            </div>
        </div>
        <br>

        <form action="/editprofil" method="post">
            <div class="card-body">
                <?php
                if (session('level') == 'masyarakat') {
                    $id = $user[0]['id_masyarakat'];
                    $nama = $user[0]['nama'];
                    $username = $user[0]['username'];
                    $telp = $user[0]['telp'];
                } else {
                    $id = $user[0]['id_petugas'];
                    $nama = $user[0]['nama_petugas'];
                    $username = $user[0]['username'];
                    $telp = $user[0]['telp'];
                }
                ?>
                <input type="hidden" name='id' value="<?= $id ?>">
                <div class="form-group">
                    <label for="">Nama</label>
                    <input type="text" name="nama" id="nama" value="<?= $nama ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Username</label>
                    <input type="text" name="username" id="username" value="<?= $username ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Telpon</label>
                    <input type="number" name="telp" id="telp" value="<?= $telp ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Password Lama <span class="text-danger">Kosongkan jika tidak ingin diganti</span></label>
                    <input type="password" name="password_old" id="password" value="" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Password Baru <span class="text-danger">Kosongkan jika tidak ingin diganti</span></label>
                    <input type="password" name="password_new" id="password" value="" class="form-control">
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Update Profil</button>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection() ?>