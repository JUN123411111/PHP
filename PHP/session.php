<?php

    // 啟動 session（要使用 $_SESSION 一定要先啟動）
    session_start(); // session 啟動（你原本寫 seaaion，有拼錯）

    // 在 session 中存入一個變數 userName，值為 Mary
    $_SESSION["userName"] = "Mary";

    // 輸出 session 中的 userName
    echo $_SESSION["userName"];

?>
