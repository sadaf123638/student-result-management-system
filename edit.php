<?php
include 'connection.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM student_result WHERE id = $id";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
}

if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $father = $_POST['father'];
    $mother = $_POST['mother'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $english = $_POST['english'];
    $hindi = $_POST['hindi'];
    $math = $_POST['math'];

    $update = "UPDATE student_result SET 
        name='$name',
        email='$email',
        mobile='$mobile',
        father='$father',
        mother='$mother',
        address='$address',
        city='$city',
        english='$english',
        hindi='$hindi',
        math='$math'
        WHERE id = $id";

    if (mysqli_query($conn, $update)) {
        echo "<script>alert('Record updated successfully'); window.location='view_results.php';</script>";
    } else {
        echo "Error updating record!";
    }
}
?>




<?php
include 'header.php';
?>

<div class="container mt-5">
    <h3>Edit Student Record</h3>
    <form method="POST">
        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" value="<?= $row['name'] ?>" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" value="<?= $row['email'] ?>" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Mobile</label>
            <input type="text" name="mobile" value="<?= $row['mobile'] ?>" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Father Name</label>
            <input type="text" name="father" value="<?= $row['father'] ?>" class="form-control">
        </div>
        <div class="form-group">
            <label>Mother Name</label>
            <input type="text" name="mother" value="<?= $row['mother'] ?>" class="form-control">
        </div>
        <div class="form-group">
            <label>Address</label>
            <input type="text" name="address" value="<?= $row['address'] ?>" class="form-control">
        </div>
        <div class="form-group">
            <label>City</label>
            <input type="text" name="city" value="<?= $row['city'] ?>" class="form-control">
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label>English </label>
                <input type="number" name="english" value="<?= $row['english'] ?>" class="form-control">
            </div>
            <div class="form-group col-md-4">
                <label>Hindi </label>
                <input type="number" name="hindi" value="<?= $row['hindi'] ?>" class="form-control">
            </div>
            <div class="form-group col-md-4">
                <label>Math </label>
                <input type="number" name="math" value="<?= $row['math'] ?>" class="form-control">
            </div>
        </div>
        <button type="submit" name="update" class="btn btn-success">Update</button>
        <a href="view_results.php" class="btn btn-secondary">Back</a>
    </form>
</div>



<?php
include 'footer.php';
?>