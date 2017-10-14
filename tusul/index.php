<!DOCTYPE html>
<html>
<head>
<title>SB Admin 2</title>
<?php
session_start();
if (isset($_SESSION['userSession'])=="") {
	header("Location: pages/login.php");
	exit;
}
else{
	header("Location: pages/index.php");
	exit;

}


?>
<!-- <script language="javascript">
    window.location.href = "pages/index.html"
</script> -->
</head>
<body>

</body>
</html>
