<?= $this->extend('layouts/admin') ?>
<?= $this->section('title') ?>
Laporan Pengaduan
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header bg-striped-border">
                    <h5>Laporan Pengaduan</h5>
                </div>
                <div class="card-body">
                    <table class="table table-striped-bordered">
                        <tr>
                            <th>No</th>
                            <th>NIK</th>
                            <th>Tanggal Pengaduan</th>
                            <th>Isi Laporan</th>
                            <th>Status</th>
                            <th>Foto</th>
                        </tr>
                        <?php
                        $no = 0;
                        foreach ($pengaduan as $row) {
                            $no++;
                        ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td><?= $row['nik'] ?></td>
                                <td><?= $row['tgl_pengaduan'] ?></td>
                                <td><?= $row['isi_laporan'] ?></td>
                                <td><?= $row['status'] ?></td>
                                <td>
                                    <?php
                                    if ($row['foto'] != "") {
                                    ?>
                                        <img src='/upload/berkas/<?= $row['foto'] ?>' width="50" height="50" alt="">
                                    <?php
                                    }
                                    ?>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>