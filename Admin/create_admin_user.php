<?php
$bdd = new PDO('mysql:host=localhost;dbname=blog;charset=utf8',
        'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
$req = $bdd->prepare('SELECT user, pass FROM user'); // on fait une requete preparer
$req->execute();
$user = $req->fetch();

if (empty($user)) {
	$user = 'admin';
	$pass = 'test123';
	$sHashedPwd = password_hash($pass , PASSWORD_BCRYPT, array('cost' => 14));
	$req = $bdd->prepare('INSERT INTO user(user, pass) VALUES( ?, ?)');
	$req->execute(array($user, $sHashedPwd));
	echo "Ajout du compte admin !";
}
?>
