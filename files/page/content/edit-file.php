 
<div class="content-page" id="information">
                <div class="content">
               
                <input type="hidden" value="<?php echo $_GET['id']; ?>" id="file_data_id">
                    <!-- Start Content-->
                    <div class="container-fluid">
                <?php 
                if(!isset($_GET['id'])){
                    die("لا يوجد محتوى لعرضه");
                }
                ?>
                        
                        <!-- start page title -->
                        <div class="row"  >
                      
                            <div class="col-12">
                               
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                    <button type="button" id="save" onclick="save()" class="btn btn-success waves-effect waves-light">
                                                    <i class="mdi mdi-check-all"></i>
                                                </button>
                                    </div>
                                    <div >
                                        
                                    <?php 
$file=new CreateTables();
$data=array();
if(isset($_GET['id'])){
$data=$file->get_all_file_data($_GET['id']);
} 
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


 
?>
<h4 class="page-title" id="file_title"> الملف رقم / <?php 
                                    if(isset($data[0][$file_table_number])){
                                        echo $data[0][$file_table_number];
                                    }
                                    ?></h4>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                <?php
                                    Global $notify;
                                    if($notify=='opp_updated'){
                                        echo "<div class='alert alert-success' role='alert'>
                                                 <i class='mdi mdi-check-all mr-2'></i> <strong>تم بنجاح</strong> تحديث الخصم
                                            </div>";
                                    }else if($notify=='opp_error'){
                                        echo "<div class='alert alert-danger' role='alert'>
                                                <i class='mdi mdi-check-all mr-2'></i> <strong>حدث خطأ ! </strong> الرجاء المحاولة مرة اخرى
                                              </div>";
                                    }

                                    if($notify=='due_updated'){
                                        echo "<div class='alert alert-success' role='alert'>
                                                 <i class='mdi mdi-check-all mr-2'></i> <strong>تم بنجاح</strong> تحديث الاستحقاق
                                            </div>";
                                    }else if($notify=='error_due'){
                                        echo "<div class='alert alert-danger' role='alert'>
                                                <i class='mdi mdi-check-all mr-2'></i> <strong>حدث خطأ ! </strong> الرجاء المحاولة مرة اخرى
                                              </div>";
                                    }else if($notify=='due_deleted'){
                                        echo "<div class='alert alert-success' role='alert'>
                                        <i class='mdi mdi-check-all mr-2'></i> <strong>تم بنجاح</strong> حذف الاستحقاق
                                   </div>";
                                    }
                                     
                                    ?>
                                <div   id="data_success_notify" style="display:none;">
                                <div class="alert alert-success" role="alert">
                                        <i class="mdi mdi-block-helper mr-2"></i>  <strong>تم حفظ البيانات</strong> بنجاح
                                    </div>

                                                </div>
                                                <div   id="data_error_notify" style="display:none;">
                                <div class="alert alert-danger" role="alert">
                                        <i class="mdi mdi-block-helper mr-2"></i> حدث <strong>خطأ !</strong> الرجاء التحقق من المدخلات 
                                    </div>

                                                </div>
                                

                                               
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 


                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                      

                                        <div class="row">
                                            <div class="col-lg-6">
                                              

                                                    <div class="form-group mb-3">
                                                        <label for="simpleinput">الموكل*</label>
                                                        <?php 
                                                        Global $client_table_id;
                                                        Global $client_table_name;
                                                        $clients=CreateTables::get_all_clients();
                                                        ?>
                                                        <select class="form-control" data-toggle="select2" id="file_client" >
                                                            <option diabled selected value="">اختر الموكل</option>
                                                            <?php 
                                                            if($clients){
                                            
                                                                foreach($clients as $client){ 
                                                            ?>
                                                                <option value="<?php echo $client[$client_table_id]; ?>" <?php if($data[0][$file_table_client_id]==$client[$client_table_id]){ echo 'selected'; } ?> ><?php echo $client[$client_table_name]; ?></option>
                                                            <?php
                                                                }
                                                            }
                                                            ?>
                                                            
                                                        </select>
                                                    </div>

                                                    <div class="form-group mb-3">
                                                        <label for="example-email">نوع الملف*</label>
                                                        <?php 
                                                         $file_types=CreateTables::get_all_file_types();
                                                         Global $meta_table_name;
                                                         Global $meta_table_id;
                                                        ?>
                                                        <select class="form-control" id="file_type" >
                                                        <option selected disabled value="">اختر النوع</option>
                                                        <?php 
                                                        if($file_types){
                                            
                                                            foreach($file_types as $file_type){ 
                                                        ?>
                                                            <option value="<?php echo $file_type[$meta_table_id]; ?>" <?php if($data[0][$file_table_type]==$file_type[$meta_table_id]){ echo 'selected'; } ?>><?php echo $file_type[$meta_table_name]; ?></option>
                                                        <?php
                                                            }
                                                        }
                                                        ?>
                                                        </select>
                                                    </div>

                                                    <div class="form-group mb-3">
                                                        <label for="example-password">رقم الملف*</label>
                                                        <input type="text"   value="<?php echo $data[0][$file_table_number]; ?>" class="form-control" placeholder="اكتب هنا رقم الملف" id="file_number">
                                                    </div>
        
        
                                             
                                            </div> <!-- end col -->

                                            <div class="col-lg-6">
                                          
        
                                                    <div class="form-group mb-3">
                                                        <label for="example-select">حالة الملف*</label>
                                                        <?php 
                                                         $file_status=CreateTables::get_all_file_status();
                                                         Global $meta_table_name;
                                                         Global $meta_table_id;
                                                        ?>
                                                        <select class="form-control"  id="file_status">
                                                        <option selected disabled value="">اختر الحالة</option>
                                                        <?php 
                                                        if($file_status){
                                            
                                                            foreach($file_status as $status){ 
                                                        ?>
                                                            <option value="<?php echo $status[$meta_table_id]; ?>" <?php if($data[0][$file_table_status]==$status[$meta_table_id]){ echo 'selected'; } ?> > <?php echo $status[$meta_table_name]; ?> </option>
                                                        <?php
                                                            }
                                                        }
                                                        ?>
                                                        </select>
                                                    </div>

                                                    <div class="form-group mb-3">
                                                        <label for="example-multiselect">عملة الملف*</label>
                                                        <?php 
                                                         $currencies=CreateTables::get_all_currency();
                                                         Global $meta_table_name;
                                                         Global $meta_table_id;
                                                        ?>
                                                        <select class="form-control" id="file_currency">
                                                        <option selected disabled value="">اختر العملة</option>
                                                        <?php 
                                                        if($currencies){
                                            
                                                            foreach($currencies as $currency){ 
                                                        ?>
                                                            <option value="<?php echo $currency[$meta_table_id]; ?>" <?php if($data[0][$file_table_currency]==$currency[$meta_table_id]){ echo 'selected'; } ?> > <?php echo $currency[$meta_table_name]; ?></option>
                                                        <?php
                                                            }
                                                        }
                                                        ?>
                                                        </select>
                                                    </div>

                                                    <div class="form-group mb-3">
                                                    <label for="example-textarea">ملاحظة</label>
                                                        <textarea class="form-control"   id="file_note" rows="1"><?php echo $data[0][$file_table_note]; ?></textarea>
                                                    </div>
        
                                                 
        
                                          
                                            </div> <!-- end col -->
                                        </div>
                                        <!-- end row-->
                                    
                                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    
                                    <h4 class="page-title">الخصوم</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 
                                        <div class="row">
                                        
                                        
  
        <div class="table-responsive">
            <table id="myTable" class="table  mb-0 order-list ">
            <thead class="thead-dark">
                <tr>
                    <th scope="col-lg-4">الاسم</th>
                    <th scope="col-lg-2">رقم الهوية</th>
                    <th scope="col-lg-4">ملاحظة</th>
                    <th scope="col-sm-1"></th>
                    <th scope="col-sm-1"></th>

                </tr>
            </thead>
            <tbody id="opp_table">
            <?php 
            $opps=CreateTables::get_all_opp_custom_file($_GET['id']);
            Global $opponents_table;
            Global $opponents_table_id;
            Global $opponents_table_file_id;
            Global $opponents_table_name;
            Global $opponents_table_ID_number;
            Global $opponents_table_note;
            Global $opponents_table_status;
            if($opps){
                foreach($opps as $opp){
                     
            ?>
                <tr>
                    <td  style="width:40%">   
                        <input type="text"   class="form-control" value="<?php echo $opp[$opponents_table_name]; ?>" disabled />
                    </td>
                    <td  style="width:30%" >
                        <input type="number"   class="form-control" value="<?php echo $opp[$opponents_table_ID_number]; ?>" disabled/>
                    </td>
                    <td  style="width:30%" >
                    <textarea class="form-control" id="example-textarea"   rows="1"   disabled ><?php echo $opp[$opponents_table_note]; ?></textarea>                    </td>
                    <td class="col-sm-1">
                    <button type="button" class="btn btn-blue waves-effect waves-light" data-toggle="modal" data-target="#con-close-modal-<?php echo $opp[$opponents_table_id]; ?>"><i class="mdi mdi-square-edit-outline"></i></button>
                    </td>
                    <td class="col-sm-1">
                    <button type="button" class="btn btn-danger waves-effect waves-light" data-toggle="modal" data-target="#con-close-modal-delete-<?php echo $opp[$opponents_table_id]; ?>"><i class="fe-trash"></i></button> 

                    </td>
                </tr>
                <?php 
                }
            }
                ?>
            </tbody>
            <tbody>
            <tr>
                    <td  style="width:40%">
                    <input type="text"   class="form-control" id="name" placeholder="اسم الخصم"/>
                    </td>
                    <td  style="width:30%" >
                    <input type="number"   class="form-control" id="id" placeholder="رقم هوية الخصم"/>

                    </td>
                    <td  style="width:30%" >
                    <Textarea class="form-control" id="note" rows="1" placeholder="ملاحظة"></Textarea>
                    </td>
                    <td class="col-sm-2">
                    <input type="hidden" id="opp_file" value="<?php echo $_GET['id']; ?>">
                    <button id="add_opp" onclick="add_opps()"  type="button" class="btn btn-success  waves-effect waves-light"><i class="mdi mdi-folder-plus"></i></button>

                    </td>

            </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="5" style="text-align: center;">
                    </td>
                </tr>
                <tr>
                </tr>
            </tfoot>
        </table>
        </div>
       
    </div>
    <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                <div   id="opp_success_notify" style="display:none;">
                                <div class="alert alert-success" role="alert">
                                        <i class="mdi mdi-block-helper mr-2"></i>  <strong>تم اضافة الاستحقاق</strong> بنجاح
                                    </div>

                                                </div>
                                                <div   id="opp_error_notify" style="display:none;">
                                <div class="alert alert-danger" role="alert">
                                        <i class="mdi mdi-block-helper mr-2"></i> حدث <strong>خطأ !</strong> الرجاء التحقق من المدخلات 
                                    </div>

                                                </div>
                                

                                               
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

    <div class="row" >
                            <div class="col-12">
                                <div class="page-title-box">
                                    
                                    <h4 class="page-title">سندات الدين</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 
                                        <div class="row"  >
                                     
                                        
  
        <div class="table-responsive" >
            <table  class="table table-centered table-striped  mb-0 toggle-circle" data-page-size="7" >
         
            <thead class="thead-dark">
                <tr>
                   
                    <th scope="col-lg-2">النوع</th>
                    <th scope="col-lg-2">الرقم</th>
                    <th scope="col-lg-2">القيمة</th>
                    <th scope="col-lg-2">العملة</th>
                    <th scope="col-lg-2">التاريخ</th>
                    <th scope="col-lg-2">الخصم</th>
                    <th scope="col-lg-1"></th>
                    

                </tr>
            </thead>
            <tbody id="due_table">
            <?php 
            $dues=CreateTables::get_dues_file($_GET['id']);

            //here print dues for this file
            Global $dues_table_id;
            Global $dues_table_type;
            Global $dues_table_value;
            Global $dues_table_currency;
            Global $dues_table_date;
            Global $dues_table_file_id;
            Global $dues_table_status;
            Global $dues_table_opp;
            Global $dues_table_number;

            if($dues){
                foreach($dues as $due){
            ?>
                <tr>
               
                    <td  style="width:20%"><?php
                    $type=CreateTables::get_meta_name_by_id($due[$dues_table_type]);
                    echo $type[0][$meta_table_name];
                    ?></td>
                     <td  style="width:10%"><?php
                    echo $due[$dues_table_number];
                    ?></td>
                    <td  style="width:10%"><?php echo $due[$dues_table_value]; ?></td>
                    <td  style="width:15%"><?php  
                     $type=CreateTables::get_meta_name_by_id($due[$dues_table_currency]);
                     echo $type[0][$meta_table_name];
                    ?></td>
                    <td  style="width:15%"><?php 
                    echo date('Y-m-d',strtotime($due[$dues_table_date]));
                    ?></td>
                    <td  style="width:15%"><?php 
                    $opp_name=CreateTables::get_opp_by_id($due[$dues_table_opp]);
                    echo $opp_name[0][$opponents_table_name];
                    ?></td>
                    <td > <button type="button" class="btn btn-blue waves-effect waves-light mr-2" data-toggle="modal" data-target="#con-close-modal-due-<?php echo $due[$dues_table_id]; ?>"><i class="mdi mdi-square-edit-outline"></i></button><button type="button" class="btn btn-danger  waves-effect waves-light" data-toggle="modal" data-target="#con-close-modal-due-delete-<?php echo $due[$dues_table_id]; ?>"><i class="mdi mdi-delete-circle"></i></button></td>

                </tr>
            <?php
                }
            }
            ?>
            </tbody>
            <tbody>
           
                <tr>
                <td style="width:15%;padding-right: 5px;"  >
                        
                        <?php 
                                                             $dues=CreateTables::get_all_dues();
                                                             Global $meta_table_name;
                                                             Global $meta_table_id;
                                                            ?>
                                                            <select class="form-control"   id="due_type">
                                                            <option selected disabled>اختر النوع</option>
                                                            <?php 
                                                            if($dues){
                                                
                                                                foreach($dues as $due){ 
                                                            ?>
                                                                <option value="<?php echo $due[$meta_table_id]; ?>"><?php echo $due[$meta_table_name]; ?></option>
                                                            <?php
                                                                }
                                                            }
                                                            ?>
                                                            </select>                    </td>
                <td  style="width:10%;padding-right: 3px;    padding-left: 3px;" >
                        
                        <input type="text" id="due_number"  class="form-control" value=""  style="padding: .45rem .2rem;"/>
                    </td>
                   
                    <td  style="width:10%;padding-right: 5px;" >
                        
                        <input type="text" id="due_value"  class="form-control" value="" style="padding: .45rem .2rem;"/>
                    </td>
                    <td  style="width:15%;padding-right: 5px;padding-left:3px;" >
                        
                    <?php 
                                                         $currencies=CreateTables::get_all_currency();
                                                         Global $meta_table_name;
                                                         Global $meta_table_id;
                                                        ?>
                                                        <select class="form-control"   id="due_currency">
                                                        <option selected disabled>اختر العملة</option>
                                                        <?php 
                                                        if($currencies){
                                            
                                                            foreach($currencies as $currency){ 
                                                        ?>
                                                            <option value="<?php echo $currency[$meta_table_id]; ?>"><?php echo $currency[$meta_table_name]; ?></option>
                                                        <?php
                                                            }
                                                        }
                                                        ?>
                                                        </select>
                    </td>
                    <td  style="width:15%;padding-right: 5px;"  >
                    <input class="form-control"   type="date" id="date">
                    </td>
                    <td   style="width:15%;padding-right: 3px;padding-left:0;" >
                    <?php 
                                                         $file_types=CreateTables::get_all_file_types();
                                                         Global $meta_table_name;
                                                         Global $meta_table_id;
                                                        ?>
                                                        <select class="form-control" id="opp" >
                                                        <option selected disabled value="">اختر الخصم</option>
                                                         <?php 
                                                         

                                                          Global $opponents_table;
                                                          Global $opponents_table_id;
                                                          Global $opponents_table_file_id;
                                                          Global $opponents_table_name;
                                                          Global $opponents_table_ID_number;
                                                          Global $opponents_table_note;
                                                          Global $opponents_table_status;
                                                          $opps=CreateTables::get_all_opp_custom_file($_GET['id']);
                                                        
                                                      if($opps){
                                                        foreach($opps as $opp){
                                                        ?>
                                                            <option value="<?php echo $opp[$opponents_table_id]; ?>" ><?php echo $opp[$opponents_table_name]; ?></option>
                                                        <?php
                                                            }
                                                        }
                                                        ?>
                                                        </select>
                    </td>
                    <td class="col-sm-2">
                    <input type="hidden" value="<?php echo $_GET['id']; ?>" id="due_file_id">
                     <button id="add_due_now" onclick="add_dues()" type="button" class="btn btn-success waves-effect waves-light"><i class="mdi mdi-folder-plus"></i></button>
 
                    </td>
                    
                </tr>
               
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="5" style="text-align: left;">
                      
                    </td>
                </tr>
                <tr>
                </tr>
            </tfoot>
        </table>
        </div>
       
    </div>
    <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                <div   id="due_success_notify" style="display:none;">
                                <div class="alert alert-success" role="alert">
                                        <i class="mdi mdi-block-helper mr-2"></i>  <strong>تم اضافة الاستحقاق</strong> بنجاح
                                    </div>

                                                </div>
                                                <div   id="due_error_notify" style="display:none;">
                                <div class="alert alert-danger" role="alert">
                                        <i class="mdi mdi-block-helper mr-2"></i> حدث <strong>خطأ !</strong> الرجاء التحقق من المدخلات 
                                    </div>

                                                </div>
                                

                                               
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 




                        <div class="row" id="statistics">
                                              <?php 
                                              $data=array();
                                              if(isset($_GET['id'])){
                                              $data=$file->get_all_file_data($_GET['id']);
                                              } 
                                              ?> 
                            <div class="col-md-3">
                                <div class="widget-rounded-circle card-box" style="background-color:#3c3c3c;">
                                        <div class="row">
                                         
                                            <div class="col-12">
                                                <div class="text-center">
                                                <p class="text-muted mb-1 text-truncate " style="color:#fff !important;">المبلغ المستحق</p>

                                                    <?php 
                                                    $value_currency=CreateTables::get_value_currency($data[0][$file_table_currency]);
                                                    ?>
                                                    <h4 class="text-dark mt-1" style="color:#fff !important;direction: ltr;"> <span  style="color:#fff;" data-plugin="counterup"><?php echo $data[0][$file_table_due]; ?></span> <?php echo $value_currency[0][$meta_table_value]; ?></h4>
                                                </div>
                                            </div>
                                        </div> <!-- end row-->
                                    </div>
                                </div>


                                <div class="col-md-3">
                                <div class="widget-rounded-circle card-box" style="background-color:#3c3c3c;">
                                        <div class="row">
                                          
                                            <div class="col-12">
                                                <div class="text-center">
                                                <p class="text-muted mb-1 text-truncate " style="color:#fff !important;">المبلغ المحصل</p>

                                                    <h4 class="text-dark mt-1" style="color:#fff !important;direction: ltr;"> <span  style="color:#fff;" data-plugin="counterup"><?php echo $data[0][$file_table_paid]; ?></span> <?php echo $value_currency[0][$meta_table_value]; ?></h4>
                                                </div>
                                            </div>
                                        </div> <!-- end row-->
                                    </div>
                                </div>

                               


                                <div class="col-md-3">
                                <div class="widget-rounded-circle card-box" style="background-color:#3c3c3c;">
                                        <div class="row">
                                         
                                            <div class="col-12">
                                                <div class="text-center">
                                                <p class="text-muted mb-1 text-truncate " style="color:#fff !important;">المبلغ المتبقي</p>

                                                    <h4 class="text-dark mt-1" style="color:#fff !important;direction: ltr;"> <span  style="color:#fff;" data-plugin="counterup"><?php if($data[0][$file_table_paid]>=$data[0][$file_table_due]){ echo 0; }else{ echo $data[0][$file_table_due]-$data[0][$file_table_paid];} ?></span> <?php echo $value_currency[0][$meta_table_value]; ?></h4>
                                                </div>
                                            </div>
                                        </div> <!-- end row-->
                                    </div>
                                </div>



                                <div class="col-md-3">
                                <div class="widget-rounded-circle card-box" style="background-color:#3c3c3c;">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="text-center">
                                                <p class="text-muted mb-1 text-truncate " style="color:#fff !important;">المبلغ الدفوع للموكل</p>

                                                    <h4 class="text-dark mt-1" style="color:#fff !important;direction: ltr;"> <span  style="color:#fff;" data-plugin="counterup"><?php if($data[0][$file_table_paid_out]>=0){ echo $data[0][$file_table_paid_out]; }else{ echo 0; } ?></span> <?php echo $value_currency[0][$meta_table_value]; ?></h4>
                                                </div>
                                            </div>
                                        </div> <!-- end row-->
                                    </div>
                                </div>


                                
                                
                                                        
                        </div>     
                        <!-- end page title --> 
    


                            <!-- end page title --> 
                            <div class="row" id="content">
                        <div class="col-lg-12 col-xl-12">
                                <div class="card-box">
                                    <ul class="nav nav-pills navtab-bg nav-justified">
                                    <li class="nav-item">
                                            <a href="#payment_in" id="in" data-toggle="tab" aria-expanded="true" class="nav-link ">
                                                الدفعات الداخلة
                                            </a>
                                        </li>   
                                    <li class="nav-item">
                                            <a href="#future" id="futuretab" data-toggle="tab" aria-expanded="false" class="nav-link active">
                                                الدفعات الاجلة
                                            </a>
                                        </li>
                                       
                                        <li class="nav-item">
                                            <a href="#payment_out" id="out" data-toggle="tab" aria-expanded="false" class="nav-link">
                                                الدفعات الخارجة
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane  show " id="payment_in">
                                          
                                        <div class="mb-2">
                                        <div class="row">
                                            <div class="col-12 text-sm-center form-inline">
                                                <div class="form-group mr-2" style="display:none;">
                                                    <select id="demo-foo-filter-status" class="custom-select custom-select-sm" >
                                                        <option value="">نوع الدفعة</option>
                                                        <option value="داخلة">داخلة</option>
                                                        <option value="خارجة">خارجة</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <input id="demo-foo-search" type="text" placeholder="ابحث هنا" class="form-control form-control-sm" autocomplete="on">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                        <div class="table-responsive">
                                        <table id="demo-foo-filtering" class="table  toggle-circle mb-0" data-page-size="7">
                                            <thead>
                                                <tr>
                                                    <th data-toggle="true">رقم الدفعة</th>
                                                     
 
                                                    <th data-hide="phone, tablet">نوع الدفعه</th>
                                                    
                                                    <th >المبلغ</th>
                                                    <th  >العملة</th>
                                                    <th  >وصف الدفعة</th>

                                                    <th >تاريخ الدفعة</th>
                                                    <th data-hide="phone, tablet">تاريخ الانشاء</th>

                                                    <th data-hide="phone, tablet">تم الانشاء بواسطة</th>

                                                    
                                                    
                                                </tr>
                                            </thead>
                                        
                                        
                                            <tbody>
                                                <?php 
                                                 Global $payments_table_id;
                                                 Global $payments_table_type;
                                                 Global $payments_table_number;
                                                 Global $payments_table_value;
                                                 Global $payments_table_currency;
                                                 Global $payments_table_date;
                                                 Global $payments_table_file_id;
                                                 Global $payments_table_status;
                                                 Global $payments_table_client;
                                                 Global $payments_table_userid;
                                                 Global $payments_table_create_at;
                                                 Global $payments_table_desc;
                                                 Global $client_table_name;
                                                $payments=CreateTables::get_all_payments($_GET['id']);
                                                if($payments){
                                                    foreach($payments as $payment){
                                                        Global $file_table_number;
                                                        Global $meta_table_name;
                                                        $user=CreateTables::get_user_by_id($payment[$payments_table_userid]);
                                                        Global $user_table_login;
                                                        Global $user_table_nicename;
                                                        $file_data=CreateTables::get_all_file_data($payment[$payments_table_file_id]);
                                                        $type=CreateTables::get_meta_name_by_id($payment[$payments_table_type]);
                                                        $currency=CreateTables::get_meta_name_by_id($payment[$payments_table_currency]);

                                                        $desc=CreateTables::get_meta_name_by_id($payment[$payments_table_desc]);
                                                        if($type[0][$meta_table_value]=="In"){
                                     ?>  
                                                <tr>
                                                    <td><?php echo $payment[$payments_table_number]; ?></td>
                                                   
                                                   
                                                     <td><?php echo $type[0][$meta_table_name]; ?></td>
                                                    <td><?php echo $payment[$payments_table_value]; ?></td>
                                                   
                                                   
                                                    <td><?php echo $currency[0][$meta_table_name]; ?></td> 
                                                    <td><?php if($payment[$payments_table_desc]!=null){ echo $desc[0][$meta_table_name]; }else{ echo 'لا يوجد'; } ?></td>
                                                   
                                                    <td><?php echo date('Y-m-d',strtotime($payment[$payments_table_date])); ?></td>
            
                                                    <td><?php echo date('Y-m-d',strtotime($payment[$payments_table_create_at])); ?></td>

                                                    <td><?php if($payment[$payments_table_userid]!=null){ echo $user[0][$user_table_nicename]; }else{ echo 'لا يوجد'; } ?></td>
       
                                                </tr>
                                               <?php 
                                                        }
                                                    }
                                                }
                                               ?>
                                            </tbody>
                                            <tfoot>
                                            <tr class="active">
                                                <td colspan="5">
                                                    <div class="text-right">
                                                        <ul class="pagination pagination-rounded justify-content-end footable-pagination m-t-10 mb-0"></ul>
                                                    </div>
                                                </td>
                                            </tr>
                                            </tfoot>
                                        </table>
                                        </div>
                                     
                                           
                                        </div> <!-- end tab-pane -->
                                        <!-- end about me section content -->

                                        <div class="tab-pane" id="payment_out">
                                       
                                        <div class="mb-2">
                                        <div class="row">
                                            <div class="col-12 text-sm-center form-inline">
                                                <div class="form-group mr-2" style="display:none;">
                                                    <select id="demo-foo-filter-status1" class="custom-select custom-select-sm" >
                                                        <option value="">نوع الدفعة</option>
                                                        <option value="داخلة">داخلة</option>
                                                        <option value="خارجة">خارجة</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <input id="demo-foo-search1" type="text" placeholder="ابحث هنا" class="form-control form-control-sm" autocomplete="on">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                        <div class="table-responsive">
                                        <table id="demo-foo-filtering1" class="table  toggle-circle mb-0" data-page-size="5">
                                            <thead>
                                                <tr>
                                                    <th data-toggle="true">رقم الدفعة</th>
                                                    
                                                    <th data-hide="phone, tablet">نوع الدفعه</th>
                                                    
                                                    <th >المبلغ</th>
                                                    
                                                     <th >العملة</th>
                                                   
                                                    <th data-hide="phone, tablet">تاريخ الانشاء</th>
                                                    <th >تاريخ الدفعه</th>

                                                    <th data-hide="phone, tablet">تم الانشاء بواسطة</th>
                                                     
                                                    
                                                   
                                                </tr>
                                            </thead>
                                        
                                        
                                            <tbody>
                                                <?php 
                                                 Global $payments_table_id;
                                                 Global $payments_table_type;
                                                 Global $payments_table_number;
                                                 Global $payments_table_value;
                                                 Global $payments_table_currency;
                                                 Global $payments_table_date;
                                                 Global $payments_table_file_id;
                                                 Global $payments_table_status;
                                                 Global $payments_table_client;
                                                 Global $payments_table_userid;
                                                 Global $client_table_name;
                                                $payments=CreateTables::get_all_payments($_GET['id']);
                                                if($payments){
                                                    foreach($payments as $payment){
                                                        Global $file_table_number;
                                                        Global $meta_table_name;
                                                        $file_data=CreateTables::get_all_file_data($payment[$payments_table_file_id]);
                                                        $user=CreateTables::get_user_by_id($payment[$payments_table_userid]);
                                                        Global $user_table_login;
                                                        Global $user_table_nicename;
                                                        $file_data=CreateTables::get_all_file_data($payment[$payments_table_file_id]);
                                                        $type=CreateTables::get_meta_name_by_id($payment[$payments_table_type]);
                                                        $currency=CreateTables::get_meta_name_by_id($payment[$payments_table_currency]);
                                                        $desc=CreateTables::get_meta_name_by_id($payment[$payments_table_desc]);

                                                        if($type[0][$meta_table_value]=="out"){
                                   ?>  
                                                <tr>
                                                    <td><?php echo $payment[$payments_table_number]; ?></td>
                                                  
                                                   
                                                   
                                                    
                                                    
                                                   
                                                     <td><?php echo $type[0][$meta_table_name]; ?></td>
                                                    <td><?php echo $payment[$payments_table_value]; ?></td>
                                                   
                                                     <td><?php echo $currency[0][$meta_table_name]; ?></td>                                                    
                                                    <td><?php echo date('Y-m-d',strtotime($payment[$payments_table_create_at])); ?></td>

                                                    <td><?php echo date('Y-m-d',strtotime($payment[$payments_table_date])); ?></td>

                                                    <td><?php if($payment[$payments_table_userid]!=null){ echo $user[0][$user_table_nicename]; }else{ echo 'لا يوجد'; } ?></td>
       
                                                </tr>
                                               <?php 
                                                        }
                                                    }
                                                }
                                               ?>
                                            </tbody>
                                            <tfoot>
                                            <tr class="active">
                                                <td colspan="5">
                                                    <div class="text-right">
                                                        <ul class="pagination pagination-rounded justify-content-end footable-pagination m-t-10 mb-0"></ul>
                                                    </div>
                                                </td>
                                            </tr>
                                            </tfoot>
                                        </table>
                                        </div>

                                           
                                        </div>
                                        <!-- end settings content-->


                                        <div class="tab-pane active" id="future">
                                       
                                        <div class="mb-2">
                                        <div class="row">
                                            <div class="col-12 text-sm-center form-inline">
                                                <div class="form-group mr-2" style="display:none;">
                                                    <select id="demo-foo-filter-status2" class="custom-select custom-select-sm" >
                                                        <option value="">نوع الدفعة</option>
                                                        <option value="داخلة">داخلة</option>
                                                        <option value="خارجة">خارجة</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <input id="demo-foo-search2" type="text" placeholder="ابحث هنا" class="form-control form-control-sm" autocomplete="on">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                        <div class="table-responsive">
                                        <table id="demo-foo-filtering2" class="table  toggle-circle mb-0" data-page-size="7">
                                            <thead>
                                                <tr>
                                                    <th data-toggle="true">رقم الدفعة</th>
                                                    <th data-hide="phone, tablet">نوع الدفعه</th>
                                                    <th>حالة السداد</th>

                                                    <th >المبلغ</th>
                                                    <th  >وصف الدفعة</th>
                                                    <th>العملة</th>
                                                    <th  >تاريخ الدفعة</th>

                                                    <th data-hide="phone, tablet">تاريخ الانشاء</th>
 
                                                    <th data-hide="phone, tablet">تم الانشاء بواسطة</th>
 
                                                    
                                                    
                                                   
                                                </tr>
                                            </thead>
                                        
                                        
                                            <tbody>
                                                <?php 
                                                 Global $payments_table_id;
                                                 Global $payments_table_type;
                                                 Global $payments_table_number;
                                                 Global $payments_table_value;
                                                 Global $payments_table_currency;
                                                 Global $payments_table_date;
                                                 Global $payments_table_file_id;
                                                 Global $payments_table_status;
                                                 Global $payments_table_client;
                                                 Global $payments_table_userid;
                                                 Global $client_table_name;
                                                 Global $payments_table_desc;
                                                $payments=CreateTables::get_all_payments($_GET['id']);
                                                if($payments){
                                                    foreach($payments as $payment){
                                                        Global $file_table_number;
                                                        Global $meta_table_name;
                                                        $user=CreateTables::get_user_by_id($payment[$payments_table_userid]);
                                                        Global $user_table_login;
                                                        Global $user_table_nicename;
                                                        $file_data=CreateTables::get_all_file_data($payment[$payments_table_file_id]);
                                                        $type=CreateTables::get_meta_name_by_id($payment[$payments_table_type]);
                                                        $currency=CreateTables::get_meta_name_by_id($payment[$payments_table_currency]);
                                                        $desc=CreateTables::get_meta_name_by_id($payment[$payments_table_desc]);

                                                        if($type[0][$meta_table_value]=="FU"){
                                     ?>  
                                                <tr>
                                                    <td><?php echo $payment[$payments_table_number]; ?></td>
                                                    
                                                     <td><?php echo $type[0][$meta_table_name]; ?></td>
                                                     <?php 
                                                     if($payment[$payments_table_status]==0){
                                                     ?>
                                                     <td  ><button type="button" class="btn btn-warning  waves-effect waves-light mr-2" data-toggle="modal" data-target="#con-close-modal-fu-confirm-<?php echo $payment[$payments_table_id]; ?>"><i class="mdi mdi-sack"></i>لم يسدد</button></td>
                                                     <?php }else if($payment[$payments_table_status]==1){ ?>
                                                        <td  ><button type="button" style="background-color:#106313;" class="btn  waves-effect waves-light mr-2" ><i class="mdi mdi-sack-percent"></i>تم التسديد</button></td>

                                                        <?php } ?>
                                                     <td><?php echo $payment[$payments_table_value]; ?></td>
                                                   
                                                     <td><?php if($payment[$payments_table_desc]!=null){ echo $desc[0][$meta_table_name]; }else{ echo 'لا يوجد'; } ?></td>

                                                    <td><?php echo $currency[0][$meta_table_name]; ?></td>                                                    

                                                    <td><?php echo date('Y-m-d',strtotime($payment[$payments_table_date])); ?></td>
                                                    <td><?php echo date('Y-m-d',strtotime($payment[$payments_table_create_at])); ?></td>

                                                    <td><?php if($payment[$payments_table_userid]!=null){ echo $user[0][$user_table_nicename]; }else{ echo 'لا يوجد'; } ?></td>
                                                     
                                                </tr>
                                               <?php 
                                                        }
                                                    }
                                                }
                                               ?>
                                            </tbody>
                                            <tfoot>
                                            <tr class="active">
                                                <td colspan="5">
                                                    <div class="text-right">
                                                        <ul class="pagination pagination-rounded justify-content-end footable-pagination m-t-10 mb-0"></ul>
                                                    </div>
                                                </td>
                                            </tr>
                                            </tfoot>
                                        </table>
                                        </div>
                                           
                                        </div>
                                        <!-- end settings content-->

                                    </div> <!-- end tab-content -->
                                </div> <!-- end card-box-->

                            </div> <!-- end col -->
                            </div>
                         
                        </div>
                        </div>
                        <!-- end row-->
                      
                                    </div> <!-- end card-body -->
                                </div> <!-- end card -->
                            </div><!-- end col -->
                        </div>
                        <!-- end row -->
                        
                        

                        

 


                     


                      


                        


                    
                        
                    </div> <!-- container -->

                </div> <!-- content -->

                <!-- Footer Start -->
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                 
                            </div>
                             
                        </div>
                    </div>
                </footer>
                <!-- end Footer -->

            </div>


