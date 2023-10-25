<?php
$title = "Connexion";
$email = $erreur = " ";
$taille = 40;
$padding = 150;
require_once 'header.php';
require_once 'pdo.php';
if (isset($_POST['valider'])) {
    $email = htmlspecialchars($_POST['email']);
    $passwd = htmlspecialchars($_POST["passwd"]);
    try {
        $result = $pdo->prepare("SELECT * FROM users WHERE mail=:email");
        $result->bindParam(":email", $email);
        $result->execute();

        $tab = $result->fetch(PDO::FETCH_ASSOC);

        $verification = is_array($tab);
        if ($verification) {
            $usrPass = $tab["passwd"];
            // echo "userpass = $usrPass et passwd = $passwd <br>";
            if (!password_verify($passwd,$usrPass )) {
                echo "<br>Les informations fournies ne sont pas correctes";
            } else {
                header("location:index.php");
                echo "Correct";
            }
        } else {
            // header("location:indexInscription.php");
            echo "Adresse non reconnue";
        }

        $result->closeCursor();
    } catch (Exception $e) {
        echo 'ERREUR' . $e->getMessage();
    }
}
// header("location:index1.php");
?>
<div>
	<form action="" method="post">
		<fieldset>
			<legend><?php echo $title?></legend>
					<label for="email">Votre mail</label> <input type="email"
						id="email" name="email" value=""
						placeholder="Entrez votre adresse mail ici" autocomplete="none">
					<label for="passwd">Entrez votre mot de passe</label> <input
						type="password" id="passwd" name="passwd" value=""
						placeholder="Entrez votre mot de passe ici">
					<button type="submit" name="valider">Valider</button>
			</div>
		</fieldset>
	</form>
</div>
</body>
</html>