<?php include "db.php"; ?>
<?php
//check if signupbutton is clicked
    if(isset($_POST["signup"])){
        $username = $_POST["username"];
        $p1 = $_POST["p1"];
        $p2 = $_POST["p2"];
        //check if p1 or p2 are the empty
        if(empty($p1) || empty($p2)){
            echo "<div class='alert alert-danger'>Sorry your password field is empty.</div>";
        }else{
            //check if p1 and p2 are the same
            if($p1 != $p2){
                echo "<div class='alert alert-danger'>Sorry your passwords do not match</div>";
            }else{
                //Everything is okay, it's time to submit to database.
                $username = mysqli_real_escape_string($con,$username);
                //Hashing password
                $password = password_hash($p1,PASSWORD_BCRYPT,array("cost"=>10));
                //submit to database
                $submitdata_query = "INSERT INTO users(username,user_password) VALUES('$username','$password') ";
                //run query
                $submitdata = mysqli_query($con,$submitdata_query);
                if($submitdata){
                    header("Location: main.php ");
                } 
            }
        }
    }


?>
<div class="formcontainer text-center">
                        <h3 class="mt-3">Sign up</h3>
                        <h6 class="mb-1">Please Sign up to get started with RatioMate.</h6>
                        <hr>
                        <form action="" method="POST" >
                            <div class="row text-left">
                            <div class="form-group col-8 offset-2"><label for="">Your Preffered Username:</label><input type="text" name="username" class="form-control"></div>
                            <div class="form-group col-8 offset-2"><label for="">Your Preffered Password</label><input type="password" name="p1" class="form-control"></div>
                            <div class="form-group col-8 offset-2"><label for="">Re-type Password</label><input type="password" name="p2" class="form-control"></div>
                            <div class="form-group col-8 offset-2 text-center"><input type="submit" value="Sign Up" name="signup" class="btn btn-primary"></div>
                            <div class="form-group col-8 offset-2 text-center"><p>Already have an account? Click  <a href="main.php">Here</a> to login.</p></div>
                            
                            </div>
                        </form>
                    </div>