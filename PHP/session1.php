<?php

    // 啟動 session（一定要先啟動才能使用 $_SESSION）
    session_start();

    // 輸出 session 中的 userName
    echo $_SESSION["userName"];

?>
