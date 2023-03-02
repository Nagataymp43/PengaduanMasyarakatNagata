<?= $this->extend('layouts/admin') ?>
<?= $this->section('title') ?>
Pengaduan
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h4>Form Pengaduan Masyarakat</h4>
                    <?php
                    if (session()->get('level') == 'masyarakat') {
                    ?>
                        <a href="" data-toggle="modal" data-target="#modalPengaduan" class="btn btn-primary">Tambah Pengaduan</a>
                    <?php
                    }
                    ?>
                </div>
                <div class="card-body">
                    <table class="table table-striped-border">
                        <tr>
                            <th>No</th>
                            <th>NIK</th>
                            <th>Tanggal Pengaduan</th>
                            <th>Isi Laporan</th>
                            <th>Status</th>
                            <th>Foto</th>
                            <th>Opsi</th>
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
                                        <img src='/upload/berkas/<?= $row['foto']?>' width="50" height="50" alt="">
                                    <?php
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    if (session('level') == 'masyarakat') {
                                        if ($row['status'] == '0') {
                                    ?>
                                            <a href="pengaduan/delete/<?= $row['id_pengaduan'] ?>" onclick="return confirm('Yakin ingin hapus data?')" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                        <?php
                                        } else {
                                        ?>
                                            <a href="" data-toggle="modal" data-target="#modalTanggapan" data-aduan="selesai" class="btn btn-primary" data-pengaduan="<?= $row['id_pengaduan'] ?>">Lihat Tanggapan</a>
                                        <?php
                                        }
                                    }
                                    if (!empty(session('level')) && (session('level')) !== 'masyarakat') {
                                        if ($row['status'] == '0') {
                                        ?>
                                            <a href="" data-toggle="modal" data-target="#modalTanggapan" data-pengaduan="<?= $row['id_pengaduan'] ?>" class="btn btn-warning">Tanggapi</a>
                                        <?php
                                        } else {
                                        ?>
                                            <a href="" data-toggle="modal" data-target="#modalTanggapan" data-aduan="selesai" class="btn btn-primary" data-pengaduan="<?= $row['id_pengaduan'] ?>">Lihat Tanggapan</a>
                                    <?php
                                        }
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

<div class="modal fade" id="modalPengaduan" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5>Tambah Pengaduan</h5>
            </div>
            <form action="/tambahpengaduan" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Isi Laporan</label>
                        <textarea name="isi_laporan" id="isi_laporan" class="form-control" cols="30" rows="10"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Foto</label>
                        <input type="file" name="foto" id="foto" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="modalTanggapan" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" aria-label="Close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="tanggapi" method="post" aria-hidden="true">
                <input type="hidden" name="id_pengaduan" id="id_pengaduan">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Tanggapan</label>
                        <textarea name="tanggapan" id="tanggapans" class="form-control" cols="30" rows="10"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success" id="btstanggapan">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
<?= $this->section('script') ?>
<script>
    $(document).ready(function() {
        $("#modalTanggapan").on('show.bs.modal', function(e) {
            var button = $(e.relatedTarget);
            var data = button.data('pengaduan');
            var aduan = button.data('aduan');
            $("#id_pengaduan").val(data);
            if (aduan == "selesai") {
                var query = "id_pengaduan=" +data;
                $("#btstanggapan").hide();
                $.ajax({
                    url: "/gettanggapan",
                    type: "GET",
                    data: query,
                    dataType: "json",
                    success: function(data) {
                        $("#tanggapans").val(data[0].tanggapan);
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
                $("#tanggapans").val();
            } else {
                $("#btstanggapan").show();
                $("#tanggapans").val("");
            }
        });
    });
</script>
<?= $this->endSection() ?>