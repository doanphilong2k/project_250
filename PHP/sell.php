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
    <body class="sb-nav-fixed">
    <?php
        include_once("config.php");
        session_start();
        if(!isset($_SESSION['logined']) || $_SESSION['logined'] == "" || $_SESSION['logined'] == null )
        {
            header('location: login.php');
        }
        else {
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
                        <form name="form-search" method="post" action="#">
                            <input class="breadcrumb-input mb-4 mt-4" type="text" name = "search-input" id="search-input" list="ide" />
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
                                            echo '<option> ' .$item['MSHH'];
                                            echo "-".$item['TenHH']. '</td> </option>';
                                        }
                                    }catch(PDOException $e){
                                        die($e->getMessage());
                                    }
                                    ?>
                                </select>
                            </datalist>
                        </form>

                        <div class="card card-new mb-4">
                            <div class="table-responsive">
                                <table class="table table-bordered2 table-new" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Mã hàng</th>
                                            <th>Tên sản phẩm</th>
                                            <th>Số lượng</th>
                                            <th>Giá bán</th>
                                            <th>Thành tiền</th>
                                            <th></th>
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
                        <div class="alert alert-success"> 
                            Gõ mã hoặc tên sản phẩm vào hộp tìm kiếm để thêm hàng vào đơn hàng
                        </div>
                    </div>              
                </main>
            </div>
            <div id="layoutSell_info">
                <div id="info-top">
                    <table>
                        <tr>
                            <td>Khách hàng</td>
                            <td>
                                <input type="text" placeholder="Tìm khách hàng"/>
                            </td>
                        </tr>
                        <tr>
                            <td>NV bán hàng</td>
                            <td>
                                <select>
                                    <option>Đoàn Phi Long</option>
                                    <option>Đỗ Tuấn Kiệt</option>
                                    <option>Vũ Minh Châu</option>
                                </select>
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
                        <tr>
                            <td> Hình thức </td>
                            <td>
                                <input type="radio" /><label> Tiền mặt </label>
                                <input type="radio" /><label> Thẻ </label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Số Lượng:
                            </td>
                            <td>
                                    <input type="number" id="quantity" name="quantity" min="1" max="100">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Đơn Giá:
                            </td>
                            <td>
                                <span></span>
                            </td>
                        </tr>
                        <tr>
                            <td> Thành Tiền </td>
                            <td>
                                <span> 3.000.000 </span>
                            </td>
                        </tr>
                        <tr>
                            <td> Giảm giá </td>
                            <td>
                                <input type="text" readonly/>
                            </td>
                        </tr>   
                        <tr>
                            <td> Tổng cộng </td>
                            <td>
                                <span> 3.000.000 </span>
                            </td>
                        </tr>  
                        <tr>
                            <td> Khách đưa </td>
                            <td>
                                <input type="text" readonly/>
                            </td>
                        </tr>  
                        <tr>
                            <td> Còn nợ </td>
                            <td>
                                <span> 0 </span>
                            </td>
                        </tr>  
                    </table>
                    <div>
                        <button type="button" class="btn btn-primary mt-2 safe-btn">
                            <i class="fas fa-check"></i>
                            Thanh Toán
                        </button>
                    </div>
                </div>
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
