<html>
    <head><title>使用者管理</title></head>
    <body>
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
            // 顯示使用者管理頁面標題及功能選單
            echo "<h1>使用者管理</h1>
                [<a href=user_add_form.php>新增使用者</a>] [<a href=bulletin.php>回佈告欄列表</a>]<br>
                <table border=1>
                    <tr><td></td><td>帳號</td><td>密碼</td></tr>";
            // 連接資料庫
            $conn=mysqli_connect("120.105.96.90", "immust", "immustimmust", "immust");
            // 查詢 user 資料表中的所有使用者資料
            $result=mysqli_query($conn, "select * from user");
            // 逐筆讀取使用者資料
            while ($row=mysqli_fetch_array($result)){
                // 顯示修改、刪除連結以及帳號和密碼資料
                echo "<tr><td><a href=user_edit_form.php?id={$row['id']}>修改</a>||<a href=user_delete.php?id={$row['id']}>刪除</a></td><td>{$row['id']}</td><td>{$row['pwd']}</td></tr>";
            }
            // 結束表格
            echo "</table>";
        }
    ?> 
    </body>
</html>
