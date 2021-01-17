
<div class="content-page">
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                     
                                    </div>
                                    <h4 class="page-title">الدفعات</h4>
                                    <?php
                                    Global $notify;
                                    if($notify=='payment_added'){
                                        echo "<div class='alert alert-success' role='alert'>
                                                 <i class='mdi mdi-check-all mr-2'></i> <strong>تم بنجاح</strong> إضافة دفعه جديدة
                                            </div>";
                                    }else if($notify=='payment_error'){
                                        echo "<div class='alert alert-danger' role='alert'>
                                                <i class='mdi mdi-check-all mr-2'></i> <strong>حدث خطأ ! </strong> الرجاء المحاولة مرة اخرى
                                              </div>";
                                    }
                                    if($notify=='payment_updated'){
                                        echo "<div class='alert alert-success' role='alert'>
                                                 <i class='mdi mdi-check-all mr-2'></i> <strong>تم بنجاح</strong> تحديث قيمة الدفعه
                                            </div>";
                                    }
                                    if($notify=='payment_deleted'){
                                        echo "<div class='alert alert-success' role='alert'>
                                                 <i class='mdi mdi-check-all mr-2'></i> <strong>تم بنجاح</strong> حذف الدفعه
                                            </div>";
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>     
                        <div class="row">
                                    <div class="spinner-border m-2" role="status" id="loader">
                                        <span class="sr-only">Loading...</span>
                            </div>
                            </div>

                        <!-- end page title --> 
                        <div class="row" id="content" style="display:none;">
                        <div class="col-lg-12 col-xl-12">
                                <div class="card-box">
                                    <ul class="nav nav-pills navtab-bg nav-justified">
                                        <li class="nav-item">
                                            <a href="#future" id="futuretab" data-toggle="tab" aria-expanded="false" class="nav-link active">
                                                الدفعات الاجلة
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#payment_in" id="in" data-toggle="tab" aria-expanded="true" class="nav-link ">
                                                الدفعات الداخلة
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
                                            <div class="row mb-2 mr-2">
                                            <button type="button" class="btn btn-success waves-effect waves-light" data-toggle="modal" data-target="#con-close-modal">اضافة دفعة داخلة</button></h4>
                                            </div>
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
                                                    <th>رقم الملف</th>
                                                    <th data-hide="phone, tablet">الموكل</th>

                                                    <th data-hide="phone, tablet">نوع الدفعه</th>
                                                    
                                                    <th data-hide="phone, tablet">المبلغ</th>
                                                    <th  data-hide="phone, tablet">العملة</th>
                                                    <th  >وصف الدفعة</th>

                                                    <th >تاريخ الدفعة</th>
                                                    <th data-hide="phone, tablet">تاريخ الانشاء</th>

                                                    <th data-hide="phone, tablet">تم الانشاء بواسطة</th>

                                                    
                                                    <th ></th>
                                                   
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
                                                $payments=CreateTables::get_all_payments();
                                                if($payments){
                                                    foreach($payments as $payment){
                                                        Global $file_table_number;
                                                        Global $meta_table_name;
                                                        $user=CreateTables::get_user_by_id($payment[$payments_table_userid]);
                                                        Global $user_table_login;
                                                        Global $user_table_nicename;
                                                        $file_data=CreateTables::get_all_file_data($payment[$payments_table_file_id]);
                                                        $client=CreateTables::get_client_by_id($file_data[0][$file_table_client_id]);

                                                        $type=CreateTables::get_meta_name_by_id($payment[$payments_table_type]);
                                                        $currency=CreateTables::get_meta_name_by_id($payment[$payments_table_currency]);

                                                        $desc=CreateTables::get_meta_name_by_id($payment[$payments_table_desc]);
                                                        if($type[0][$meta_table_value]=="In"){
                                     ?>  
                                                <tr>
                                                    <td><?php echo $payment[$payments_table_number]; ?></td>
                                                    <?php 
                                                    if($type[0][$meta_table_value]=="In"){
?>
                                                    <td><a href="/files/edit/?id=<?php echo $payment[$payments_table_file_id]; ?>" ><?php echo $file_data[0][$file_table_number]; ?></a></td>
                                                    

                                                        <?php
                                                    }else{
                                                        
                                                     
                                                        ?>
                                                    <td>لا يوجد</td>
                                                    
                                                    
                                                        <?php
                                                    }
                                                    ?>
                                                       <td><?php echo $client[0][$client_table_name]; ?></td>

                                                     <td><?php echo $type[0][$meta_table_name]; ?></td>
                                                    <td><?php echo $payment[$payments_table_value]; ?></td>
                                                   
                                                   
                                                    <td><?php echo $currency[0][$meta_table_name]; ?></td> 
                                                    <td><?php if($payment[$payments_table_desc]!=null){ echo $desc[0][$meta_table_name]; }else{ echo 'لا يوجد'; } ?></td>
                                                   
                                                    <td><?php echo date('Y-m-d',strtotime($payment[$payments_table_date])); ?></td>
            
                                                    <td><?php echo date('Y-m-d',strtotime($payment[$payments_table_create_at])); ?></td>

                                                    <td><?php if($payment[$payments_table_userid]!=null){ echo $user[0][$user_table_nicename]; }else{ echo 'لا يوجد'; } ?></td>
                                                    <td class="text-center"> <button type="button" class="btn btn-danger waves-effect waves-light" data-toggle="modal" data-target="#con-close-modal-delete-<?php echo $payment[$payments_table_id]; ?>"><i class="fe-trash"></i></button></td>
      
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
                                        <div class="row mb-2 mr-2">
                                        <button type="button" class="btn btn-warning waves-effect waves-light" data-toggle="modal" data-target="#con-close-modal-out">اضافة دفعة خارجة</button></h4>
                                            </div>
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
                                                    <th data-hide="phone, tablet">الموكل</th>

                                                    <th data-hide="phone, tablet">نوع الدفعه</th>
                                                    
                                                    <th data-hide="phone, tablet">المبلغ</th>
                                                    
                                                    <th >الملف</th>
                                                    <th data-hide="phone, tablet">العملة</th>
                                                   
                                                    <th data-hide="phone, tablet">تاريخ الانشاء</th>
                                                    <th >تاريخ الدفعه</th>

                                                    <th data-hide="phone, tablet">تم الانشاء بواسطة</th>
                                                    <th ></th>
                                                    
                                                    
                                                   
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
                                                $payments=CreateTables::get_all_payments();
                                                if($payments){
                                                    foreach($payments as $payment){
                                                        Global $file_table_number;
                                                        Global $meta_table_name;
                                                        $file_data=CreateTables::get_all_file_data($payment[$payments_table_file_id]);
                                                        $user=CreateTables::get_user_by_id($payment[$payments_table_userid]);
                                                        Global $user_table_login;
                                                        Global $user_table_nicename;
                                                        $file_data=CreateTables::get_all_file_data($payment[$payments_table_file_id]);
                                                        $client=CreateTables::get_client_by_id($file_data[0][$file_table_client_id]);

                                                        $type=CreateTables::get_meta_name_by_id($payment[$payments_table_type]);
                                                        $currency=CreateTables::get_meta_name_by_id($payment[$payments_table_currency]);
                                                        $desc=CreateTables::get_meta_name_by_id($payment[$payments_table_desc]);

                                                        if($type[0][$meta_table_value]=="out"){
                                   ?>  
                                                <tr>
                                                    <td><?php echo $payment[$payments_table_number]; ?></td>
                                                  
                                                    <td><?php echo $client[0][$client_table_name]; ?></td>

                                                   
                                                    
                                                    
                                                   
                                                     <td><?php echo $type[0][$meta_table_name]; ?></td>
                                                    <td><?php echo $payment[$payments_table_value]; ?></td>
                                                   
                                                    <td><a href="/files/edit/?id=<?php echo $payment[$payments_table_file_id]; ?>" ><?php echo $file_data[0][$file_table_number]; ?></a></td>
                                                    <td><?php echo $currency[0][$meta_table_name]; ?></td>                                                    
                                                    <td><?php echo date('Y-m-d',strtotime($payment[$payments_table_create_at])); ?></td>

                                                    <td><?php echo date('Y-m-d',strtotime($payment[$payments_table_date])); ?></td>

                                                    <td><?php if($payment[$payments_table_userid]!=null){ echo $user[0][$user_table_nicename]; }else{ echo 'لا يوجد'; } ?></td>
                                                    <td class="text-center"> <button type="button" class="btn btn-danger waves-effect waves-light" data-toggle="modal" data-target="#con-close-modal-delete-<?php echo $payment[$payments_table_id]; ?>"><i class="fe-trash"></i></button></td>
      
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
                                        <div class="row mb-2 mr-2">
                                        <button type="button" class="btn btn-danger waves-effect waves-light" data-toggle="modal" data-target="#con-close-modal_FU">اضافة دفعة أجله</button></h4>
                                        </div>
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
                                                    <th>رقم الملف</th>
                                                    <th data-hide="phone, tablet">الموكل</th>

                                                    <th data-hide="phone, tablet">نوع الدفعه</th>
                                                    <th>حالة السداد</th>

                                                    <th data-hide="phone, tablet">المبلغ</th>
                                                    <th  >وصف الدفعة</th>
                                                    <th data-hide="phone, tablet">العملة</th>
                                                    <th  >تاريخ الدفعة</th>

                                                    <th data-hide="phone, tablet">تاريخ الانشاء</th>
 
                                                    <th data-hide="phone, tablet">تم الانشاء بواسطة</th>
                                                    <th ></th>

                                                    
                                                    
                                                   
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
                                                $payments=CreateTables::get_all_payments();
                                               
                                                if($payments){
                                                    foreach($payments as $payment){
                                                        Global $file_table_number;
                                                        Global $meta_table_name;
                                                        $user=CreateTables::get_user_by_id($payment[$payments_table_userid]);
                                                        Global $user_table_login;
                                                        Global $user_table_nicename;
                                                        $file_data=CreateTables::get_all_file_data($payment[$payments_table_file_id]);
                                                        $client=CreateTables::get_client_by_id($file_data[0][$file_table_client_id]);
                                                        $type=CreateTables::get_meta_name_by_id($payment[$payments_table_type]);
                                                        $currency=CreateTables::get_meta_name_by_id($payment[$payments_table_currency]);
                                                        $desc=CreateTables::get_meta_name_by_id($payment[$payments_table_desc]);

                                                        if($type[0][$meta_table_value]=="FU"){
                                     ?>  
                                                <tr>
                                                    <td><?php echo $payment[$payments_table_number]; ?></td>
                                                    <?php 
                                                    if($type[0][$meta_table_value]=="FU"){
?>
                                                    <td><a href="/files/edit/?id=<?php echo $payment[$payments_table_file_id]; ?>" ><?php echo $file_data[0][$file_table_number]; ?></a></td>
                                                    

                                                        <?php
                                                    }else{
                                                        
                                                     
                                                        ?>
                                                    <td>لا يوجد</td>
                                                    
                                                    
                                                        <?php
                                                    }
                                                    ?>
                                                     <td><?php echo $client[0][$client_table_name]; ?></td>
                                                     <td><?php echo $type[0][$meta_table_name]; ?></td>
                                                     <?php 
                                                     if($payment[$payments_table_status]==0){
                                                     ?>
                                                     <td  ><button type="button" class="btn btn-warning  waves-effect waves-light mr-2" data-toggle="modal" data-target="#con-close-modal-fu-confirm-<?php echo $payment[$payments_table_id]; ?>"><i class="mdi mdi-sack"></i>تسديد الان</button></td>
                                                     <?php }else if($payment[$payments_table_status]==1){ ?>
                                                        <td  ><button type="button" style="background-color:#106313;" class="btn  waves-effect waves-light mr-2" ><i class="mdi mdi-sack-percent"></i>تم التسديد</button></td>

                                                        <?php } ?>
                                                     <td><?php echo $payment[$payments_table_value]; ?></td>
                                                   
                                                     <td><?php if($payment[$payments_table_desc]!=null){ echo $desc[0][$meta_table_name]; }else{ echo 'لا يوجد'; } ?></td>

                                                    <td><?php echo $currency[0][$meta_table_name]; ?></td>                                                    

                                                    <td><?php echo date('Y-m-d',strtotime($payment[$payments_table_date])); ?></td>
                                                    <td><?php echo date('Y-m-d',strtotime($payment[$payments_table_create_at])); ?></td>

                                                    <td><?php if($payment[$payments_table_userid]!=null){ echo $user[0][$user_table_nicename]; }else{ echo 'لا يوجد'; } ?></td>
                                                    <?php 
                                                     if($payment[$payments_table_status]==0){
                                                     ?>
                                                    <td  > <button type="button" class="btn btn-danger waves-effect waves-light" data-toggle="modal" data-target="#con-close-modal-delete-<?php echo $payment[$payments_table_id]; ?>"><i class="fe-trash"></i></button></td>
                                                     <?php }else{ ?>
                                                        <td  ></td>
                                                   <?php  } ?>
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
                        <div id="con-close-modal" class="modal fade"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">اضافة دفعه داخلة</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                </div>
                                                <div class="modal-body p-4">
                                                <form action="<?php echo BASE_URL; ?>" method="post">
    
                                                <div class="row">
                                                
                                                                <?php 
                                                                        $payments_types=CreateTables::get_all_pamynets_types();
                                                                        Global $meta_table_name;
                                                                        Global $meta_table_id;
                                                                    ?>
                                                              
                                                                    
                                                                    <?php 
                                                        if($payments_types){
                                            
                                                            foreach($payments_types as $payment_type){ 
                                                                if($payment_type[$meta_table_value]=='In'){
                                                        ?>
                                                            <input type="hidden" name="payment_type" value="<?php echo $payment_type[$meta_table_id]; ?>">
                                                        <?php
                                                                }
                                                            }
                                                        }
                                                        ?>
                                
                                                                    
                                <div class="col-md-6">
                                                            <div class="form-group mb-3">
                                                                <label for="field-2" class="control-label">رقم الملف</label>
<?php 
Global $file_table_id;
Global $file_table_client_id;
Global $file_table_type;
Global $file_table_number;
Global $file_table_currency;
Global $file_table_note;
Global $file_table_registered;
Global $file_table_status;
$files=CreateTables::get_all_files_data();
?>
                    <select class="form-control" data-toggle="select2" name="payment_number" required >
                                                            <option diabled selected value="">اختر الملف</option>
                                                            <?php 
                                                            if($files){
                                            
                                                                foreach($files as $file){ 
                                                            ?>
                                                                <option value="<?php echo $file[$file_table_id]; ?>"><?php echo $file[$file_table_number]; ?></option>
                                                            <?php
                                                                }
                                                            }
                                                            ?>
                                                            
                                                        </select>
                                                            </div>
                                                        </div>
  
                                                        <div class="col-md-6">
                                                            <div class="form-group mb-3">
                                                                <label for="field-1" class="control-label">رقم الدفعة</label>
                                                                <input type="text" class="form-control" id="field-1" placeholder="ادخل رقم الدفعه" name="payment_id">
                                                            </div>
                                                        </div>
                                                                                                        </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="field-3" class="control-label">العملة</label>
                                                                <?php 
                                                         $currencies=CreateTables::get_all_currency();
                                                         Global $meta_table_name;
                                                         Global $meta_table_id;
                                                        ?>
                                                        <select class="form-control" name="payment_currency" >
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
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="field-6" class="control-label">المبلغ</label>
                                                                <input type="number" class="form-control" id="field-6" placeholder="ادخل المبلغ للدفعه" name="payment_value" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="field-4" class="control-label">التاريخ</label>
                                                                <input class="form-control"   type="date" name="payment_date">                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                        <label for="field-4" class="control-label">وصف الدفعه</label>
                                                                    <?php 
                                                         $descs=CreateTables::get_all_desc();
                                                         Global $meta_table_name;
                                                         Global $meta_table_id;
                                                        ?>
                                                        <select class="form-control" name="payment_desc" >
                                                        <option selected disabled>اختر الوصف</option>
                                                        <?php 
                                                        if($descs){
                                            
                                                            foreach($descs as $desc){ 
                                                        ?>
                                                            <option value="<?php echo $desc[$meta_table_id]; ?>"><?php echo $desc[$meta_table_name]; ?></option>
                                                        <?php
                                                            }
                                                        }
                                                        ?>
                                                        </select>  
                                                        </div>
                                                      
                                                    </div>
                                                  
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">اغلاق</button>
                                                    <button type="submit" class="btn btn-success waves-effect waves-light">اضافة</button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div><!-- /.modal -->
                                    </div>



                                    <?php 
                                                 Global $payments_table_id;
                                                 Global $payments_table_type;
                                                 Global $payments_table_number;
                                                 Global $payments_table_value;
                                                 Global $payments_table_currency;
                                                 Global $payments_table_date;
                                                 Global $payments_table_file_id;
                                                 Global $payments_table_status;
                                                $payments=CreateTables::get_all_payments();
                                                if($payments){
                                                    foreach($payments as $payment){
                                                        Global $file_table_number;
                                                        Global $meta_table_name;
                                                        $file_data=CreateTables::get_all_file_data($payment[$payments_table_file_id]);
                                                        $type=CreateTables::get_meta_name_by_id($payment[$payments_table_type]);
                                                        $currency=CreateTables::get_meta_name_by_id($payment[$payments_table_currency]);
                                      ?>  
                                     <!-- end row-->
                        <div id="con-close-modal-<?php echo $payment[$payments_table_id]; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">تعديل الدفعه </h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                </div>
                                                <div class="modal-body p-4">
                                                <form action="<?php echo BASE_URL; ?>" method="post">
    
                                                <div class="row">
 
                                                        <div class="col-lg-6">
                                                            <div class="form-group mb-3">
                                                                <label for="field-1" class="control-label">القيمة</label>
                                                                <?php 

                                                                 $payments_types=CreateTables::get_meta_name_by_id($payment[$payments_table_type]);
                                                                 if($payments_types[0][$meta_table_value]=='In' || $payments_types[0][$meta_table_value]=='FU'){
                                                                     ?>
<input type="hidden" name="payment_file_id_edit" value="<?php echo $payment[$payments_table_file_id]; ?>">
<?php
                                                                 }else{
                                                                ?>
                                    <input type="hidden" name="payment_file_edit" value="<?php echo $payment[$payments_table_file_id]; ?>">

                                                                 <?php } ?>
                                                                <input type="hidden" name="payment_id_edit" value="<?php echo $payment[$payments_table_id]; ?>">
                                                                <input type="hidden" name="payment_type_edit" value="<?php echo $payment[$payments_table_type]; ?>">
                                                                <input type="hidden" name="payment_currency_edit" value="<?php echo $payment[$payments_table_currency]; ?>">
                                                                <input type="hidden" name="payment_date_edit" value="<?php echo $payment[$payments_table_date]; ?>">

                                                                <input type="number" class="form-control"  value="<?php  echo $payment[$payments_table_value]; ?>" name="payment_value_edit" required>
                                                            </div>
                                                        </div>
                                                    
                                                       
                                                    </div>
                                                  
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">اغلاق</button>
                                                    <button type="submit" class="btn btn-success waves-effect waves-light">تعديل</button>
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
                                                 Global $payments_table_id;
                                                 Global $payments_table_type;
                                                 Global $payments_table_number;
                                                 Global $payments_table_value;
                                                 Global $payments_table_currency;
                                                 Global $payments_table_date;
                                                 Global $payments_table_file_id;
                                                 Global $payments_table_status;
                                                $payments=CreateTables::get_all_payments();
                                                if($payments){
                                                    foreach($payments as $payment){
                                                        Global $file_table_number;
                                                        Global $meta_table_name;
                                                        $file_data=CreateTables::get_all_file_data($payment[$payments_table_file_id]);
                                                        $type=CreateTables::get_meta_name_by_id($payment[$payments_table_type]);
                                                        $currency=CreateTables::get_meta_name_by_id($payment[$payments_table_currency]);
                                      ?>  


               <!-- end row-->
               <div id="con-close-modal-delete-<?php echo $payment[$payments_table_id]; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">حذف دفعه</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                </div>
                                                <div class="modal-body p-4">
                                                <form action="<?php echo BASE_URL; ?>" method="post">
    
                                                <div class="row">
 
                                                        <div class="col-lg-6">
                                                            <div class="form-group mb-3">
                                                                <label for="field-1" class="control-label">رقم الدفعه : </label>
                                                                <input type="hidden" name="payment_type_delete" value="<?php echo $payment[$payments_table_type]; ?>">
                                                                <input type="hidden" name="payment_id_delete" value="<?php echo $payment[$payments_table_id]; ?>">
                                                                <input type="hidden" name="payment_currency_delete" value="<?php echo $payment[$payments_table_currency]; ?>">
                                                                <input type="hidden" name="payment_date_delete" value="<?php echo $payment[$payments_table_date]; ?>">
                                                                
                            
                                                                <input type="hidden" name="payment_file_delete" value="<?php echo $payment[$payments_table_file_id]; ?>">

                                                                   
                                                                
                                                                <input type="hidden" name="payment_value_delete" value="<?php echo $payment[$payments_table_value]; ?>">

                                                                <?php echo $payment[$payments_table_number]; ?>
                                                            </div>
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


<?php 
                                                    }
                                                }
                                    ?>




<?php 
                                                 Global $payments_table_id;
                                                 Global $payments_table_type;
                                                 Global $payments_table_number;
                                                 Global $payments_table_value;
                                                 Global $payments_table_currency;
                                                 Global $payments_table_date;
                                                 Global $payments_table_file_id;
                                                 Global $payments_table_status;
                                                 Global $payments_table_check;
                                                 Global $payments_table_bank;
                                                 Global $payments_table_desc;
                                                $payments=CreateTables::get_all_payments();
                                                if($payments){
                                                    foreach($payments as $payment){
                                                        if($payment[$payments_table_status]!=1){

                                                        
                                                        Global $file_table_number;
                                                        Global $meta_table_name;
                                                        $file_data=CreateTables::get_all_file_data($payment[$payments_table_file_id]);
                                                        $type=CreateTables::get_meta_name_by_id($payment[$payments_table_type]);
                                                        $currency=CreateTables::get_meta_name_by_id($payment[$payments_table_currency]);
                                      ?>  


    <!-- end row-->
    <div id="con-close-modal-fu-confirm-<?php echo $payment[$payments_table_id]; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">تاكيد الدفعه</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                </div>
                                                <div class="modal-body p-4">
                                                <form action="<?php echo BASE_URL; ?>" method="post">
    
                                                <div class="row">
 
                                                        <div class="col-lg-6">
                                                            <div class="form-group mb-3">
                                                                <label for="field-1" class="control-label">رقم الوصل : </label>
                                                                <input type="hidden" name="payment_check_confirm" value="<?php echo $payment[$payments_table_check]; ?>" class="form-control" required>
                                                                <input type="text" name="payment_number_confirm" value="<?php echo $payment[$payments_table_number]; ?>" class="form-control" >
                                                                <input type="hidden" name="payment_bank_confirm" value="<?php echo $payment[$payments_table_bank]; ?>" class="form-control" required>
                                                                <input type="hidden" name="payment_desc_confirm" value="<?php echo $payment[$payments_table_desc]; ?>" class="form-control" required>

                                                                <input type="hidden" name="payment_id_confirm" value="<?php echo $payment[$payments_table_id]; ?>">
                                                                <input type="hidden" name="payment_currency_confirm" value="<?php echo $payment[$payments_table_currency]; ?>">
                                                                <input type="hidden" name="payment_date_confirm" value="<?php echo $payment[$payments_table_date]; ?>">
                                                                
                                                                <?php 
                                                                $payments_types=CreateTables::get_meta_name_by_id($payment[$payments_table_type]);
                                                                if($payments_types[0][$meta_table_value]=='In' || $payments_types[0][$meta_table_value]=='FU'){
                                                                    ?>
                                                                <input type="hidden" name="payment_file_confirm" value="<?php echo $payment[$payments_table_file_id]; ?>">

                                                                    <?php
                                                                }
                                                                ?>
                                                                <input type="hidden" name="payment_value_confirm" value="<?php echo $payment[$payments_table_value]; ?>">
                                                                <?php 
                                                                        $payments_types=CreateTables::get_all_pamynets_types();
                                                                        Global $meta_table_name;
                                                                        Global $meta_table_id;
                                                                    ?>
                                                              
                                                                    
                                                                    <?php 
                                                        if($payments_types){
                                            
                                                            foreach($payments_types as $payment_type){ 
                                                                if($payment_type[$meta_table_value]=='In'){
                                                        ?>
                                                            <input type="hidden" name="payment_type_confirm" value="<?php echo $payment_type[$meta_table_id]; ?>">
                                                        <?php
                                                             
                                                                }
                                                            }
                                                        }
                                                        ?>
                                                            </div>
                                                        </div>
                                                    
                                                       
                                                    </div>
                                                  
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">اغلاق</button>
                                                    <button type="submit" class="btn btn-success waves-effect waves-light">تاكيد</button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div><!-- /.modal -->
                                    </div>


<?php 
   }
                                                    }
                                                }
                                    ?>





     <!-- end row-->
     <div id="con-close-modal-out" class="modal fade"   role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">اضافة دفعه خارجة</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                </div>
                                                <div class="modal-body p-4">
                                                <form action="<?php echo BASE_URL; ?>" method="post">
    
                                                <div class="row">
                                                
                                                <?php 
                                                                        $payments_types=CreateTables::get_all_pamynets_types();
                                                                        Global $meta_table_name;
                                                                        Global $meta_table_id;
                                                                    ?>
                                                              
                                                                    
                                                                    <?php 
                                                        if($payments_types){
                                            
                                                            foreach($payments_types as $payment_type){ 
                                                                if($payment_type[$meta_table_value]=='out'){
                                                        ?>
                                                            <input type="hidden" name="payment_type" value="<?php echo $payment_type[$meta_table_id]; ?>">
                                                        <?php
                                                                }
                                                            }
                                                        }
                                                        ?>
                                 <div class="col-md-6">
                                                            <div class="form-group mb-3">
                                                            <label for="field-2" class="control-label">رقم الملف</label>
<?php 
Global $file_table_id;
Global $file_table_client_id;
Global $file_table_type;
Global $file_table_number;
Global $file_table_currency;
Global $file_table_note;
Global $file_table_registered;
Global $file_table_status;
$files=CreateTables::get_all_files_data();
?>
                    <select class="form-control" data-toggle="select2" name="payment_number_out" required >
                                                            <option diabled selected value="">اختر الملف</option>
                                                            <?php 
                                                            if($files){
                                            
                                                                foreach($files as $file){ 
                                                            ?>
                                                                <option value="<?php echo $file[$file_table_id]; ?>"><?php echo $file[$file_table_number]; ?></option>
                                                            <?php
                                                                }
                                                            }
                                                            ?>
                                                            
                                                        </select>
                                                            </div>
                                                        </div>
                                                <div class="col-md-6">
                                                            <div class="form-group mb-3">
                                                                <label for="field-1" class="control-label">رقم الدفعة</label>
                                                                <input type="text" class="form-control" id="field-1" placeholder="ادخل رقم الدفعه" name="payment_id" >
                                                            </div>
                                                        </div>
                                                       
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="field-3" class="control-label">العملة</label>
                                                                <?php 
                                                         $currencies=CreateTables::get_all_currency();
                                                         Global $meta_table_name;
                                                         Global $meta_table_id;
                                                        ?>
                                                        <select class="form-control" name="payment_currency" >
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
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="field-6" class="control-label">المبلغ</label>
                                                                <input type="number" class="form-control" id="field-6" placeholder="ادخل مبلغ الدفعه" name="payment_value" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="field-4" class="control-label">التاريخ</label>
                                                                <input class="form-control"   type="date" name="payment_date">                                                            </div>
                                                        </div>
                                                        
                                                        
                                                    </div>
                                                  
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">اغلاق</button>
                                                    <button type="submit" class="btn btn-success waves-effect waves-light">اضافة</button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div><!-- /.modal -->
                                    </div>



                                       <!-- end row-->
                        <div id="con-close-modal_FU" class="modal fade"   role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">اضافة دفعه أجله</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                </div>
                                                <div class="modal-body p-4">
                                                <form action="<?php echo BASE_URL; ?>" method="post">
    
                                                <div class="row">
                                                
                                                                <?php 
                                                                        $payments_types=CreateTables::get_all_pamynets_types();
                                                                        Global $meta_table_name;
                                                                        Global $meta_table_id;
                                                                    ?>
                                                              
                                                                    
                                                                    <?php 
                                                        if($payments_types){
                                            
                                                            foreach($payments_types as $payment_type){ 
                                                                if($payment_type[$meta_table_value]=='FU'){
                                                        ?>
                                                            <input type="hidden" name="payment_type" value="<?php echo $payment_type[$meta_table_id]; ?>">
                                                        <?php
                                                                }
                                                            }
                                                        }
                                                        ?>
                                
                                                                    
                                <div class="col-md-6">
                                                            <div class="form-group mb-3">
                                                                <label for="field-2" class="control-label">رقم الملف</label>
<?php 
Global $file_table_id;
Global $file_table_client_id;
Global $file_table_type;
Global $file_table_number;
Global $file_table_currency;
Global $file_table_note;
Global $file_table_registered;
Global $file_table_status;
$files=CreateTables::get_all_files_data();
?>
                    <select class="form-control" data-toggle="select2" name="payment_number" required >
                                                            <option diabled selected value="">اختر الملف</option>
                                                            <?php 
                                                            if($files){
                                            
                                                                foreach($files as $file){ 
                                                            ?>
                                                                <option value="<?php echo $file[$file_table_id]; ?>"><?php echo $file[$file_table_number]; ?></option>
                                                            <?php
                                                                }
                                                            }
                                                            ?>
                                                            
                                                        </select>
                                                            </div>
                                                        </div>
  
                                                        <div class="col-md-6">
                                                            <div class="form-group mb-3">
                                                                <label for="field-1" class="control-label">رقم الدفعة</label>
                                                                <input type="text" class="form-control" id="field-1" placeholder="ادخل رقم الدفعه" name="payment_id" >
                                                            </div>
                                                        </div>
                                                                                                        </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="field-3" class="control-label">العملة</label>
                                                                <?php 
                                                         $currencies=CreateTables::get_all_currency();
                                                         Global $meta_table_name;
                                                         Global $meta_table_id;
                                                        ?>
                                                        <select class="form-control" name="payment_currency" >
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
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="field-6" class="control-label">المبلغ</label>
                                                                <input type="number" class="form-control" id="field-6" placeholder="ادخل قيمة الدفعه" name="payment_value" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="field-4" class="control-label">التاريخ</label>
                                                                <input class="form-control"   type="date" name="payment_date">                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="field-4" class="control-label">رقم الشيك</label>
                                                                <input placeholder="ادخل رقم الشيك" class="form-control"   type="text" name="payment_check" >                                                            </div>
                                                        </div>
                                                     
                                                    </div>

<div class="row">
<div class="col-md-6">
                                                            <div class="form-group">
                                                                    <label for="field-4" class="control-label">وصف الدفعه</label>
                                                                    <?php 
                                                         $descs=CreateTables::get_all_desc();
                                                         Global $meta_table_name;
                                                         Global $meta_table_id;
                                                        ?>
                                                        <select class="form-control" name="payment_desc" >
                                                        <option selected disabled>اختر الوصف</option>
                                                        <?php 
                                                        if($descs){
                                            
                                                            foreach($descs as $desc){ 
                                                        ?>
                                                            <option value="<?php echo $desc[$meta_table_id]; ?>"><?php echo $desc[$meta_table_name]; ?></option>
                                                        <?php
                                                            }
                                                        }
                                                        ?>
                                                        </select>                                                 </div>

                                                            
                                                            </div>

                                                            <div class="col-md-6">
                                                            <div class="form-group">
                                                                    <label for="field-4" class="control-label">اسم البنك</label>
                                                                  <input type="text" class="form-control" name="payment_bank" placeholder="اسم البنك">

                                                            
                                                            </div>

</div>
                                                    
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">اغلاق</button>
                                                    <button type="submit" class="btn btn-success waves-effect waves-light">اضافة</button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div><!-- /.modal -->
                                    </div>


                                    