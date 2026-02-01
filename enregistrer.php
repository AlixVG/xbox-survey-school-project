<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve data from POST request
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $age = htmlspecialchars($_POST['age']);
    $sex = htmlspecialchars($_POST['sexe']);
    $temps = htmlspecialchars($_POST['temps']);
    $avis = htmlspecialchars($_POST['avis']);
    $note = isset($_POST['note']) ? (int)$_POST['note'] : null;
    $fav = htmlspecialchars($_POST['fav']);

    $fichier_csv = 'reponses.csv';
    $nouveau_fichier = !file_exists($fichier_csv);

    $fichier = fopen($fichier_csv, 'a');
    if ($fichier) {
        if ($nouveau_fichier) {
            fputcsv($fichier, ['Nom', 'Prénom', 'Groupe d\'âge', 'Sexe', 'Temps', 'Avis', 'Note']);
        }

        fputcsv($fichier, [$nom, $prenom, $age, $sex, $temps, $avis, $note, $fav]);
        fclose($fichier);
        echo "Vos réponses ont été enregistrées avec succès !";
    } else {
        echo "Erreur : Impossible d'écrire dans le fichier CSV.";
    }
} else {
    echo "Erreur : Le formulaire n'a pas été soumis correctement.";
}

	header("Location: stats.html");
    exit;

?>
