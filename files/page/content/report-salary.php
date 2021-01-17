
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
                                    <h4 class="page-title">تقرير المبالغ المحصلة</h4>
                        
                                </div>
                            </div>
                        </div>  
                        <form action="<?php echo BASE_URL; ?>" method="GET">

                    <div class="row">
                        <div class="col-md-2">
                                    <div class="form-group mb-3">
                                        
                                        <?php 
                                                        Global $client_table_id;
                                                        Global $client_table_name;
                                                        $clients=CreateTables::get_all_clients();
                                                        ?>
                                                        <select class="form-control" data-toggle="select2" name="client" required>
                                                            <option diabled selected value="">اختر الموكل</option>
                                                            <?php 
                                                            if($clients){
                                            
                                                                foreach($clients as $client){ 
                                                            ?>
                                                                <option <?php if(isset($_GET['client']) && $client[$client_table_id]==$_GET['client']){ echo 'selected'; } ?> value="<?php echo $client[$client_table_id]; ?>"><?php echo $client[$client_table_name]; ?></option>
                                                            <?php
                                                                }
                                                            }
                                                            ?>
                                                            
                                                        </select>
                                    </div>

                        </div>
                        <div class="col-md-2">
                                    <div class="form-group mb-3">
                                        

                                                         <?php 
                                                         $currencies=CreateTables::get_all_currency();
                                                         Global $meta_table_name;
                                                         Global $meta_table_id;
                                                        ?>
                                                        <select class="form-control" name="file_currency" required>
                                                        <option selected disabled value="">اختر العملة</option>
                                                        <?php 
                                                        if($currencies){
                                            
                                                            foreach($currencies as $currency){ 
                                                        ?>
                                                            <option <?php if(isset($_GET['file_currency']) && $currency[$meta_table_id]==$_GET['file_currency']){ echo 'selected'; } ?> value="<?php echo $currency[$meta_table_id]; ?>"><?php echo $currency[$meta_table_name]; ?></option>
                                                        <?php
                                                            }
                                                        }
                                                        ?>
                                                        </select>
                                    </div>

                        </div>
                        <div class="col-md-3">
                                    <div class="form-group mb-3">
                                        
                                        <input type="date"  style='direction: ltr;' name="date1" class="form-control" value="<?php if(isset($_GET['date1'])){ echo $_GET['date1']; } ?>">
                                    </div>

                        </div>
                        <div class="col-md-3">
                                    <div class="form-group mb-3">
                                        
                                        <input type="date" style='direction: ltr;' name="date2" class="form-control" value="<?php if(isset($_GET['date2'])){ echo $_GET['date2']; } ?>">
                                    </div>

                        </div>
                        <div class="col-md-2">
                                    <div class="form-group mb-3">
                                 
                                    <button type="submit" class="btn btn-danger waves-effect waves-light">
                                                    <span class="btn-label"><i class="mdi mdi-briefcase-search"></i></span>ابحث الان
                                                </button>
                                    </div>

                        </div>
                      
                    </div>
                    </form>
                
                    <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">

                                        
                                        

                                        <table id="datatable-buttons" class="table table-striped dt-responsive nowrap" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>اسم الخصم</th>
                                                    <th>رقم الملف</th>
                                                    <th>قيمة الملف</th>
                                                    <th>المبلغ المحصل</th>
                                                    <th>المبلغ المتبقي</th>
                                                    <th>المبلغ المدفوع للموكل</th>


                                                </tr>
                                            </thead>
                                        
                                        
                                            <tbody>
                                                <?php 
                                                $files=null;
                                                $due_count=0;
                                                $paid_count=0;
                                                $paid_out_count=0;
                                                if(isset($_GET['client']) && isset($_GET['file_currency']) && trim($_GET['file_currency'])!=null && trim($_GET['client'])!=null){
                                                 Global $opponents_table_name;
                                                Global $file_table_id;
                                                Global $file_table_client_id;
                                                Global $file_table_type;
                                                Global $file_table_number;
                                                Global $file_table_currency;
                                                Global $file_table_note;
                                                Global $file_table_registered;
                                                Global $file_table_status;
                                                Global $file_table_due;
                                                Global $file_table_paid;
                                                Global $file_table_note;
                                                Global $file_table_paid_out;
                                                Global $meta_table_name;
                                                Global $meta_table_type;
                                                Global $meta_table_value;
                                                Global $meta_table_id;
                                                if(isset($_GET['date1']) && isset($_GET['date2']) && trim($_GET['date2'])==null && trim($_GET['date1'])!=null){
                                                    $date2=date('Y-m-d');
                                                    $files=CreateTables::get_client_files_currency($_GET['file_currency'],$_GET['client'],$_GET['date1'],$date2);
                                                }else if (isset($_GET['date1']) && isset($_GET['date2']) && trim($_GET['date1'])==null && trim($_GET['date2'])!=null){
                                                    $date2=date('Y-m-d');
                                                    $files=CreateTables::get_client_files_currency($_GET['file_currency'],$_GET['client'],$date2,$date2);                    
                                                }else if (isset($_GET['date1']) && isset($_GET['date2']) && trim($_GET['date1'])!=null && trim($_GET['date2'])!=null){
                                                    $date1=date('Y-m-d');
                                                    $files=CreateTables::get_client_files_currency($_GET['file_currency'],$_GET['client'],$_GET['date1'],$_GET['date2']);                    
                                                   
                                                }else{
                                                    $date1=date('Y-m-d');
                                                    $files=CreateTables::get_client_files_currency($_GET['file_currency'],$_GET['client'],null,null);                    
                                                  
                                                }
                                                
                                                if($files){
                                                    foreach($files as $file){
                                                        $opp=CreateTables::get_opp_by_file_id($file[$file_table_id]); 
                                                        $file_currency=CreateTables::get_meta_name_by_id($file[$file_table_currency]);
                                                        $due_count=$due_count+$file[$file_table_due];
                                                        $paid_count=$paid_count+$file[$file_table_paid];
                                                        $paid_out_count=$paid_out_count+$file[$file_table_paid_out];
                                               ?>
                                                <tr>
                                                    <td><?php echo $opp[0][$opponents_table_name]; ?></td>
                                                    <td><?php echo $file[$file_table_number]; ?></td>
                                                    <td><?php echo $file[$file_table_due]; ?></td>
                                                    <td><?php echo $file[$file_table_paid]; ?></td>
                                                    <td><?php if($file[$file_table_due]>$file[$file_table_paid]){ echo $file[$file_table_due]-$file[$file_table_paid]; }else{ echo 0; } ?></td>
                                                    <td><?php echo $file[$file_table_paid_out]; ?></td>


                                                </tr>
    
                                                <?php
                                                 }
                                                }
                                            }
                                                 ?>
                                            </tbody>
                                            <tfoot>
                                            <tr>
                                                    <td style="background: #566676; color: #fff;">المجموع</td>
                                                    <td style="background: #566676; color: #fff;"></td>
                                                    <td style="background: #566676; color: #fff;"><?php echo $due_count; ?></td>
                                                    <td style="background: #566676; color: #fff;"><?php echo $paid_count; ?></td>
                                                    <td style="background: #566676; color: #fff;"><?php if($due_count>$paid_count){ echo $due_count-$paid_count; }else{ echo 0; } ?></td>
                                                    <td style="background: #566676; color: #fff;"><?php echo $paid_out_count; ?></td>


                                                </tr>
                                            </tfoot>
                                        </table>
                                        
                                    </div> <!-- end card body-->
                                </div> <!-- end card -->
                            </div><!-- end col-->
                        </div>
                        <!-- end row-->
                        </div>
                            </div>
                        </div>                          