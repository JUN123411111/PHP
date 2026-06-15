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
        // 顯示新增佈告表單頁面
        echo "
        <html>
            <head><title>新增佈告</title></head>
            <body>
                <!-- 表單送出後交由 bulletin_add.php 處理 -->
                <form method=post action=bulletin_add.php>
                    <!-- 輸入佈告標題 -->
                    標    題：<input type=text name=title><br>
                    <!-- 輸入佈告內容 -->
                    內    容：<br><textarea name=content rows=20 cols=20></textarea><br>
                    <!-- 選擇佈告類型 -->
                    佈告類型：<input type=radio name=type value=1>系上公告 
                            <input type=radio name=type value=2>獲獎資訊
                            <input type=radio name=type value=3>徵才資訊<br>
                    <!-- 選擇發布日期 -->
                    發布時間：<input type=date name=time><p></p>
                    <!-- 送出與清除按鈕 -->
                    <input type=submit value=新增佈告> <input type=reset value=清除>
                </form>
            </body>
        </html>
        ";
    }
?>
