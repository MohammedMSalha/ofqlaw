<div class="content-page">
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">الملفات</a></li>
                                            <li class="breadcrumb-item active">اضافة ملف جديد</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">اضافة ملف جديد</h4>
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
                                                        <select class="form-control" data-toggle="select2" id="client" >
                                                            <option diabled selected value="">اختر الموكل</option>
                                                            <?php 
                                                            if($clients){
                                            
                                                                foreach($clients as $client){ 
                                                            ?>
                                                                <option value="<?php echo $client[$client_table_id]; ?>"><?php echo $client[$client_table_name]; ?></option>
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
                                                            <option value="<?php echo $file_type[$meta_table_id]; ?>"><?php echo $file_type[$meta_table_name]; ?></option>
                                                        <?php
                                                            }
                                                        }
                                                        ?>
                                                        </select>
                                                    </div>

                                                    <div class="form-group mb-3">
                                                        <label for="example-password">رقم الملف*</label>
                                                        <input type="text"   value="" class="form-control" placeholder="اكتب هنا رقم الملف" id="file_number">
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
                                                            <option value="<?php echo $status[$meta_table_id]; ?>"><?php echo $status[$meta_table_name]; ?></option>
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
                                                            <option value="<?php echo $currency[$meta_table_id]; ?>"><?php echo $currency[$meta_table_name]; ?></option>
                                                        <?php
                                                            }
                                                        }
                                                        ?>
                                                        </select>
                                                    </div>

                                                    <div class="form-group mb-3">
                                                    <label for="example-textarea">ملاحظة</label>
                                                        <textarea class="form-control"   id="file_note" rows="1"></textarea>
                                                    </div>
        
                                                 
        
                                          
                                            </div> <!-- end col -->
                                        </div>
                                        <!-- end row-->
                                        
                                       
    <div class="row mt-4">
                            <div class="col-12">
                                <div class="page-title-box">
                                <div   id="opp_error_notify" style="display:none;">
                                <div class="alert alert-danger" role="alert">
                                        <i class="mdi mdi-block-helper mr-2"></i> حدث <strong>خطأ !</strong>  الرجاء التحقق من المدخلات
                                    </div>

                                                </div>
                                                <div   id="error_notify" style="display:none;">
                                <div class="alert alert-danger" role="alert">
                                        <i class="mdi mdi-block-helper mr-2"></i> حدث <strong>خطأ !</strong> الرجاء التحقق من المدخلات 
                                    </div>

                                                </div>
                                <button type="submit"   class="btn btn-success btn-rounded waves-effect waves-light" id="create_file">
                                                    <span class="btn-label"><i class="mdi mdi-check-all"></i></span>تسجيل البيانات
                                                </button>

                                               
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 
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
            <table id="myTable" class="table  mb-0 order-list " style="opacity: 0.5;">
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
            $opps=null;
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
                    <button type="button" class="btn btn-danger  waves-effect waves-light"><i class="mdi mdi-delete-circle"></i></button>
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
                    <input type="text"   class="form-control" id="name" placeholder="اسم الخصم" disabled/>
                    </td>
                    <td  style="width:30%" >
                    <input type="number"   class="form-control" id="id" placeholder="رقم هوية الخصم" disabled/>

                    </td>
                    <td  style="width:30%" >
                    <Textarea class="form-control" id="note" rows="1" placeholder="ملاحظة" disabled></Textarea>
                    </td>
                    <td class="col-sm-2">
                    <input type="hidden" id="opp_file" value="">
                    <button id="add_opp" disabled type="button" class="btn btn-success  waves-effect waves-light"><i class="mdi mdi-folder-plus"></i></button>

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

    <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    
                                    <h4 class="page-title">سندات الدين</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 
                                        <div class="row" >
                                     
                                        
  
        <div class="table-responsive">
            <table   class="table  mb-0 order-list " style="opacity: 0.5;" >
         
            <thead class="thead-dark">
                <tr>
                    
                    <th scope="col-lg-2">النوع</th>
                    <th scope="col-lg-2">الرقم</th>
                    <th scope="col-lg-2">القيمة</th>
                    <th scope="col-lg-2">العملة</th>
                    <th scope="col-lg-2">التاريخ</th>
                    <th scope="col-lg-4">الخصم</th>
                    <th scope="col-sm-1"></th>
                    <th scope="col-sm-1"></th>

                </tr>
            </thead>
            <tbody>
            <?php

            Global $opponents_table;
            Global $opponents_table_id;
            Global $opponents_table_file_id;
            Global $opponents_table_name;
            Global $opponents_table_ID_number;
            Global $opponents_table_note;
            Global $opponents_table_status;
            $opps=CreateTables::get_all_opp_custom_file($_GET['id']);
            ?>
                <tr>
                <td style="width:10%;padding-right: 5px;"  >
                        
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
                   
                    <td  style="width:15%;padding-right: 5px;" >
                        
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
                     <button type="button" id="add_due" class="btn btn-success waves-effect waves-light"><i class="mdi mdi-folder-plus"></i></button>
 
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




                        <div class="row" id="statistics" style="opacity: 0.5;">
                                              <?php 
                                              $data=array();
                                              if(isset($_GET['id'])){
                                              $data=$file->get_all_file_data($_GET['id']);
                                              } 
                                              ?> 
                            <div class="col-3">
                                <div class="widget-rounded-circle card-box" style="background-color:#3c3c3c;">
                                        <div class="row">
                                          
                                            <div class="col-12">
                                                <div class="text-center">
                                                <p class="text-muted mb-1 text-truncate " style="color:#fff !important;">المبلغ المستحق</p>

                                                    <?php 
                                                    $value_currency=null;
                                                    ?>
                                                    <h4 class="text-dark mt-1" style="color:#fff !important;"> <span  style="color:#fff;" data-plugin="counterup">0</span></h4>
                                                </div>
                                            </div>
                                        </div> <!-- end row-->
                                    </div>
                                </div>


                                <div class="col-3">
                                <div class="widget-rounded-circle card-box" style="background-color:#3c3c3c;">
                                        <div class="row">
                                           
                                            <div class="col-12">
                                                <div class="text-center">
                                                <p class="text-muted mb-1 text-truncate " style="color:#fff !important;">المبلغ المحصل</p>

                                                    <h4 class="text-dark mt-1" style="color:#fff !important;"><span  style="color:#fff;" data-plugin="counterup">0</span></h4>
                                                </div>
                                            </div>
                                        </div> <!-- end row-->
                                    </div>
                                </div>

                               


                                <div class="col-3">
                                <div class="widget-rounded-circle card-box" style="background-color:#3c3c3c;">
                                        <div class="row">
                                           
                                            <div class="col-12">
                                                <div class="text-center">
                                                <p class="text-muted mb-1 text-truncate " style="color:#fff !important;">المبلغ المتبقي</p>

                                                    <h4 class="text-dark mt-1" style="color:#fff !important;"><span  style="color:#fff;" data-plugin="counterup">0</span></h4>
                                                </div>
                                            </div>
                                        </div> <!-- end row-->
                                    </div>
                                </div>

                                <div class="col-3">
                                <div class="widget-rounded-circle card-box" style="background-color:#3c3c3c;">
                                        <div class="row">
                                            
                                            <div class="col-12">
                                                <div class="text-center">
                                                <p class="text-muted mb-1 text-truncate " style="color:#fff !important;">المبلغ الخارج</p>

                                                    <h4 class="text-dark mt-1" style="color:#fff !important;"><span  style="color:#fff;" data-plugin="counterup">0</span></h4>
                                                </div>
                                            </div>
                                        </div> <!-- end row-->
                                    </div>
                                </div>

                                
                                                        
                        </div>     
                        <!-- end page title --> 
    
                      
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
            $opps=null;
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
                                    </div>

<?php 

                }
                }
                ?>



<?php 
            $dues=null;

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
  </div>
    
                      
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

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->
