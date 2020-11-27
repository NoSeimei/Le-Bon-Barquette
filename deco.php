<?php

include("connexion.php");
session_destroy();

header("Location: index.php");

?>