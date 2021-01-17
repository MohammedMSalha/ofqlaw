<div class="content-page">
    <div class="content">

    <?php 
    Global $page;
    Global $results_per_page;
    Global $page_first_result;
    Global $meta_table_id;
    Global $meta_table_type;
    Global $meta_table_value;
    if (!isset ($_GET['page']) ) {  
        $page = 1;  
    } else {  
        $page = $_GET['page'];  
    }  
    $results_per_page = 7;  
    $page_first_result = ($page-1) * $results_per_page;  
    $fu_meta=CreateTables::get_meta_id_by_value('FU');
    $FU_data=CreateTables::get_payments_by_type($fu_meta[0][$meta_table_id],true);
    $payment_type_1=CreateTables::get_payments_by_type_all(8);
    $payment_type_2=CreateTables::get_payments_by_type_all(9);
    $payment_type_3=CreateTables::get_payments_by_type_all(11);

    ?>
        <!-- Start Content-->
        <div class="container-fluid">
            <input type="hidden" id='in' value="<?php echo count($payment_type_1); ?>">
            <input type="hidden" id='out' value="<?php echo count($payment_type_2); ?>">
            <input type="hidden" id='fu' value="<?php echo count($payment_type_3); ?>">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                        <div class="input-group input-group-sm">
                                                    <input type="text" class="form-control border-white" id="dash-daterange" value="<?php echo date('Y-m-d H:m'); ?>">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text bg-blue border-blue text-white">
                                                            <i class="mdi mdi-calendar-range font-13"></i>
                                                        </span>
                                                    </div>
                                                </div>
                         
                          
                        </div>
                        <h4 class="page-title"><img width="60" src="<?php echo SCRIPT_ROOT.'/images/logo.png'; ?>" alt=""> مكتب أفق للمحاماة </h4>
                     </div>
                </div>
            </div>     
            <!-- end page title --> 
            <?php 
            Global $file_table_status;
            Global $file_table_id;
            Global $meta_table_type;
            Global $meta_table_value;
            $count1=0;
            $count2=0;
            $count3=0;
            $count4=0;
            $files=CreateTables::get_all_files_data();
            if($files){
                foreach($files as $file){
                    $new=CreateTables::get_meta_name_by_id($file[$file_table_status]);
                    if($new[0][$meta_table_value]=='new'){
                        $count1++;
                    }
                    if($new[0][$meta_table_value]=='rounded'){
                        $count2++;
                    }
                    if($new[0][$meta_table_value]=='paid'){
                        $count3++;
                    }
                    if($new[0][$meta_table_value]=='left'){
                        $count4++;
                    }
                }
            }
            
            ?>
            <div class="row">
                <div class="col-md-6 col-xl-3">
                    <div class="widget-rounded-circle card-box">
                        <div class="row">
                            <div class="col-6">
                                <div class="avatar-lg rounded-circle shadow-lg bg-primary border-primary border">
                                    <i class="fe-file-text font-22 avatar-title text-white"></i>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-right">
                                    <h3 class="text-dark mt-1"><span data-plugin="counterup"><?php echo $count1; ?></span></h3>
                                    <p class="text-muted mb-1 text-truncate">ملف جديد</p>
                                </div>
                            </div>
                        </div> <!-- end row-->
                    </div> <!-- end widget-rounded-circle-->
                </div> <!-- end col-->

                <div class="col-md-6 col-xl-3">
                    <div class="widget-rounded-circle card-box">
                        <div class="row">
                            <div class="col-6">
                                <div class="avatar-lg rounded-circle shadow-lg bg-success border-success border">
                                    <i class="fe-target font-22 avatar-title text-white"></i>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-right">
                                    <h3 class="text-dark mt-1"><span data-plugin="counterup"><?php echo $count2; ?></span></h3>
                                    <p class="text-muted mb-1 text-truncate">ملف مدور</p>
                                </div>
                            </div>
                        </div> <!-- end row-->
                    </div> <!-- end widget-rounded-circle-->
                </div> <!-- end col-->

                <div class="col-md-6 col-xl-3">
                    <div class="widget-rounded-circle card-box">
                        <div class="row">
                            <div class="col-6">
                                <div class="avatar-lg rounded-circle shadow-lg bg-info border-info border">
                                    <i class="fe-file font-22 avatar-title text-white"></i>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-right">
                                    <h3 class="text-dark mt-1"><span data-plugin="counterup"><?php echo $count3; ?></span></h3>
                                    <p class="text-muted mb-1 text-truncate">ملف مسدد</p>
                                </div>
                            </div>
                        </div> <!-- end row-->
                    </div> <!-- end widget-rounded-circle-->
                </div> <!-- end col-->

                <div class="col-md-6 col-xl-3">
                    <div class="widget-rounded-circle card-box">
                        <div class="row">
                            <div class="col-6">
                                <div class="avatar-lg rounded-circle shadow-lg bg-warning border-warning border">
                                    <i class="fe-file-minus font-22 avatar-title text-white"></i>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-right">
                                    <h3 class="text-dark mt-1"><span data-plugin="counterup"><?php echo $count4; ?></span></h3>
                                    <p class="text-muted mb-1 text-truncate">ملف متروك</p>
                                </div>
                            </div>
                        </div> <!-- end row-->
                    </div> <!-- end widget-rounded-circle-->
                </div> <!-- end col-->
            </div>
            <!-- end row-->

            <div class="row">
                <div class="col-xl-4">
                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title">الدفعات</h4>
   
                                        <div class="mt-4 chartjs-chart">
                                            <canvas id="myChart" height="350"></canvas>
                                        </div>
    
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                </div> <!-- end col-->

                <div class="col-xl-8">
                    <div class="card-box">
                        <h4 class="header-title mb-3">أقرب دفعات أجلة تنتظر السداد</h4>

                        <div class="mb-2">
                                     
                                    </div>
                                        <div class="table-responsive">
                                        <table id="demo-foo-filtering2" class="table  toggle-circle mb-0" data-page-size="7">
                                            <thead>
                                                <tr>
                                                <th data-toggle="true">اسم الخصم</th>

                                                    <th>رقم الدفعة</th>
                                                    <th>رقم الملف</th>
                                                    <th>حالة السداد</th>
                                                    <th>تاريخ الدفعه</th>

                                                    <th data-hide="phone, tablet">المبلغ</th>
                                                    <th data-hide="phone, tablet">العملة</th>

                                                  
                                                   
                                                </tr>
                                            </thead>
                                        
                                        
                                            <tbody>
                                                <?php 
                                                 Global $payments_table_id;
                                                 Global $payments_table_type;
                                                 Global $payments_table_number;
                                                 Global $payments_table_value;
                                                 Global $payments_table_currency;
                                                 Global $payments_table_date;
                                                 Global $payments_table_file_id;
                                                 Global $payments_table_status;
                                                 Global $payments_table_client;
                                                 Global $payments_table_userid;
                                                 Global $client_table_name;
                                                 Global $payments_table_desc;
                                                if($FU_data){
                                                    foreach($FU_data as $payment){
                                                        Global $file_table_number;
                                                        Global $meta_table_name;
                                                        Global $opponents_table_id;
                                                        Global $opponents_table_file_id;
                                                        Global $opponents_table_name;
                                                        Global $opponents_table_ID_number;
                                                        Global $opponents_table_note;
                                                        Global $opponents_table_status;
                                                        $user=CreateTables::get_user_by_id($payment[$payments_table_userid]);
                                                        Global $user_table_login;
                                                        Global $user_table_nicename;
                                                        $file_data=CreateTables::get_all_file_data($payment[$payments_table_file_id]);
                                                        $type=CreateTables::get_meta_name_by_id($payment[$payments_table_type]);
                                                        $currency=CreateTables::get_meta_name_by_id($payment[$payments_table_currency]);
                                                        $desc=CreateTables::get_meta_name_by_id($payment[$payments_table_desc]);
                                                        $opp=CreateTables::get_opp_by_file_id($file_data[0][$file_table_id]);
                                                        if($type[0][$meta_table_value]=="FU"){
                                     ?>  
                                                <tr>
                                                <td><?php echo $opp[0][$opponents_table_name]; ?></td>

                                                    <td><?php echo $payment[$payments_table_number]; ?></td>
                                                    <?php 
                                                    if($type[0][$meta_table_value]=="FU"){
?>
                                                    <td><a href="/files/edit/?id=<?php echo $payment[$payments_table_file_id]; ?>" ><?php echo $file_data[0][$file_table_number]; ?></a></td>
                                                    

                                                        <?php
                                                    }else{
                                                        
                                                     
                                                        ?>
                                                    <td>لا يوجد</td>
                                                    
                                                    
                                                        <?php
                                                    }
                                                    ?>
                                                     <?php 
                                                     if($payment[$payments_table_status]==0){
                                                     ?>
                                                     <td  ><button type="button" class="btn btn-warning  waves-effect waves-light mr-2" data-toggle="modal" data-target="#con-close-modal-fu-confirm-<?php echo $payment[$payments_table_id]; ?>"><i class="mdi mdi-sack"></i>لم يسدد</button></td>
                                                     <?php }else if($payment[$payments_table_status]==1){ ?>
                                                        <td  ><button type="button" style="background-color:#106313;" class="btn  waves-effect waves-light mr-2" ><i class="mdi mdi-sack-percent"></i>تم التسديد</button></td>

                                                        <?php } ?>
                                                        <td><?php echo date( 'Y-m-d',strtotime($payment[$payments_table_date]) ); ?></td>

                                                     <td><?php echo $payment[$payments_table_value]; ?></td>
                                                   

                                                    <td><?php echo $currency[0][$meta_table_name]; ?></td>                                                    

                                                
                                                </tr>
                                               <?php 
                                                        }
                                                    }
                                                }
                                               ?>
                                            </tbody>
                                          
                                          
                                        </table>
         
                                        </div>
                                        <div class="text-right">
                                                    <nav aria-label="Page navigation example" style="    direction: ltr;">
                                                    <ul class="pagination">  
      <?php  
      Global $connection;
      Global $results_per_page;
        $fu=$fu_meta[0][$meta_table_id];
        $date=date('Y-m-d');
        $query = "SELECT COUNT(*) FROM $payments_table WHERE $payments_table_type='$fu' and $payments_table_status!='-1' and $payments_table_date='$date'";     
        $rs_result = mysqli_query($connection, $query);     
        $row = mysqli_fetch_row($rs_result);     
        $total_records = $row[0];     
   
        // Number of pages required.   
        $total_pages = ceil($total_records / $results_per_page); 
         
        $pagLink = "";       
      
        if($page>=2){   
            echo "<li class='page-item'><a  class='page-link' href='?page=".($page-1)."'>  السابق </a></li>";   
        }       
                   
        for ($i=1; $i<=$total_pages; $i++) {   
          if ($i == $page) {   
              $pagLink .= "<li class='page-item active'><a class = 'page-link' href='?page="  
                                                .$i."'>".$i." </a></li>";   
          }               
          else  {   
              $pagLink .= "<li class='page-item'><a class='page-link' href='?page=".$i."'>   
                                                ".$i." </a></li>";     
          }   
        };     
        echo $pagLink;   
  
        if($page<$total_pages){   
            echo "<li class='page-item'><a class='page-link' href='?page=".($page+1)."'>  التالي </a></li>";   
        }   
  
      ?>    
      </div>                                                      </div>
      </ul>
</nav>
    </div>
                                                           </div> <!-- end card-box -->
                </div> <!-- end col-->
            </div>
            <!-- end row -->

          
            
        </div> <!-- container -->

    </div> <!-- content -->

    <!-- Footer Start -->
    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                2020 &copy; Application by <a href="https://casemaster.ps/" class="text-black-50">Case Master</a> 

                </div>
              
            </div>
        </div>
    </footer>
    <!-- end Footer -->

</div>
