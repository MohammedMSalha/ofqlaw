</div>
<!-- END wrapper -->
  <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

<!-- Vendor js -->
<script src="<?php echo SCRIPT_ROOT.'/js/vendor.min.js'; ?>"></script>

<!-- Plugins js-->
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<script>
  var ctx = document.getElementById('myChart').getContext('2d');
var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'pie',
    
    data: {
 // These labels appear in the legend and in the tooltips when hovering different arcs
 labels: [
        'الخارجة',
        'الداخلة',
        'الاجلة'
    ],        datasets: [{
      fill: true,
            backgroundColor: [
              '#f7b84b',
        '#1abc9c',
        '#f1556c'],
    // The data for our dataset
        data: [document.getElementById("out").value, document.getElementById("in").value, document.getElementById("fu").value]
    }]
    },

    // Configuration options go here
    options: {}
});
</script>
 

<!-- Dashboar 1 init js-->
<script src="<?php echo SCRIPT_ROOT.'/js/pages/dashboard-1.init.js'; ?>"></script>

<!-- App js-->
<script src="<?php echo SCRIPT_ROOT.'/js/app.min.js'; ?>"></script>
<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>
</body>
</html>