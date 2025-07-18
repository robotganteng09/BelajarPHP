<?php
include_once("config.php");

$blogs = [];
$keyword = isset($_GET['cari']) ? mysqli_real_escape_string($conection, $_GET['cari']) : '';
// mysqli_real_escape_string berfungsi untuk menghalangi sql injection untuk keamanan
if ($keyword) {
  $queryBlog = mysqli_query($conection, "SELECT * FROM blog WHERE judul LIKE '%$keyword%' OR isi LIKE '%$keyword%' OR kategori LIKE '%$keyword%'");
} else {
  $queryBlog = mysqli_query($conection, "SELECT * FROM blog");
}

while ($blog = mysqli_fetch_assoc($queryBlog)) {
  $blogs[] = $blog; // Menambahkan setiap baris data ke array $blogs
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css">
  <title>My Blog</title>
</head>

<body>
  <nav class="navbar bg-body-tertiary">
    <div class="container-fluid">
      <form class="d-flex" method="$_GET">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="cari" value="<?= isset($_GET['cari']) ? htmlspecialchars($_GET['cari']) : "" ?>" />
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </nav>


  <?php if ($keyword): ?>
    <p>Menampilkan hasil pencarian untuk: <strong><?= htmlspecialchars($keyword) ?></strong></p>
  <?php endif; ?>

  <table class="table table-striped">
    <thead>
      <tr>
        <th>
          judul
        </th>
        <th>
          gambar
        </th>
        <th>
          isi
        </th>
        <th>
          kategori
        </th>
        <th>
          aksi
        </th>
      </tr>
    </thead>
    <tbody>
      <?php
      foreach ($blogs as $blog):
      ?>
        <tr>
          <td>
            <?= $blog["judul"] ?>
          </td>
          <td>
            <img src="<?php echo $blog["gambar"]; ?>" alt="<?php echo $blog["gambar"]; ?>" width="150">
          </td>
          <td>
            <?= $blog["isi"] ?>
          </td>
          <td>
            <?= $blog["kategori"] ?>
          </td>
          <td>
            <a href="hapus.php? id=<?php echo $blog["id"]; ?>" class="btn btn-danger" onclick="return confirm('Are you sure delete it?')">Hapus</a>
            <a href="edit.php? id=<?php echo $blog["id"]; ?>" class="btn btn-warning">edit</a>
          </td>

        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</body>

</html>