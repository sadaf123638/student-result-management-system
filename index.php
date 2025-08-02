<?php
include 'connection.php';

?>

<?php

include 'header.php';

?>



    <div class="container mt-5">
        <div class="row">
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col"></div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col">
                <div class="login-page">
                    <h2 class="mb-4">Student Result Management System</h2>
                    <form method="post" action="login.php">
                        <div class="form-group">
                            <label >Email</label>
                            <input type="text" name="email" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" placeholder="Enter Email" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label >Password</label>
                            <input type="password" name="password" class="form-control" id="exampleInputPassword1"
                                placeholder="Enter Password"  autocomplete="off">
                        </div>
                        <button type="submit" class="btn btn-warning" name="login">Sign In</button>
                    </form>

                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col"></div>

        </div>
    </div>


   <?php
   include 'footer.php';
   ?>