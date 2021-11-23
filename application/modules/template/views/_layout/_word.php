<?php 

$date = date('Ymd', now('Asia/Jakarta'));

header("Content-type: application/vnd.ms-word");
header("Content-Disposition: attachment;Filename= $date-$name.doc");
header("Expires: 0");

?>

<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>

<?= @$_content; ?>

</body>
</html>