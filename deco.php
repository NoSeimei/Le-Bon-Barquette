<?php

include("connexion.php");
session_destroy();

header('location: index.php')
?>