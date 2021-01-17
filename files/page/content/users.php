
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
                                    <h4 class="page-title">المستخدمين</h4>
                                    <?php
                                    Global $notify;
                                    if($notify=='user_added'){
                                        echo "<div class='alert alert-success' role='alert'>
                                                 <i class='mdi mdi-check-all mr-2'></i> <strong>تم بنجاح</strong> إضافة مستخدم جديد
                                            </div>";
                                    }else if($notify=='user_error'){
                                        echo "<div class='alert alert-danger' role='alert'>
                                                <i class='mdi mdi-check-all mr-2'></i> <strong>حدث خطأ ! </strong> الرجاء المحاولة مرة اخرى
                                              </div>";
                                    }
                                    if($notify=='user_updated'){
                                        echo "<div class='alert alert-success' role='alert'>
                                                 <i class='mdi mdi-check-all mr-2'></i> <strong>تم بنجاح</strong> تحديث بيانات المستخدم
                                            </div>";
                                    }else if($notify=='update_error'){
                                        echo "<div class='alert alert-danger' role='alert'>
                                                <i class='mdi mdi-check-all mr-2'></i> <strong>حدث خطأ ! </strong> أثناء تحديث بيانات المستخدم
                                              </div>";
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">

                                        <h4 class="header-title"> <!-- Responsive modal -->
                                        <button type="button" class="btn btn-success waves-effect waves-light" data-toggle="modal" data-target="#con-close-modal">اضافة مستخدم جديد</button></h4>
                                       

                                        <table id="datatable-buttons" class="table table-striped dt-responsive nowrap">
                                            <thead>
                                                <tr>
                                                <th>#</th>
                                                    <th>اسم المستخدم</th>
                                                    <th>البريد الالكتروني</th>
                                                    <th>النوع</th>
                                                    <th>تاريخ التسجيل</th>
                                                    <th>الحالة</th>
                                                    <th></th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                        
                                            <?php 
                                           Global $user_table;
                                           Global $user_table_id;
                                           Global $user_table_login;
                                           Global $user_table_pass;
                                           Global $user_table_nicename;
                                           Global $user_table_email;
                                           Global $user_table_registered;
                                           Global $user_table_type;
                                           Global $user_table_status;
                                            $users=CreateTables::get_all_users();

                                            ?>
                                            <tbody>
                                                <?php 
                                                if($users){
                                                    foreach($users as $user){
                                                        Global $meta_table_name;
 
                                                ?>
                                                      <!-- end row-->
                      
                                                <tr>
                                                    <td><?php echo $user[$user_table_id]; ?></td>
                                                    <td><?php echo $user[$user_table_login]; ?></td>
                                                    <td><?php echo $user[$user_table_email]; ?></td>
                                                    
                                                    <td><?php if($user[$user_table_type]==1){ echo 'مسؤول';}else{ echo 'مستخدم عادي'; } ?></td>
                                                    <td><?php echo $user[$user_table_registered]; ?></td>
                                                    <td><?php if($user[$user_table_status]==0){ echo 'فعال'; }elseif($user[$user_table_status]==1){ echo 'معطل'; } ?></td>

    <td>                                        <button type="button" class="btn btn-success waves-effect waves-light" data-toggle="modal" data-target="#con-close-modal-<?php echo $user[$user_table_id]; ?>"><i class="fe-edit-2"></i></button></h4>
</td>
                                                    <td></td>

                                                </tr>
                                               <?php 
                                                    }
                                                }
                                               ?>
                                            </tbody>
                                        </table>
                                        
                                    </div> <!-- end card body-->
                                </div> <!-- end card -->
                            </div><!-- end col-->
                        </div>

                        <?php 
                                           Global $user_table;
                                           Global $user_table_id;
                                           Global $user_table_login;
                                           Global $user_table_pass;
                                           Global $user_table_nicename;
                                           Global $user_table_email;
                                           Global $user_table_registered;
                                           Global $user_table_type;
                                           Global $user_table_status;
                                            $users=CreateTables::get_all_users();

                                            ?>
                                            <tbody>
                                                <?php 
                                                if($users){
                                                    foreach($users as $user){
                                                        Global $meta_table_name;
 
                                                ?>


<div id="con-close-modal-<?php echo $user[$user_table_id]; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">تعديل المستخدم</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                </div>
                                                <div class="modal-body p-4">
                                                <form action="<?php echo BASE_URL; ?>" method="post">
    
                                                <div class="row">
 
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="field-1" class="control-label">اسم المستخدم</label>
                                                                <input type="hidden" class="form-control"  value="<?php echo $user[$user_table_id]; ?>" name="id" required>

                                                                <input type="text" class="form-control" id="field-1" placeholder="ادخل اسم المستخدم" name="username_update" value="<?php echo $user[$user_table_login]; ?>" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="field-2" class="control-label">نوع المستخدم</label>
                                                                <select class="form-control" id="example-select" name="type" required>
                                                                    <option disabled value="" selected>اختر النوع</option>
                                                                    <option value="1" <?php if($user[$user_table_type]==1){ echo 'selected'; } ?> >مسؤول</option>
                                                                    <option value="2" <?php if($user[$user_table_type]==2){ echo 'selected'; } ?>>مستخدم عادي</option>
                                
                                                                    
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="field-3" class="control-label">الاسم كامل</label>
                                                                <input type="text" class="form-control" id="field-3" placeholder="ادخل الاسم بالكامل" name="nicename" value="<?php echo $user[$user_table_nicename]; ?>" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="field-6" class="control-label">البريد الالكتروني</label>
                                                                <input type="text" class="form-control" id="field-6" placeholder="ادخل البريد الالكتروني" name="email" value="<?php echo $user[$user_table_email]; ?>"  required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="field-4" class="control-label">كلمة المرور</label>
                                                                <input type="password" class="form-control" id="field-4" placeholder="ادخل كلمة المرور" name="password" >
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                 <input id="checkbox-12" type="checkbox" name="disabled" <?php if($user[$user_table_status]==1){ echo 'checked'; } ?> >
                                                <label for="checkbox-12">
                                                    تعطيل
                                                </label>
                                        
                                                           
                                                            </div>
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
<?php 
                                                    }
                                                }
                                               ?>
                        <!-- end row-->
                        <div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">اضافة مستخدم جديد</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                </div>
                                                <div class="modal-body p-4">
                                                <form action="<?php echo BASE_URL; ?>" method="post">
    
                                                <div class="row">
 
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="field-1" class="control-label">اسم المستخدم</label>
                                                                <input type="text" class="form-control" id="field-1" placeholder="ادخل اسم المستخدم" name="username" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="field-2" class="control-label">نوع المستخدم</label>
                                                                <select class="form-control" id="example-select" name="type" required>
                                                                    <option disabled value="" selected>اختر النوع</option>
                                                                    <option value="1">مسؤول</option>
                                                                    <option value="2">مستخدم عادي</option>
                                
                                                                    
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="field-3" class="control-label">الاسم كامل</label>
                                                                <input type="text" class="form-control" id="field-3" placeholder="ادخل الاسم كامل" name="nicename" >
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="field-6" class="control-label">البريد الالكتروني</label>
                                                                <input type="text" class="form-control" id="field-6" placeholder="ادخل البريد الالكتروني" name="email" >
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="field-4" class="control-label">كلمة المرور</label>
                                                                <input type="password" class="form-control" id="field-4" placeholder="كلمة المرور" name="password" >
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