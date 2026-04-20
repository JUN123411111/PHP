<?php
    session_start();
    if($_SESSION["id"]==NULL){
        echo "請先登入";
        echo "<meta http-equiv=REFRESH content='3,login.html'>";
    }

    else{
    $conn=mysqli_connect("120.105.96.90", "immust", "immustimmust", "immust");
    $result=mysqli_query($conn, "select * from bulletin");
    echo "Hi," .$_SESSION["id"]."<a href=logout.php>[登出]</a><p></p>";
    echo "<table border=2><tr><td>佈告編號</td><td>佈告類別</td><td>標題</td><td>佈告內容</td><td>發佈時間</td></tr>";
    while ($row=mysqli_fetch_array($result)){
        echo "<tr><td>".$row["bid"]."</td><td>";
        echo $row["type"]."</td><td>"; 
        echo $row["title"]."</td><td>";
        echo $row["content"]."</td><td>";
        echo $row["time"]."</td></tr>";
    }
    echo "</table>";
    }
?>