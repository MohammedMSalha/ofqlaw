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
                                    <h4 class="page-title">سجل الحركات</h4>
                                   
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
                                                    <th>المستخدم</th>
                                                    <th>الوصف</th>
                                                    <th>التاريخ</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php 
                                            Global $log_table;
                                            Global $log_table_id;
                                            Global $log_table_userid;
                                            Global $log_table_desc;
                                            Global $log_table_date;
                                            Global $user_table;
                                            Global $user_table_id;

                                            $logs=CreateTables::get_logs();

                                            ?>
                                           
                                                <?php 
                                                if($logs){
                                                    foreach($logs as $log){
                                                        $user=CreateTables::get_user_by_id($log[$log_table_userid]);
                                                        Global $user_table_login;
                                                        Global $user_table_nicename;
               
                                                ?>
                                                <tr>
                                                    <td><?php echo $user[0][$user_table_nicename]; ?></td>
                                                    <td><?php echo $log[$log_table_desc]; ?></td>
                                                    <td><?php echo $log[$log_table_date];  ?></td>
                            
 
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
        
       