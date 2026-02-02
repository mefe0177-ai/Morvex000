<?php
session_start([
  'cookie_httponly'=>true,
  'use_strict_mode'=>true,
  'cookie_samesite'=>'Strict'
]);

function csrf_token(){
  if(empty($_SESSION['csrf'])) $_SESSION['csrf']=bin2hex(random_bytes(32));
  return $_SESSION['csrf'];
}
function csrf_check($t){ return isset($_SESSION['csrf']) && hash_equals($_SESSION['csrf'],$t); }
function e($v){ return htmlspecialchars(trim($v),ENT_QUOTES,'UTF-8'); }