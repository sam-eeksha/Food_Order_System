<?php include('partials-front/menu.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Order System</title>
    <style>
        <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: 100vh; /* Use min-height instead of height for vertical centering */
            background-color: #f1f2f6;
        }


    header {
        background-color: #333;
        color: #fff;
        text-align: center;
        padding: 10px;
        width: 100%;
    }

    main {
        padding: 20px;
        width: 100%;
        max-width: 800px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        background-color: #fff;
        border-radius: 5px;
        overflow: hidden;
    }
    .rcontainer{
        display: flex;
        flex-direction: column;
        justify content:center;
        align-items:center;
        min-height:100vh;
    }
    .success-message {
            background-color: #4CAF50;
            color: #fff;
            text-align: center;
            padding: 10px;
            margin-bottom: 20px;
    }

    .order-details {
        width: 100%;
            max-width: 800px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            border-radius: 5px;
            overflow: hidden;

    }

    .order-card {
        display: flex;
            flex-direction: column;
            border: 1px solid #ccc;
            padding: 10px;
            margin-top: 10px;
    }

    .order-info, .driver-info {
        padding: 10px;
        border-top: 1px solid #ddd;
    }

    h1, h2, h3, p {
        margin: 0;
    }

    footer {
        background-color: #333;
        color: #fff;
        text-align: center;
        padding: 10px;
        position: absolute;
        bottom: 0;
        width: 100%;
    }
</style>

    </style>
</head>
<body>
    <section class="food-menu">
    <div class="rcontainer">
        <div class="success-message">
            <p>Order Placed Succesfully</p>
        </div>
        <div class="order-details">
            <header>
                <h1>Order Details</h1>
            </header>
            <section class="order-detail">
                <div class="order-card">
   
                    <?php 
                        if(isset($_GET['assignment_id']))
                        {
                            $assignment_id = $_GET['assignment_id'];
                            $sql = "SELECT * FROM assignment WHERE assignment_id=$assignment_id";
                            $res=mysqli_query($conn, $sql);
                            $count = mysqli_num_rows($res);
                            if($count>0)
                            {
                                while($row=mysqli_fetch_assoc($res))
                                {
                                    $assignment_id = $row['assignment_id'];
                                    $order_id = $row['order_id'];
                                    $driver_id = $row['driver_id'];
                                    $order_sql = "SELECT * FROM tbl_order WHERE order_id=$order_id";
                                    $order_res = mysqli_query($conn, $order_sql);
                                    if(mysqli_num_rows($order_res) > 0) 
                                    {
                                        $order_row = mysqli_fetch_assoc($order_res);
                                        $food = $order_row['food'];
                                        $total = $order_row['total'];
                                        $qty = $order_row['qty'];
                                        $total = $order_row['total'];
                                        $customer_name = $order_row['customer_name'];
                                        $customer_address = $order_row['customer_address'];
                                    }
                                    $driver_sql = "SELECT * FROM delivery_drivers WHERE driver_id=$driver_id";
                                    $driver_res = mysqli_query($conn, $driver_sql);
                                    if(mysqli_num_rows($driver_res) > 0) 
                                    {
                                        $driver_row = mysqli_fetch_assoc($driver_res);
                                        $name = $driver_row['name'];
                                        $phone_no = $driver_row['phone_no'];
                                    }
                                    ?>
                                    <div class="order-info">
                                        <h3>Order</h3>
                                        <p>Food:<?php echo $food; ?></p>
                                        <p>Total: <?php echo $total; ?></p>
                                        <p>Quantity: <?php echo $qty; ?></p>
                                        <p>Customer name: <?php echo $customer_name; ?></p>
                                        <p>Customer address: <?php echo $customer_address; ?></p>

                                    </div>
                                    <div class="driver-info">
                                        <h3>Assigned Driver</h3>
                                        <p>Name: <?php echo $name; ?></p>
                                        <p>Contact: <?php echo $phone_no; ?> </p>
                                    </div>
                                    <?php
                                }
                            }
                        }
                    ?>
                </div>
            </section>
        </div>
    </div>
    </section>
</body>
</html>





