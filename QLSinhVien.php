<?php
session_start();
?>
<?php 
    include 'ketnoi.php';
    if (isset($_POST["btnXoa"]))
    {
        $maSV = $_POST["btnXoa"];
        $sql = "DELETE FROM SinhVien WHERE MaSV='".$maSV."'";
        $result = $conn->query($sql);
        if ($result && $conn->affected_rows > 0)
        { 
            echo '<script>alert("Xóa thành công");</script>';
        }
        else
        {
            echo '<script>alert("Có lỗi khi xóa");</script>';
        }
        header('Location: QLSinhVien.php');
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
            <form action="#" method="post">
            <table >
                <tr>
                    <td colspan="11">
                        <h1>Danh Sách Sinh Viên</h1>
                    </td>
                </tr>
                <tr>
                    <td colspan="11">
                        <button class="btn btn-info vt"> <a href="ThemSinhVien.php"><i class="fas fa-user-plus"></i> Thêm Mới</a></button>
                    </td>
                </tr>
                <tr class="tieude">
                        <th>STT</th>
                        <th>Mã SV</th>
                        <th>Họ Tên</th>
                        <th>Ngày Sinh</th>
                        <th>Giới Tính</th>
                        <th>Địa Chỉ</th>
                        <th>Lớp</th>
                        <th>Ngành</th>
                        <th>Khóa Học</th>
                        <th>Ảnh</th>
                        <th>Thao Tác</th>
                </tr>
                <?php
                    include 'ketnoi.php';
                    $old_avatar = (isset( $_POST['old_avatar']))? $_POST['old_avatar']:"";
                    if (isset($_FILES['fileToUpload']))
                    {
                        // Nếu file upload không bị lỗi,
                        // Tức là thuộc tính error > 0
                        if ($_FILES['fileToUpload']['error'] > 0)
                        {
                            $avatar = $old_avatar;
                        }
                        else{
                            // Upload file
                            move_uploaded_file($_FILES['fileToUpload']['tmp_name'], 'uploads/'.$_FILES['fileToUpload']['name']);
                            $avatar = 'uploads/'.$_FILES['fileToUpload']['name'];
                        }
                    }

                    $sql = "SELECT MaSV,TenSV ,NgaySinh, GioiTinh, DiaChi, TenLop, TenNganh, SinhVien.MaKH,Anh FROM SinhVien, Lop, Nganh, KhoaHoc where 
                    SinhVien.MaLop = Lop.MaLop and SinhVien.MaNganh = Nganh.MaNganh and SinhVien.MaKH= KhoaHoc.MaKH";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) 
                    {
                        $i = 1;
                        while($row = $result->fetch_assoc()) 
                        {
            ?>
                    <tr class="table-primary" class="tieude">
                            <td><?= $i++ ?></td>
                            <td><?= $row['MaSV'] ?></td>
                            <td><?= $row['TenSV'] ?></td>
                            <td><?= $row['NgaySinh'] ?></td>
                            <td><?= $row['GioiTinh']  ?></td>
                            <td><?= $row['DiaChi']  ?></td>
                            <td><?= $row['TenLop']  ?></td>
                            <td><?= $row['TenNganh']  ?></td>
                            <td><?= $row['MaKH']  ?></td>
                            <td><img src="<?= $row['Anh'] ?>" width="100px"></td>
                            <td>
                                <button class="btn btn-danger" type="submit" name='btnXoa' value='<?= $row["MaSV"] ?>'>Xóa</button>
                                <button class="btn btn-success"> <a href="SuaSinhVien.php?id=<?=$row["MaSV"]?>">Sửa</a></button>
                                
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