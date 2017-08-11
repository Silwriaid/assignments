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

if (! is_dir($dir)) {
    
    die ("'$dir' is not a directory");
}

if (! is_writable($dir)) {
    
    die ("'$dir' is not writable");
}


if(isset($_POST['submit']) && $_POST['submit'] == 'Upload') {
                    
    //dumpr($_FILES);
    
    if ($_FILES['fileUpload']['error'] == 0) {
                
        $str = $_FILES['fileUpload']['name'];          // remove HTML tags

        $str = strtolower($str);                       //make lowercase
        $str = str_replace(' ', '', $str);             //remove spaces
        $str = preg_replace('/[^A-Za-z0-9\.]/','',$str); // remove non alpha-numeric

        //  destination
        $destination = $dir . '/' . $str;
        
        //dumpr($destination);
        
        //current location
        $location = $_FILES['fileUpload']['tmp_name'];
        //dumpr($location);
        
        // Store file
        if (move_uploaded_file($location, $destination)) {
            
            $message = 'File uploaded';
            $message .= '['. ceil($_FILES['fileUpload']['size'] / 100) . 'kb]';
            $message .= $str;
            
            //dumpr($message);
        }
        else {
             $error['There was an error moving the file'];
        }                
    } 
    else {
        
        $error['There was an error'];
        
        dumpr($error);
    }
                     
    header("Location:" . $_SERVER['PHP_SELF']);  // Will not work if previous output e.g. dumpr
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

<!DOCTYPE>
<html>
    
    <head>
        
        <script type="text/javascript">
        
            function checkDelete(link, filename) {
                
                console.log('In checkDelete');
                
                if (confirm('Are you sure you want to delete ' + filename + '...?')) {
                    
                    window.location = link;
                }
                else {
                    return false;
                }                                
            }
        
        </script>        
    </head>
<body>

<form name='' action='' method='post' enctype='multipart/form-data'> 
    <p>
        <input type='file'   name='fileUpload'/>
        <input type='submit' name='submit' value='Upload'/> 
    </p>
</form> 

<hr>

<?php

echo "<p>Message is $message</p><hr>";

if ($message) {
    
    echo "<p>$message</p><hr>";        
}

$handle = opendir($dir);

if($handle) {
    
    echo '<table border=1';
    
    while( $file = readdir($handle)) {

        if ($file == '.') {
            continue;
        }

        if ($file == '..') {
            continue;
        }
        
        $extension = pathinfo($dir. '/' . $file, PATHINFO_EXTENSION);
        
        switch ($extension) {
            
            case 'doc':
            case 'docx':
            case 'odt':
            case 'rtf':
                
                $icon = 'doc.png';
                break;
            
            case 'xls':
            case 'xlsx':
                
                $icon = 'xls.png';
                break;

            case 'jpg':
            case 'jpeg':
            case 'gif':
            case 'png':
            case 'bmp':
            case 'tif':
            case 'tiff':
                
                $icon = 'png.png';
                break;
            
            default:
                
                $icon = 'file.png';
        }
                
        $src = "/learn/phpcourse/resources/fileicons/$icon";
        $imageIcon = "<img src='$src' />";
        
        $filesize = filesize($dir . '/' . $file);
        
        if ($filesize < 1000) {
            
            $filesizeString = '< 1kb';
        }
        else {
            $filesizeString = ceil($filesize / 1000) . 'kb';            
        }

        $link = $relative . '/' . $file;
        $linkTag = "<a href='$link' target='_blank'>View</a>";
        
        $deleteIcon = "<img src='/learn/phpcourse/resources/delete.png' />";
        
        $deleteLink = "?action=delete&amp;filename=$file";
        
        // old direct delete style
        //$deleteTag = "<a href='$deleteLink'>$deleteIcon</a>";
        
        // New JS confirm delete style
        $deleteTag = "<a href='#' onclick='checkDelete(\"$deleteLink\", \"$file\")'>$deleteIcon</a>";
        
        $downloadLink = "download.php?file=$file";
        $downloadTag = "<a href='$downloadLink'>Download</a>";
        
        echo '<tr>';
        echo "<td>$imageIcon $file</td>";
        echo "<td>$filesizeString</td>";
        echo "<td>$linkTag</td>";
        echo "<td>$downloadTag</td>";
        echo "<td>$deleteTag</td>";
        echo '</tr>';
        
    }    
    
    echo '</table>';
}

?>

</body>
</html>