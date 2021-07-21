<?php

$status="";
$msg="";
$city="";
if(isset($_POST['submit'])){
    $city=$_POST['city'];
    $url="http://api.openweathermap.org/data/2.5/weather?q=$city&appid=9677b5a8300905f7b1b24ee94d8d2f69";
    $ch=curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    $result=curl_exec($ch);
    curl_close($ch);
    $result=json_decode($result,true);
    if($result['cod']==200){
        $status="yes";
    }else{
        $msg=$result['message'];
    }
}
?>
<html lang="en" class=" -webkit-">
   <head>
      <meta charset="UTF-8">
      <title>Weather Report</title>
   </head>
   <style>
         body {
            background: rgb(218,232,228);
            background: linear-gradient(90deg, rgba(218,232,228,1) 35%, rgba(202,211,222,1) 100%);
            background-size: cover;
            background-position: center;
         }
         .widget {
            position: absolute; 
             top: 50%;
            left: 50%; 
            display: flex;
            height: 300px;
            width: 600px;
            transform: translate(-50%, -50%);
            flex-wrap: wrap;
            cursor: pointer;
            border-radius: 20px;
         }
        
         .widget .info {
            flex: 0 0 70%;
            margin-top:-10rem;
            border-bottom-left-radius: 20px;
            display: flex;
            align-items: center;
            color: black;
         }
         .widget .info .temperature {
            flex: 0 0 40%;
            width: 100%;
            font-size: 65px;
            display: flex;
            justify-content: space-around;
         }
         .widget .info .description {
            display: flex;
            flex-direction: column; 
            width: 100%;
            height: 100%;
            justify-content: center;
            margin-left:-15px;
         }
         .widget .info .description .weather_condition {
            text-transform: uppercase;
            font-size: 35px;
            font-weight: 100;
         }
         .widget .date {
            margin-top:-10rem;
            display: flex;
            justify-content: space-around;
            align-items: center;
            color: black;
            font-size: 30px;
            font-weight: 800;
         }
         .form{
            position: absolute;
            top: 42%;
            left: 50%;
            display: flex;
            height: 300px;
            width: 600px;
            transform: translate(-50%, -50%);
         }
         .text{
            width: 80%;
            padding: 10px;
            text-transform: uppercase;
         }
         .submit{
            height: 39px;
            width: 100px;
          }
        
      </style>
   <body>
      <div class="form">
         <form style="width:100%;" method="post">
            <input type="text" class="text" placeholder="Enter city name" name="city" value=""/>
            <input type="submit" value="Submit" class="submit" name="submit"/>
         </form>
      </div>
      <?php if($status=="yes"){?>
      <div class="widget">
         <div class="info">
            <div class="temperature">
            <span><?php echo round(9/5 * ($result['main']['temp']-273.15) + 32)?>F</span>
            </div>
            <div class="description">
               <div class="place"><?php echo $result['name']?></div>
            </div>
            <div class="description">
               <div class="weather_condition">Wind</div>
               <div class="place"><?php echo $result['wind']['speed']?> M/H</div>
            </div>
         </div>
         <div class="date">
         <?php echo date('M d',$result['dt'])?> 
         </div>
      </div>
      <?php } ?>
   </body>
</html>