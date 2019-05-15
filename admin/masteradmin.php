<?php

session_start();
  if(!isset($_SESSION['loginas'])){
      header('location:../form_login.php');
  }else{
      if($_SESSION['loginas'] != "Admin"){
          header('location:../user/index.php');
      }
  }

  require ('action/databasekey.php');
  $key = connection();
  
  $sql1 = "SELECT mspriority.keterangan AS priority, COUNT(*) AS num FROM mspriority, ticket WHERE mspriority.priority = ticket.priority GROUP BY ticket.priority";
  $stmt1 = $key->query($sql1);

  $low;$medium;$high;

  while($row1= $stmt1->fetch()){
    if($row1['priority'] == "Low"){
      $low = $row1['num'];
    }elseif($row1['priority'] == "Medium"){
      $medium = $row1['num'];
    }elseif($row1['priority'] == "High"){
      $high = $row1['num'];
    }
  }
?>

<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Helpdesk KRS Website</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  
  <!-- for stylesheet -->
  <?php require 'template-parts/head.php'; ?>
</head>

<body class="hold-transition skin-blue sidebar-mini" onload="startTime()">
<div class="wrapper">

  <!-- Main Header -->
  <?php require 'template-parts/header.php'; ?>

  <!-- Left side column. contains the logo and sidebar -->
  <?php require 'template-parts/aside.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <?php 
        if(!isset($_GET['page'])){
          $page = 'homeadmin';
        }else {
          $page = $_GET['page'];
        }
        require $page . '.php';
      ?>
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <?php require 'template-parts/footer.php'; ?>


</div>
<!-- ./wrapper -->


<!-- REQUIRED JS SCRIPTS -->
<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

<!-- require Date Picker -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

<!-- Chart.js -->
<script src="bower_components/chart.js/Chart.js"></script>

<!-- Fast click -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>

<script>
    $(document).ready(function(){
        var date_input=$('input[name="inputbirthday"]'); //our date input has the name "date"
        var container=$('.bootstrap-iso form').length>1 ? $('.bootstrap-iso form').parent() : "body";
        date_input.datepicker({
            format: 'dd/mm/yyyy',
            container: container,
            todayHighlight: true,
            autoclose: true,
        })
    })
</script>

<!-- Make default value of password -->
<script>

  $('#inputpassword').focusin(function(){
    var pass = $('#inputbirthday').val();
    var tanggal = pass.substring(0,2);
    var bulan = pass.substring(3,5);
    var tahun = pass.substring(6);
    var temp = tanggal.concat(bulan);
    var temp1 = temp.concat(tahun);
    
    if($('#inputpassword').val() == ""){
      $('#inputpassword').val(temp1);
    }
  });
</script>

<!-- script for change password handling in accountsettings.php -->
<script type="text/javascript">
    $(document).ready(function(){
        $("#myModal").modal('show');
    });
</script>

<!-- script for empty field(s) handling in accountsettings.php -->
<script>
    $("#inputnama").blur(function(){
        if($("#inputnama").val() == ""){
          $("#formgroupnama").append("<div class='col-sm-3' id='forbidden'><p style='color:red'><em>This field cannot be empty.</em></p></div>");
          $("#btnupdate").attr("disabled", true);            
        }else{
          $('#forbidden').remove();
          $("#btnupdate").attr("disabled", false);  
        }
    });

    $("#inputemail").blur(function(){
        if($("#inputemail").val() == ""){
            $("#formgroupemail").append("<div class='col-sm-3' id='forbidden'><p style='color:red'><em>This field cannot be empty.</em></p></div>");
            $("#btnupdate").attr("disabled", true);           
        }else{
          $('#forbidden').remove();
          $("#btnupdate").attr("disabled", false);  
        }
    });
</script>

<!-- script for show password -->
<script>
  $("#showPassword").mousedown(function(){
    var foo = $(this).prev().attr("type");
    if(foo == "password"){
      $(this).prev().attr("type", "text");
    } else {
      $(this).prev().attr("type", "password");
    }
  });

  $("#showPassword").mouseup(function(){
    var foo = $(this).prev().attr("type");
    if(foo == "text"){
      $(this).prev().attr("type", "password");
    } else {
      $(this).prev().attr("type", "text");
    }
  });
</script>

<!-- Script for display day & date -->
<!-- Gatau ini apaan? ->  --><script>$GLOBALS</script>

<!-- Script to get date & time -->
<script>
  var d = new Date();
  var days = ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"];
  var months = ["January", "February", "March", "April", "May", "June", "July", "August", 
                "September", "October", "November", "December"];

  document.getElementById('home-day').innerHTML = days[d.getDay()];
  document.getElementById('home-date').innerHTML = d.getDate() + "<sup>th</sup> " + months[d.getMonth()] + " " + d.getFullYear();

  function startTime() {
    var today = new Date();
    var h = today.getHours();
    var m = today.getMinutes();
    var s = today.getSeconds();
    m = checkTime(m);
    s = checkTime(s);
    document.getElementById('home-clock').innerHTML = h + ":" + m + ":" + s;
    var t = setTimeout(startTime, 500);
  }

  function checkTime(i) {
    if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
    return i;
  }
</script>


<script>
$(function () {

    //- PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
    var pieChart       = new Chart(pieChartCanvas)
    var PieData        = [
      {
        value    : <?= $low; ?>,
        color    : '#f56954',
        highlight: '#f56954',
        label    : 'Low'
      },
      {
        value    : <?= $medium; ?>,
        color    : '#00a65a',
        highlight: '#00a65a',
        label    : 'Medium'
      },
      {
        value    : <?= $high; ?>,
        color    : '#f39c12',
        highlight: '#f39c12',
        label    : 'High'
      }
    ]
    var pieOptions     = {
      //Boolean - Whether we should show a stroke on each segment
      segmentShowStroke    : true,
      //String - The colour of each segment stroke
      segmentStrokeColor   : '#fff',
      //Number - The width of each segment stroke
      segmentStrokeWidth   : 2,
      //Number - The percentage of the chart that we cut out of the middle
      percentageInnerCutout: 50, // This is 0 for Pie charts
      //Number - Amount of animation steps
      animationSteps       : 100,
      //String - Animation easing effect
      animationEasing      : 'easeOutBounce',
      //Boolean - Whether we animate the rotation of the Doughnut
      animateRotate        : true,
      //Boolean - Whether we animate scaling the Doughnut from the centre
      animateScale         : false,
      //Boolean - whether to make the chart responsive to window resizing
      responsive           : true,
      // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio  : true,
      //String - A legend template
      legendTemplate       : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<segments.length; i++){%><li><span style="background-color:<%=segments[i].fillColor%>"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>'
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    pieChart.Doughnut(PieData, pieOptions)


  })
</script>

</body>
</html>