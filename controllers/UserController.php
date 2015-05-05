<?php

namespace controller;

require_once 'models/User.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UserController
 *
 * @author user
 */
use Model\User;

class UserController {

    //put your code here

    public function getInstance() {
//        return User::model()->findAll();
//        
//        return User::model()->findOne(3);
//        
//        return User::model()->findByAttributes(array(
//            'customerId' => 1
//        ));
//        
//        return User::model()->findAllByAttributes(array(
//            'customerId' => 1
//        ));
//        
//        return User::model()->save(array(
//            'firstName'=>'Rana',
//            'lastName'=>'Hossain',
//            'email'=>'Rana@gmail.com',
//            'phone'=>'147147147',
//            'time'=>date('Y/m/d H:i:s'),
//            'isDelete'=> 0,
//        ));
//        
//        $sql = 'SELECT * FROM tbl_customers';
//        return User::model()->queryRow($sql);
//        
//        $sql = 'SELECT * FROM tbl_customers';        
//        return User::model()->queryAll($sql);
//        
//        $sql = 'INSERT into tbl_customers(firstName,lastName,email,phone,time) VALUES("rana","test","rana@yahoo.com","15255","'.date('Y/m/d H:i:s').'")';
//        return User::model()->execute($sql);
//        
//        return User::model()->deleteOne(6);
//        
//        return User::model()->deleteAllByAttributes(array(
//            'saleId'=>1
//        ));

//        return User::model()->update(array(
//                    'data' => array(
//                        'firstName' => 'Rana01',
//                        'lastName' => 'Hossain007',
//                        'email' => 'Rana@gmail.com',
//                        'phone' => '147147147',
//                        'time' => date('Y/m/d H:i:s'),
//                        'isDelete' => 0,
//                    ),
//                    'conditions' => array(
//                        'id' => 2
//                    )
//        ));
        
    }

}
