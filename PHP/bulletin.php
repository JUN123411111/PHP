<?php
    // 啟動 session（用來存使用者登入資訊）
    session_start();

    // 檢查是否已登入（判斷 session 裡的 id 是否為空）
    if($_SESSION["id"]==NULL){
        echo "請先登入";  // 提示使用者要先登入

        // 3秒後自動跳轉到登入頁面
        echo "<meta http-equiv=REFRESH content='3,login.html'>";
    }
    else{
        // 連接資料庫（主機、帳號、密碼、資料庫名稱）
        $conn=mysqli_connect("120.105.96.90", "immust", "immustimmust", "immust");

        // 從 bulletin 資料表抓取所有資料
        $result=mysqli_query($conn, "select * from bulletin");

        // 顯示登入者帳號 + 登出連結
        echo "Hi," .$_SESSION["id"]."<a href=logout.php>[登出]</a><p></p>";

        // 建立表格標題
        echo "<table border=2>
              <tr>
                <td>佈告編號</td>
                <td>佈告類別</td>
                <td>標題</td>
                <td>佈告內容</td>
                <td>發佈時間</td>
              </tr>";

        // 使用 while 逐筆讀取資料
        while ($row=mysqli_fetch_array($result)){
            echo "<tr>";

            // 顯示每一欄位資料
            echo "<td>".$row["bid"]."</td>";      // 佈告編號
            echo "<td>".$row["type"]."</td>";     // 類別
            echo "<td>".$row["title"]."</td>";    // 標題
            echo "<td>".$row["content"]."</td>";  // 內容
            echo "<td>".$row["time"]."</td>";     // 發佈時間

            echo "</tr>";
        }

        // 結束表格
        echo "</table>";
    }
?>
