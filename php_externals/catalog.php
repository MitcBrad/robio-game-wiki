<?php

$sql = "SELECT * FROM users";
$query = $conn->query($sql);
//Handle selection errors
if (!$query) {
$errno = $conn->errno;
$errmsg = $conn->error;
echo "Selection failed with: ($errno) $errmsg<br/>\n";
$conn->close();
require_once ('includes/footer.php');
exit;
}
//display results in a table
?>
