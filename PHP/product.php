<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="Purchase Manager - Quản lý mua bán" />
        <meta name="author" content="Do Tuan Kiet & Doan Phi Long" />
        <title>Sản Phẩm</title>
        <link rel="stylesheet" type="text/css" href="../CSS/styles.css" />
        <link rel="stylesheet" type="text/css" href="../CSS/main.css" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
    <?php
        include_once ("config.php");
        session_start();
        if(!isset($_SESSION['logined']) || $_SESSION['logined'] == "" || $_SESSION['logined'] == null )
        {
            header('location: login.php');
        }
        else {
    ?>

        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-blue">
            <a class="navbar-brand" href="index.php">Shop</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle"><i class="fas fa-bars icon-color-main"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Tìm kiếm..." aria-label="Search" aria-describedby="basic-addon2" />
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="dropdown-toggle icon-color-main" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="#">Cài đặt</a>
                        <a class="dropdown-item" href="#">Hoạt động</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="login.php">Đăng xuất</a>
                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Tổng quan</div>
                            <a class="nav-link" href="sell.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Bán hàng
                            </a>

                            <a class="nav-link" href="order.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-shopping-cart"></i></div>
                                Đơn hàng
                            </a>
                            
                            <a class="nav-link nav-link-active" href="product.php">
                                <div class="sb-nav-link-icon sb-nav-link-icon-active"><i class="fas fa-box"></i></div>
                                Sản phẩm
                            </a>
                           
                            <a class="nav-link" href="customers.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-users"></i></i></div>
                                Khách hàng
                            </a>
                            <a class="nav-link" href="staff.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-user-tie"></i></div>
                                Nhân viên
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Sản phẩm</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Sản phẩm</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Danh sách đơn hàng
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Mã số hàng hóa</th>
                                                <th>Tên hàng hóa</th>
                                                <th>Giá</th>
                                                <th>Số lượng hàng</th>
                                                <th>Mã nhóm</th>       
                                                <th>Hình</th>  
                                                <th>Mô tả hàng hóa</th>                                       
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            try{
                                                $connect = new PDO('mysql:host = '.$hostname.'; dbname = '.$database, $username, $password);
                                                $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                                $sql = "SELECT * FROM quanlibanhang.hanghoa";
                                                $query = $connect->prepare($sql);
                                                $query->execute();
                                                $result = $query;
                                                foreach ($result as $item) {
                                                    echo '<td>' .$item['MSHH']. '</td>';
                                                    echo '<td>' .$item['TenHH']. '</td>';
                                                    echo '<td>' .$item['Gia']. '</td>';
                                                    echo '<td>' .$item['SoLuongHang']. '</td>';
                                                    echo '<td>' .$item['MaNhom']. '</td>';
                                                    echo '<td> <img src = "' .$item['Hinh']. '"></td>';
                                                    echo '<td>' .$item['MoTaHH']. '</td>';
                                                }
                                            }catch(PDOException $e){
                                                die($e->getMessage());
                                            }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </main>
            </div>
        </div>
        
    <?php
        }
    ?>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="../JS/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="../Assets/demo/datatables-demo.js"></script>
    </body>
</html>
