<?php 
/**
* This file contain all create tables functions if not founded
* @author Mohammed M.Salha
* @version 1.0
*/
class CreateTables{

     

        

    function __construct() {
    }
    

   
    function users(){
        /* Table variables */
        Global $user_table;
        Global $user_table_id;
        Global $user_table_login;
        Global $user_table_pass;
        Global $user_table_nicename;
        Global $user_table_email;
        Global $user_table_registered;
        Global $user_table_type;
        Global $user_table_status;
        $user_table="users";
        $user_table_id="id";
        $user_table_login="user_login";
        $user_table_pass="user_pass";
        $user_table_nicename="user_nicename";
        $user_table_email="user_email";
        $user_table_registered="user_registered";
        $user_table_type="user_type";
        $user_table_status="status";

        /* Database Connection */
        Global $connection;

        // sql query to create table
        $sql = "CREATE TABLE IF NOT EXISTS $user_table (
        $user_table_id bigint(20) UNSIGNED  AUTO_INCREMENT,
        $user_table_login varchar(60) NOT NULL,
        $user_table_pass  varchar(225) NOT NULL,
        $user_table_nicename  VARCHAR(50) NOT NULL,
        $user_table_email  	varchar(100) NOT NULL Unique,
        $user_table_registered TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP NOT NULL,
        $user_table_type  int(10) NOT NULL,
        $user_table_status  int(10) NOT NULL DEFAULT 0,
        PRIMARY KEY ($user_table_id)
        )";
        if($this->check_table_if_exists($user_table)==0){
            if ($connection->query($sql) != TRUE) {
                echo "Error creating table: " . $connection->error;
            }  
        }
    }



    
    function clients(){

        /* Table variables */
        Global $client_table;
        Global $client_table_id;
        Global $client_table_userid;
        Global $client_table_name;
        Global $client_table_address;
        Global $client_table_contact_name;
        Global $client_table_tel;
        Global $client_table_email;
        Global $client_table_registered;
        Global $client_table_personality;
        Global $client_table_status;
        Global $user_table;
        Global $user_table_id;

        $client_table="clients";
        $client_table_id="id";
        $client_table_userid="userid";
        $client_table_name="name";
        $client_table_email="email";
        $client_table_tel="tel";
        $client_table_address="address";
        $client_table_registered="date";
        $client_table_contact_name="contact_name";
        $client_table_personality="personality";
        $client_table_status="status";

        /* Database Connection */
        Global $connection;

        // sql query to create table
        $sql = "CREATE TABLE IF NOT EXISTS $client_table (
        $client_table_id bigint(20)  UNSIGNED  AUTO_INCREMENT,
        $client_table_userid  bigint(20) UNSIGNED   NOT NULL,
        $client_table_name varchar(60) NOT NULL,
        $client_table_email  	varchar(100) ,
        $client_table_registered TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP NOT NULL,
        $client_table_address varchar(100) ,
        $client_table_tel int(10) ,
        $client_table_contact_name  varchar(60) ,
        $client_table_personality  int(10) NOT NULL DEFAULT 0,
        $client_table_status  int(10) NOT NULL DEFAULT 0,
        PRIMARY KEY ($client_table_id),FOREIGN KEY ($client_table_userid) REFERENCES $user_table($user_table_id)  
        ) ENGINE=InnoDB;";
        if($this->check_table_if_exists($client_table)==0){
            if ($connection->query($sql) != TRUE) {
                echo "Error creating table: " . $connection->error;
            }  
        }



    }



    
    function meta(){

        /* Table variables */
        Global $meta_table;
        Global $meta_table_id;
        Global $meta_table_userid;
        Global $meta_table_name;
        Global $meta_table_type;
        Global $meta_table_value;
        Global $meta_table_registered;
        Global $meta_table_status;
        Global $user_table;
Global $user_table_id;

        $meta_table="meta";
        $meta_table_id="id";
        $meta_table_userid="userid";
        $meta_table_name="name";
        $meta_table_type="type";
        $meta_table_value="value";
        $meta_table_registered="date";
        $meta_table_status="status";



        /* Database Connection */
        Global $connection;

        // sql query to create table
        $sql = "CREATE TABLE IF NOT EXISTS $meta_table (
        $meta_table_id bigint(20)  UNSIGNED  AUTO_INCREMENT,
        $meta_table_userid bigint(20) UNSIGNED   NOT NULL,
        $meta_table_name varchar(60) NOT NULL,
        $meta_table_type varchar(60) Not Null,
        $meta_table_registered TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP NOT NULL,
        $meta_table_value varchar(60) NOT NULL,
        $meta_table_status  int(10) NOT NULL DEFAULT 0,
        PRIMARY KEY ($meta_table_id),foreign key($meta_table_userid) references $user_table($user_table_id) 
         
        ) ENGINE=InnoDB";
     
        if($this->check_table_if_exists($meta_table)==0){
            if ($connection->query($sql) != TRUE) {
            
                echo "Error creating table: " . $connection->error;
            }  
        }



    }



    
    function fees(){

        /* Table variables */
        Global $fees_table;
        Global $fees_table_id;
        Global $fees_table_file;
        Global $fees_table_type;
        Global $fees_table_value;
        Global $fees_table_currency;
        Global $fees_table_registered;
        Global $file_table;
        Global $file_table_id;

        $fees_table="fees";
        $fees_table_id="id";
        $fees_table_file="file";
        $fees_table_type="type";
        $fees_table_value="value";
        $fees_table_currency="currency";
        $fees_table_registered="date";
         
 

        /* Database Connection */
        Global $connection;

        // sql query to create table
        $sql = "CREATE TABLE IF NOT EXISTS $fees_table (
        $fees_table_id bigint(20) UNSIGNED   AUTO_INCREMENT,
        $fees_table_file bigint(20) UNSIGNED   NOT NULL,
        $fees_table_value decimal  NOT NULL,
        $fees_table_type bigint(20) Not Null,
        $fees_table_currency bigint(20) NOT NULL,
        $fees_table_registered TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP NOT NULL,
        PRIMARY KEY ($fees_table_id),foreign key($fees_table_file) references $file_table($file_table_id)  
        ) ENGINE=InnoDB";
       
        if($this->check_table_if_exists($fees_table)==0){
            if ($connection->query($sql) != TRUE) {
                echo "Error creating table: " . $connection->error;
            }  
        }



    }





    


    
    
    function opponents(){

        /* Table variables */
        Global $opponents_table;
        Global $opponents_table_id;
        Global $opponents_table_file_id;
        Global $opponents_table_userid;
        Global $opponents_table_name;
        Global $opponents_table_ID_number;
        Global $opponents_table_note;
        Global $opponents_table_status;
        Global $file_table;
        Global $file_table_id;
Global $opponents_table_registered;

        $opponents_table="opponents";
        $opponents_table_id="id";
        $opponents_table_file_id="file";
        $opponents_table_name="name";
        $opponents_table_ID_number="ID_number";
        $opponents_table_status="status";
        $opponents_table_note="note";
        $opponents_table_registered="date";
        $opponents_table_userid="userid";   
Global $user_table;
Global $user_table_id;

        /* Database Connection */
        Global $connection;

        // sql query to create table
        $sql = "CREATE TABLE IF NOT EXISTS $opponents_table (
        $opponents_table_id bigint(20)  UNSIGNED   AUTO_INCREMENT,
        $opponents_table_file_id bigint(20) UNSIGNED   NOT NULL,
        $opponents_table_userid bigint(20) UNSIGNED   NOT NULL,
        $opponents_table_name varchar(60) Not Null,
        $opponents_table_note TEXT,
        $opponents_table_ID_number bigint(20),
        $opponents_table_registered TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP NOT NULL,
        $opponents_table_status bigint(20) DEFAULT 0
        ,PRIMARY KEY ($opponents_table_id),foreign key($opponents_table_file_id) references $file_table($file_table_id) 
        ,foreign key($opponents_table_userid) references $user_table($user_table_id)   
        ) ENGINE=InnoDB";
       
        if($this->check_table_if_exists($opponents_table)==0){
            if ($connection->query($sql) != TRUE) {
                echo "Error creating table: " . $connection->error;
            }  
        }



    }



   
    function payments(){

        /* Table variables */
        Global $payments_table;
        Global $payments_table_id;
        Global $payments_table_type;
        Global $payments_table_number;
        Global $payments_table_value;
        Global $payments_table_currency;
        Global $payments_table_date;
        Global $payments_table_file_id;
        Global $payments_table_userid;
        Global $payments_table_client;
        Global $payments_table_status;
        Global $payments_table_bank;
        Global $payments_table_check;
        Global $payments_table_desc;
        Global $file_table;
        Global $file_table_id;
        Global $payments_table_create_at;
        Global $meta_table;
        Global $meta_table_id;
        Global $client_table;
        Global $client_table_id;
        $payments_table_bank="bank";
        $payments_table_desc="desc_pay";
        $payments_table="payments";
        $payments_table_id="id";
        $payments_table_type="type";
        $payments_table_number="number";
        $payments_table_value="value";
        $payments_table_currency="currency";
        $payments_table_date="date";
        $payments_table_create_at="create_at";
        $payments_table_client="client_id";
        $payments_table_file_id="file_id";
        $payments_table_status="status";
    $payments_table_userid='userid';
    $payments_table_check='pay_check';
Global $user_table;
Global $user_table_id;


        /* Database Connection */
        Global $connection;

        // sql query to create table
        $sql = "CREATE TABLE IF NOT EXISTS $payments_table (
        $payments_table_id bigint(20)  UNSIGNED  AUTO_INCREMENT,
        $payments_table_type bigint(20) UNSIGNED   NOT NULL,
        $payments_table_userid bigint(20)  UNSIGNED  NOT NULL,
        $payments_table_value decimal Not Null,
        $payments_table_number varchar(40)  Not Null,
        $payments_table_bank varchar(120)  ,
        $payments_table_check varchar(120)  ,
        $payments_table_desc bigint(20)  UNSIGNED  ,
        $payments_table_currency bigint(20)  UNSIGNED   NOT NULL ,
        $payments_table_file_id bigint(20) UNSIGNED   ,
        $payments_table_client bigint(20)  UNSIGNED  ,
        $payments_table_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP NOT NULL,
        $payments_table_create_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP NOT NULL,
        $payments_table_status bigint(20) DEFAULT 0,foreign key($payments_table_file_id) references $file_table($file_table_id) ,
        foreign key($payments_table_currency) references $meta_table($meta_table_id)  ,
        foreign key($payments_table_type) references $meta_table($meta_table_id)  ,
        foreign key($payments_table_client) references $client_table($client_table_id)  ,
        foreign key($payments_table_userid) references $user_table($user_table_id) , 
        foreign key($payments_table_desc) references $meta_table($meta_table_id)  ,
        PRIMARY KEY ($payments_table_id)
        ) ENGINE=InnoDB";
 
 
        if($this->check_table_if_exists($payments_table)==0){
            if ($connection->query($sql) != TRUE) {
                echo "Error creating table: " . $connection->error;
            }  
        }



    }



    
    function dues(){

        /* Table variables */
        Global $dues_table;
        Global $dues_table_id;
        Global $dues_table_type;
        Global $dues_table_userid;
        Global $dues_table_value;
        Global $dues_table_currency;
        Global $dues_table_date;
        Global $dues_table_file_id;
        Global $dues_table_registerd;
        Global $dues_table_status;
        Global $dues_table_opp;
        Global $file_table;
        Global $file_table_id;
        Global $meta_table;
        Global $meta_table_id;
        Global $opponents_table;
        Global $opponents_table_id;
        Global $dues_table_number;
        Global $user_table;
        Global $user_table_id;

        $dues_table="dues";
        $dues_table_id="id";
        $dues_table_type="type";
        $dues_table_value="value";
        $dues_table_currency="currency";
        $dues_table_userid="userid";
        $dues_table_date="date";
        $dues_table_file_id="file_id";
        $dues_table_status="status";
        $dues_table_opp="opp";
        $dues_table_registerd="create_at";
        $dues_table_number="number";



        /* Database Connection */
        Global $connection;

        // sql query to create table
        $sql = "CREATE TABLE IF NOT EXISTS $dues_table (
        $dues_table_id bigint(20)  UNSIGNED  AUTO_INCREMENT,
        $dues_table_userid bigint(20) UNSIGNED  NOT NULL,
        $dues_table_number Text Not Null,
        $dues_table_value decimal Not Null,
        $dues_table_currency bigint(20)  UNSIGNED  NOT NULL ,
        $dues_table_file_id bigint(20)  UNSIGNED  NOT NULL,
        $dues_table_type bigint(20)  UNSIGNED NOT NULL,
        $dues_table_opp bigint(20) UNSIGNED  NOT NULL,
        $dues_table_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP NOT NULL,
        $dues_table_registerd TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP NOT NULL,
        $dues_table_status bigint(20) DEFAULT 0,
        PRIMARY KEY ($dues_table_id),foreign key ($dues_table_file_id) references $file_table($file_table_id)  
        ,foreign key ($dues_table_currency) references $meta_table($meta_table_id)  
        ,foreign key ($dues_table_type) references $meta_table($meta_table_id) 
        ,foreign key ($dues_table_opp) references $opponents_table($opponents_table_id) ,
        foreign key($dues_table_userid) references $user_table($user_table_id)   
        ) ENGINE=InnoDB";
  
        if($this->check_table_if_exists($dues_table)==0){
            if ($connection->query($sql) != TRUE) {
                echo "Error creating table: " . $connection->error;
            }  
        }



    }



    function currency(){

        /* Table variables */
        Global $currency_table;
        Global $currency_table_id;
        Global $currency_table_type;
        Global $currency_table_value;
        Global $currency_table_date;



        $currency_table="currency";
        $currency_table_id="id";
        $currency_table_type="type";
        $currency_table_value="value";
        $currency_table_date="date";
       
    



        /* Database Connection */
        Global $connection;
       
        // sql query to create table
        $sql = "CREATE TABLE IF NOT EXISTS $currency_table (
        $currency_table_id bigint(20) UNSIGNED  AUTO_INCREMENT,
        $currency_table_value float Not Null,
        $currency_table_type bigint(20) NOT NULL ,
        $currency_table_date DATETIME   NOT NULL,
        PRIMARY KEY ($currency_table_id),
        UNIQUE($currency_table_date,$currency_table_type)
        ) ENGINE=InnoDB";
        if($this->check_table_if_exists($currency_table)==0){
            if ($connection->query($sql) != TRUE) {
                echo "Error creating table: " . $connection->error;
            }  
        }



    }




    
    function logs(){

        /* Table variables */
        Global $log_table;
        Global $log_table_id;
        Global $log_table_userid;
        Global $log_table_desc;
        Global $log_table_date;
        Global $user_table;
        Global $user_table_id;


        $log_table="logs";
        $log_table_id="id";
        $log_table_userid="userid";
        $log_table_desc="value";
        $log_table_date="date";
       
    



        /* Database Connection */
        Global $connection;
       
        // sql query to create table
        $sql = "CREATE TABLE IF NOT EXISTS $log_table (
        $log_table_id bigint(20) UNSIGNED  AUTO_INCREMENT,
        $log_table_userid bigint(20) UNSIGNED  NOT NULL,
        $log_table_desc TEXT Not Null,
        $log_table_date   TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP NOT NULL,
        PRIMARY KEY ($log_table_id),
        foreign key($log_table_userid) references $user_table($user_table_id) 
        ) ENGINE=InnoDB";
        if($this->check_table_if_exists($log_table)==0){
            if ($connection->query($sql) != TRUE) {
                echo "Error creating table: " . $connection->error;
            }  
        }



    }

    


    function add_log($userid,$desc){
        /* Table variables */
        Global $log_table;
        Global $log_table_id;
        Global $log_table_userid;
        Global $log_table_desc;
        Global $log_table_date;
      
        
         /* Database Connection */
         Global $connection;


            // sql query to create table
            $sql = "INSERT INTO $log_table ($log_table_userid,$log_table_desc)  
                    VALUES ($userid,'$desc')";
  
            if($connection->query($sql)){
                Global $notify;
            $notify='exchange_add';
              return $connection->insert_id;
            }else{
              return false;
            }
         

    }




    function add_currency($type,$value,$date){
        /* Table variables */
        Global $currency_table;
        Global $currency_table_id;
        Global $currency_table_type;
        Global $currency_table_value;
        Global $currency_table_date;
        
         /* Database Connection */
         Global $connection;


            // sql query to create table
            $sql = "INSERT INTO $currency_table ($currency_table_type,$currency_table_value,$currency_table_date)  
                    VALUES ($type,$value,'$date')";
  
            if($connection->query($sql)){
                Global $notify;
            $notify='exchange_add';
              return $connection->insert_id;
            }else{
              return false;
            }
         

    }




    function add_meta($type,$value,$name){
        /* Table variables */
        Global $meta_table;
        Global $meta_table_name;
        Global $meta_table_type;
        Global $meta_table_value;
        Global $meta_table_userid;
         /* Database Connection */
         Global $connection;

$userid=$_SESSION['userid'];
            // sql query to create table
            $sql = "INSERT INTO $meta_table ($meta_table_userid,$meta_table_name,$meta_table_type,$meta_table_value)  
                    VALUES ($userid,'$name','$type','$value')";
  
            if($connection->query($sql)){
              Global $notify;
              $notify="meta_added";
            }else{
                Global $notify;
                $notify="meta_error";
            }
         

    }





    function files(){

        /* Table variables */
        Global $file_table;
        Global $file_table_id;
        Global $file_table_userid;
        Global $file_table_client_id;
        Global $file_table_type;
        Global $file_table_number;
        Global $file_table_currency;
        Global $file_table_due;
        Global $file_table_paid;
        Global $file_table_note;
        Global $file_table_paid_out;
        Global $file_table_registered;
        Global $file_table_status;

        $file_table_userid="userid";
        $file_table="files";
        $file_table_id="id";
        $file_table_client_id="client_id";
        $file_table_type="type";
        $file_table_number="number";
        $file_table_currency="currency";
        $file_table_due="due_total";
        $file_table_paid="paid_total";
        $file_table_paid_out="paid_out";
        $file_table_registered="registered";
        $file_table_note="note";
        $file_table_status="status";
Global $meta_table;
Global $meta_table_id;
Global $client_table;
Global $client_table_id;
Global $user_table_id;
Global $user_table;
        /* Database Connection */
        Global $connection;

        // sql query to create table
        $sql = "CREATE TABLE IF NOT EXISTS $file_table (
        $file_table_id bigint(20) UNSIGNED   AUTO_INCREMENT,
        $file_table_userid bigint(20) UNSIGNED   NOT NULL,
        $file_table_client_id bigint(20) UNSIGNED  NOT NULL  ,
        $file_table_type  	bigint(20) UNSIGNED NOT NULL,
        $file_table_registered TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP NOT NULL,
        $file_table_number VARCHAR(100)  NOT NULL UNIQUE,
        $file_table_currency bigint(20) UNSIGNED NOT NULL  ,
        $file_table_due float DEFAULT 0 NOT NULL,
        $file_table_paid float DEFAULT 0  NOT NULL,
        $file_table_paid_out float DEFAULT 0  NOT NULL,
        $file_table_note  TEXT ,
        $file_table_status  bigint(20) UNSIGNED NOT NULL,
        PRIMARY KEY ($file_table_id) , FOREIGN KEY ($file_table_client_id) REFERENCES  $client_table($client_table_id) ,FOREIGN KEY ($file_table_userid) REFERENCES  $user_table($user_table_id)
        ,FOREIGN KEY ($file_table_type) REFERENCES  $meta_table($meta_table_id)
        ,FOREIGN KEY ($file_table_currency) REFERENCES  $meta_table($meta_table_id) 
        ,FOREIGN KEY ($file_table_status) REFERENCES  $meta_table($meta_table_id) on delete restrict on update cascade 

        ) ENGINE=InnoDB";
   
  /** $file_table_paid_out float DEFAULT 0  NOT NULL, this deleted from table  */
        if($this->check_table_if_exists($file_table)==0){
            if ($connection->query($sql) != TRUE) {
                echo "Error creating table: " . $connection->error;
            }  
        }



    }

   
    
    function add_file($client,$type,$number,$currency,$note,$status){
        /* Table variables */
        Global $file_table;
        Global $file_table_id;
        Global $file_table_client_id;
        Global $file_table_type;
        Global $file_table_number;
        Global $file_table_currency;
        Global $file_table_note;
        Global $file_table_registered;
        Global $file_table_status;
        Global $file_table_userid;
         /* Database Connection */
         Global $connection;

         $userid=$_SESSION['userid'];
            // sql query to create table
            $sql = "INSERT INTO $file_table ($file_table_userid,$file_table_client_id,$file_table_type,$file_table_number,$file_table_currency,$file_table_status,$file_table_note)  
                    VALUES ('$userid','$client','$type' , '$number','$currency','$status','$note')";
            $result=$connection->query($sql);
         
         
            if($result){
              return $connection->insert_id;
            }else{
                echo json_encode(401); // opp error inputs
                die();
            }
         

    }



    


    function update_file($client,$type,$number,$currency,$note,$status,$file_ID){
 
        /* Table variables */
        Global $file_table;
        Global $file_table_id;
        Global $file_table_client_id;
        Global $file_table_type;
        Global $file_table_number;
        Global $file_table_currency;
        Global $file_table_note;
        Global $file_table_due;
        Global $file_table_paid;
Global $file_table_paid_out;
        Global $file_table_registered;
        Global $file_table_status;
        Global $meta_table_name;
        Global $meta_table_type;
        Global $meta_table_value;
         /* Database Connection */
         Global $connection;

         $file_data=CreateTables::get_all_file_data($file_ID);
         $current_due=$file_data[0][$file_table_due];
         $current_paid=$file_data[0][$file_table_paid];
         $current_paid_out=$file_data[0][$file_table_paid_out];

         $currecny_file=CreateTables::get_value_currency($file_data[0][$file_table_currency]);
         $currecny_new=CreateTables::get_value_currency($currency);
                if($currecny_new[0][$meta_table_value]!=$currecny_file[0][$meta_table_value]){
                    if($currecny_new[0][$meta_table_value]=='JOD' && $currecny_file[0][$meta_table_value]=='USD'){
                    $convert=  convertCurrency($currecny_new[0][$meta_table_value]);
                    $current_due= $current_due*$convert;
                    $current_paid=$current_paid*$convert;
                    $current_paid_out=$current_paid_out*$convert;
                    }else if($currecny_new[0][$meta_table_value]=='ILS' && $currecny_file[0][$meta_table_value]=='USD'){
                        $convert=  convertCurrency($currecny_new[0][$meta_table_value]);
                        $current_due= $current_due*$convert;
                        $current_paid=$current_paid*$convert;
                        $current_paid_out=$current_paid_out*$convert;
                    }else if($currecny_new[0][$meta_table_value]=='USD' && $currecny_file[0][$meta_table_value]=='JOD'){
                        $convert=  convertCurrency($currecny_file[0][$meta_table_value]);
                        $current_due= $current_due/$convert;
                        $current_paid=$current_paid/$convert;
                        $current_paid_out=$current_paid_out/$convert;
                    }else if($currecny_new[0][$meta_table_value]=='USD' && $currecny_file[0][$meta_table_value]=='ILS'){
                        $convert=  convertCurrency($currecny_file[0][$meta_table_value]);
                        $current_due= $current_due/$convert;
                        $current_paid=$current_paid/$convert;
                        $current_paid_out=$current_paid_out/$convert;
                    }else if($currecny_new[0][$meta_table_value]=='JOD' && $currecny_file[0][$meta_table_value]=='ILS'){
                        $convert=  convertCurrency($currecny_file[0][$meta_table_value]);
                        $new_value= $current_due/$convert;
                        $new_value1=$current_paid/$convert;
                        $new_value2=$$current_paid_out/$convert;
                        $convert=  convertCurrency($currecny_new[0][$meta_table_value]);
                        $current_due=$new_value*$convert;
                        $current_paid=$new_value1*$convert;
                        $current_paid_out=$new_value2*$convert;
                    }else if($currecny_new[0][$meta_table_value]=='ILS' && $currecny_file[0][$meta_table_value]=='JOD'){
                        $convert=  convertCurrency($currecny_file[0][$meta_table_value]);
                        $new_value= $current_due/$convert;
                        $new_value1=$current_paid/$convert;
                        $new_value2=$current_paid_out/$convert;
                        $convert=  convertCurrency($currecny_new[0][$meta_table_value]);
                        $current_due=$new_value*$convert;
                        $current_paid=$new_value1*$convert;
                        $current_paid_out=$new_value2*$convert;
                    }
                
            }
            // sql query to create table
            $sql = "UPDATE  $file_table SET  $file_table_client_id='$client',$file_table_type='$type',$file_table_number='$number',$file_table_currency='$currency',$file_table_status='$status',$file_table_note='$note',$file_table_due='$current_due',$file_table_paid='$current_paid',$file_table_paid_out='$current_paid_out' WHERE $file_table_id=$file_ID";
            
            if($connection->query($sql)){
                CreateTables::add_log($_SESSION['userid'],'تحديث ملف رقم '.$file_data[0][$file_table_number]);
                return true;
            }else{
                echo json_encode('401'); // opp error inputs
                die();
                return false;
            }
         

    }




    function update_due_file($new_value,$currency,$file){
       
        /* Table variables */
        Global $file_table;
        Global $file_table_id;
        Global $file_table_client_id;
        Global $file_table_type;
        Global $file_table_number;
        Global $file_table_currency;
        Global $file_table_note;
        Global $file_table_registered;
        Global $file_table_status;
        Global $file_table_due;
        Global $meta_table_value;
       
         /* Database Connection */
         Global $connection;
         $file_data=CreateTables::get_all_file_data($file);
         $current_due=$file_data[0][$file_table_due];
         
         $currecny_file=CreateTables::get_value_currency($file_data[0][$file_table_currency]);
    
         $currecny_due=CreateTables::get_value_currency($currency);
        
        if($currecny_due[0][$meta_table_value]!=$currecny_file[0][$meta_table_value]){
                if($currecny_due[0][$meta_table_value]=='JOD' && $currecny_file[0][$meta_table_value]=='USD'){
                 $convert=  convertCurrency($currecny_due[0][$meta_table_value]);
                 $current_due= $current_due+($new_value/$convert);
                }else if($currecny_due[0][$meta_table_value]=='ILS' && $currecny_file[0][$meta_table_value]=='USD'){
                    $convert=  convertCurrency($currecny_due[0][$meta_table_value]);
                    $current_due= $current_due+($new_value/$convert);
                }else if($currecny_due[0][$meta_table_value]=='USD' && $currecny_file[0][$meta_table_value]=='JOD'){
                    $convert=  convertCurrency($currecny_file[0][$meta_table_value]);
                    $current_due= $current_due+($new_value*$convert);
                }else if($currecny_due[0][$meta_table_value]=='USD' && $currecny_file[0][$meta_table_value]=='ILS'){
                    $convert=  convertCurrency($currecny_file[0][$meta_table_value]);
                    $current_due= $current_due+($new_value*$convert);
                }else if($currecny_due[0][$meta_table_value]=='JOD' && $currecny_file[0][$meta_table_value]=='ILS'){
                    $convert=  convertCurrency($currecny_due[0][$meta_table_value]);
                    $new_value= $new_value/$convert;
                    $convert=  convertCurrency($currecny_file[0][$meta_table_value]);
                    $new_value=$new_value*$convert;
                    $current_due=$current_due+$new_value;
                }else if($currecny_due[0][$meta_table_value]=='ILS' && $currecny_file[0][$meta_table_value]=='JOD'){
                    $convert=  convertCurrency($currecny_due[0][$meta_table_value]);
                    $new_value= $new_value/$convert;
                    $convert=  convertCurrency($currecny_file[0][$meta_table_value]);
                    $new_value=$new_value*$convert;
                    $current_due=$current_due+$new_value;
                }
             
        }else{
            $current_due=$current_due+$new_value;
        }
     
            // sql query to create table
        $sql = "UPDATE  $file_table SET  $file_table_due='$current_due' WHERE $file_table_id=$file";
            
            if($connection->query($sql)){
                return $connection->insert_id;
            }else{
                echo json_encode('401'); // opp error inputs
                die();
                return false;
            }
         

    }





    function update_paid_file($new_value,$currency,$file,$payment_type,$pay){
       
        /* Table variables */
        Global $file_table;
        Global $file_table_id;
        Global $file_table_client_id;
        Global $file_table_type;
        Global $file_table_number;
        Global $file_table_currency;
        Global $file_table_note;
        Global $file_table_registered;
        Global $file_table_status;
        Global $file_table_due;
        Global $file_table_paid;
        Global $file_table_paid_out;
        Global $meta_table_value;
       
         /* Database Connection */
         Global $connection;
         $file_data=CreateTables::get_all_file_data($file);
         $current_paid=$file_data[0][$file_table_paid];

            if($pay=="out"){
                $current_paid=$file_data[0][$file_table_paid_out];
            }
         

         $currecny_file=CreateTables::get_value_currency($file_data[0][$file_table_currency]);
    
         $currecny_paid=CreateTables::get_value_currency($currency);
         $payment_types=CreateTables::get_value_currency($payment_type);

        if($currecny_paid[0][$meta_table_value]!=$currecny_file[0][$meta_table_value]){
                if($currecny_paid[0][$meta_table_value]=='JOD' && $currecny_file[0][$meta_table_value]=='USD'){
                 $convert=  convertCurrency($currecny_paid[0][$meta_table_value]);
                 
                    $current_paid= $current_paid+($new_value/$convert);
                
                }else if($currecny_paid[0][$meta_table_value]=='ILS' && $currecny_file[0][$meta_table_value]=='USD'){
                    $convert=  convertCurrency($currecny_paid[0][$meta_table_value]);
                    
                    $current_paid= $current_paid+($new_value/$convert);
                    
                }else if($currecny_paid[0][$meta_table_value]=='USD' && $currecny_file[0][$meta_table_value]=='JOD'){
                    $convert=  convertCurrency($currecny_file[0][$meta_table_value]);
                    
                    $current_paid= $current_paid+($new_value*$convert);
                  
                }else if($currecny_paid[0][$meta_table_value]=='USD' && $currecny_file[0][$meta_table_value]=='ILS'){
                    $convert=  convertCurrency($currecny_file[0][$meta_table_value]);
                    
                    $current_paid= $current_paid+($new_value*$convert);
                    
                }else if($currecny_paid[0][$meta_table_value]=='JOD' && $currecny_file[0][$meta_table_value]=='ILS'){
                    $convert=  convertCurrency($currecny_paid[0][$meta_table_value]);
                    $new_value= $new_value/$convert;
                    $convert=  convertCurrency($currecny_file[0][$meta_table_value]);
                    $new_value=$new_value*$convert;
                    
                    $current_paid=$current_paid+$new_value;
                    
                }else if($currecny_paid[0][$meta_table_value]=='ILS' && $currecny_file[0][$meta_table_value]=='JOD'){
                    $convert=  convertCurrency($currecny_paid[0][$meta_table_value]);
                    $new_value= $new_value/$convert;
                    $convert=  convertCurrency($currecny_file[0][$meta_table_value]);
                    $new_value=$new_value*$convert;
                   
                    $current_paid=$current_paid+$new_value;
                    
                }
             
        }else{
             
            $current_paid=$current_paid+$new_value;
            
        }
       
        $current_paid= round($current_paid, 2);
        

            // sql query to create table
            
        $sql = "UPDATE  $file_table SET  $file_table_paid='$current_paid' WHERE $file_table_id=$file";
        if($pay=='out'){ 
            $sql = "UPDATE  $file_table SET  $file_table_paid_out='$current_paid' WHERE $file_table_id=$file";

        }
      
            if($connection->query($sql)){
                return $connection->insert_id;
            }else{
                
                return false;
            }
         

    }



    function add_client($userid,$name,$address,$email,$contact,$tel,$personality){
        /* Table variables */
        Global $client_table;
        Global $client_table_id;
        Global $client_table_name;
        Global $client_table_address;
        Global $client_table_contact_name;
        Global $client_table_tel;
        Global $client_table_email;
        Global $client_table_registered;
        Global $client_table_personality;
        Global $client_table_userid;
        
         /* Database Connection */
         Global $connection;
            
            // sql query to create table
            $sql = "INSERT INTO $client_table ($client_table_userid,$client_table_name,$client_table_address,$client_table_contact_name,$client_table_tel,$client_table_email,$client_table_personality) 
                    VALUES ('$userid','$name', '$address', '$contact','$tel','$email','$personality')";
 
            if($connection->query($sql)){
                Global $notify;
                $notify = "client_added";
            }else{
                Global $notify;
                $notify = "client_error";
            }
         

    }


    
    function update_meta($id,$name){
        /* Table variables */
        Global $meta_table;
        Global $meta_table_userid;
        Global $meta_table_name;
        Global $meta_table_type;
        Global $meta_table_value;
        Global $meta_table_id;
        
         /* Database Connection */
         Global $connection;
            $userid=0;
            
           
            // sql query to create table
            $sql = "UPDATE $meta_table SET  $meta_table_name='$name' WHERE $meta_table_id='$id'";

            if($connection->query($sql)){
                Global $notify;
                $notify = "meta_updated";
            }else{
                Global $notify;
                $notify = "error_updated";
            }
         

    }



 
    function update_client($id,$name,$address,$email,$contact,$tel,$personality){
        /* Table variables */
        Global $client_table;
        Global $client_table_id;
        Global $client_table_name;
        Global $client_table_address;
        Global $client_table_contact_name;
        Global $client_table_tel;
        Global $client_table_email;
        Global $client_table_registered;
        Global $client_table_personality;
        Global $client_table_userid;
        
         /* Database Connection */
         Global $connection;
            $userid=0;
            
           
            // sql query to create table
            $sql = "UPDATE $client_table SET  $client_table_name='$name',$client_table_contact_name='$contact',$client_table_tel='$tel',$client_table_email='$email',$client_table_personality='$personality',$client_table_address='$address'   WHERE $client_table_id='$id'";

            if($connection->query($sql)){
                Global $notify;
                $notify = "client_updated";
            }else{
                Global $notify;
                $notify = "error_updated";
            }
         

    }




    
    function delete_file($id){
        /* Table variables */
        Global $file_table;
        Global $file_table_id;
        Global $file_table_client_id;
        Global $file_table_type;
        Global $file_table_number;
        Global $file_table_currency;
        Global $file_table_note;
        Global $file_table_registered;
        Global $file_table_status;
        Global $payments_table;
        Global $payments_table_id;
        Global $payments_table_type;
        Global $payments_table_number;
        Global $payments_table_value;
        Global $payments_table_currency;
        Global $payments_table_date;
        Global $payments_table_file_id;
        Global $payments_table_status;
        Global $opponents_table;
        Global $opponents_table_id;
        Global $opponents_table_file_id;
        Global $opponents_table_name;
        Global $opponents_table_ID_number;
        Global $opponents_table_note;
        Global $opponents_table_status;
        Global $dues_table;
        Global $dues_table_id;
        Global $dues_table_type;
        Global $dues_table_value;
        Global $dues_table_currency;
        Global $dues_table_date;
        Global $dues_table_file_id;
        Global $dues_table_status;
         /* Database Connection */
         Global $connection;
            $userid=0;
            
           
            // sql query to create table
            $sql = "UPDATE $file_table SET  $file_table_status='0' WHERE $file_table_id='$id'";

            if($connection->query($sql)){
                CreateTables::add_log($_SESSION['userid'],'حذف ملف');
                Global $notify;
                $notify = "file_deleted";
            }else{
                Global $notify;
                $notify = "error_file";
            }
            $sql = "UPDATE $payments_table SET  $payments_table_status='-1' WHERE $payments_table_file_id='$id'";
            if($connection->query($sql)){
                Global $notify;
                $notify = "file_deleted";
            }else{
                Global $notify;
                $notify = "error_file";
            }
            $sql = "UPDATE $opponents_table SET  $opponents_table_status='-1' WHERE $opponents_table_file_id='$id'";
            if($connection->query($sql)){
                Global $notify;
                $notify = "file_deleted";
            }else{
                Global $notify;
                $notify = "error_file";
            }
            $sql = "UPDATE $dues_table SET  $dues_table_status='-1' WHERE $dues_table_file_id='$id'";
            if($connection->query($sql)){
                Global $notify;
                $notify = "file_deleted";
            }else{
                Global $notify;
                $notify = "error_file";
            }
         

    }



   
    
    function delete_opp($id){
        /* Table variables */
        Global $opponents_table;
        Global $opponents_table_id;
        Global $opponents_table_file_id;
        Global $opponents_table_name;
        Global $opponents_table_ID_number;
        Global $opponents_table_note;
        Global $opponents_table_status;
         /* Database Connection */
         Global $connection;
        
            
  
         
            $sql = "DELETE FROM  $opponents_table  WHERE $opponents_table_id='$id'";
            
            if($connection->query($sql)){
                Global $notify;
                $notify = "opp_deleted";
            }else{
                Global $notify;
                $notify = "error_opp";
            }
         

    }






  
    
    function delete_currency($id){
        /* Table variables */
        Global $currency_table;
        Global $currency_table_id;
        Global $currency_table_type;
        Global $currency_table_value;
        Global $currency_table_date;
         /* Database Connection */
         Global $connection;
        
            
  
         
            $sql = "DELETE FROM  $currency_table  WHERE $currency_table_id='$id'";
            
            if($connection->query($sql)){
                Global $notify;
                $notify = "currency_deleted";
            }else{
                Global $notify;
                $notify = "error_currency";
            }
         

    }


    

    function delete_client($id){
        /* Table variables */
        Global $client_table;
        Global $client_table_id;
        Global $client_table_name;
        Global $client_table_address;
        Global $client_table_contact_name;
        Global $client_table_tel;
        Global $client_table_email;
        Global $client_table_registered;
        Global $client_table_personality;
        Global $client_table_userid;
        Global $client_table_status;
         /* Database Connection */
         Global $connection;
     
            
           
            // sql query to create table
            $sql = "DELETE FROM $client_table  WHERE $client_table_id='$id'";

            if($connection->query($sql)){
                Global $notify;
                $notify = "client_deleted";
            }else{
                Global $notify;
                $notify = "error_deleted";
            }
         

    }




    
    function delete_meta($id){
        /* Table variables */
        Global $meta_table;
            Global $meta_table_userid;
            Global $meta_table_name;
            Global $meta_table_type;
            Global $meta_table_value;
            Global $meta_table_id;
         /* Database Connection */
         Global $connection;
     
            
           
            // sql query to create table
            $sql = "DELETE FROM $meta_table  WHERE $meta_table_id='$id'";

            if($connection->query($sql)){
                Global $notify;
                $notify = "meta_deleted";
            }else{
                Global $notify;
                $notify = "error_deleted";
            }
         

    }





    
    function add_payment($payment_id,$payment_number,$payment_currency,$payment_value,$payment_date,$payment_type,$bank=null,$desc=null,$check=null){
        /* Table variables */
     
        Global $payments_table;
        Global $payments_table_id;
        Global $payments_table_type;
        Global $payments_table_number;
        Global $payments_table_value;
        Global $payments_table_currency;
        Global $payments_table_date;
        Global $payments_table_file_id;
        Global $payments_table_client;
        Global $payments_table_status;
        Global $payments_table_desc;
        Global $payments_table_bank;
        Global $payments_table_userid;
        Global $payments_table_check;
         /* Database Connection */
            Global $connection;
            Global $meta_table_userid;
            Global $meta_table_name;
            Global $meta_table_type;
            Global $meta_table_value;
            $type=CreateTables::get_meta_name_by_id($payment_type);
            $payment_value=round($payment_value, 2);
            // sql query to create table
            $userid=$_SESSION['userid'];
           if($bank==null){
            $bank='null';
           }else{
               $bank="'$bank'";
           }
           if($check==null){
            $check='null';
           }else{
               $check="'$check'";
           }
           if($desc==null){
            $desc='null';
           }else{
               $desc="'$desc'";
           }
            $sql = "INSERT INTO $payments_table ($payments_table_desc,$payments_table_bank,$payments_table_check,$payments_table_userid,$payments_table_number,$payments_table_file_id,$payments_table_currency,$payments_table_value,$payments_table_date,$payments_table_type) 
                    VALUES ($desc,$bank,$check,'$userid','$payment_id', '$payment_number', '$payment_currency',$payment_value,'$payment_date','$payment_type')";
        
          /*  if($type[0][$meta_table_value]!='In' && $type[0][$meta_table_value]!='FU'){
                $sql = "INSERT INTO $payments_table ($payments_table_userid,$payments_table_number,$payments_table_client,$payments_table_currency,$payments_table_value,$payments_table_date,$payments_table_type) 
                VALUES ('$userid','$payment_id', '$payment_number', '$payment_currency',$payment_value,'$payment_date','$payment_type')";
            }
           */
            if($connection->query($sql)){
                if($type[0][$meta_table_value]!='FU'){
                    CreateTables::update_paid_file($payment_value,$payment_currency,$payment_number,$payment_type,$type[0][$meta_table_value]);
                }
                CreateTables::add_log($_SESSION['userid'],'اضافة دفعة جديدة');
              return true;
            }else{
              return false;
            }
         

    }


    
    function add_fees($currency,$fees_type,$fees_value,$file_id){
        /* Table variables */
        Global $fees_table;
        Global $fees_table_id;
        Global $fees_table_userid;
        Global $fees_table_file;
        Global $fees_table_type;
        Global $fees_table_value;
        Global $fees_table_currency;
        Global $fees_table_registered;
        
         /* Database Connection */
         Global $connection;


            // sql query to create table
            $sql = "INSERT INTO $fees_table ($fees_table_type,$fees_table_file,$fees_table_value,$fees_table_currency) 
                    VALUES ($fees_type, $file_id, $fees_value,$currency)";
 
            if($connection->query($sql)){
                Global $notify;
                $notify = "client_added";
            }else{
                Global $notify;
                $notify = "client_error";
                echo $connection->error;
            }
         

    }




  
    
    function update_fees($currency,$fees_type,$fees_value,$file_id){
        /* Table variables */
        Global $fees_table;
        Global $fees_table_id;
        Global $fees_table_userid;
        Global $fees_table_file;
        Global $fees_table_type;
        Global $fees_table_value;
        Global $fees_table_currency;
        Global $fees_table_registered;
        
         /* Database Connection */
         Global $connection;


            // sql query to create table
            $sql = "UPDATE $fees_table SET  $fees_table_value=$fees_value,$fees_table_currency=$currency   WHERE $fees_table_file=$file_id and $fees_table_type=$fees_type";
 
            if($connection->query($sql)){
                Global $notify;
                $notify = "client_added";
            }else{
                echo json_encode('401'); // opp error inputs
                die();
            }
         

    }

    


    


    
    function get_all_clients(){
        /* Table variables */
        Global $client_table;
        Global $client_table_id;
        Global $client_table_name;
        Global $client_table_address;
        Global $client_table_contact_name;
        Global $client_table_tel;
        Global $client_table_email;
        Global $client_table_registered;
        Global $client_table_personality;
        Global $client_table_status;
         /* Database Connection */
         Global $connection;


            // sql query to create table
            $sql = "SELECT * FROM $client_table where $client_table_status!='-1' ORDER BY $client_table_registered DESC";
            $result=$connection->query($sql);

            $result_list = array();
            if ($result != null) {
                while($row = mysqli_fetch_array($result)) {
                   $result_list[] = $row;
                }
            }

            return $result_list;
                

            }


  
            

    function get_all_currecny(){
        /* Table variables */
        Global $currency_table;
        Global $currency_table_id;
        Global $currency_table_type;
        Global $currency_table_value;
        Global $currency_table_date;
         /* Database Connection */
         Global $connection;


            // sql query to create table
            $sql = "SELECT * FROM $currency_table ORDER BY $currency_table_date DESC";
            $result=$connection->query($sql);

            $result_list = array();
            if ($result != null) {
                while($row = mysqli_fetch_array($result)) {
                   $result_list[] = $row;
                }
            }

            return $result_list;
                

            }





            
    function get_user_by_id($id){
        /* Table variables */
        Global $user_table;
        Global $user_table_id;
        Global $user_table_login;
        Global $user_table_pass;
        Global $user_table_nicename;
        Global $user_table_email;
        Global $user_table_registered;
        Global $user_table_type;
        Global $user_table_status;
         /* Database Connection */
         Global $connection;


            // sql query to create table
            $sql = "SELECT * FROM $user_table where $user_table_id='$id'";
            $result=$connection->query($sql);

            $result_list = array();
            if ($result != null) {
                while($row = mysqli_fetch_array($result)) {
                   $result_list[] = $row;
                }
            }

            return $result_list;
                

            }




   
            
    function get_all_payments($id=0){
        /* Table variables */
        Global $payments_table;
        Global $payments_table_id;
        Global $payments_table_type;
        Global $payments_table_number;
        Global $payments_table_value;
        Global $payments_table_currency;
        Global $payments_table_date;
        Global $payments_table_file_id;
        Global $payments_table_status;
        Global $payments_table_create_at;
         /* Database Connection */
         Global $connection;


            // sql query to create table
           
            $sql = "SELECT * FROM $payments_table WHERE $payments_table_status='0' or $payments_table_status='1' ORDER BY $payments_table_create_at DESC";
            if($id>0){
                $sql = "SELECT * FROM $payments_table WHERE  (($payments_table_status='0' or $payments_table_status='1')  and $payments_table_file_id='$id') ORDER BY $payments_table_create_at DESC";

            }
          
            $result=$connection->query($sql);

            $result_list = array();
            if ($result != null) {
                while($row = mysqli_fetch_array($result)) {
                   $result_list[] = $row;
                }
            }

            return $result_list;
                

            }





            
    function get_currency($currency,$date){
        /* Table variables */
        Global $currency_table;
        Global $currency_table_id;
        Global $currency_table_type;
        Global $currency_table_value;
        Global $currency_table_date;
         /* Database Connection */
         Global $connection;
            $date= date('Y-m-d', strtotime($date));
        
            // sql query to create table
            $sql = "SELECT * FROM $currency_table Where $currency_table_date='$date' and $currency_table_type=$currency ORDER BY $currency_table_date DESC";
 
            $result=$connection->query($sql);

            $result_list = array();
            if ($result != null) {
                while($row = mysqli_fetch_array($result)) {
                   $result_list[] = $row;
                }
            }

            return $result_list;
                

            }

            


    function get_all_users(){
        /* Table variables */
        Global $user_table;
        Global $user_table_id;
        Global $user_table_login;
        Global $user_table_pass;
        Global $user_table_nicename;
        Global $user_table_email;
        Global $user_table_registered;
        Global $user_table_type;
        Global $user_table_status;
        
         /* Database Connection */
         Global $connection;

        $userid=$_SESSION['userid'];
            // sql query to create table
            $sql = "SELECT * FROM $user_table WHERE $user_table_id!='$userid'";
            $result=$connection->query($sql);

            $result_list = array();
            if ($result != null) {
                while($row = mysqli_fetch_array($result)) {
                   $result_list[] = $row;
                }
            }

            return $result_list;
                

            }



 
            
    function get_client_by_id($id){
        /* Table variables */
        Global $client_table;
        Global $client_table_id;
        Global $client_table_name;
        Global $client_table_address;
        Global $client_table_contact_name;
        Global $client_table_tel;
        Global $client_table_email;
        Global $client_table_registered;
        Global $client_table_personality;
        Global $client_table_status;
         /* Database Connection */
         Global $connection;


            // sql query to create table
            $sql = "SELECT * FROM $client_table WHERE $client_table_id=$id and $client_table_status!='-1' ORDER BY $client_table_registered DESC";
            $result=$connection->query($sql);

            $result_list = array();
            if ($result != null) {
                while($row = mysqli_fetch_array($result)) {
                   $result_list[] = $row;
                }
            }

            return $result_list;
                

            }




   
            
    function get_fees_by_file($id){
        /* Table variables */
        Global $fees_table;
        Global $fees_table_id;
         Global $fees_table_file;
        Global $fees_table_type;
        Global $fees_table_value;
        Global $fees_table_currency;
        Global $fees_table_registered;
        
         /* Database Connection */
         Global $connection;


            // sql query to create table
            $sql = "SELECT * FROM $fees_table WHERE $fees_table_file=$id";
            $result=$connection->query($sql);

            $result_list = array();
            if ($result != null) {
                while($row = mysqli_fetch_array($result)) {
                   $result_list[] = $row;
                }
            }

            return $result_list;
                

            }





            
    function get_all_file_types(){
        /* Table variables */
        Global $meta_table;
        Global $meta_table_id;
        Global $meta_table_userid;
        Global $meta_table_name;
        Global $meta_table_type;
        Global $meta_table_value;
        Global $meta_table_registered;
        Global $meta_table_status;
        
         /* Database Connection */
         Global $connection;


            // sql query to create table
            $sql = "SELECT * FROM $meta_table WHERE $meta_table_type='file'";
            $result=$connection->query($sql);
       
            $result_list = array();
            if ($result != null) {
                while($row = mysqli_fetch_array($result)) {
                   $result_list[] = $row;
                }
            }

            return $result_list;
                

            }



 
            
    function get_all_pamynets_types(){
        /* Table variables */
        Global $meta_table;
        Global $meta_table_id;
        Global $meta_table_userid;
        Global $meta_table_name;
        Global $meta_table_type;
        Global $meta_table_value;
        Global $meta_table_registered;
        Global $meta_table_status;
        
         /* Database Connection */
         Global $connection;


            // sql query to create table
            $sql = "SELECT * FROM $meta_table WHERE $meta_table_type='payment_type'";
            $result=$connection->query($sql);
       
            $result_list = array();
            if ($result != null) {
                while($row = mysqli_fetch_array($result)) {
                   $result_list[] = $row;
                }
            }

            return $result_list;
                

            }




   
            
    function get_dues_file($file){
        /* Table variables */
        Global $dues_table;
        Global $dues_table_id;
        Global $dues_table_type;
        Global $dues_table_value;
        Global $dues_table_currency;
        Global $dues_table_date;
        Global $dues_table_file_id;
        Global $dues_table_status;
        Global $dues_table_registerd;
        
         /* Database Connection */
         Global $connection;


            // sql query to create table
            $sql = "SELECT * FROM $dues_table WHERE $dues_table_file_id=$file and $dues_table_status!='-1' ORDER BY $dues_table_date DESC";
            $result=$connection->query($sql);
       
            $result_list = array();
            if ($result != null) {
                while($row = mysqli_fetch_array($result)) {
                   $result_list[] = $row;
                }
            }

            return $result_list;
                

            }



    
            
    function get_dues_by_id($id){
        /* Table variables */
        Global $dues_table;
        Global $dues_table_id;
        Global $dues_table_type;
        Global $dues_table_value;
        Global $dues_table_currency;
        Global $dues_table_date;
        Global $dues_table_file_id;
        Global $dues_table_status;
        
         /* Database Connection */
         Global $connection;


            // sql query to create table
            $sql = "SELECT * FROM $dues_table WHERE $dues_table_id=$id ORDER BY $dues_table_date DESC";
            $result=$connection->query($sql);
       
            $result_list = array();
            if ($result != null) {
                while($row = mysqli_fetch_array($result)) {
                   $result_list[] = $row;
                }
            }

            return $result_list;
                

            }



    
            
    function get_payment_by_id($id){
        /* Table variables */
        Global $payments_table;
        Global $payments_table_id;
        Global $payments_table_type;
        Global $payments_table_number;
        Global $payments_table_value;
        Global $payments_table_currency;
        Global $payments_table_date;
        Global $payments_table_file_id;
        Global $payments_table_status;
        
         /* Database Connection */
         Global $connection;


            // sql query to create table
            $sql = "SELECT * FROM $payments_table WHERE $payments_table_id=$id ORDER BY $payments_table_date DESC";
            $result=$connection->query($sql);
       
            $result_list = array();
            if ($result != null) {
                while($row = mysqli_fetch_array($result)) {
                   $result_list[] = $row;
                }
            }

            return $result_list;
                

            }





    
            
    function get_dues_file_by_type($type,$file){
        /* Table variables */
        Global $dues_table;
        Global $dues_table_id;
        Global $dues_table_type;
        Global $dues_table_value;
        Global $dues_table_currency;
        Global $dues_table_date;
        Global $dues_table_file_id;
        Global $dues_table_status;
        Global $dues_table_opp;
        Global $dues_table_number;
        Global $dues_table_userid; 
        
         /* Database Connection */
         Global $connection;


            // sql query to create table
            $sql = "SELECT * FROM $dues_table WHERE $dues_table_file_id=$file and $dues_table_type=$type and $dues_table_status!='-1' ORDER BY $dues_table_date DESC";
            $result=$connection->query($sql);
   
            $result_list = array();
            $count=0;
            if ($result != null) {
                while($row = mysqli_fetch_array($result)) {
                    $result_list[] = $row;
                }
            }

            return $result_list;
                

            }


    
            


    function get_payments_by_type($type,$next=false){
        /* Table variables */
        Global $payments_table;
        Global $payments_table_id;
        Global $payments_table_type;
        Global $payments_table_number;
        Global $payments_table_value;
        Global $payments_table_currency;
        Global $payments_table_date;
        Global $payments_table_file_id;
        Global $payments_table_status;
        Global $results_per_page;
        Global $page_first_result;
         /* Database Connection */
         Global $connection;
        $date=date('Y-m-d');

            // sql query to create table
            $sql = "SELECT * FROM $payments_table WHERE $payments_table_type=$type and $payments_table_date='$date' and $payments_table_status!='-1' LIMIT  $page_first_result,$results_per_page";
           
            $result=$connection->query($sql);
            if($next){
                $sql = "SELECT * FROM $payments_table WHERE $payments_table_type=$type and DATE($payments_table_date)>='$date' and $payments_table_status!='-1'  ORDER BY $payments_table_date ASC LIMIT  $page_first_result,$results_per_page";
            }
            $result2=$connection->query($sql);

            $result_list = array();
            
            if ($result != null) {
                while($row = mysqli_fetch_array($result)) {
                   $result_list[] = $row;
                }
            }
            $count=0;
            if ($result2 != null && $next) {
                while($row = mysqli_fetch_array($result2) ) {
                    if(!in_array($row,$result_list)){
                        $result_list[] = $row;
                    }
                   
                   if($count==10){
                    break;
                   }
                   $count++;
                }
            }

            return $result_list;
                

            }




            

  
            
    function get_payments_by_type_all($type){
        /* Table variables */
        Global $payments_table;
        Global $payments_table_id;
        Global $payments_table_type;
        Global $payments_table_number;
        Global $payments_table_value;
        Global $payments_table_currency;
        Global $payments_table_date;
        Global $payments_table_file_id;
        Global $payments_table_status;
        Global $results_per_page;
        Global $page_first_result;
         /* Database Connection */
         Global $connection;
        $date=date('Y-m-d');

            // sql query to create table
            $sql = "SELECT * FROM $payments_table WHERE $payments_table_type=$type and  $payments_table_status!='-1' ORDER BY $payments_table_date DESC";
            $result=$connection->query($sql);
       
            $result_list = array();
            if ($result != null) {
                while($row = mysqli_fetch_array($result)) {
                   $result_list[] = $row;
                }
            }

            return $result_list;
                

            }



            

    function get_all_currency(){
        /* Table variables */
        Global $meta_table;
        Global $meta_table_id;
        Global $meta_table_userid;
        Global $meta_table_name;
        Global $meta_table_type;
        Global $meta_table_value;
        Global $meta_table_registered;
        Global $meta_table_status;
        
         /* Database Connection */
         Global $connection;


            // sql query to create table
            $sql = "SELECT * FROM $meta_table WHERE $meta_table_type='currency'";
            $result=$connection->query($sql);
       
            $result_list = array();
            if ($result != null) {
                while($row = mysqli_fetch_array($result)) {
                   $result_list[] = $row;
                }
            }

            return $result_list;
                

            }



                       

            
    function get_all_desc(){
        /* Table variables */
        Global $meta_table;
        Global $meta_table_id;
        Global $meta_table_userid;
        Global $meta_table_name;
        Global $meta_table_type;
        Global $meta_table_value;
        Global $meta_table_registered;
        Global $meta_table_status;
        
         /* Database Connection */
         Global $connection;


            // sql query to create table
            $sql = "SELECT * FROM $meta_table WHERE $meta_table_type='payment_desc'";
            $result=$connection->query($sql);
       
            $result_list = array();
            if ($result != null) {
                while($row = mysqli_fetch_array($result)) {
                   $result_list[] = $row;
                }
            }

            return $result_list;
                

            }



   
            
    function get_value_currency($id){
        /* Table variables */
        Global $meta_table;
        Global $meta_table_id;
        Global $meta_table_userid;
        Global $meta_table_name;
        Global $meta_table_type;
        Global $meta_table_value;
        Global $meta_table_registered;
        Global $meta_table_status;
        
         /* Database Connection */
         Global $connection;


            // sql query to create table
            $sql = "SELECT * FROM $meta_table WHERE $meta_table_id=$id";
            $result=$connection->query($sql);
       
            $result_list = array();
            if ($result != null) {
                while($row = mysqli_fetch_array($result)) {
                   $result_list[] = $row;
                }
            }

            return $result_list;
                

            }




            

    function get_meta_name_by_id($id){
        /* Table variables */
        Global $meta_table;
        Global $meta_table_id;
        Global $meta_table_userid;
        Global $meta_table_name;
        Global $meta_table_type;
        Global $meta_table_value;
        Global $meta_table_registered;
        Global $meta_table_status;
        
         /* Database Connection */
         Global $connection;


            // sql query to create table
            $sql = "SELECT * FROM $meta_table WHERE $meta_table_id=$id";
            $result=$connection->query($sql);
       
            $result_list = array();
            if ($result != null) {
                while($row = mysqli_fetch_array($result)) {
                   $result_list[] = $row;
                }
            }

            return $result_list;
                

            }




  
            

    function get_meta_id_by_value($value){
        /* Table variables */
        Global $meta_table;
        Global $meta_table_id;
        Global $meta_table_userid;
        Global $meta_table_name;
        Global $meta_table_type;
        Global $meta_table_value;
        Global $meta_table_registered;
        Global $meta_table_status;
        
         /* Database Connection */
         Global $connection;


            // sql query to create table
            $sql = "SELECT * FROM $meta_table WHERE $meta_table_value='$value'";
            $result=$connection->query($sql);
       
            $result_list = array();
            if ($result != null) {
                while($row = mysqli_fetch_array($result)) {
                   $result_list[] = $row;
                }
            }

            return $result_list;
                

            }



            
   
            

    function get_all_meta(){
        /* Table variables */
        Global $meta_table;
        Global $meta_table_id;
        Global $meta_table_userid;
        Global $meta_table_name;
        Global $meta_table_type;
        Global $meta_table_value;
        Global $meta_table_registered;
        Global $meta_table_status;
        
         /* Database Connection */
         Global $connection;


            // sql query to create table
            $sql = "SELECT * FROM $meta_table";
            $result=$connection->query($sql);
       
            $result_list = array();
            if ($result != null) {
                while($row = mysqli_fetch_array($result)) {
                   $result_list[] = $row;
                }
            }

            return $result_list;
                

            }



  
            

    function get_all_dues(){
        /* Table variables */
        Global $meta_table;
        Global $meta_table_id;
        Global $meta_table_userid;
        Global $meta_table_name;
        Global $meta_table_type;
        Global $meta_table_value;
        Global $meta_table_registered;
        Global $meta_table_status;
        
         /* Database Connection */
         Global $connection;


            // sql query to create table
            $sql = "SELECT * FROM $meta_table WHERE $meta_table_type='dues_type'";
            $result=$connection->query($sql);
       
            $result_list = array();
            if ($result != null) {
                while($row = mysqli_fetch_array($result)) {
                   $result_list[] = $row;
                }
            }

            return $result_list;
                

            }



   
            

    function get_all_dues_data(){
        /* Table variables */
        Global $dues_table;
        Global $dues_table_id;
        Global $dues_table_type;
        Global $dues_table_value;
        Global $dues_table_currency;
        Global $dues_table_date;
        Global $dues_table_file_id;
        Global $dues_table_status;
        Global $dues_table_opp;
        Global $dues_table_number;
        Global $dues_table_userid; 
        
         /* Database Connection */
         Global $connection;


            // sql query to create table
            $sql = "SELECT * FROM $dues_table WHERE $dues_table_status!='-1' ORDER BY $dues_table_date DESC";
            $result=$connection->query($sql);
       
            $result_list = array();
            if ($result != null) {
                while($row = mysqli_fetch_array($result)) {
                   $result_list[] = $row;
                }
            }

            return $result_list;
                

            }




   
            

    function get_all_file_status(){
        /* Table variables */
        Global $meta_table;
        Global $meta_table_id;
        Global $meta_table_userid;
        Global $meta_table_name;
        Global $meta_table_type;
        Global $meta_table_value;
        Global $meta_table_registered;
        Global $meta_table_status;
        
         /* Database Connection */
         Global $connection;


            // sql query to create table
            $sql = "SELECT * FROM $meta_table WHERE $meta_table_type='file_status'";
            $result=$connection->query($sql);
       
            $result_list = array();
            if ($result != null) {
                while($row = mysqli_fetch_array($result)) {
                   $result_list[] = $row;
                }
            }

            return $result_list;
                

            }




  
            

    function get_all_opp_custom_file($file){
        /* Table variables */
        Global $opponents_table;
        Global $opponents_table_id;
        Global $opponents_table_file_id;
        Global $opponents_table_name;
        Global $opponents_table_ID_number;
        Global $opponents_table_note;
        Global $opponents_table_status;
        Global $opponents_table_registered;
         /* Database Connection */
         Global $connection;


            // sql query to create table
            $sql = "SELECT * FROM $opponents_table WHERE $opponents_table_file_id=$file and $opponents_table_status!='-1' ORDER BY $opponents_table_registered DESC";
            $result=$connection->query($sql);
       
            $result_list = array();
            if ($result != null) {
                while($row = mysqli_fetch_array($result)) {
                   $result_list[] = $row;
                }
            }

            return $result_list;
                

            }



   
            
    function get_opp_by_id($id){
        /* Table variables */
        Global $opponents_table;
        Global $opponents_table_id;
        Global $opponents_table_file_id;
        Global $opponents_table_name;
        Global $opponents_table_ID_number;
        Global $opponents_table_note;
        Global $opponents_table_status;
        Global $opponents_table_registered;
         /* Database Connection */
         Global $connection;


            // sql query to create table
            $sql = "SELECT * FROM $opponents_table WHERE $opponents_table_id=$id and $opponents_table_status!='-1' ORDER BY $opponents_table_registered DESC";
            $result=$connection->query($sql);
       
            $result_list = array();
            if ($result != null) {
                while($row = mysqli_fetch_array($result)) {
                   $result_list[] = $row;
                }
            }

            return $result_list;
                

            }

   
            

    function get_opp_by_file_id($id){
        /* Table variables */
        Global $opponents_table;
        Global $opponents_table_id;
        Global $opponents_table_file_id;
        Global $opponents_table_name;
        Global $opponents_table_ID_number;
        Global $opponents_table_note;
        Global $opponents_table_status;
        
         /* Database Connection */
         Global $connection;


            // sql query to create table
            $sql = "SELECT * FROM $opponents_table WHERE $opponents_table_file_id=$id and $opponents_table_status!='-1'  LIMIT 1";
            $result=$connection->query($sql);
       
            $result_list = array();
            if ($result != null) {
                while($row = mysqli_fetch_array($result)) {
                   $result_list[] = $row;
                }
            }

            return $result_list;
                

            }



   
            

    function get_opp(){
        /* Table variables */
        Global $opponents_table;
        Global $opponents_table_id;
        Global $opponents_table_file_id;
        Global $opponents_table_name;
        Global $opponents_table_ID_number;
        Global $opponents_table_note;
        Global $opponents_table_status;
        Global $opponents_table_registered;
         /* Database Connection */
         Global $connection;


            // sql query to create table
            $sql = "SELECT * FROM $opponents_table WHERE $opponents_table_status!='-1' ORDER BY $opponents_table_registered DESC";
            $result=$connection->query($sql);
       
            $result_list = array();
            if ($result != null) {
                while($row = mysqli_fetch_array($result)) {
                   $result_list[] = $row;
                }
            }

            return $result_list;
                

            }






            

    function get_logs(){
        /* Table variables */
        Global $log_table;
        Global $log_table_id;
        Global $log_table_userid;
        Global $log_table_desc;
        Global $log_table_date;
        Global $user_table;
        Global $user_table_id;
         /* Database Connection */
         Global $connection;


            // sql query to create table
            $sql = "SELECT * FROM $log_table  ORDER BY $log_table_date DESC";
            $result=$connection->query($sql);
       
            $result_list = array();
            if ($result != null) {
                while($row = mysqli_fetch_array($result)) {
                   $result_list[] = $row;
                }
            }

            return $result_list;
                

            }




            

    function get_all_file_data($file){
         /* Table variables */
         Global $file_table;
         Global $file_table_id;
         Global $file_table_client_id;
         Global $file_table_type;
         Global $file_table_number;
         Global $file_table_currency;
         Global $file_table_note;
         Global $file_table_registered;
         Global $file_table_status;
        
         /* Database Connection */
         Global $connection;


            // sql query to create table
            $sql = "SELECT * FROM $file_table WHERE $file_table_id=$file ORDER BY $file_table_registered DESC";
            $result=$connection->query($sql);
       
            $result_list = array();
            if ($result != null) {
                while($row = mysqli_fetch_array($result)) {
                   $result_list[] = $row;
                }
            }

            return $result_list;
                

            }




    
            

    function get_all_files_data(){
        /* Table variables */
        Global $file_table;
        Global $file_table_id;
        Global $file_table_client_id;
        Global $file_table_type;
        Global $file_table_number;
        Global $file_table_currency;
        Global $file_table_note;
        Global $file_table_registered;
        Global $file_table_status;
       
        /* Database Connection */
        Global $connection;


           // sql query to create table
           $sql = "SELECT * FROM $file_table WHERE $file_table_status!=0 ORDER BY $file_table_registered DESC";
           $result=$connection->query($sql);
      
           $result_list = array();
           if ($result != null) {
               while($row = mysqli_fetch_array($result)) {
                  $result_list[] = $row;
               }
           }

           return $result_list;
               

           }


        function   get_all_files_clients_currency($id,$type,$date1,$date2){
              /* Table variables */
        Global $file_table;
        Global $file_table_id;
        Global $file_table_client_id;
        Global $file_table_type;
        Global $file_table_number;
        Global $file_table_currency;
        Global $file_table_note;
        Global $file_table_registered;
        Global $file_table_status;
       
        /* Database Connection */
        Global $connection;


           // sql query to create table
          
           $sql = "SELECT * FROM $file_table WHERE $file_table_status!=0 and $file_table_client_id=$id and $file_table_currency=$type ORDER BY $file_table_registered DESC";
            if($date1!=null && $date2!=null && $date1!=$date2){
                $sql = "SELECT * FROM $file_table WHERE $file_table_status!=0 and $file_table_client_id=$id and $file_table_currency=$type and  DATE($file_table_registered) 
                >='$date1' AND  DATE($file_table_registered)<='$date2' ORDER BY $file_table_registered DESC";
            }
            if($date1==$date2 && $date1!=null){
                $sql = "SELECT * FROM $file_table WHERE $file_table_status!=0 and $file_table_client_id=$id and $file_table_currency=$type and DATE($file_table_registered)='$date1' ORDER BY $file_table_registered DESC";
            }
 
           $result=$connection->query($sql);
    
           
           
           $result_list = array();
           if ($result != null) {
               while($row = mysqli_fetch_array($result)) {
                  $result_list[] = $row;
               }
           }

           return $result_list;
               

        }





        function   get_client_files($id,$date1,$date2){
            /* Table variables */
      Global $file_table;
      Global $file_table_id;
      Global $file_table_client_id;
      Global $file_table_type;
      Global $file_table_number;
      Global $file_table_currency;
      Global $file_table_note;
      Global $file_table_registered;
      Global $file_table_status;
     
      /* Database Connection */
      Global $connection;

      $sql = "SELECT * FROM $file_table WHERE $file_table_status!=0 and $file_table_client_id=$id ORDER BY $file_table_registered DESC";

         // sql query to create table
         if($date1!=null && $date2!=null && $date1!=$date2){
          $sql = "SELECT * FROM $file_table WHERE $file_table_status!=0 and $file_table_client_id=$id  and  DATE($file_table_registered) 
          >='$date1' AND  DATE($file_table_registered)<='$date2' ORDER BY $file_table_registered DESC";
         }
           if($date1==$date2 && $date1!=null){
              $sql = "SELECT * FROM $file_table WHERE $file_table_status!=0 and $file_table_client_id=$id and DATE($file_table_registered)='$date1' ORDER BY $file_table_registered DESC";
          }
         $result=$connection->query($sql);
  
         
         
         $result_list = array();
         if ($result != null) {
             while($row = mysqli_fetch_array($result)) {
                $result_list[] = $row;
             }
         }

         return $result_list;
             

      }



      function   get_client_files_currency($c,$id,$date1,$date2){
        /* Table variables */
  Global $file_table;
  Global $file_table_id;
  Global $file_table_client_id;
  Global $file_table_type;
  Global $file_table_number;
  Global $file_table_currency;
  Global $file_table_note;
  Global $file_table_registered;
  Global $file_table_status;
 
  /* Database Connection */
  Global $connection;


     // sql query to create table
     $sql = "SELECT * FROM $file_table WHERE $file_table_currency=$c and $file_table_status!=0 and $file_table_client_id=$id ORDER BY $file_table_registered DESC";

        if($date1!=$date2 && $date1!=null && $date2!=null){
            $sql = "SELECT * FROM $file_table WHERE $file_table_currency=$c and $file_table_status!=0 and $file_table_client_id=$id  and  DATE($file_table_registered) 
            >='$date1' AND  DATE($file_table_registered)<='$date2' ORDER BY $file_table_registered DESC";
        }
     
      if($date1==$date2 && $date1!=null && $date2!=null){
          $sql = "SELECT * FROM $file_table WHERE $file_table_currency=$c and $file_table_status!=0 and $file_table_client_id=$id and DATE($file_table_registered)='$date1' ORDER BY $file_table_registered DESC";
      } 
       
     $result=$connection->query($sql);

     
     
     $result_list = array();
     if ($result != null) {
         while($row = mysqli_fetch_array($result)) {
            $result_list[] = $row;
         }
     }

     return $result_list;
         

  }





    
  

    function user_check($email,$password){
        /* Table variables */
        Global $user_table;
        Global $user_table_id;
        Global $user_table_login;
        Global $user_table_pass;
        Global $user_table_nicename;
        Global $user_table_email;
        Global $user_table_registered;
        Global $user_table_type;
        Global $user_table_status;
       
        /* Database Connection */
        Global $connection;

            // sql query to create table
           $sql = "SELECT * FROM $user_table WHERE $user_table_email='$email' and $user_table_pass='$password' and $user_table_status='0'";
        
           $result=$connection->query($sql);

           
           $result_list = array();
           if ($result != null) {
               while($row = mysqli_fetch_array($result)) {
                  $result_list[] = $row;
               }
           }

           return $result_list;
               

           }



     
           

    function user_check_status($id){
        /* Table variables */
        Global $user_table;
        Global $user_table_id;
        Global $user_table_login;
        Global $user_table_pass;
        Global $user_table_nicename;
        Global $user_table_email;
        Global $user_table_registered;
        Global $user_table_type;
        Global $user_table_status;
       
        /* Database Connection */
        Global $connection;

            // sql query to create table
           $sql = "SELECT * FROM $user_table WHERE $user_table_id='$id' and $user_table_status=0";
           $result=$connection->query($sql);
      
           $result_list = array();
           if ($result != null) {
               while($row = mysqli_fetch_array($result)) {
                  $result_list[] = $row;
               }
           }else{
               return false;
           }

           return $result_list;
               

           }





      
           
    function check_currency_rate($date,$id){
        /* Table variables */
        Global $currency_table;
        Global $currency_table_id;
        Global $currency_table_type;
        Global $currency_table_value;
        Global $currency_table_date;
       
        /* Database Connection */
        Global $connection;

            // sql query to create table
           $sql = "SELECT * FROM $currency_table WHERE $currency_table_date='$date' and $currency_table_type='$id'";
           $result=$connection->query($sql);
      
           $result_list = array();
           if ($result != null ) {
               while($row = mysqli_fetch_array($result)) {
                  $result_list[] = $row;
                  return $result_list;
               }
           }else{
               return false;
           }

           
               

           }





           

    
           
    function add_opponent($name,$id_number,$file,$note){
        /* Table variables */
        Global $opponents_table;
        Global $opponents_table_id;
        Global $opponents_table_file_id;
        Global $opponents_table_name;
        Global $opponents_table_ID_number;
        Global $opponents_table_note;
        Global $opponents_table_status;
        Global $opponents_table_userid;
         /* Database Connection */
         Global $connection;

            $userid=$_SESSION['userid'];
            // sql query to create table
            if($id_number==null){
                $id_number='null';
            }
            
            $sql = "INSERT INTO $opponents_table ($opponents_table_userid,$opponents_table_name,$opponents_table_file_id,$opponents_table_ID_number,$opponents_table_note) 
                    VALUES ('$userid','$name', $file, $id_number,'$note')";

            if($connection->query($sql)){
                CreateTables::add_log($_SESSION['userid'],'اضافة خصم جديد باسم '.$name);

                Global $notify;
                $notify = "opponent_added";
            }else{
               
                Global $notify;
                $notify = "opponent_error";
                echo $connection->error;
            }
         

    }


    
    
    function update_opponent($opp_id,$name,$id_number,$note){
        /* Table variables */
        Global $opponents_table;
        Global $opponents_table_id;
        Global $opponents_table_file_id;
        Global $opponents_table_name;
        Global $opponents_table_ID_number;
        Global $opponents_table_note;
        Global $opponents_table_status;
        
         /* Database Connection */
         Global $connection;


           // sql query to create table
           $sql = "UPDATE  $opponents_table SET  $opponents_table_name='$name',$opponents_table_ID_number='$id_number',$opponents_table_note='$note' WHERE $opponents_table_id=$opp_id";
                        
           if($connection->query($sql)){
              
               Global $notify;
               $notify = "opp_updated";
           }else{
              
               Global $notify;
               $notify = "opp_error";
           }
         

    }



   
    
    function add_user($username,$password,$email,$nicename,$type){
        /* Table variables */
        Global $user_table;
        Global $user_table_id;
        Global $user_table_login;
        Global $user_table_pass;
        Global $user_table_nicename;
        Global $user_table_email;
        Global $user_table_registered;
        Global $user_table_type;
        Global $user_table_status;
        
         /* Database Connection */
         Global $connection;


            // sql query to create table
            $sql = "INSERT INTO $user_table ($user_table_login,$user_table_pass,$user_table_email,$user_table_nicename,$user_table_type) 
                    VALUES ('$username', '$password', '$email','$nicename','$type')";
            if($connection->query($sql)){
               
                Global $notify;
                $notify = "user_added";
            }else{
               
                Global $notify;
                $notify = "user_error";
                echo $connection->error;
            }
         

    }



      
    
    function update_user($id,$username,$email,$nicename,$type,$status){
        /* Table variables */
        Global $user_table;
        Global $user_table_id;
        Global $user_table_login;
        Global $user_table_pass;
        Global $user_table_nicename;
        Global $user_table_email;
        Global $user_table_registered;
        Global $user_table_type;
        Global $user_table_status;
        
         /* Database Connection */
         Global $connection;


           // sql query to create table
            $sql = "UPDATE  $user_table SET  $user_table_status='$status',$user_table_login='$username',$user_table_nicename='$nicename',$user_table_email='$email',$user_table_type='$type' WHERE $user_table_id=$id";
                        
            if($connection->query($sql)){
               
                Global $notify;
                $notify = "user_updated";
            }else{
               
                Global $notify;
                $notify = "update_error";
            }
         

    }



     
    
    function update_user_profile($id,$username,$email,$nicename){
        /* Table variables */
        Global $user_table;
        Global $user_table_id;
        Global $user_table_login;
        Global $user_table_pass;
        Global $user_table_nicename;
        Global $user_table_email;
        Global $user_table_registered;
        Global $user_table_type;
        Global $user_table_status;
        
         /* Database Connection */
         Global $connection;


           // sql query to create table
            $sql = "UPDATE  $user_table SET  $user_table_login='$username',$user_table_nicename='$nicename',$user_table_email='$email' WHERE $user_table_id=$id";
                        
            if($connection->query($sql)){
               
                Global $notify;
                $notify = "user_updated";
            }else{
               
                Global $notify;
                $notify = "update_error";
            }
         

    }




     
    
    function update_user_password($id,$password){
        /* Table variables */
        Global $user_table;
        Global $user_table_id;
        Global $user_table_login;
        Global $user_table_pass;
        Global $user_table_nicename;
        Global $user_table_email;
        Global $user_table_registered;
        Global $user_table_type;
        Global $user_table_status;
        
         /* Database Connection */
         Global $connection;


           // sql query to create table
            $sql = "UPDATE  $user_table SET  $user_table_pass='$password' WHERE $user_table_id=$id";
                        
            if($connection->query($sql)){
               
                Global $notify;
                $notify = "user_updated";
            }else{
               
                Global $notify;
                $notify = "update_error";
            }
         

    }

     
    
    function add_dues($number,$type,$value,$currency,$date,$file_id,$opp){
        /* Table variables */
        Global $dues_table;
        Global $dues_table_id;
        Global $dues_table_type;
        Global $dues_table_value;
        Global $dues_table_currency;
        Global $dues_table_date;
        Global $dues_table_file_id;
        Global $dues_table_status;
        Global $dues_table_opp;
        Global $dues_table_number;
        Global $dues_table_userid; 
        Global $meta_table_name;
        Global $meta_table_value;
         /* Database Connection */
         Global $connection;
         $value=round($value,2);
                $userid=$_SESSION['userid'];
            // sql query to create table
            $sql = "INSERT INTO $dues_table ($dues_table_userid,$dues_table_number,$dues_table_type,$dues_table_value,$dues_table_currency,$dues_table_date,$dues_table_file_id,$dues_table_opp) 
                    VALUES ($userid,'$number',$type, $value, $currency,'$date',$file_id,$opp)";
 
            if($connection->query($sql)){
                $types=CreateTables::get_meta_name_by_id($type);
                if($types[0][$meta_table_value]!='stamp' && $types[0][$meta_table_value]!='fees'){
                    CreateTables::update_due_file($value,$currency,$file_id);
                    CreateTables::add_log($_SESSION['userid'],'اضافة مستحق من نوع طوابع او رسوم');
                    return true;
                }
                CreateTables::add_log($_SESSION['userid'],'اضافة مستحق');
                return true;
                
            }else{
             
                Global $notify;
                $notify = "due_error";
                echo $connection->error;
            }
         

    }


   
    
    function update_dues($date,$value,$id,$file,$currency){
        /* Table variables */
        Global $dues_table;
        Global $dues_table_id;
        Global $dues_table_type;
        Global $dues_table_value;
        Global $dues_table_currency;
        Global $dues_table_date;
        Global $dues_table_file_id;
        Global $dues_table_status;
        Global $dues_table_opp;
        Global $currency_table_id;
        Global $currency_table_type;
        Global $currency_table_value;
        Global $currency_table_date;

        Global $file_table;
        Global $file_table_id;
        Global $file_table_client_id;
        Global $file_table_type;
        Global $file_table_number;
        Global $file_table_currency;
        Global $file_table_due;
        Global $file_table_paid;
        Global $file_table_note;
        Global $file_table_paid_out;
        Global $file_table_registered;
        Global $file_table_status;
        Global $meta_table_id;
        Global $meta_table_userid;
        Global $meta_table_name;
        Global $meta_table_type;
        Global $meta_table_value;
        Global $meta_table_registered;
        Global $meta_table_status;
        Global $user_table;
         /* Database Connection */
         Global $connection;
         $file_data=CreateTables::get_all_file_data($file);
         $current_file_due_value=$file_data[0][$file_table_due];
         $current_due=CreateTables::get_dues_by_id($id);
         $date= date('Y-m-d', strtotime($date));

         $currecny_file=CreateTables::get_value_currency($file_data[0][$file_table_currency]);
         $currecny_due=CreateTables::get_value_currency($currency);
                if($currecny_due[0][$meta_table_value]!=$currecny_file[0][$meta_table_value]){
                    if($currecny_due[0][$meta_table_value]=='JOD' && $currecny_file[0][$meta_table_value]=='USD'){

                 
                    $convert=  convertCurrency($currecny_due[0][$meta_table_value],$date);

                    
                   
                    $new= $value/$convert;
                    $current_due_val=$current_due[0][$dues_table_value]/$convert;
                    
                    if($new>$current_due_val){
                        $new=$new- $current_due_val;
                       
                        $current_file_due_value=$current_file_due_value+$new;
                    }else{
                        $new= $current_due_val-$new;
                        $current_file_due_value=$current_file_due_value-$new;
                        if($current_file_due_value<0){
                            $current_file_due_value=0;
                        }
                    }
                   
                    }else if($currecny_due[0][$meta_table_value]=='ILS' && $currecny_file[0][$meta_table_value]=='USD'){
                    
                          
                    $convert=  convertCurrency($currecny_due[0][$meta_table_value],$date);
                        
                    
                   
                    $new= $value/$convert;
                    $current_due_val=$current_due[0][$dues_table_value]/$convert;
                   
                    if($new>$current_due_val){
                        $new=$new- $current_due_val;
                       
                        $current_file_due_value=$current_file_due_value+$new;
                    }else{
                        $new= $current_due_val-$new;
                        $current_file_due_value=$current_file_due_value-$new;
                        if($current_file_due_value<0){
                            $current_file_due_value=0;
                        }
                    }
                        
                    }else if($currecny_due[0][$meta_table_value]=='USD' && $currecny_file[0][$meta_table_value]=='JOD'){
                      
                        $convert=  convertCurrency($currecny_file[0][$meta_table_value],$date);
                        
                                       
                    $new= $value*$convert;
                    $current_due_val=$current_due[0][$dues_table_value]*$convert;
                   
                    if($new>$current_due_val){
                        $new=$new- $current_due_val;
                       
                        $current_file_due_value=$current_file_due_value+$new;
                    }else{
                        $new= $current_due_val-$new;
                        $current_file_due_value=$current_file_due_value-$new;
                        if($current_file_due_value<0){
                            $current_file_due_value=0;
                        }
                    }
                    }else if($currecny_due[0][$meta_table_value]=='USD' && $currecny_file[0][$meta_table_value]=='ILS'){
                        $convert=  convertCurrency($currecny_file[0][$meta_table_value],$date);
                        
                                       
                        $new= $value*$convert;
                        $current_due_val=$current_due[0][$dues_table_value]*$convert;
                       
                        if($new>$current_due_val){
                            $new=$new- $current_due_val;
                           
                            $current_file_due_value=$current_file_due_value+$new;
                        }else{
                            $new= $current_due_val-$new;
                            $current_file_due_value=$current_file_due_value-$new;
                            if($current_file_due_value<0){
                                $current_file_due_value=0;
                            }
                        }
                    }else if($currecny_due[0][$meta_table_value]=='JOD' && $currecny_file[0][$meta_table_value]=='ILS'){
                       
                        $convert=  convertCurrency($currecny_due[0][$meta_table_value],$date);
                      
                        $new= $value/$convert;
                        $current_due_val=$current_due[0][$dues_table_value]/$convert;
                        $convert=  convertCurrency($currecny_file[0][$meta_table_value]);
                        $new= $new*$convert;
                        $current_due_val=$current_due_val*$convert;
                        if($new>$current_due_val){
                            $new=$new- $current_due_val;
                           
                            $current_file_due_value=$current_file_due_value+$new;
                        }else{
                            $new= $current_due_val-$new;
                            $current_file_due_value=$current_file_due_value-$new;
                            if($current_file_due_value<0){
                                $current_file_due_value=0;
                            }
                        }
                      
                    }else if($currecny_due[0][$meta_table_value]=='ILS' && $currecny_file[0][$meta_table_value]=='JOD'){
                        $convert=  convertCurrency($currecny_file[0][$meta_table_value],$date);
                        
                        $new= $value/$convert;
                        $current_due_val=$current_due[0][$dues_table_value]/$convert;
                        $convert=  convertCurrency($currecny_due[0][$meta_table_value]);
                        $new= $new*$convert;
                        $current_due_val=$current_due_val*$convert;
                        if($new>$current_due_val){
                            $new=$new- $current_due_val;
                           
                            $current_file_due_value=$current_file_due_value+$new;
                        }else{
                            $new= $current_due_val-$new;
                            $current_file_due_value=$current_file_due_value-$new;
                            if($current_file_due_value<0){
                                $current_file_due_value=0;
                            }
                        }
                        
                    }
                
            }else{
                $new=$value;
                $current_due_val=$current_due[0][$dues_table_value];
                if($new>$current_due_val){
                    $new=$value- $current_due_val;
                   
                    $current_file_due_value=$current_file_due_value+$new;
                }else{
                    $new= $current_due_val-$new;
                    $current_file_due_value=$current_file_due_value-$new;
                    if($current_file_due_value<0){
                        $current_file_due_value=0;
                    }
            }
             
        }
            // sql query to create table
            $sql = "UPDATE $file_table SET  $file_table_due='$current_file_due_value' WHERE  $file_table_id='$file'";
 
            if($connection->query($sql)){
                Global $notify;
                $notify = "due_updated";
            }else{
                Global $notify;
                $notify = "error_due";
            }
            // sql query to create table
            $sql = "UPDATE $dues_table SET  $dues_table_value='$value' WHERE  $dues_table_id='$id'";
 
            if($connection->query($sql)){
                Global $notify;
                $notify = "due_updated";
            }else{
                Global $notify;
                $notify = "error_due";
            }

         

    }




    
    
    function update_payment_fu($id,$number){
        /* Table variables */
  
        Global $payments_table;
        Global $payments_table_id;
        Global $payments_table_type;
        Global $payments_table_number;
        Global $payments_table_value;
        Global $payments_table_currency;
        Global $payments_table_date;
        Global $payments_table_file_id;
        Global $payments_table_status;
        Global $payments_table_check;

        Global $connection;
        $sql = "UPDATE $payments_table SET  $payments_table_status='1',$payments_table_number='$number' WHERE  $payments_table_id='$id'";
            

        if($connection->query($sql)){
           CreateTables::add_log($_SESSION['userid'],'تحديث دفعة أجلة');

            Global $notify;
            $notify = "payment_updated";
        }else{
            Global $notify;
            $notify = "error_payment";
        }

    }

    
    

    function update_payment($id,$file_id,$payment_currency,$payment_value,$date,$payment_type){
        /* Table variables */
  
        Global $payments_table;
        Global $payments_table_id;
        Global $payments_table_type;
        Global $payments_table_number;
        Global $payments_table_value;
        Global $payments_table_currency;
        Global $payments_table_date;
        Global $payments_table_file_id;
        Global $payments_table_status;
        Global $currency_table_id;
        Global $currency_table_type;
        Global $currency_table_value;
        Global $currency_table_date;

        Global $file_table;
        Global $file_table_id;
        Global $file_table_client_id;
        Global $file_table_type;
        Global $file_table_number;
        Global $file_table_currency;
        Global $file_table_due;
        Global $file_table_paid;
        Global $file_table_note;
        Global $file_table_paid_out;
        Global $file_table_registered;
        Global $file_table_status;
        Global $meta_table_id;
        Global $meta_table_userid;
        Global $meta_table_name;
        Global $meta_table_type;
        Global $meta_table_value;
        Global $meta_table_registered;
        Global $meta_table_status;
        Global $user_table;
         /* Database Connection */
         Global $connection;
         $file_data=CreateTables::get_all_file_data($file_id);
        
         $current_file_payment_out_value=1;
         $current_payment=CreateTables::get_payment_by_id($id);
         $date= date('Y-m-d', strtotime($date));
        $value=$payment_value;
         $currecny_file=CreateTables::get_value_currency($file_data[0][$file_table_currency]);
         $currecny_payment=CreateTables::get_value_currency($current_payment[0][$payments_table_currency]);
         $payment_types=CreateTables::get_value_currency($payment_type);
         $current_file_payment_value=$file_data[0][$file_table_paid];
         if($payment_types[0][$meta_table_value]=='out'){
            $current_file_payment_value=$file_data[0][$file_table_paid_out];
         }

                if($currecny_payment[0][$meta_table_value]!=$currecny_file[0][$meta_table_value]){
                    if($currecny_payment[0][$meta_table_value]=='JOD' && $currecny_file[0][$meta_table_value]=='USD'){

                 
                    $convert=  convertCurrency($currecny_payment[0][$meta_table_value],$date);

                    
                   
                    $new= $value/$convert;
                    $current_payment_val=$current_payment[0][$payments_table_value]/$convert;
                    
                    if($new>$current_payment_val){
                        $new=$new- $current_payment_val;
                        $current_file_payment_value=$current_file_payment_value+$new;
                       
                    }else{
                        $new= $current_payment_val-$new;
                        $current_file_payment_value=$current_file_payment_value-$new;
                        if($current_file_payment_value<0){
                            $current_file_payment_value=0;
                         }
                       
                    }
                   
                    }else if($currecny_payment[0][$meta_table_value]=='ILS' && $currecny_file[0][$meta_table_value]=='USD'){
                    
                          
                    $convert=  convertCurrency($currecny_payment[0][$meta_table_value],$date);
                        
                    
                   
                    $new= $value/$convert;
                    $current_payment_val=$current_payment[0][$payments_table_value]/$convert;
                   
                    if($new>$current_payment_val){
                        $new=$new- $current_payment_val;
                        $current_file_payment_value=$current_file_payment_value+$new;
                      
                    }else{
                        $new= $current_payment_val-$new;
                        $current_file_payment_value=$current_file_payment_value-$new;
                        if($current_file_payment_value<0){
                            $current_file_payment_value=0;
                        }
                        
                    }
                        
                    }else if($currecny_payment[0][$meta_table_value]=='USD' && $currecny_file[0][$meta_table_value]=='JOD'){
                      
                        $convert=  convertCurrency($currecny_file[0][$meta_table_value],$date);
                        
                                       
                    $new= $value*$convert;
                    $current_payment_val=$current_payment[0][$payments_table_value]*$convert;
                   
                    if($new>$current_payment_val){
                        $new=$new- $current_payment_val;
                        $current_file_payment_value=$current_file_payment_value+$new;
                       
                    }else{
                        $new= $current_payment_val-$new;
                        $current_file_payment_value=$current_file_payment_value-$new;
                        if($current_file_payment_value<0){
                            $current_file_payment_value=0;
                        }
                        
                    }
                    }else if($currecny_payment[0][$meta_table_value]=='USD' && $currecny_file[0][$meta_table_value]=='ILS'){
                        $convert=  convertCurrency($currecny_file[0][$meta_table_value],$date);
                        
                                       
                        $new= $value*$convert;
                        $current_payment_val=$current_payment[0][$payments_table_value]*$convert;
                       
                        if($new>$current_payment_val){
                            $new=$new- $current_payment_val;
                            $current_file_payment_value=$current_file_payment_value+$new;
                            
                        }else{
                            $new= $current_payment_val-$new;
                            $current_file_payment_value=$current_file_payment_value-$new;
                            if($current_file_payment_value<0){
                                $current_file_payment_value=0;
                            }
                            
                        }
                    }else if($currecny_payment[0][$meta_table_value]=='JOD' && $currecny_file[0][$meta_table_value]=='ILS'){
                       
                        $convert=  convertCurrency($currecny_payment[0][$meta_table_value],$date);
                      
                        $new= $value/$convert;
                        $current_payment_val=$current_payment[0][$payments_table_value]/$convert;
                        $convert=  convertCurrency($currecny_file[0][$meta_table_value]);
                        $new= $new*$convert;
                        $current_payment_val=$current_payment_val*$convert;
                        if($new>$current_payment_val){
                            $new=$new- $current_payment_val;
                            $current_file_payment_value=$current_file_payment_value+$new;
                            
                        }else{
                            $new= $current_payment_val-$new;
                            $current_file_payment_value=$current_file_payment_value-$new;
                           
                            if($current_file_payment_value<0){
                                $current_file_payment_value=0;
                            }
                            
                        }
                      
                    }else if($currecny_payment[0][$meta_table_value]=='ILS' && $currecny_file[0][$meta_table_value]=='JOD'){
                        $convert=  convertCurrency($currecny_file[0][$meta_table_value],$date);
                        
                        $new= $value/$convert;
                        $current_payment_val=$current_payment[0][$payments_table_value]/$convert;
                        $convert=  convertCurrency($currecny_payment[0][$meta_table_value]);
                        $new= $new*$convert;
                        $current_payment_val=$current_payment_val*$convert;
                        if($new>$current_payment_val){
                            $new=$new- $current_payment_val;
                            $current_file_payment_value=$current_file_payment_value+$new;
                            
                        }else{
                            $new= $current_payment_val-$new;
                            $current_file_payment_value=$current_file_payment_value-$new;
                            if($current_file_payment_value<0){
                                $current_file_payment_value=0;
                            }
                           
                        }
                        
                    }
                
            }else{
                $new=$value;
                $current_payment_val=$current_payment[0][$payments_table_value];
                if($new>$current_payment_val){
                    $new=$value- $current_payment_val;
                    $current_file_payment_value=$current_file_payment_value+$new;
                  
                }else{
                    $new= $current_file_payment_value-$new;
                    $current_file_payment_value=$current_file_payment_value-$new;
                    if($current_file_payment_value<0){
                        $current_file_payment_value=0;
                    }
                    
            }
             
        }
            // sql query to create table
            if($payment_types[0][$meta_table_value]=="In"){
                $sql = "UPDATE $file_table SET  $file_table_paid='$current_file_payment_value' WHERE  $file_table_id='$file_id'";
            

                if($connection->query($sql)){
                    CreateTables::add_log($_SESSION['userid'],'تحديث الدفعات الداخلة للملف رقم '.$file_table[0][$file_table_number]);

                    Global $notify;
                    $notify = "payment_updated";
                }else{
                    Global $notify;
                    $notify = "error_payment";
                }

            }
            if($payment_types[0][$meta_table_value]=="out"){
                $sql = "UPDATE $file_table SET  $file_table_paid_out='$current_file_payment_value' WHERE  $file_table_id='$file_id'";
            

                if($connection->query($sql)){
                    CreateTables::add_log($_SESSION['userid'],'تحديث الدفعات الخارجة للملف رقم '.$file_table[0][$file_table_number]);

                    Global $notify;
                    $notify = "payment_updated";
                }else{
                    Global $notify;
                    $notify = "error_payment";
                }

            }
            // sql query to create table
            $sql = "UPDATE $payments_table SET  $payments_table_value='$payment_value' WHERE  $payments_table_id='$id'";

            if($connection->query($sql)){
                CreateTables::add_log($_SESSION['userid'],'تحديث الدفعة رقم  '.$current_payment[0][$payments_table_number]);
                Global $notify;
                $notify = "payment_updated";
            }else{
                Global $notify;
                $notify = "error_payment";
            }

         

    }





     
    
    function update_payment_out($id,$file_id,$payment_currency,$payment_value,$date,$payment_type){
        /* Table variables */
         
        Global $payments_table;
        Global $payments_table_id;
        Global $payments_table_type;
        Global $payments_table_number;
        Global $payments_table_value;
        Global $payments_table_currency;
        Global $payments_table_date;
        Global $payments_table_file_id;
        Global $payments_table_status;
        Global $currency_table_id;
        Global $currency_table_type;
        Global $currency_table_value;
        Global $currency_table_date;

        Global $file_table;
        Global $file_table_id;
        Global $file_table_client_id;
        Global $file_table_type;
        Global $file_table_number;
        Global $file_table_currency;
        Global $file_table_due;
        Global $file_table_paid;
        Global $file_table_note;
        Global $file_table_paid_out;
        Global $file_table_registered;
        Global $file_table_status;
        Global $meta_table_id;
        Global $meta_table_userid;
        Global $meta_table_name;
        Global $meta_table_type;
        Global $meta_table_value;
        Global $meta_table_registered;
        Global $meta_table_status;
        Global $user_table;
         /* Database Connection */
         Global $connection;
       
         $file_data=CreateTables::get_all_file_data($file_id);
         $current_file_payment_value=$file_data[0][$file_table_paid_out];
         $current_file_payment_out_value=1;
         $current_payment=CreateTables::get_payment_by_id($id);
         $date= date('Y-m-d', strtotime($date));
        $value=$payment_value;
         $currecny_file=CreateTables::get_value_currency($file_data[0][$file_table_currency]);
         $currecny_payment=CreateTables::get_value_currency($current_payment[0][$payments_table_currency]);
         $payment_types=CreateTables::get_value_currency($payment_type);

                if($currecny_payment[0][$meta_table_value]!=$currecny_file[0][$meta_table_value]){
                    if($currecny_payment[0][$meta_table_value]=='JOD' && $currecny_file[0][$meta_table_value]=='USD'){

                 
                    $convert=  convertCurrency($currecny_payment[0][$meta_table_value],$date);

                    
                   
                    $new= $value/$convert;
                    $current_payment_val=$current_payment[0][$payments_table_value]/$convert;
                    
                    if($new>$current_payment_val){
                        $new=$new- $current_payment_val;
                       
                        $current_file_payment_value=$current_file_payment_value+$new;
                        
                    }else{
                        $new= $current_payment_val-$new;
            
                        $current_file_payment_value=$current_file_payment_value-$new;
                        if($current_file_payment_value<0){
                            $current_file_payment_value=0;
                         }
                        
                        }
                   
                    }else if($currecny_payment[0][$meta_table_value]=='ILS' && $currecny_file[0][$meta_table_value]=='USD'){
                    
                          
                    $convert=  convertCurrency($currecny_payment[0][$meta_table_value],$date);
                        
                    
                   
                    $new= $value/$convert;
                    $current_payment_val=$current_payment[0][$payments_table_value]/$convert;
                   
                    if($new>$current_payment_val){
                        $new=$new- $current_payment_val;
                         
                        $current_file_payment_value=$current_file_payment_value+$new;
                         
                    }else{
                        $new= $current_payment_val-$new;
                        
                        $current_file_payment_value=$current_file_payment_value-$new;
                        if($current_file_payment_value<0){
                            $current_file_payment_value=0;
                            }
                        
                    }
                        
                    }else if($currecny_payment[0][$meta_table_value]=='USD' && $currecny_file[0][$meta_table_value]=='JOD'){
                      
                        $convert=  convertCurrency($currecny_file[0][$meta_table_value],$date);
                        
                                       
                    $new= $value*$convert;
                    $current_payment_val=$current_payment[0][$payments_table_value]*$convert;
                   
                    if($new>$current_payment_val){
                        $new=$new- $current_payment_val;
                       
                        $current_file_payment_value=$current_file_payment_value+$new;
                        
                    }else{
                        $new= $current_payment_val-$new;
                      
                        $current_file_payment_value=$current_file_payment_value-$new;
                        if($current_file_payment_value<0){
                            $current_file_payment_value=0;
                        }
                        
                    }
                    }else if($currecny_payment[0][$meta_table_value]=='USD' && $currecny_file[0][$meta_table_value]=='ILS'){
                        $convert=  convertCurrency($currecny_file[0][$meta_table_value],$date);
                        
                                       
                        $new= $value*$convert;
                        $current_payment_val=$current_payment[0][$payments_table_value]*$convert;
                       
                        if($new>$current_payment_val){
                            $new=$new- $current_payment_val;
                           
                            $current_file_payment_value=$current_file_payment_value+$new;
                           
                        }else{
                            $new= $current_payment_val-$new;
                          
                            $current_file_payment_value=$current_file_payment_value-$new;
                            if($current_file_payment_value<0){
                                $current_file_payment_value=0;
                            }
                           
                        }
                    }else if($currecny_payment[0][$meta_table_value]=='JOD' && $currecny_file[0][$meta_table_value]=='ILS'){
                       
                        $convert=  convertCurrency($currecny_payment[0][$meta_table_value],$date);
                      
                        $new= $value/$convert;
                        $current_payment_val=$current_payment[0][$payments_table_value]/$convert;
                        $convert=  convertCurrency($currecny_file[0][$meta_table_value]);
                        $new= $new*$convert;
                        $current_payment_val=$current_payment_val*$convert;
                        if($new>$current_payment_val){
                            $new=$new- $current_payment_val;
                            
                            $current_file_payment_value=$current_file_payment_value+$new;
                             
                        }else{
                            $new= $current_payment_val-$new;
                           
                            $current_file_payment_value=$current_file_payment_value-$new;
                           
                            if($current_file_payment_value<0){
                                $current_file_payment_value=0;
                            }
                            
                        }
                      
                    }else if($currecny_payment[0][$meta_table_value]=='ILS' && $currecny_file[0][$meta_table_value]=='JOD'){
                        $convert=  convertCurrency($currecny_file[0][$meta_table_value],$date);
                        
                        $new= $value/$convert;
                        $current_payment_val=$current_payment[0][$payments_table_value]/$convert;
                        $convert=  convertCurrency($currecny_payment[0][$meta_table_value]);
                        $new= $new*$convert;
                        $current_payment_val=$current_payment_val*$convert;
                        if($new>$current_payment_val){
                            $new=$new- $current_payment_val;
                            
                            $current_file_payment_value=$current_file_payment_value+$new;
                            
                        }else{
                            $new= $current_payment_val-$new;
                            
                            $current_file_payment_value=$current_file_payment_value-$new;
                            if($current_file_payment_value<0){
                                $current_file_payment_value=0;
                            }
                             
                        }
                        
                    }
                
            }else{
                $new=$value;
                $current_payment_val=$current_payment[0][$payments_table_value];
                if($new>$current_payment_val){
                    $new=$value- $current_payment_val;
                    
                    $current_file_payment_value=$current_file_payment_value+$new;
                    
                }else{
                    $new= $current_file_payment_value-$new;
                    
                    $current_file_payment_value=$current_file_payment_value-$new;
                    if($current_file_payment_value<0){
                        $current_file_payment_value=0;
                    }
                     
            }
             
        }
            // sql query to create table
            if($payment_types[0][$meta_table_value]=="out"){
                $sql = "UPDATE $file_table SET  $file_table_paid_out='$current_file_payment_value' WHERE  $file_table_id='$file_id'";
            

                if($connection->query($sql)){
                    CreateTables::add_log($_SESSION['userid'],'تحديث الدفعة الخارجة للملف رقم '.$file_data[0][$file_table_number]);

                    Global $notify;
                    $notify = "payment_updated";
                }else{
                    Global $notify;
                    $notify = "error_payment";
                }

            }
            // sql query to create table
            $sql = "UPDATE $payments_table SET  $payments_table_value='$payment_value' WHERE  $payments_table_id='$id'";

            if($connection->query($sql)){
                Global $notify;
                $notify = "payment_updated";
            }else{
                Global $notify;
                $notify = "error_payment";
            }
         

    }


     
    

    function delete_due($id,$file_id,$payment_currency,$payment_value,$date){
        /* Table variables */
         
        Global $dues_table;
        Global $dues_table_id;
        Global $dues_table_type;
        Global $dues_table_userid;
        Global $dues_table_value;
        Global $dues_table_currency;
        Global $dues_table_date;
        Global $dues_table_file_id;
        Global $dues_table_registerd;
        Global $dues_table_status;
        Global $dues_table_opp;
        Global $currency_table_id;
        Global $currency_table_type;
        Global $currency_table_value;
        Global $currency_table_date;

        Global $file_table;
        Global $file_table_id;
        Global $file_table_client_id;
        Global $file_table_type;
        Global $file_table_number;
        Global $file_table_currency;
        Global $file_table_due;
        Global $file_table_paid;
        Global $file_table_note;
        Global $file_table_paid_out;
        Global $file_table_registered;
        Global $file_table_status;
        Global $meta_table_id;
        Global $meta_table_userid;
        Global $meta_table_name;
        Global $meta_table_type;
        Global $meta_table_value;
        Global $meta_table_registered;
        Global $meta_table_status;
        Global $user_table;
         /* Database Connection */
         Global $connection;
         $file_data=CreateTables::get_all_file_data($file_id);
         $current_file_payment_value=$file_data[0][$file_table_due];

         $date= date('Y-m-d', strtotime($date));
         $current_payment_val =$payment_value;
         $currecny_file=CreateTables::get_value_currency($file_data[0][$file_table_currency]);
         $currecny_payment=CreateTables::get_value_currency($payment_currency);
                if($currecny_payment[0][$meta_table_value]!=$currecny_file[0][$meta_table_value]){
                    if($currecny_payment[0][$meta_table_value]=='JOD' && $currecny_file[0][$meta_table_value]=='USD'){


                    $convert=  convertCurrency($currecny_payment[0][$meta_table_value],$date);

                    
                   
                 
                    $current_payment_val=round($current_payment_val, 2);
                    $current_payment_val=$current_payment_val/$convert;
                    if($current_file_payment_value>$current_payment_val){
                        $current_file_payment_value=$current_file_payment_value-$current_payment_val;
                    }else{
                        $current_file_payment_value=0;
                    }
 
                    }else if($currecny_payment[0][$meta_table_value]=='ILS' && $currecny_file[0][$meta_table_value]=='USD'){
                    
                          
                    $convert=  convertCurrency($currecny_payment[0][$meta_table_value],$date);
                        
                    
                   
                    $new= 0;
                    $current_payment_val=round($current_payment_val, 2);
                    $current_payment_val=$current_payment_val/$convert;
                    if($current_file_payment_value>$current_payment_val){
                        $current_file_payment_value=$current_file_payment_value-$current_payment_val;
                    }else{
                        $current_file_payment_value=0;
                    }
                    }else if($currecny_payment[0][$meta_table_value]=='USD' && $currecny_file[0][$meta_table_value]=='JOD'){
                      
                        $convert=  convertCurrency($currecny_file[0][$meta_table_value],$date);
                        
                                       
                        $new= 0;
                        $current_payment_val=round($current_payment_val, 2);
                        $current_payment_val=$current_payment_val*$convert;
                        if($current_file_payment_value>$current_payment_val){
                            $current_file_payment_value=$current_file_payment_value-$current_payment_val;
                        }else{
                            $current_file_payment_value=0;
                        }
                    }else if($currecny_payment[0][$meta_table_value]=='USD' && $currecny_file[0][$meta_table_value]=='ILS'){
                        $convert=  convertCurrency($currecny_file[0][$meta_table_value],$date);
                        
                                       
                        $new= 0;
                        $current_payment_val=round($current_payment_val, 2);
                        $current_payment_val=$current_payment_val*$convert;
                        if($current_file_payment_value>$current_payment_val){
                            $current_file_payment_value=$current_file_payment_value-$current_payment_val;
                        }else{
                            $current_file_payment_value=0;
                        }
                    }else if($currecny_payment[0][$meta_table_value]=='JOD' && $currecny_file[0][$meta_table_value]=='ILS'){
                       
                        $convert=  convertCurrency($currecny_payment[0][$meta_table_value],$date);
                      
                        $new= 0;
                        $current_payment_val=$current_payment_val/$convert;
                        $convert=  convertCurrency($currecny_file[0][$meta_table_value]);

                        $current_payment_val=$current_payment_val*$convert;
                        $current_payment_val=round($current_payment_val, 2);
     
                        if($current_file_payment_value>$current_payment_val){
                            $current_file_payment_value=$current_file_payment_value-$current_payment_val;
                        }else{
                            $current_file_payment_value=0;
                        }
                    }else if($currecny_payment[0][$meta_table_value]=='ILS' && $currecny_file[0][$meta_table_value]=='JOD'){
                        $convert=  convertCurrency($currecny_file[0][$meta_table_value],$date);
                        
                        $new= 0;
                        $current_payment_val=$current_payment_val/$convert;
                        $convert=  convertCurrency($currecny_payment[0][$meta_table_value]);
        
                        $current_payment_val=$current_payment_val*$convert;
                        $current_payment_val=round($current_payment_val, 2);
                         
                        if($current_file_payment_value>$current_payment_val){
                            $current_file_payment_value=$current_file_payment_value-$current_payment_val;
                        }else{
                            $current_file_payment_value=0;
                        }
                        
                    }
                
            }else{
                if($current_file_payment_value>$current_payment_val){
                    $current_file_payment_value=$current_file_payment_value-$current_payment_val;
                }else{
                    $current_file_payment_value=0;
                }
             
        }
        $current_file_payment_value=round($current_file_payment_value, 2);

            // sql query to create table
            $sql = "UPDATE $file_table SET  $file_table_due='$current_file_payment_value' WHERE  $file_table_id='$file_id'";
 
            
           
             if($connection->query($sql)){
                Global $notify;
                $notify = "due_deleted";
            }else{
                Global $notify;
                $notify = "error_due";
            }
            // sql query to create table
            $sql = "UPDATE $dues_table SET  $dues_table_status='-1' WHERE  $dues_table_id='$id'";
            if($connection->query($sql)){
                CreateTables::add_log($_SESSION['userid'],'حذف مستحق');

                Global $notify;
                $notify = "due_deleted";
            }else{
                Global $notify;
                $notify = "error_due";
            }

         

    }



     
    

    function delete_payment($id,$file_id,$payment_currency,$payment_value,$date,$payment_type){
        /* Table variables */
         
        Global $payments_table;
        Global $payments_table_id;
        Global $payments_table_type;
        Global $payments_table_number;
        Global $payments_table_value;
        Global $payments_table_currency;
        Global $payments_table_date;
        Global $payments_table_file_id;
        Global $payments_table_status;
        Global $currency_table_id;
        Global $currency_table_type;
        Global $currency_table_value;
        Global $currency_table_date;

        Global $file_table;
        Global $file_table_id;
        Global $file_table_client_id;
        Global $file_table_type;
        Global $file_table_number;
        Global $file_table_currency;
        Global $file_table_due;
        Global $file_table_paid;
        Global $file_table_note;
        Global $file_table_paid_out;
        Global $file_table_registered;
        Global $file_table_status;
        Global $meta_table_id;
        Global $meta_table_userid;
        Global $meta_table_name;
        Global $meta_table_type;
        Global $meta_table_value;
        Global $meta_table_registered;
        Global $meta_table_status;
        Global $user_table;
         /* Database Connection */
         Global $connection;
         $file_data=CreateTables::get_all_file_data($file_id);
          
         $current_payment=CreateTables::get_payment_by_id($id);
         $date= date('Y-m-d', strtotime($date));
        $value=$payment_value;
         $currecny_file=CreateTables::get_value_currency($file_data[0][$file_table_currency]);
         $currecny_payment=CreateTables::get_value_currency($current_payment[0][$payments_table_currency]);
         $payment_types=CreateTables::get_meta_name_by_id($payment_type);
         $current_file_payment_value=$file_data[0][$file_table_paid];
            $current_file_payment_out_value=$file_data[0][$file_table_paid_out];

         
                if($currecny_payment[0][$meta_table_value]!=$currecny_file[0][$meta_table_value]){
                    if($currecny_payment[0][$meta_table_value]=='JOD' && $currecny_file[0][$meta_table_value]=='USD'){

                 
                    $convert=  convertCurrency($currecny_payment[0][$meta_table_value],$date);

                    
                   
                    $new= 0;
                    $current_payment_val=$current_payment[0][$payments_table_value]/$convert;
                    $current_payment_val=round($current_payment_val, 2);
                    if($payment_types[0][$meta_table_value]=='In'){
                        $current_file_payment_value=$current_file_payment_value-$current_payment_val;
                    
                        if($current_file_payment_value<0){
                        
                            $current_file_payment_value=0;
                        }
                    }else{
                        $current_file_payment_out_value=$current_file_payment_out_value-$current_payment_val;
                        if($current_file_payment_out_value<0){
                        
                            $current_file_payment_out_value=0;
                        }
                    }
                   
                    }else if($currecny_payment[0][$meta_table_value]=='ILS' && $currecny_file[0][$meta_table_value]=='USD'){
                    
                          
                    $convert=  convertCurrency($currecny_payment[0][$meta_table_value],$date);
                        
                    
                   
                    $new= 0;
                    $current_payment_val=$current_payment[0][$payments_table_value]/$convert;
                   
                    $current_payment_val=round($current_payment_val, 2);
                    if($payment_types[0][$meta_table_value]=='In'){
                        $current_file_payment_value=$current_file_payment_value-$current_payment_val;
                        if($current_file_payment_value<0){
                       
                        $current_file_payment_value=0;
                        }
                    }else{
                        $current_file_payment_out_value=$current_file_payment_out_value-$current_payment_val;
                        if($current_file_payment_out_value<0){
                       
                        $current_file_payment_out_value=0;
                        }
                    }
                    }else if($currecny_payment[0][$meta_table_value]=='USD' && $currecny_file[0][$meta_table_value]=='JOD'){
                      
                        $convert=  convertCurrency($currecny_file[0][$meta_table_value],$date);
                        
                                       
                    $new=0;
                    $current_payment_val=$current_payment[0][$payments_table_value]*$convert;
                   
                    $current_payment_val=round($current_payment_val, 2);
                    if($payment_types[0][$meta_table_value]=='In'){
                    $current_file_payment_value=$current_file_payment_value-$current_payment_val;
                    if($current_file_payment_value<0){
                       
                        $current_file_payment_value=0;
                    }
                }else{
                    $current_file_payment_out_value=$current_file_payment_out_value-$current_payment_val;
                    if($current_file_payment_out_value<0){
                       
                        $current_file_payment_out_value=0;
                    }
                }
                    }else if($currecny_payment[0][$meta_table_value]=='USD' && $currecny_file[0][$meta_table_value]=='ILS'){
                        $convert=  convertCurrency($currecny_file[0][$meta_table_value],$date);
                        
                                       
                        $new= 0;
                        $current_payment_val=$current_payment[0][$payments_table_value]*$convert;
                       
                        $current_payment_val=round($current_payment_val, 2);
                        if($payment_types[0][$meta_table_value]=='In'){
                        $current_file_payment_value=$current_file_payment_value-$current_payment_val;
                        if($current_file_payment_value<0){
                           
                            $current_file_payment_value=0;
                        }
                    }else{
                        $current_file_payment_out_value=$current_file_payment_out_value-$current_payment_val;
                        if($current_file_payment_out_value<0){
                           
                            $current_file_payment_out_value=0;
                        }
                    }
                    }else if($currecny_payment[0][$meta_table_value]=='JOD' && $currecny_file[0][$meta_table_value]=='ILS'){
                       
                        $convert=  convertCurrency($currecny_payment[0][$meta_table_value],$date);
                      
                        $new= 0;
                        $current_payment_val=$current_payment[0][$payments_table_value]/$convert;
                        $convert=  convertCurrency($currecny_file[0][$meta_table_value]);

                        $current_payment_val=$current_payment_val*$convert;
                        $current_payment_val=round($current_payment_val, 2);
                        if($payment_types[0][$meta_table_value]=='In'){
                        $current_file_payment_value=$current_file_payment_value-$current_payment_val;
                        if($current_file_payment_value<0){
                           
                            $current_file_payment_value=0;
                        }
                    }else{
                        $current_file_payment_out_value=$current_file_payment_out_value-$current_payment_val;
                        if($current_file_payment_out_value<0){
                           
                            $current_file_payment_out_value=0;
                        }
                    }
                    }else if($currecny_payment[0][$meta_table_value]=='ILS' && $currecny_file[0][$meta_table_value]=='JOD'){
                        $convert=  convertCurrency($currecny_file[0][$meta_table_value],$date);
                        
                        $new= 0;
                        $current_payment_val=$current_payment[0][$payments_table_value]/$convert;
                        $convert=  convertCurrency($currecny_payment[0][$meta_table_value]);
        
                        $current_payment_val=$current_payment_val*$convert;
                        $current_payment_val=round($current_payment_val, 2);
                        if($payment_types[0][$meta_table_value]=='In'){
                        $current_file_payment_value=$current_file_payment_value-$current_payment_val;
                        if($current_file_payment_value<0){
                           
                            $current_file_payment_value=0;
                        }
                    }else{
                        $current_file_payment_out_value=$current_file_payment_out_value-$current_payment_val;
                        if($current_file_payment_out_value<0){
                           
                            $current_file_payment_out_value=0;
                        }
                    }
                        
                    }
                
            }else{
                $new=0;
                $current_payment_val=$current_payment[0][$payments_table_value];
                $current_payment_val=round($current_payment_val, 2);
                if($payment_types[0][$meta_table_value]=='In'){
                $current_file_payment_value=$current_file_payment_value-$current_payment_val;
                if($current_file_payment_value<0){
                   
                    $current_file_payment_value=0;
                }
                
            }else{
                $current_file_payment_out_value=$current_file_payment_out_value-$current_payment_val;
                if($current_file_payment_out_value<0){
                   
                    $current_file_payment_out_value=0;
                }
            }
             
        }
            // sql query to create table
            if($payment_types[0][$meta_table_value]!='FU'){

            $sql = "UPDATE $file_table SET  $file_table_paid='$current_file_payment_value' WHERE  $file_table_id='$file_id'";
            if($payment_types[0][$meta_table_value]=='out'){
                $sql = "UPDATE $file_table SET  $file_table_paid_out='$current_file_payment_out_value' WHERE  $file_table_id='$file_id'";
            }
            
             if($connection->query($sql)){
                Global $notify;
                $notify = "payment_deleted";
            }else{
                Global $notify;
                $notify = "error_payment";
            }
        }
            // sql query to create table
            $sql = "UPDATE $payments_table SET  $payments_table_status='-1' WHERE  $payments_table_id='$id'";
 
            if($connection->query($sql)){
                CreateTables::add_log($_SESSION['userid'],'حذف دفعة');

                Global $notify;
                $notify = "payment_deleted";
            }else{
                Global $notify;
                $notify = "error_payment";
            }

         

    }





    
    
    function delete_payment_out($id,$payment_currency,$payment_value,$date,$payment_type){
        /* Table variables */
         
        Global $payments_table;
        Global $payments_table_id;
        Global $payments_table_type;
        Global $payments_table_number;
        Global $payments_table_value;
        Global $payments_table_currency;
        Global $payments_table_date;
        Global $payments_table_file_id;
        Global $payments_table_status;
        Global $currency_table_id;
        Global $currency_table_type;
        Global $currency_table_value;
        Global $currency_table_date;

        Global $file_table;
        Global $file_table_id;
        Global $file_table_client_id;
        Global $file_table_type;
        Global $file_table_number;
        Global $file_table_currency;
        Global $file_table_due;
        Global $file_table_paid;
        Global $file_table_note;
        Global $file_table_paid_out;
        Global $file_table_registered;
        Global $file_table_status;
        Global $meta_table_id;
        Global $meta_table_userid;
        Global $meta_table_name;
        Global $meta_table_type;
        Global $meta_table_value;
        Global $meta_table_registered;
        Global $meta_table_status;
        Global $user_table;
         /* Database Connection */
         Global $connection;
      
         $current_payment=CreateTables::get_payment_by_id($id);
         $date= date('Y-m-d', strtotime($date));
        $value=$payment_value;
        
         $currecny_payment=CreateTables::get_value_currency($current_payment[0][$payments_table_currency]);
         $payment_types=CreateTables::get_meta_name_by_id($payment_type);
 
               
            // sql query to create table
            $sql = "UPDATE $payments_table SET  $payments_table_status='-1' WHERE  $payments_table_id='$id'";
 
            if($connection->query($sql)){
                CreateTables::add_log($_SESSION['userid'],'حذف دفعة خارجة');

                Global $notify;
                $notify = "payment_deleted";
            }else{
                Global $notify;
                $notify = "error_payment";
            }

         

    }



   
    
    function check_table_if_exists($user_table){
        /* Database Connection */
        Global $connection;
        $result  = $connection->query("SHOW TABLES LIKE $user_table");
        return $result;
    }



   
    

}