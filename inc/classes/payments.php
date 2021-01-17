<?php
class Payments{

    private $payment_type;
    private $payment_value;
    private $payment_number;
    private $payment_currency;
    private $date;
    private $file_id;
    private $id;
    private $client;
    private $bank=null;
    private $desc=null;
    private $check=null;
    function __construct() {
         
    }

    public function __set($name,$value) {
        switch($name) { //this is kind of silly example, bt shows the idea
            case 'payment_type': 
                if($this->check_ID_number($value)){
                    $this->payment_type=$value;
                }
            break;  
                case 'id': 
                    if($this->check_ID_number($value)){
                        $this->id=$value;
                    }
                break;  
            case 'payment_value' :
                if($this->check_ID_number($value)){
                $this->payment_value=$value;
                }
            break;  
                case 'payment_number' :
                    if($this->check_str($value)){
                    $this->payment_number=$value;
                    }
                break;  
            case 'payment_currency' :
                if($this->check_ID_number($value)){
                    $this->payment_currency=$value;
                }
            break;  
            case 'date':
                if($this->validateDate($value)){
                 
                    $this->date=$value;
                }  
            break;  
            case 'file_id':
                if($this->check_ID_number($value)){
                   
                    $this->file_id=$value;
                }     
            break;    
               

                    case 'desc':
                        if($this->check_ID_number($value)){
                           
                            $this->desc=$value;
                        }     
                    break;  
                        case 'check':
                          
                               
                                $this->check=$value;
                           
                            break;   
                       
                case 'client':
                    if($this->check_ID_number($value)){
                       
                        $this->client=$value;
                    }
                break;  

                    case 'bank':
                        $this->bank=$value;
                    break;  
               
        }
      }
    
      public function __get($name) {
        switch($name) {
            case 'payment_type': 
                return $this->payment_type;
            case 'payment_value': 
                return $this->payment_value;
                case 'payment_number': 
                    return $this->payment_number;
            case 'payment_currency': 
                return $this->payment_currency;
            case 'date':
                return $this->date;
                case 'bank':
                    return $this->bank;
                    case 'desc':
                        return $this->desc;
            case 'file_id':
                return $this->file_id;
                case 'id':
                    return $this->id;
                    case 'check':
                        return $this->check;
                    case 'client':
                        return $this->client;
           
        }
      }


      function validateDate($date, $format = 'Y-m-d'){
            $d = DateTime::createFromFormat($format, $date);
            // The Y ( 4 digits year ) returns TRUE for any integer with any number of digits so changing the comparison from == to === fixes the issue.
            return $d && $d->format($format) === $date;
        }


      function check_str($name){
        $name=trim($name);
        if(strlen($name)>=1){
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

        function add_new_payment(){
            
            if($this->check_if_empty_data()){
               
                if($this->client==null && $this->file_id!=null){
                   
                    $add=  CreateTables::add_payment($this->payment_number,$this->file_id,$this->payment_currency,$this->payment_value,$this->date,$this->payment_type,$this->bank,$this->desc,$this->check);

                }else{

                    
                    $add=  CreateTables::add_payment($this->payment_number,$this->client,$this->payment_currency,$this->payment_value,$this->date,$this->payment_type,$this->bank,$this->desc,$this->check);

                }
                return $add;
            }else{
                return false;
            }
        }


        function update_payment(){
       
            if($this->check_if_empty_data_update()){
             
                if($this->client==null){
              CreateTables::update_payment($this->id,$this->file_id,$this->payment_currency,$this->payment_value,$this->date,$this->payment_type);
                }else{
                    CreateTables::update_payment_out($this->id,$this->file_id,$this->payment_currency,$this->payment_value,$this->date,$this->payment_type);

                }
            }else{
                Global $notify;
                $notify = "payment_error";
            }
        }


        function delete_payment(){
            if($this->check_if_empty_data_update()){
                if($this->client==null){
              CreateTables::delete_payment($this->id,$this->file_id,$this->payment_currency,$this->payment_value,$this->date,$this->payment_type);
                }else{
                    CreateTables::delete_payment_out($this->id,$this->payment_currency,$this->payment_value,$this->date,$this->payment_type);

                }
            }else{
                Global $notify;
                $notify = "payment_error";
            }
        }

        function check_if_empty_data(){
            if($this->payment_number!=null && $this->payment_type!=null && $this->payment_value!=null && $this->payment_currency!=null  && $this->date!=null){
                return true;
            }else{
                return false;
            }
        }


        function check_if_empty_data_update(){
            if($this->id!=null && ($this->file_id!=null || $this->client ) && $this->payment_currency!=null && $this->payment_value!=null && $this->date!=null && $this->payment_type!=null){
                return true;
            }else{
                return false;
            }
        }
    
}
