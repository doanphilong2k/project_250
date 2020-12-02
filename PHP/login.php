<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="Purchase Manager - Quản lý mua bán" />
        <meta name="author" content="Do Tuan Kiet & Doan Phi Long" />
        <title>Đăng Nhập</title>
        <link rel="stylesheet" type="text/css" href="../CSS/styles.css" />
        <link rel="stylesheet" type="text/css" href="../CSS/main.css" />
        <link rel="stylesheet" type="text/css" href="../CSS/mystyle.css" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4"> 
                                        <i class="fas fa-lock icon-color-login"></i> Đăng nhập 
                                    </div>
                                    <div class="card-body">
                                        <form method="post" action="login-process.php">
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputUsername">
                                                    <i class="fas fa-user icon-align"></i> Tài khoản
                                                </label>
                                                <input class="form-control py-4" id="inputUsername" name="user" type="text" placeholder="Nhập tài khoản" />
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputPassword">
                                                    <i class="fas fa-unlock icon-align"></i> Mật khẩu
                                                </label>
                                                <input class="form-control py-4" id="inputPassword" name="pass" type="password" placeholder="Nhập mật khẩu" />
                                            </div>
                                            <div class="form-group d-flex flex-row-reverse align-items-center justify-content-between mt-4 mb-0">
                                                <button class="btn btn-primary" id="submitBtn" name="submit" type="submit" onclick="loginCheck()">Đăng nhập</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../JS/scripts.js"></script>
    </body>
</html>
