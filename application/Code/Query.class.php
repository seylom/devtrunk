<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/* * *************************************************************
 * Description of QueryBuilder
 *
 * @author SeylomA
 * @copyright 2011 Devtrunk.com
 * @license free
 * @version 1.0
 * @since File available since 2011 V1.0
 * @link http://devtrunk.com
 * ************************************************************* */

require_once 'IQuery.interface.php';

class Query implements IQuery {
    //put your code here
      
    
    public function __construct()
    {
        
    }
    
    private $_query = '';
    
    public function select()
    {
        $this->_query.='SELECT * ';
        return $this;
    }
    
    public function selectColumn($columnNames)
    {
        if ($columnNames == null)
            return $this;
        
        $cols = '';
        
        if (is_array($columnNames) && count($columnNames) > 0)
        {
            $cols = implode(',',$columnNames);
        }
        else
        {
            $cols = $columnNames;
        }
        
        $this->_query.='SELECT '.$cols.' ';
        return $this;
    }
      
    public function from($table)
    {
        $this->_query.='FROM \''.$table.'\' ';
        return $this;
    }

    public function SelectMax() {
         $this->_query.= 'SELECT COUNT(*) ';
        return $this;
    }

    public function SelectMin() {
         $this->_query.= 'SELECT COUNT(*) ';
        return $this;
    }

    public function join($query) {
         $this->_query.= 'JOIN ';
        return $this;
    }

    public function orderBy($colname, $sortDirection = 'ASC') {
        
        if ($sortDirection == null)
            $sortDirection = 'ASC';
        
         $this->_query.= 'ORDER BY '.$colname.' '.$sortDirection.' ';
         return $this;
    }

    public function selectColumns($columns) {
        
        if (is_array($columns) && count($columns) > 0)
        {
            $cols = implode(',',$columns);
        }
        else
        {
            $cols = $columns;
        }
        
        $this->_query.='SELECT '.$cols.' ';
        return $this;
    }

    public function selectCount() {
        $this->_query.= 'SELECT COUNT(*) ';
        return $this;
    }

    public function selectTop($max) {
         $this->_query.= 'SELECT TOP '.$max.' ';
        return $this;
    }

    public function whereIn($column, $valuesArray) {
        $this->_query.= 'WHERE '.$column.' IN ('.implode(',',$valuesArray).') ';
        return $this;
    }
    
    public function where($name,$value)
    {
        $this->_query.= "WHERE ".$name."='".$value."'";
        return $this;
    }

    public function whereMultiCondition($conditioValuesArr, $oper = 'AND') 
    {
        if (is_array($conditioValuesArr))
        {
            $resultArr = array();
            
            $idx = 0;
            foreach($conditioValuesArr as $key=>$value)
            {
                $resultArr[idx] = $key.'=\''.$val.'\'';
                $idx+=1;
            }
            
            if ($oper == null)
                $oper == 'AND';
            
            $this->_query.= implode(' '.$oper.' ',$resultArr);
        }
        
        
        return $this;
    }
   
    public function getQuery()
    {
        return $this->_query;
    }
    
    
}

?>
