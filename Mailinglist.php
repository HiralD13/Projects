<?php
include ('./header.php');
require_once('./dao/customerDAO.php');


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
 
 
 
 <?php
$customerDAO = new customerDao;
if(isset($_GET['action']) && $_GET['action']=="delete") {
	$customerID = $_GET['customerID'];
	/*$delcustomer = $customerDAO->getdeletecustomer($customerID);
	 
	if($customer)
	{
		$name=$delcustomer->getName().':'.$delcustomer->getPhone().':'.$delcustomer->getEmail().':'.
	$delcustomer->getReferrer();
    $customer = new customer($name,null,null,null);
    $addSuccess = $customerDAO->addCustomer($customer);
            echo '<h3>'. $addSuccess .'</h3>';
            
	}*/
	
	
	
	$result = $customerDAO->deleteCustomer($customerID);
	if($result){
		echo '<h3>Customer Deleted</h3>';
	} else {
		echo '<h3>Failed to delete the Customer</h3>';
	}
}

$customers=$customerDAO->getCustomers();
?>
<div class="main">
                    <h1>Sign up for our newsletter</h1>
                    <p>Please fill out the following form to be kept up to date with news, specials, and promotions from the WP eatery!</p>
                    <form name="frmNews" id="frmNews" method="post" action="Mailinglist.php">
                        <table>
    <?php               
if ($customers){
$ID = array();
$ID = $customerDAO->getID();

  
    echo '<table width="100%" height="100%" border="0">';
             
 echo '<tr><th>Name:</th> <th>Phone Number:</th> 
 <th>EmailAddress:</th> <th>how did you hear about us?</th>
 <th> delete?</th></tr>';  
               $i=0;
                foreach($customers as $customer){
					 
                    echo '<tr>';
					
                    echo '<td>' . $customer->getName() . '</td>';
                    echo '<td>' . $customer->getPhone() . '</td>';
                    echo '<td>' . $customer->getEmail() . '</td>';
                    echo '<td>' . $customer->getReferrer() . '</td>';
echo '<td>
<a
	onclick="return confirm(\'Are you sure you want to delete '.$customer->getName().'?\');"
	href="Mailinglist.php?customerID='.$ID[$i].'&action=delete">
	Delete
</a>
</td>'; $i++;
                   echo '</tr>';
                   
                }
                echo '</table>';

}else{
    echo '<h3>'.'No mailing exist now'.'</h3>';

}


?></div></div>
<div>
<?php include './footer.php' ?></div>