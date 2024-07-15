<?php
session_start();

$form = $_SESSION['form']
?>

<!DOCTYPE html>
<html lang="ja">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>会員登録</title>

	<link rel="stylesheet" href="../style.css" />
</head>

<body>
	<div id="wrap">
		<div id="head">
			<h1>会員登録</h1>
		</div>

		<div id="content">
			<p>記入した内容を確認して、「登録する」ボタンをクリックしてください</p>
			<form action="" method="post">
				<ul>
					<li>ニックネーム</li>
						<p>○○</p>
					<li>メールアドレス</li>
						<p>info@example.com</p>
					<li>パスワード</li>
						<p>
							【表示されません】
						</p>
					<li>写真など</li>
						<p>
								<img src="../member_picture/" width="100" alt="" />
						</p>
				</ul>
				<div><a href="index.php?action=rewrite">&laquo;&nbsp;書き直す</a> | <input type="submit" value="登録する" /></div>
			</form>
		</div>

	</div>
</body>

</html>