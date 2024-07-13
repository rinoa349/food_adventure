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
                    <input type="text" name="name" size="35" maxlength="255" value=""/>
                    <p class="error">* ニックネームを入力してください</p>
                </div>
                <li>メールアドレス<span class="required">必須</span></li>
                <div>
                    <input type="text" name="email" size="35" maxlength="255" value=""/>
                    <p class="error">* メールアドレスを入力してください</p>
                    <p class="error">* 指定されたメールアドレスはすでに登録されています</p>
                </div>
                <li>パスワード<span class="required">必須</span></li>
                <div>
                    <input type="password" name="password" size="10" maxlength="20" value=""/>
                    <p class="error">* パスワードを入力してください</p>
                    <p class="error">* パスワードは4文字以上で入力してください</p>
                </div>
                <li>写真など</li>
                <div>
                    <input type="file" name="image" size="35" value=""/>
                    <p class="error">* 写真などは「.png」または「.jpg」の画像を指定してください</p>
                    <p class="error">* 恐れ入りますが、画像を改めて指定してください</p>
                </div>
            </ul>
            <div><input type="submit" value="入力内容を確認する"/></div>
        </form>
    </div>
</body>

</html>