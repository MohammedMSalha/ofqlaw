<?php 
if(isset($_POST['client_name']) && isset($_POST['personality']) ){
    $client=new Clients();
    $client->name=$_POST['client_name'];
    $client->personality=$_POST['personality'];
    if(isset($_POST['address'])){
        $client->address=$_POST['address'];
    }
    if(isset($_POST['email'])){
        $client->email=$_POST['email'];
    }
    if(isset($_POST['contact_name'])){
        $client->contact_name=$_POST['contact_name'];
    }
    if(isset($_POST['tel'])){
        $client->tel=$_POST['tel'];
    }
   
    $client->add_new_client();
}


if(isset($_POST['client_name_edit']) && isset($_POST['personality_edit']) && isset($_POST['edit_clients']) ){
    $client=new Clients();
    $client->name=$_POST['client_name_edit'];
    $client->personality=$_POST['personality_edit'];
    if(isset($_POST['address'])){
        $client->address=$_POST['address'];
    }
    if(isset($_POST['email'])){
        $client->email=$_POST['email'];
    }
    if(isset($_POST['contact_name'])){
        $client->contact_name=$_POST['contact_name'];
    }
    if(isset($_POST['tel'])){
        $client->tel=$_POST['tel'];
    }
    if(isset($_POST['edit_clients'])){
        $client->id=$_POST['edit_clients'];
    }
     
   
    $client->update_client();
}





if(isset($_POST['client']) && isset($_POST['file_type']) && isset($_POST['file_number']) && isset($_POST['file_status']) && isset($_POST['file_currency'])  ){
    $file=new Files();
    $file->client=$_POST['client'];
    $file->number=$_POST['file_number'];
    $file->type=$_POST['file_type'];
    $file->currency=$_POST['file_currency'];
    if(isset($_POST['file_note'])){
        $file->note=$_POST['file_note'];
    }else{
        $file->note=null;
    }
    

    
     $file->status=$_POST['file_status'];
     
     if($file->check_if_empty_data()  ){
         
     
         $file_id=$file->add_new_file();
         CreateTables::add_log($_SESSION['userid'],'اضافة ملف جديد');  

         $result=array('code'=>200,'id'=>$file_id);
         echo json_encode($result); // opp error inputs
         die();
         
        
     }
    
     
}

//due listen
if(isset($_POST['due_type'])  && isset($_POST['due_currency']) && isset($_POST['date']) && isset($_POST['opp']) && isset($_POST['file_id']) && isset($_POST['due_value'])){
    $due_new=new DUES();
    $due_new->dues_type=$_POST['due_type'];
    $due_new->dues_value=$_POST['due_value'];
    $due_new->dues_currency=$_POST['due_currency'];
    $due_new->date=$_POST['date'];
    $due_new->file_id=$_POST['file_id'];
    $due_new->opp=$_POST['opp'];
    if(isset($_POST['due_number']) && trim($_POST['due_number'])!=null){
        $due_new->number=$_POST['due_number'];
    }else{
        $due_new->number='لا يوجد';
    }
    if($due_new->add_new_dues()){
        echo json_encode('200'); // mean no opp
        die();
    } else{
        echo json_encode('401'); // mean no opp
        die();
    }   
}


if(isset($_POST['edit_file_opp_name'])   && isset($_POST['edit_file_opp_file'])){
    $new_opp=new Opponents();
    $new_opp->name=$_POST['edit_file_opp_name'];
    if(isset($_POST['edit_file_opp_id'])){
        $new_opp->ID_number=$_POST['edit_file_opp_id'];
    }
    if(isset($_POST['edit_file_opp_note'])){
        $new_opp->note=$_POST['edit_file_opp_note'];
    }else{
        $new_opp->note=null;
    }
    $new_opp->file_ID=$_POST['edit_file_opp_file'];
    if($new_opp->check_if_empty_data()){
        $new_opp->add_new_opponents();
    }else{
        echo json_encode("401"); // opp error inputs
    die();
    }
    echo json_encode("200"); // opp error inputs
    die();
}


