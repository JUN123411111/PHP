<?php
    // 關閉錯誤訊息顯示
    error_reporting(0);
    // 啟動 Session 功能
    session_start();
    // 檢查是否已登入
    if (!$_SESSION["id"]) {
        // 未登入時顯示提示訊息
        echo "請先登入";
        // 3 秒後自動跳轉至登入頁面
        echo "<meta http-equiv=REFRESH content='3, url=login.html'>";
    }
    else{
        // 顯示歡迎訊息及功能選單
        echo "歡迎, ".$_SESSION["id"]."[<a href=logout.php>登出</a>] [<a href=user.php>管理使用者</a>] [<a href=bulletin_add_form.php>新增佈告</a>]<br>";
        // 連接資料庫
        $conn=mysqli_connect("120.105.96.90", "immust", "immustimmust", "immust");
        // 執行查詢，取得 bulletin 資料表所有資料
        $result=mysqli_query($conn, "select * from bulletin");
        // 建立表格標題列
        echo "<table border=2><tr><td></td><td>佈告編號</td><td>佈告類別</td><td>標題</td><td>佈告內容</td><td>發佈時間</td></tr>";
        // 逐筆讀取資料表內容
        while ($row=mysqli_fetch_array($result)){
            // 顯示修改與刪除連結，並帶入佈告編號(bid)
            echo "<tr><td><a href=bulletin_edit_form.php?bid={$row["bid"]}>修改</a> 
            <a href=bulletin_delete.php?bid={$row["bid"]}>刪除</a></td><td>";
            // 顯示佈告編號
            echo $row["bid"];
            echo "</td><td>";
            // 顯示佈告類別
            echo $row["type"];
            echo "</td><td>"; 
            // 顯示佈告標題
            echo $row["title"];
            echo "</td><td>";
            // 顯示佈告內容
            echo $row["content"]; 
            echo "</td><td>";
            // 顯示發佈時間
            echo $row["time"];
            echo "</td></tr>";
        }
        // 結束表格
        echo "</table>";
    }
?>
