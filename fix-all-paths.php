<?php
// fix-all-paths.php
// Run this script once to fix all remaining hardcoded paths

function replaceInFile($file, $search, $replace) {
    $content = file_get_contents($file);
    $newContent = str_replace($search, $replace, $content);
    file_put_contents($file, $newContent);
    echo "Fixed: $file\n";
}

// Fix all PHP files
$phpFiles = glob('**/*.php', GLOB_BRACE);
foreach ($phpFiles as $file) {
    replaceInFile($file, '/Barangay-System/', '');
    replaceInFile($file, '"Barangay-System/', '"');
    replaceInFile($file, "'Barangay-System/", "'");
}

// Fix all JS files
$jsFiles = glob('**/*.js', GLOB_BRACE);
foreach ($jsFiles as $file) {
    replaceInFile($file, '/Barangay-System/', '');
    replaceInFile($file, '"Barangay-System/', '"');
    replaceInFile($file, "'Barangay-System/", "'");
}

echo "All paths fixed!\n";
?>