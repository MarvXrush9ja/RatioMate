 <?php 
 session_start();
    if(isset($_SESSION["id"])){
        $display = "style='display:none;'";
    }else{
        $display = "";
    }


?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:100,300,400,600" rel="stylesheet" type="text/css">
        <link href="./fontawesome-5/css/all.css" rel="stylesheet">
        <link rel="stylesheet" href="bootstrap-4.3.1-dist/css/bootstrap.css">
        <link type="text/css" rel="stylesheet" href="style.css">
        <title>RatioMate</title>

        <!-- Styling for login section and overlay -->
        <style>
            .myoverlay{
                position:absolute;
                z-index: 100;
                background: rgba(0, 0, 0, 0.6);
                width: 100%;
                height: 100%;
            }
            @media (min-width: 900px){
                .myoverlay{
                    height: 150%;
                }
            }
            .formcontainer{
                margin-top: 20%;
                background:white;
                padding:10px;
                border-radius: 20px;
                color: black;
                background: linear-gradient(to bottom right, #6d5cfa, #74e5d1);
            }
        </style>
    </head>
    <body>
        <div class="myoverlay text-white" <?php echo $display; ?>>
            <div class="row">
                <div class="col-xl-4 offset-xl-4 col-md-6 offset-md-3 col-10 offset-1 ">
                   <?php
                        
                        if(isset($_GET["pg"])){
                            //if there is a get request called pg on the url do this
                            include "includes/signup.php";
                        }else{
                            //if there is no get request called pg on the url do this
                            include "includes/login.php";
                        }

                    ?> 
                </div>
            </div>
            
        </div>

        <div class="top">
            <div class="">
                <nav>
                    <div>
                        <h3 class="logo">RatioMate</h3>
                    </div>

                    <a href="includes/logout.php" class="btn reset">Logout</a>
                    <button class="btn reset" onclick="location.reload();">Reset</button>
                </nav>
            </div>

            <div class="budget">
                <div class="budget__title">
                    Available Budget in <span class="budget__title--month">%Month%</span>:
                </div>
                
                <div class="budget__value" data-toggle="tooltip" title="Available Budget">0</div>
                
                <div class="budget__income clearfix">
                    <div class="budget__income--text">Total Income</div>
                    <div class="right">
                        <div class="budget__income--value">+ 4,300.00</div>
                        <div class="budget__income--percentage">&nbsp;</div>
                    </div>
                </div>
                
                <div class="budget__expenses clearfix">
                    <div class="budget__expenses--text">Expenses Spent</div>
                    <div class="right clearfix">
                        <div class="budget__expenses--value">- 1,954.36</div>
                        <div class="budget__expenses--percentage">45%</div>
                    </div>
                </div>
            </div>
        </div>
        
        
        
        <div class="bottom">
            <div class="add">
                <div><span class="head">Input Your Budgets Here</span></div>
                <div class="add__container">

                    <!-- <select class="add__currency">
                        <option value="naira">#</option>
                        <option value="dollar">$</option>
                        <option value="pounds">@</option>
                        <option value="euros">%</option>
                    </select> -->

                    <select class="add__type">
                        <option value="inc" selected>Money Earned(+)</option>
                        <option value="exp">Money Spent(-)</option>
                    </select>

                    <input type="text" class="add__description" placeholder="Add description">
                    <input type="number" class="add__value" placeholder="Amount">
                    <button class="add__btn"><i class="fas fa-check-circle fa-1x"></i></button>
                </div>
            </div>
            
            <div class="container clearfix">
                <div class="income">
                    <h2 class="icome__title">Income</h2>
                    
                    <div class="income__list">
                       
                        <!--
                        <div class="item clearfix" id="income-0">
                            <div class="item__description">Salary</div>
                            <div class="right clearfix">
                                <div class="item__value">+ 2,100.00</div>
                                <div class="item__delete">
                                    <button class="item__delete--btn"><i class="ion-ios-close-outline"></i></button>
                                </div>
                            </div>
                        </div>
                        
                        <div class="item clearfix" id="income-1">
                            <div class="item__description">Sold car</div>
                            <div class="right clearfix">
                                <div class="item__value">+ 1,500.00</div>
                                <div class="item__delete">
                                    <button class="item__delete--btn"><i class="ion-ios-close-outline"></i></button>
                                </div>
                            </div>
                        </div>
                        -->
                        
                    </div>
                </div>
                
                
                
                <div class="expenses">
                    <h2 class="expenses__title">Expenses</h2>
                    
                    <div class="expenses__list"></div>

                </div>
            </div>
            
            
        </div>
        
        <script src="./bootstrap-4.3.1-dist/jquery-3.5.1.min.js"></script>
        <script src="./fontawesome-5/js/all.js"></script>
        <script src="./bootstrap-4.3.1-dist/js/bootstrap.js"></script>
        <script src="app.js"></script>
    </body>
</html>