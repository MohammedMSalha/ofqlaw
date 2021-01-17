
<div class="account-pages mt-5 mb-2">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card bg-pattern">

                            <div class="card-body p-4">
                                
                                <div class="text-center w-75 m-auto">
                                    <a href="/">
                                        <span><img src="<?php echo SCRIPT_ROOT.'/images/logo1.png'; ?>" alt="" height="120"></span>
                                    </a>
                                    <p class="text-muted mb-4 mt-3">أدخل عنوان بريدك الإلكتروني وكلمة المرور للوصول إلى لوحة التحكم.</p>
                                </div>

                                <form action="<?php echo BASE_URL; ?>" method="post">

                                    <div class="form-group mb-3">
                                        <label for="emailaddress">البريد الالكتروني</label>
                                        <input class="form-control" type="email" name="email"   required="" placeholder="ادخل البريد الالكتروني">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="password">كلمة المرور</label>
                                        <input class="form-control" type="password" required="" name="password" placeholder="ادخل كلمة المرور">
                                    </div>

                                    

                                    <div class="form-group mb-0 text-center">
                                        <button class="btn btn-primary btn-block" type="submit"> تسجيل الدخول </button>
                                    </div>

                                </form>

                            

                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->

                     

                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->