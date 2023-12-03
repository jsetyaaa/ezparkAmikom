<?php
// Mulai session
session_start();

// Hancurkan session
session_destroy();

// Redirect ke halaman login
header('Location: ../page/index.php');
exit();
