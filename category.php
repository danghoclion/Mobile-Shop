<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>Tất cả sản phẩm</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/owl.css">
</head>

<body>

    <?php include("header.php"); ?>

    <!-- Page Content -->
    <div class="page-heading header-text">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <?php session_start();
                    include('./config/db.php');
                    $idnsx = $_GET['idnsx'];
                    $sq = "SELECT * FROM nsx WHERE MaNSX = '$idnsx'";
                    $resul = $link->query($sq);
                    
                    if ($resul->num_rows > 0) {
                        // output data of each row
                        while ($ro = $resul->fetch_assoc()) {
                    ?>
                            <h1><?php echo $ro["TenNSX"] ?></h1>
                            <span><?php echo $ro["GioiThieu"] ?></span>
                    <?php
                        }
                    } ?>
                </div>
            </div>
        </div>
    </div>
    <div class="services">
        <div class="container">
            <div class="row">
                <?php

                $sql = "SELECT * FROM sanpham WHERE MaNSX = '$idnsx'";
                $result = $link->query($sql);

                if ($result->num_rows > 0) {
                    // output data of each row
                    while ($row = $result->fetch_assoc()) {
                        echo '<div class="col-md-4">';
                        echo '<div class="service-item">';
                        echo '<img src="img/' . $row["HinhAnh"] . '" alt="">';
                        echo '<div class="down-content">';
                        echo '<h4>' . $row["TenSanPham"] . '</h4>';
                        echo '<div style="margin-bottom:10px;">';
                        echo '<span>';
                        echo '<del>' . $row["GiaSanPham"] * 1.5 . '<sup>VND</sup></del> &nbsp;' . $row["GiaSanPham"] . '<sup>VND</sup>';
                        echo ' </span>';
                        echo '</div>';
                        echo '<p>' . $row["Ram"] . ' </p>';
                        echo '<p>' . $row["BoNho"] . ' </p>';
                        echo '<a href="product-details.php?masp=' . $row["MaSanPham"] . ' " class="filled-button">Xem thêm</a>';
                        echo '</div>';
                        echo '</div>';

                        echo '<br>';
                        echo '</div>';
                    }
                } else {
                    echo "0 results";
                }
                ?>
            </div>

            <br>
            <br>

            <nav>
                <ul class="pagination pagination-lg justify-content-center">
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">«</span>
                            <span class="sr-only">Previous</span>
                        </a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true">»</span>
                            <span class="sr-only">Next</span>
                        </a>
                    </li>
                </ul>
            </nav>

            <br>
            <br>
            <br>
            <br>
        </div>
    </div>

    <!-- Footer Starts Here -->
    <?php include("footer.php"); ?>
</body>

</html>