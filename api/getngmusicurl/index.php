<?php
$songID = $_GET['songID'] ?? '';
if (!$songID) die('Undefined songID');

$data = http_build_query([
    'secret' => 'Wmfd2893gb7',
    'songID' => $songID
]);

$opts = [
    'http' => [
        'method' => 'POST',
        'header' => 'Content-Type: application/x-www-form-urlencoded',
        'content' => $data
    ]
];

$context = stream_context_create($opts);
$response = file_get_contents('https://www.boomlings.com/database/getGJSongInfo.php', false, $context);

if ($response == '-1') die('Song not found');

preg_match('/10~\|~(.*?)(?=~\|~|$)/', $response, $matches);
if (isset($matches[1])) {
    header('Location: ' . $matches[1]);
} else {
    die('URL not found');
}
?>