<html>
<head>
<title>
WeSecureApp Subdomain Scanner V 0 .1 Beta
</title>
        <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
</head>
<body>
    <h1> This is an early version of subdomain brute forcer made in PHP</h1> <br/>
    <h3>V 0.1 Beta<br/></h3>
    <h2>Features</h2><br/>
    <li>Multi threading- for fast results</li>
    <li>Input your own subdomain posibilities</li>
    <li>Get a txt output file</li>
    <form id="send" action="scan.php" method="GET">
<br/>Enter your Target Id in the form of <b>target.com</b> <br/>   <br/>
        <input name="target" placeholder="example.com" value="">
    </form>
    <div id="message"></div><br/>
    Valid Domains:<br/><div id="response"></div><br/>
<?php
//
@set_time_limit(0);

?>
      <script>
            $(function() {
                $("#send").on("submit", function(e) {
                    e.preventDefault();
                    $.ajax({
                        url: $(this).attr("action"),
                        type: 'GET',
                        data: $(this).serialize(),
                        beforeSend: function() {
                            $("#message").html("Request is proccessing...");
                        },
                       
                       
                    });
                });
            });
          
          
          
          setInterval(function()
                      {
  
        $.ajax({
            url: "valid.txt",
            async: false,
            success: function (data){
                
                $("#response").html(data);
            }
        });
    

          
          }, 1000);
        </script>
</body>
</html>
