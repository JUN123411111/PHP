<?php
   // mysqli_connect() 建立資料庫連線
   $conn=mysqli_connect("120.105.96.90", "immust", "immustimmust", "immust");
   // mysqli_query() 執行 SQL 查詢，取得 user 資料表所有資料
   $result=mysqli_query($conn, "select * from user");
   // mysqli_fetch_array() 用來逐筆讀取查詢結果
   $login=FALSE;
   // 逐筆比對帳號與密碼
   while ($row=mysqli_fetch_array($result)) {
     // 檢查使用者輸入的帳號與密碼是否符合資料庫資料
     if (($_POST["id"]==$row["id"]) && ($_POST["pwd"]==$row["pwd"])) {
       // 驗證成功
       $login=TRUE;
     }
   } 
   // 登入成功
   if ($login==TRUE) {
    // 啟動 Session
    session_start();
    // 將登入帳號存入 Session
    $_SESSION["id"]=$_POST["id"];
    // 顯示登入成功訊息
    echo "登入成功";
    // 3 秒後跳轉至佈告欄管理頁面
    echo "<meta http-equiv=REFRESH content='3, url=bulletin.php'>";
   }
  else{
    // 登入失敗時顯示錯誤訊息
    echo "帳號/密碼 錯誤";
    // 3 秒後返回登入頁面
    echo "<meta http-equiv=REFRESH content='3, url=login.html'>";
  }
?>
