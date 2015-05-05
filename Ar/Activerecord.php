<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Activerecord
 *
 * @author user
 */

namespace AR;

use PDO;
use PDOStatement;
use PDOException;
use Exception;

class Activerecord {

    //put your code here
    static public $primary_key;
    static public $table_name;
    static public $called_class;
    public $DBH;

    public function __construct() {
        try {
            $this->DBH = new PDO("mysql:host=localhost;dbname=pos", 'root', '123123');
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    static public function model() {
        self::$called_class = get_called_class();
        return new self::$called_class;
    }

    private function _getRow($query) {
        $STH = $this->DBH->query($query);
        # setting the fetch mode
        $STH->setFetchMode(PDO::FETCH_OBJ);

        return $STH->fetch();
    }

    private function _getResult($query) {

        $STH = $this->DBH->query($query);
        # setting the fetch mode
        $STH->setFetchMode(PDO::FETCH_OBJ);

        $result = array();

        while ($row = $STH->fetch()) {
            array_push($result, $row);
        }

        return $result;
    }

    public function findAll() {
        $sql = 'SELECT * FROM ' . self::$table_name;

        return $this->_getResult($sql);
    }

    public function findOne($id = NULL) {
        $sql = 'SELECT * FROM ' . self::$table_name . ' WHERE ' . self::$primary_key . '=' . $id;

        return $this->_getRow($sql);
    }

    public function findByAttributes($data = array()) {
        if (!empty($data)) {
            $where = '';
            foreach ($data as $column => $value) {
                $where.= $column . '=\'' . $value . '\' and ';
            }

            $where = substr($where, 0, (strlen($where) - 4));

            $sql = 'SELECT * FROM ' . self::$table_name . ' WHERE ' . $where;

            return $this->_getRow($sql);
        }
    }

    public function findAllByAttributes($data) {
        if (!empty($data)) {
            $where = '';
            foreach ($data as $column => $value) {
                $where.= $column . '=\'' . $value . '\' and ';
            }

            $where = substr($where, 0, (strlen($where) - 4));

            $sql = 'SELECT * FROM ' . self::$table_name . ' WHERE ' . $where;

            return $this->_getResult($sql);
        }
    }

    public function save($userdata) {

        if (!empty($userdata)) {
            $data = '';
            $column = '';

            foreach ($userdata as $key => $value) {
                $data .=":" . $key . "" . ',';
                $column .=$key . ',';
            }

            $finalData = substr($data, 0, strlen($data) - 1);
            $finalColumn = substr($column, 0, strlen($column) - 1);

            $sql = 'INSERT INTO ' . self::$table_name . ' (' . $finalColumn . ') VALUE (' . $finalData . ') ';

            $STH = $this->DBH->prepare($sql);

            $STH->execute($userdata);

            return $this->DBH->lastInsertId();
        }
    }

    public function update($userdata) {
        $sql = 'UPDATE ' . self::$table_name . ' SET ';

        $values = '';

        foreach ($userdata['data'] as $key => $value) {
            $values.=$key . "=:" . $key . ",";
        }

        $condition = '';
        foreach ($userdata['conditions'] as $key => $val) {
            $condition.= $key . '=\'' . $val . "' AND ";
        }

        $covstr = substr($values, 0, (strlen($values) - 1));
        $sql.=$covstr . " ";

        $costr = substr($condition, 0, (strlen($condition) - 4));
        $sql.= 'WHERE ' . $costr;

        //echo $sql;

        $STH = $this->DBH->prepare($sql);

        return $STH->execute($userdata['data']);
    }

    public function queryRow($sql) {
        return $this->_getRow($sql);
    }

    public function queryAll($sql) {
        return $this->_getResult($sql);
    }

    public function execute($query) {
        $STH = $this->DBH->prepare($query);
        return $STH->execute();
    }

    public function deleteOne($id = NULL) {
        if ($id == NULL) {
            throw new Exception('value required');
        }
        $sql = 'DELETE FROM ' . self::$table_name . ' WHERE ' . self::$primary_key . ' = ' . $id;

        return $this->execute($sql);
    }

    public function deleteAllByAttributes($data) {
        if (!empty($data)) {
            $where = '';
            foreach ($data as $column => $value) {
                $where.= $column . '=\'' . $value . '\' AND ';
            }

            $where = substr($where, 0, (strlen($where) - 4));

            $sql = 'DELETE FROM ' . self::$table_name . ' WHERE ' . $where;

            return $this->execute($sql);
        }
    }
    
    public function debugPrint($data) {
        echo '<pre>';
        print_r($data);
        echo '</pre>';
    }

}
