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

// $new_syain_id=$_POST['bangou'];
// $new_name=$_POST['name'];
// $new_dap_id=$_POST['b-name'];
// $new_seibetu=$_POST['seibetu'];
// var_dump($new_syain_id);
// var_dump($new_name);
// var_dump($new_dap_id);
// var_dump($new_seibetu);

try {
	// DBへ接続
	$dbh = new PDO("mysql:host=localhost;dbname=syainkanri_sisutemu;charset=utf8",'root','');
    // $dsn = 'mysql:dbname = syainkanri_sisutemu; host = localhost; charset = utf8';

    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	// SQL作成
	// $sql = "SELECT * FROM syain";

    $sql="SELECT * FROM syain 
        LEFT OUTER JOIN bsyo ON syain.dap_id=bsyo.dap_id";

        
// (RIGHT)
	// SQL実行
	$res = $dbh->prepare($sql);
// var_dump($res);

// SQL文を実行する準備

// SQLを実行
$res->execute();
// レコードの取得
$rows = $res->fetchAll();
// var_dump($rows);
	// 取得したデータを出力
	

} catch(PDOException $e) {
	echo $e->getMessage();
	die();
}

// 接続を閉じる
$dbh = null;



?>

<!DOCTYPE html>
<html>
  <head>
    <title>テスト</title>
  </head>
  <style>
    h1{
        font-size: 30px;
    }
    table th{
        padding:5px 15px;
    }
  </style>
<body>
    <h1>iYell 社員管理システム</h1>
    <a href="http://localhost/syainnkannri_sisutemu/touroku.php">新規登録</a>
        
    <table width="80%" border='1'>
        <tr>
        <th scope="col">ID</th>
        <th>社員番号</th>   
        <th name=$name>氏名</th>
        <th>部署名</th>
        <th>性別</th>
        <th> </th>
        </tr>

        <?php foreach( $rows as $value ) {
	    ?>
        <tr>
        <td> <?php echo "$value[id]<br>";?> </td>
        <td> <?php echo "$value[syain_id]<br>";?> </td>
        <td> <?php echo "$value[name]<br>";?> </td>
        <td> <?php echo "$value[dap_id]<br>";?> </td>
        <td> <?php echo "$value[seibetu]<br>";?> </td>
        <td><form action="hensyuu.php" method="post">
            <input type="submit" value="編集">
            <input type="hidden" name="id" value="<?php echo "$value[id]<br>";?>">
        </form></td>
        <td><form action="sakujo.php" method="post">
            <input type="submit" value="削除">
            <input type="hidden" name="id" value="<?php echo "$value[id]<br>";?>">
        </form></td>

    <?php    }?>

    </table>
</body>
</html>

<!-- <a href="http://localhost/syainnkannri_sisutemu/hensyuu.php">編集</a>/<a href="http://localhost/syainnkannri_sisutemu/sakujo.php">削除</a></td> -->
