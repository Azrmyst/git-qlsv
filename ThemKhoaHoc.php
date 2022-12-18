<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="qly.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">
    <title>Hệ Thống Quản Lý Sinh Viên</title>
</head>
<?php
if (isset($_POST["btnThem"]))
{
    $MaKH=(isset($_POST['MaKH']))?($_POST['MaKH']):"";
    $NamBD=(isset($_POST['NamBD']))?($_POST['NamBD']):"";
    $NamKT=(isset($_POST['NamKT']))?($_POST['NamKT']):"";
    include 'ketnoi.php';
    $sql_insert = "insert into KhoaHoc values('".$MaKH."','".$NamBD."','".$NamKT."')";
    if($MaKH != '' && $NamBD!='' && $NamKT!=''){
        mysqli_query($conn,$sql_insert);
        echo'<script type="text/javascript">alert("Thêm Thành công!!");</script>';

    }else{
        echo'<script type="text/javascript">alert("Bạn phải nhập Mã Khóa Học, Năm Bắt Đầu và Năm Kết Thúc");</script>';
    }
}
?>
<body class="body1">
    <header>
        <div class="thanhchon">
            <div class="thanhchon1">
                <a href="trangchu.php"><i class="fas fa-home"></i> Trang Chủ</a>
                <a href="dangnhap.php"><i class="fas fa-search"></i> Tra Cứu</a>
                <a href="dangnhap.php"><i class="fas fa-info-circle"></i> Thông Tin</a>
            </div>
            <div class="thanhchon2">
                <?php
                    if(isset($_SESSION['username'])) :
                    ?>
                    <a href="dangxuat.php">Đăng Xuất</a>
                    <a href="#"><?= $_SESSION['username'] ?></a>
                    <?php
                    else :
                    ?>
                    <a href="dangnhap.php">Đăng Xuất</a>
                        <a href="dangnhap.php">Đăng Nhập</a>
                    <?php
                    endif;
                ?>
            </div>
        </div>
    </header>
       <div>
            <div class="left">
                <div class= "form">
                    <ul>
                    <li><a href="QLTaiKhoan.php"><i class="fas fa-user"></i> Tài Khoản</a></li><hr>
                        <li><a href="QLLop.php"><i class="fas fa-users"></i> Lớp</a></li><hr>
                        <li><a href="QLKhoaHoc.php"><i class="fas fa-chalkboard-teacher"></i> Khóa Học</a></li><hr>
                        <li><a href="QLNganh.php"><i class="fas fa-code-branch"></i> Ngành</a></li><hr>
                        <li><a href="QLSinhVien.php" ><i class="fas fa-graduation-cap"></i> Sinh Viên</a></li><hr>
                        <li class="tracuu"><a href="#"><i class="fas fa-search"></i><i class="list"></i> Tra Cứu</a>
                        <div class="list-tracuu">
                            <a href="TimKiemSV.php">Tra Cứu Sinh Viên</a>
                            <a href="TimKiemKhoaHoc.php">Tra Cứu Khóa Học</a>
                            <a href="TimKiemLop.php">Tra Cứu Lớp</a>
                            <a href="TimKiemNganh.php">Tra Cứu Ngành</a>
                        </div></li><hr>
                    </ul>
                </div>
           </div>
        </div>
        <div class="right">
        <center>
        <form action="#" method="post">
            <table>
                <td colspan="2" class="tieude">
                    <h1>Thêm Khóa Học</h1>
                </td>
                <tr>
                    <td>Mã Khóa Học</td>
                    <td><input type="text" name="MaKH"></td>
                </tr>
                <tr>
                    <td>Năm Bắt Đầu</td>
                    <td><input type="text" name="NamBD"></td>
                </tr>
                <tr>
                    <td>Năm Kết Thúc</td>
                    <td><input type="text" name="NamKT"></td>
                </tr>
                <tr>
                    <td><button class="btn btn-success" name="btnThem"> <i class="fas fa-user-plus"></i> Thêm</button></td>
                    <td><button class="btn btn-info"> <a href="QLKhoaHoc.php">Danh Sách</a></button></td>
                </tr>
            </table>
        </form>
        </center>
        </div>
    <footer>
        <div class="con3"> 
                <h4>ĐẠI KA HẠ LONG</h4>
                <p>Vũ Thị Hoài</p>
            </div>
            <div class="con3"> 
                <h4>NGƯỜI CON THÁI BÌNH</h4>
                <p>TRẦN MINH CÔNG</p>
            </div>
            <div class="con3"> 
                <h4>NGƯỜI CON NAM ĐỊNH </h4>
                <p>PHẠM THÙY LINH</p>
            </div>
            <div class="con3"> 
                <h4>LƯƠN TRẠCH SƠN LA</h4>
                <p>NGUYỄN NINH TÙNG DƯƠNG</p>
            </div>
            <div class="con3"> 
                <h4>CỰC PHẨM HÀ NỘI</h4>
                <p>NGUYỄN PHƯƠNG THẢO</p>
            </div>
    </footer>
</body>
</html>