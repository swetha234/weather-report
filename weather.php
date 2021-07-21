<?php

   $url="http://api.openweathermap.org/data/2.5/weather?q=Chesapeake&appid=9677b5a8300905f7b1b24ee94d8d2f69";
   $ch=curl_init();
   curl_setopt($ch,CURLOPT_URL,$url);
   curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
   $result=curl_exec($ch);
   curl_close($ch);
   $result=json_decode($result,true);
   echo '<pre>';
   print_r($result);
   
?>
<html lang="en" class=" -webkit-">
   <head>
      <meta charset="UTF-8">
      <title>Weather Card</title>

   </head>
   <style>
         @import url(https://fonts.googleapis.com/css?family=Poiret+One);
         @import url(https://cdnjs.cloudflare.com/ajax/libs/weather-icons/2.0.9/css/weather-icons.min.css);
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
         .widget .icon {
            flex: 1 100%;
            height: 60%;
            border-top-left-radius: 20px;
            border-top-right-radius: 20px;
            background: #FAFAFA;
            font-family: icons;
            display: flex;
            align-items: center;
            justify-content: space-around;
            font-size: 100px;
         }
         .widget .icon i {
            padding-top: 30px;
         }
         .widget .info {
            flex: 0 0 70%;
            height: 40%;
            background: darkslategray;
            border-bottom-left-radius: 20px;
            display: flex;
            align-items: center;
            color: white;
         }
         .widget .info .temperature {
            flex: 0 0 40%;
            width: 100%;
            font-size: 65px;
            display: flex;
            justify-content: space-around;
         }
         .widget .info .description {
         flex: 0 60%;
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
         .widget .info .description .place {
         font-size: 15px;
         }
         .widget .date {
         flex: 0 0 30%;
         height: 40%;
         background: #70C1B3;
         border-bottom-right-radius: 20px;
         display: flex;
         justify-content: space-around;
         align-items: center;
         color: white;
         font-size: 30px;
         font-weight: 800;
         }
         p {
         position: fixed;
         bottom: 0%;
         right: 2%;
         }
         p a {
         text-decoration: none;
         color: #E4D6A7;
         font-size: 10px;
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
         padding: 10px
         }
         .submit{
         height: 39px;
         width: 100px;
         border: 0px;
          }
         .mr45{
             margin-right:45px;
         }
      </style>
   <body>
      <div class="form">
         <form style="width:100%;" method="post">
            <input type="text" class="text" placeholder="Enter city name" name="city" value=""/>
            <input type="submit" value="Submit" class="submit" name="submit"/>
         </form>
      </div>
    
      <div class="widget">
         <div class="icon">
           
         </div>
         <div class="info">
            <div class="temperature">
              
            </div>
            <div class="description">
               <div class="weather_condition"></div>
               <div class="place"></div>
            </div>
            <div class="description">
               <div class="weather_condition"></div>
               <div class="place"></div>
            </div>
         </div>
         <div class="date">
             
         </div>
      </div>

   </body>
</html>