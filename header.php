<?php include 'checkIfLogin.php'; ?>
<!-- *** TOPBAR ***
 _________________________________________________________ -->
   
	<div id="top">
        <div class="container">
            <div class="col-md-5 offer" data-animate="fadeInDown">
                <span  class="lookLikeButton" data-animate-hover="shake"> Offer of the day </span><span>Get flat 35% off on orders over $50!</span>
            </div>
            <div class="col-md-7" data-animate="fadeInDown">
                <ul class="menu">
                    <li class="<?php echo checkIfLoginThenHide();?>"><a href="#" data-toggle="modal" data-target="#login-modal"><i class="fa fa-user" aria-hidden="true"></i>Login</a> <!--class="hidden"-->
                    </li>
                    <li class="<?php echo checkIfLoginThenHide();?>"><a href="register.php"><i class="fa fa-sign-in" aria-hidden="true"></i>Register</a>
                    </li>
                    <li><a href="contact.php"><i class="fa fa-phone" aria-hidden="true"></i>Contact</a>
                    </li>
                    <li class="<?php echo checkIfNotLoginThenHide();?>"><a href="settings.php"><i class="fa fa-cog" aria-hidden="true"></i>Settings</a>
					</li>
					<li class="<?php echo checkIfNotLoginThenHide();?>"><a href="purchaseHistory.php"><i class="fa fa-archive" aria-hidden="true"></i>Purchase History</a>
					</li>
					<li class="<?php echo checkIfNotLoginThenHide();?>"><a href="logout.php"><i class="fa fa-lock" aria-hidden="true"></i>Log Out</a>
					</li>						
                </ul>
            </div>
        </div>
        <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">
            <div class="modal-dialog modal-sm">

                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="Login">Customer login</h4>
                    </div>
                    <div class="modal-body">
                        <form action="login.php" method="post">
                            <div class="form-group">
                                <input type="text" class="form-control" id="email-modal" placeholder="email" name="email">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" id="password-modal" placeholder="password" name="password">
                            </div>
							
							<div>
							<p class="text-right"><a href ="forgot.php">Forgot Password?</a></p>
							</div>
							
							<div>
                            <p class="text-center">
                                <button class="btn btn-primary" name="login"><i class="fa fa-sign-in"></i> Log in</button>
                            </p>
							</div>

                        </form>

                        <p class="text-center text-muted">Not registered yet?</p>
                        <p class="text-center text-muted"><a href="register.php"><strong>Register now</strong></a>! It is easy and done in 1&nbsp;minute and gives you access to special discounts and much more!</p>

                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- *** TOP BAR END *** -->
	
<!--Header Part2-->

    <!-- *** NAVBAR ***
 _________________________________________________________ -->

    <div class="navbar navbar-default yamm" role="navigation" id="navbar">
        <div class="container">
            <div class="navbar-header">

                <a class="navbar-brand home" href="index.php" data-animate-hover="bounce">
                    <img src="img/logo.png" alt="shop cart logo" class="hidden-xs img-responsive">
                </a>
                <div class="navbar-buttons">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
                        <span class="sr-only">Toggle navigation</span>
                        <i class="fa fa-align-justify"></i>
                    </button>
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#search">
                        <span class="sr-only">Toggle search</span>
                        <i class="fa fa-search"></i>
                    </button>
                    <a class="btn btn-default navbar-toggle" href="cart.php">
                        <i class="fa fa-shopping-cart"></i>  <span class="hidden-xs">3 items in cart</span>
                    </a>
                </div>
            </div>
            <!--/.navbar-header -->

            <div class="navbar-collapse collapse" id="navigation">

                <ul class="nav navbar-nav navbar-left">
                    <li ><a href="index.php">Home</a> <!--class="active"-->
                    </li>
				</ul>
				<ul class="nav navbar-nav navbar-left">
                    <li class="<?php echo checkIfNotSellerThenHide();?>"><a href="sellerAddProduct.php">Add Product</a> <!--class="active"-->
                    </li>
                    <li class="<?php echo checkIfNotSellerThenHide();?>"><a href="productList.php?user=seller">My Products</a> <!--class="active"-->
                    </li>
				</ul>

                    
                    

            </div>
            <!--/.nav-collapse -->

            <div class="navbar-buttons">

                <div class="navbar-collapse collapse right" id="basket-overview">
                    <a href="cart.php" class="btn btn-primary navbar-btn"><i class="fa fa-shopping-cart"></i><span class="hidden-sm">3 items in cart</span></a>
					<a href="cart.php" class="btn btn-primary navbar-btn"><i class="fa fa-shopping-cart"></i><span class="hidden-sm">Login to add to cart</span></a>
                </div>
                <!--/.nav-collapse -->

                <div class="navbar-collapse collapse right" id="search-not-mobile">
                    <button type="button" class="btn navbar-btn btn-primary" data-toggle="collapse" data-target="#search">
                        <span class="sr-only">Toggle search</span>
                        <i class="fa fa-search"></i>
                    </button>
                </div>

            </div>

            <div class="collapse clearfix" id="search">

                <form action="productList.php" method="post" class="navbar-form" role="search" >
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="Search"/>
                        <span class="input-group-btn">

			<button type="submit" name="search_button" class="btn btn-primary"><i class="fa fa-search"></i></button>

		    </span>
                    </div>
                </form>

            </div>
            <!--/.nav-collapse -->

        </div>
        <!-- /.container -->
    </div>
    <!-- /#navbar -->

    <!-- *** NAVBAR END *** -->


<!--Header Part2 END-->