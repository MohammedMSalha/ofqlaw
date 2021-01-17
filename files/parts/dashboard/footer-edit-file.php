</div>
<!-- END wrapper -->
  <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

<!-- Vendor js -->
<script src="<?php echo SCRIPT_ROOT.'/js/vendor.min.js'; ?>"></script>
 <!-- Footable js -->
 <script src="<?php echo SCRIPT_ROOT.'/libs/footable/footable.all.min.js'; ?>"></script>

<!-- Init js -->
<script src="<?php echo SCRIPT_ROOT.'/js/pages/foo-tables.init.js'; ?>"></script>


<script src="<?php echo SCRIPT_ROOT.'/libs/jquery-nice-select/jquery.nice-select.min.js'; ?>"></script>
<script src="<?php echo SCRIPT_ROOT.'/libs/switchery/switchery.min.js'; ?>"></script>
<script src="<?php echo SCRIPT_ROOT.'/libs/multiselect/jquery.multi-select.js'; ?>"></script>
<script src="<?php echo SCRIPT_ROOT.'/libs/select2/select2.min.js'; ?>"></script>
<script src="<?php echo SCRIPT_ROOT.'/libs/jquery-mockjax/jquery.mockjax.min.js'; ?>"></script>
<script src="<?php echo SCRIPT_ROOT.'/libs/autocomplete/jquery.autocomplete.min.js'; ?>"></script>
<script src="<?php echo SCRIPT_ROOT.'/libs/bootstrap-select/bootstrap-select.min.js'; ?>"></script>
<script src="<?php echo SCRIPT_ROOT.'/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js'; ?>"></script>
<script src="<?php echo SCRIPT_ROOT.'/libs/bootstrap-maxlength/bootstrap-maxlength.min.js'; ?>"></script>
<!-- Dashboar 1 init js-->
 <!-- Init js-->
 <script src="<?php echo SCRIPT_ROOT.'/js/pages/form-advanced.init.js'; ?>"></script>
<!-- App js-->
<script src="<?php echo SCRIPT_ROOT.'/js/app.min.js'; ?>"></script>

