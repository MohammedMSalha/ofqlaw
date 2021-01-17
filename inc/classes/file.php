<?php
class Files{

    private $client;
    private $number;
    private $type;
    private $currency;
    private $note;
    private $status;
    private $files_id;
    function __construct() {
         
    }

    public function __set($name,$value) {
        switch($name) { //this is kind of silly example, bt shows the idea
            case 'client': 
                if($this->check_number($value)){
                    $this->client=$value;
                }
            break;
            case 'number' :
                if($this->check_str($value)){
                $this->number=$value;
                
                }
            break;
            case 'type' :
                if($this->check_number($value)){
                    $this->type=$value;
                }
            break;
            case 'currency' :
                if($this->check_number($value)){
                    $this->currency=$value;
                }
            break;
            case 'note' :
                if($this->check_str($value)){
                    $this->note=$value;
                }else{
                    $this->note=null;
                }
            break;
            case 'status' :
                if($this->check_number($value)){
                    $this->status=$value;
                }
            break;
            case 'files_id' :
                    if($this->check_number($value)){
                        
                        $this->files_id=$value;
                       
                    }
                break;

               
        }
      }
    
      public function __get($name) {
        switch($name) {
            case 'client': 
                return $this->client;
            case 'number': 
                return $this->number;
            case 'type': 
                return $this->type;
            case 'currency': 
                return $this->currency;
            case 'note': 
                return $this->note;
            case 'status': 
                return $this->status;
            case 'files_id': 
                return $this->files_id;
        }
      }

      function check_str($name){
        $name=trim($name);
        if(strlen($name)>0){
            return true;
        }else{
            return false;
        }
      }

       

       

        function check_number($num){
            if(is_numeric($num) && $num>0){
                return true;
            }else{
               
                return false;
            }
        }

        function add_new_file(){
            if($this->check_if_empty_data()){
                $file=CreateTables::add_file($this->client,$this->type,$this->number,$this->currency,$this->note,$this->status);
                return $file;
            }else{
               
                Global $notify;
                $notify = "file_error";
            }
        }

        function update_current_file(){
          
            if($this->check_if_empty_data_update()){
              
                $file=CreateTables::update_file($this->client,$this->type,$this->number,$this->currency,$this->note,$this->status,$this->files_id);
                return $file;
            }else{
               
                Global $notify;
                $notify = "file_error";
            }
        }


        
        function check_if_empty_data(){
            if($this->client!=null && $this->number!=null && $this->type!=null && $this->currency!=null && $this->status!=null ){
                return true;
            }else{
                return false;
            }
        }

        function check_if_empty_data_update(){
            if($this->client!=null && $this->number!=null && $this->type!=null && $this->currency!=null && $this->status!=null && $this->files_id!=null ){
                return true;
            }else{
                return false;
            }
        }
    
}
