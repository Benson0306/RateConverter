<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
 <script src="converter.js"></script>                          <!--引入js檔-->
 <?php include('getrate.php') ?>                               <!--引入php檔-->
 <link rel=stylesheet type="text/css" href="converter.css">    <!--引入css檔-->
 </head>

<body>

<div id="conveter_outer">
 
 <div id="converter_inner_1">
    <h1 id="title_left">匯率換算器</h1>
    <h5 id="title_right">依台灣銀行現金賣出價計算</h5>
 </div>

 <div id="converter_inner_2">
    <button onclick="reset()" >歸0</button>
    
    <input type="text" style="text-align:right" id="input_money" oninput="countinput()" maxlength="13"></input>
    
     <select id="first_rate" onchange="countinput();showrateinfo()">
     <?php
        $count=0;
        foreach($ratelist as $key => $value ){
        echo   '<option value="'.$key.'">'.$ratetype[$count].'</option>' ;
          $count++;
        }
     ?>
      </select>   
     
      <h3>
        相當於
      </h3>
     <h3 id="output_money">
        <b id="money">0</b>
     </h3>
      
      <select id="second_rate" onchange="countinput();showrateinfo()">
        <?php
        $count=0;
        foreach($ratelist as $key => $value ){
          
          echo   '<option value="'.$key.'">'.$ratetype[$count].'</option>' ;
          $count++;
        }
        ?>
      </select>   
    
    <button onclick="switchrate()" ">匯率交換</button>  
 </div>
 
 <div id="converter_inner_3">
   
      <h5 id="rateinfo">(1台幣=1台幣)</h5>
      
 </div> 
 <div id="converter_inner_4">
   <h5 id="update_time_title">匯率更新時間:</h5>
   <h5 id="update_time_title"><?php   echo $updatetime; ?></h5>
 </div>
 

</div>

</body>

</html>