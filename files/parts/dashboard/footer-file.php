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
  $(document).ready(function() {
  
 $("#create_file").click(function() {
     // Stop form from submitting normally
  document.getElementById("create_file").disabled = true;
  document.getElementById("create_file").style.background='red';
  document.getElementById("create_file").innerHTML = "<span class='spinner-border spinner-border-sm mr-1' role='status' aria-hidden='true'></span>جاري المعالجة ";
  document.getElementById("opp_error_notify").style.display = "none";

    var fd = new FormData();
    fd.append( 'client', document.getElementById("client").value );
    fd.append( 'file_type', document.getElementById("file_type").value );

    fd.append( 'file_number', document.getElementById("file_number").value );
    fd.append( 'file_status', document.getElementById("file_status").value );
    fd.append( 'file_currency', document.getElementById("file_currency").value );
    fd.append( 'file_note', document.getElementById("file_note").value );
 

    

    $.ajax({
        url: window.location.href ,
        type: "post",
        data: fd,
        dataType: 'json',
        processData: false,     contentType: false,     cache: false,
        success: function(msg) {
            console.log(msg);
            alert('hhhh');
          if(msg.id>0 && msg.code==200){
            // Simulate an HTTP redirect:
            window.location.replace('/files/edit/?id='+msg.id);
          }
          if(msg==402){
            document.getElementById("create_file").innerHTML = "<i class='mdi mdi-check-all'></i>";
            document.getElementById("create_file").style.background='#1abc9c';
            document.getElementById("create_file").disabled = false;
            document.getElementById("opp_error_notify").style.display = "";
          
            }
          if(msg==401){
            document.getElementById("create_file").innerHTML = "<i class='mdi mdi-check-all'></i>";
            document.getElementById("create_file").style.background='#1abc9c';
            document.getElementById("create_file").disabled = false;
            document.getElementById("opp_error_notify").style.display = "";
          }
         
        },error : function (error){
           alert(error);
          document.getElementById("create_file").innerHTML = "<i class='mdi mdi-check-all'></i>";
          document.getElementById("error_notify").style.display = "";
          document.getElementById("create_file").disabled = false;
          document.getElementById("create_file").style.background='#1abc9c';

        }
      
    });
  });
 
});
 
</script>


<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>
</body>
</html>