<? 
session_start();

unset($_SESSION['autorize']);
header("Location: index.php");

// echo "<pre>";
// echo print_r($_SESSION);
// echo "</pre>";