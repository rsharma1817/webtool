<?php
$inputDir = "node_modules/carbon-icons/dist/svg/";
$outputDir = "icons/carbon/";
$files = scandir($inputDir);
foreach($files as $file) {
    if (is_file($inputDir . $file)) {
        $xml = file_get_contents($inputDir . $file);
        $new = str_replace("<svg", "<svg xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\"", $xml);
        file_put_contents($outputDir . $file, $new);
    }
}
