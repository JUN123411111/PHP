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
        // 執行修改使用者密碼的 SQL 指令
        // 根據表單傳來的 id 更新對應使用者的密碼
        if (!mysqli_query($conn, "update user set pwd='{$_POST['pwd']}' where id='{$_POST['id']}'")){
            // 修改失敗時顯示錯誤訊息
            echo "修改錯誤";
            // 3 秒後返回使用者管理頁面
            echo "<meta http-equiv=REFRESH content='3, url=user.php'>";
        }else{
            // 修改成功時顯示提示訊息
            echo "修改成功，三秒鐘後回到網頁";
            // 3 秒後返回使用者管理頁面
            echo "<meta http-equiv=REFRESH content='3, url=user.php'>";
        }
    }

?>
