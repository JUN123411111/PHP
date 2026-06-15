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
        // 連接資料庫
        $conn=mysqli_connect("120.105.96.90", "immust", "immustimmust", "immust");
        // 建立刪除佈告的 SQL 指令
        // 根據網址傳來的 bid 刪除指定佈告
        $sql="delete from bulletin where bid='{$_GET["bid"]}'";
        // 顯示 SQL 指令（除錯用，目前已註解）
        #echo $sql;
        // 執行刪除指令
        if (!mysqli_query($conn,$sql)){
            // 刪除失敗時顯示錯誤訊息
            echo "佈告刪除錯誤";
        }else{
            // 刪除成功時顯示提示訊息
            echo "佈告刪除成功";
        }
        // 3 秒後返回佈告管理頁面
        echo "<meta http-equiv=REFRESH content='3, url=bulletin.php'>";
    }
?>
