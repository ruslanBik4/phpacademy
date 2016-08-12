<?php
    
        /**
    * 
    */
class foodProduct extends AbstractProducts {
    
    public function AddToCart()
    {
        echo 'do AddToCart()';
    }
    
    public function PrintProduct( $params )
    {
        echo $this->getName() . ', price = ' . $this->getPrice();
        
    }
	

    
}
    