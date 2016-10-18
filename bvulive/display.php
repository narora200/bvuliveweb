<?php include("./inc/header.inc.php"); ?>
<title>Bharati Vidyapeeth University | Events</title>
</head>
<body>



	<nav class="navbar navbar-default" style="margin-bottom:0px;border-color:#494ca8;">
    <div class="container-fluid" style="background-color:#494ca8;">
      <div class="navbar-header" style="padding-top: 40px;">
        <!-- Change here when changing the website root folder--><a href="index.php" class="navbar-brand"><img style="max-width:120px; margin-top: -25px;"
             src="./img/logowhiteanother.png"></a>
        <button type="button" class="navbar-toggle"  data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
      </div>
  
          
        
        <div class="collapse navbar-collapse" id="myNavbar">
      <?php 
      if(!$p_id){


      echo'
      
      <ul class="nav navbar-nav navbar-left" style="padding-top:40px;font-weight:700;">
      <!-- Change here before submitting to the server--><li><a href="display.php" style=""><span class="glyphicon glyphicon-camera"></span> Events</a></li>
      </ul>
      ';
      ?>
      
      <form role="form" action="search.php" method="POST">
      <div class="col-sm-4 col-xs-7" style="padding:30px 0px 20px 0px;">
      
            
            
            <select id="ne_name" placeholder="Event Name" name="ne_name" class="selectized text-center"  required="">
              <option value="" selected=""></option>
              <?php
              $result = mysql_query("SELECT e_name FROM events WHERE e_posted = '1'");//change here to 1
              while($row = mysql_fetch_assoc($result)){

                echo "<option value='".$row['e_name']."'>".$row['e_name']."</option>";
                
              
              }


              ?>
          </select>
          
        </div>
        <div class="col-sm-2" style="padding:30px 0px 20px 0px;">
      <button type="submit" class="btn btn-default" name="s_submit">
          <i class="fa fa-2x fa-search" style="font-size:1.5em;">

          </i>
          </button>
      </div>
      </form>     
      
      <?php echo '<ul class="nav navbar-nav navbar-right" style="padding-top:40px;font-weight:700;">
         <!-- Change here before submitting to the server--><li><a href="addevent.php"><span class="glyphicon glyphicon-pushpin"></span> Add Event</a></li>
           <!-- Change here before submitting to the server--><li><a href="update.php"><span class="glyphicon glyphicon-log-in"></span> Update</a></li>
           <!-- Change here before submitting to the server--><li><a href="postreview.php"><span class="glyphicon glyphicon-thumbs-up"></span> Review</a></li>

           
         </ul>';
        }else{
          echo '
          <ul class="nav navbar-nav navbar-left" style="padding-top:40px;font-weight:700;">
      <!-- Change here before submitting to the server--><li><a href="display.php"><span class="glyphicon glyphicon-camera"></span> Events</a></li>
      </ul>';?>
      
      ?>
      <form role="form" action="search.php" method="POST">
      <div class="col-sm-offset-1 col-sm-4 col-xs-8" style="padding:30px 0px 20px 0px;">
      
            
            
            <select id="ne_name" placeholder="Event Name" name="ne_name" class="selectized text-center"  required="">
              <option value="" selected=""></option>
              <?php
              $result = mysql_query("SELECT e_name FROM events WHERE e_posted = '1'");//change here to 1
              while($row = mysql_fetch_assoc($result)){

                echo "<option value='".$row['e_name']."'>".$row['e_name']."</option>";
                
              
              }


              ?>
          </select>
          
        </div>
        <div class="col-sm-2" style="padding:30px 0px 20px 0px;">
      <button type="submit" class="btn btn-default" name="s_submit">
          <i class="fa fa-2x fa-search" style="font-size:1.5em;">

          </i>
          </button>
      </div>
      </form>   
      <?php echo '<ul class="nav navbar-nav navbar-right" style="padding-top:40px;font-weight:700;"> <!-- Change here before submitting to the server--><li><a href="'.$p_id.'"><span class="glyphicon glyphicon-wrench"></span> UpdateProfile</a></li>
          <!--Change here before submitting to the server--><li><a href="leave.php"><span class="glyphicon glyphicon-log-out"></span> Leave</a></li>
           
         </ul>';
        }
        ?>
    </div>
    </div>
    </nav>



<?php 
date_default_timezone_set('asia/kolkata');

