<?php
mb_internal_encoding("utf8");

$pdo = new PDO("mysql:dbname=lesson01;host=localhost;", "root", "root");
$stmt = $pdo->query("select * from 4each_keijiban");

?>

<!DOCTYPE html>
<html lang="ja">

    <head>
        <meta charset="utf-8">
        <title>掲示板</title>
        <link rel="stylesheet" href="style.css">
    </head>
    
    <body>
        <div class="logo"><img src="4eachblog_logo.jpg"></div>
        <header>
            <ul>
                <li>トップ</li>
                <li>プロフィール</li>
                <li>4eachについて</li>
                <li>登録フォーム</li>
                <li>問い合わせ</li>
                <li>その他</li>
            </ul>
        </header>
        
        <div class="main">
            <div class="left">
                <h1>プログラミングに役立つ掲示板</h1>
                <div class="board">
                    <h2>入力フォーム</h2>
                    <form method="post" action="insert.php">
                        <div>
                            <lavel>ハンドルネーム</lavel>
                            <br>
                            <input type="text" class="text" size="35" name="handlename">
                        </div>

                        <div>
                            <lavel>タイトル</lavel>
                            <br>
                            <input type="text" class="text" size="35" name="title">
                        </div>

                        <div>
                            <lavel>コメント</lavel>
                            <br>
                            <textarea cols="60" rows="5" name="comments"></textarea>
                        </div>

                        <div>
                            <input type="submit" class="submit" value="送信する">
                        </div>
                    </form>
                </div>
                
                <?php
                
                while ($row = $stmt->fetch()) {
                    echo"<div class='article'>";
                    echo"<h3>".$row['title']."</h3>";
                    echo"<div class='contents'>";
                    echo $row['comments'];
                    echo"<div class='handlename'>posted by".$row['handlename']."</div>";
                    echo"</div>";
                    echo"</div>";
                }
                
                ?>
            </div>
            
            <div class="right">
                <h3>人気の記事</h3>
                <ul>
                    <li>PHPオススメ本</li>
                    <li>PHP MyAdminの使い方</li>
                    <li>今人気のエディタ Top5</li>
                    <li>HTMLの基礎</li>
                </ul>
                <h3>オススメリンク</h3>
                <ul>
                    <li>インターノウス株式会社</li>
                    <li>XAMPPのダウンロード</li>
                    <li>Eclipseのダウンロード</li>
                    <li>Bracketsのダウンロード</li>
                </ul>
                <h3>カテゴリ</h3>
                <ul>
                    <li>HTML</li>
                    <li>PHP</li>
                    <li>MySQL</li>
                    <li>JavaScript</li>
                </ul>
            </div>
        </div>
        
        <footer>
            copyright(c)internous | 4each blog the which provides A to Z about programming.
        </footer>
    </body>

</html