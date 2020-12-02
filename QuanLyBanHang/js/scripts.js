/*!
    * Start Bootstrap - SB Admin v6.0.2 (https://startbootstrap.com/template/sb-admin)
    * Copyright 2013-2020 Start Bootstrap
    * Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-sb-admin/blob/master/LICENSE)
    */
    (function($) {
    "use strict";

    // Add active state to sidbar nav links
    // var path = window.location.href; // because the 'href' property of the DOM element is the absolute path
    //     $("#layoutSidenav_nav .sb-sidenav a.nav-link").each(function() {
    //         if (this.href === path) {
    //             $(this).addClass("active");
    //         }
    //     });

    // Toggle the side navigation
    $("#sidebarToggle").on("click", function(e) {
        e.preventDefault();
        $("body").toggleClass("sb-sidenav-toggled");
    });
})(jQuery);



////////// Login //////////
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

// $(document).ready(function(){
//     $('#submitBtn').on("click",function(){
//         if ($("#inputUsername").val("") && !$('#inputPassword').val("")) {
//             alert("Vui lòng nhập tài khoản!");
//         }
//         else if (!$("#inputUsername").val("") && $("#inputPassword").val("")) {
//             alert("Vui lòng nhập mật khẩu!");
//         }
//     })
// });

