<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Driver</h1>

        <br><br>

        <?php 
            if(isset($_SESSION['add'])) //Checking whether the SEssion is Set of Not
            {
                echo $_SESSION['add']; //Display the SEssion Message if SEt
                unset($_SESSION['add']); //Remove Session Message
            }
        ?>

        <form action="" method="POST">

            <table class="tbl-30">
                <tr>
                    <td>Full Name: </td>
                    <td>
                        <input type="text" name="name" placeholder="Enter Your Name">
                    </td>
                </tr>

                <tr>
                    <td>Vehicle Number: </td>
                    <td>
                        <input type="text" name="vechile_no" placeholder="Vehicle number of the driver">
                    </td>
                </tr>

                <tr>
                    <td>Contact Number: </td>
                    <td>
                        <input type="tel" name="phone_no" placeholder="Contact Number of the driver">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Driver" class="btn-secondary">
                    </td>
                </tr>

            </table>

        </form>


    </div>
</div>
<?php 
    //Process the Value from Form and Save it in Database

    //Check whether the submit button is clicked or not

    if(isset($_POST['submit']))
    {
        // Button Clicked
        //echo "Button Clicked";

        //1. Get the Data from form
        $name = $_POST['name'];
        $vechile_no = $_POST['vechile_no'];
        $phone_no = $_POST['phone_no']; 

        //2. SQL Query to Save the data into database
        $sql = "INSERT INTO delivery_drivers SET 
            name='$name',
            vechile_no='$vechile_no',
            phone_no='$phone_no'
        ";
 
        //3. Executing Query and Saving Data into Datbase
        $res = mysqli_query($conn, $sql);

        //4. Check whether the (Query is Executed) data is inserted or not and display appropriate message
        if($res==TRUE)
        {
            //Data Inserted
            //echo "Data Inserted";
            //Create a Session Variable to Display Message
            $_SESSION['add'] = "<div class='success'>Driver Added Successfully.</div>";
            //Redirect Page to Manage Admin
            header("location:".SITEURL.'admin/manage-driver.php');
        }
        else
        {
            //FAiled to Insert DAta
            //echo "Faile to Insert Data";
            //Create a Session Variable to Display Message
            $_SESSION['add'] = "<div class='error'>Failed to Add Driver.</div>";
            //Redirect Page to Add Admin
            header("location:".SITEURL.'admin/add-driver.php');
        }

    }
    
?>