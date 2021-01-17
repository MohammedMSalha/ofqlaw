
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
                                    <h4 class="page-title">تقرير الرسوم والطوابع</h4>
                        
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
                                                <th>اسم الخصم</th>
                                                    <th>رقم الملف</th>
                                                    <th>قيمة الملف</th>
                                                    <th>العملة</th>
                                                    <th>قيمة الرسوم</th>
                                                    <th>العملة</th>
                                                    <th>قيمة الطوابع</th>
                                                    <th>العملة</th>

                                                </tr>
                                            </thead>
                                        
                                        
                                            <tbody>
                                                <?php 
                                                $files=null;
                                                $fees_all=0;
                                                $stamps_all=0;
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
                                                Global $payments_table_value;
                                                Global $dues_table;
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
                                                if(isset($_GET['date1']) && isset($_GET['date2']) && trim($_GET['date2'])==null && trim($_GET['date1'])!=null){
                                                    $date2=date('Y-m-d');
                                                    $files=CreateTables::get_client_files($_GET['client'],$_GET['date1'],$date2);
                                                }else if (isset($_GET['date1']) && isset($_GET['date2']) && trim($_GET['date1'])==null && trim($_GET['date2'])!=null){
                                                    $date2=date('Y-m-d');
                                                    $files=CreateTables::get_client_files($_GET['client'],$date2,$date2);                    
                                                }else if (isset($_GET['date1']) && isset($_GET['date2']) && trim($_GET['date1'])!=null && trim($_GET['date2'])!=null){
                                                    $date1=date('Y-m-d');
                                                    $files=CreateTables::get_client_files($_GET['client'],$_GET['date1'],$_GET['date2']);                    
                                                   
                                                }else{
                                                    $date1=date('Y-m-d');
                                                    $files=CreateTables::get_client_files($_GET['client'],null,null);                    
                                                  
                                                }
                                                if($files){
                                                    foreach($files as $file){
                                                    $opp=CreateTables::get_opp_by_file_id($file[$file_table_id]); 
                                                    $file_currency=CreateTables::get_meta_name_by_id($file[$file_table_currency]); 
                                                    $fees_id=CreateTables::get_meta_id_by_value('fees');
                                                    $stamps_id=CreateTables::get_meta_id_by_value('stamp');

                                                    $fees_currency=CreateTables::get_meta_id_by_value('ILS');  
                                                    $stamps_currency=CreateTables::get_meta_id_by_value('JOD');  

                                                    $fees=CreateTables::get_dues_file_by_type($fees_id[0][$meta_table_id],$file[$file_table_id]);
                                                    $stamps=CreateTables::get_dues_file_by_type($stamps_id[0][$meta_table_id],$file[$file_table_id]);
 
                                                    $fees_count=0;
                                                    $stamps_count=0;
                                                    if($fees){
                                                        foreach($fees as $fee){
                                                            $fees_count=$fees_count+$fee[$dues_table_value];
                                                        }
                                                    }
                                                    if($stamps){
                                                        foreach($stamps as $stamp){
                                                            $stamps_count=$stamps_count+$stamp[$dues_table_value];
                                                        }
                                                    }
                                                    $fees_all=$fees_all+$fees_count;
                                                    $stamps_all=$stamps_all+$stamps_count;
                                               ?>
                                                <tr>
                                                    <td><?php echo $opp[0][$opponents_table_name]; ?></td>
                                                    <td><?php echo $file[$file_table_number]; ?></td>
                                                    <td><?php echo $file[$file_table_due]; ?></td>
                                                    <td><?php echo $file_currency[0][$meta_table_name]; ?></td>
                                                    <td><?php echo $fees_count; ?></td>
                                                    <td><?php echo $fees_currency[0][$meta_table_name]; ?></td>
                                                    <td><?php echo $stamps_count; ?></td>
                                                    <td><?php echo $stamps_currency[0][$meta_table_name]; ?></td>
                                                    

                                                </tr>
                                              
  
                                                <?php 
                                                    }
                                                }
                                            } 
                                            ?>
                                            </tbody>
                                            <tfoot>
                                            <tr>
                                                    <td>المجموع</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td style="    background: #566676;
    color: #fff;"><?php echo $fees_all; ?></td>
                                                    <td></td>
                                                    <td style="    background: #566676;
    color: #fff;"><?php echo $stamps_all; ?></td>
                                                    <td></td>
                                                    

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