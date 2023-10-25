 <?php
$email = $passwd = $succes = $class1= $class2 =$class3="";
$taille = 80;
$padding = 20;
$maj = $min=$chiffre=$special=$len="";
if (isset($_POST["confirmer"])) {
    $email = htmlspecialchars($_POST["email"]);
    $passwd = htmlspecialchars($_POST["passwd"]);

    // Vérifions si les tous champs sont remplis

    if (! empty($email) && ! empty($passwd) && ! empty(htmlspecialchars($_POST["confirmer"])) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Tous les champs sont remplis et l'email est valide
        if (! filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $class1= "red";
        }
        if (! preg_match('/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!.@$%^&*-]).{8,}$/', $passwd)) {
            $class2= $class3="red";
            
            
            if(!preg_match("/[A-Z]/",$passwd)){
                //Le mot de passe ne contient pas de caractère(s) majucules
                $maj = "red";
            }
            if(!preg_match("/[a-z]/",$passwd)){
                //Le mot de passe ne contient pas de caractère(s) minuscules
                $min = "red";
            }
            if(!preg_match("/[0-9]/",$passwd)){
                //Le mot de passe ne contient pas de caractère(s) chiffres
                $chiffre = "red";
            }
            if(!preg_match("/[#?!.@$%^&*-]/",$passwd)){
                //Le mot de passe ne contient pas de caractère(s) spécial(s)
                $special = "red";
            }
            if(strlen($passwd)<8){
                //Le mot de passe ne contient pas de caractère(s) majucules
                $len = "red";
            }
            
            
        }
        if (filter_var($email, FILTER_VALIDATE_EMAIL) && preg_match('/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!.@$%^&*-]).{8,}$/', $passwd)) {
            if ($passwd == htmlspecialchars($_POST["confirmer"])) {
                $succes = "Vous êtes inscrits avec succés.Vous pouvez à présent vous connecter";
                require_once 'pdo.php';
                try {
                    // Vérifions si l'adresse mail entré est déjà dans la base de données

                    $verification = $pdo->prepare("SELECT * FROM users WHERE mail =:email");
                    $verification->bindParam(":email", $email);
                    $verification->execute();
                    $bool = $verification->fetch(PDO::FETCH_ASSOC);
                    if (is_bool($bool)) {
                        // Cela veut dire que l'email entré n'était pas préalablement enrégistré
                        $result = $pdo->prepare("INSERT INTO users (mail,passwd) VALUES (:email, :passwd)");
                        $result->bindParam(":email", $email);
                        $result->bindParam(":passwd", password_hash($passwd, PASSWORD_DEFAULT, [
                            "cost" => 12
                        ]));
                        $result->execute();
                        $result->closeCursor();
                    } else {
                        die("Votre adresse mail est déjà enrégistré sur notre plateforme");
                    }
                    $verification->closeCursor();
                } catch (Exception $e) {
                    echo 'ERREUR' . $e->getMessage();
                }
                header("location:indexConnexion.php");
            } else {
                $class3 = "red";
            }
        }
    } else {
        // Tous les champs ne sont pas remplis
        
        if(empty($email)){
            $class1="red";
        }
        if(empty($passwd)){
            $class2="red";
        }
        if(empty(htmlspecialchars($_POST["confirmer"]))){
            $class3="red";
        }
    }

    // Vérifions la validité de l'adresse email
}
?>
 <?php
$title = "Inscription";
require ("header.php");
?>
<div>

	<form action="" method="post">
		<fieldset>
			<legend><?php echo $title?></legend>
			<label for="email">Entrez votre mail</label> <input type="email"
				id="email" name="email" value="<?= !empty($class1)?$email:""?>"
				placeholder="Entrez votre adresse mail ici" autofocus="autofocus"
				autocomplete="off" class="<?php echo $class1?>" > <label for="passwd">Entrez votre mot de passe</label>
			<input type="password" id="passwd" name="passwd" value="<?= !empty($class2)?$passwd:""?>"
				placeholder="Entrez votre mot de passe ici" class="<?php echo $class2?>"> <label for="confirmer">Confirmer
				votre mot de passe</label> <input type="password" id="confirmer"
				name="confirmer" placeholder="Confirmer le mot de passe ici"
				value="<?= !empty($class3)?$_POST["confirmer"]:""?>" class="<?php echo $class3?>">
			<button type="submit">Valider</button>
			Le mot de passe doit :
			<ul>
				<li class="<?= $maj?>">Doit contenir au moins une lettre majuscule</li>
				<li class="<?= $min?>">Doit contenir au moins une lettre minuscule</li>
				<li class="<?= $chiffre?>">Doit contenir au moins un chiffre</li>
				<li class="<?= $special?>">Doit contenir au moins un caractère spécial</li>
				<li class="<?= $len?>">Doit avoir une longueur minimale de 8 caractères</li>
			</ul>
			<a href="indexConnexion.php">Se connecter</a>
		</fieldset>
	</form>
</div>
</body>
</html>