<?php
if(isset($_POST['added']))
{
	$con=mysqli_connect("172.16.0.57","u1046393_turas","Soamin123@","db1046393_dublin");
    $latitude = mysqli_real_escape_string($con, $_POST['lat1']);
    $longitude = mysqli_real_escape_string($con, $_POST['lon1']);



 $file1 = $_FILES['pic1'];
 

 $file_path1 = $file1['tmp_name'];
 $file_name1 = $_FILES['pic1']['name'];
 $file_type1 = $file1['type'];
 $file_size = $file1['size'];
 $file_name1 = str_replace(' ', '_', $file_name1);



move_uploaded_file($file_path1,"videos/".$file_name1);


$fp      = fopen($file_path1, 'r');
$content = fread($fp, filesize($file_path1));
$content = addslashes($content);
fclose($fp);
    $result = mysqli_query($con,"SELECT * FROM video where latitude = '$latitude' AND longitude = '$longitude'");
    $num_rows = mysqli_num_rows($result);
    $row = mysqli_fetch_assoc($result);
	   if(($num_rows==0)&&($_FILES['pic1']['size']>0)&&(!empty($latitude))&&((!empty($longitude))))
    {
		$sql=("insert into video(video1 ,latitude,longitude ) values ('$file_name1','$latitude' ,'$longitude')"); 
			
if (!mysqli_query($con,$sql)){
  die('Error: ' . mysqli_error($con));
   $msg = "Error";
}

else
{
	
$msg = "Files Uploaded Successfully!"; 
}
	
		
	}
	
    if(($num_rows>0)&&($_FILES['pic1']['size']>0)&&(!empty($latitude))&&((!empty($longitude))))
    {
		
	 if(empty($row['video1']))
	{
	

if ( $_FILES["pic1"]["type"] == "video/mp4" || $_FILES["pic1"]["type"] == "video/mpeg4" || $_FILES["pic1"]["type"] == "video/wmv" || $_FILES["pic1"]["type"] == "video/avi"  || $_FILES["pic1"]["type"] == "audio/avi" || $_FILES["pic1"]["type"] == "audio/mp4" || $_FILES["pic1"]["type"] == "audio/wmv" || $_FILES["pic1"]["type"] == "audio/mpeg4" || $_FILES["pic1"]["type"] == "audio/ogg" || $_FILES["pic1"]["type"] == "video/quicktime" || $_FILES["pic1"]["type"] == "video/webm"  || $_FILES["pic1"]["type"] == "video/x-flv"  || $_FILES["pic1"]["type"] == "video/x-m4v" || $_FILES["pic1"]["type"] == "video/x-ms-wmv" || $_FILES["pic1"]["type"] == "video/x-msvideo"  )
{ 	
			
$sql3=("UPDATE video SET  video1 = '$file_name1' where latitude ='$latitude' AND longitude  = '$longitude'"); 
	
if (!mysqli_query($con,$sql3)){
  die('Error: ' . mysqli_error($con));
   $msg = "Error";
}

else
{

$msg = "Files Uploaded Successfully!"; 
}

}
else
{
	$msg = "Invalid File Format!";	
}
 
}
 if(empty($row['video2'])&&(!empty($row['video1'])))
	{
		

if ( $_FILES["pic1"]["type"] == "video/mp4" || $_FILES["pic1"]["type"] == "video/mpeg4" || $_FILES["pic1"]["type"] == "video/wmv" || $_FILES["pic1"]["type"] == "video/avi"  || $_FILES["pic1"]["type"] == "audio/avi" || $_FILES["pic1"]["type"] == "audio/mp4" || $_FILES["pic1"]["type"] == "audio/wmv" || $_FILES["pic1"]["type"] == "audio/mpeg4" || $_FILES["pic1"]["type"] == "audio/ogg" || $_FILES["pic1"]["type"] == "video/quicktime" || $_FILES["pic1"]["type"] == "video/webm"  || $_FILES["pic1"]["type"] == "video/x-flv"  || $_FILES["pic1"]["type"] == "video/x-m4v" || $_FILES["pic1"]["type"] == "video/x-ms-wmv" || $_FILES["pic1"]["type"] == "video/x-msvideo"  )
{
			
$sql3=("UPDATE video SET  video2 = '$file_name1' where latitude ='$latitude' AND longitude  = '$longitude'"); 
	
if (!mysqli_query($con,$sql3)){
  die('Error: ' . mysqli_error($con));
   $msg = "Error";
}

else
{
	
$msg = "Files Uploaded Successfully!"; 
}
}
else
{
		$msg = "Invalid File Format!";		
}
		}
		
if(empty($row['video3'])&&(!empty($row['video1']))&&(!empty($row['video2'])))
	{	
if ( $_FILES["pic1"]["type"] == "video/mp4" || $_FILES["pic1"]["type"] == "video/mpeg4" || $_FILES["pic1"]["type"] == "video/wmv" || $_FILES["pic1"]["type"] == "video/avi"  || $_FILES["pic1"]["type"] == "audio/avi" || $_FILES["pic1"]["type"] == "audio/mp4" || $_FILES["pic1"]["type"] == "audio/wmv" || $_FILES["pic1"]["type"] == "audio/mpeg4" || $_FILES["pic1"]["type"] == "audio/ogg" || $_FILES["pic1"]["type"] == "video/quicktime" || $_FILES["pic1"]["type"] == "video/webm"  || $_FILES["pic1"]["type"] == "video/x-flv"  || $_FILES["pic1"]["type"] == "video/x-m4v" || $_FILES["pic1"]["type"] == "video/x-ms-wmv" || $_FILES["pic1"]["type"] == "video/x-msvideo"  )
{
$sql3=("UPDATE video SET video3 = '$file_name1' where latitude ='$latitude' AND longitude  = '$longitude'"); 
	
if (!mysqli_query($con,$sql3)){
  die('Error: ' . mysqli_error($con));
   $msg = "Error";
}

else
{
	
$msg = "Files Uploaded Successfully!"; 
}
}
else
{
			$msg = "Invalid File Format!";	
}
}
if(!empty($row['video3'])&&(!empty($row['video1']))&&(!empty($row['video2'])))
	{
		
	
$msg = "Cannot Upload more than Three files!"; 
}
		
}
 
 

	
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Insert Videos</title>

    	
 <link href="css/bootstrap-responsive.css" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link href="http://getbootstrap.com/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="http://getbootstrap.com/examples/navbar-fixed-top/navbar-fixed-top.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,700|Open+Sans:700' rel='stylesheet' type='text/css'>
	

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="http://getbootstrap.com/assets/js/ie-emulation-modes-warning.js"></script>
    

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
	button.hover
	{background-color:#06F;
	}
	</style>
  </head><link href="css/bootstrap-responsive.css" rel="stylesheet">
 <link href="css/bootstrap.css" rel="stylesheet">
</head>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
 
   
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
<script type="text/javascript">
var map;
var panorama;
var x = 1;
var sv = new google.maps.StreetViewService();
var i ;
function initialize() {

var a = sessionStorage.getItem("lll");
var b = sessionStorage.getItem("llll");
document.getElementById("lat").value = a;
document.getElementById("lon").value = b;
document.body.scroll = "yes"
var astorPlace = new google.maps.LatLng(a,b);

  // Set up the map
  var mapOptions = {
    center: astorPlace,
    zoom: 18,
    streetViewControl:false,
	scrollwheel: false 
  };

  map = new google.maps.Map(document.getElementById('map-canvas'),
      mapOptions);
	  
  
   panorama = new google.maps.StreetViewPanorama(document.getElementById('map-canv'));
   sv.getPanoramaByLocation(astorPlace, 50, processSVData);
  
}


function processSVData(data, status) {
  if (status == google.maps.StreetViewStatus.OK) {
    var marker = new google.maps.Marker({
      position: data.location.latLng,
      map: map,
      title: data.location.description
    });

    panorama.setPano(data.location.pano);
    panorama.setPov({
      heading: 270,
      pitch: 0
    });
    panorama.setVisible(true);

    google.maps.event.addListener(map, 'onload', function() {

      var markerPanoID = data.location.pano;
      // Set the Pano to use the passed panoID
      panorama.setPano(markerPanoID);
      panorama.setPov({
        heading: 270,
        pitch: 0
      });
      panorama.setVisible(true);
    });
  }
}
function goback()
{
  var win1 = window.open("View_Form.php");
  win1.focus();
  this.close();
}

function cll()
{
  var win1 = window.open("View_Form.php");
  win1.focus();
  this.close();
}
function pops()
{
	alert("  Video/Audio Are Allowed For Upload ");
}



</script>

 <body onload="initialize()" style="background-color:#f4e851">





  	
                       <form   action="Insert3.php" method="post"  enctype="multipart/form-data" autocomplete="off">
             	
 

    <!-- Fixed navbar -->
    <div style="background-color:#00afc9;">
    <nav class="navbar navbar-default navbar-fixed-top" style="background-color:#00afc9;border:none;width:100%;">
      <div class="container" >
        <div class="navbar-header" >
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar" >
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a onClick="cll();">  <img src="reusing-drraft-13.04-04.png"  style="margin-top:7%;height:27%;width:27%;border-top:hidden;" /></a>
        </div>
        </div>
        <div class="container">
        <div id="navbar" class="navbar-collapse collapse" style="float:right;margin-top:-4%;">
          <ul class="nav navbar-nav">
            <li><a onClick="cll();" style="color:#000;font-family:'Source Sans Pro', sans-serif;font-size:19px;">HOME</a></li>
            <li><a href="#works" style="color:#FFF;font-family:'Source Sans Pro', sans-serif;font-size:19px;">LEARN MORE ABOUT THE SITE</a></li>
            <li><a href="http://www.facebook.com/reusingdublin" target="_blank"><img style="float:!important;" href="www.facebook.com" src="facebook.png"></img></a></li>
               <li><a href="http://www.twitter.com/reusingdublin" target="_blank"><img style="float:!important" href="www.twitter.com"  src="twitter.png"></img></a></li>
           
       
          </ul>
        
        </div><!--/.nav-collapse -->
        </div>
      </div>
    </nav>
   </div>
    
  
   <div class="container-fluid"  id="works" >
      <input type="hidden" name="lat1" ID="lat"  size="40"><br><br/><br/>
      <input type="hidden" name="lon1" ID="lon" size="40"><br><br/><br/>
          <div style="width:100%;margin-right:80px;border:none;background-color:#FFF;padding:0px;background-color:transparent;border:none;margin-top:5%" class="well sidebar-nav">
            <div style="margin-left:100px;font-family:'Source Sans Pro', sans-serif;font-size:28px;font-weight:bold;color:#960;">
  <?php echo $msg ?>
  </div> 
            <font style="font-family:'Source Sans Pro', sans-serif;font-size:28px;font-weight:bold;"><b>Upload videos for site/location</font>
            <br/>
            <br/>
             
            
            <div id="map-canv"   style="height:300px;width:45%;float:left;" ></div> 
            
   <div id="map-canvas"  style="height:300px;width:45%;float:right;" >   </div>
         <br/><br/> <br/>   

      
     
       <b style="font-family:'Source Sans Pro', sans-serif;font-size:20px;margin-top:5%;font-weight:semibold;float:left;width:100%;width:100%;">
    Insert Videos:
     </b>
        <label>
    <input type="file" name="pic1" accept="video*/" onClick="pops()" style="margin-left:40px;;width:400px;" id="pic1" required/>
    </label>
     
    
       <br/>  <br/><br/>
    
    
    

       
   
   
 
     <div style="margin-top:5px;border:none;">
    
<input type="button" name="submits"  style="font-family:'Source Sans Pro', sans-serif;font-size:17px;font-weight:regular;float:left;width:42%;background-color:#00afc9;color:white;" value="BACK"  onClick="javascript:goback()"/ >      
<input type="submit" name="added" style="font-family:'Source Sans Pro', sans-serif;font-size:17px;font-weight:regular;float:left;width:44%;background-color:#00afc9;color:white;" value="UPLOAD" />
</div>

<br/>
<br/>
  <br/>
<br/>
         
 
    
   </div>
   
   </div>
   </form> 
     
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="http://getbootstrap.com/dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="http://getbootstrap.com/assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>