if(isset($_POST['file_client']) && isset($_POST['file']) && isset($_POST['file_type']) && isset($_POST['file_number']) && isset($_POST['file_status']) && isset($_POST['file_currency'])){
   
    $file=new Files();
    
    $file->client=$_POST['file_client'];
    $file->number=$_POST['file_number'];
    $file->type=$_POST['file_type'];
    $file->currency=$_POST['file_currency'];
   
    if(isset($_POST['file_note'])){
        $file->note=$_POST['file_note'];

    }else{
        $file->note=null;
    }
    
    $file->status=$_POST['file_status'];
   
    $file->files_id=$_POST['file'];
 
    $file->update_current_file();
 

    echo json_encode("200"); // opp error inputs
    die();
}

 function convertCurrency($type,$date=0){
 
    $currencies=CreateTables::get_all_currency();
    Global $meta_table_name;
    Global $meta_table_id;
    Global $meta_table_type;
    Global $meta_table_value;
    if($date==0){
        $date=date('Y-m-d');
        $date= date('Y-m-d', strtotime($date));
    }
   
    $ils_type=0;
    $jod_type=0;
    if($currencies){
        foreach($currencies as $currency){
            if($currency[$meta_table_value]=='ILS'){
                $ils_type=$currency[$meta_table_id];
            }else if($currency[$meta_table_value]=='JOD'){
                $jod_type=$currency[$meta_table_id];
            }
        }
    }

     
    try {
      
        //Block of code to try
        Global $currency_table_value;
        $api_url = "https://openexchangerates.org/api/historical/$date.json?app_id=84a57b0008794bbcbde4723321446dbc";
        $api_latest="https://openexchangerates.org/api/latest.json?app_id=84a57b0008794bbcbde4723321446dbc";   
        
            $value=0;
           if($type=='ILS'){

        
            if(empty(CreateTables::check_currency_rate($date,$ils_type))){
             
                $list = json_decode(file_get_contents($api_url));
                $ch = curl_init($api_url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
                $output = curl_exec($ch);   

                // convert response
                $list = json_decode($output);

                // handle error; error output
                if(curl_getinfo($ch, CURLINFO_HTTP_CODE) !== 200) {

                    var_dump($output);
                }else{
                    $value=$list->rates->ILS;
                    CreateTables::add_currency($ils_type,$value,$date);

                }
                
                curl_close($ch);

                if($value==0){
                    $list = json_decode(file_get_contents($api_latest));
                    $ch = curl_init($api_latest);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
                    $output = curl_exec($ch);   
    
                    // convert response
                    $list = json_decode($output);
                     // handle error; error output
                        if(curl_getinfo($ch, CURLINFO_HTTP_CODE) !== 200) {

                            $value=3.4;
                        }else{
                            $value=$list->rates->ILS;
                        }
                        curl_close($ch);
                }

                
                return $value;
            }else if(!empty(CreateTables::check_currency_rate($date,$ils_type))){
                
                $data_currency=CreateTables::check_currency_rate($date,$ils_type);
                $value=$data_currency[0][$currency_table_value];
         
                return $value;
            }
        }
        if($type=='JOD'){
            
            if(empty(CreateTables::check_currency_rate($date,$jod_type))){
              
             


                $list = json_decode(file_get_contents($api_url));
                $ch = curl_init($api_url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
                $output = curl_exec($ch);   

                // convert response
                $list = json_decode($output);

                // handle error; error output
                if(curl_getinfo($ch, CURLINFO_HTTP_CODE) !== 200) {

                    var_dump($output);
                }else{
                    $value=$list->rates->JOD;
                    CreateTables::add_currency($jod_type,$value,$date);

                }
                
                curl_close($ch);

                if($value==0){
                    $list = json_decode(file_get_contents($api_latest));
                    $ch = curl_init($api_latest);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
                    $output = curl_exec($ch);   
    
                    // convert response
                    $list = json_decode($output);
                     // handle error; error output
                        if(curl_getinfo($ch, CURLINFO_HTTP_CODE) !== 200) {

                            $value=3.4;
                        }else{
                            $value=$list->rates->JOD;
                        }
                        curl_close($ch);
                }

                
                return $value;
            }else if(!empty(CreateTables::check_currency_rate($date,$jod_type))){
                
                $data_currency=CreateTables::check_currency_rate($date,$jod_type);
                $value=$data_currency[0][$currency_table_value];
                 
                return $value;
            }
        }
            return false;
     
       
    }
    catch(Exception $e) {
     
        //  Block of code to handle errors
            if($type=='ILS'){
                $value=3.52;
                return $value;
            }
            if($type=='JOD'){
                $value=0.7083;
                return $value;
            }
            return false;
    } 
}

 

if(isset($_POST['payment_number']) && isset($_POST['payment_currency']) && isset($_POST['payment_value'])  && isset($_POST['payment_type'])){

    $new_payment=new Payments();
    $new_payment->payment_currency=$_POST['payment_currency'];
    $new_payment->file_id=$_POST['payment_number'];
    $new_payment->payment_value=$_POST['payment_value'];
    $new_payment->payment_type=$_POST['payment_type'];
    if(isset($_POST['payment_desc'])){
        $new_payment->desc=$_POST['payment_desc'];
    }
    if(isset($_POST['payment_bank']) && strlen(trim($_POST['payment_bank']))>0){
        
        $new_payment->bank=$_POST['payment_bank'];
         
        
    }
    if(isset($_POST['payment_check']) && strlen(trim($_POST['payment_check']))>0){
       
        $new_payment->check=$_POST['payment_check'];
        
    }
    
   if(isset($_POST['payment_id']) && trim($_POST['payment_id'])!=null){
    $new_payment->payment_number=$_POST['payment_id'];

   }else{
    $new_payment->payment_number='لا يوجد';

   }

   if(isset($_POST['payment_date']) && trim($_POST['payment_date'])!=null){
    $new_payment->date=$_POST['payment_date'];

   }else{
    $new_payment->date=date('Y-m-d');
   }
    if($new_payment->add_new_payment()){
        Global $notify;
        $notify="payment_added";
    }else{
        Global $notify;
        $notify="payment_error";
    }
}



if( isset($_POST['payment_number_out']) && isset($_POST['payment_currency']) && isset($_POST['payment_value'])  && isset($_POST['payment_type'])){

    $new_payment=new Payments();
    $new_payment->payment_currency=$_POST['payment_currency'];
   
    $new_payment->file_id=$_POST['payment_number_out'];
    $new_payment->payment_value=$_POST['payment_value'];
    $new_payment->payment_type=$_POST['payment_type'];

if(isset($_POST['payment_date']) && trim($_POST['payment_date'])!=null){
    $new_payment->date=$_POST['payment_date']; 
}else{
    $new_payment->date=date('Y-m-d');
}


    if(isset($_POST['payment_id']) && trim($_POST['payment_id'])!=null){
        $new_payment->payment_number=$_POST['payment_id'];
    
       }else{
        $new_payment->payment_number='لا يوجد';
    
       }
    if($new_payment->add_new_payment()){
        Global $notify;
        $notify="payment_added";
    }else{
        Global $notify;
        $notify="payment_error";
    }
}



if(isset($_POST['email']) && isset($_POST['password'])){
 
    $email=trim($_POST['email']);
    $pass=md5(trim($_POST['password']));
    Global $user_table_id;
    Global $user_table_login;
    Global $user_table_pass;
    Global $user_table_nicename;
    Global $user_table_email;
    Global $user_table_registered;
    Global $user_table_type;

    $user=CreateTables::user_check($email,$pass);
    if($user){
        foreach($user as $data){
           
            session_start();
            $_SESSION["username"]=$data[$user_table_nicename];
            $_SESSION["email"]=$data[$user_table_email];
            $_SESSION["type"]=$data[$user_table_type];
            $_SESSION["userid"]=$data[$user_table_id];
            header("location:/dashboard");
        }
    }
}

if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['nicename']) && isset($_POST['type']) && isset($_POST['email']) ){
    $user=new Users();
    $user->username=$_POST['username'];
    $user->password=md5($_POST['password']);
    $user->nicename=$_POST['nicename'];
    $user->type=$_POST['type'];
    $user->email=$_POST['email'];
    $user->add_new_user();

}


