<?php
/**
 * Created by PhpStorm.
 * User: jordy
 * Date: 20-12-2016
 * Time: 17:07
 */

namespace Jerry\Query;


/**
 * Class Query
 * @package Qlib\Query
 */
class Query implements QueryInterface
{

    private $query;
    private $where;
    private $order;
    private $select;
    private $insert;
    private $limit;
    private $join;
    private $table;

    /**
     * @return mixed
     */
    function execute()
    {
        // TODO: Implement execute() method.
    }

    /**
     * @param $field
     * @param null $operator
     * @param null $value
     * @return Query
     */
    function where($field, $operator = null, $value = null)
    {
//        Parse the array if needed
        if (is_array($field)) return $this->whereByArray($field);


        if (!$this->where) $where_string = "WHERE `$field` $operator $value";
        else $where_string = " AND `$field` $operator $value";

        $this->where = $where_string;
        return $this;
    }

    /**
     * @param array $conditions
     * @return void
     */
    function whereByArray(array $conditions)
    {
        foreach ($conditions as $field => $value) {
            $this->where($field, '=', $value);
        }
    }

    /**
     * @param $amount
     * @return mixed
     */
    function limit($amount)
    {
        $this->limit = " LIMIT $amount";
        return $this;
    }

    /**
     * @param $foreign_table
     * @param $foreign_table_key
     * @param $value
     * @return Query
     */
    function join($foreign_table, $foreign_table_key, $value)
    {
        $this->join = " JOIN $foreign_table ON $foreign_table_key = $value";
        return $this;
    }

    /**
     * @param $values
     * @return mixed
     */
    function insert($values)
    {
        // TODO: Implement insert() method.
    }

    /**
     * @param $table
     * @return mixed
     */
    function table($table)
    {
        $this->table = " $table";
        return $this;
    }

    /**
     * @param array $fields
     * @return Query
     */
    function get($fields = ["*"])
    {
        $select_string = "";
        foreach ($fields as $field) {
            if ($field === "*") $select_string .= "*";
            else $select_string .= "$field, ";
        }

        $select_string_trimmed = trim($select_string, ", ");

        $this->select = "SELECT $select_string_trimmed FROM";
        return $this;
    }

    /**
     * @param $field
     * @param $value
     * @return Query
     */
    function orderBy($field, $value)
    {
        $this->order = " ORDER BY $field $value";
        return $this;
    }

    /**
     * @return string
     */
    function parseQuery()
    {
        $query_string = "";

        if ($this->select) $query_string .= $this->select;
        if ($this->insert) $query_string .= $this->insert;
        if ($this->table) $query_string .= $this->table;
        if ($this->join) $query_string .= $this->join;
        if ($this->where) $query_string .= $this->where;
        if ($this->order) $query_string .= $this->order;
        if ($this->limit) $query_string .= $this->limit;

        $this->query = $query_string;
        print_r($this->query);
        exit;
        return $this;
    }


}