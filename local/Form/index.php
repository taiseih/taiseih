<?php
session_start();
$data = $_POST;
var_dump($_SESSION);

// サニタイズ
function h($str)
{
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}
if (isset($data['submit'])) {
    $name = h($data['name']);
    $email = h($data['email']);
    $age = h($data['age']);
    $text = h($data['text']);
}
// endサニタイズ

// エラー文の定義

    $error = [];

    if (empty($data['name'])) {
        $error[] = "名前を入力してください";
    }
    if (empty($data['email'])) {
        $error[] = "メールアドレスを入力してください";
    }
    if (empty($data['age'])) {
        $error[] = "年齢を入力してください";
    }
    if (empty($data['text'])) {
        $error[] = "お問い合わせ内容を入力してください";
    }

   

?>
<!-- endエラー文の定義 -->
<!-- 空白の時にアラートを表示 -->

<?php if (!empty($data)) : ?>
    <?php
    $errorJs = $error;
    $errorJsParam = json_encode($errorJs);
    ?>
    <?php if (!empty($error)) : ?>
        <script>
            var errorJs = JSON.parse('<?php echo $errorJsParam ?>');
            alert(errorJs);
        </script>
    <?php endif; ?>
<?php endif; ?>
<!-- endアラート表示 -->
<?php 

// confirm.phpに遷移する記述
if(empty($error)){
    $_SESSION['name'] = $name;
    $_SESSION['email'] = $email;
    $_SESSION['age'] = $age;
    $_SESSION['text'] = $text;

    header('Location:confirm.php');
}

// 戻るボタンで戻ってきた時の記述

if(isset($_GET) && $_GET['action'] == 'edit'){
    $nameEdit = $_SESSION['name'];
    $emailEdit = $_SESSION['email'];
    $ageEdit = $_SESSION['age'];
    $textEdit = $_SESSION['text'];
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Form</title>
    <link rel="stylesheet" type="text/css" href="sample.css">
</head>

<body>

    <body>

        <form action="index.php" method="post">
            <table class="form-table">
                <h2 class="form-area_title">お問い合わせフォーム</h2>
                <tr>
                    <th class="form-area_input">
                        <p>名前</p>
                    <td class="input-holder">
                        <input type="text" name="name" placeholder="例）田中 太郎" value="<?php if(isset($nameEdit)){echo $nameEdit;} ?>">
                    </td>
                    </th>
                </tr>
                <tr>
                    <th class="form-area_input">
                        <p>メールアドレス</p>
                    <td class="input-holder">
                        <input type="email" name="email" placeholder="例）abc@abc.com" value="<?php if(isset($emailEdit)){echo $emailEdit;} ?>">
                    </td>
                    </th>
                </tr>
                <tr>
                    <th class="form-area_input">
                        <p>年齢</p>
                    <td class="input-holder">
                        <select name="age">
                            <option value="<?php if(isset($ageEdit)){ echo $ageEdit;} ?>"><?php if(isset($ageEdit)){ echo $ageEdit;} ?></option>

                            <?php
                            for ($age = 6; $age <= 80; $age++) {
                                echo "<option value={$age}>{$age}</option>";
                            }
                            ?>
                        </select>
                    </td>
                    </th>
                </tr>
                <tr>
                    <th class="form-area_input">
                        <p>問い合わせ内容</p>
                    <td class="input-holder">
                        <textarea name="text" placeholder="問い合わせ内容を入力してください" ><?php if(isset($textEdit)){echo $textEdit;} ?></textarea>
                    </td>
                    </th>
                </tr>
            </table>
            <p class="submit">
                <input type="submit" name="submit" value="送信">
            </p>
        </form>
    </body>

</html>