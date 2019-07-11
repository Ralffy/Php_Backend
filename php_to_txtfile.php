$path = 'Name.txt';
$file = file_get_contents($path, FILE_USE_INCLUDE_PATH);
unlink($path) or die("Invalid");
