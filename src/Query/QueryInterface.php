<?php
/**
 * Created by PhpStorm.
 * User: jordy
 * Date: 20-12-2016
 * Time: 17:04
 */

namespace Jerry\Query;


/**
 * Interface QueryInterface
 * @package Qlib\Query
 */
interface QueryInterface
{
    /**
     * Execute the query
     * @return mixed
     */
    function execute();

    /**
     * Add a where clause
     * @param $fields
     * @param null $operator
     * @param null $value
     * @return Query
     */
    function where($fields, $operator = null, $value = null);

    /**
     * Same as where, but you can use an array
     * @param array $conditions
     * @return Query
     */
    function whereByArray(array $conditions);

    /**
     * Limit the amount of results you'll get back
     * @param $amount
     * @return Query
     */
    function limit($amount);

    /**
     * Add a join query
     * @param $foreign_table
     * @param $foreign_table_key
     * @param $value
     * @return Query
     */
    function join($foreign_table, $foreign_table_key, $value);

    /**
     * Insert values into the database
     * @param $values
     * @return Query
     */
    function insert($values);

    /**
     * Select the table you'll be querying on
     * @param $table
     * @return Query
     */
    function table($table);

    /**
     * @param string $fields
     * @return Query
     */
    function get($fields = "*");

    /**
     * @param $field
     * @param $value
     * @return Query
     */
    function orderBy($field, $value);

    /**
     * @return string
     */
    function parseQuery();

}