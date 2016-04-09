<?php

$uploadDir = '/home/tessera/upload/';
$converter = '/home/tessera/generate.sh';

$id = uniqid('video_');

$uploadFile = $uploadDir . $id . basename($_FILES['file']['tmp_name']);

var_dump($_FILES);

if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadFile))
{
	echo 'Uploaded file! Saved as ' . $uploadFile . '<br>';
}
else
{
	echo "Failed file upload!";
	exit;
}

echo "Video uploaded!";

$commands;

echo exec($converter . ' ' . $uploadFile. ' ' . $id . ' ' . $_POST['category'] . ' ' . $_POST['compression'] . ' > /dev/null 2>&1 &', $commands);

echo "Generation started...";

setcookie('unique_id', $id);

var_dump($commands);