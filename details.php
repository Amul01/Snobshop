<!DOCTYPE>

<html>
    <head>
        <title>Homepage</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="styles/style.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		
		<?php include("functions/functions.php"); 
		
		?>
    </head>

    <body>
        <header>
        <!-- header -->
        <div class="headercontainer">
            <div class="row firstheader" id="home">
                <ul>
                    <li> <a href="#" data-toggle="modal" data-target="#myModal"><i class="fa fa-unlock-alt" aria-hidden="true"></i> Sign In </a></li>
                    <li> <a href="#" data-toggle="modal" data-target="#myModal2"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Sign Up </a></li>
                    <li><i class="fa fa-phone" aria-hidden="true"></i> Call : 9099617047</li>
                    <li><i class="fa fa-envelope-o" aria-hidden="true"></i> <a href="mailto:info@example.com">info@example.com</a></li>
                </ul>
            </div>
            <div class=" row header-bot">
                <div class="inside-header">
                    <div class="col-md-4 header-middle">
                        <form action="#" method="post">
                            <input type="search" name="search" placeholder="Search here..." required="">
                            <button type="submit" class="searchbutton"><i class="fa fa-search" aria-hidden="true"></i></button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                    <div class="col-md-4 logo">
                        <p>The Snobshop</p>
                    </div>
                    <div class="col-md-4">
                        
                    </div>
                </div>
            </div>
            <div class="row ">
                <nav class="navbar navbar-inverse navi">
                    <div class="container-fluid navcon">
                        <ul class="nav navbar-nav navibar">
                        <li class="active"><a href="index.php">Home</a></li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Women
                            <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                            <li><a href="#">Page 1-1</a></li>
                            <li><a href="#">Page 1-2</a></li>
                            <li><a href="#">Page 1-3</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Men</a></li>
                        <li><a href="#">Kids</a></li>
                        </ul>
                    </div>
                </nav>
            </div>

        </div>
        </header>

        <!-- Modal1 Sign in -->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h3 class="agileinfo_sign">Sign In <span>Now</span></h3>
                    </div>
                    <div class="modal-body">
                        
                        <form action="" method="post">
                            <div class="styled-input">
                                <label>Email</label></br>
                                <input type="email" name="emailaddress">
                            </div>
                            <div class="styled-input"> 
                                <label>Password</label></br>
                                <input type="password" name="pw">
                            </div> 
                        </br>
                            <input type="submit" value="Sign In">
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal2 -->
        <div class="modal fade" id="myModal2" role="dialog">
            <div class="modal-dialog">
            
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h3 class="agileinfo_sign">Sign Up <span>Now</span></h3>
                    </div>
                    <div class="modal-body">
                        
                        <form action="signup.php" method="post" enctype="multipart/form-data">
                            <div class="styled-input">
                                <label>Name</label></br>
                                <input type="text" name="c_name"></br>  
                            </div>
                            <div class="styled-input">
                                <label>Email</label></br>
                                <input type="text" name="c_email"></br>
                                </div>
                            <div class="styled-input"> 
                                <label>Password</label></br>
                                <input type="password" name="c_pass"></br>
                            </div>
                            <div class="styled-input"> 
                                <label>Contact Number</label></br>
                                <input type="text" name="c_no"></br>
                            </div> 
                        </br>
                            <input type="submit" value="Sign Up" name="register">
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <main>
            <div class="main-wrapper">
                <div class="col-md-2 sidebar">
                    <div id="sidebar_title">Categories</div>
                    <ul id="cats">
                        
						<?php getCats(); ?>																																			
                    </ul>
               
					<div id="sidebar_title">Brands</div>
                    <ul id="cats">
                        
						<?php getBrands(); ?>
                    </ul>
                </div>

                <div class="col-md-10 content">
                    <div id="shopping_cart">
                        <span> Welcome Guest !</span>
                        <b>Shopping Cart</b>
                        Total Items: Total Price:
                        <a href="cart.php">Go to Cart</a>

                    </div>
                    <div id="products_box">
                    <?php

                        if(isset($_GET['pro_id']))
                        {
                            $product_id=$_GET['pro_id'];

                        
	                    $get_pro="select * from products where product_id='$product_id'";
	                    $run_pro=mysqli_query($con, $get_pro);

	                    while($row_pro=mysqli_fetch_array($run_pro))
	                    {
                            $pro_id=$row_pro['product_id'];
                            $pro_title=$row_pro['product_title'];
                            $pro_price=$row_pro['product_price'];
                            $pro_image=$row_pro['product_image'];
                            $pro_desc=$row_pro['product_desc'];

                            echo "
                            <div id='single_product'>
                                <h3>$pro_title</h3>
                                <img src='admin_area/product_images/$pro_image' />
                                <p id='rs'> <i class='fa fa-inr' aria-hidden='true'></i> $pro_price </p> 
                                <p> $pro_desc </p>
                                <a href='index.php' id='details'>Go Back </a>
                                <a href='index.php?pro_id=$pro_id'><button >Add to Cart</button></a>
                            </div> ";
                        }
                        }
                    ?>

                    </div>

                </div>
            </div>
        </main>

        <footer>
            <div class="foocon">
                <div class="row">
                    <div class="col-md-4">
                        <p id="footitle">About Snobbox</p>
                        <p id="footinfo1"> THE SNOBBOX is an international B2C fast fashion e-commerce platform. 
                        The company mainly focuses on women's wear, but it also offers men's apparel, 
                        children's clothes, accessories, shoes, bags and other fashion items.  
                        The brand was founded in December 9.
                    </div>
                    <div class="col-md-4">
                        <p id="footitle">Our Information</p>
                        <ul type="none" id="footinfo1">
                        <a href="index.html"><li>Home</li></a>
                        <a href="#"><li>Men's wear</li></a>
                        <a href="#"><li>Women's wear</li></a>
                    </div>
                    <div class="col-md-4">
                        <p id="footitle">Store Information</p>
                        <ul type="none" id="footinfo2">
                        <li><i class="fa fa-phone"> Phone Number</i></li>
                        9099617047
                        <br></br>
                        <li><i class="fa fa-envelope"> Email-address</i></li>
                        gandhiaayushi28@gmail.com
                        <br></br>
                        <li><i class="fa fa-map-marker"> Location</i></li>
                        Surat
                        <br></br>
                    </div>
                    
                </div>
                <div class="row">
                    <div class="col-md-6">
                    <p>
                    <center><h3>SIGN UP FOR NEWSLETTER !</h3></center>
                    </p>
                    </div>
                    <div class="col-md-6 emailbox"  >
                    <form action="#" method="post">
                    <input type="email" name="email" placeholder="Enter your email here..."/>
                    <input type="submit" name="submit"/>
                    </form>
                    </div>
                </div>
            </div>
        </footer>
    </body>
</html>
