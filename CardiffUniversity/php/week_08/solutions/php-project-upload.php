<?php 
/* 
 *  Cardiff Centre for Lifelong Learning 
 *  PHP Scripting for the Web 
 *  ------------------------ 
 *  Chris Maggs | Jan 2014 
 */ 

// INCLUDES | CONSTANTS | SECURITY 
include 'bootstrap.php';  

$message = false; 

// Check 'uploads' dir is writable 
// ------------------------------- 
$dir = 'uploads/';                                              //relative path to your WEB ROOT 
//$dir = $_SERVER['DOCUMENT_ROOT'].'/learn/phpcourse/uploads/';     //full path to your WEB ROOT 

if ( ! is_writable($dir)){ 
    die("ERROR :: $dir is NOT writeble."); 
} 

// 1. Check upload and store file 
//-------------------------------------------------------------------------------------- 
if (isset($_POST['submit']) && ($_POST['submit'] == 'Upload')){ 

    // Build an array of file details fron the GLOBAL Array $_FILES 
    //$fileUpload = array(); 
    //$fileUpload['name']       = $_FILES['fileUpload']['name'];        // Uploaded filename 
    //$fileUpload['type']       = $_FILES['fileUpload']['type'];        // Uploaded file MIME Type 
    //$fileUpload['tmp_name']   = $_FILES['fileUpload']['tmp_name'];    // Temporary filename & location 
    //$fileUpload['size']       = $_FILES['fileUpload']['size'];        // Uploaded file size (in bytes) 
    //$fileUpload['error']      = $_FILES['fileUpload']['error'];       // Upload Error status 
     
    // or..     
    $fileUpload = $_FILES['fileUpload'];              
     
    // Use the Error code to determine upload status 
    if ($fileUpload["error"] == 0) { 
         
        $cleanFilename = trim($fileUpload["name"]);                             // remove leading/trailing whitespace 
        $cleanFilename = str_replace(' ','-',$cleanFilename);                   // replace spaces for underscores 
        $cleanFilename = preg_replace("/[^A-Za-z0-9-\.]/", "", $cleanFilename); // remove everything except.. 

        // Define a full target location and filename 
        $target_path = $dir.'/'.$cleanFilename;  
         
        // Copy the file to our writable directory 
        // using the full path and filename we have created 
        if (move_uploaded_file($fileUpload["tmp_name"], $target_path)){ 
             
            $message  = '<h3>File Uploaded!</h3>'; 
            $message .= '<p>Temporary file location : '.$fileUpload["tmp_name"]; 
            $message .= '<br>Target location : '.$target_path; 
            $message .= '<br>Filesize : '.$fileUpload['size'].'bytes'; 
            $message .= '<br>Filetype : '.$fileUpload['type'].'type</p>'; 
             
        } else { 
             
            $message = "<p>There was an error uploading the file, please try again!</p>"; 
        } 
    } else { 
                       
        switch($fileUpload["error"]){         
            //case 0:  $errorMessage = "There is no error, the file uploaded with success."; break; 
            case 1:  $errorMessage = "The uploaded file exceeds the upload_max_filesize directive in php.ini."; break; 
            case 2:  $errorMessage = "The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form."; break; 
            case 3:  $errorMessage = "The uploaded file was only partially uploaded."; break; 
            case 4:  $errorMessage = "No file was uploaded."; break; 
            case 6:  $errorMessage = "Missing a temporary folder."; break; //Introduced in PHP 5.0.3. 
            case 7:  $errorMessage = "Failed to write file to disk."; break; //Introduced in PHP 5.1.0. 
            case 8:  $errorMessage = "A PHP extension stopped the file upload. "; break; //Introduced in PHP 5.2.0. 
            default: $errorMessage = "An unknown error occured";                                
        }         
         
        $message = "<p class='error'>Error : $errorMessage</p>"; 
    } 
     
    // Dont redirect here or you will lose $message. 
     
} 

// 2. Delete file 
//-------------------------------------------------------------------------------------- 
if ($_GET['action'] == 'delete'){ 
     
    $fileUploadPath = $dir.$_GET['filename']; 
     
    if(file_exists($fileUploadPath)){ 
        unlink($fileUploadPath); 
    } 
     
    // Redirect to SELF to clear URL vars 
    header ("Location: ".$_SERVER['PHP_SELF']); 
    exit; 
     
} 

?> 
<!DOCTYPE html> 
<head> 
    <meta charset="utf-8"> 
    <title>Project : File Upload, List, Download & Delete</title> 
    <link rel="stylesheet" href="resources/styles.css" type="text/css" /> 
    <script type="text/javascript" src="resources/javascript.js"></script> 
</head> 

