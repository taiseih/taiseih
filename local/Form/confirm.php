<?php
session_start();

if (isset($_SESSION['name'])) {
    $name = $_SESSION['name'];
    $email = $_SESSION['email'];
    $age = $_SESSION['age'];
    $text = $_SESSION['text'];
}
$token = bin2hex(random_bytes(32));
$_SESSION["token"] = $token;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>confirm.php</title>
</head>

<body>

    <h2 class="message">入力内容を確認しました</h2>
    <h3 class="formTitle">入力内容</h3>

    <p class="formItem">■ 名前</p>
    <?php echo $name; ?>

    <p class="formItem">■ メール</p>
    <?php echo $email; ?>

    <p class="formItem">■ 年齢</p>
    <?php echo $age . '歳'; ?>

    <p class="formItem">■ 問い合わせ内容</p>
    <?php echo $text; ?>

    <form method="post" action="complete.php">
        <input type="hidden" name="token" value="<?php echo $token ?>">
        <input type="submit" value="送信">
        <a href="index.php?action=edit">戻る</a>
    </form>

</body>

</html>