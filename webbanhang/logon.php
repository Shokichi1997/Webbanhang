<!-- Đăng nhập popup -->
<script src="public/js/jquery-3.3.1.min.js" type="text/javascript"></script>
<div id="dangnhap-dialog" class="dangnhap-popup">
    <div class="dangnhap-noidung">
        <div class="close">&times;</div>

        <div class="img-dangNhap">
            <div id="nhanDangNhap">ĐĂNG NHẬP</div>
            <div id="nhanDangKy">ĐĂNG KÝ</div>
            <div class="imgTuongTrung"><img src="images/dn.png" id="imglogin"/></div>
        </div>

        <div class="box-input">
            <div><a id="dn" onClick="showDangNhap()">
                    <p id="tabDangNhap"><font face="Tahoma, Geneva, sans-serif">ĐĂNG NHẬP</font></p>
                </a></div>
            <div><a id="dk" onClick="showDangKy()">
                    <p id="tabDangKy"><font face="Tahoma, Geneva, sans-serif">ĐĂNG KÝ</font></p>
                </a></div>
            <div style="clear:both"></div>

            <!--Phần trang đăng nhập----------------------------->


            <div id="dnhap">
                <form action="xuLyLog.php" class="formatForm" method="post" id="flogin" name="flogin">

                    <div class="lineDN">
                        <div class="lblEmail"><label for="email">Email: </label></div>
                        <div class="txtEmail">
                            <input type="email" name="email" id="email" placeholder="Email" onclick='clickon()'/></div>
                        <br/>
                        <small id="email-not"></small>
                        <div style="clear:both"></div>
                    </div>

                    <div class="lineDN">
                        <div class="lblPass">
                            <label for="password">Mật khẩu: </label></div>
                        <div class="txtPass">
                            <input type="password" name="pass" id="pass" placeholder="Mật khẩu" onclick='clickon()'/>
                        </div>
                        <br/>
                        <small id="pass-not"></small>
                        <div style="clear:both"></div>
                    </div>

                    <div class="lineDN">
                        <button type="button" name="btnDangNhap" id="btnDangNhap" style="margin-bottom:10px;">Đăng
                            nhập
                        </button>
                        <br/>
                        Quên mật khẩu nhấn vào <a class="format-url" id="layPass"
                                                  style="color:#00F;font-weight:bolder;">đây</a></div>
                </form>
            </div>

            <!--Phần trang đăng ký-->

            <div id="dky">
                <form id="fsignin" name="fsignin" action="" class="formatForm" method="post">
                    <div class="lineDN">
                        <div class="lblName"><label for="name">Họ và Tên: </label></div>
                        <div class="txtName">
                            <input type="text" name="name" id="name" placeholder="Họ và tên" value=""/></div>
                        <br/>
                        <small id="name-not"></small>
                        <div style="clear:both"></div>
                    </div>

                    <div class="lineDN">
                        <div class="lblEmail"><label for="email-dk">Email: </label></div>
                        <div class="txtEmail"><input type="email" name="email-dk" id="email-dk" placeholder="Email"
                                                     value=""/></div>
                        <br/>
                        <small id="emailDK-not"></small>
                        <div style="clear:both"></div>
                    </div>

                    <div class="lineDN">
                        <div class="lblPass"><label for="pass-dk">Mật khẩu: </label></div>
                        <div class="txtPass"><input type="password" name="pass-dk" id="pass-dk" placeholder="Mật khẩu"
                                                    value=""/></div>
                        <br/>
                        <small id="passDK-not"></small>
                        <div style="clear:both"></div>

                    </div>

                    <div class="lineDN">
                        <div class="lblPhone"><label for="phone">Số điện thoại:</label></div>
                        <div class="txtPhone"><input type="tel" name="phone" id="phone" placeholder="Số điện thoại"
                                                     value=""/></div>
                        <br/>
                        <small id="phone-not"></small>
                        <div style="clear:both"></div>
                    </div>

                    <div class="lineDN">
                        <button type="button" name="btnDangKy" id="btnDangKy">Đăng ký</button>
                    </div>
                </form>
                <br/>
            </div>
        </div>
    </div>
</div>

