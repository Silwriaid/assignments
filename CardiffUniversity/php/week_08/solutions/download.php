<?php 
/** 
 *  @author Chris Maggs <MaggsC1@cardiff.ac.uk> 
 *  @use    Generic file download script 
 *  @date   Jan 2014 
 * 
 */ 
  
// Build the full server-path 
$filePath = $_SERVER['DOCUMENT_ROOT'].'/learn/phpcourse/uploads/'.$_GET['file']; 

// Ensure that the file exists 
if (is_file($filePath)){ 

    // Get the file size (requires full server-path) 
    $fileSize = filesize($filePath); 

    // Get the file details (required full server-path) 
    $pathInfo = pathinfo($filePath); 
    //[dirname]   = string(24) "/learn/phpcourse/uploads" 
    //[basename]  = string(10) "mascot.png" 
    //[extension] = string(3)  "png" 
    //[filename]  = string(6)  "mascot" 

    $fileExtension = strtolower($pathInfo["extension"]); 

    // Set headers to control how the page is perceived by the browser 
    switch ($fileExtension){ 

        case 'pdf': 
            // prevent allowing the browser to decide what to do with PDF files...   ...force the download like an attachment 
            header("Content-type: application/pdf"); 
            header("Content-Disposition: attachment; filename=\"".$pathInfo["basename"]."\""); // use escaped quotes to allow single quotes in the filename 
            break; 

        // Add additional specific cases here if headers are required to be different 

        default; 
            header("Content-type: application/octet-stream"); 
            header("Content-Disposition: filename=\"".$pathInfo["basename"]."\""); // use escaped quotes to allow single quotes in the filename 

    } 

    header("Content-length: ".$fileSize);           // prevent 'more' data being tagged on the end 
    header("Cache-control: private");               // mark the webpage/document as intended for a single user (no-cache) 
    header("Content-Transfer-Encoding: binary");    // set default encoding (not encrypted, or another format 
    header("Pragma: no-cache");                     // prevent server caching 

    set_time_limit(0);                              // prevent 'waiting' for the file 

    // Output file 
    echo file_get_contents($filePath);              // or: readfile($filePath); 

    exit; 

} else { 

    die('File not found'); 

} 
