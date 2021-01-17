<?php
class Users{

    private $username;
    private $password;
    private $nicename;
    private $email;
    private $type;
    private $id;
    private $status;
    function __construct() {
         
    }

    public function __set($name,$value) {
        switch($name) { //this is kind of silly example, bt shows the idea
            case 'username': 
                if($this->check_str($value)){
                    $this->username=$value;
                }
                $value=null;
            case 'password' :
                if($this->check_str($value)){
                $this->password=$value;
                }
                $value=null;
                case 'nicename' :
                    if($this->check_str($value)){
                    $this->nicename=$value;
                    }
                    $value=null;
            case 'email' :
                if($this->check_email($value)){
                    $this->email=$value;
                }
                $value=null;
            case 'type':
                if($this->check_ID_number($value)){
                 
                    $this->type=$value;
                }  
                $value=null; 
                case 'id':
                    if($this->check_ID_number($value)){
                     
                        $this->id=$value;
                    }  
                    $value=null; 
                    case 'status':
                        if($this->check_ID_number($value)){
                         
                            $this->status=$value;
                        }  
                        $value=null; 
           
        }
      }
    
      public function __get($name) {
        switch($name) {
            case 'username': 
                return $this->username;
            case 'password': 
                return $this->password;
                case 'nicename': 
                    return $this->nicename;
            case 'email': 
                return $this->email;
            case 'type':
                return $this->type;
                case 'id':
                    return $this->id;
                    case 'status':
                        return $this->status;
           
        }
      }


      function check_email($email){
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return false;
        }else{
            return true;
        }
  }


      function validateDate($date, $format = 'Y-m-d'){
            $d = DateTime::createFromFormat($format, $date);
            // The Y ( 4 digits year ) returns TRUE for any integer with any number of digits so changing the comparison from == to === fixes the issue.
            return $d && $d->format($format) === $date;
        }


      function check_str($name){
        $name=trim($name);
        if(strlen($name)>=3){
            return true;
        }else{
            return false;
        }
      }

     

       

        function check_ID_number($ID_number){
            if(is_numeric($ID_number)){
                return true;
            }else{
               
                return false;
            }
        }

        function add_new_user(){
           
            
            if($this->check_if_empty_data() && isset($_SESSION["type"]) && $_SESSION["type"]==1){
              $add=  CreateTables::add_user($this->username,$this->password,$this->email,$this->nicename,$this->type);
                return $add;
            }else{
                return false;
            }
        }


        function update_user_information(){
            if($this->check_if_empty_data_update() && isset($_SESSION["type"]) && $_SESSION["type"]==1){
              
                CreateTables::update_user($this->id,$this->username,$this->email,$this->nicename,$this->type,$this->status);
                   
              }else{
               
                Global $notify;
                $notify = "update_error";
              }
        }



        function update_user_information_profile(){
            
            if($this->check_if_empty_data_update_profile() && isset($_SESSION["type"]) && $_SESSION["type"]==1){
              
                CreateTables::update_user_profile($this->id,$this->username,$this->email,$this->nicename);
                   
              }else{
               
                Global $notify;
                $notify = "update_error";
              }
        }


        function update_user_password(){
            if($this->check_if_empty_data_password_update() && isset($_SESSION["type"]) && $_SESSION["type"]==1){
                $add=  CreateTables::update_user_password($this->id,$this->password);
                  
              }else{
                 Global $notify;
                $notify = "update_error";
              }
        }
        function check_if_empty_data_update(){
           
            if($this->id!=null && $this->username!=null && $this->type!=null && $this->email!=null && $this->nicename!=null ){
                return true;
            }else{
                return false;
            }
        }


        function check_if_empty_data_update_profile(){
           
            if($this->id!=null && $this->username!=null && $this->email!=null && $this->nicename!=null ){
                return true;
            }else{
                return false;
            }
        }


        function check_if_empty_data_password_update(){
            if($this->id!=null && $this->password!=null ){
                return true;
            }else{
                return false;
            }
        }
        function check_if_empty_data(){
            if($this->username!=null && $this->type!=null && $this->email!=null && $this->nicename!=null && $this->password!=null ){
                return true;
            }else{
                return false;
            }
        }
    
}
