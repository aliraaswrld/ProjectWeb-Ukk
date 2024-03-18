<?php
    include 'db.php';
	$kontak = mysqli_query($conn, "SELECT admin_telp, admin_email, admin_address FROM tb_admin WHERE admin_id = 2");
	$a = mysqli_fetch_object($kontak);
?>
<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>WEB Galeri Foto</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
    <!-- header -->
    <header>
        <div class="container">
            <h1><a href="index.php">WEB GALERI FOTO</a></h1>
            <ul>
                <li><a href="galeri.php">Galeri</a></li>
                <li><a href="registrasi.php">Registrasi</a></li>
                <li><a href="login.php">Login</a></li>
            </ul>
        </div>
    </header>

    <!-- search -->
    <div class="search">
        <div class="container">
            <form action="galeri.php">
                <input type="text" name="search" placeholder="Cari Foto" />
                <input type="submit" name="cari" value="Cari Foto" />
            </form>
        </div>
    </div>

    <!-- category -->
    <div class="section">
        <div class="container">
            <h3>Kategori</h3>
            <div class="box">
                <?php
                    $kategori = mysqli_query($conn, "SELECT * FROM tb_category ORDER BY category_id DESC");
					if(mysqli_num_rows($kategori) > 0){
						while($k = mysqli_fetch_array($kategori)){
				?>
                <a href="galeri.php?kat=<?php echo $k['category_id'] ?>">
                    <div class="col-5">
                        <img src="img/icon-kategori.png" width="50px" style="margin-bottom:5px;" />
                        <p><?php echo $k['category_name'] ?></p>
                    </div>
                </a>
                <?php }}else{ ?>
                <p>Kategori tidak ada</p>
                <?php } ?>
            </div>
        </div>
    </div>

    <!-- new product -->
    <div class="container">
        <h3>Foto Terbaru</h3>
        <div class="box">
            <?php
              $foto = mysqli_query($conn, "SELECT * FROM tb_image WHERE image_status = 1 ORDER BY image_id DESC LIMIT 8");
			  if(mysqli_num_rows($foto) > 0){
				  while($p = mysqli_fetch_array($foto)){
		  ?>
            <a href="detail-image.php?id=<?php echo $p['image_id'] ?>">
                <div class="col-4">
                    <img src="foto/<?php echo $p['image'] ?>" height="150px" />
                    <p class="nama"><?php echo substr($p['image_name'], 0, 30)  ?></p>
                    <p class="admin">Nama User : <?php echo $p['admin_name'] ?></p>
                    <p class="nama"><?php echo $p['date_created']  ?></p>
                </div>
            </a>
            <?php }}else{ ?>
            <p>Foto tidak ada</p>
            <?php } ?>
        </div>
    </div>

    <!-- footer -->
    <footer>
        <div class="container">
            <small>Copyright &copy; 2024 - Web Galeri Foto.</small>
        </div>
    </footer>
</body>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>filterable responsive lightbox gallery tutorial</title>

    <!-- magnific-popup css cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/galeri.css">

</head>

<body>


    <div class="gallery">

        <ul class="controls">
            <li class="buttons active" data-filter="all">all</li>
            <li class="buttons" data-filter="ice-cream">ice-cream</li>
            <li class="buttons" data-filter="chocolate">chocolate</li>
            <li class="buttons" data-filter="cake">cake</li>
            <li class="buttons" data-filter="juice">juice</li>
            <li class="buttons" data-filter="sandwich">sandwich</li>
        </ul>

        <div class="image-container">

            <a href="images/ice-cream1.jpg" class="image ice-cream">
                <img src="images/ice-cream1.jpg" alt="">
            </a>
            <a href="images/ice-cream2.jpg" class="image ice-cream">
                <img src="images/ice-cream2.jpg" alt="">
            </a>
            <a href="images/ice-cream3.jpg" class="image ice-cream">
                <img src="images/ice-cream3.jpg" alt="">
            </a>

            <a href="images/chocolate1.jpg" class="image chocolate">
                <img src="images/chocolate1.jpg" alt="">
            </a>
            <a href="images/chocolate2.jpg" class="image chocolate">
                <img src="images/chocolate2.jpg" alt="">
            </a>

            <a href="images/cake1.jpg" class="image cake">
                <img src="images/cake1.jpg" alt="">
            </a>
            <a href="images/cake2.jpg" class="image cake">
                <img src="images/cake2.jpg" alt="">
            </a>
            <a href="images/cake3.jpg" class="image cake">
                <img src="images/cake3.jpg" alt="">
            </a>
            <a href="images/cake4.jpg" class="image cake">
                <img src="images/cake4.jpg" alt="">
            </a>
            <a href="images/cake5.jpg" class="image cake">
                <img src="images/cake5.jpg" alt="">
            </a>

            <a href="images/juice1.jpg" class="image juice">
                <img src="images/juice1.jpg" alt="">
            </a>
            <a href="images/juice2.jpg" class="image juice">
                <img src="images/juice2.jpg" alt="">
            </a>
            <a href="images/juice3.jpg" class="image juice">
                <img src="images/juice3.jpg" alt="">
            </a>

            <a href="images/sandwich1.jpg" class="image sandwich">
                <img src="images/sandwich1.jpg" alt="">
            </a>
            <a href="images/sandwich2.jpg" class="image sandwich">
                <img src="images/sandwich2.jpg" alt="">
            </a>
            <a href="images/sandwich3.jpg" class="image sandwich">
                <img src="images/sandwich3.jpg" alt="">
            </a>
            <a href="images/sandwich4.jpg" class="image sandwich">
                <img src="images/sandwich4.jpg" alt="">
            </a>

        </div>

    </div>


    <!-- jquery cdn link  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- magnific popup js cdn link  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>

    <script>
    $(document).ready(function() {

        $('.buttons').click(function() {

            $(this).addClass('active').siblings().removeClass('active');

            var filter = $(this).attr('data-filter')

            if (filter == 'all') {
                $('.image').show(400);
            } else {
                $('.image').not('.' + filter).hide(200);
                $('.image').filter('.' + filter).show(400);
            }

        });

        $('.gallery').magnificPopup({

            delegate: 'a',
            type: 'image',
            gallery: {
                enabled: true
            }

        });

    });
    </script>

</body>

</html>