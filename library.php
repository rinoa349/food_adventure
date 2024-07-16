<?php
// htmlspecialcharsの簡略化
function h($value) {
  return htmlspecialchars($value, ENT_QUOTES);
}

?>