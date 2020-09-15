<?php 
class MenuItem 
	{
		private  $ItemName;
		private $description;
		private  $price;
		private $image;
	
	
		public function __construct($ItemName, $description, $price, $image)
		{
		$this->ItemName =$ItemName;
		$this->description = $description;
		$this-> price = $price;
		$this-> image = $image;
		}



		public function set_itemName($ItemName)
		{
		$this->ItemName = $ItemName;
		}
  
		public function set_description($description)
		{
		$this->description = $description;
		}
  
		public function set_price($price)
		{
		$this-> price = $price;
		}
		public  function set_image($image)
		{
		$this->image = $image;
		}
  
		public function get_ItemName()
		{
		return $this-> ItemName;
		}

		public  function get_description()
		{
		return $this-> description;
		}
	
		public function get_price()
		{
		return $this-> price;
		}
	
		public function get_image()
		{
		return $this-> image;
		}
	}

?>



 