if(isset($_POST['username_update']) && isset($_POST['nicename']) && isset($_POST['type']) && isset($_POST['email']) && isset($_POST['id']) ){
    $user=new Users();
    $user->username=$_POST['username_update'];
    $user->nicename=$_POST['nicename'];
    $user->type=$_POST['type'];
    $user->email=$_POST['email'];
    $user->id=$_POST['id'];
    if(isset($_POST['disabled'])){
        $user->status=1;
    }else{
        $user->status=0;
    }
    
    $user->update_user_information();
    if(isset($_POST['password'])){
        $user->password=md5($_POST['password']);
        $user->update_user_password();
    }
   
}





if(isset($_POST['username_update_profile']) && isset($_POST['nicename_profile']) && isset($_POST['email_profile']) && isset($_POST['id_profile']) ){
   

    $user=new Users();
    $user->username=$_POST['username_update_profile'];
    $user->nicename=$_POST['nicename_profile'];
    $user->email=$_POST['email_profile'];
    $user->id=$_POST['id_profile'];
  
    $user->update_user_information_profile();
  

    if(isset($_POST['password'])){
        $user->password=md5($_POST['password']);
        $user->update_user_password();
    }
}


if(isset($_POST['edit_opp'])  && isset($_POST['opp_name_edit'])){
    $opp=new Opponents();
    $opp->name=$_POST['opp_name_edit'];
    if(isset($_POST['opp_id_edit'])){
        $opp->ID_number=$_POST['opp_id_edit'];
    }
    if(isset($_POST['opp_note_update'])){
        $opp->note=$_POST['opp_note_update'];
    }else{
        $opp->note=null;
    }
    $opp->opp_id=$_POST['edit_opp'];

    $opp->update_opponents();
}   


