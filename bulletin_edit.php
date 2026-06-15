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
        // 執行更新佈告資料的 SQL 指令
        // 根據表單傳來的 bid 修改標題、內容、發布時間及佈告類型
        if (!mysqli_query($conn, "update bulletin set title='{$_POST['title']}',content='{$_POST['content']}',time='{$_POST['time']}',type={$_POST['type']} where bid='{$_POST['bid']}'")){
            // 修改失敗時顯示錯誤訊息
            echo "修改錯誤";
            // 3 秒後返回佈告列表頁面
            echo "<meta http-equiv=REFRESH content='3, url=bulletin.php'>";
        }else{
            // 修改成功時顯示提示訊息
            echo "修改成功，三秒鐘後回到佈告欄列表";
            // 3 秒後返回佈告列表頁面
            echo "<meta http-equiv=REFRESH content='3, url=bulletin.php'>";
        }
    }

?>
