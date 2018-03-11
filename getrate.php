<?php  
 $link=@mysqli_connect("localhost","converter","E125170035","rate");
 mysqli_query($link,'SET NAMES utf8');
 $sql="select 幣別,現金本行賣出,中文幣別 from rate";
 
 $result=mysqli_query($link,$sql);
 
 $ratelist=array();      //匯率結合陣列"英文幣別":"匯率"
 $ratelist["TWD"]="1";   //新增台幣匯率
 $ratetype=array();      //中文匯率名稱普通陣列
 $ratetype[]="台幣";     //新增台幣中文匯率名稱
 
 while($row=mysqli_fetch_assoc($result)){
   
  if($row["現金本行賣出"]=="-")      //檢查匯率是否存在
      continue;
  $ratelist[$row["幣別"]]=$row["現金本行賣出"];   // 將sql查詢結果存成結合陣列 
  
  //清理中文幣值
  $row["中文幣別"]=str_replace(array( '(', ')' ),'', $row["中文幣別"]);
  $row["中文幣別"]=substr( $row["中文幣別"] ,0 , strlen($row["中文幣別"])/2);
  $ratetype[]=$row["中文幣別"];
}


$ratelist_jason=json_encode($ratelist);         //將結合陣列轉換成jason格式 
 $ratelist_jason="'".$ratelist_jason."'"; 
 $sql="select 抓取時間 from rate";
 $result=mysqli_query($link,$sql);
 $row2=mysqli_fetch_assoc($result);
 $updatetime= $row2["抓取時間"];
echo "<script>phpar2jsobj(".$ratelist_jason.")</script>"; //將php結合陣列轉成javascript物件
mysqli_free_result($result); //釋放伺服端的記憶體空間
mysqli_close($link);         //關閉資料庫連結
?>