<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="Purchase Manager - Quản lý mua bán" />
        <meta name="author" content="Do Tuan Kiet & Doan Phi Long" />
        <title>Bán Hàng</title>
        <link rel="stylesheet" type="text/css" href="../CSS/styles.css" />
        <link rel="stylesheet" type="text/css" href="../CSS/main.css" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <body class="sb-nav-fixed">
    <?php
        include_once("config.php");
        session_start();
        if(!isset($_SESSION['logined']) || $_SESSION['logined'] == "" || $_SESSION['logined'] == null )
        {
            header('location: login.php');
        }
        else {
            $donhang = "";
            $i = 0;
            if(isset($_REQUEST['search-input'])) {
                $id = $_REQUEST['search-input'];
                try {
                    $i++;
                    $connect = new PDO('mysql:host = ' . $hostname . '; dbname = ' . $database, $username, $password);
                    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $sql = "SELECT * FROM quanlibanhang.hanghoa Where MSHH = '$id'";
                    $query = $connect->prepare($sql);
                    $query->execute();
                    $result = $query;
                    foreach($result as $item) {
                        if($item['SoLuongHang'] ==  0){
                            $id = null;
                            $_REQUEST['search-input'] == null;
                            $donhang= "";
                            echo "
                                    <script type='text/javascript'> 
                                        alert('Lỗi'); 
                                    </script>";
                        }         
                        $donhang =  '<td>' . $i . '</td>
                                    <td>' . $item['MSHH'] . '</td>
                                    <td>' . $item['TenHH'] . '</td>
                                    <td> <img src = "' . $item['Hinh'] . '"></td>
                                    <td> <input type="number" id="quantity" name="quantity" min="1" max="100"></td>
                                    <td>' . $item['Gia'] . '</td>
                                    <td><span id="thanhtien"></span></td>
                                    <td><button id="Del"><i class="fas fa-trash-alt"></i></button></td>';
                        ?>
                            <script>
                                localStorage.setItem('DonGia', <?php echo $item['Gia'] ?>);
                            </script>
                        <?php
                    }
                } catch (PDOException $e) {
                    die($e->getMessage());
                }
            }
    ?>

        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-blue">
            <a class="navbar-brand" href="index.php">Shop</a>
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
            <div id="layoutSell_content">
                <main>
                    <div class="container-fluid">
                        <form name="form-search" method="post" action="">
                            <input class="breadcrumb-input mb-4 mt-4" type="text" name = "search-input" id="search-input" list="ide" placeholder="Tìm kiếm sản phẩm..."/>
                            <datalist id="ide">
                                <select class="breadcrumb-input mb-4 mt-4">
                                    <?php
                                    try{
                                        $connect = new PDO('mysql:host = '.$hostname.'; dbname = '.$database, $username, $password);
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql = "SELECT * FROM quanlibanhang.hanghoa";
                                        $query = $connect->prepare($sql);
                                        $query->execute();
                                        $result = $query;
                                        foreach ($result as $item) {
                                            echo '<option value = "'.$item['MSHH'].'"> ' .$item['MSHH'];
                                            echo "-".$item['TenHH']. '</td> </option>';
                                        }
                                    }catch(PDOException $e){
                                        die($e->getMessage());
                                    }
                                    ?>
                                </select>
                            </datalist>
                            <input id="submit-accept-search" class="btn btn-primary ml-2" type="submit" name="submit-accept-search" value="Xác Nhận" />
                        </form>

                        <div class="card card-new mb-4">
                            <div class="table-responsive">
                                <table id="SanPham" class="table table-bordered2 table-new" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Mã hàng</th>
                                            <th>Tên sản phẩm</th>
                                            <th>Hình Ảnh</th>
                                            <th>Số lượng</th>
                                            <th>Giá bán</th>
                                            <th>Thành tiền</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        echo $donhang;
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <button id = "add-product" class="btn btn-primary order-button">
                            Thêm Vào Hóa Đơn
                        </button>
                        <div class="alert alert-success margin-alert"> 
                            Gõ mã hoặc tên sản phẩm vào hộp tìm kiếm để thêm hàng vào đơn hàng
                        </div>
                    </div>              
                </main>
            </div>
            <div id="layoutSell_info">
                <form method="post" action="#">
                    <div id="info-top">  
                        <table>
                            <tr>
                                <td>Khách hàng</td>
                                <td>
                                    <input type="text" placeholder="NHập Tên Khách Hàng"/>
                                </td>
                            </tr>
                            <tr>
                                <td>SDT Khách Hàng:</td>
                                <td>
                                    <input type="number" placeholder="NHập SDT Khách Hàng"/>
                                </td>
                            </tr>
                            <tr>
                                <td>NV bán hàng</td>
                                <td>
                                    <span>
                                        <?php
                                            $MaNV = $_SESSION['MSNV'];
                                            try{
                                                $connect = new PDO('mysql:host = '.$hostname.'; dbname = '.$database, $username, $password);
                                                $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                                $sql = "SELECT HoTenNV FROM quanlibanhang.nhanvien WHERE MSNV = '$MaNV'";
                                                $query = $connect->prepare($sql);
                                                $query->execute();
                                                $result = $query;
                                                foreach ($result as $item) {
                                                    echo $item['HoTenNV'];
                                                }
                                            }catch(PDOException $e){
                                                die($e->getMessage());
                                            }
                                        ?>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td class="title-top">Ghi chú</td>
                                <td>
                                    <textarea rows="4" cols="35"></textarea>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div id="info-bottom">
                        <div>
                            <i class="fas fa-info-circle info-color"></i>
                            <h5> Thông tin thanh toán </h5>
                        </div>

                        <table>
                            <tr>
                                <td> Hình thức </td>
                                <td>
                                    <input type="radio" name="radio-btn"/><label> Tiền mặt </label>
                                    <input type="radio" name="radio-btn"/><label> Thẻ </label>
                                </td>
                            </tr>
                            <tr>
                                <td> Thành Tiền </td>
                                <td>
                                    <span id="tongtienthanhtoan">  </span>
                                </td>
                            </tr>
                        </table>
                        <div>
                            <button type="button" class="btn btn-primary mt-2 safe-btn">
                                <i class="fas fa-check"></i>
                                Thanh Toán
                            </button>
                            <button type="button" class="btn btn-danger mt-2 cancel-btn">
                                Hủy
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        
    <?php
        }
    ?>
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="../JS/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="../Assets/demo/datatables-demo.js"></script>
    </body>
</html>
