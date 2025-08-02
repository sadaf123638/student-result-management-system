<?php
include 'connection.php';
$msg = "";

// Delete student
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM students WHERE id=$id");
    header("Location: student_logins.php");
    exit();
}

// Update student
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    mysqli_query($conn, "UPDATE students SET email='$email', password='$password' WHERE id=$id");
    $msg = "✅ Student login updated.";
}
?>

<?php
include 'header.php';
?>

    <div class="container mt-5">
        <h2 class="mb-4">All Student Logins</h2>

        <?php if ($msg): ?>
            <div class="alert alert-info"><?= $msg ?></div>
        <?php endif; ?>

        <table class="table table-bordered table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th width="180">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $res = mysqli_query($conn, "SELECT * FROM students");
                while ($row = mysqli_fetch_assoc($res)) {
                    ?>
                    <tr>
                        <form method="POST">
                            <td><?= $row['id'] ?></td>
                            <td>
                                <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                <input type="email" name="email" class="form-control" value="<?= $row['email'] ?>" required>
                            </td>
                            <td>
                                <input type="text" name="password" class="form-control" value="<?= $row['password'] ?>"
                                    required>
                            </td>
                            <td>
                                <button type="submit" name="update" class="btn btn-sm btn-primary">Update</button>
                                <a href="?delete=<?= $row['id'] ?>" class="btn btn-sm btn-danger"
                                    onclick="return confirm('Delete this student?')">Delete</a>
                            </td>
                        </form>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
         <a href="admin_dashboard.php" class="btn btn-primary">Back to Dashboard</a>
    </div>

  <?php
  include 'footer.php';
  ?>