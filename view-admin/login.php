<?php 
    if(isset($_POST['login']))
{
    require '../db/db_connection.php';
}
?>

<html>
<head>
    <title>Login - Pack2Paradise</title>

    <link rel="stylesheet" href="../css/alogin.css">
    <link rel="stylesheet" href="../css/aheader.css">
  
</head>
<body>
<?php include "header.php"?>
    <section class="header" >
       
            <div class="background">
                <div class="screen">
                <div class="screen-body">
                    <div class="formmain left">
                        <div class="app-title">
                            <span>HEY!</span><br/>
                            <span>LOG IN</span>
                        </div>
                    </div>
                    
                    <div class="formmain">
                    <form action="../api/loginapi.php" method="POST">
                    <div>
                        <div class="app-form-group">
                            <input class="app-form-control" placeholder="USER NAME" name="username">
                        </div>
                        <div class="app-form-group">
                            <input class="app-form-control" type="password" placeholder="PASSWORD" name="password">
                        </div> <br>
                      
                        </div>
                        
                        <div class="form buttons">
                            <button class="button" type="submit" name="login">LOGIN</button>
                            <button class="button" type="reset" name="reset">RESET</button>
                        </div>
                    </div>
                    
                </div>
                </div>
            </div>
    </section>
</body>
</html>