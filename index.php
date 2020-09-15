<!DOCTYPE html>
<html>
<!--header.php starts here-->
   <?php include ('header.php'); ?>              
			<!--header.php ends-->
			    <?php include ('menuitem.php'); ?>

			
			 <?php

                $stars="*";
                $i=1;

                do {

                    if($i % 2 == 0) 
					{
                       
					   $menuItems[] = new MenuItem("The WP Burger ".$stars.$i, "Freshly made all-beef patty served up with homefries", 14, "images/burger_small.jpg");
                    } 
					else 
					{
                        $menuItems[] = new MenuItem("WP Kebabs ".$stars.$i, "Tender cuts of beef and chicken, served with your choice of side", 17, "images/kebobs.jpg");
                    }
                    
                    $stars = $stars."*";
                    $i++;   

                } while($i<=6);

                //echo print_r($menuItems);

            ?>
            <div id="content" class="clearfix">
                <aside>
                        <h2><?php echo date('l')?>'s  Specials</h2>
                       <?php

                            $i = 0;

                            while ($i < 6){
								//echo "hiral ";
                               // echo '<hr>';
                                echo "<img src='" .$menuItems[$i]->get_image() . "' alt='" . $menuItems[$i]->get_ItemName() . "' title='" . $menuItems[$i]->get_ItemName() . "'>";
                                echo '<h3>' .$menuItems[$i]->get_ItemName() . '</h3>';
                                echo '<p>' .$menuItems[$i]->get_description() .'</p>';

                                $i++;

                            }

                        ?>

                </aside>
                <div class="main">
                    <h1>Welcome</h1>
                    <img src="images/dining_room.jpg" alt="Dining Room" title="The WP Eatery Dining Room" class="content_pic">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
                    <h2>Book your Christmas Party!</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
                </div><!-- End Main -->
            </div><!-- End Content -->
			<?php include('footer.php'); ?>		
           <!-- End Wrapper  this dv is included in footer.php-->
    
</html>
