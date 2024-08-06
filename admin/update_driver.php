<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Driver</h1>

        <br><br>

        <?php 
            //1. Get the ID of Selected Admin
            $id=$_GET['driver_id'];

            //2. Create SQL Query to Get the Details
            $sql="SELECT * FROM delivery_drivers WHERE driver_id=$driver_id";

            //Execute the Query
            $res=mysqli_query($conn, $sql);

            //Check whether the query is executed or not
            if($res==true)
            {
                // Check whether the data is available or not
                $count = mysqli_num_rows($res);
                //Check whether we have admin data or not
                if($count==1)
                {
                    // Get the Details
                    //echo "Admin Available";
                    $row=mysqli_fetch_assoc($res);

                    $name = $row['name'];
                    $vechile_no = $row['vechile_no'];
                    $phone_no = $row['phone_no'];
                }
                else
                {
                    //Redirect to Manage Admin PAge
                    header('location:'.SITEURL.'admin/manage-driver.php');
                }
            }
        
        ?>


        <form action="" method="POST">

            <table class="tbl-30">
                <tr>
                    <td>Full Name: </td>
                    <td>
                        <input type="text" name="name" value="<?php echo $name; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Vechile number: </td>
                    <td>
                        <input type="text" name="vechile_no" value="<?php echo $vechile_no; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Contact number: </td>
                    <td>
                        <input type="text" name="phone_no" value="<?php echo $phone_no; ?>">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="hidden" name="driver_id" value="<?php echo $driver_id; ?>">
                        <input type="submit" name="submit" value="Update Driver" class="btn-secondary">
                    </td>
                </tr>

            </table>

        </form>
    </div>
</div>

<?php 

    //Check whether the Submit Button is Clicked or not
    if(isset($_POST['submit']))
    {
        //echo "Button CLicked";
        //Get all the values from form to update
        $driver_id = $_POST['driver_id'];
        $name = $_POST['name'];
        $vechile_no = $_POST['vechile_no'];
        $phone_no = $_POST['phone_no'];

        //Create a SQL Query to Update Admin
        $sql = "UPDATE delivery_drivers SET
        name = '$name',
        vechile_no = '$vechile_no'
        phone_no = '$phone_no'  
        WHERE driver_id='$driver_id'
        ";

        //Execute the Query
        $res = mysqli_query($conn, $sql);

        //Check whether the query executed successfully or not
        if($res==true)
        {
            //Query Executed and Admin Updated
            $_SESSION['update'] = "<div class='success'>Driver Updated Successfully.</div>";
            //Redirect to Manage Admin Page
            header('location:'.SITEURL.'admin/manage-driver.php');
        }
        else
        {
            //Failed to Update Admin
            $_SESSION['update'] = "<div class='error'>Failed to Delete Driver.</div>";
            //Redirect to Manage Admin Page
            header('location:'.SITEURL.'admin/manage-driver.php');
        }
    }

?>

