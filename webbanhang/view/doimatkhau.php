<?php session_start();?>
<link href="../public/css/CSSCoban.css" rel="stylesheet" type="text/css"/>



<div class="formdmk" >
    <form name="fdoimatkhau" id="fdoimatkhau" action="" method="post">
        <label for="pass-cu">Mật khẩu cũ:</label><br/>
        <input type="password" id="pass-cu" name="pass-cu" autofocus><br/>
        <small style="color: red" id="pass-cu-null"></small><br/>
        <label for="pass-moi">Mật khẩu mới:</label><br/>
        <input type="password" id="pass-moi" name="pass-moi"><br/>
        <small style="color: red" id="pass-moi-null"></small><br/>
        <label for="re-pass-moi">Nhập lại mật khẩu mới:</label><br/>
        <input type="password" id="re-pass-moi" name="re-pass-moi"><br/>
        <small style="color: red" id="repass-moi-null"></small><br/>
        <button type="button" id="btnDoiMK">Xác nhận</button>
    </form>
</div>

<script type="text/javascript" src="../public/js/jquery-3.3.1.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
       $("#btnDoiMK").click(function () {
          var passcu = $("#pass-cu").val();
          var passmoi = $("#pass-moi").val();
          var repassmoi = $("#re-pass-moi").val();

           if(passcu==""){
                $("#pass-cu-null").html("Không được để trống trường này");
                return false;
            }
           if(passmoi == ""){
                $("#pass-moi-null").html("Không được để trống trường này");
                return false;
            }
           if(repassmoi!=passmoi){
                $("#repass-moi-null").html("Không khớp với mật khẩu mới");
                return false;
            }

           $.ajax({
               url: "view/xulyLayMK.php",
               type: "POST",
               data: "passcu=" + passcu + "&&passmoi=" + passmoi,
               success: function (ketQua) {
                   if (ketQua == 1)
                       $("#pass-cu-null").html("Mật khẩu sai");
                   else if (ketQua == 2)
                       alert("Cập nhật mật khẩu thành công");
                   alert(ketQua);
               }
           });

           $("#fdoimatkhau input").focusin(function () {
               $("#pass-cu-null").html("");
               $("#pass-moi-null").html("");
               $("#repass-moi-null").html("");
           });
       });

    });
</script>