<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Đăng Nhập Hệ Thống</title>
   <!--Made with love by Mutiullah Samim -->
   
	<!--Bootsrap 4 CSS-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

    <!--Bootsrap 4 JS-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js">
    
    <!--Icon-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">

    <!--JS-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">

	<!--Custom styles-->
	<link rel="stylesheet" type="text/css" href="dangnhap.css">
</head>
<body>
        <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <form action="dangnhap.php" method="POST" enctype="multipart/form-data" class="box">
                        <h1><i class="fa fa-key"></i></h1>
                        <h2>Đăng Nhập</h2>
                        <input type="text" name="username" placeholder="Tên Tài Khoản">
                        <input type="password" name="matKhau" placeholder="Mật Khẩu"> 
                        <input type="submit" name="btn_DN" value="Login" href="#">
                        <div class="col-md-12">
                            <ul class="social-network social-circle">
                                <li><a href="#" class="icoFacebook" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#" class="icoTwitter" title="Twitter"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#" class="icoGoogle" title="Google +"><i class="fab fa-google-plus"></i></a></li>
                            </ul>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<?php
    include 'ketnoi.php';
    if(isset($_POST['btn_DN']))
    {
        $ten = (isset($_POST['username']))? $_POST['username']:"";
        $matkhau = (isset($_POST['matKhau']))? $_POST['matKhau']:"";
        if($ten == "" || $matkhau == "")
        {
            echo"<script>alert('Tên Tài Khoản và Mật Khẩu không được để trống!')</script>";
        }
        else
        {
            $sql = "SELECT * FROM TaiKhoan where TenTK = '$ten' and MatKhau = '$matkhau'";
            $result = $conn->query($sql);
            if ($result->num_rows == 0) 
            {
                echo"<script>alert('Tên Tài Khoản hoặc Mật Khẩu không đúng!')</script>";
            }
            else
            {
                $_SESSION['username'] = $ten;
                header('Location: QuanLy.php');
            }
        }
    }
?>
