$(window).on("load", function() {
     
    var t = $("#demo-foo-filtering");
    t.footable().on("footable_filtering", function(o) {
      var t = $("#demo-foo-filter-status").find(":selected").val();
      o.filter += o.filter && 0 < o.filter.length ? " " + t : t, o.clear = !o.filter
    });
  
    $("#demo-foo-filter-status").change(function(o) {
        o.preventDefault(), t.trigger("footable_filter", {
          filter: $(this).val()
        })
      });
       $("#demo-foo-search").on("input", function(o) {
        o.preventDefault(), t.trigger("footable_filter", {
          filter: $(this).val()
        })
      });
    
   
  });



  $(window).on("load", function() {
     
    var t = $("#demo-foo-filtering1");
    t.footable().on("footable_filtering", function(o) {
      var t = $("#demo-foo-filter-status1").find(":selected").val();
      o.filter += o.filter && 0 < o.filter.length ? " " + t : t, o.clear = !o.filter
    });
  
    $("#demo-foo-filter-status1").change(function(o) {
        o.preventDefault(), t.trigger("footable_filter", {
          filter: $(this).val()
        })
      });
       $("#demo-foo-search1").on("input", function(o) {
        o.preventDefault(), t.trigger("footable_filter", {
          filter: $(this).val()
        })
       

      });

   
  });



  
  $(window).on("load", function() {
     
    var t = $("#demo-foo-filtering2");
    t.footable().on("footable_filtering", function(o) {
      var t = $("#demo-foo-filter-status2").find(":selected").val();
      o.filter += o.filter && 0 < o.filter.length ? " " + t : t, o.clear = !o.filter
    });
  
    $("#demo-foo-filter-status2").change(function(o) {
        o.preventDefault(), t.trigger("footable_filter", {
          filter: $(this).val()
        })
      });
       $("#demo-foo-search2").on("input", function(o) {
        o.preventDefault(), t.trigger("footable_filter", {
          filter: $(this).val()
        })
       

      });

   
  });

 
  $("#out").click(function(o) {
    $(window).trigger('resize');
});

$("#futuretab").click(function(o) {
    $(window).trigger('resize');
});

$("#in").click(function(o) {
  $(window).trigger('resize');
});