<script>
  function add_dues(){
      
     // Stop form from submitting normally
  document.getElementById("add_due_now").disabled = true;
  document.getElementById("add_due_now").style.background='red';
  document.getElementById("add_due_now").innerHTML = "<span class='spinner-border spinner-border-sm mr-1' role='status' aria-hidden='true'></span>";
  document.getElementById("due_success_notify").style.display = "none";

  document.getElementById("due_error_notify").style.display = "none";

    var fd = new FormData();
    fd.append( 'due_number', document.getElementById("due_number").value );
    fd.append( 'due_type', document.getElementById("due_type").value );
    fd.append( 'due_currency', document.getElementById("due_currency").value );
    fd.append( 'due_value', document.getElementById("due_value").value );

    fd.append( 'date', document.getElementById("date").value );
    fd.append( 'opp', document.getElementById("opp").value );
    fd.append( 'file_id', document.getElementById("due_file_id").value);
     
     

    $.ajax({
        url: window.location.href ,
        type: "post",
        data: fd,
        dataType: 'json',
        processData: false,     contentType: false,     cache: false,
        success: function(msg) {
          
          if(msg==200){
            document.getElementById("add_due_now").innerHTML = "<i class='mdi mdi-folder-plus'></i>";
            document.getElementById("add_due_now").style.background='#1abc9c';
            document.getElementById("add_due_now").disabled = false;
            document.getElementById("due_success_notify").style.display = "";
            $("#models").load(location.href+" #models>*","");

            $("#statistics").load(location.href+" #statistics>*","");
            $("#information").load(location.href+" #information>*","");
            document.getElementById("due_type").value=null;
            document.getElementById("due_currency").value=null;
            document.getElementById("due_value").value=null;
            document.getElementById("date").value=null;
            document.getElementById("opp").value=null;
          }
         
          if(msg==401){
            document.getElementById("add_due_now").innerHTML = "<i class='mdi mdi-check-all'></i>";
          document.getElementById("due_error_notify").style.display = "";
          document.getElementById("add_due_now").disabled = false;
          document.getElementById("add_due_now").style.background='#1abc9c';
            
          }
         
        },error : function (error){
        
          document.getElementById("add_due_now").innerHTML = "<i class='mdi mdi-check-all'></i>";
          document.getElementById("due_error_notify").style.display = "";
          document.getElementById("add_due_now").disabled = false;
          document.getElementById("add_due_now").style.background='#1abc9c';

        }
      
    });
  }
  function add_opps(){
      // Stop form from submitting normally
      document.getElementById("add_opp").disabled = true;
     document.getElementById("add_opp").style.background='red';
     document.getElementById("add_opp").innerHTML = "<span class='spinner-border spinner-border-sm mr-1' role='status' aria-hidden='true'></span>";
     document.getElementById("opp_success_notify").style.display = "none";
     document.getElementById("opp_error_notify").style.display = "none";
    
               $("#due_table").load(location.href+" #due_table>*","");
   
               $("#information").load(location.href+" #information>*","");
     var fd = new FormData();
     fd.append( 'edit_file_opp_name', document.getElementById("name").value );
     fd.append( 'edit_file_opp_id', document.getElementById("id").value );
     fd.append( 'edit_file_opp_note', document.getElementById("note").value );
     fd.append( 'edit_file_opp_file', document.getElementById("opp_file").value );
     $.ajax({
           url: window.location.href ,
           type: "post",
           data: fd,
           dataType: 'json',
           processData: false,     contentType: false,     cache: false,
           success: function(msg) {
              
             if(msg==200){
               document.getElementById("add_opp").innerHTML = " <i class='mdi mdi-folder-plus'></i>";
               document.getElementById("add_opp").style.background='#1abc9c';
               document.getElementById("add_opp").disabled = false;
               document.getElementById("opp_success_notify").style.display = "";
               document.getElementById("name").value=null;
               document.getElementById("id").value=null;
               document.getElementById("note").value=null;
               $("#opp_table").load(location.href+" #opp_table>*","");
               $("#due_table").load(location.href+" #due_table>*","");
               $("#opp").load(location.href+" #opp>*","");
               $("#models").load(location.href+" #models>*","");

               $("#statistics").load(location.href+" #statistics>*","");
               $("#information").load(location.href+" #information>*","");
               
             }
            
             if(msg==401){
               document.getElementById("add_opp").innerHTML = " <i class='mdi mdi-folder-plus'></i>";
               document.getElementById("add_opp").style.background='#1abc9c';
               document.getElementById("add_opp").disabled = false;
               document.getElementById("opp_error_notify").style.display = "";
             }
            
           },error : function (error){
             
             document.getElementById("add_opp").innerHTML = "<i class='mdi mdi-check-all'></i>";
             document.getElementById("opp_error_notify").style.display = "";
             document.getElementById("add_opp").disabled = false;
             document.getElementById("add_opp").style.background='#1abc9c';
   
           }
         
       });
  }

  function save(){
         // Stop form from submitting normally
   document.getElementById("save").disabled = true;
  document.getElementById("save").style.background='red';
  document.getElementById("save").innerHTML = "<span class='spinner-border spinner-border-sm mr-1' role='status' aria-hidden='true'></span>";
  document.getElementById("data_success_notify").style.display = "none";
  document.getElementById("data_error_notify").style.display = "none";
var fd = new FormData();
    fd.append( 'file_client', document.getElementById("file_client").value );
    fd.append( 'file_type', document.getElementById("file_type").value );

    fd.append( 'file_number', document.getElementById("file_number").value );
    fd.append( 'file_status', document.getElementById("file_status").value );
    fd.append( 'file_currency', document.getElementById("file_currency").value );
    fd.append( 'file_note', document.getElementById("file_note").value );
    fd.append( 'file', document.getElementById("file_data_id").value );
 
    
    $.ajax({
        url: window.location.href ,
        type: "post",
        data: fd,
        dataType: 'json',
        processData: false,     contentType: false,     cache: false,
        success: function(msg) {
          
          if(msg==200){
            // Simulate an HTTP redirect:

            document.getElementById("save").disabled = false;
            document.getElementById("save").innerHTML = "<i class='mdi mdi-check-all'></i>";
            document.getElementById("save").style.background='#1abc9c';

            document.getElementById("data_success_notify").style.display = ""; 
            $("#information").load(location.href+" #information>*","");
            $("#file_title").load(location.href+" #file_title>*","");
            $("#statistics").load(location.href+" #statistics>*","");
            $("#due_table").load(location.href+" #due_table>*","");
            $("#models").load(location.href+" #models>*","");

            
            }
       
          if(msg==401){
            document.getElementById("save").innerHTML = "<i class='mdi mdi-check-all'></i>";
            document.getElementById("save").style.background='#1abc9c';
            document.getElementById("save").disabled = false;
            document.getElementById("data_error_notify").style.display = "";
          }
         
        },error : function (error){
         
          document.getElementById("save").innerHTML = "<i class='mdi mdi-check-all'></i>";
          document.getElementById("data_error_notify").style.display = "";
          document.getElementById("save").disabled = false;
          document.getElementById("save").style.background='#1abc9c';

        }
      
    });
  }
   
</script>
 

 
<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>
</body>
</html>