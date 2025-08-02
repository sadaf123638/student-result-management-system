<?php
include 'connection.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $delete = "DELETE FROM student_result WHERE id = $id";
    if (mysqli_query($conn, $delete)) {
        echo "<script>alert('Record deleted successfully'); window.location='view_results.php';</script>";
    } else {
        echo "Error deleting record!";
    }
}
?>
