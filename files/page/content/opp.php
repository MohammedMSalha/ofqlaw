<div class="content-page">

  

                <div class="content" >

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
                                    <h4 class="page-title">الخصوم</h4>
                                   
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
                                        
                                        <div class="mb-2">
                                        <div class="row">
                                            <div class="col-12 text-sm-center form-inline">
                                                <div style="display:none;" class="form-group mr-2">
                                                    <select id="demo-foo-filter-status" class="custom-select custom-select-sm" >
                                                        <option value="">اختر الصفة</option>
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
                                        <table id="demo-foo-filtering" class="table table-centered table-striped  mb-0 toggle-circle" data-page-size="7">
                                            <thead>
                                                <tr>
                                                    <th data-toggle="true">اسم الخصم</th>
                                                    
                                                    <th>رقم الهوية</th>
                                                    <th>الملف</th>
                                                    <th data-hide="phone, tablet">رقم الملف</th>
                                                    <th data-hide="phone, tablet">قيمة الملف</th>
                                                    <th data-hide="phone, tablet">ملاحظات</th>
                        
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php 
                                            Global $opponents_table_registered;
                                             Global $opponents_table;
                                             Global $opponents_table_id;
                                             Global $opponents_table_file_id;
                                             Global $opponents_table_name;
                                             Global $opponents_table_ID_number;
                                             Global $opponents_table_note;
                                             Global $opponents_table_status;
                                             Global $opponents_table_userid;

                                            $opps=CreateTables::get_opp();

                                            ?>
                                           
                                                <?php 
                                                if($opps){
                                                    foreach($opps as $opp){
                                                        $user=CreateTables::get_user_by_id($opp[$opponents_table_userid]);
                                                        Global $user_table_login;
                                                        Global $user_table_nicename;
                                                        Global $file_table_id;
                                                        Global $file_table_client_id;
                                                        Global $file_table_type;
                                                        Global $file_table_number;
                                                        Global $file_table_currency;
                                                        Global $file_table_note;
                                                        Global $file_table_due;
                                                        Global $file_table_paid;
                                                Global $file_table_paid_out;
                                                        Global $file_table_registered;
                                                        Global $file_table_status;
                                                        $file_data=CreateTables::get_all_file_data($opp[$opponents_table_file_id]);

                                                ?>
                                                <tr>
                                                    <td><?php echo $opp[$opponents_table_name]; ?></td>
                                                    <td><?php if($opp[$opponents_table_ID_number]!=null){ echo $opp[$opponents_table_ID_number]; }else{ echo 'لا يوجد'; } ?></td>
                                                    <td><?php if($opp[$opponents_table_file_id]!=null){  ?> <a class="btn btn-success waves-effect waves-light" href='/files/edit/?id=<?php echo $opp[$opponents_table_file_id]; ?>'><span class="btn-label"><i class=" mdi mdi-file-table-outline"></i></span>عرض الملف</a> <?php  }else{ echo 'لا يوجد'; } ?></td>
                                                    <td><?php if($file_data[0][$file_table_number]!=null){ echo $file_data[0][$file_table_number]; }else{ echo 'لا يوجد'; } ?></td>
                                                    <td><?php if($file_data[0][$file_table_due]!=null){ echo $file_data[0][$file_table_due]; }else{ echo 'لا يوجد'; } ?></td>
                                                    <td><?php if($opp[$opponents_table_note]!=null){ echo $opp[$opponents_table_note]; }else{ echo 'لا يوجد'; } ?></td>
                                                   
 
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
        
       