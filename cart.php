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
                        <li><a href="#">Shopping Cart</a></li>
                        <li><a href="customer/my_account.php">My Account</a></li>
                        <li><a href="#">Contact Us</a></li>
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

                <div class="col-md-10 content" style="background-color:white;">
                    <div id="shopping_cart">
                        <?php cart(); ?>
                        <span> Welcome Guest !</span>
                        <b>Shopping Cart </b>
                        Total Items: <?php total_items(); ?> Total Price: <?php total_price(); ?>
                        <a href="cart.php">Go to Cart</a>
                    </div>

                    <div id="products_box">
                       
                       <form action="cart.php" method="post" enctype="multipart/form-data">
                            <table class="carttable">
                                    <tr>
                                        <th>Remove</th>
                                        <th>Product(s)</th>
                                        <th>Quantity</th>
                                        <th>Product Price</th>
                                    </tr>

                                    <?php 
                                        $total = 0;
                                        global $con;
                                        $ip=getIp();
                                        $sel_price = "select * from cart where ip_add='$ip'";
                                        $run_price = mysqli_query($con, $sel_price); 
                                    
                                        while ($p_price=mysqli_fetch_array($run_price)){
                                            $pro_id = $p_price['p_id'];
                                            $pro_price = "select * from products where product_id=$pro_id";
                                            $run_pro_price = mysqli_query($con, $pro_price); 
                                    
                                            while($pp_price=mysqli_fetch_array($run_pro_price)){
                                                $product_price = array($pp_price['product_price']);
                                                $product_title = $pp_price['product_title'];
                                                $product_image = $pp_price['product_image'];
                                                $single_price = $pp_price['product_price'];
                                                $values = array_sum($product_price);
                                                $total += $values;
                                    ?>

                                    <tr align="center" >
                                        <td><input type="checkbox" name="remove[]" value="<?php echo $pro_id; ?>" /></td>
                                        <td><?php echo $product_title; ?>
                                        <img src="admin_area/product_images/<?php echo $product_image; ?>" width="60px" height="60px" />
                                        </td>
                                        <td><?php echo "Rs " .$single_price; ?></td>
                                    </tr>
                                    
                                    <?php } } ?>
                                    <tr align="right">
                                        <td colspan="4"><b> Subtotal  </b></td>
                                        <td><?php echo " Rs ".$total ?></td>
                                    </tr>

                                    <tr>
                                        <td><input type="submit" name="update_cart" value="Update Cart" /></td>
                                        <td><input type="submit" name="continue" value="Continue Shopping" /></td>
                                        <td><button><a href = "checkout.php"> Checkout </a></button></td>                                    
                                    </tr>
                            </table>
                       </form>

                       <?php 
                            
                            global $con;
                            $ip=getIp();
                            
                            if(isset($_POST['update_cart'])){

                                foreach($_POST['remove'] as $remove_id){
                                    $delete_product="delete from cart where p_id='$remove_id' AND ip_add='$ip'";
                                    $run_delete=mysqli_query($con, $delete_product);

                                    if($run_delete){
                                        echo "<script>window.open('cart.php','_self')</script>";
                                    }

                                }
                            }

                            if(isset($_POST['continue'])){
                                echo "<script>window.open('index.php','_self')</script>";
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
                        <a href="index.php"><li>Home</li></a>
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
