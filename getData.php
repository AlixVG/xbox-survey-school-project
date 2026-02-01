<?php
$csvFile = 'reponses.csv';

$ageGroups = [];
$ageCounts = [];
$sexGroups = [];
$sexCounts = [];
$utilGroups = [];
$utilCounts = [];
$notes = [];
$noteCounts = [];
$favGroups = [];
$favCounts = [];


if (file_exists($csvFile)) {
    if (($handle = fopen($csvFile, 'r')) !== false) {
        $header = fgetcsv($handle);

        while (($row = fgetcsv($handle)) !== false) {
            $age = $row[2];
            $sex = $row[3];
            $util = $row[4];
            $note = trim($row[6]);
            $fav = $row[7];

            if (!isset($ageCounts[$age])) {
                $ageCounts[$age] = 0;
            }
            $ageCounts[$age]++;

            if (!isset($utilCounts[$util])) {
                $utilCounts[$util] = 0;
            }
            $utilCounts[$util]++;

            if (!isset($sexCounts[$sex])) {
                $sexCounts[$sex] = 0;
            }
            $sexCounts[$sex]++;

            if (!isset($favCounts[$fav])) {
                $favCounts[$fav] = 0;
            }
            $favCounts[$fav]++;


            if (is_numeric($note)) {
                $note = (int)$note;
                if ($note >= 1 && $note <= 5) {
                    if (!isset($noteCounts[$note])) {
                        $noteCounts[$note] = 0;
                    }
                    $noteCounts[$note]++;
                }
            }
        }
        fclose($handle);
    }
}

$ageGroups = array_keys($ageCounts);
$ageCounts = array_values($ageCounts);

$sexGroups = array_keys($sexCounts);
$sexCounts = array_values($sexCounts);

$utilGroups = array_keys($utilCounts);
$utilCounts = array_values($utilCounts);

$favGroups = array_keys($favCounts);
$favCounts = array_values($favCounts);

$notes = array_keys($noteCounts);
$noteCounts = array_values($noteCounts);


header('Content-Type: application/json');
echo json_encode([
    'ageGroups' => $ageGroups,
    'ageCounts' => $ageCounts,
    'sexGroups' => $sexGroups,
    'sexCounts' => $sexCounts,
    'utilGroups' => $utilGroups,
    'utilCounts' => $utilCounts,
    'favGroups' => $favGroups,
    'favCounts' => $favCounts,
    'notes' => $notes,
    'noteCounts' => $noteCounts,
]);
?>