<?php
session_start();
session_unset();
session_destroy();
echo "<script>window.open('../homepage.php','_self')</script>"
?>