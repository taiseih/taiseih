<?php 
session_start();
if($_SESSION['token'] == $_POST['token']){
    if (isset($_SESSION['name'])) {
        $name = $_SESSION['name'];
        $email = $_SESSION['email'];
        $age = $_SESSION['age'];
        $text = $_SESSION['text'];
    }

    // アドミンに送るメール内容
//     $toAdmin = "test@test.com";
//     $mailTitleByAdmin = "{$name}様からのお問合せ";
//     $mailContentsByAdmin = <<< EOD
//         ■ 名前
//         {$name}
//         ■ メールアドレス
//         {$email}
//         ■ 年齢
//         {$age}
//         ■ 問い合わせ内容
//         {$text}
//     EOD;
//     $fromUser = 'From: '.$email;
//     // endアドミンに送るメール内容

//     // ユーザーに送るメール内容
//     $toUser = $email;
//     $mailTitleByUser = "問い合わせ内容受付を完了しました";
//     $mailContentsByUser = <<< EOD
//         お問合せいただきありがとうございました。
//         以下の内容で送信いたしました。
//         --------------------------
//         {$mailContentsByAdmin}
//         --------------------------
//         E-mail: {$toAdmin}

//     EOD;
//     $fromAdmin = 'From: '.$toAdmin;
// // endユーザーに送るメール内容

// // メールを送る
// // 言語の指定
// mb_language("Japanese");
// mb_internal_encoding("UTF-8");
// // end言語の指定
// if(mb_send_mail($toUser, $mailTitleByUser, $mailContentsByUser, $fromAdmin)) {
//     $message = '<p>'.$email.'宛に確認メールを送信いたしました。お問合せありがとうございました。';

//     if(mb_send_mail($toAdmin, $mailTitleByAdmin, $mailContentsByAdmin, $fromUser)) {
//         // 自分に送られたら内容は破棄する
//         $_SESSION = [];

//         // cookieのセッション
//     if(isset($_COOKIE[session_name()])) {
//         $params = session_get_cookie_params();
//         setcookie(session_name(),'',time() - 60000, $params["path"], $params["domain"], $params["secure"], $params['httponly']);
//     }
//     session_destroy();
//     }else {
//         $message = '<p>エラーが発生したため送れませんでした。</p>';
//     }   
// }else {
//     $message = '<p>'.$email.'に確認メールを送信できませんでした。';
// }
// end メールを送る

}else{
    header('Location:index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>complete.php</title>
</head>
<body>
    <h2>以下の内容で登録しました。お問合せありがとうございます。</h2>
    <p class="formItem">■ 名前</p>
    <?php echo $name; ?>

    <p class="formItem">■ メール</p>
    <?php echo $email; ?>

    <p class="formItem">■ 年齢</p>
    <?php echo $age . '歳'; ?>

    <p class="formItem">■ 問い合わせ内容</p>
    <?php echo $text; ?>

    <?php 
        // if($message !== "") {
        //     echo $message;
        // }
        $_SESSION = [];
    ?>
    <p><a href="index.php">TOPに戻る</a></p>

</body>
</html>