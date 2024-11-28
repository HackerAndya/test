<?php
// Get the current directory or use the current working directory
$dir = getcwd();  // Get the current working directory

// List files and directories in the current directory
$files = scandir($dir);

echo "<h1>Directory Listing for $dir</h1>";

echo "<ul>";
foreach ($files as $file) {
    // Skip the . and .. entries
    if ($file == '.' || $file == '..') {
        continue;
    }

    $filePath = $dir . DIRECTORY_SEPARATOR . $file;

    if (is_dir($filePath)) {
        // If it's a directory, create a link to the directory
        echo "<li><a href='?dir=" . urlencode($filePath) . "'>$file</a></li>";
    } else {
        // If it's a file, display it
        echo "<li>$file</li>";
    }
}
echo "</ul>";

echo "<hr>";

// Go back to the parent directory link
if ($dir != '.' && $dir != realpath('/')) {
    $parentDir = dirname($dir);
    echo "<a href='?dir=" . urlencode($parentDir) . "'>Back to parent directory</a>";
}
?>
