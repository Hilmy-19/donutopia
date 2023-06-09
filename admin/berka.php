include('../connection.php');

if (isset($_POST['update'])) {
    $path = "../admin/product_img/" . basename($_FILES['image']['name']);

    $id = $_POST['id'];
    $name = $_POST['name'];
    $kategori = $_POST['kategori'];
    $deskripsi = $_POST['deskripsi'];
    $price = $_POST['price'];
    $image = $_FILES['image']['name'];
    $jumlah_hlmn = $_POST['jumlah_hlmn'];
    $tgl_terbit = $_POST['tgl_terbit'];
    $penulis = $_POST['penulis'];
    $penerbit = $_POST['penerbit'];

    if (!empty($image)) {
        move_uploaded_file($_FILES['image']['tmp_name'], $path);
        $r_query = mysqli_query($conn, "UPDATE products SET 
        name = '$name',
        kategori = '$kategori',
        deskripsi = '$deskripsi',
        price = '$price',
        image = '$image',
        jumlah_hlmn = '$jumlah_hlmn',
        tgl_terbit = '$tgl_terbit',
        penulis = '$penulis',
        penerbit = '$penerbit'
        WHERE id = '$id'");
        if (!$r_query) {
            die("Query gagal dijalankan: " . mysqli_errno($conn) .
                " - " . mysqli_error($conn));
        } else {
            echo "<script>alert('Data berhasil diubah.');
    window.location='produk.php';</script>";
        }
    } else {
        $r_query = mysqli_query($conn, "UPDATE products SET 
        name = '$name',
        kategori = '$kategori',
        deskripsi = '$deskripsi',
        price = '$price',
        jumlah_hlmn = '$jumlah_hlmn',
        tgl_terbit = '$tgl_terbit',
        penulis = '$penulis',
        penerbit = '$penerbit'
        WHERE id = '$id'");
        if (!$r_query) {
            die("Query gagal dijalankan: " . mysqli_errno($conn) .
                " - " . mysqli_error($conn));
        } else {
            echo "<script>alert('Data berhasil diubah.');
    window.location='produk.php';</script>";
        }
    }
}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="card-body">
                    <form method="POST" action="actionEdit.php?id=<?php $id ?>" enctype="multipart/form-data">
                        <div class="card-input d-flex">
                            <div class="form-row p-2 col-lg-4">
                                <div class="form-group">
                                    <label class="col-form-label">Judul Buku</label>
                                    <input type="text" class="form-control" name="name" value="<?php echo $row['name'] ?>">
                                </div>
                                <div class="form-group mt-3">
                                    <label class="col-form-label">Penulis</label>
                                    <input type="text" class="form-control" name="penulis" value="<?php echo $row['penulis'] ?>">
                                </div>
                                <div class="form-group mt-3">
                                    <label class="col-form-label">Kategori</label>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" id="bisnis" name="kategori" value="bisnis" required>
                                        <label class="custom-control-label" for="bisnis">Bisnis</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" id="sejarah" name="kategori" value="sejarah" required>
                                        <label class="custom-control-label" for="sejarah">Sejarah</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" id="pendidikan" name="kategori" value="pendidikan" required>
                                        <label class="custom-control-label" for="pendidikan">Pendidikan</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" id="agama" name="kategori" value="agama" required>
                                        <label class="custom-control-label" for="agama">Agama</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" id="komputer" name="kategori" value="komputer" required>
                                        <label class="custom-control-label" for="komputer">Komputer</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" id="finansial" name="kategori" value="finansial" required>
                                        <label class="custom-control-label" for="finansial">Finansial</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" id="self_development" name="kategori" value="self_development" required>
                                        <label class="custom-control-label" for="self_development">Self Development</label>
                                    </div>
                                </div>
                                <div class="form-group mt-3">
                                    <label for="image" class="col-form-label">Gambar</label>
                                    <div class="image my-2 pb-2">
                                        <img src="<?php echo '../admin/product_img/' . $row['image']; ?>" style="width: 75px; height: 100px; border-style: solid; border-width: 1px;" />
                                    </div>
                                    <input type="file" name="image" class="form-control" value="<?php echo $row['image'] ?>">
                                </div>
                            </div>
                            <div class="form-row p-2 col-lg-4">
                                <div class="form-group">
                                    <label class="col-form-label">Penerbit</label>
                                    <input type="text" class="form-control" name="penerbit" value="<?php echo $row['penerbit'] ?>">
                                </div>
                                <div class="form-group mt-3">
                                    <label class="col-form-label">Tanggal Terbit</label>
                                    <input type="date" class="form-control" name="tgl_terbit" value="<?php echo $row['tgl_terbit'] ?>">
                                </div>
                                <div class="form-group mt-3">
                                    <label class="col-form-label">Harga</label>
                                    <input type="text" class="form-control" name="price" value="<?php echo $row['price'] ?>">
                                </div>
                                <div class="form-group mt-3">
                                    <label class="col-form-label">Jumlah Halaman</label>
                                    <input type="text" class="form-control" name="jumlah_hlmn" value="<?php echo $row['jumlah_hlmn'] ?>">
                                </div>
                                <div class="form-group mt-3">
                                    <label class="col-form-label">Deskripsi</label>
                                    <textarea rows="10" class="form-control" name="deskripsi"><?php echo $row['deskripsi'] ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div>
                            <button class="btn btn-primary mt-3 submit-btn" name="update">Perbarui Produk</button>
                            <!-- <input type="submit" class="btn btn-primary mt-3" name="update" value="Simpan Produk"> -->
                            <input class="btn btn-danger mt-3" type="button" value="Cancel" onclick="history.back()" />
                        </div>
                    </form>
                </div>
</body>
</html>