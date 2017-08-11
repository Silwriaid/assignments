<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include 'dumpr.php';

$root = $_SERVER['DOCUMENT_ROOT'];
$relative = '/webstudent/sem4ajh/php/uploads';
$dir = $root . $relative;

//dumpr($dir);

if (! is_dir($dir)) {
    
    //mkdir($dir, 0777);   
    die ("'$dir' is not a directory");
}

if (! is_writable($dir)) {
    
    //chmod($dir, 0777);
    die ("'$dir' is not writable");
}

//-------------------------------------------------------


if(isset($_POST['submit']) && $_POST['submit'] == 'Generate') {
    
    //  Do some validation here ...
                
    $str = $_POST['fileName'];
    
    
    $str = strip_tags($str);                          // remove HTML tags
    $str = trim($str);                                //remove whitespace
    $str = strtolower($str);                          //make lowercase
    $str = str_replace(' ', '', $str);                //remove spaces
    $str = str_replace('.', '', $str);                //remove spaces

    $str = preg_replace('/[^A-Za-z0-9]/','',$str); // remove non alpha-numeric
    
    $filename = $str.'.txt';
    $filepath = $dir . '/' . $filename;
           
    // old way -----------------------------
    //$handle = fopen($filepath, 'w');    
    //fwrite($handle, $_POST['fileContent'] );
    //fclose($handle);
            
    // new way -----------------------------
    file_put_contents($filepath, $_POST['fileContent']);
    
    header("Location:" . $_SERVER['PHP_SELF']);  // Will not work if previous output e.g. dumpr
    exit;    
}

if(isset($_GET['action']) && $_GET['action'] == 'delete') {
 
    $filePathToDelete = $dir . '/' . urldecode($_GET['filename']);
    
    if (file_exists($filePathToDelete)) {
        
        unlink($filePathToDelete);
    }
    
    header("Location:" . $_SERVER['PHP_SELF']);  // Will not work if previous output e.g. dumpr

    exit;    
}

?>

<form name='createFile' action='' method='post'> 
    <p>
        <label for="fileName">Filename:</label>
	<input type='text' name='fileName' value=''>
    </p>
    <p>
        <label for="fileContent">File content:</label>
        <textarea name="fileContent"></textarea>
    </p>
    <p>
	<input type='submit' name='submit' value='Generate'> 
    </p>
</form> 

<?php

echo "<h3>List contents of '$dir'</h3>";

$handle = opendir($dir);

if($handle) {
    
    while( $file = readdir($handle)) {

        if ($file == '.') {
            continue;
        }

        if ($file == '..') {
            continue;
        }
        
        $filesize = filesize($dir . '/' . $file);
        
        if ($filesize < 1000) {
            
            $filesizeString = '< 1kb';
        }
        else {
            $filesizeString = ceil($filesize / 1000) . 'kb';            
        }
                  
        $encodeFilename = urlencode($file);
        echo "<p>
               <a href='$relative/$file' target='_blank'>$file</a> ($filesizeString)

               <a href='?action=delete&filename=$encodeFilename'>DELETE</a>

              </p>";                 
    }    
}

?>