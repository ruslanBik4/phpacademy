<?php
    
    
    /**
    * 
    */
    class parentCategory extends abstractCategory {
    
    	private $countChildCategory;
    	private $arrChildCategory = [];
    	
    	public function __construct($name) {
        	
        	parent::__construct($name);
        	
        	$this->countChildCategory = 0;
        	
    	}
    	
    	public function PrintCategory() {
        	echo '<br>' . $this->getName() . '<ul>';
        	
        	foreach($this->arrChildCategory as $child) {
            	
            	'<li>' . $child->PrintCategory() .'</li>';
            	
        	}
        	echo '</ul>';
    	}
    	
    	
    	public function AddChild($name) {
        	
        	$this->arrChildCategory[] = new childCategory($name, $this->id);
        	$this->countChildCategory++;
        	
    	}
    	
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    