<div id="models">
            <?php 
            $opps=CreateTables::get_all_opp_custom_file($_GET['id']);
            Global $opponents_table;
            Global $opponents_table_id;
            Global $opponents_table_file_id;
            Global $opponents_table_name;
            Global $opponents_table_ID_number;
            Global $opponents_table_note;
            Global $opponents_table_status;
            if($opps){
                foreach($opps as $opp){
            ?>
  <div id="con-close-modal-<?php echo $opp[$opponents_table_id];?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">تعديل الخصم</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                </div>
                                                <div class="modal-body p-4">
                                                <form action="<?php echo BASE_URL; ?>" method="post">
    
                                                <div class="row">
 
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="field-1" class="control-label">اسم الخصم</label>
                                                                <input type="hidden" name="edit_opp" value="<?php echo $opp[$opponents_table_id]; ?>">
                                                                <input type="text" class="form-control" value="<?php echo $opp[$opponents_table_name]; ?>" name="opp_name_edit" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="field-2" class="control-label">رقم الهوية</label>
                                                             <input type="number" class="form-control" name="opp_id_edit" value="<?php echo $opp[$opponents_table_ID_number]; ?>" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="field-3" class="control-label">ملاحظات</label>
<textarea name="opp_note_update"  rows="1" class="form-control"></textarea>                                                            </div>
                                                        </div>
                                                        </div> 
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">اغلاق</button>
                                                    <button type="submit" class="btn btn-info waves-effect waves-light">تعديل</button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div><!-- /.modal -->
                                    </div>
                                   

<?php 

                }
                }
                ?>



