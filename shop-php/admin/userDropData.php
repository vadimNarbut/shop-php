<? 

require_once "../includes/config.php";

mysqli_query($connection, "DELETE FROM users WHERE user_id = " . $_GET['id']);

header("Location: admin.php");