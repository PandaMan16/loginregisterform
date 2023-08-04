<?php //var_dump($_POST);
if(isset($_POST['action'])){
    switch($_POST['action']){
        case 'Créer un compte':
            if(!empty($_POST['nname']) && !empty($_POST['nemail']) && !empty($_POST['npassword']) && !empty($_POST['ncpassword'])){
                require('./class/Register.php');
                $register = new Register($_POST['nname'], $_POST['nemail'], $_POST['npassword'], $_POST['ncpassword']);
                $result = $register->Register();
                if($result === true){
                    $erreur = array('message' => 'Votre compte a bien été créé' , 'title' => 'Succès', 'color' => 'green');
                }else{
                    $erreur = array('message' => $result, 'title' => 'Erreur', 'color' => 'red');
                }
            }else{
                $erreur = array('message' => "Veuillez remplir tous les champs", 'title' => 'Erreur', 'color' => 'red');
            }                        
            break;
        case 'Connexion':
            if(!empty($_POST['email']) &&!empty($_POST['password'])){
                require('./class/Login.php');
                $login = new Login($_POST['email'], $_POST['password']);
                $result = $login->CheckLogin();
                if($result === true){
                    $erreur = array('message' => 'Vous êtes connecté', 'title' => 'Succès', 'color' => 'green');
                }else{
                    $erreur = array('message' => $result, 'title' => 'Erreur', 'color' =>'red');
                }
            }else{
                $erreur = array('message' => "Veuillez remplir tous les champs", 'title' => 'Erreur', 'color' =>'red');
            }
            break;
        default:
            break;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./style.css">
        <title>Connexion</title>
    </head>
    <body>
        <!-- login form -->
        <section class="tooltip"></section>
        <section id="modal" <?php if(isset($erreur)){ echo "style='display:block'"; } ?>>
            <span class="close">X</span>
            <div <?php if(isset($erreur)){ echo "style='--bgcolor:".$erreur['color']."'"; } ?> class="header"><?php if(isset($erreur)){ echo $erreur['title']; } ?></div>
            <div class="content"><?php if(isset($erreur)){ echo $erreur['message']; } ?></div>
        </section>
        <section id="login">
            <form action="#" method="post">
                Connexion
                <div class="inputs">
                    <input type="email" name="email" required>
                    
                    <label for="email">Email</label>
                </div>
                <div class="inputs">
                    <input type="password" name="password" required>
                    
                    <label for="password">Mot de pass</label>
                </div>
                <input type="submit" name="action" value="Connexion">
                <button class="create">Créer un compte</button>
            </form>
            
        </section>
        <section id="register">
            <form action="#" method="post">
                Créé un compte
                <div class="inputs">
                    <input type="email" name="nemail" required>
                    
                    <label for="nemail">Email</label>
                </div>
                <div class="inputs">
                    <input type="text" name="nname" required>
                    <label for="nname">Nom Prenom</label>
                </div>
                <div class="inputs">
                    <input class="npassword" type="password" name="npassword" required>
                    
                    <label for="npassword">Mot de pass</label>
                </div>
                <div class="inputs">
                    <input class="ncpassword" type="password" name="ncpassword" disabled required>
                    
                    <label for="ncpassword">Confirmer mot de pass</label>
                </div>
                <input class="createaccount" type="submit" name="action" value="Créer un compte" disabled>
            </form>
        </section>
        <script src="./main.js" type="module"></script>
    </body>
</html>