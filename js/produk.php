	<?php
	require"koneksi.php";

	$queryKategori = mysqli_query($con, "SELECT * FROM kategori");

	// get produk by nama produk/keyword
	if(isset($_GET['keyword'])){
		$queryProduk = mysqli_query($con, "SELECT * FROM product WHERE nama LIKE '%$_GET[keyword]%'");
	}
	// get produk by kategori
	else if(isset($_GET['kategori'])){
		$queryGetKategoriId = mysqli_query($con, "SELECT id FROM kategori WHERE nama='$_GET[kategori]'");
		$kategoriId = mysqli_fetch_array($queryGetKategoriId);

		$queryProduk = mysqli_query($con, "SELECT * FROM product WHERE kategori_id='$kategoriId[id]'");
	}
	// get produk default
	else{
		$queryProduk = mysqli_query($con, "SELECT * FROM product");
	}

	$countData = mysqli_num_rows($queryProduk);

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<neta http-equiv="X-UA-Compatible" content="IE=edge" >
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Holland Bakery | Produk</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">	
	<link rel="stylesheet" href="../fontawesome/css/all.min.css">
	<link rel="stylesheet" href="../css/style.css">
</head>
<body>
	<?php require "navbar.php" ?>
	
	<!--banner-->
	<div class="container-fluid banner-produk d-flex align-items-center">
		<div class="container text-center">
			<h1 class="text-white">Produk</h1>
		</div>
	</div>

	<!--produk-->
	<div class="container py-5">
		<div class="row">
			<div class="col-lg-3 mb-5">
				<h3>Kategori</h3>
				<ul class="list-group">
					<?php while($kategori = mysqli_fetch_array($queryKategori)){ ?>
					<a class="no-decoration" href="produk.php?kategori=<?php echo $kategori['nama']; ?>">		
						<li class="list-group-item"><?php echo $kategori['nama']; ?></li>
					</a>
					<?php } ?>
				</ul>
			</div>
			<div class="col-lg-9">
				<h3 class="text-center mb-4">Produk</h3>
				<div class="row">
					<?php 
						if($countData<1){
					?>
						<h4 class="text-center my-5">Produk yang anda cari tidak tersedia</h4>
					<?php
						}
					?>

					<?php while($product = mysqli_fetch_array($queryProduk)){ ?>
					<div class="col-md-4">
						<div class="card h-100">
							<div class="image-box">	
  								<img src="../image/<?php echo $product['foto']; ?>" class="card-img-top" alt="...">
  							</div>
							<div class="card-body">
								<h4 class="card-title"><?php echo $product['nama']; ?></h4>
						    	<p class="card-text text-harga"><?php echo $product['harga']; ?></p>
						    	<a href="produk-detail.php?nama=<?php echo $product['nama'];?>" class="btn btn-primary warna2 text-white">Lihat Produk</a>
							</div>
						</div>
					</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>

	<!--footer-->
	<?php require "footer.php"; ?>

	<script src="bootstrap/js/boostrap.bundle.min.js"></script>
	<script src="fontawesome/js/all.min.js"></script>
</body>
</html>