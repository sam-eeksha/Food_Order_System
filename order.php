
<?php include('partials-front/menu.php'); ?>

    <?php 
        if(isset($_GET['food_id']))
        {
            $food_id = $_GET['food_id'];
            $sql = "SELECT * FROM tbl_food WHERE id=$food_id";
            $res = mysqli_query($conn, $sql);
            $count = mysqli_num_rows($res);
            if($count==1)
            {
                $row = mysqli_fetch_assoc($res);
                $title = $row['title'];
                $price = $row['price'];
                $image_name = $row['image_name'];
            }
            else
            {
                header('location:'.SITEURL);
            }
        }
        else
        {
            header('location:'.SITEURL);
        }
    ?>
    <section class="food-search">
        <div class="abccontainer">
            
            <h2 class="text-center text-white">Fill this form to confirm your order.</h2>

            <form action="" method="POST" class="order">
                <fieldset>
                    <legend  class="text-white">Selected Food</legend>

                    <div class="food-menu-img">
                        <?php 
                            if($image_name=="")
                            {
                                echo "<div class='error'>Image not Available.</div>";
                            }
                            else
                            {
                                ?>
                                <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                                <?php
                            }
                        
                        ?>
                        
                    </div>
    
                    <div class="food-menu-desc">
                        <h3 class="text-white"><?php echo $title; ?></h3>
                        <input type="hidden" name="food" value="<?php echo $title; ?>">

                        <p class="food-price text-white">Rs.<?php echo $price; ?></p>
                        <input type="hidden" name="price" value="<?php echo $price; ?>">

                        <div class="order-label">Quantity</div>
                        <input type="number" name="qty" class="input-responsive" value="1" required>
                        
                    </div>

                </fieldset>
                
                <fieldset>
                    <legend class="text-white">Delivery Details</legend>
                    <div class="order-label">Full Name</div>
                    <input type="text" name="full-name" placeholder="enter your name" class="input-responsive" required>

                    <div class="order-label">Phone Number</div>
                    <input type="tel" name="contact" placeholder="9843xxxxxx" class="input-responsive" required>

                    <div class="order-label">Email</div>
                    <input type="email" name="email" placeholder="hi@sjec.ac.in.com" class="input-responsive" required>

                    <div class="order-label">Address</div>
                    <textarea name="address" rows="10" placeholder="E.g. Street, City, Country" class="input-responsive" required></textarea>

                    <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
                    
                </fieldset>

            </form>

            <?php 
                if(isset($_POST['submit']))
                {
                    $food = $_POST['food'];
                    $price = $_POST['price'];
                    $qty = $_POST['qty'];
                    $total = $price * $qty; 
                    $order_date = date("Y-m-d h:i:sa"); 
                    $status = "Ordered"; 
                    $customer_name = $_POST['full-name'];
                    $customer_contact = $_POST['contact'];
                    $customer_email = $_POST['email'];
                    $customer_address = $_POST['address'];
                    $sql2 = "INSERT INTO tbl_order SET 
                        food = '$food',
                        price = $price,
                        qty = $qty,
                        total = $total,
                        order_date = '$order_date',
                        status = '$status',
                        customer_name = '$customer_name',
                        customer_contact = '$customer_contact',
                        customer_email = '$customer_email',
                        customer_address = '$customer_address'
                    ";
                    $res2 = mysqli_query($conn, $sql2);
                    if($res2==true)
                    {
                        $inserted_order_id = mysqli_insert_id($conn);
                        $driverQuery = "SELECT driver_id FROM delivery_drivers WHERE driver_id NOT IN (SELECT driver_id FROM assignment) LIMIT 1";
                        $driverResult = mysqli_query($conn, $driverQuery);
                                                
                        if ($driverResult && mysqli_num_rows($driverResult) > 0) 
                        {
                            $driverData = mysqli_fetch_assoc($driverResult);
                            $assigned_driver_id = $driverData['driver_id'];
                            $insertAssignmentQuery = "INSERT INTO assignment (order_id, driver_id) VALUES (?, ?)";
                            $stmtAssignment = mysqli_prepare($conn, $insertAssignmentQuery);
                            mysqli_stmt_bind_param($stmtAssignment, "ii", $inserted_order_id, $assigned_driver_id);
                            $insertAssignmentResult = mysqli_stmt_execute($stmtAssignment);
                            if ($insertAssignmentResult)
                            {
                                $inserted_assignment_id = mysqli_insert_id($conn); 
                                header("location: receipt.php?assignment_id=$inserted_assignment_id");
                                exit(); 
                            }  
                            else 
                            {
                                echo "Error: " . mysqli_error($conn);                
                            }
                    
                        }
                    }
                    else
                    {
                        $_SESSION['order'] = "<div class='error text-center'>Failed to Order Food.</div>";
                        header('location:'.SITEURL);
                    }                    
                }

            ?>

        </div>
    </section>