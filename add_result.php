<?php
include 'connection.php';

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $name = $_POST['name'];
    $rollno = $_POST['rollno'];
    $mobile = $_POST['mobile'];
    $father = $_POST['father'];
    $mother = $_POST['mother'];
    $address = $_POST['address'];
    $city = $_POST['city'];

    // Direct marks input
    $english = (int)$_POST['english'];
    $hindi = (int)$_POST['hindi'];
    $math = (int)$_POST['math'];

    $percentage = ($english + $hindi + $math) / 3;

    // Image Upload
    $photo = $_FILES['photo']['name'];
    $tmp_name = $_FILES['photo']['tmp_name'];
    move_uploaded_file($tmp_name, "uploads/" . $photo);

    // Check if email exists in students_login
    $check_email = mysqli_query($conn, "SELECT * FROM students WHERE email='$email'");
    if (mysqli_num_rows($check_email) > 0) {
        $insert = "INSERT INTO student_result(email, name, rollno, mobile, father, mother, photo, address, city, english, hindi, math, percentage) 
        VALUES('$email', '$name', '$rollno', '$mobile', '$father', '$mother', '$photo', '$address', '$city', '$english', '$hindi', '$math', '$percentage')";

        mysqli_query($conn, $insert);
        echo "<script>alert('Student Result Added Successfully');</script>";
    } else {
        echo "<script>alert('Email not registered in login database');</script>";
    }
}
?>

<?php
include 'header.php';

?>

<div class="container mt-5">
    <h2 class="text-center mb-4">Add Student Result</h2>

    <form method="POST" action="add_result.php" enctype="multipart/form-data">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label>Email <span class="text-danger">*</span></label>
                <input type="email" name="email" class="form-control" placeholder="Student Email" required
                    autocomplete="off">
            </div>
            <div class="form-group col-md-6">
                <label>Name <span class="text-danger">*</span></label>
                <input type="text" name="name" class="form-control" placeholder="Student Name" required
                    autocomplete="off">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-4">
                <label>Roll Number</label>
                <input type="text" name="rollno" class="form-control" placeholder="Roll No" required autocomplete="off">
            </div>
            <div class="form-group col-md-4">
                <label>Mobile Number</label>
                <input type="text" name="mobile" class="form-control" placeholder="Mobile No" required
                    autocomplete="off">
            </div>
            <div class="form-group col-md-4">
                <label>Student Photo</label>
                <input type="file" name="photo" class="form-control" required autocomplete="off">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label>Father's Name</label>
                <input type="text" name="father" class="form-control" placeholder="Father Name" required
                    autocomplete="off">
            </div>
            <div class="form-group col-md-6">
                <label>Mother's Name</label>
                <input type="text" name="mother" class="form-control" placeholder="Mother Name" required
                    autocomplete="off">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label>Address</label>
                <input type="text" name="address" class="form-control" placeholder="Student Address" required
                    autocomplete="off">
            </div>
            <div class="form-group col-md-6">
                <label>City</label>
                <input type="text" name="city" class="form-control" placeholder="City" required autocomplete="off">
            </div>
        </div>

        <h4 class="mt-4">Subjects & Marks</h4>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label>English Marks</label>
                <input type="number" name="english" class="form-control" placeholder="English Marks" required>
            </div>
            <div class="form-group col-md-4">
                <label>Hindi Marks</label>
                <input type="number" name="hindi" class="form-control" placeholder="Hindi Marks" required>
            </div>
            <div class="form-group col-md-4">
                <label>Math Marks</label>
                <input type="number" name="math" class="form-control" placeholder="Math Marks" required>
            </div>
        </div>


        <button type="submit" name="submit" class="btn btn-success btn-block mt-3">Add Result</button>
        <div class="text-center mt-3">
            <a href="admin_dashboard.php" class="btn btn-secondary btn-block mt-3 mb-3">Back</a>
        </div>
    </form>
</div>






<?php
include 'footer.php';

?>