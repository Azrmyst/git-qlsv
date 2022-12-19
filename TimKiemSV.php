<?php 

require_once('ketnoi.php');

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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
            <table >
                <tr>
                    <td colspan="11">
                        <h1>Danh Sách Sinh Viên</h1>
                    </td>
                </tr>
                <tr>
                    <td colspan="11">
                        <input type="text" name="txtTim" placeholder="Nhập từ khóa">
                        <button class="btn btn-info" name="Tim"><i class="fas fa-search"></i> Tìm</button>
                    </td>   
                </tr>
                
                <tr class="tieude">
                        <th>STT</th>
                        <th>Mã Sinh Viên</th>
                        <th>Họ Tên</th>
                        <th>Ngày Sinh</th>
                        <th>Giới Tính</th>
                        <th>Địa Chỉ</th>
                        <th>Lớp</th>
                        <th>Ngành</th>
                        <th>Khóa Học</th>
                        <th>Hình Ảnh</th>
                </tr>
                <?php
                    include 'ketnoi.php';
                    $sql = ""; 
                    if(isset($_POST['Tim']))
                    {
                        $txtTim = (isset($_POST['txtTim']))? $_POST['txtTim']:"";
                        
                        $sql = "SELECT MaSV,TenSV ,NgaySinh, GioiTinh, DiaChi, TenLop, TenNganh, SinhVien.MaKH,Anh FROM SinhVien, Lop, Nganh, KhoaHoc where 
                        SinhVien.MaLop = Lop.MaLop and SinhVien.MaNganh = Nganh.MaNganh and SinhVien.MaKH= KhoaHoc.MaKH and TenSV like '%".$txtTim."%'";
                    }
                    else
                    {
                        $sql = "SELECT MaSV,TenSV ,NgaySinh, GioiTinh, DiaChi, TenLop, TenNganh, SinhVien.MaKH,Anh FROM SinhVien, Lop, Nganh, KhoaHoc where 
                        SinhVien.MaLop = Lop.MaLop and SinhVien.MaNganh = Nganh.MaNganh and SinhVien.MaKH= KhoaHoc.MaKH ";
                    }
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) 
                    {
                        $i = 1;
                        while($row = $result->fetch_assoc()) 
                        {
                            if($i % 2 == 0)
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
                    </tr>
                <?php 
                            }
                            else
                            {
                ?>
                    <tr class="table-danger">
                            <td><?= +$i ?></td>
                            <td><?= $row['MaSV'] ?></td>
                            <td><?= $row['TenSV'] ?></td>
                            <td><?= $row['NgaySinh'] ?></td>
                            <td><?= $row['GioiTinh']  ?></td>
                            <td><?= $row['DiaChi']  ?></td>
                            <td><?= $row['TenLop']  ?></td>
                            <td><?= $row['TenNganh']  ?></td>
                            <td><?= $row['MaKH']  ?></td>
                            <td><img src="<?= $row['Anh'] ?>" width="100px"></td>
                </tr>
                <?php
                            }
                ?>
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