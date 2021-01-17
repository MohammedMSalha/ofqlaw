
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
                                           
                                        </ol>
                                    </div>
                                    <h4 class="page-title">الموكلين</h4>
                                    <?php
                                    Global $notify;
                                    if($notify=='client_added'){
                                        echo "<div class='alert alert-success' role='alert'>
                                                 <i class='mdi mdi-check-all mr-2'></i> <strong>تم بنجاح</strong> إضافة موكل جديد
                                            </div>";
                                    }else if($notify=='client_error'){
                                        echo "<div class='alert alert-danger' role='alert'>
                                                <i class='mdi mdi-check-all mr-2'></i> <strong>حدث خطأ ! </strong> الرجاء المحاولة مرة اخرى
                                              </div>";
                                    }
                                    if($notify=='client_updated'){
                                        echo "<div class='alert alert-success' role='alert'>
                                                 <i class='mdi mdi-check-all mr-2'></i> <strong>تم بنجاح</strong> تعديل الموكل
                                            </div>";
                                    }else if($notify=='error_updated'){
                                        echo "<div class='alert alert-danger' role='alert'>
                                                <i class='mdi mdi-check-all mr-2'></i> <strong>حدث خطأ ! </strong> الرجاء المحاولة مرة اخرى
                                              </div>";
                                    }
                                    if($notify=='client_deleted'){
                                        echo "<div class='alert alert-success' role='alert'>
                                                 <i class='mdi mdi-check-all mr-2'></i> <strong>تم بنجاح</strong> حذف الموكل
                                            </div>";
                                    }else if($notify=='error_deleted'){
                                        echo "<div class='alert alert-danger' role='alert'>
                                                <i class='mdi mdi-check-all mr-2'></i> <strong>لا يمكن الحذف ! </strong> الموكل مربوط بملفات
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
                            <div class="col-12">
                                <div class="card-box">
                                        <h4 class="header-title"> <!-- Responsive modal -->
                                        <button type="button" class="btn btn-success waves-effect waves-light" data-toggle="modal" data-target="#con-close-modal">اضافة موكل جديد</button></h4>
                                        <div class="mb-2">
                                        <div class="row">
                                            <div class="col-12 text-sm-center form-inline">
                                                <div class="form-group mr-2">
                                                    <select id="demo-foo-filter-status" class="custom-select custom-select-sm">
                                                        <option value="">اختر الصفة</option>
                                                        <option value="شخص">شخص</option>
                                                        <option value="شركة">شركة</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <input id="demo-foo-search" type="text" placeholder="ابحث هنا" class="form-control form-control-sm" autocomplete="on">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                        <div class="table-responsive">
                                        <table id="demo-foo-filtering" class="table   toggle-circle mb-0" data-page-size="7">
                                            <thead>
                                                <tr>
                                                    <th data-toggle="true">اسم الموكل</th>
                                                    <th>الصفة</th>
                                                    <th data-hide="phone, tablet">الايميل</th>
                                                    <th data-hide="phone, tablet">الهاتف</th>
                                                    <th data-hide="phone, tablet">تاريخ الانشاء</th>
                                                    <th data-hide="phone, tablet">تم الانشاء بواسطة</th>

                                                    <th data-hide="phone, tablet">العنوان</th>
                                                    <th data-hide="phone, tablet">جهة الاتصال</th>
                                                    <th class="text-center"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php 
                                             Global $client_table_id;
                                             Global $client_table_name;
                                             Global $client_table_address;
                                             Global $client_table_contact_name;
                                             Global $client_table_tel;
                                             Global $client_table_userid;

                                             Global $client_table_email;
                                             Global $client_table_registered;
                                             Global $client_table_personality;
                                            $clients=CreateTables::get_all_clients();

                                            ?>
                                           
                                                <?php 
                                                if($clients){
                                                    foreach($clients as $client){
                                                        Global $meta_table_name;
                                                        $user=CreateTables::get_user_by_id($client[$client_table_userid]);
                                                        Global $user_table_login;
                                                        Global $user_table_nicename;
                                                ?>
                                                <tr>
                                                    <td><?php echo $client[$client_table_name]; ?></td>
                                                    <td><?php if($client[$client_table_personality]==1){ echo 'شخص'; }else{
                                                        echo 'شركة';
                                                    }; ?>
                                                    </td>
                                                    <td><?php if($client[$client_table_email]!=null){ echo $client[$client_table_email]; }else{ echo 'لا يوجد'; } ?></td>
                                                    <td><?php if($client[$client_table_tel]!=null){ echo $client[$client_table_tel]; }else{ echo 'لا يوجد'; } ?></td>
                                                    <td><?php if($client[$client_table_registered]!=null){ echo date('Y-m-d',strtotime( $client[$client_table_registered])); }else{ echo 'لا يوجد'; } ?></td>
                                                    <td><?php if($client[$client_table_userid]!=null){ echo $user[0][$user_table_nicename]; }else{ echo 'لا يوجد'; } ?></td>

                                                    <td><?php if($client[$client_table_address]!=null){ echo $client[$client_table_address]; }else{ echo 'لا يوجد'; } ?></td>

                                                    <td><?php if($client[$client_table_contact_name]!=null){ echo $client[$client_table_contact_name]; }else{ echo 'لا يوجد'; } ?></td>

                                                    <td class="text-center"> <button type="button" class="btn btn-success waves-effect waves-light mr-2" data-toggle="modal" data-target="#con-close-modal-<?php echo $client[$client_table_id]; ?>"><i class="fe-edit-2"></i></button><button type="button" class="btn btn-danger waves-effect waves-light" data-toggle="modal" data-target="#con-close-modal-delete-<?php echo $client[$payments_table_id]; ?>"><i class="fe-trash"></i></button></td>
 
                                                </tr>
                                               <?php 
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
                                        </div> <!-- end .table-responsive-->
                                </div> <!-- end card-box -->
                            </div> <!-- end col -->
                        </div>
        
                        <!-- end row-->
                        <div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">اضافة موكل جديد</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                </div>
                                                <div class="modal-body p-4">
                                                <form action="<?php echo BASE_URL; ?>" method="post" >
    
                                                <div class="row">
 
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="field-1" class="control-label">اسم الموكل</label>
                                                                <input type="text" class="form-control"   placeholder="ادخل اسم الموكل" name="client_name" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="field-2" class="control-label">صفة الموكل</label>
                                                                <select class="form-control"   name="personality" required>
                                                                    <option disabled value="" selected>اختر الصفة</option>
                                                                    <option value="1">شخص</option>
                                                                    <option value="2">شركة</option>
                                
                                                                    
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="field-3" class="control-label">العنوان</label>
                                                                <input type="text" class="form-control"   placeholder="ادخل العنوان" name="address" >
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="field-6" class="control-label">البريد الالكتروني</label>
                                                                <input type="text" class="form-control"  placeholder="ادخل البريد الالكتروني" name="email" >
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="field-4" class="control-label">جهة الاتصال</label>
                                                                <input type="text" class="form-control"   placeholder="ادخل جهة الاتصال" name="contact_name" >
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="field-5" class="control-label">رقم الهاتف</label>
                                                                <input type="tel" id="phone"  class="form-control"   placeholder="ادخل رقم الهاتف" name="tel" >
                                                            </div>
                                                        </div>
                                                      
                                                    </div>
                                                  
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">اغلاق</button>
                                                    <button type="submit" class="btn btn-info waves-effect waves-light">اضافة</button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div><!-- /.modal -->
                                    </div>



                                    <?php 
                                             Global $client_table_id;
                                             Global $client_table_name;
                                             Global $client_table_address;
                                             Global $client_table_contact_name;
                                             Global $client_table_tel;
                                             Global $client_table_email;
                                             Global $client_table_registered;
                                             Global $client_table_personality;
                                            $clients=CreateTables::get_all_clients();
                                            if($clients){
                                                foreach($clients as $client){
                                                    Global $meta_table_name;
                                            ?>
                                            <div id="con-close-modal-delete-<?php echo $client[$client_table_id]; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                            <form action="<?php echo BASE_URL; ?>" method="post">

                                                <div class="modal-header">
                                                    <h4 class="modal-title">حذف الموكل</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                </div>
                                                <div class="modal-body p-4">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            الموكل : <?php echo $client[$client_table_name]; ?>
                                                            <input type="hidden" name="client_id_delete" value="<?php echo $client[$client_table_id]; ?>">

                                                            
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
                                     <!-- end row-->
                        <div id="con-close-modal-<?php echo $client[$client_table_id];?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">تعديل الموكل</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                </div>
                                                <div class="modal-body p-4">
                                                <form action="<?php echo BASE_URL; ?>" method="post">
    
                                                <div class="row">
 
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="field-1" class="control-label">اسم الموكل</label>
                                                                <input type="hidden" name="edit_clients" value="<?php echo $client[$client_table_id]; ?>">
                                                                <input type="text" class="form-control"   value="<?php echo $client[$client_table_name]; ?>" name="client_name_edit" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="field-2" class="control-label">صفة الموكل</label>
                                                                <select class="form-control"  name="personality_edit" required>
                                                                    <option disabled value="">اختر الصفة</option>
                                                                    <option value="1" <?php if($client[$client_table_personality]==1){ echo 'selected'; } ?> >شخصي</option>
                                                                    <option value="2" <?php if($client[$client_table_personality]==2){ echo 'selected'; } ?> >شركة</option>
                                
                                                                    
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="field-3" class="control-label">العنوان</label>
                                                                <input type="text" class="form-control"   placeholder="رام الله / البيرة " value="<?php echo $client[$client_table_address]; ?>" name="address" >
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="field-6" class="control-label">البريد الالكتروني</label>
                                                                <input type="text" class="form-control"   placeholder="example@a.com" name="email" value="<?php echo $client[$client_table_email]; ?>" >
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="field-4" class="control-label">جهة الاتصال</label>
                                                                <input type="text" class="form-control"   placeholder="فراس" name="contact_name" value="<?php echo $client[$client_table_contact_name]; ?>" >
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="field-5" class="control-label">رقم الهاتف</label>
                                                                <input type="tel"   class="form-control"   placeholder="0567575182" name="tel"  value="<?php echo $client[$client_table_tel]; ?>">
                                                            </div>
                                                        </div>
                                                      
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