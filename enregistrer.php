<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom    = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $age    = htmlspecialchars($_POST['age']);
    $sexe   = htmlspecialchars($_POST['sexe']);
    $temps  = htmlspecialchars($_POST['temps']);
    $avis   = htmlspecialchars($_POST['avis']);
    $note   = isset($_POST['note']) ? (int)$_POST['note'] : null;
    $fav    = htmlspecialchars($_POST['fav']);

    try {
        $sql = "INSERT INTO reponses (nom, prenom, age, sexe, temps, avis, note, fav)
                VALUES (:nom, :prenom, :age, :sexe, :temps, :avis, :note, :fav)";

        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':nom'    => $nom,
            ':prenom' => $prenom,
            ':age'    => $age,
            ':sexe'   => $sexe,
            ':temps'  => $temps,
            ':avis'   => $avis,
            ':note'   => $note,
            ':fav'    => $fav,
        ]);

        header("Location: stats.html");
        exit;

    } catch (PDOException $e) {
        echo "Erreur lors de l'enregistrement : " . $e->getMessage();
    }
} else {
    echo "Erreur : Le formulaire n'a pas été soumis correctement.";
}
?>