<?php 
            $dues=CreateTables::get_dues_file($_GET['id']);

            //here print dues for this file
            Global $dues_table_id;
            Global $dues_table_type;
            Global $dues_table_value;
            Global $dues_table_currency;
            Global $dues_table_date;
            Global $dues_table_file_id;
            Global $dues_table_status;
            Global $dues_table_opp;
            Global $dues_table_registerd;

            if($dues){
                foreach($dues as $due){
            ?>

<div id="con-close-modal-due-<?php echo $due[$dues_table_id];?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">تعديل المستحق</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                </div>
                                                <div class="modal-body p-4">
                                                <form action="<?php echo BASE_URL; ?>" method="post">
    
                                                <div class="row">
 
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="field-1" class="control-label">قيمة المستحق</label>
                                                                <input type="hidden" name="file_id" value="<?php echo $due[$dues_table_file_id]; ?>">
                                                                <input type="hidden" name="edit_due" value="<?php echo $due[$dues_table_id]; ?>">
                                                                <input type="hidden" name="dues_currency" value="<?php echo $due[$dues_table_currency]; ?>">

                                                                <input type="hidden" name="due_date_edit" value="<?php echo $due[$dues_table_registerd]; ?>">
                                                                <input type="text" class="form-control"  value="<?php echo $due[$dues_table_value]; ?>" name="due_value_edit" required>
                                                            </div>
                                                        </div>
                                                      
                                                    </div>
                                                    <div class="row">
                                                       
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">اغلاق</button>
                                                    <button type="submit" class="btn btn-info waves-effect waves-light">تعديل</button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div><!-- /.modal -->
                                    </div>
                                    </div>

<?php 
                }
            }
