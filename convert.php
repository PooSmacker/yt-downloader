<?php
$youtubeLink = $_GET['youtube_link'];

if (filter_var($youtubeLink, FILTER_VALIDATE_URL)) {
    $downloadPath = '/var/www/html/yt-downloader/downloads/';

    $command = "python3 download.py \"$youtubeLink\" \"$downloadPath\" 2>&1";

    exec($command, $output, $status);

    if ($status === 0) {
        $files = scandir($downloadPath);

        $mp4File = '';
        foreach ($files as $file) {
            if (pathinfo($file, PATHINFO_EXTENSION) === 'mp4') {
                $mp4File = $file;
                break;
            }
        }

        if (!empty($mp4File)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="' . $mp4File . '"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($downloadPath . $mp4File));

            flush();

            readfile($downloadPath . $mp4File);

            unlink($downloadPath . $mp4File);

            exit;
        } else {
            echo "No MP4 file found in the downloads directory.";
        }
    } else {
        echo "Download failed: ";
        foreach ($output as $line) {
            echo htmlspecialchars($line) . "<br>";
        }
    }
} else {
    echo "Invalid YouTube link.";
}
?>
