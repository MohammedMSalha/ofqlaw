
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
                                    <h4 class="page-title">التقرير العام</h4>
                        
                                </div>
                            </div>
                        </div>  
                        <form action="<?php echo BASE_URL; ?>" method="GET">

                    <div class="row">
                        <div class="col-md-3">
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
                        <div class="col-md-3">
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
                                                    <th>العملة</th>
                                                    <th>عدد الملفات الكلي</th>
                                                    <th>قيمة الدين</th>
                                                    <th>المبلغ المحصل</th>
                                                   

                                                </tr>
                                            </thead>
                                        
                                        
                                            <tbody>
                                                <?php 
                                                if(isset($_GET['client']) && trim($_GET['client'])!=null){
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
                                                $usd=CreateTables::get_meta_id_by_value('USD');
                                                $ils=CreateTables::get_meta_id_by_value('ILS');
                                                $jod=CreateTables::get_meta_id_by_value('JOD');
                                                $files_usd;
                                                $files_ils;
                                                $files_jod;
                                                if(isset($_GET['date1']) && isset($_GET['date2']) && trim($_GET['date2'])==null && trim($_GET['date1'])!=null){
                                                    $date2=date('Y-m-d');
                                                    $files_usd=CreateTables::get_all_files_clients_currency($_GET['client'],$usd[0][$meta_table_id],$_GET['date1'],$date2);
                                                    $files_ils=CreateTables::get_all_files_clients_currency($_GET['client'],$ils[0][$meta_table_id],$_GET['date1'],$date2);
                                                    $files_jod=CreateTables::get_all_files_clients_currency($_GET['client'],$jod[0][$meta_table_id],$_GET['date1'],$date2);
                                                }else if (isset($_GET['date1']) && isset($_GET['date2']) && trim($_GET['date1'])==null && trim($_GET['date2'])!=null){
                                                    $date2=date('Y-m-d');
                                                    $files_usd=CreateTables::get_all_files_clients_currency($_GET['client'],$usd[0][$meta_table_id],$date2,$date2);
                                                    $files_ils=CreateTables::get_all_files_clients_currency($_GET['client'],$ils[0][$meta_table_id],$date2,$date2);
                                                    $files_jod=CreateTables::get_all_files_clients_currency($_GET['client'],$jod[0][$meta_table_id],$date2,$date2);
                                                }else if (isset($_GET['date1']) && isset($_GET['date2']) && trim($_GET['date1'])!=null && trim($_GET['date2'])!=null){
                                                    $date1=date('Y-m-d');
                                                    $files_usd=CreateTables::get_all_files_clients_currency($_GET['client'],$usd[0][$meta_table_id],$_GET['date1'],$_GET['date2']);
                                                    $files_ils=CreateTables::get_all_files_clients_currency($_GET['client'],$ils[0][$meta_table_id],$_GET['date1'],$_GET['date2']);
                                                    $files_jod=CreateTables::get_all_files_clients_currency($_GET['client'],$jod[0][$meta_table_id],$_GET['date1'],$_GET['date2']);
                                                }else{
                                                    $date1=date('Y-m-d');
                                                    $files_usd=CreateTables::get_all_files_clients_currency($_GET['client'],$usd[0][$meta_table_id],null,null);
                                                    $files_ils=CreateTables::get_all_files_clients_currency($_GET['client'],$ils[0][$meta_table_id],null,null);
                                                    $files_jod=CreateTables::get_all_files_clients_currency($_GET['client'],$jod[0][$meta_table_id],null,null);
                                                }
                                               
                                                $count_usd=0;
                                                $count_usd_paid=0;
                                                $count_ils=0;
                                                $count_ils_paid=0;
                                                $count_jod=0;
                                                $count_jod_paid=0;
                                                if($files_usd){
                                                   foreach($files_usd as $file){
                                                        $count_usd=$count_usd+$file[$file_table_due];
                                                        $count_usd_paid=$count_usd_paid+$file[$file_table_paid];
                                                    } 
                                                }
                                                if($files_jod){
                                                    foreach($files_jod as $file){
                                                         $count_jod=$count_jod+$file[$file_table_due];
                                                         $count_jod_paid=$count_jod_paid+$file[$file_table_paid];
                                                    } 
                                                 }
                                                 if($files_ils){
                                                    foreach($files_ils as $file){
                                                         $count_ils=$count_ils+$file[$file_table_due];
                                                         $count_ils_paid=$count_ils_paid+$file[$file_table_paid];
                                                    } 
                                                 }
                                               ?>
                                                <tr>
                                                    <td><?php echo $usd[0][$meta_table_name]; ?></td>
                                                    <td><?php echo count($files_usd); ?></td>
                                                    <td><?php echo $count_usd; ?></td>
                                                    <td><?php echo $count_usd_paid; ?></td>
                                                    

                                                </tr>
                                                <tr>
                                                    <td><?php echo $ils[0][$meta_table_name]; ?></td>
                                                    <td><?php echo count($files_ils); ?></td>
                                                    <td><?php echo $count_ils; ?></td>
                                                    <td><?php echo $count_ils_paid; ?></td>
                                                    

                                                </tr>
  
                                                <tr>
                                                    <td><?php echo $jod[0][$meta_table_name]; ?></td>
                                                    <td><?php echo count($files_jod); ?></td>
                                                    <td><?php echo $count_jod; ?></td>
                                                    <td><?php echo $count_jod_paid; ?></td>
                                                    

                                                </tr>
  
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                        
                                    </div> <!-- end card body-->
                                </div> <!-- end card -->
                            </div><!-- end col-->
                        </div>
                        <!-- end row-->
                        </div>
                            </div>
                        </div>                          