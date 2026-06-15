<?php
// 關閉錯誤訊息顯示
error_reporting(0);
// 啟動 Session
session_start();
// 檢查使用者是否已登入
if (!$_SESSION["id"]) {
    // 未登入時顯示提示訊息
    echo "請登入帳號";
    // 3 秒後跳轉至登入頁面
    echo "<meta http-equiv=REFRESH content='3, url=login.html'>";
}
else{    
   // mysqli_connect() 建立資料庫連線
   $conn=mysqli_connect("120.105.96.90", "immust", "immustimmust", "immust");
   // 建立新增使用者的 SQL 指令
   // 將表單送來的帳號與密碼新增至 user 資料表
   $sql="insert into user(id,pwd) values('{$_POST['id']}', '{$_POST['pwd']}')";
   // 顯示 SQL 指令（除錯用，目前已註解）
   #echo $sql;
   // 執行新增使用者指令
   if (!mysqli_query($conn, $sql)) {
     // 新增失敗時顯示錯誤訊息
     echo "新增命令錯誤";
   }
   else{
     // 新增成功時顯示提示訊息
     echo "新增使用者成功，三秒鐘後回到網頁";
     // 3 秒後返回使用者管理頁面
     echo "<meta http-equiv=REFRESH content='3, url=user.php'>";
   }
}
?>
