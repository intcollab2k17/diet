<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0;background-color: #337ab7;">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Tip-Top Health Nutrition Center</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                    
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="settings.php" style="color: #000!important"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="logout.php" style="color: #000!important"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                       
                        <li>
                            <a href="index.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-book fa-fw"></i> Profiling <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="new.php"> New Taker </a>
                                </li>
                                <li>
                                    <a href="existing.php">Existing Taker</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-book fa-fw"></i> Transaction <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="transaction.php"> Stockout </a>
                                </li>
                                <li>
                                    <a href="stockin.php"> Stockin </a>
                                </li>
                                <li>
                                    <a href="stockout.php">Stockout List</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-wrench fa-fw"></i> Maintenance <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="programs.php">Wellness Programs</a>
                                </li>
                                <li>
                                    <a href="category.php">Category</a>
                                </li>
                                <li>
                                    <a href="meal.php">Meal</a>
                                </li>
                                <li>
                                    <a href="products.php">Products</a>
                                </li>
                                <li>
                                    <a href="supplements.php">Daily Supplements</a>
                                </li>
                                <li>
                                    <a href="questions.php">Survey Questions</a>
                                </li>
                            
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-sitemap fa-fw"></i> Reports<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="taker_list.php">Takers List</a>
                                </li>
                                <li>
                                    <a href="product_list.php">Product List</a>
                                </li>
                                <li>
                                    <a href="#">Program Reports <span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
<?php

        $query=mysqli_query($con,"select * from program order by program_name")or die(mysqli_error($con));
            $i=1;
              while ($row=mysqli_fetch_array($query)){
?>                                       
                                        <li>
                                            <a href="program_list.php?program_id=<?php echo $row['program_id'];?>"><?php echo $row['program_name'];?></a>
                                        </li>
<?php }?>                                       
                                    </ul>
                                    <!-- /.nav-third-level -->
                                </li>
                                <li>
                                    <a href="inventory.php">Inventory</a>
                                </li>
                                <li>
                                    <a href="per_age.php">Report By Age</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-files-o fa-fw"></i> Calendar<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="blank.html">Blank Page</a>
                                </li>
                                <li>
                                    <a href="login.html">Login Page</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>