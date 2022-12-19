<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hệ Thống Quản Lý Sinh Viên</title>
  <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="tchu.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">
</head>
<body>

<div class="header">
  <img src= " https://utt.edu.vn/uploads/images/site/1447347110LOGO_GTVT.png">
</div>

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
<div class="">
   <div class="card1">
     <p class="p1" > Hệ thống quản lý hồ sơ Sinh Viên</p>
    </div>
</div>
  
<div class="cha">
        <h1>Tin Tức - Sự Kiện</h1>
        <div class="con">
            <img src= "anh/tintuc1.jpg" >
            <div class = "text">
            <b><p>Lễ khai giảng trực tuyến năm 2021-2022</p></b>
          <p >Trường Đại học Công nghệ GTVT tổ chức Lễ khai giảng năm học 2021-2022 bằng hình thức trực tuyến....</p>
      </div>
        </div>

        <div class="con">
            <img src= "anh/tintuc2.jpg">
            <div class = "text">
            <b><p>Lễ khai giảng trực tuyến năm 2021-2022</p></b>
          <p >Trường Đại học Công nghệ GTVT tổ chức Lễ khai giảng năm học 2021-2022 bằng hình thức trực tuyến....</p>
      </div>
        </div>
        <div class="con">
            <img src= "anh/tintuc2.jpg">
            <div class = "text">
            <b><p>Lễ khai giảng trực tuyến năm 2021-2022</p></b>
          <p >Trường Đại học Công nghệ GTVT tổ chức Lễ khai giảng năm học 2021-2022 bằng hình thức trực tuyến....</p>
      </div>
        </div>
    </div>
</div>

  <div class="cha1">
  <div class="con1">
                <a href="http://qldt.utt.edu.vn" class=""
                   target="_blank">
                    <img src="https://utt.edu.vn/publics/template/portal/images/utt-app-qldt.png"
                         alt="Quản lý đào tạo">
                    <p>Quản lý đào tạo</p>
                </a>
            </div>
            <div class="con1">
                <a href="http://qlkh.utt.edu.vn" class=""
target="_blank">
                    <img src="https://utt.edu.vn/publics/template/portal/images/utt-app-qlkh.png"
                         alt="Quản lý khoa học">
                    <p>Quản lý khoa học</p>
                </a>
            </div>
            <div class="con1">
                <a href="http://qlvb.utt.edu.vn" class=""
                   target="_blank">
                    <img src="https://utt.edu.vn/publics/template/portal/images/utt-app-qlvb.png"
                         alt="Quản lý văn bản">
                    <p>Quản lý văn bản</p>
                </a>
            </div>
            <div class="con1">
                <a href="http://onegate.utt.edu.vn" class=""
                   target="_blank">
                    <img src="https://utt.edu.vn/publics/template/portal/images/utt-app-hcmc.png"
                         alt="Hành chính một cửa">
                    <p>Hành chính một cửa</p>
                </a>
            </div>
            <div class="con1">
                <a href="http://tuyensinh.utt.edu.vn" class=""
                   target="_blank">
                    <img src="https://utt.edu.vn/publics/template/portal/images/utt-app-tuyensinh.png"
                         alt="Thông tin tuyển sinh">
                    <p>Thông tin tuyển sinh</p>
                </a>
            </div>
            <div class="con1">
                <a href="http://gvcn.utt.edu.vn" class=""
                   target="_blank">
                    <img src="https://utt.edu.vn/publics/template/portal/images/utt-app-gvcn.png"
                         alt="Sổ tay Giáo viên chủ nhiệm">
                    <p>Sổ tay GVCN</p>
                </a>
            </div>
        </div>
    </div>
  </div>
<div class= " leftcolumn">
  <div class="cha2">
        <h1> Sự Kiện</h1>
        <div class="con2">
            <img src= "anh/tintuc1.jpg" >
            <div class = "text">
            <b><p>Lễ khai giảng trực tuyến năm 2021-2022</p></b>
          <p >Trường Đại học Công nghệ GTVT tổ chức Lễ khai giảng năm học 2021-2022 bằng hình thức trực tuyến....</p>
      </div>
        </div>
        <div class="con2">
            <img src= "anh/tintuc2.jpg" class="anhTT">
            <div class = "text">
            <b><p >Lễ khai giảng trực tuyến năm 2021-2022</p></b>
          <p  >Trường Đại học Công nghệ GTVT tổ chức Lễ khai giảng năm học 2021-2022 bằng hình thức trực tuyến....</p>
      </div>
    </div>
</div>
 </div>

 <div class= "rightcolumn">
  <div class="cha2">
        <h1>Thông báo</h1>
        <div class="con4">
            <div class = "text">
                <b><p  >Lễ khai giảng trực tuyến năm 2019-2020</p></b>
                <p >Trường Đại học Công nghệ GTVT tổ chức Lễ khai giảng năm học 2021-2022 bằng hình thức trực tuyến....</p><hr>
      
                <b><p  >Lễ khai giảng trực tuyến năm 2020-2021</p></b>
                <p >Trường Đại học Công nghệ GTVT tổ chức Lễ khai giảng năm học 2021-2022 bằng hình thức trực tuyến....</p><hr>

                <b><p  >Lễ khai giảng trực tuyến năm 2021-2022</p></b>
                <p >Trường Đại học Công nghệ GTVT tổ chức Lễ khai giảng năm học 2021-2022 bằng hình thức trực tuyến....</p><hr>
            </div>
           </div>
         </div>
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
