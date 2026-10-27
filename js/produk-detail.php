<?php
	require"koneksi.php";

	$nama = htmlspecialchars($_GET['nama']);
	$queryProduk = mysqli_query($con, "SELECT * FROM product WHERE nama= '$nama'");
	$product = mysqli_fetch_array($queryProduk);

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<neta http-equiv="X-UA-Compatible" content="IE=edge" >
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Holland Bakery | Detail Produk</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">	
	<link rel="stylesheet" href="../fontawesome/css/all.min.css">
	<link rel="stylesheet" href="../css/style.css">
</head>
<body>

	<?php require "navbar.php" ?>

	<!--detail Produk-->
	<div class="container-fluid py-5">
		<div class="container">
			<div class="row">
				<div class="col-md-5">
					<img src="../image/<?php echo $product['foto']; ?>" class="w-100" alt="...">
				</div>
				<div class="col-md-6 offset-md-1">
					<h1><?php echo $product['nama']; ?></h1>
					<p class="fs-5">
						<?php echo $product['detail']; ?>
					</p>
					<p class="text-harga">
						Rp <?php echo $product['harga']; ?>
					</p>
					<p class="fs-5">Stok : <strong><?php echo $product['ketersediaan_stok'];?></strong></p>
				<div class="col-sm-1 d-flex justify-content-center mb-2">
				<a href="https://web.whatsapp.com/"><i class="fab fa-whatsapp fs-4"></i></a>
				</div>
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