<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>مكتب أفق للمحاماة</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="<?php echo SCRIPT_ROOT.'/images/logo.png'; ?>">

        <!-- Plugins css -->
        <link href="<?php echo SCRIPT_ROOT.'/libs/flatpickr/flatpickr.min.css'; ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo SCRIPT_ROOT.'/libs/jquery-nice-select/nice-select.css'; ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo SCRIPT_ROOT.'/libs/switchery/switchery.min.css'; ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo SCRIPT_ROOT.'/libs/multiselect/multi-select.css'; ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo SCRIPT_ROOT.'/libs/select2/select2.min.css'; ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo SCRIPT_ROOT.'/libs/bootstrap-select/bootstrap-select.min.css'; ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo SCRIPT_ROOT.'/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.css'; ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo SCRIPT_ROOT.'/libs/footable/footable.core.min.css" rel="stylesheet'; ?>" type="text/css" />

        <!-- App css -->
        <link href="<?php echo SCRIPT_ROOT.'/css/bootstrap.min.css'; ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo SCRIPT_ROOT.'/css/icons.min.css'; ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo SCRIPT_ROOT.'/css/app-rtl.min.css'; ?>" rel="stylesheet" type="text/css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

     
        <script>
            $(document).ready(function () {
    var counter = 0;

    $("#addrow").on("click", function () {
        var newRow = $("<tr>");
        var cols = "";

        cols += '<td><input type="text" class="form-control" name="opp_name[]"/></td>';
        cols += '<td><input type="text" class="form-control" name="opp_id[]"/></td>';
        cols += '<td><textarea class="form-control" id="example-textarea" name="opp_note[]" rows="1"></textarea></td>';

        cols += '<td><input type="button" class="ibtnDel btn btn-md btn-danger "  value="حذف"></td>';
        newRow.append(cols);
        $("table.order-list").append(newRow);
        counter++;
    });



    $("table.order-list").on("click", ".ibtnDel", function (event) {
        $(this).closest("tr").remove();       
        counter -= 1
    });


});



function calculateRow(row) {
    var price = +row.find('input[name^="price"]').val();

}

function calculateGrandTotal() {
    var grandTotal = 0;
    $("table.order-list").find('input[name^="price"]').each(function () {
        grandTotal += +$(this).val();
    });
    $("#grandtotal").text(grandTotal.toFixed(2));
}
        </script>


<script>
            $(document).ready(function () {
    var counter = 0;

    $("#addrow2").on("click", function () {
        var newRow = $("<tr>");
        var cols = "";

        cols += '<td><input type="text" class="form-control" name="name' + counter + '"/></td>';
        cols += '<td><input type="text" class="form-control" name="mail' + counter + '"/></td>';
        cols += '<td><input type="text" class="form-control" name="phone' + counter + '"/></td>';
        cols += '<td><input type="text" class="form-control" name="phone' + counter + '"/></td>';

        cols += '<td><input type="button" class="ibtnDel btn btn-md btn-danger "  value="حذف"></td>';
        newRow.append(cols);
        $("table.order-list2").append(newRow);
        counter++;
    });



    $("table.order-list2").on("click", ".ibtnDel", function (event) {
        $(this).closest("tr").remove();       
        counter -= 1
    });


});



function calculateRow(row) {
    var price = +row.find('input[name^="price"]').val();

}

function calculateGrandTotal() {
    var grandTotal = 0;
    $("table.order-list2").find('input[name^="price"]').each(function () {
        grandTotal += +$(this).val();
    });
    $("#grandtotal2").text(grandTotal.toFixed(2));
}
        </script>


    </head>

    <body>