<!--Phần lấy lại mật khẩu-->
<div id="layMK-dialog" class="layMK-popup">
    <div class="layMK-noidung">
        <div class="close">&times;</div>
        <div class="tieudeLayMK">Bạn đã quên mật khẩu?</div>
        <div class="motaLayMK">Hãy gửi email để chúng tôi gửi bạn một đường link khôi phục mật khẩu trong hộp thư của
            bạn
        </div>
        <div>
            <form action="xulylaymk.php" method="post" name="ftpass" id="ftpass" class="formatForm">
                <div class="lineDN">
                    <div class="lblEmail"><label for="email-layMK">Email: </label></div>
                    <div class="txtEmail">
                        <input type="email" name="email-layMK" id="email-layMK" placeholder="Email"/></div>
                    <div style="clear: both;"></div>
                    <small id="email-tpass-not"></small>

                </div>

                <div class="lineDN">
                    <button type="button" id="btnLayMK" name="btnLayMK">Gửi</button>
                </div>
            </form>
        </div>
    </div>
</div>


<script type="text/javascript">
    $(document).ready(function (e) {
        $("#btnDangNhap").click(function () {
            var email = $('#email').val();
            var pass = $('#pass').val();

            if (email == "") {
                $("#email-not").html("Không được để trống email");
                return false;
            }
            if (pass == "") {
                $("#pass-not").html("Không được để trống mật khẩu");
                return false;
            }
            $.ajax({
                url: "xuLyLog.php",
                type: "POST",
                data: "email=" + email + "&&pass=" + pass,
                success: function (ketQua) {
                    if (ketQua == 1)
                        $("#email-not").html("Email không tồn tại");
                    else if (ketQua == 2)
                        $("#pass-not").html("Mật khẩu không chính xác");
                    else if (ketQua == 3)
                        window.location = "index.php";
                }
            });

        });

        $("#btnDangKy").click(function () {
            var name = $("#name").val();
            var email = $("#email-dk").val();
            var pass = $("#pass-dk").val();
            var phone = $("#phone").val();

            if (name == "") {
                $("#name-not").html("Hãy nhập vào họ và tên");
                return false;
            }
            if (email == "") {
                $("#emailDK-not").html("Hãy nhập vào email");
                return false;
            }
            if (pass == "") {
                $("#passDK-not").html("Hãy nhập vào mật khẩu");
                return false;
            }
            if (phone == "") {
                $("#phone-not").html("Hãy nhập vào số điện thoại");
                return false;
            }
            $.ajax({
                url: "xuLyDK.php",
                type: "POST",
                data: "name=" + name + "&&email=" + email + "&&pass=" + pass + "&&phone=" + phone,
                success: function (ketQuaDK) {
                    if (ketQuaDK == 1)
                        $("#emailDK-not").html("Địa chỉ email này đã được dùng");
                    else if (ketQuaDK == 2)
                        window.location = "index.php";
                }
            });
        });

        $("#flogin input").focusin(function () {
            $("#email-not").html("");
            $("#pass-not").html("");

        });

        $("#fsignin input").focusin(function () {
            $("#name-not").html("");
            $("#emailDK-not").html("");
            $("#passDK-not").html("");
            $("#phone-not").html("");
        });

        $("#ftpass input").focusin(function () {
            $("#email-tpass-not").html("");
        });

        $("#btnLayMK").click(function () {
            var email = $("#email-layMK").val();
            if(email==""){
                $("#email-tpass-not").html("Bạn chưa nhập email");
            }
            $.ajax({
                url: "xulylaymk.php",
                type: "POST",
                data: "email=" + email,
                success: function (ketQuaDK) {
                    if (ketQuaDK == 1)
                        $("#email-tpass-not").html("Email này chưa được đăng ký tài khoản");
                    else if (ketQuaDK == 2) {
                        alert('Mật khẩu đã được gửi vào email của bạn. Hãy kiểm tra email và đăng nhập.');
                        window.location = "index.php";
                    }
                    else if(ketQuaDK == 3){
                        $("#email-tpass-not").html("Đã sảy ra sự cố. Vui lòng nhập lại");
                    }
                }
            });
        });

    });
</script>
