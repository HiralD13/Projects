<?php include("header.php");
require_once('./dao/customerDAO.php');
?>
<?php

   try{
     $customerDAO = new customerDao;
     $h_error = false;
     $errormessage = Array();
    
      if(isset($_POST['customerName'])||
         isset($_POST['phoneNumber'])||
         isset($_POST['emailAddress'])||
         isset($_POST['referral'])){
        
        if($_POST['customerName']==""){
            $h_error = true;
            $errormessage['customerName'] = "you have to enter name";
        }
        
        if (empty($_POST["phoneNumber"])){
            $h_error = true;
            $errormessage['phoneNumber'] = "you have to enter a phone number";
        }
      
        if (empty ( $_POST ['emailAddress'] ) ){
            $h_error = true;
            $errormessage['emailAddress'] = "you have to enter an email address";
        }
       
        
      

        if (empty($_POST["referral"])) {
            $h_error = true;
            $errormessage['referral'] = "Referral is required";
        }
        

               
        if(!$h_error){
            $email = $_POST['emailAddress'];
            $customer = new customer($_POST['customerName'],$_POST['phoneNumber'],$email,$_POST['referral']);
            $addSuccess = $customerDAO->addCustomer($customer);
            echo '<h3>'. $addSuccess .'</h3>';
            

        }
    }
    
    
?>

            <div id="content" class="clearfix">
                <aside>
							

							<h2>Mailing Address</h2>
									<h3>1385 Woodroffe Ave<br>
										Ottawa, ON K4C1A4</h3>
									<h2>Phone Number</h2>
									<h3>(613)727-4723</h3>
									<h2>Fax Number</h2>
									<h3>(613)555-1212</h3>
									<h2>Email Address</h2>
									<h3>info@wpeatery.com</h3>


									</aside>
               <div class="main">
                    <h1>Sign up for our newsletter</h1>
                    <p>Please fill out the following form to be kept up to date with news, specials, and promotions from the WP eatery!</p>
                    <form name="frmNewsletter" id="frmNewsletter" method="post" action="contact.php">
                        <table>
                            <tr>
                                <td>Name:</td>
                                <td><input type="text" name="customerName" id="customerName" size='40'>
                                <?php 
                                if(isset($errormessage['customerName'])){
                                    echo '<span style=\'color:red\'>'.$errormessage['customerName'].'</span>';
                                }
                                ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Phone Number:</td>
                                <td><input type="text" name="phoneNumber" id="phoneNumber" size='40' ){
                                 
                                }
                                ?>
                                <?php 
                                if(isset($errormessage['phoneNumber'])){
                                    echo '<span style=\'color:red\'>'.$errormessage['phoneNumber'].'</span>';
                                }
                                ?></td>
                            </tr>
                            <tr>
                                <td>Email Address:</td>
                                <td><input type="text" name="emailAddress" id="emailAddress" size='40'><?php 
                                if(isset($errormessage['emailAddress'])){
                                    echo '<span style=\'color:red\'>'.$errormessage['emailAddress'].'</span>';
                                }
                                ?></td>
                            </tr>
                            <tr>
                                <td>How did you hear<br> about us?</td>
                                <td>Newspaper<input type="radio" name="referral" id="referralNewspaper" value="newspaper">
                                    Radio<input type="radio" name='referral' id='referralRadio' value='radio'>
                                    TV<input type='radio' name='referral' id='referralTV' value='TV'>
                                    Other<input type='radio' name='referral' id='referralOther' value='other'>
                                    <?php 
                                if(isset($errormessage['referral'])){
                        echo '<span style=\'color:red\'>' . $errormessage['referral'] . '</span>';
                      }
            ?></td>
                            </tr>                            
                            
                            <tr>
                                <td colspan='2'><input type='submit' name='btnSubmit' id='btnSubmit' value='Sign up!'>&nbsp;&nbsp;<input type='reset' name="btnReset" id="btnReset" value="Reset Form">
                                                             
                            </tr>
                        </table>
                    </form>
                </div><!-- End Main -->
            </div><!-- End Content -->
<?php
      
     
     
          
  
    }catch(Exception $e){
            echo '<h3>Error on page.</h3>';
            echo '<p>' . $e->getMessage() . '</p>';            
        }
   
            ?>
           <?php include './footer.php' ?>
 