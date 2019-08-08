<?php
    // $db_hostname    = 'localhost';
    // $db_username    = 'root';
    // $db_password    = '';
    // $db_name        = 'syainkanri_sisutemu';
    // $tblname        = 'syain';

// 変数の初期化
$sql = null;
$res = null;
$dbh = null;

// $new_id=0;
$new_syain_id=0;
$new_name='';
$new_dap_id=0;
$new_seibetu=0;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {


$new_id=$_POST['id'];
$new_syain_id=$_POST['bangou'];
$new_name=$_POST['name'];
$new_dap_id=$_POST['b-name'];
$new_seibetu=$_POST['seibetu'];
// var_dump($_POST);
// session_start();

// $new_id = htmlspecialchars( $_SESSION[ 'id' ], ENT_QUOTES, 'UTF-8' );
// $new_syain_id = htmlspecialchars( $_SESSION[ 'bangou' ], ENT_QUOTES, 'UTF-8' );
// $new_name = htmlspecialchars( $_SESSION[ 'name' ], ENT_QUOTES, 'UTF-8' );
// $new_dap_id = htmlspecialchars( $_SESSION[ 'b-name' ], ENT_QUOTES, 'UTF-8' );
// $new_seibetu = htmlspecialchars( $_SESSION[ 'id' ], ENT_QUOTES, 'UTF-8' );

try {
	// DBへ接続
	$dbh = new PDO("mysql:host=localhost;dbname=syainkanri_sisutemu;charset=utf8",'root','');
    // $dsn = 'mysql:dbname = syainkanri_sisutemu; host = localhost; charset = utf8';

    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	// SQL作成
	$sql = "UPDATE syain SET syain_id=:syain_id,name=:name,dap_id=:dap_id,seibetu=:seibetu WHERE id=:id";
	// $sql = "INSERT INTO syain(syain_id,name,dap_id,seibetu) VALUES (:syain_id,:name,:dap_id,:seibetu)";
	// $sql = "INSERT INTO syain(id,syain_id,name,dap_id,seibetu) VALUES (3,0,name,0,0)";

	// SQL実行
    $res = $dbh->prepare($sql);
// var_dump($res);

// $params = array(':syain_id' =>$new_syain_id,':name' => $new_name,':dap_id' => $new_dap_id ,':seibetu' => $new_seibetu);
// $params = array(':syain_id' =>$new_syain_id);

// SQLに値を反映
    $res->bindParam(':id', $new_id, PDO::PARAM_INT);	// INT（数値）
    $res->bindParam(':syain_id', $new_syain_id, PDO::PARAM_INT);	// INT（数値）
    $res->bindParam(':name',$new_name, PDO::PARAM_STR);
    $res->bindParam(':dap_id', $new_dap_id, PDO::PARAM_INT);
    $res->bindParam(':seibetu',$new_seibetu, PDO::PARAM_STR);
    // // var_dump(name);
// $data[]=$new_id;
// $data[]=$new_syain_id;
// $data[]=$new_name;
// $data[]=$new_dap_id;
// $data[]=$new_seibetu;

// SQL文を実行する準備
// $data
// SQLを実行$params
$res->execute();
// $res->execute($params);
// var_dump($res);

    echo '<p>変更完了しました。</p>'; // 登録完了のメッセージ

// レコードの取得
$rows = $res->fetchAll();
// var_dump($rows);
	// 取得したデータを出力
	

} catch(PDOException $e) {
    echo 'エラーが発生しました！';
    echo '<a href="http://localhost/syainnkannri_sisutemu/sisutemu.php">一覧へ戻る</a>';
    echo $e->getMessage();
	die();
}

// 接続を閉じる
$dbh = null;

}
?>

<!DOCTYPE html>
<html>
  <head>  
  
  <title>完了</title>
  <style>
    h1{
        font-size: 30px;
    }
    body {
            width:60%;
            padding:20px 5%;
            margin:auto;}
    p{
        font-family: "Big Caslon", "Book Antiqua", "Palatino Linotype", Georgia, serif;
        font-size: 20px;
        "bangou"=float:right;
    }
    h4{
        font-family: "Big Caslon", "Book Antiqua", "Palatino Linotype", Georgia, serif;
    }
  </style>
    <form action="sakujo.php" method="post">
        <body>
            <h1>iYell 社員管理システム</h1>

            <?php //foreach( $rows as $value ) {
	    ?>
                <table>
                <!-- <tr><th>ID</th><td><?php //echo "$value[id]<br>";?></td></tr>
                    <tr>
                        <th>社員番号</th>
                        <td><?php //echo "$value[syain_id]<br>";?></td>
                    </tr>
                    <tr>
                        <th>氏名</th>
                        <td><?php //echo "$value[name]<br>";?></td>
                    </tr>
                    <tr>
                        <th>部署名</th>
                        <td><?php //echo "$value[dap_id]<br>";?></td>
                    </tr>
                    <tr>
                        <th>性別</th>
                        <td><?php //echo "$value[seibetu]<br>";?></td>
                    </tr>
                    <tr>
                            <td><input type="button" name="削除" value="削除"></td>
                    </tr>

                    <?php   // }?>  -->
            </table>  
        </body>
    </form>
        <a href="http://localhost/syainnkannri_sisutemu/sisutemu.php">一覧へ戻る</a>
    </head>
</html>
