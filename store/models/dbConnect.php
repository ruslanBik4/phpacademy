<?php

/**
 * Created by PhpStorm.
 * User: rus
 * Date: 08.07.16
 * Time: 19:20
 */
class dbConnect
{
    private $parameters = array();
    private $connection = null;
    public $lastError;
    
    public function __construct(array $parameters)
    {
        foreach ($parameters as $key => $value) {
            $this->parameters[$key] = $value;
        }
        
        $this->connection = mysqli_connect( $parameters[0], $parameters[1], $parameters[2], $parameters[3] );
        
    }
    
    public function querySelect($sql) 
    {
        
    }
    
    public function queryInsert($sql)
    {
        
      return  mysqli_query( $this->connection, $sql);    
    }

    /**
     * @return mysqli|null
     */
    public function getError()
    { 
        return $this->lastError = mysqli_error( $this->connection );
    }
    
    public function __destruct()
    {
        // TODO: Implement __destruct() method.
        mysqli_close($this->connection);
    }

}