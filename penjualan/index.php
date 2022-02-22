<?php
require 'koneksi.php';
$users = read("SELECT * FROM tbl_barang");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Pilih Data Barang</title>
</head>

<body>
    <h4>Pilih Data Barang</h4>
    <br>
    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="get">
        <div class="form-group">
            <table>
                <tr>
                    <td>Pilih Barang</td>
                    <td>:</td>
                    <td>
                        <select name="id">
                            <?php

                            //perintah untuk menampilkan semua data barang
                            $sql = "select id, namabarang from tbl_barang";
                            $hasil = mysqli_query($conn, $sql);
                            $no = 0;
                            while ($data = mysqli_fetch_array($hasil)) {
                                $no++;
                                $ket = "";
                                if (isset($_GET['id'])) {
                                    $id = trim($_GET['id']);

                                    if ($id == $data['id']) {

                                        $ket = "selected";
                                    }
                                }
                            ?>
                                <option <?php echo $ket; ?> value="<?php echo $data['id'] ?>">
                                    <?php echo $data['id'] ?>-
                                    <?php echo $data['namabarang'] ?>
                                </option>
                            <?php
                            }
                            ?>
                        </select>
                    </td>
                    <td>
                        <input type="submit" name="submit" value="pilih">
                    </td>
                </tr>

            </table>

        </div>
    </form>
    <h2>Detail Data Barang</h2>
    <?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $sql = "SELECT * FROM tbl_barang where id=$id";
        $hasil = mysqli_query($conn, $sql);
        $data = mysqli_fetch_assoc($hasil);
    }
    ?>
    <table>
        <tr>
            <td>ID</td>
            <td>:</td>
            <td><input type="text" name="id" value="<?php echo $data['id']; ?>"></td>
        </tr>
        <tr>
            <td>Nama Barang</td>
            <td>:</td>
            <td><input type="text" name="namabarang" value="<?php echo $data['namabarang']; ?>"></td>
        </tr>
        <tr>
            <td>Harga </td>
            <td>:</td>
            <td><input type="text" name="harga" value="<?php echo $data['harga']; ?>"></td>
        </tr>
        <tr>
            <td>Jumlah Stok</td>
            <td>:</td>
            <td><input type="text" name="stok" value="<?php echo $data['stok']; ?>"></td>
        </tr>
    </table>

</body>

</html>