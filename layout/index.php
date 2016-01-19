<!DOCTYPE html>
<html>
    <head>
        <title>Lee's Kitchen</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../page/style.css">
    </head>
    <body>
      
        <header>
                                  
            <div id ="logo">
                <a href ="index.php" >
                <img src="../page/image/logo1.png" alt = "logo"></a>
                
                 <a href="index.php?page=menu" class= "button"><h1>Order Online</h1></a>
               
                </div>

                    </div>
            <div class = "clearboth"></div>
            
            

        <div id = "navigator"> 
            <ul>
            <li><a href="index.php">Home</a></li>
            
            
          <?php if(isset($_SESSION['role'])&& $_SESSION['role']=='admin'):?>
            <li><a href="index.php?page=list&status=pending">Admin</a></li>
            <?php endif;?>
<!--     if its login in, logout will show up eventually       -->
                <?php if(isset($_SESSION['user_id'])):?>
<li><a href="index.php?page=login&cmd=logout">Logout</a></li>
<?php else:?>
<li><a href="index.php?page=login&cmd=login">Login</a></li>

<?php endif;?>
            </ul>
<!--            <li><a href="index.php?page=signup">Sign up</a></li>-->
      

    </header>
        <?php require $template ?>
        <footer>All rights reserved</footer>
    </body>
</html>