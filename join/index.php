<?php
session_start();
require('../library.php');

$form = [
    'name' => '',
    'email' => '',
    'password' => ''
];
$error = [];

// フォームが送信された時(フォームの内容をチェック)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $form['name'] = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    if ($form['name'] === '') {
        $error['name'] = 'blank';
    }

    $form['email'] = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    if ($form['email'] === '') {
        $error['email'] = 'blank';
    }

    $form['password'] = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
    if ($form['password'] === '') {
        $error['password'] = 'blank';
    } else if (strlen($form['password']) < 4) {
        $error['password'] = 'length';
    }

    // ※画像のチェック
    $image = $_FILES['image'];
        // アップロードの確認
    if ($image['name'] !== '' && $image['error'] === 0) {
        // エラーが発生すると0以外の番号が入ってくるので===0でエラーが起こっていなければということになる
        $finfo = new finfo();
        $type = $finfo->file($image['tmp_name'], FILEINFO_MIME_TYPE);
        if ($type !== 'image/png' && $type !== 'image/jpg' && $type !== 'image/jpeg') {
            $error['image'] = 'type';
        }
    }

    // $errorに何も入っていなければ移動する
    if (empty($error)) {
        $_SESSION['form'] = $form;

        //画像のアップロード
        if ($image['name'] !== '') {
            $filename = date('YmdHis') . '_' . $image['name'];
        if (!move_uploaded_file($image['tmp_name'], '../member_picture/' . $filename)) {
            die('ファイルのアップロードに失敗しました。');
        }
        $_SESSION['form']['image'] = $filename;
        } else {
            $_SESSION['form']['name'] = '';
        }
        
        header('Location: check.php');
        exit();
    }
}

?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Member Registration</title>

    <link rel="stylesheet" href="../style.css"/>
</head>

<body>
<div id="wrap">
    <div id="head">
        <h1>Member Registration</h1>
    </div>

    <div id="content">
        <p>次のフォームに必要事項をご記入ください。</p>
        <form action="" method="post" enctype="multipart/form-data">
            <ul>
                <li>ニックネーム<span class="required">必須</span></li>
                <div>
                    <input type="text" name="name" size="35" maxlength="255" value="<?php echo h($form['name']); ?>"/>
                    <?php if (isset($error['name']) && $error['name'] === 'blank'): ?>
                        <p class="error">* ニックネームを入力してください</p>
                    <?php endif; ?>
                </div>

                <li>メールアドレス<span class="required">必須</span></li>
                <div>
                    <input type="text" name="email" size="35" maxlength="255" value="<?php echo h($form['email']); ?>"/>
                    <?php if (isset($error['email']) && $error['email'] === 'blank') : ?>
                        <p class="error">* メールアドレスを入力してください</p>
                    <?php endif; ?>
                    <p class="error">* 指定されたメールアドレスはすでに登録されています</p>
                </div>
                
                <li>パスワード<span class="required">必須</span></li>
                <div>
                    <input type="password" name="password" size="10" maxlength="20" value="<?php echo h($form['password']); ?>"/>
                    <?php if (isset($error['password']) && $error['password'] === 'blank') : ?>
                        <p class="error">* パスワードを入力してください</p>
                    <?php endif; ?>
                    <?php if (isset($error['password']) && $error['password'] === 'length') : ?>
                        <p class="error">* パスワードは4文字以上で入力してください</p>
                    <?php endif; ?>
                </div>

                <li>写真など</li>
                <div>
                    <input type="file" name="image" size="35" value=""/>
                    <?php if (isset($error['image']) && $error['image'] === 'type') : ?>
                        <p class="error">* 写真などは「.png」または「.jpg」の画像を指定してください</p>
                    <?php endif; ?>
                    <p class="error">* 恐れ入りますが、画像を改めて指定してください</p>
                </div>
            </ul>
            <div><input type="submit" value="入力内容を確認する"/></div>
        </form>
    </div>
</body>

</html>