<?php
require_once 'header.php';
require_once 'sidebar.php';

require '../dbkoneksi.php';
if (isset($_POST["submit"])) {
    $_kode = $_POST['kode'];
    $_tanggal = $_POST['tanggal'];
    $_berat = $_POST[' berat'];
    $_tinggi = $_POST['tinggi'];
    $_tensi = $_POST['tensi'];
    $_keterangan = $_POST['keterangan'];
    $_pasien_id = $_POST['pasien_id'];
    $_dokter_id = $_POST['dokter_id'];
    $data = [ $_kode, $_tanggal, $_berat, $_tinggi, $_tensi, $_keterangan, $_pasien_id, $_dokter_id];
    $sql = "INSERT INTO pasien (kode, tanggal, berat, tinggi, tensi, keterangan, pasien_id, dokter_id) VALUES (?,? ,? ,? ,? ,? ,? ,?)";
    $stmt = $dbh->prepare($sql);
    $stmt->execute($data);
    echo "<script>window.location.href = 'index.php';</script>";
}
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Dashboard Website</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- Default box -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Form Periksa</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <h2 class="text-center">Form Periksa</h2>
                            <form action="add.php" method="POST">
                            <div class="form-group row">
                                    <label for="Kode" class="col-4 col-form-label">Kode</label> 
                                    <div class="col-8">
                                    <input id="Kode" name="Kode" type="text" class="form-control">
                                    </div>
                                </div>
                            <form>
                            <div class="form-group row">
                                <label for="Nama Pasien" class="col-4 col-form-label">Nama Pasien</label> 
                                <div class="col-8">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fa fa-address-card"></i>
                                    </div>
                                    </div> 
                                    <input id="Nama Pasien" name="Nama Pasien" type="text" class="form-control">
                                </div>
                                </div>
                               </div>
                               <div class="form-group row">
                                    <label for="kode" class="col-4 col-form-label">Tanggal</label>
                                    <div class="col-8">
                                        <input id="Tanggal" name="Tanggal" type="date" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="Berat" class="col-4 col-form-label">Berat</label> 
                                    <div class="col-8">
                                    <input id="Berat" name="Berat" type="text" class="form-control">
                                    </div>
                                </div> 
                                <div class="form-group row">
                                    <label for="kode" class="col-4 col-form-label">Tinggi</label>
                                    <div class="col-8">
                                        <input id="Tinggi" name="Tinggi" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="kode" class="col-4 col-form-label">Tensi</label>
                                    <div class="col-8">
                                        <input id="Tensi" name="Tensi" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="kode" class="col-4 col-form-label">Keterangan</label>
                                    <div class="col-8">
                                        <input id="keterangan" name="keterangan" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="kelurahan_id" class="col-4 col-form-label">Unit Kerja ID</label>
                                    <div class="col-8">
                                        <?php
                                        $sqljenis = "SELECT * FROM unit_kerja";
                                        $rsjenis = $dbh->query($sqljenis);
                                        ?>
                                        <select id="unit_kerja" name="unit_kerja" class="custom-select">
                                            <?php
                                            foreach ($rsjenis as $rowjenis) {
                                            ?>
                                                <option value="<?= $rowjenis['id'] ?>"><?= $rowjenis['nama'] ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                </div>
                                <div class="form-group row">
                                    <div class="offset-4 col-8">
                                        <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            Footer
                        </div>
                        <!-- /.card-footer-->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php
require_once 'footer.php';
?>