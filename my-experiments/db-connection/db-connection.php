<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>

<?php
defined('DB_SERVER') ? null : define("DB_SERVER", "localhost");
defined('DB_USER')   ? null : define("DB_USER", "tanginamo");
defined('DB_PASS')   ? null : define("DB_PASS", "gagoangputa");
defined('DB_NAME')   ? null : define("DB_NAME", "putangina");

//$dbServer = "localhost";
//$dbUser = "tanginamo";
//$dbPass = "gagoangputa";
//$dbName = "putangina";

//$con = mysqli_connect($dbServer, $dbUser, $dbPass, $dbName);
$con = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
if (mysqli_connect_errno()) {
    die("Database connection failed: " .
        mysqli_connect_error() .
        " (" . mysqli_connect_errno() . ")"
    );
}
else {
    echo "connection ok";
}

mysqli_close(con);
?>

</body>
</html>