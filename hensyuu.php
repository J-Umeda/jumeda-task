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

$new_id=0;
// $new_syain_id=0;
// $new_name='';
// $new_dap_id=0;
// $new_seibetu=0;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {


$new_id=$_POST['id'];
// $new_syain_id=$_POST['bangou'];
// $new_name=$_POST['name'];
// $new_dap_id=$_POST['b-name'];
// $new_seibetu=$_POST['seibetu'];



try {
	// DBへ接続
	$dbh = new PDO("mysql:host=localhost;dbname=syainkanri_sisutemu;charset=utf8",'root','');
    // $dsn = 'mysql:dbname = syainkanri_sisutemu; host = localhost; charset = utf8';

    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	// SQL作成
	$sql = "SELECT `id`, `syain_id`, `name`, `dap_id`, `seibetu` FROM `syain` WHERE id=:id";
	// $sql = "INSERT INTO syain(syain_id,name,dap_id,seibetu) VALUES (:syain_id,:name,:dap_id,:seibetu)";
	// $sql = "INSERT INTO syain(id,syain_id,name,dap_id,seibetu) VALUES (3,0,name,0,0)";

	// SQL実行
    $res = $dbh->prepare($sql);
// var_dump($res);

// $params = array(':syain_id' =>$new_syain_id,':name' => $new_name,':dap_id' => $new_dap_id ,':seibetu' => $new_seibetu);
// $params = array(':syain_id' =>$new_syain_id);

// SQLに値を反映
    $res->bindParam(':id', $new_id, PDO::PARAM_INT);	// INT（数値）
    // $res->bindParam(':syain_id', $new_syain_id, PDO::PARAM_INT);	// INT（数値）
    // $res->bindParam(':name',$new_name, PDO::PARAM_STR);
    // $res->bindParam(':dap_id', $new_dap_id, PDO::PARAM_INT);
    // $res->bindParam(':seibetu',$new_seibetu, PDO::PARAM_INT);
    // // var_dump(name);


// SQL文を実行する準備
// $data
// SQLを実行$params
$res->execute();
// var_dump($res);

    // echo '<p>削除完了しました。</p>'; // 登録完了のメッセージ

// レコードの取得
$rows = $res->fetchAll();
// var_dump($rows);
	// 取得したデータを出力
	

} catch(PDOException $e) {
    echo 'エラーが発生しました！';
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
  
  <title>編集</title>
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
    <form action="done.php" method="post">
        <body>
            <h1>iYell 社員管理システム</h1>
                <table>
                <?php foreach( $rows as $value ) {
	    ?>
                    <tr><th>ID</th><td><input  name="id" value='<?php echo $value['id']?>'></td></tr>

                    <tr>
                        <th>社員番号</th>
                        <td><input type="text" name="bangou" value='<?php echo $value['syain_id']?>'></td>
                    </tr>
                    <tr>
                        <th>氏名</th>
                        <td><input type="text" name="name" value='<?php echo $value['name']?>'></td>
                    </tr>
                    <tr>
                        <th>部署名</th>
                        <td>
                        <select name="b-name" id="" value='<?php echo $value['dap_id']?>'>
                        <option>選択してください。</option>
                        <option value="1">1 テクノロジー本部 テックドライブ部 プラットフォームG</option>
                        <option value="2">2 テクノロジー本部 テックドライブ部 サービスG</option>
                        <option value="3">3 メディア本部 メディア推進部 プロモーションG</option>
                        <option value="4">4 メディア本部 メディア推進部 ユーザーリレーションG</option>
                        <option value="5">5 ダンドリ本部 ダンドリ営業部 リードジェネレーションG</option>
                        <option value="6">6 ダンドリ本部 ダンドリ営業部 セールスG</option>
                        <option value="7">7 ダンドリ本部 ダンドリ営業部 カスタマーサクセスG</option>
                        <option value="8">8 ダンドリ本部 ダンドリドライブ部 ウィズカスタマーG</option>
                        <option value="9">9 ダンドリ本部 ダンドリドライブ部 ダンドリストラテージG</option>
                        <option value="10">10 ダンドリ本部 ダンドリドライブ部 コンサルティングG</option>
                        <option value="11">11 バンカーサポート本部 バンカーサポート1部 CS借換デスク</option>
                        <option value="12">12 バンカーサポート本部 バンカーサポート2部 MSJ借換デスク</option>
                        <option value="13">13 バンカーサポート本部　バンカーサポート2部　MSJ新橋店</option>
                        <option value="14">14 管理本部 管理部 財務G</option>
                        <option value="15">15 管理本部 管理部 経理・労務G</option>
                        <option value="16">16 管理本部 情報システム部 情報システムG</option>
                        <option value="17">17 管理本部 法務・コンプライアンス部 法務・コンプライアンスG</option>
                        <option value="18">18 新規事業開発室</option>
                        <option value="19">19 IPO室</option>
                        <option value="20">20 社長室</option>
                        <option value="21">21 社長秘書室</option>
                        <option value="22">22 iYellists partners室</option>
                        <option value="23">23 iYellists communication室</option>
                        <option value="24">24 iYellists DNA室</option>
                        <option value="25">25 iYell global室</option>
                        </select>
                        </td>
                    </tr>
                    <tr>
                        <th>性別</th> 
                        <td><select name="seibetu" id=""  value='<?php echo $value['seibetu']?>'>
                            <?php if($value['seibetu']=="男"){
                            echo '<option selected>男</option>';
                            echo '<option select>女</option>';
                        }else{
                            echo '<option selected>女</option>';
                            echo '<option select>男</option>';
                        }?>
                            <option value="">---</option>
                            <option value="男">男</option>
                            <option value="女">女</option>
                            
                            </select></td>
                    </tr>
                    <tr>
                            <td><input type="submit" name="保存" value="保存"></td>
                    </tr>
                    <?php    }?>
            </table>  
        </body>
    </form>
        <a href="http://localhost/syainnkannri_sisutemu/sisutemu.php">戻る</a>
    </head>
</html>