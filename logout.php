<?php
  session_start();
  session_destroy();
  header($_SERVER['HTTP_REFERER']);
?>