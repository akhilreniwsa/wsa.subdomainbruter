<html>
<head>
<title>
WeSecureApp Subdomain Scanner V 0 .1 Beta
</title>
</head>
<body>
    <h1> This is an early version of subdomain brute forcer made in PHP</h1> <br/>
    <h3>V 0.1 Beta<br/></h3>
    <h2>Features</h2><br/>
    <li>Multi threading- for fast results</li>
    <li>Input your own subdomain posibilities</li>
    <li>Get a txt output file</li>
    <form action="scan.php" method="POST">
<br/>Enter your Target Id in the form of <b>target.com</b> <br/>   <br/>
        <input name="target" placeholder="example.com" value="">
    </form>
<?php
//
@set_time_limit(0);
$valid = file_get_contents('valid.txt');
echo "Here you will see All the valid domains:<br/><br/>" .$valid;
?>
</body>
</html>
