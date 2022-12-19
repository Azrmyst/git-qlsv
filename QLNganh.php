<?php
    session_start();
?>
<?php 
    include 'ketnoi.php';
    if (isset($_POST["btnXoa"]))
    {
        $maNganh = $_POST["btnXoa"];
        $sql = "DELETE FROM Nganh WHERE MaNganh='".$maNganh."'";
        $result = $conn->query($sql);
        if ($result && $conn->affected_rows > 0)
        { 
            echo '<script>alert("Xóa thành công");</script>';
        }
        else
        {
            echo '<script>alert("Có lỗi khi xóa");</script>';
        }
        header('Location: QLNganh.php');
    }
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
            <form action="" method="POST">
            <table>
                <tr>
                    <td colspan="6" align = "center">
                        <h1>Danh Sách Ngành</h1>
                    </td>
                </tr>
                <tr>
                    <td colspan="6">
                        <button class="btn btn-info vt"> <a href="ThemNganh.php"><i class="fas fa-user-plus"></i> Thêm Mới</a></button>
                    </td>
                </tr>
                <tr class= "tieude">
                    <th>STT</th>

                    <th>Mã Ngành</th>

                    <th>Tên Ngành</th>

                    <th>Thao Tác</th>
            </tr>
                <?php
                $sql = "SELECT * FROM Nganh";
                $result = $conn->query($sql);
                if(mysqli_num_rows($result)>0){
                    $i=1;
                    while($row = mysqli_fetch_assoc($result)){
            ?>
            <tr>
                    <td><?= $i ?></td>
                    <td><?= $row["MaNganh"] ?></td>
                    <td><?= $row["TenNganh"] ?></td>
                    <td>
                        <button class="btn btn-danger" type="submit" name='btnXoa' value='<?= $row["MaNganh"] ?>'>Xóa</button>
                        <button class="btn btn-success"> <a href="SuaNganh.php?id=<?=$row["MaNganh"]?>">Sửa</a></button>
                        
                    </td>
            </tr>
            <?php
                $i++;
                    }
                }
            ?>
        </table>
        </form>
        </center>
    </div>

    <footer class="footer">
    <div class="con3"> 
        <h4>Hạ Long</h4>
        <p>Vũ Thị Hoài</p>
    </div>
    <div class="con3"> 
        <h4>THÁI BÌNH</h4>
        <p>TRẦN MINH CÔNG</p>
    </div>
    <div class="con3"> 
        <h4>NAM ĐỊNH </h4>
        <p>PHẠM THÙY LINH</p>
    </div>
    <div class="con3"> 
        <h4>SƠN LA</h4>
        <p>NGUYỄN NINH TÙNG DƯƠNG</p>
    </div>
    <div class="con3"> 
        <h4>HÀ NỘI</h4>
        <p>NGUYỄN PHƯƠNG THẢO</p>
    </div>
    <div class="con3"> 
        <h4>HÀ NỘI</h4>
        <p>Đỗ Thành Quang</p>
    </div>
</footer>
</body>
</html>