<body> 
     
    <?php echo $topLinks; ?> 
     
    <h1>Project : File Upload, List, Download & Delete</h1> 
     
    <p>1. Create/Check a 'writable' directory on the server.</p> 
    <p>2. Using a simple &lt;form&gt;, upload a file and store it in the writable directory.</p> 
    <p>3. List the contents of the directory with the ability to View, Download and Delete each file.</p>  
    <p><em>Don't forget the form EncType!!</em></p> 
     
    <hr> 
     
    <h3>Upload a file</h3> 
     
    <form name='' action='' method='post' enctype='multipart/form-data'> 
        <p> 
            <input type='file'   name='fileUpload' /> 
            <input type='submit' name='submit' value='Upload' /> 
        </p> 
    </form> 
     
    <hr> 
     
    <?php  
    // --  SUCCESS MESSAGE  --------------------------------- 
    //------------------------------------------------------- 
    if ($message) {     // use $message as a boolean  
        echo $message;  // display $message as a string  
        echo "<p><a href='".$_SERVER['PHP_SELF']."'>Clear</a></p>"; 
        echo "<hr>"; 
    } 
    //------------------------------------------------------- 
    ?> 
     
    <h3>'Uploads' directory</h3> 
     
    <table> 
         
        <?php 
        // 3. List files 
        //-------------------------------------------------------------------------------------- 
        $dh = opendir($dir); 

        if ($dh) { 

            while ($fileUpload = readdir($dh)) { 

                if (is_file($dir.$fileUpload)){   

                    // Determine filesize 
                    $bytes = filesize($dir.$fileUpload); 
                    $kbytes = $bytes/1024; 
                    if ($kbytes < 1){ 
                        $fileUploadsize = '<1kb'; 
                    } else { 
                        $fileUploadsize = ceil($kbytes).'kb'; 
                    } 
                     
                    // Select an appriopriate file extension 
                    $fileUploadExtension = pathinfo($dir.$fileUpload,PATHINFO_EXTENSION); 
                    switch($fileUploadExtension){ 
                        case 'docx':    $iconExt = 'doc';   break; 
                        case 'xlsx':    $iconExt = 'xls';   break; 
                        case 'doc': 
                        case 'xls': 
                        case 'jpg': 
                        case 'png': 
                        case 'pdf': 
                        case 'zip':     $iconExt = $fileUploadExtension;  break; 
                        default:        $iconExt = 'file'; 
                    } 
                     
                    // Build some links, to make the HTML cleaner 
                    $link     = '/learn/phpcourse/uploads/'.$fileUpload; 
                    $delete   = '?action=delete&amp;filename='.urlencode($fileUpload); 
                    $download = '/learn/phpcourse/resources/download.php?file='.$fileUpload; 
                     
                    echo " 
                        <tr> 
                            <td><img src='/learn/phpcourse/resources/fileicons/$iconExt.png' alt='$iconExt' style='float:left;width:25px;padding-right:10px;' /> $fileUpload </td> 
                            <td><a href='$link'     target='_new'>View</a></td> 
                            <td><a href='$download' target='_new'>Download ($fileUploadsize)</a></td> 
                      <!--  <td><a href='$delete'><img src='/learn/phpcourse/resources/delete.png' alt='Delete' title='Delete' /></a></td>  --> 
                            <td><a href='#' onclick='javascript:checkDelete(\"$delete\",\"$fileUpload\");'><img src='/learn/phpcourse/resources/delete.png' alt='Delete' title='Delete' /></a></td> 
                        </tr> 
                        "; 
                } 
            } 
            closedir($dh); 
        } 
         
        ?> 
         
    </table> 
     
    <br> 
    <br> 
    <br> 
     
    <hr> 
     
    <div class="related"> 

        <h2>Need Help..?</h2> 

        <p>Related sections in the course manual: 
            <ul> 
                <li>PHP Super Globals</li> 
            </ul> 
        </p> 
         
        <p>FileIconType icons available are:  file, folder, doc, xls, jpg, png, pdf, zip<br>             
            and should be used like: "/learn/phpcourse/resources/fileicons/<strong>&lt;fileIconType&gt;</strong>.png" 
        </p> 

        <p><strong>$_POST</strong></p> 
<pre> 
<?php 
var_dump($_POST);   // Form fields 
?> 
</pre>  
        <p><strong>$_FILES</strong></p> 
<pre> 
<?php 
var_dump($_FILES);  // Uploaded file 
?> 
</pre>  

<pre> 
&lt;form name='' action='' method='post' enctype='multipart/form-data'&gt;  
    &lt;p&gt; 
        &lt;input type='file'   name='fileUpload'/&gt; 
        &lt;input type='submit' name='submit' value='Upload'/&gt;  
    &lt;/p&gt; 
&lt;/form&gt;  
</pre>          
                 
</div> 
     
</body> 

</html> 