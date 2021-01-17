<?php
class Fees{

    private $fees_currency_type;
    private $fees_value;
    private $fees_type;
    private $fees_file_id;
   

    function __construct() {
         
    }

    public function __set($name,$value) {
        switch($name) { //this is kind of silly example, bt shows the idea
            case 'fees_currency_type': 
                if($this->check_ID_number($value)){
                    $this->fees_currency_type=$value;
                }
                $value=null;
            case 'fees_value' :
                if($this->check_ID_number($value)){
                $this->fees_value=$value;
                }
                $value=null;
            case 'fees_type' :
                if($this->check_ID_number($value)){
                    $this->fees_type=$value;
                }
                $value=null;
            case 'fees_file_id':
                if($this->check_ID_number($value)){
                    $this->fees_file_id=$value;
                }     
                $value=null;  
        }
      }
    
      public function __get($name) {
        switch($name) {
            case 'fees_currency_type': 
                return $this->fees_currency_type;
            case 'fees_value': 
                return $this->fees_value;
            case 'fees_type': 
                return $this->fees_type;
            case 'fees_file_id':
                return $this->fees_file_id;
           
           
        }
      }

 

        function check_ID_number($ID_number){
            if(is_numeric($ID_number) && $ID_number>0){
                return true;
            }else{
               
                return false;
            }
        }

        function add_new_fees(){
            if($this->check_if_empty_data()){
            $new=    CreateTables::add_fees($this->fees_currency_type,$this->fees_type,$this->fees_value,$this->fees_file_id );
                return $new;
            }else{
               return false;
            }
        }


        function update_fees(){
            if($this->check_if_empty_data_update()){
               
            $new= CreateTables::update_fees($this->fees_currency_type,$this->fees_type,$this->fees_value,$this->fees_file_id );
                return $new;
            }else{
               return false;
            }
        }

        function check_if_empty_data(){
            if($this->fees_currency_type!=null && $this->fees_value!=null && $this->fees_type!=null && $this->fees_file_id!=null  ){
               
                return true;
            }else{
                
                return false;
            }
        }


        function check_if_empty_data_update(){
            if($this->fees_currency_type!=null && $this->fees_value!=null   && $this->fees_file_id!=null  ){
               
                return true;
            }else{
                
                return false;
            }
        }
    
}
