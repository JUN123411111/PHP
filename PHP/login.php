<?php
   #mysqli_connect() 建立資料庫連結
   $conn=mysqli_connect("120.105.96.90", "immust", "immustimmust", "immust");
   #mysqli_query() 從資料庫查詢資料
   $result=mysqli_query($conn, "select * from user");
   #mysqli_fetch_array() 從查詢出來的資料一筆一筆抓出來
   $login=FALSE;
   while ($row=mysqli_fetch_array($result)) {
     if (($_POST["id"]==$row["id"]) && ($_POST["pwd"]==$row["pwd"])) {
       $login=TRUE;// 如果符合，登入成功
     }
   } 
// 判斷是否登入成功
   if ($login==TRUE){
    session_start();// 啟動 session（用來記錄登入狀態）
    $_SESSION["id"]=$_POST["id"]; // 將使用者帳號存入 session
     echo "歡迎登入";// 顯示登入成功訊息
    echo"<meta http-equiv=REFRESH content='0,bulletin.php'>";// 立即跳轉到 bulletin.php 頁面
   }
  else{
     echo "帳號/密碼 錯誤";// 登入失敗提示
     echo"<meta http-equiv=REFRESH content='3,bulletin.php'>";// 3秒後跳轉
  }
?>
