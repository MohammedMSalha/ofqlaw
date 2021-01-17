<?php
class Clients{

    private $name;
    private $personality;
    private $address;
    private $email;
    private $contact;
    private $tel;
    private $id;

    function __construct() {
         
    }

    public function __set($name,$value) {
        switch($name) { //this is kind of silly example, bt shows the idea
            case 'name': 
                if($this->check_str($value)){
                    $this->name=$value;
                }
                $value=null;
            case 'personality' :
                if($this->check_personality($value)){
                $this->personality=$value;
                }
                $value=null;
            case 'address' :
                if($this->check_str($value)){
                    $this->address=$value;
                }
                $value=null;
            case 'email' :
                if($this->check_email($value)){
                    $this->email=$value;
                }
                $value=null;
            case 'contact_name' :
                if($this->check_str($value)){
                    $this->contact=$value;
                }
                $value=null;
            case 'tel' :
                if($this->validate_tel($value)){
                    $this->tel=$value;
                }
                $value=null;
                case 'id' :
                    if(is_numeric($value) && $value>0){
                        $this->id=$value;
                    }
                    $value=null;
               
        }
      }
    
      public function __get($name) {
        switch($name) {
            case 'name': 
                return $this->name;
            case 'personality': 
                return $this->personality;
            case 'address': 
                return $this->address;
            case 'email': 
                return $this->email;
            case 'contact_name': 
                return $this->contact;
            case 'tel': 
                return $this->tel;
                case 'id': 
                    return $this->id;
        }
      }

      function check_str($name){
        $name=trim($name);
        if(strlen($name)>=3){
            return true;
        }else{
            return false;
        }
      }

      function check_email($email){
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                return false;
            }else{
                return true;
            }
      }

        function validate_tel($tel){
            if(!preg_match('/^[0-9]{10}+$/', $tel)){
                return true;
            }else{
                return false;
            }
        }

        function check_personality($personality){
            if(($personality==1 || $personality==2 ) && is_numeric($personality)){
                return true;
            }else{
               
                return false;
            }
        }

        function add_new_client(){
            if($this->check_if_empty_data()){
                $userid=0;
                 
               if(isset($_SESSION['userid'])){
                   
                   $userid=$_SESSION['userid'];
               }
                CreateTables::add_client($userid,$this->name,$this->address,$this->email,$this->contact,$this->tel,$this->personality);
            }else{
                Global $notify;
                $notify = "client_error";
            }
        }


        function update_client(){
            if($this->check_if_empty_data_update()){
                CreateTables::update_client($this->id,$this->name,$this->address,$this->email,$this->contact,$this->tel,$this->personality);
            }else{
                Global $notify;
                $notify = "client_error";
            }
        }

        function check_if_empty_data(){
            if($this->name!=null && $this->personality){
                return true;
            }else{
                return false;
            }
        }

        function check_if_empty_data_update(){
            if($this->name!=null && $this->personality!=null && $this->id!=null){
                return true;
            }else{
                return false;
            }
        }
    
}
