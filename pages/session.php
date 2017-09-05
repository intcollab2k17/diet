<?php 
session_start();
include('dbcon.php');
if (!isset($_SESSION['id']) || (trim($_SESSION['id']) == '')) { ?>
?>
<script>
window.location = "../index.html";
</script>
<?php }
date_default_timezone_set("Asia/Manila");
?>