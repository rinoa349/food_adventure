<?php
// htmlspecialcharsの簡略化
function h($value) {
  return htmlspecialchars($value, ENT_QUOTES);
}

// DBへの接続の簡略化
function dbconnect() {
  $db = new mysqli('localhost', 'root', 'root', 'post_food');
  if (!$db) {
		die($db->error);
	}
}
?>