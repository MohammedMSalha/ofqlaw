<?php
class Opponents{

    private $name;
    private $ID_number;
    private $note;
    private $file_ID;
    private $opp_id;
   

    function __construct() {
         
    }

    public function __set($name,$value) {
        switch($name) { //this is kind of silly example, bt shows the idea
            case 'name': 
                if($this->check_str($value)){
                    $this->name=$value;
                }
                $value=null;
            case 'ID_number' :
                if($this->check_ID_number($value) || strlen((string)$value)==0){
                $this->ID_number=$value;
                }
                $value=null;
            case 'note' :
                if($this->check_str($value)){
                    $this->note=$value;
                }
                $value=null;
            case 'file_ID':
                if($this->check_ID_number($value)){
                    $this->file_ID=$value;
                }
                $value=null;   
                case 'opp_id':
                    if($this->check_ID_number($value)){
                        $this->opp_id=$value;
                    }
                    $value=null;   
        }
      }
    
      public function __get($name) {
        switch($name) {
            case 'name': 
                return $this->name;
            case 'ID_number': 
                return $this->ID_number;
            case 'note': 
                return $this->note;
            case 'file_ID':
            return $this->file_ID;
            case 'opp_id':
                return $this->opp_id;
           
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

        function add_new_opponents(){
            if($this->check_if_empty_data()){      
                CreateTables::add_opponent($this->name,$this->ID_number,$this->file_ID,$this->note);
            }else{
                Global $notify;
                $notify = "opponent_error";
            }
        }


        function update_opponents(){
            if($this->check_if_empty_data_update()){
                CreateTables::update_opponent($this->opp_id,$this->name,$this->ID_number,$this->note);
            }else{
                Global $notify;
                $notify = "opponent_error";
            }
        }

        function check_if_empty_data(){
            if($this->name!=null  && $this->file_ID!=null){
                return true;
            }else{
                return false;
            }
        }

        function check_if_empty_data_update(){
            if($this->name!=null  && $this->opp_id!=null){
                return true;
            }else{
                return false;
            }
        }

        function check_if_empty_data_without_file(){
            if($this->name!=null && $this->ID_number!=null ){
                return true;
            }else{
                return false;
            }
        }
    
}
