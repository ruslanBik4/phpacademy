<?php    
abstract class AbstractCategory {
        
        private $name;
        private $id;
        static protected $countID = 0;
        
        public function __construct($name) {
            
            $this->name = $name;
            $this->id = $this->newID();
            
        }
        
        abstract public function PrintCategory();        
        
        public function getName() {
         return $this->name;   
        }
        
        public function getId() {
         return $this->id;   
        }
        
        private function newID()
        {
           return ++self::$countID;
        }
    	

}