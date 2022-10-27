<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>4eachblog 掲示板</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <?php 

    mb_internal_encoding("utf8");
    $pdo = new PDO("mysql:dbname=lesson01;host=localhost;","root","");
    $stmt = $pdo->query("select * from 4each_keijiban");
    
    ?>
    <div class="logo">
        <img src="4eachblog_logo.jpg">
    </div>
    
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

    <main>
        <div class="main_container">
            <div class="left">
                <h2>プログラミングに役立つ掲示板</h2>

                <form method="post" action="insert.php">
                    <h3>入力フォーム</h3>
                    <div>
                        <p>ハンドルネーム</p>
                        <input type="text" size="35" name="handlename">
                    </div>
                
                    <div>
                        <p>タイトル</p>
                        <input type="text" size="35" name="title">
                    </div>
                
                    <div>
                        <p>コメント</p>
                        <textarea cols=70 rows=7 name="comments"></textarea>
                    </div>

                    <input type="submit" class="submit" value="投稿する">
                </form>

                <div class="board">
                    <?php
                    while($row = $stmt ->fetch()){
                        echo "<div class='box'>";
                        echo "<div class='contents'>";
                        echo "<h3>".$row['title']."</h3>";
                        echo $row['comments'];
                        echo "<p class='handlename'>posted by".$row['handlename']."</p>";
                        echo "</div>";
                        echo "</div>";
                    }

                    ?>
                </div>
            </div>

            <div class="right">
                <h3>人気の記事</h3>
                <ul>
                    <li>PHPオススメ本</li>
                    <li>PHP MyAdminの使い方</li>
                    <li>今人気のエディタ</li>
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
    </main>

    <footer>
        <p>copyright 🄫 internous | 4each blog the which provides A to Z about programming.</p>
    </footer>
</body>
</html>
