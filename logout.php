<?php
session_start();
unset($_SESSION["uid"]);
unset($_SESSION["acc"]);
header("Location: index.php");