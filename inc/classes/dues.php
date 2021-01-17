<?php
class DUES{

    private $dues_type;
    private $dues_value;
    private $dues_currency;
    private $date;
    private $file_id;
    private $opp;
    private $due_id;
    private $number;

    function __construct() {
         
    }

    public function __set($name,$value) {
        switch($name) { //this is kind of silly example, bt shows the idea
            case 'dues_type': 
                if($this->check_ID_number($value)){
                    $this->dues_type=$value;
                }
                $value=null;
                case 'number': 
                    if($value!=null){
                        $this->number=$value;
                    }
                    $value=null;
            case 'dues_value' :
                if($this->check_ID_number($value)){
                $this->dues_value=$value;
                }
                $value=null;
            case 'dues_currency' :
                if($this->check_ID_number($value)){
                    $this->dues_currency=$value;
                }
                $value=null;
            case 'date':
                    if($value!=null){
                        $this->date=$value;
                    }
                   
                    $value=null;
            case 'file_id':
                if($this->check_ID_number($value)){
                    $this->file_id=$value;
                }     
                $value=null;  
                case 'opp':
                    if($this->check_ID_number($value)){
                        $this->opp=$value;
                    }     
                    $value=null;  
                    case 'due_id':
                        if($this->check_ID_number($value)){
                            $this->due_id=$value;
                        }     
                        $value=null;  
        }
      }
    
      public function __get($name) {
        switch($name) {
            case 'dues_type': 
                return $this->dues_type;
            case 'dues_value': 
                return $this->dues_value;
            case 'dues_currency': 
                return $this->dues_currency;
            case 'date':
                return $this->date;
            case 'file_id':
                return $this->file_id;
                case 'opp':
                    return $this->opp;
                    case 'due_id':
                        return $this->due_id;
                        case 'number':
                            return $this->number;
           
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

     

       

        function check_ID_number($ID_number){
            if(is_numeric($ID_number) && $ID_number>0){
                return true;
            }else{
               
                return false;
            }
        }

        function add_new_dues(){
            if($this->check_if_empty_data()){
            $new=    CreateTables::add_dues($this->number,$this->dues_type,$this->dues_value,$this->dues_currency,$this->date,$this->file_id,$this->opp);
                return $new;
            }else{
               return false;
            }
        }



        function delete_dues(){
            if($this->check_if_empty_data_update()){
            $new=    CreateTables::delete_due($this->due_id,$this->file_id,$this->dues_currency,$this->dues_value,$this->date);
                return $new;
            }else{
               return false;
            }
        }



        function update_dues(){
            if($this->check_if_empty_data_update()){
            $new=    CreateTables::update_dues($this->date,$this->dues_value,$this->due_id,$this->file_id,$this->dues_currency);
                return $new;
            }else{
               return false;
            }
        }

        function check_if_empty_data(){
            if($this->number!=null && $this->dues_type!=null && $this->dues_value!=null && $this->dues_currency!=null && $this->date!=null && $this->file_id!=null && $this->opp!=null){
                return true;
            }else{
                return false;
            }
        }


        function check_if_empty_data_update(){
            if($this->date!=null && $this->dues_value!=null && $this->due_id!=null && $this->file_id!=null && $this->dues_currency!=null){
                return true;
            }else{
                return false;
            }
        }
    
}
