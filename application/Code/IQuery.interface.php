<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/* * *************************************************************
 * Fluent interface for query building
 *
 * @author SeylomA
 * @copyright 2011 Devtrunk.com
 * @license free
 * @version 1.0
 * @since File available since 2011 V1.0
 * @link http://devtrunk.com
 * ************************************************************* */

interface IQuery {
    //put your code here
    
    function select();
    function SelectMin();
    function SelectMax();
    function selectCount(); 
    function selectTop($max);
    function selectColumn($column);
    function selectColumns($columns);
        
    function from($table);
    function where($columnName,$value);
    function whereMultiCondition($conditioValuesArr,$oper = 'AND');
    function whereIn($column,$valuesArray);
       
    function join($query);
   
    function orderBy($colname,$sortDirection = 'ASC');
    function getQuery();

}

?>
