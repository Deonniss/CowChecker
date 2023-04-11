<?php
setcookie('user_cookie', $user['id'], time() - $ttl_cookie, "/");
header('Location: /');
?>
