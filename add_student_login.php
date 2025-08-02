<?php
include 'connection.php';
$msg = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if student already exists
    $check = mysqli_query($conn, "SELECT * FROM students WHERE email='$email'");
    if (mysqli_num_rows($check) > 0) {
        $msg = "❌ Student already exists!";
    } else {
        // Insert new student
        $insert = "INSERT INTO students (email, password) VALUES ('$email', '$password')";
        if (mysqli_query($conn, $insert)) {
            $msg = "✅ Student added successfully.";
        } else {
            $msg = "❌ Failed to add student.";
        }
    }
}
?>


<?php
include 'header.php';
?>


    <div class="container mt-5">
    <h2>Add Student Login</h2>

    <?php if ($msg): ?>
        <div class="alert alert-info"><?= $msg ?></div>
    <?php endif; ?>

    <form method="POST">
        <div class="form-group">
            <label>Student Email</label>
            <input type="email" name="email" class="form-control" placeholder="Enter student email" required>
        </div>

        <div class="form-group">
            <label>Student Password</label>
            <input type="text" name="password" class="form-control" placeholder="Enter student password" required>
        </div>

        <button type="submit" class="btn btn-success">Add Student</button>
        <a href="admin_dashboard.php" class="btn btn-primary">Back to Dashboard</a>
    </form>
</div>


<?php
include 'footer.php';
?>