<?php
namespace Model;

require_once 'Ar/Activerecord.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User
 *
 * @author user
 */


use AR;

class User extends AR\Activerecord{
    //put your code here
    
    public function __construct() {
        parent::__construct();        
        self::$primary_key = 'id';
        self::$table_name = 'tbl_customers';
    }
}
