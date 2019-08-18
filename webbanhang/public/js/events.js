// JavaScript Document
// Hiện form đăng nhập tài khoản
var modal = document.getElementById('dangnhap-dialog');
var btnDN = document.getElementById("dangnhap");
var btnDK = document.getElementById("dangky");
var nutClose = document.getElementsByClassName("close")[0]; 
var dn = document.getElementById("dnhap");
var dk = document.getElementById("dky");
var modalPass = document.getElementById("layMK-dialog");
var btnLayMK = document.getElementById("layPass");
btnDN.onclick = function() {
    modal.style.display = "block";
	dn.style.display = "block";
	dk.style.display = "none";
	document.getElementById("tabDangNhap").style.borderBottom = "solid 4px #FFCC33";
	document.getElementById("tabDangKy").style.borderBottom = "none";
	document.getElementById("nhanDangKy").style.display = "none";
	document.getElementById("nhanDangNhap").style.display = "block";
}
btnDK.onclick = function() {
    modal.style.display = "block";
	dn.style.display = "none";
	dk.style.display = "block";
	document.getElementById("tabDangKy").style.borderBottom = "solid 4px #FFCC33";
	document.getElementById("tabDangNhap").style.borderBottom = "none";
	document.getElementById("nhanDangKy").style.display = "block";
	document.getElementById("nhanDangNhap").style.display = "none";
}



window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
	if (event.target == modalPass) {
		modalPass.style.display="none";
	}
}

function showDangNhap(){
	document.getElementById("dnhap").style.display = "block";
	document.getElementById("dky").style.display = "none";
	document.getElementById("tabDangNhap").style.borderBottom = "solid 4px #FFCC33";
	document.getElementById("tabDangKy").style.borderBottom = "none";
	document.getElementById("nhanDangKy").style.display = "none";
	document.getElementById("nhanDangNhap").style.display = "block";
	}
function showDangKy(){
	document.getElementById("dnhap").style.display = "none";
	document.getElementById("dky").style.display = "block";
	document.getElementById("tabDangNhap").style.borderBottom = "none";
	document.getElementById("tabDangKy").style.borderBottom = "solid 4px #FFCC33";
	document.getElementById("nhanDangKy").style.display = "block";
	document.getElementById("nhanDangNhap").style.display = "none";
	}


//Hiển thị form lấy lại mật khẩu:

btnLayMK.onclick = function(){
	modalPass.style.display = "block";
	modal.style.display = "none";
}

nutClose.onclick = function() {
    modal.style.display = "none";
	
}
var nutClose2 = document.getElementsByClassName("close")[1];
nutClose2.onclick = function(){
	modalPass.style.display = "none";
}

// Khi kéo xuống 100px từ đầu trang , sẽ hiện thị nút
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
    if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
        document.getElementById("goHome").style.display = "block";
    } else {
        document.getElementById("goHome").style.display = "none";
    }
}

// Khi click vào nút, sẽ cuộn về đầu trang
function topFunction() {
    document.body.scrollTop = 0; // For Chrome, Safari and Opera 
    document.documentElement.scrollTop = 0; // For IE and Firefox
}

$(document).ready(function() {
	//Khi click vao nut truSL
	$("button#truSL").click(function(){
		var soluong = parseInt($("input#soluongSP").val());
		if(soluong>1)
			$("input#soluongSP").val(--soluong);
		$.ajax({
            url: "chitietsp.php",
            type:"POST",
            data: "soluong="+soluong,
            success:function () {
                $("#soluongSPg").val(soluong);
            }
        });
	});
	
	$("button#congSL").click(function(){
		var soluong = parseInt($("input#soluongSP").val());
		if(soluong<100)
			$("input#soluongSP").val(++soluong);
	});
	$("input#soluongSP").change(function(){
		var soluong = parseInt($("input#soluongSP").val());
		if(soluong<1)
			$("input#soluongSP").val(1);
		else if(soluong>100)
			$("input#soluongSP").val(100);
	});

    $('#zoom1').zoom(function () {
        this.zoom();
    });



});








  