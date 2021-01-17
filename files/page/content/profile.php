
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
                                    <h4 class="page-title">الملف الشخصي</h4>
                                    <?php
                                    Global $notify;
                                    if($notify=='user_updated'){
                                        echo "<div class='alert alert-success' role='alert'>
                                                 <i class='mdi mdi-check-all mr-2'></i> <strong>تم بنجاح</strong> تحديث الملف الشخصي
                                            </div>";
                                    }else if($notify=='user_error'){
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
                                    
                                <form action="<?php echo BASE_URL; ?>" method="post">
                                <div class="row">
                                 <?php 
                                 $user=CreateTables::get_user_by_id($_SESSION['userid']);
                                 ?>
 
 <div class="col-md-6">
     <div class="form-group">
         <label for="field-1" class="control-label">اسم المستخدم</label>
         <input type="hidden" class="form-control"  value="<?php echo $_SESSION['userid']; ?>" name="id_profile" required>

         <input type="text" class="form-control"  placeholder="Ahmed123" name="username_update_profile" value="<?php echo $user[0][$user_table_login]; ?>" required>
     </div>
 </div>
 <div class="col-md-6">
     <div class="form-group">
         <label for="field-3" class="control-label">الاسم كامل</label>
         <input type="text" class="form-control" placeholder="فراس عمر" name="nicename_profile" value="<?php echo $user[0][$user_table_nicename]; ?>" required>
     </div>
 </div>
</div>
<div class="row">
<div class="col-md-6">
     <div class="form-group">
         <label for="field-4" class="control-label">كلمة المرور</label>
         <input type="password" class="form-control"  placeholder="كلمة المرور" value="" name="password_profile" >
     </div>
 </div>
 <div class="col-md-6">
     <div class="form-group">
         <label for="field-6" class="control-label">البريد الالكتروني</label>
         <input type="email" class="form-control"  placeholder="example@a.com" name="email_profile" value="<?php echo $user[0][$user_table_email]; ?>"  required>
     </div>
 </div>
</div>
<div class="row">
 
 <div class="col-md-12">
     <div class="form-group">
     <button type="submit" class="btn btn-success width-xl waves-effect waves-light">حفظ</button> 

    
     </div>
                           
</div>
</form>                           
</div>
</div>

</div>
</div>
