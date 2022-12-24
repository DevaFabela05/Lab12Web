<?php
$q="";
if(isset($_GET['submit']) && !empty($_GET['q'])) {
    $q = $_GET['q'];
    $sql_where =" WHERE nama LIKE '{$q}%";
}

$title = 'Data Barang';
include_once ("koneksi.php");

// query untuk menampilkan data
$sql = 'SELECT * FROM data_barang';
$result = mysqli_query($conn, $sql);
include_once ('header.php');


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link href="style.css" rel="stylesheet" type="text/css" />
    <title>Data Barang</title>
</head>

<body>
    <div class="container">
        <?php
        echo '<a href="tambah.php" class=btn btn-large"><h2>Tambah Barang</h2></a>';
        ?>
        <br></br>
        <form action="" method="get">
            <label for="q">Cari data: </label>
            <input type="text" id="q" name="q" class="input-q" value="<?php echo $q ?>" size="30" autofocus 
            placeholder="masukan keyword pencarian.." autocomplete="off">
            <input type="submit" name="submit" value="Cari" class="btn btn-primary">
          
        </form>
        <br> 

        <div class="main">
            <table border="1" cellpadding="10" cellspacing="0">
                <tr>
                    <th>Gambar</th>
                    <th>Nama Barang</th>
                    <th>Katagori</th>
                    <th>Harga Jual</th>
                    <th>Harga Beli</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                </tr>
                <?php if ($result) : ?>
                    <?php while ($row = mysqli_fetch_array($result)) : ?>
                        <tr>
                            <td><img src="gambar/<?= $row['gambar']; ?>" alt="<?= $row['nama']; ?>"></td>
                            <td><?= $row['nama']; ?></td>
                            <td><?= $row['kategori']; ?></td>
                            <td><?= $row['harga_beli']; ?></td>
                            <td><?= $row['harga_jual']; ?></td>
                            <td><?= $row['stok']; ?></td>
                            <td>
                                <a href="ubah.php?id=<?= $row['id_barang']; ?>">ubah</a> |
                                <a href="hapus.php?id=<?= $row['id_barang']; ?>" onclick="
                                    return confirm('apakah anda yakin ingin menghapus?');">hapus</a>
                            </td>
                        </tr>
                    <?php endwhile;
                else : ?>
                    <tr>
                        <td colspan="7">Belum ada data</td>
                    </tr>
                <?php endif; ?>
            </table>
        </div>
    </div>
    <br><br />

    <?php require('footer.php'); ?>
</body>

</html>