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
    $MaSV=(isset($_POST['MaSV']))?($_POST['MaSV']):"";
    $TenSV=(isset($_POST['TenSV']))?($_POST['TenSV']):"";
    $NgaySinh=(isset($_POST['NgaySinh']))?($_POST['NgaySinh']):"";
    $GioiTinh=(isset($_POST['GioiTinh']))?($_POST['GioiTinh']):"";
    $DiaChi=(isset($_POST['DiaChi']))?($_POST['DiaChi']):"";
    $Lop=(isset($_POST['Lop']))?($_POST['Lop']):"";
    $Nganh=(isset($_POST['Nganh']))?($_POST['Nganh']):"";
    $MaKhoaHoc=(isset($_POST['MaKhoaHoc']))?($_POST['MaKhoaHoc']):"";
    $HinhAnh = "";

    //  echo $hoten.'<br>';
    //  echo $ngaysinh.'<br>';
    //  echo $gioitinh.'<br>';
    //  echo $diachi.'<br>';
    include 'ketnoi.php';
    if (isset($_FILES['Anh'])) {
        // Nếu file upload không bị lỗi,
        // Tức là thuộc tính error > 0

        // Upload file
        move_uploaded_file($_FILES['Anh']['tmp_name'], 'uploads/' . $_FILES['Anh']['name']);
        $HinhAnh = 'uploads/' . $_FILES['Anh']['name'];
    } else {
        $error = 'Bạn chưa chọn file upload';
    }
    if (isset($_POST["btnThem"]))
    {
        $sql_insert = "insert into sinhvien values('".$MaSV."','".$TenSV."','".$NgaySinh."','".$GioiTinh."','".$DiaChi."','".$Lop."','".$Nganh."','".$MaKhoaHoc."','".$HinhAnh."')";
        // echo $sql_insert;
        mysqli_query($conn, $sql_insert);
        if($MaSV != '' && $TenSV!='')
        {
            mysqli_query($conn,$sql_insert);
            echo'<script type="text/javascript">alert("Thêm Thành công!!");</script>';

        }
        else
        {
            echo'<script type="text/javascript">alert("Bạn phải nhập Mã SV và Tên SV");</script>';
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
            <form action="#" method="post" enctype="multipart/form-data">
            <table>
            <td colspan="2" class="tieude">
                <h1>Thêm Thông Tin Sinh Viên</h1>
            </td>
                <tr>
                    <td>Mã Sinh Viên</td>
                    <td><input type="text" name="MaSV"></td>
                </tr>
                <tr>
                    <td>Tên Sinh Viên</td>
                    <td><input type="text" name="TenSV"></td>
                </tr>
                <tr>
                    <td>Ngày Sinh</td>
                    <td><input type="date" name="NgaySinh"></td>
                </tr>
                <tr>
                    <td>Giới Tính</td>
                    <td><input type="text" name="GioiTinh"></td>
                </tr>
                <tr>
                    <td>Địa Chỉ</td>
                    <td><input type="text" name="DiaChi"></td>
                </tr>
                <tr>
                    <td>Tên Lớp</td>
                    <td>
                        <select name="Lop">
                            <?php
                            $sql = "SELECT * FROM Lop";
                            $result = $conn->query($sql);
                        //   $maNganh = (isset($_GET['MaNganh']))? $_GET['MaNganh']:0;
                            if(mysqli_num_rows($result)>0) :
                            $i=1;
                            while($row = mysqli_fetch_assoc($result)) :
                            ?>
                            <option value="<?= $row['MaLop'] ?>"><?= $row['TenLop'] ?></option>
                            <?php
                            endwhile;
                        endif;
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Tên Ngành</td>
                    <td> <select name="Nganh">
                            <?php
                            $sql = "SELECT * FROM Nganh";
                            $result = $conn->query($sql);
                        //   $maNganh = (isset($_GET['MaNganh']))? $_GET['MaNganh']:0;
                            if(mysqli_num_rows($result)>0) :
                            $i=1;
                            while($row = mysqli_fetch_assoc($result)) :
                            ?>
                            <option value="<?= $row['MaNganh'] ?>"><?= $row['TenNganh'] ?></option>
                            <?php
                            endwhile;
                        endif;
                            ?>
                        </select></td>
                </tr>
                <tr>
                    <td>Mã Khóa Học</td>
                    <td> <select name="MaKhoaHoc">
                            <?php
                            $sql = "SELECT * FROM KhoaHoc";
                            $result = $conn->query($sql);
                        //   $maNganh = (isset($_GET['MaNganh']))? $_GET['MaNganh']:0;
                            if(mysqli_num_rows($result)>0) :
                            $i=1;
                            while($row = mysqli_fetch_assoc($result)) :
                            ?>
                            <option value="<?= $row['MaKH'] ?>"><?= $row['MaKH'] ?></option>
                            <?php
                            endwhile;
                        endif;
                            ?>
                        </select></td>
                </tr>
                <tr>
                    <td>Hình ảnh</td>
                <td> <input type="file" class="form-control" name="HinhAnh" id="HinhAnh"></td>
                </tr>
                <tr>
                    <!-- <td><input type="submit" value="Thêm" class="btn btn-success" ></td> -->
                    <td><button class="btn btn-success" name="btnThem"><i class="fas fa-user-plus"></i> Thêm</button></td>
                    <td><a href = "QLSinhVien.php" class="btn btn-info">Danh Sách</a></td>
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