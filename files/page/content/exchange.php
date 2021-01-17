
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
                                    <h4 class="page-title">اسعار الصرف</h4>
                                    <?php
                                    Global $notify;
                                    if($notify=='exchange_add'){
                                        echo "<div class='alert alert-success' role='alert'>
                                                 <i class='mdi mdi-check-all mr-2'></i> <strong>تم بنجاح</strong> اضافة معدل التحويل
                                            </div>";
                                    }else if($notify=='exhange_error'){
                                        echo "<div class='alert alert-danger' role='alert'>
                                                <i class='mdi mdi-check-all mr-2'></i> <strong>حدث خطأ ! </strong> الرجاء المحاولة مرة اخرى
                                              </div>";
                                    }

                                    if($notify=='currency_deleted'){
                                        echo "<div class='alert alert-success' role='alert'>
                                                 <i class='mdi mdi-check-all mr-2'></i> <strong>تم بنجاح</strong> حذف سعر الصرف
                                            </div>";
                                    }else if($notify=='exhange_error'){
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
                                <button type="button" class="btn btn-success waves-effect waves-light mr-2 mb-2" data-toggle="modal" data-target="#con-close-modal">اضافة</button> 
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
                                                    <th data-toggle="true">العملة</th>
                                                    
                                                    <th>القيمة بالدولار</th>
                                                    <th>التاريخ</th>
                                                    <th></th>
                        
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php 
                                            Global $currency_table_id;
                                            Global $currency_table_type;
                                            Global $currency_table_value;
                                            Global $currency_table_date;
                                            Global $meta_table_name;
                                            Global $meta_table_type;
                                            Global $meta_table_value;
                                            $currency=CreateTables::get_all_currecny();

                                            ?>
                                           
                                                <?php 
                                                if($currency){
                                                    foreach($currency as $data){
                                                        $c=CreateTables::get_meta_name_by_id($data[$currency_table_type]);

                                                        $date=date('Y-m-d',strtotime($data[$currency_table_date]));
                                                ?>
                                                <tr>
                                                    <td><?php echo $c[0][$meta_table_name]; ?></td>
                                                    <td><?php if($data[$currency_table_value]!=null){ echo $data[$currency_table_value]; }else{ echo 'لا يوجد'; } ?></td>
                                                    <td><?php if($date!=null){  echo $date;  }else{ echo 'لا يوجد'; } ?></td>
                                                    <td  > <button type="button" class="btn btn-danger waves-effect waves-light" data-toggle="modal" data-target="#con-close-modal-delete-<?php echo $data[$currency_table_id]; ?>"><i class="fe-trash"></i></button></td>

                                                   
 
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
                                                    <h4 class="modal-title">اضافة سعر التحويل</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                </div>
                                                <div class="modal-body p-4">
                                                <form action="<?php echo BASE_URL; ?>" method="post" >
                                                <div class="alert alert-warning bg-warning text-white border-0" role="alert">
                                         <strong>تنبيه</strong> سعر صرف العملات يكون مقابل الدولار
                                    </div>
                                                <div class="row">
 
                                                        
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="field-2" class="control-label">اختر العملة</label>
                                                                <?php 
                                                         $currencies=CreateTables::get_all_currency();
                                                         Global $meta_table_name;
                                                         Global $meta_table_id;
                                                         Global $meta_table_value;
                                                        ?>
                                                        <select class="form-control" name="currency">
                                                        <option selected disabled value="">اختر العملة</option>
                                                        <?php 
                                                        if($currencies){
                                            
                                                            foreach($currencies as $currency){ 
                                                                if($currency[$meta_table_value]!='USD'){
                                                        ?>
                                                            <option value="<?php echo $currency[$meta_table_id]; ?>"><?php echo $currency[$meta_table_name]; ?></option>
                                                        <?php
                                                                }
                                                            }
                                                        }
                                                        ?>
                                                        </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="field-3" class="control-label">القيمة</label>
                                                                <input type="text" class="form-control"   placeholder="ادخل قيمة التحويل" name="rate" >
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
                                                        $currency=CreateTables::get_all_currecny();
                                                        if($currency){
                                                            foreach($currency as $data){
                                                        ?>
                                 
                                            <div id="con-close-modal-delete-<?php echo $data[$currency_table_id]; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                            <form action="<?php echo BASE_URL; ?>" method="post">

                                                <div class="modal-header">
                                                    <h4 class="modal-title">حذف سعر الصرف</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                </div>
                                                <div class="modal-body p-4">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            سعر الصرف : <?php echo $data[$currency_table_value]; ?>
                                                            <input type="hidden" name="currency_id_delete" value="<?php echo $data[$currency_table_id]; ?>">

                                                            
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