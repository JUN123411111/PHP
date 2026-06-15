<?php
    // 關閉錯誤訊息顯示
    error_reporting(0);
    // 啟動 Session
    session_start();
    // 檢查使用者是否已登入
    if (!$_SESSION["id"]) {
        // 未登入時顯示提示訊息
        echo "please login first";
        // 3 秒後跳轉至登入頁面
        echo "<meta http-equiv=REFRESH content='3, url=login.html'>";
    }
    else{
        // 連接資料庫
        $conn=mysqli_connect("120.105.96.90", "immust", "immustimmust", "immust");
        // 建立新增佈告的 SQL 指令
        // 將表單傳來的標題、內容、類別及時間存入 bulletin 資料表
        $sql="insert into bulletin(title, content, type, time) 
        values('{$_POST['title']}','{$_POST['content']}', {$_POST['type']},'{$_POST['time']}')";
        // 執行新增資料指令
        if (!mysqli_query($conn, $sql)){
            // 新增失敗時顯示錯誤訊息
            echo "新增命令錯誤";
        }
        else{
            // 新增成功時顯示提示訊息
            echo "新增佈告成功，三秒鐘後回到網頁";
            // 3 秒後自動返回佈告管理頁面
            echo "<meta http-equiv=REFRESH content='3, url=bulletin.php'>";
        }
    }
?>
