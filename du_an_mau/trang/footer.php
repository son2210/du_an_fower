<?php
require_once ('../quan_tri/ketnoi.php');
$thongtin="SELECT * FROM tt_cuahang";
$abc=mysqli_query($new,$thongtin);
$row = mysqli_fetch_assoc($abc);
?>
<footer class="container ">
        <div class="footer">
            <div class="row">
                <div class="col-4">
                    <h3>Dịch Vụ Khách Hàng </h3>
                    <p>
                        Hotline <span><?=$row['phone']?></span>
                    </p>
                    <p>
                        Tổng đài <span>1900 232322</span>
                    </p>
                    <p>
                        Email : <span><?=$row['email']?></span>
                    </p>
                    <p>
                        Địa Chỉ : <span><?=$row['diachi']?> </span>
                    </p>
                    <p>

                    </p>
                </div>
                <div class="col-4">
                    <h3>Thông Tin</h3>
                    <a href="#"> <i class="fa icon-facebook fa-facebook-square" aria-hidden="true"></i></a>
                    <a href="#"> <i class="fa icon-youtobe fa-youtube-play" aria-hidden="true"></i></a>
                    <a href="#"> <i class="fa icon-twiter fa-twitter" aria-hidden="true"></i></a>

                </div>
                <div class="col-4 footer-lef">
                    <h3>Chăm Sóc Khách Hàng </h3>
                    <a href=""> Chính sách bán hàng </a> <br>
                    <a href="">Chính sách bảo hành </a> <br>
                    <a href="">Chính sách giao hàng</a> <br>
                    <a href=""> Chính sách thanh toán</a> <br>
                    <a href=""> Chính sách bảo mật thanh toán</a> <br>
                    <a href="">Chính sách bảo mật và chia sẻ thông tin</a> <br>
                    <a href="">Điều kiện và điều khoản giao dịch</a> <br>

                </div>
            </div>
        </div>
    </footer>