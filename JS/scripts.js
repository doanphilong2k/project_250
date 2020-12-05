$(document).ready(function (){
    var tongtien = 0;
    "use strict";
    $("#sidebarToggle").on("click", function(e) {
        e.preventDefault();
        $("body").toggleClass("sb-sidenav-toggled");
    });
    $('#quantity').on('input', function(){
        var thanhtien = parseInt($('#quantity').val()) * parseInt(localStorage.getItem('DonGia'));
        $('#thanhtien').text(thanhtien);
    });

    $('#add-product').on('click', function(){
        if($('#thanhtien').text() != ""){
            if(localStorage.getItem('TongTien')){
                tongtien = parseInt(localStorage.getItem('TongTien'));
            }
            tongtien += parseInt($('#thanhtien').text());
            localStorage.setItem('TongTien', tongtien);
            $('#tongtienthanhtoan').text(tongtien);
            $('#SanPham tbody').empty();
        }
    });
    $('#Del').on('click', function(){
        $('#SanPham tbody').empty();
    });

    $(window).on('load', function () {
        if(localStorage.getItem('TongTien')){
            tongtien = parseInt(localStorage.getItem('TongTien'));
            $('#tongtienthanhtoan').text(tongtien);
        }
    });
});

function loginCheck() {
    var user = document.getElementById("inputUsername").value;
    var pass = document.getElementById("inputPassword").value;

    if (user == "" && pass == "")
    {
        alert("Vui lòng nhập thông tin!");
    }
    else if (user == "" && pass != "")
    {
        alert("Vui lòng nhập tài khoản!");
    }
    else if (user != "" && pass == "")
    {
        alert("Vui lòng nhập mật khẩu!");
    }
}

