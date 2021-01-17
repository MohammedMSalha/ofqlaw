
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
                                    <h4 class="page-title">الاعدادات العامة</h4>
                                    <?php
                                    Global $notify;
                                    if($notify=='meta_added'){
                                        echo "<div class='alert alert-success' role='alert'>
                                                 <i class='mdi mdi-check-all mr-2'></i> <strong>تم بنجاح</strong> إضافة عنصر جديد
                                            </div>";
                                    }else if($notify=='meta_error'){
                                        echo "<div class='alert alert-danger' role='alert'>
                                                <i class='mdi mdi-check-all mr-2'></i> <strong>حدث خطأ ! </strong> الرجاء المحاولة مرة اخرى
                                              </div>";
                                    }


                                    if($notify=='meta_deleted'){
                                        echo "<div class='alert alert-success' role='alert'>
                                                 <i class='mdi mdi-check-all mr-2'></i> <strong>تم بنجاح</strong> حذف العنصر
                                            </div>";
                                    }else if($notify=='error_deleted'){
                                        echo "<div class='alert alert-danger' role='alert'>
                                                <i class='mdi mdi-check-all mr-2'></i> <strong>حدث خطأ ! </strong> الرجاء المحاولة مرة اخرى
                                              </div>";
                                    }


                                    if($notify=='meta_updated'){
                                        echo "<div class='alert alert-success' role='alert'>
                                                 <i class='mdi mdi-check-all mr-2'></i> <strong>تم بنجاح</strong> تعديل العنصر
                                            </div>";
                                    }else if($notify=='error_updated'){
                                        echo "<div class='alert alert-danger' role='alert'>
                                                <i class='mdi mdi-check-all mr-2'></i> <strong>حدث خطأ ! </strong> الرجاء المحاولة مرة اخرى
                                              </div>";
                                    }
                                   
                                    ?>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 
                        <div class="row">
                            <div class="col-12">
                                <div class="card-box">
                                        <h4 class="header-title"> <!-- Responsive modal -->
                                        <button type="button" class="btn btn-success waves-effect waves-light" data-toggle="modal" data-target="#con-close-modal">اضافة جديد</button></h4>
                                        <div class="mb-2">
                                        <div class="row">
                                            <div class="col-12 text-sm-center form-inline">
                                                <div class="form-group mr-2" style="display:none;">
                                                    <select id="demo-foo-filter-status" class="custom-select custom-select-sm">
                                                        <option value="">اختر النوع</option>
                                                        <option value="شخصي">شخصي</option>
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
                                        <table id="demo-foo-filtering" class="table toggle-circle mb-0" data-page-size="7">
                                            <thead>
                                                <tr>   
                                                    <th>النوع</th>
                                                    <th>الاسم</th>
                                                 
                                                    <th>القيمة</th>
                                                    <th></th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php 
                                             Global $meta_table;
                                             Global $meta_table_id;
                                             Global $meta_table_userid;
                                             Global $meta_table_name;
                                             Global $meta_table_type;
                                             Global $meta_table_value;
                                             Global $meta_table_registered;
                                             Global $meta_table_status;
                                            $metas=CreateTables::get_all_meta();

                                            ?>
                                           
                                                <?php 
                                                if($metas){
                                                    foreach($metas as $meta){
                                                       
 
                                                ?>
                                                <tr>
                                                <td><?php if($meta[$meta_table_type]!=null){ echo $meta[$meta_table_type]; }else{ echo 'لا يوجد'; } ?></td>
                                                    <td><?php echo $meta[$meta_table_name]; ?></td>
                                                    
                                                    <td><?php if($meta[$meta_table_value]!=null){ echo $meta[$meta_table_value]; }else{ echo 'لا يوجد'; } ?></td>
                                                    <td> <button type="button" class="btn btn-success waves-effect waves-light mr-2" data-toggle="modal" data-target="#con-close-modal-<?php echo $meta[$meta_table_id]; ?>"><i class="fe-edit-2"></i></button><button type="button" class="btn btn-danger waves-effect waves-light" data-toggle="modal" data-target="#con-close-modal-delete-<?php echo $meta[$meta_table_id]; ?>"><i class="fe-trash"></i></button></td>
 
                                               
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
                                                    <h4 class="modal-title">اضافة عنصر جديد</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                </div>
                                                <div class="modal-body p-4">
                                                <form action="<?php echo BASE_URL; ?>" method="post" >
    
                                                <div class="row">
 
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="field-1" class="control-label">اسم العنصر</label>
                                                                <input type="text" class="form-control"   placeholder="شيك" name="meta_name" required>
                                                                                                                               
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="field-2" class="control-label">النوع</label>
                                                                <select class="form-control"   name="meta_type" required>
                                                                    <option disabled value="" selected>اختر النوع</option>
                                                                    <option value="currency">عملة</option>
                                                                    <option value="dues_type">نوع المستحق</option>
                                                                    <option value="file_status">حالة الملف</option>
                                                                    <option value="file">نوع الملف</option>
                                                                    <option value="payment_type">نوع الدفع</option>
                                                                    <option value="payment_desc">وصف الدفعه</option>

                                                                    

                                                                    
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="field-3" class="control-label">القيمة</label>
                                                                <input type="text" class="form-control"   placeholder="USD" name="value" required>
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
                                           Global $meta_table;
                                           Global $meta_table_id;
                                           Global $meta_table_userid;
                                           Global $meta_table_name;
                                           Global $meta_table_type;
                                           Global $meta_table_value;
                                           Global $meta_table_registered;
                                           Global $meta_table_status;
                                          $metas=CreateTables::get_all_meta();
                                            if($metas){
                                                foreach($metas as $meta){
                                                    
                                            ?>
                                            <div id="con-close-modal-delete-<?php echo $meta[$meta_table_id]; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                            <form action="<?php echo BASE_URL; ?>" method="post">

                                                <div class="modal-header">
                                                    <h4 class="modal-title">حذف العنصر</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                </div>
                                                <div class="modal-body p-4">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            العنصر : <?php echo $meta[$meta_table_name]; ?>
                                                            <input type="hidden" name="meta_id_delete" value="<?php echo $meta[$meta_table_id]; ?>">

                                                            
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
                        <div id="con-close-modal-<?php echo $meta[$meta_table_id];?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">تعديل العنصر</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                </div>
                                                <div class="modal-body p-4">
                                                <form action="<?php echo BASE_URL; ?>" method="post">
    
                                                <div class="row">
 
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="field-1" class="control-label">اسم العنصر</label>
                                                                <input type="hidden" name="edit_meta" value="<?php echo $meta[$meta_table_id]; ?>">
                                                                <input type="text" class="form-control"   value="<?php echo $meta[$meta_table_name]; ?>" name="meta_name_edit" required>
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