<?php
/**
 * Code-Along 06: JSON lesen (Extract)
 *
 * Wir öffnen eine heruntergeladene JSON-Datei (Höchsttemperaturen Bern seit
 * 1940), verwandeln sie in ein PHP-Array und schauen uns die Struktur an.
 * Kein HTML: PHP prüft hier nur Daten und gibt reinen Text aus.
 */

$url= 'https://archive-api.open-meteo.com/v1/archive?latitude=46.948&longitude=7.447&start_date=1940-01-01&end_date=2026-08-01&daily=temperature_2m_max&timezone=Europe/Zurich';
$data = fetchJson($url);
print_r($data);

$wert = $data ["wert"];
$einheit= $data ["einheit"];

print_r($wert);
print_r($einheit);

header('Content-type: text/plain; charset=utf-8' );

$json = file_get_contents(filename:"date/zurich.json");
$daten = json_decode($json, true);
print_r($daten ["timezone"]);

$zeit = $daten ["daily"] ["time"];
$maxtemp = $daten ["daily"] ["temperature_2m_max"];

for($i = 0; $i < 4; $i++){
    print_r(value: $zeit[$i] . " " . $maxtemp[$i]) . "\n";
}


