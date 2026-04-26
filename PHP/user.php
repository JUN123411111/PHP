<html>
    <head><title>使用者管理</title></head>
    <body>
    <?php
        error_reporting(0);
        session_start(); // 啟動 session
        if (!$_SESSION["id"]) {
            echo "請登入帳號"; // 檢查是否登入
            echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>";// 3秒後跳轉登入頁
        }
        else{   
            echo "<h1>使用者管理</h1>
                [<a href=14.user_add_form.php>新增使用者</a>] [<a href=11.bulletin.php>回佈告欄列表</a>]<br>
                <table border=1>
                    <tr><td></td><td>帳號</td><td>密碼</td></tr>";
            
            $conn=mysqli_connect("120.105.96.90", "immust", "immustimmust", "immust");// 連接資料庫
            $result=mysqli_query($conn, "select * from user");
            // 逐筆顯示資料
            while ($row=mysqli_fetch_array($result)){
                // 修改 & 刪除連結（帶入 id）
                echo "<tr><td><a href=19.user_edit_form.php?id={$row['id']}>修改</a>||<a href=17.user_delete.php?id={$row['id']}>刪除</a></td><td>{$row['id']}</td><td>{$row['pwd']}</td></tr>";
            }
            echo "</table>";
        }
    ?> 
    </body>
</html>
