<?php
    // 啟動 Session
    session_start();
    // 刪除 Session 中儲存的登入帳號資料
    unset($_SESSION["id"]);
    // 顯示登出成功訊息
    echo "登出成功....";
    // 3 秒後自動返回登入頁面
    echo "<meta http-equiv=REFRESH content='3; url=login.html'>";
?>
