<?php
include 'connection.php';
?>

<?php
include 'header.php';
?>

<div class="container-background">
    <nav class="navbar navbar-light bg-light">
        <span class="navbar-brand mb-0 h1">Admin Dashboard</span>
    </nav>
</div>

<div class="container mt-5">
    <div class="row">
        <div class="col-12 admin">
            <h2 class="text-center mb-4">Welcome Admin</h2>
            <div class="row">
                <!-- Add Student Result -->
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">➕ Add Student Result</h5>
                            <a href="add_result.php" class="btn btn-success">Add Result</a>
                        </div>
                    </div>
                </div>
                <!-- View All Results -->
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">📋 View All Results</h5>
                            <a href="view_results.php" class="btn btn-primary">View Results</a>
                        </div>
                    </div>
                </div>
                <!-- Add Student Login -->
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">➕ Add Student Login</h5>
                            <a href="add_student_login.php" class="btn btn-warning">Add Login</a>
                        </div>
                    </div>
                </div>
                <!-- View Student Logins -->
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">👥 View Student Logins</h5>
                            <a href="view_students.php" class="btn btn-info">View Logins</a>
                        </div>
                    </div>
                </div>
                <!-- Logout -->
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">🚪 Logout</h5>
                            <a href="index.php" class="btn btn-danger">Logout</a>
                        </div>
                    </div>
                </div>
            </div> <!-- End .row for cards -->
        </div>
    </div>
</div>





<?php
include 'footer.php'
    ?>