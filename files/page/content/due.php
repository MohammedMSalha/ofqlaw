
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
                                    <h4 class="page-title">سندات الدين</h4>
                                   
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
                                                        <option value="">اختر النوع</option>
                                                        <option value="شيك">شيك</option>
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
                                                    <th  data-toggle="true">رقم المستحق</th>
                                                    <th>الملف</th>
                                                    <th>القيمة</th>
                                                    <th>العملة </th>
                                                    <th>النوع</th>
                                                    <th data-hide="phone, tablet">الخصم</th>
                                                    <th data-hide="phone, tablet">تاريخ الانشاء</th>
                                                    <th data-hide="phone, tablet">تم الانشاء بواسطة</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php 
                                             Global $dues_table_id;
                                             Global $dues_table_type;
                                             Global $dues_table_value;
                                             Global $dues_table_currency;
                                             Global $dues_table_date;
                                             Global $dues_table_file_id;
                                             Global $dues_table_status;
                                             Global $dues_table_opp;
                                             Global $dues_table_number;
                                             Global $dues_table_userid;
                                             Global $meta_table_userid;
                                             Global $meta_table_name;
                                             Global $meta_table_type;
                                             Global $meta_table_value;
                                             Global $opponents_table_name;
                                            $dues=CreateTables::get_all_dues_data();

                                            ?>
                                           
                                                <?php 
                                                if($dues){
                                                    foreach($dues as $due){
                                                        $user=CreateTables::get_user_by_id($due[$dues_table_userid]);
                                                        Global $user_table_login;
                                                        Global $user_table_nicename;
                                                        $type=CreateTables::get_meta_name_by_id($due[$dues_table_type]);
                                                        $currency=CreateTables::get_meta_name_by_id($due[$dues_table_currency]);
                                                        $opp=CreateTables::get_opp_by_id($due[$dues_table_opp]);
                                                        
                                                ?>
                                                <tr>
                                                    <td><?php echo $due[$dues_table_number]; ?></td>
                                                    <td><?php if($due[$dues_table_file_id]!=null){  ?> <a class="btn btn-success waves-effect waves-light" href='/files/edit/?id=<?php echo $due[$dues_table_file_id]; ?>'><span class="btn-label"><i class=" mdi mdi-file-table-outline"></i></span>عرض الملف</a> <?php  }else{ echo 'لا يوجد'; } ?></td>
                                                    <td><?php echo $due[$dues_table_value]; ?></td>
                                                    <td><?php echo $currency[0][$meta_table_name]; ?></td>
                                                    <td><?php echo $type[0][$meta_table_name]; ?></td>
                                                    <td><?php echo $opp[0][$opponents_table_name]; ?></td>
                                                    <td><?php echo $due[$dues_table_date]; ?></td>
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
                                        </div> <!-- end .table-responsive-->
                                </div> <!-- end card-box -->
                            </div> <!-- end col -->
                        </div>
        
       