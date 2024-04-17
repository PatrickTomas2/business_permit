<?php
// Ensure that the file parameter is set in the URL
if (isset($_GET['file'])) {
    // Get the file name or file path from the URL
    $file = $_GET['file'];
    
    // Check if the file exists
    if (file_exists($file)) {
        // Set appropriate headers for file download
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . basename($file) . '"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($file));
        readfile($file);
        exit;
    } else {
        // File not found
        echo 'File not found.';
    }
} else {
    // File parameter is not set
    echo 'Invalid request.';
}
?>
