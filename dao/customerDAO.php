<?php
require_once ('abstractDao.php');
require_once ('./model/customer.php');




 class customerDao extends abstractDao {
    
    function __construct() {
        try{
             parent::__construct() ;
        } catch (mysqli_sql_exception $e){
            throw $e;
        }        
    }
 
   public function getCustomers(){
    $result = $this->mysqli->query('SELECT * FROM mailinglist');
    $customers = array();
    
    if($result->num_rows >= 1){
        while( $row = $result->fetch_assoc()){
            $customer = new customer($row['customerName'],$row['phoneNumber'],$row['emailAddress'],$row['referrer']);
            $customers[] = $customer;
        }
        $result->free();
        return $customers;
    }
    
        $result->free();
        return false;    
   }
     
   public function addCustomer($customer){
    if(!$this->mysqli->connect_errno){
      $query = 'INSERT INTO mailinglist (customerName,phoneNumber,emailAddress,referrer) values (?,?,?,?)';
      $stmt = $this->mysqli->prepare($query);
      $name=$customer->getName();
      $phone=$customer->getPhone();
      $email=$customer->getEmail();
      $ref=$customer->getReferrer();
	  
	  echo $mysqli->error;
      $stmt->bind_param('ssss',$name,$phone,$email,$ref);
      $stmt->execute();
      if($stmt->error){
          return $stmt->error;
      }else {
        echo "<script type='text/javascript'>alert(\"Submit Successfully!\")</script>";
        header("location:Mailinglist.php");    
      }
    }else{
      return 'Could not connect to Database.';
    }
 }

   public function getID(){
      $result = $this->mysqli->query('SELECT * FROM mailinglist');
      $ID = array();
      
      if($result->num_rows >= 1){
        while( $row = $result->fetch_assoc()){
           $id=$row['_id'];
           $ID[]=$id;
        }           
        $result->free();
        return $ID;
    }
        $result->free();
        return false;
   }
  
 

public function deleteCustomer($customerId){
	if(!$this->mysqli->connect_errno){
		$query = 'DELETE FROM mailinglist WHERE _id = ?';
		
		
		$stmt = $this->mysqli->prepare($query);
		$stmt->bind_param('i', $customerId);
		$stmt->execute();
		if($stmt->error){
			return false;
		} else {
			return true;
		}
	} else {
		return false;
	}
}
/*
public function adddletedCustomer($customer){
    if(!$this->mysqli->connect_errno){
      $query = 'INSERT INTO mailinglist (customerName,phoneNumber,emailAddress,referrer) values (?,?,?,?)';
      $stmt = $this->mysqli->prepare($query);
      $name=$customer->getName();
      $phone=$customer->getPhone();
      $email=$customer->getEmail();
      $ref=$customer->getReferrer();
	  
	  echo $mysqli->error;
      $stmt->bind_param('ssss',$name,$phone,$email,$ref);
      $stmt->execute();
      if($stmt->error){
          return $stmt->error;
      }else {
        echo "<script type='text/javascript'>alert(\"Submit Successfully!\")</script>";
        header("location:Mailinglist.php");    
      }
    }else{
      return 'Could not connect to Database.';
    }
 }

public function getdeletedCustomerfordisplay($customerId){
	if(!$this->mysqli->connect_errno){
		$query = 'SELECT * FROM mailinglist WHERE phone = null';
		
		 if($result->num_rows >= 1){
        while( $row = $result->fetch_assoc()){
            $customer = new customer($row['customerName']);
            $customers[] = $customer;
        }
        $result->free();
        return $customers;
    }
    
        $result->free();
        return false;    
   }
		
		
		
		
}




public function getdeleteCustomer($customerId){
	if(!$this->mysqli->connect_errno){
		$query = 'SELECT * FROM mailinglist WHERE _id = ?';
		
		 if($result->num_rows >= 1){
        while( $row = $result->fetch_assoc()){
            $customer = new customer($row['customerName'],$row['phoneNumber'],$row['emailAddress'],$row['referrer']);
            $customers[] = $customer;
        }
        $result->free();
        return $customers;
    }
    
        $result->free();
        return false;    
}}
	*/	
		
		
		












 
 
 }