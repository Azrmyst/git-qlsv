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
        <table>
            <?php
                include 'ketnoi.php';
                $id = (isset($_GET['id']))? $_GET['id']:0;
                $sql = "SELECT * FROM Lop where MaLop = '".$id."'";
                $result = $conn->query($sql);
                if (mysqli_num_rows($result)>0) {
                    while($row = $result->fetch_assoc()) {
            ?>
            <form action="#" method="POST" enctype="multipart/form-data">
                
                    <td colspan="2" class="tieude">
                        <h1>Sửa Thông Tin</h1>
                    </td>
                
                    <tr>
                        <td style= padding:13px>Mã Lớp</td>
                        <td style=text-align:center><input type="text" value="<?= $row['MaLop']?>"></td>
                    </tr>
                    <tr>
                        <td style= padding:13px>Tên Lớp</td>
                        <td style=text-align:center><input type="text" name="TenLop"  value="<?= $row['TenLop']?>"></td>
                    </tr>
                    <tr>
                        <td style=padding:13px><input type="submit" value="Sửa" class="btn btn-success"></td>
                        <td><button class="btn btn-info"> <a href="QLLop.php">Danh Sách</a></button></td>
                    </tr>
            </form>
        </table>
            <?php
                    }
                }
                else 
                {
                    echo "0 results";
                }
            ?>
            <?php
            $TenLop = (isset($_POST['TenLop']))? $_POST['TenLop']:"";
            $sql = "UPDATE Lop set  TenLop = '$TenLop' where MaLop = '$id'";
            if($TenLop != '' )
            {
                $a =  mysqli_query($conn, $sql);
                if ($a > 0) 
                        {  
                           
                            echo '<script>alert("Sửa thành công");
                            window.location = "http://localhost:8080/Mountain/BTLon/SuaLop.php?id='.$id.'"
                            </script>';     
                        } 
                else
                        {
                            echo "Error updating record: " . $sql . "<br>" . $conn->error;
                        } 
            }
            ?>
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