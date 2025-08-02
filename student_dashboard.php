<?php
// session_start();
include 'connection.php';

if (!isset($_SESSION['student_email'])) {
    header("Location: index.php");
    exit();
}

$email = $_SESSION['student_email'];

$query = "SELECT * FROM student_result WHERE email = '$email'";
$result = mysqli_query($conn, $query);

if ($row = mysqli_fetch_assoc($result)) {
    $english = (int) $row['english'];
    $hindi = (int) $row['hindi'];
    $math = (int) $row['math'];

    $total = $english + $hindi + $math;
    $percentage = round(($total / 300) * 100, 2);
} else {
    echo "Student record not found!";
    exit();
}


?>


<?php
include 'header.php';
?>


<div class="container-background">
    <nav class="navbar navbar-light bg-light">
        <span class="navbar-brand mb-0 h1"><?= $row['name'] ?></span>
    </nav>
</div>


<div class="container mt-5">
    <h3 class="text-center">Result</h3>
    <div class="row">
        <div class="col-md-8">
            <p><strong>Name:</strong> <?= $row['name'] ?></p>
            <p><strong>Email:</strong> <?= $row['email'] ?></p>
            <p><strong>Roll No:</strong> <?= $row['rollno'] ?></p>
            <p><strong>Mobile:</strong> <?= $row['mobile'] ?></p>
            <p><strong>Father's Name:</strong> <?= $row['father'] ?></p>
            <p><strong>Mother's Name:</strong> <?= $row['mother'] ?></p>
            <p><strong>Address:</strong> <?= $row['address'] ?></p>
            <p><strong>City:</strong> <?= $row['city'] ?></p>
        </div>
        <div class="col-md-4 student-photo">
            <img src="uploads/<?= $row['photo'] ?>" alt="Student Photo" class="img-fluid rounded"
                style="max-width: 100px; height: auto;">
        </div>
    </div>

    <h4 class="mt-4">Result Details</h4>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Subject</th>
                    <th>Marks</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>English</td>
                    <td><?= $english ?></td>
                    <td>100</td>
                </tr>
                <tr>
                    <td>Hindi</td>
                    <td><?= $hindi ?></td>
                    <td>100</td>
                </tr>
                <tr>
                    <td>Math</td>
                    <td><?= $math ?></td>
                    <td>100</td>
                </tr>
                <tr>
                    <th>Total</th>
                    <th><?= $total ?></th>
                    <th>300</th>
                </tr>
                <tr>
                    <th colspan="2">Percentage</th>
                    <th><?= $percentage ?>%</th>
                </tr>
            </tbody>

        </table>
    </div>
</div>






<?php
include 'footer.php';
?>