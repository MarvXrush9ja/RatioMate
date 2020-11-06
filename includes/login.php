<?php include "db.php";  ?>

<?php

    if(isset($_POST["login"])){
        $username = $_POST["username"];
        $password = $_POST["password"];
        //check for empty fields
        if(empty($username)){
            //if username field is empty do this
            echo "<div class='alert alert-danger'>Username field is empty</div>";
        }else{
            //if username is not empty but passsword is empty do this
            if(empty($password)){
                echo "<div class='alert alert-danger'>Pasword field is empty</div>";
            }else{
                //if both username and passord are not empty do this.
                $checkdb = "SELECT * FROM users WHERE username = '$username' ";
                $checkdb_query = mysqli_query($con,$checkdb);
                $num_of_rows = mysqli_num_rows($checkdb_query);
                if($num_of_rows != 1){
                    echo "<div class='alert alert-danger'>Sorry, you are not registered with us.</div>";
                }else{
                    while($userow = mysqli_fetch_assoc($checkdb_query)){
                        $pwd = $userow["user_password"];
                        $user_id = $userow["user_id"];
                    }
                    $verify = password_verify($password,$pwd);
                    if($verify){
                        $_SESSION["id"] = $user_id;
                        if($_SESSION["id"]){
                            header("Location: main.php ");
                        }
                    }else{
                        echo "<div class='alert alert-danger'>Sorry, your password is incorrect.</div>";
                    }
                }
            }
        }
    }

?>


<div class="formcontainer text-center">
                        <h3 class="mt-3">Login</h3>
                        <h6 class="mb-1">Please Login to your Account.</h6>
                        <hr>
                        <form action="" method="POST">
                            <div class="row text-left">
                            <div class="form-group col-8 offset-2"><label for="">Your Username:</label><input type="text" name="username" class="form-control"></div>
                            <div class="form-group col-8 offset-2"><label for="">Your Password</label><input type="password" name="password" class="form-control"></div>
                            <div class="form-group col-8 offset-2 text-center"><input type="submit" name="login" value="Login" class="btn btn-primary"></div>
                            <div class="form-group col-8 offset-2 text-center"><p>Dont have an account? Click  <a href="main.php?pg">Here</a> to Signup.</p></div>
                            </div>
                        </form>
                    </div>