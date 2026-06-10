<?php
require_once 'config.php';

// Groupes d'âge
$stmt = $pdo->query("SELECT age, COUNT(*) as total FROM reponses GROUP BY age ORDER BY age");
$ageRows = $stmt->fetchAll();
$ageGroups = array_column($ageRows, 'age');
$ageCounts = array_map('intval', array_column($ageRows, 'total'));

// Sexe
$stmt = $pdo->query("SELECT sexe, COUNT(*) as total FROM reponses GROUP BY sexe ORDER BY sexe");
$sexRows = $stmt->fetchAll();
$sexGroups = array_column($sexRows, 'sexe');
$sexCounts = array_map('intval', array_column($sexRows, 'total'));

// Temps d'utilisation
$stmt = $pdo->query("SELECT temps, COUNT(*) as total FROM reponses GROUP BY temps ORDER BY temps");
$utilRows = $stmt->fetchAll();
$utilGroups = array_column($utilRows, 'temps');
$utilCounts = array_map('intval', array_column($utilRows, 'total'));

// Notes
$stmt = $pdo->query("SELECT note, COUNT(*) as total FROM reponses WHERE note BETWEEN 1 AND 5 GROUP BY note ORDER BY note");
$noteRows = $stmt->fetchAll();
$notes = array_map('intval', array_column($noteRows, 'note'));
$noteCounts = array_map('intval', array_column($noteRows, 'total'));

// Jeux favoris
$stmt = $pdo->query("SELECT fav, COUNT(*) as total FROM reponses GROUP BY fav ORDER BY total DESC");
$favRows = $stmt->fetchAll();
$favGroups = array_column($favRows, 'fav');
$favCounts = array_map('intval', array_column($favRows, 'total'));

header('Content-Type: application/json');
echo json_encode([
    'ageGroups'  => $ageGroups,
    'ageCounts'  => $ageCounts,
    'sexGroups'  => $sexGroups,
    'sexCounts'  => $sexCounts,
    'utilGroups' => $utilGroups,
    'utilCounts' => $utilCounts,
    'favGroups'  => $favGroups,
    'favCounts'  => $favCounts,
    'notes'      => $notes,
    'noteCounts' => $noteCounts,
]);
?>
