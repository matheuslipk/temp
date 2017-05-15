<?php
session_start();
unset($_SESSION['idUsuario']);
unset($_SESSION['nickUsuario']);
unset($_SESSION['tempoUsuario']);
session_destroy();
header("Location: /index.php?logout=true");