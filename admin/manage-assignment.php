<?php
// Query to fetch an available driver who is not assigned any order
$orderQuery = "SELECT * FROM tbl_order WHERE order_id = ?";
$stmt = mysqli_prepare($conn, $orderQuery);
if (!$stmt) {
    echo "Prepared statement error: " . mysqli_error($conn);
} else {
    mysqli_stmt_bind_param($stmt, "i", $order_id);
    mysqli_stmt_execute($stmt);
    $orderResult = mysqli_stmt_get_result($stmt);

    if (!$orderResult) {
        echo "Query execution error: " . mysqli_error($conn);
    } elseif (mysqli_num_rows($orderResult) > 0) {
        $orderData = mysqli_fetch_assoc($orderResult);

        // Display order details
        echo "Food: " . $orderData['food'] . "<br>";
        echo "Price: Rs." . $orderData['price'] . "<br>";
        echo "Total: Rs." . ($orderData['price'] * $orderData['qty']) . "<br>";
        // Display other order details...
    }
}
$driverQuery = "SELECT driver_id
FROM delivery_drivers
WHERE driver_id NOT IN (SELECT driver_id FROM assignment)
LIMIT 1";
$driverResult = mysqli_query($conn, $driverQuery);


if ($driverResult && mysqli_num_rows($driverResult) > 0) {
    $driverData = mysqli_fetch_assoc($driverResult);
    $assigned_driver_id = $driverData['driver_id'];

    // Insert assignment record into the assignment table
    $insertAssignmentQuery = "INSERT INTO assignment (order_id, driver_id) VALUES (?, ?)";
    $stmtAssignment = mysqli_prepare($conn, $insertAssignmentQuery);
    mysqli_stmt_bind_param($stmtAssignment, "ii", $order_id, $assigned_driver_id);
    $insertAssignmentResult = mysqli_stmt_execute($stmtAssignment);
    if ($insertAssignmentResult) {
        echo "Assigned Driver: " . $assigned_driver_id . "<br>";
        echo "Driver assigned successfully.";
    } else {
        echo "Error assigning driver.";
    }
} else {
    echo "No available driver.";
}
?>