
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
                                    <h4 class="page-title">الملفات</h4>
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
                                    if($notify=='file_deleted'){
                                        echo "<div class='alert alert-success' role='alert'>
                                                 <i class='mdi mdi-check-all mr-2'></i> <strong>تم بنجاح</strong> حذف الملف
                                            </div>";
                                    }else if($notify=='error_file'){
                                        echo "<div class='alert alert-danger' role='alert'>
                                                <i class='mdi mdi-check-all mr-2'></i> <strong>حدث خطأ ! </strong> الرجاء المحاولة مرة اخرى
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
                                <div class="card">
                                    <div class="card-body">

                                        <h4 class="header-title"> <!-- Responsive modal -->
                                        <a  class="btn btn-success waves-effect waves-light" href="/files/create/">ملف جديد</a></h4>
                                        <div class="mb-2">
                                        <div class="row">
                                            <div class="col-12 text-sm-center form-inline">
                                                <div class="form-group mr-2">
                                                    <select id="demo-foo-filter-status" class="custom-select custom-select-sm">
                                                        <option value="">اختر النوع</option>
                                                        <option value="تسوية">تسوية</option>
                                                        <option value="محكمة">محكمة</option>

                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <input id="demo-foo-search" type="text" placeholder="ابحث هنا" class="form-control form-control-sm" autocomplete="on">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                        <?php 
                                        $files=CreateTables::get_all_files_data();
                                        
                                        ?>

<div class="table-responsive">
                                        <table id="demo-foo-filtering" class="table table-centered table-striped  mb-0 toggle-circle" data-page-size="8 ">
                                            <thead>
                                                <tr>
                                                    <th data-toggle="true">رقم الملف</th>
                                                    <th>الموكل</th>
                                                    <th>نوع الملف</th>
                                                    <th>عملة الملف</th>
                                                    <th>حالة الملف</th>
                                                    <th></th>
                                                    <th data-hide="phone, tablet">تاريخ الانشاء</th>
                                                    <th data-hide="phone, tablet">تم الانشاء بواسطة</th>
                                                   
                                                </tr>
                                            </thead>
                                        
                                        
                                            <tbody>
                                                <?php 
                                                Global $file_table_id;
                                                Global $file_table_client_id;
                                                Global $file_table_type;
                                                Global $file_table_number;
                                                Global $file_table_currency;
                                                Global $file_table_note;
                                                Global $file_table_registered;
                                                Global $file_table_status;
                                                Global $file_table_userid;
                                                Global $client_table_name;
                                                Global $meta_table_name;

                                                if($files){
                                                    foreach($files as $file){
                                                        $user=CreateTables::get_user_by_id($file[$file_table_userid]);
                                                        Global $user_table_login;
                                                        Global $user_table_nicename;
                                                        $client=CreateTables::get_client_by_id($file[$file_table_client_id]);
                                                        $currency=CreateTables::get_meta_name_by_id($file[$file_table_currency]);
                                                        $file_type=CreateTables::get_meta_name_by_id($file[$file_table_type]);
                                                        $file_status=CreateTables::get_meta_name_by_id($file[$file_table_status]);
                                                ?>
                                                <tr>
                                                    <td><a href="/files/edit/?id=<?php echo $file[$file_table_id]; ?>"><?php echo $file[$file_table_number]; ?></a></td>
                                                    <td><?php if(isset($client[0][$client_table_name])){ echo $client[0][$client_table_name]; }else{ echo 'غير موجود'; } ?></td>
                                                    <td><?php echo $file_type[0][$meta_table_name]; ?></td>
                                                    <td><?php echo $currency[0][$meta_table_name]; ?></td>
                                                    <td><?php echo $file_status[0][$meta_table_name]; ?></td>
                                                    <td class="text-center"><a class="btn btn-success waves-effect waves-light mr-2" href="/files/edit/?id=<?php echo $file[$file_table_id]; ?>"><span class="btn-label"><i class=" mdi mdi-file-table-outline"></i></span>عرض الملف</a><button type="button" class="btn btn-danger waves-effect waves-light" data-toggle="modal" data-target="#con-close-modal-delete-<?php echo $file[$file_table_id]; ?>"><i class="fe-trash"></i></button></td>
                                                    <td><?php echo date('Y-m-d',strtotime($file[$file_table_registered])); ?></td>
                                                    <td><?php echo $user[0][$user_table_nicename]; ?></td>


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
                                    </div> <!-- end card body-->
                                </div> <!-- end card -->
                            </div><!-- end col-->
                        </div>
                        <!-- end row-->


                        <?php 
                                                Global $file_table_id;
                                                Global $file_table_client_id;
                                                Global $file_table_type;
                                                Global $file_table_number;
                                                Global $file_table_currency;
                                                Global $file_table_note;
                                                Global $file_table_registered;
                                                Global $file_table_status;
                                                Global $client_table_name;
                                                Global $meta_table_name;

                                                if($files){
                                                    foreach($files as $file){
                                                        $client=CreateTables::get_client_by_id($file[$file_table_client_id]);
                                                        $currency=CreateTables::get_meta_name_by_id($file[$file_table_currency]);
                                                        $file_type=CreateTables::get_meta_name_by_id($file[$file_table_type]);
                                                        $file_status=CreateTables::get_meta_name_by_id($file[$file_table_status]);
                                                ?>
                                            <div id="con-close-modal-delete-<?php echo $file[$file_table_id]; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                            <form action="<?php echo BASE_URL; ?>" method="post">

                                                <div class="modal-header">
                                                    <h4 class="modal-title">حذف الملف</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                </div>
                                                <div class="modal-body p-4">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            ملف رقم : <?php echo $file[$file_table_number]; ?>
                                                            <input type="hidden" name="file_id_delete" value="<?php echo $file[$file_table_id]; ?>">

                                                            
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
                   