$date = mysql_query("SELECT e_datetime,p_id FROM events ORDER BY e_datetime");
$i = 0;
$up = 0;
$pa = 0;
while ($row = mysql_fetch_array($date)) {
    
    $d_result[$i] = $row['e_datetime'];
    $p_result[$i] = $row['p_id'];

    $e_s_datefull = explode(' ', $d_result[$i], 2);
    $e_s_dateseparated = explode('/' , $e_s_datefull[0]);
    $e_s_datemonth = $e_s_dateseparated[0];
    
    $e_s_datedate = $e_s_dateseparated[1];
    $e_s_dateyear = $e_s_dateseparated[2];


    $c_datefull = date("m/d/Y");
    $c_dateseparated = explode('/' , $c_datefull);
    $c_datemonth = $c_dateseparated[0];
    
    $c_datedate = $c_dateseparated[1];
    $c_dateyear = $c_dateseparated[2];
    if($e_s_dateyear >= $c_dateyear){

    if($e_s_datemonth >= $c_datemonth){
        if($e_s_datedate >= $c_datedate){
          //events coming to you in the same month or upcoming months and after or on the same day!
      $allup = mysql_query("SELECT * FROM events WHERE e_datetime = '$d_result[$i]' AND p_id = '$p_result[$i]' AND e_posted = '1'");
        while($rowup = mysql_fetch_assoc($allup)){
          
          
          $resultup[$up]['upp_id'] = $rowup['p_id'];

          $resultup[$up]['upe_name'] = $rowup['e_name'];
          $resultup[$up]['upe_link'] = $rowup['e_link'];
          $resultup[$up]['upe_poster'] = $rowup['e_poster'];
          $resultup[$up]['upe_datetime'] = $rowup['e_datetime'];
          $up++;
        } 


        }else{
          //events which took place in the same month.
          $allpa = mysql_query("SELECT * FROM events WHERE e_datetime = '$d_result[$i]' AND p_id = '$p_result[$i]' AND e_posted = '1'");
        while($rowpa = mysql_fetch_assoc($allpa)){
          
          $resultpa[$pa]['pap_id'] = $rowpa['p_id'];
          
          $resultpa[$pa]['pae_name'] = $rowpa['e_name'];
          $resultpa[$pa]['pae_link'] = $rowpa['e_link'];
          $resultpa[$pa]['pae_poster'] = $rowpa['e_poster'];
          $resultpa[$pa]['pae_datetime'] = $rowpa['e_datetime'];
          $pa++;
        }


    }

  }else{
      // events which took place the previous month.
    

    }
  


  }else {
   // events which took place the previous year. 
  }
    //echo "<br>".$e_s_date[0];
   //$result[$i]['p_id'] = $row['p_id'];
    //$result[$i]['e_name'] = $row['e_name'];
    
    //$result[$i]['e_link'] = $row['e_link'];
    
    
    //$result[$i]['e_poster'] = $row['e_poster'];
    //$i++;
    }


?>
<div class="container-fluid">
<div class="jumbotron text-center" style="background-color: #FDC013;">
<span style="font-size:3em;font-weight:800;color:#fff">Upcoming Events</span>
</div>

<div id="upcoming-events" class="owl-carousel">
  
<?php
$dirpath = "userdata/profile_pics/";
if($up>0){
for($j=0;$j<$up;$j++){
  
echo '
  <div>
    <div class="text-center">
      <span class="postertitle">'.$resultup[$j]['upe_name'].'</span>
    </div>  
    

    <img class="img-responsive " src="'.$dirpath.''.$resultup[$j]['upe_name'].'/'.$resultup[$j]['upe_poster'].'">
    <div class="text-center">
    <div class="dthead">
        Date and Time:
      </div>  
      <div class="dtcontent">
        
        '.$resultup[$j]['upe_datetime'].'
      </div>
      <div class="linkhead">
        Link:
      </div>
      <div class="linkcontent">
        
        <a href="'.$resultup[$j]['upe_link'].'">
      '.$resultup[$j]['upe_name'].'\'s Link
      </a>
      </div>
      
      <div class="infohead">
      <a href="einfo/'.$resultup[$j]['upp_id'].'">More Info</a>
      </div>

    </div>
  </div>
  ';

}
}else{
  echo '<div class="alert alert-info"><h1>No upcoming events to display :( Strange huh?</h1></div>';
}
?>

  
  
  </div>
  

<div class="jumbotron text-center" style="margin-top:50px;background-color: #FD1386;">
<span style="font-size:3em;font-weight:800;color:white;">Past Events</span>
</div>
<div id="past-events" class="owl-carousel">
  <?php
$dirpath = "userdata/profile_pics/";
if($pa>0){
for($j=$pa-1;$j>=0;$j--){
 
echo '
  <div style="overflow:auto">
    <div class="text-center">
      <span class="postertitle">'.$resultpa[$j]["pae_name"].'</span>
    </div>  
    

    <img class="img-responsive " src="'.$dirpath.''.$resultpa[$j]['pae_name'].'/'.$resultpa[$j]['pae_poster'].'">
    <div class="text-center">
    <div class="dthead">
        Date and Time:
      </div>  
      <div class="dtcontent">
        
        '.$resultpa[$j]['pae_datetime'].'
      </div>
      <div class="linkhead">
        Link:
      </div>
      <div class="linkcontent">
      <a href="'.$resultpa[$j]['pae_link'].'">
      '.$resultpa[$j]['pae_name'].'\'s Link
      </a>
        
      </div>
      
      <div class="infohead">
      <a href="einfo/'.$resultpa[$j]['pap_id'].'">More Info</a>
      </div>

    </div>
  </div>
  ';

}
}else{
  echo '<div class="alert alert-info"><h1>No past events happened this month. This month has been such a quiet month :(</h1></div>';
}
?>

  
  
  </div>

  
</div>
</div>

<script src="js/customowldisplay.js"></script>
<script src="js/owl.carousel.min.js"></script>
<?php include("./inc/footer.inc.php"); ?>