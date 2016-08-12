<?php
    
    
    /**
    * claasдочерних категорий (они входят в состав родительских, а сами будут содержать товары
    */
    class childCategory extends abstractCategory {
    
        private $parentID;
    	private $countProducts;
    	private $arrProducts = [];
    	
    	public function __construct($name, $parentID) {
        	
        	parent::__construct($name);
        	
        	$this->countProducts = 0;
        	$this->parentID = $parentID;
        	
    	}
    	
    	public function PrintCategory() {
        	echo '<br>' . $this->getName();
        	
        	foreach($this->arrProducts as $child) {
            	
            	$child->PrintProduct();
            	
        	}
    	}
    	
    	
    	public function AddProduct($product) {
        	
        	$this->arrChildCategory[] = $product;
        	
    	}
    
    
    }
    
