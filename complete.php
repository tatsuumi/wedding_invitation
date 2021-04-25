<?php

// ユーザによる中断を無視する
ignore_user_abort(true);
// タイムアウトしないようにする
set_time_limit(500);


session_start();

        $name =$_SESSION['name'];
        $furigana =$_SESSION['furigana'];
        $email =$_SESSION['email'];
        $tel =$_SESSION['tel'];
        $address_num =$_SESSION['address_num'];
        $address =$_SESSION['address'];
        $relation =$_SESSION['relation'];
        $attendance =$_SESSION['attendance'];
        $message =$_SESSION['message'];
        $nijikai =$_SESSION['nijikai'];

        // confirm.html 読み込み
        require("complete.html");
        
        $flag=true;
        //postgresデータ追加
        session_start();

	$user = 'tatsuumi';
	$host = 'localhost';
	$dbname= 'mylog'; 
	$pass = 'tatsu227';

	$mysql = new MySQLi($host,$user,$pass, $dbname);
	$mysql->set_charset('utf8');
	$time = date("Y-m-d H:i:s"); 
        $sql = "INSERT INTO people (time,name,furigana,email,tel,address_num,address,relation,attendance,nijikai,message) 
        VALUES ('$time','$name','$furigana','$email','$tel','$address_num','$address','$relation','$attendance','$nijikai','$message')";
	$mysql->query($sql);
	$mysql->close();

	if($attendance=="出席"&&!empty($email)){

$to = $email;
$subject = "2021.5.15 wedding_info";
$message1 =  $name." さま\n\n".
"この度は私達の結婚式・披露宴にご参加いただきありがとうございます\n".
"下記のとおり開催致します\r\n\r\n".
"日　程　2021年5月15日（土）\r\n".
"受　付　13時15分\r\n".
"挙　式　14時00分\r\n".
"披露宴　15時00分\r\n\r\n".
"場所\r\n".
"葛西臨海公園内クリスタルビュー地下1階 \r\n".
"https://goo.gl/maps/GRCMBcBdiqrLBUWi7\r\n".
"東京都江戸川区臨海町6丁目2\r\n".
"TEL 0120-981-984\r\n\r\n".
"服装\n".
"ポロシャツ　デニム　チノパン　ワンピース等可\n".
"スニーカー　ノーヒール可\n\n".
"以上、みなさまのご参加を心よりお待ちしております";

$headers = "From: from@example.com";
mb_send_mail($to, $subject, $message1, $headers); 
	}
$to2 = "tatsuumi227@gmail.com";
$subject2 = "【結婚式回答】".$name."さま";
$message2 =  $name." さま　".$attendance."\n".
	$furigana."\n".
	$email."\n".
	$tel."\n".
	$address_num."\n".
	$address."\n".
	$relation."\n".
	$message."\n";
$headers2 = "From: from@example.com";
mb_send_mail($to2, $subject2, $message2, $headers2); 

    $_SESSION = array();
    session_destroy();
