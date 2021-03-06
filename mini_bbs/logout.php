<?php
session_start();

$_SESSION = array();

//セッションのオプション内容
if (ini_get('session.use_cookies')) {
  $params = session_get_cookie_params();
  setcookie(
    session_name() . '',
    time() - 42000,
    $params['path'],
    $params['domain'],
    $params['secure'],
    $params['httponly']
  );
}

session_destroy();

setcookie('email', '', time() - 3600);

//強制的にログイン画面へ戻る
header('Location: login.php');
exit();
