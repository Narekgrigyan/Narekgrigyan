<?php
session_start();
include_once "../Model/DbConnection.php";

echo "Welcome" . $_SESSION['email'];