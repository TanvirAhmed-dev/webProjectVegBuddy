<?php include('database/db_connection.php') ?>
<header>
    <div class="menu-bar">
        <!-- <h1 class="logo">Veg<span>Buddy</span></h1> -->
        <h1 class="logo"><a href="home.php">Veg<span>Buddy</span></a></h1>
        <ul>
            <li><a href="home.php">Home</a></li>
            <li><a href="show_images.php">Detect</a></li>
            <li><a href="blog.php">Blog</a></li>
            
            

           <!-- <?php if(isset($_SESSION['user_id'])): ?> -->
            <li>
                <a href="#">
                    <?php
                    // echo $_SESSION['user_id'];
                   
                    echo $_SESSION['name'] ?>
                     <i class="fas fa-caret-down"></i>
                </a>

                <div class="dropdown-menu">
                    <ul>
                        
                        <li><a href="admin/posts/create.php">Dashboard</a></li>
                        <li><a href="logout.php">Logout</a></li>
                    </ul>
                </div>
            </li>
            <!-- <?php else: ?>
                <li><a href="#">Login</a></li>
                <li><a href="#">Sign Up</a></li>
            <?php endif; ?> -->
        </ul>
    </div>
 </header>