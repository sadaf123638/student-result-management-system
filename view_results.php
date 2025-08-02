<?php
// admin_dashboard.php
include 'connection.php';

$query = "SELECT * FROM student_result";
$result = mysqli_query($conn, $query);
?>


<?php
include 'header.php';
?>

<div class="container my-5">
    <h2 class="text-center mb-4">Student Results</h2>


    <?php while ($row = mysqli_fetch_assoc($result)):
        $english = (int) $row['english'];
        $hindi = (int) $row['hindi'];
        $math = (int) $row['math'];
        $total = $english + $hindi + $math;
        $percentage = round(($total / 300) * 100, 2);
        ?>

        <div class="row justify-content-center mb-4">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-body">
                        <div class="row">
                            <!-- Info -->
                            <div class="col-md-9">
                                <h5 class="card-title"><?= $row['name'] ?></h5>
                                <p class="mb-1"><strong>Email:</strong> <?= $row['email'] ?></p>
                                <p class="mb-1"><strong>Roll No:</strong> <?= $row['rollno'] ?></p>
                                <p class="mb-1"><strong>Mobile:</strong> <?= $row['mobile'] ?></p>
                                <p class="mb-1"><strong>Father's Name:</strong> <?= $row['father'] ?></p>
                                <p class="mb-1"><strong>Mother's Name:</strong> <?= $row['mother'] ?></p>
                                <p class="mb-1"><strong>Address:</strong> <?= $row['address'] ?>, <?= $row['city'] ?>
                                </p>
                                <p class="mb-1"><strong>Subjects:</strong> English (<?= $english ?>), Hindi (<?= $hindi ?>),
                                    Math (<?= $math ?>)</p>

                                <p class="mb-1"><strong>Total:</strong> <?= $total ?> / 300</p>
                                <p class="mb-1"><strong>Percentage:</strong> <?= $percentage ?>%</p>
                            </div>

                            <!-- Photo -->
                            <div class="col-md-3 d-flex align-items-center justify-content-center">
                                <img src="uploads/<?= $row['photo'] ?>" class="img-fluid rounded-circle"
                                    style="width: 100px; height: 100px;" alt="Student Photo">
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="text-right mt-3">
                            <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Are you sure?')"
                                class="btn btn-danger btn-sm">Delete</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    <?php endwhile; ?>
    <div class="text-center">
        <a href="admin_dashboard.php" class="btn btn-secondary mb-3">Back</a>
    </div>
</div>


<?php
include 'footer.php';
?>