?>




<?php 
            $dues=CreateTables::get_dues_file($_GET['id']);

            //here print dues for this file
            Global $dues_table_id;
            Global $dues_table_type;
            Global $dues_table_value;
            Global $dues_table_currency;
            Global $dues_table_date;
            Global $dues_table_file_id;
            Global $dues_table_status;
            Global $dues_table_opp;
            Global $dues_table_registerd;

            if($dues){
                foreach($dues as $due){
            ?>

<div id="con-close-modal-due-delete-<?php echo $due[$dues_table_id];?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">حذف المستحق</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                </div>
                                                <div class="modal-body p-4">
                                                <form action="<?php echo BASE_URL; ?>" method="post">
    
                                                <div class="row">
 
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="field-1" class="control-label"><?php echo $due[$dues_table_value]; ?> : قيمة المستحق</label>
                                                                <input type="hidden" name="file_id" value="<?php echo $due[$dues_table_file_id]; ?>">
                                                                <input type="hidden" name="delete_due" value="<?php echo $due[$dues_table_id]; ?>">
                                                                <input type="hidden" name="dues_currency_delete" value="<?php echo $due[$dues_table_currency]; ?>">
                                                                <input type="hidden" name="dues_value_delete" value="<?php echo $due[$dues_table_value]; ?>">

                                                                <input type="hidden" name="due_date_delete" value="<?php echo $due[$dues_table_registerd]; ?>">
                                                            </div>
                                                        </div>
                                                      
                                                    </div>
                                                    <div class="row">
                                                       
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">اغلاق</button>
                                                    <button type="submit" class="btn btn-danger waves-effect waves-light">حذف</button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div><!-- /.modal -->
                                    </div>
                                    </div>

<?php 
                }
            }
?>






  <?php 
                                               Global $opponents_table;
                                               Global $opponents_table_id;
                                               Global $opponents_table_file_id;
                                               Global $opponents_table_name;
                                               Global $opponents_table_ID_number;
                                               Global $opponents_table_note;
                                               Global $opponents_table_status;
                                      
                                            $opps=CreateTables::get_all_opp_custom_file($_GET['id']);
                                            if($opps){
                                                foreach($opps as $opp){
                                                   
                                            ?>
                                            <div id="con-close-modal-delete-<?php echo $opp[$opponents_table_id]; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                            <form action="<?php echo BASE_URL; ?>" method="post">

                                                <div class="modal-header">
                                                    <h4 class="modal-title">حذف خصم</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                </div>
                                                <div class="modal-body p-4">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            الخصم : <?php echo $opp[$opponents_table_name]; ?>
                                                            <input type="hidden" name="opp_id_delete" value="<?php echo $opp[$opponents_table_id]; ?>">

                                                            
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">اغلاق</button>
                                                    <button type="submit" class="btn btn-danger waves-effect waves-light">حذف</button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div><!-- /.modal -->

                                                </div>
            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->
                                                <?php }
                                                
                                                }
                                                ?>

</div>