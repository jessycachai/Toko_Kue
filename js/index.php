<?php 
    require "../koneksi.php";

    $queryProduk = mysqli_query($con, "SELECT id, nama, harga, foto, detail FROM product LIMIT 6");
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Holland Bakery | Home</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">	
	<link rel="stylesheet" href="../fontawesome/css/all.min.css">
	<link rel="stylesheet" href="../css/style.css">
</head>
<body>
	<?php require "navbar.php"?>

	<!--banner-->
	<div class="container-fluid banner d-flex align-items-center">
		<div class="container-fluid text-center text-white">
			<h1>Holland Bakery</h1>
			<h3>Breads for every occasions</h3>
			<div class="col-md-8 offset-2">
				<form method="get" action="produk.php">
					<div class="input-group input-group-lg my-5">
						<input type="text" class="form-control" placeholder="Mau Makan Apa?" aria-label="Recipient's username" aria-describedby="basic-addon2" name="keyword">
						<button type="submit" class="btn warna2 text-white">Telusuri</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<!--kategori-->
	<div class="container-fluid py-5">
		<div class="container text-center">
			<h3>Kategori Terlaris</h3>
			<div class="row mt-5">
				<div class="col-md-4 mb-3">
					<div class="highlighted-kategori foto-breads d-flex justify-content-center align-items-center">
					<h4 class="text-white"><a class="no-decoration" href="produk.php?kategori=Cakes">Cakes</a></h4>
					</div>
				</div>
				<div class="col-md-4 mb-3">
					<div class="highlighted-kategori foto-breads1 d-flex justify-content-center align-items-center">
					<h4 class="text-white"><a class="no-decoration" href="produk.php?kategori=Breads">Breads</a></h4>
					</div>
				</div>
				<div class="col-md-4 mb-3">
					<div class="highlighted-kategori foto-breads2 d-flex justify-content-center align-items-center">
					<h4 class="text-white"><a class="no-decoration" href="produk.php?kategori=Donuts">Donuts</a></h4>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--About Us-->
	<div class="container-fluid warna3 py-5">
		<div class="container text-center">
			<h3>Tentang Kami</h3>
			<P> Holland Bakery dikenal sebagai toko roti modern pertama di Indonesia dan didirikan pada tahun 1978 di Jakarta. Toko roti ini menjadi satu-satunya toko roti pemegang lisensi karakter Disney di Indonesia.
			</P>
		</div>
	</div>

	<!--Produk-->
	<div class="container-fluid py-5">
		<div class="container text-center">
			<h3>Produk</h3>

			<div class="row mt-5">
				<?php while($data=mysqli_fetch_array($queryProduk)){ ?>
				<div class="col-sm-6 col-md-4 mb-3">
					<div class="card h-100">
						<div class="image-box">	
  							<img src="../image/<?php echo $data['foto']; ?>" class="card-img-top" alt="...">
  						</div>
						<div class="card-body">
							<h4 class="card-title"><?php echo $data['nama']; ?></h4>
						    <p class="card-text text-harga"><?php echo $data['harga']; ?></p>
						    <a href="produk-detail.php?nama=<?php echo $data['nama'];?>" class="btn btn-primary warna2 text-white">Lihat Produk</a>
						</div>
					</div>
				</div>
				<?php } ?>
			</div>
			<a class="btn btn-outline-warning" href="produk.php ?>">Lihat lainnya</a>
		</div>
	</div>

	<!--footer-->
	<?php require "footer.php"; ?>

	<script src="bootstrap/js/boostrap.bundle.min.js"></script>
	<script src="fontawesome/js/all.min.js"></script>
</body>
</html>