if(isset($_POST['edit_due']) && isset($_POST['due_date_edit'])  && isset($_POST['due_value_edit'])){
$due=new DUES();
$due->due_id=$_POST['edit_due'];
$due->date=$_POST['due_date_edit'];
$due->dues_value=$_POST['due_value_edit'];
$due->file_id=$_POST['file_id'];
$due->dues_currency=$_POST['dues_currency'];

$due->update_dues();
}



if(isset($_POST['payment_file_id_edit']) && isset($_POST['payment_id_edit']) && isset($_POST['payment_value_edit'])  && isset($_POST['payment_type_edit']) && isset($_POST['payment_currency_edit']) && isset($_POST['payment_date_edit']) ){
    $pay=new Payments();
    $pay->id=$_POST['payment_id_edit'];
    $pay->file_id=$_POST['payment_file_id_edit'];
    $pay->payment_currency=$_POST['payment_currency_edit'];
    $pay->payment_value=$_POST['payment_value_edit'];
    $pay->payment_type=$_POST['payment_type_edit'];
    $pay->date=date('Y-m-d',strtotime($_POST['payment_date_edit']));

    $pay->update_payment();
}
    


if(isset($_POST['payment_file_edit']) && isset($_POST['payment_id_edit']) && isset($_POST['payment_value_edit'])  && isset($_POST['payment_type_edit']) && isset($_POST['payment_currency_edit']) && isset($_POST['payment_date_edit']) ){
    $pay=new Payments();
    $pay->id=$_POST['payment_id_edit'];
    $pay->file_id=$_POST['payment_file_edit'];
    $pay->payment_currency=$_POST['payment_currency_edit'];
    $pay->payment_value=$_POST['payment_value_edit'];
    $pay->payment_type=$_POST['payment_type_edit'];
    $pay->date=date('Y-m-d',strtotime($_POST['payment_date_edit']));
     $pay->update_payment();
}
 
 
    if(isset($_POST['client_id_delete'])){
        $client_id=$_POST['client_id_delete'];
        CreateTables::delete_client($client_id);
    }


    
