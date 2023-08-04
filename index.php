<?php 
session_start();
if(!isset($_SESSION['name'])){
    header('location:./login.php');
}else{?>
    <!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>index</title>
    </head>
    <body>
        <style>body{
            background-color: black;
            color: white;
            padding: 0;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            height: 100vh;   
        }</style>
        <h1>Bienvenue <?php echo $_SESSION['name']; ?> vous etes bien connecté</h1>
    </body>
    </html>
<?php } ?>