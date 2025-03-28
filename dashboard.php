<?php error_reporting(1); ?>
<?php include('./constant/layout/head.php'); ?>
<?php include('./constant/layout/header.php'); ?>

<?php include('./constant/layout/sidebar.php'); ?>
<?php

$sql = "SELECT * FROM product WHERE status = 1";
$query = $connect->query($sql);
$countProduct = $query->num_rows;

$orderSql = "SELECT * FROM orders WHERE order_status = 1";
$orderQuery = $connect->query($orderSql);
$countOrder = $orderQuery->num_rows;

$totalRevenue = 0;

while ($orderResult = $orderQuery->fetch_assoc()) {
    //echo $orderResult['paid'];exit;
    $totalRevenue += $orderResult['paid'];
}

$lowStockSql = "SELECT * FROM product WHERE quantity <= 3 AND status = 1";
$lowStockQuery = $connect->query($lowStockSql);
$countLowStock = $lowStockQuery->num_rows;

$userwisesql = "SELECT tbl_client.name , SUM(orders.grand_total) as totalorder,order_id FROM orders INNER JOIN tbl_client ON orders.client_name = tbl_client.id WHERE orders.order_status = 1 GROUP BY orders.client_name";
$userwiseQuery = $connect->query($userwisesql);
$userwieseOrder = $userwiseQuery->num_rows;

$connect->close();

?>

<style type="text/css">
    .ui-datepicker-calendar {
        display: none;
    }
</style>


<!-- UI Section with Inline CSS -->
<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-7 d-flex justify-content-center">
                <div class="row justify-content-center">

                    <!-- Card 1: Total Product -->
                    <div class="col-md-6 dashboard">
                        <div class="card" style="background: #2BC155; padding: 10px;">
                            <div class="media widget-ten">
                                <div class="media-left meida media-middle">
                                    <span><i class="ti-user f-s-40" style="color: white;"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <h2 style="color: white;"><?php echo $countProduct; ?></h2>
                                    <a href="food.php" style="color: white;">
                                        <p class="m-b-0">Total Product</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Card 2: Total Invoice -->
                    <?php if (isset($_SESSION['userId'])) { ?>
                        <div class="col-md-6 dashboard">
                            <div class="card" style="background-color: #F94687; padding: 10px;">
                                <div class="media widget-ten">
                                    <div class="media-left meida media-middle">
                                        <span><i class="ti-files f-s-40" style="color: white;"></i></span>
                                    </div>
                                    <div class="media-body media-text-right">
                                        <h2 style="color: white;"><?php echo $countOrder; ?></h2>
                                        <a href="invoice.php" style="color: white;">
                                            <p class="m-b-0">Total Invoice</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

                    <!-- Card 3: Current Date -->
                    <div class="col-md-6 dashboard">
                        <div class="card" style="background-color: #ffc107; padding: 10px;">
                            <div class="media widget-ten">
                                <div class="media-left meida media-middle">
                                    <span><i class="ti-calendar f-s-40" style="color: white;"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <h1 style="color: white;"><?php echo date('d'); ?></h1>
                                    <p style="color: white;"><?php echo date('l') . ' ' . date('d') . ', ' . date('Y'); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Card 4: Total Revenue -->
                    <div class="col-md-6 dashboard">
                        <div class="card" style="background-color: #009688; padding: 10px;">
                            <div class="media widget-ten">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-money f-s-40" style="color: white;"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <h1 style="color: white;"><?php echo $totalRevenue ? $totalRevenue : '0'; ?></h1>
                                    <p style="color: white;">Total Revenue</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>



<?php include('./constant/connect.php');
$user = $_SESSION['userId'];
$sql = "SELECT order_id, order_date, client_name, client_contact, payment_status FROM orders WHERE order_status = 1 AND user_id = '$user'";
$result = $connect->query($sql);

//echo $sql;exit;

//echo $itemCountRow;exit; 
?>

<div class="col-md-12">
    <div class="card">
        <div class="card-header">
        <strong class="card-title">
    <a style="text-decoration: none; color: inherit;">Invoices</a>
</strong>
        </div>
        <div class="card-body">
            <table id="myTable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Invoice Date</th>
                        <th>Customer ID</th>
                        <th>Contact</th>

                    </tr>
                </thead>
                <br>
 
                </div>
                <a href="invoice.php"style="text-decoration: none; color: blue;">"Click here to Get a Detailed View"</a>
                <tbody>
                    <?php
                    foreach ($result as $row) {


                    ?>
                        <tr>
                            <td><?php echo $row['order_date'] ?></td>
                            <td><?php echo $row['client_name'] ?></td>
                            <td><?php echo $row['client_contact'] ?></td>
                           
                        </tr>

                </tbody>
            <?php
                    }

            ?>
            </table>
        </div>
    </div>
</div>
</div>


</div>
</div>
</div>


<?php include('./constant/layout/footer.php'); ?>