if(isset($_POST['payment_type_delete']) && isset($_POST['payment_file_delete']) && isset($_POST['payment_currency_delete'])  && isset($_POST['payment_id_delete']) && isset($_POST['payment_value_delete']) && isset($_POST['payment_date_delete']) ){
    $pay=new Payments();
    $pay->id=$_POST['payment_id_delete'];
    $pay->file_id=$_POST['payment_file_delete'];
    $pay->payment_currency=$_POST['payment_currency_delete'];
    $pay->payment_value=$_POST['payment_value_delete'];
    $pay->payment_type=$_POST['payment_type_delete'];
    $pay->date=date('Y-m-d',strtotime($_POST['payment_date_delete']));

    $pay->delete_payment();
    }



    if(isset($_POST['file_id']) && isset($_POST['delete_due']) && isset($_POST['dues_currency_delete'])  && isset($_POST['dues_value_delete']) && isset($_POST['due_date_delete'])  ){
        $due=new DUES();
        $due->dues_value=$_POST['dues_value_delete'];
        $due->file_id=$_POST['file_id'];
        $due->date=$_POST['due_date_delete'];
        $due->due_id=$_POST['delete_due'];
        $due->dues_currency=$_POST['dues_currency_delete'];
    
        $due->delete_dues();
        }
    if(isset($_POST['payment_type_delete']) && isset($_POST['payment_client_delete']) && isset($_POST['payment_currency_delete'])  && isset($_POST['payment_id_delete']) && isset($_POST['payment_value_delete']) && isset($_POST['payment_date_delete']) ){
        $pay=new Payments();
        $pay->id=$_POST['payment_id_delete'];
        $pay->client=$_POST['payment_client_delete'];
        $pay->payment_currency=$_POST['payment_currency_delete'];
        $pay->payment_value=$_POST['payment_value_delete'];
        $pay->payment_type=$_POST['payment_type_delete'];
        $pay->date=date('Y-m-d',strtotime($_POST['payment_date_delete']));
    
        $pay->delete_payment();
        }
    

    if(isset($_POST['file_id_delete'])){
        if(is_numeric($_POST['file_id_delete']) && $_POST['file_id_delete']>0){
            CreateTables::delete_file( $_POST['file_id_delete']);
        }
   
    }


    if(isset($_POST['opp_id_delete'])){
        if(is_numeric($_POST['opp_id_delete']) && $_POST['opp_id_delete']>0){
            CreateTables::delete_opp( $_POST['opp_id_delete']);
        }
    }


    if(isset($_POST['currency_id_delete'])){
        if(is_numeric($_POST['currency_id_delete']) && $_POST['currency_id_delete']>0){
            CreateTables::delete_currency( $_POST['currency_id_delete']);
        }
    }



    if(isset($_POST['meta_name']) && isset($_POST['meta_type']) && isset($_POST['value']) && trim($_POST['value'])!=null && trim($_POST['meta_name'])!=null && trim($_POST['meta_type'])!=null){
        CreateTables::add_meta($_POST['meta_type'],$_POST['value'],$_POST['meta_name']);
    }


    if(isset($_POST['edit_meta']) && isset($_POST['meta_name_edit']) && trim($_POST['edit_meta'])!=null && trim($_POST['meta_name_edit'])!=null){
        CreateTables::update_meta($_POST['edit_meta'],$_POST['meta_name_edit']);
    }

    if(isset($_POST['meta_id_delete']) ){
      
        CreateTables::delete_meta($_POST['meta_id_delete']);
    }




    if(isset($_POST['payment_id_confirm']) &&  isset($_POST['payment_currency_confirm']) && isset($_POST['payment_value_confirm'])  && isset($_POST['payment_type_confirm'])){
 
        $new_payment=new Payments();
        $new_payment->payment_currency=$_POST['payment_currency_confirm'];
        if(isset($_POST['payment_date_confirm']) && trim($_POST['payment_date_confirm'])!=null){
            $new_payment->date=date('Y-m-d',strtotime($_POST['payment_date_confirm']) ) ;

        }else{
            $new_payment->date=date('Y-m-d');
        }
        $new_payment->file_id=$_POST['payment_file_confirm'];
        $new_payment->payment_value=$_POST['payment_value_confirm'];
        $new_payment->payment_type=$_POST['payment_type_confirm'];
        if(isset($_POST['payment_desc_confirm'])){
            $new_payment->desc=$_POST['payment_desc_confirm'];
        }
        if(isset($_POST['payment_check_confirm']) && strlen(trim($_POST['payment_check_confirm']))>0){
            
            $new_payment->check=$_POST['payment_check_confirm'];
             
            
        }
        if(isset($_POST['payment_bank_confirm']) && strlen(trim($_POST['payment_bank_confirm']))>0){
           
            $new_payment->bank=$_POST['payment_bank_confirm'];
            
        }
       

        if(isset($_POST['payment_number_confirm']) &&  trim($_POST['payment_number_confirm'])!=null){
            $new_payment->payment_number=$_POST['payment_number_confirm'];
        
           }else{
            $new_payment->payment_number='لا يوجد';
        
           }

        if($new_payment->add_new_payment()){
            Global $notify;
            $notify="payment_added";
            CreateTables::update_payment_fu($_POST['payment_id_confirm'],$_POST['payment_number_confirm']);
        }else{
            Global $notify;
            $notify="payment_error";
        }

    }
    



    if(isset($_POST['currency']) && isset($_POST['rate'])){
  
        $date=date('Y-m-d');
        if(is_numeric($_POST['currency']) && is_numeric($_POST['rate']) && $_POST['rate']>0 && $_POST['currency']>0){
            CreateTables::add_currency($_POST['currency'],$_POST['rate'],$date);
        }else{
            Global $notify;
            $notify='exhange_error';
        }

    }