<html>
<head>
<title>
WeSecureApp Subdomain Scanner V 0 .2
</title>
        <script src="http://code.jquery.com/jquery-1.9.1.js">
    </script>
    <link rel='stylesheet prefetch' href='//codepen.io/assets/reset/normalize.css'>
    <link rel='stylesheet' href='style.css'>
</head>
<body>
<center>    <h1> WSA SUBDOMAINBRUTER V0.2</h1> <br/></center>
    <h3><br/></h3>
    <h2>Features</h2><br/>
    <li>Multi threading- for fast results</li>
    <li>Input your own subdomain posibilities</li>
    <li>Get a txt output file</li>
    <form id="send" action="scan.php" method="GET">
<br/>Enter your Target Id in the form of <b>target.com</b> <br/>   <br/>
        
        <input name="target" placeholder="example.com" value="">
    </form>
   <div id="debug"> <input type="checkbox" id="checkbox" name="debug" value="Debug"> Enable/Disable for Debug Info<br></div>
    <div id="console">
  

<center>
  <pre>Debug Info:<br/>
Requests per minute/current domain check:
  </pre></center>

</div>
    <br/>
    <div id="message"></div><br/>
  <b> Valid Domains:<br/></b><ul><div id="response"></div> <br/></ul>
    
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
                
                $("#response").html('<li>'+data);
            }
        });
    

          
          }, 1000);
          $('#checkbox').change(function()
                                { setInterval(function()
                      {
  if($("#checkbox").prop('checked') == true)
  {
        $.ajax({
            url: "debug.txt",
            async: false,
            success: function (data){
                
                $("#console").html('<center><pre>Debug Info:<br/><br/>Requests per minute/current domain check:<br/><br/>'+data+'</center></pre>');
            }
        });
    

  }
            if($("#checkbox").prop('checked') == false)
            {
                $("#console").html('<center><pre>debug off</center></pre>');
            }
                                    
                                        
          }, 1000);
                                });
                                                        
        </script>
</body>
</html>
