<?php

    // 啟動 session（要操作 session 一定要先啟動）
    session_start();

    // 清除 session 中的 id（代表登出）
    unset($_SESSION["id"]);

    // 顯示登出成功訊息
    echo "登出成功";

    // 3秒後自動跳轉回登入頁面
    echo "<meta http-equiv=REFRESH content='3,login.html'>";

?>
