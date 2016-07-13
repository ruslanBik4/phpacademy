<?php

/**
 * Created by PhpStorm.
 * User: rus
 * Date: 08.07.16
 * Time: 19:20
 */
class dbConnect
{
    var $parameters = array();
    private $connection = null;
    public $lastError;
    
    public function __construct(array $params)
    {
        foreach ($params as $key => $value) {
            $this->parameters[$key] = $value;
        }
    }

    public function openConnetcion()
    {
        $this->connection = mysqli_connect(
            $this->parameters['userName'],
            $this->parameters[1],
            $this->parameters[2],
            $this->parameters[3]
        );
        
    }

    /**
     * @param array $fields ($key - name fields, $value - alias
     * @param $table
     * @param $where
     * @return bool|mysqli_result
     */
    public function querySelect(array $fields, $table, $where)
    {
        $sql = 'select ';
        $comma = '';

        foreach($fields as $key => $value) {
            $sql .= "$comma $key as '$value'";
            $comma = ",";
        }
        $sql .= " from $table ". ($where ? " where$where" : '');

        return  mysqli_query( $this->connection, $sql);
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
        echo '<br> Class destruct!';
    }

}