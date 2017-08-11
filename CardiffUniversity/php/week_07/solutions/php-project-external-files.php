<?php 
/* 
 *  Cardiff Centre for Lifelong Learning 
 *  PHP Scripting for the Web 
 *  ------------------------ 
 *  Chris Maggs | Jan 2014 
 */ 

// INCLUDES | CONSTANTS | SECURITY 
include 'bootstrap.php';  

// **************************************************************** 
// FTP 'view' will be helpfull in this project to be able to see  
// if/when files are being generated on the server, and to manually  
// change directory permissions if disallowed by the web server 
// **************************************************************** 

// 1. Create a writable sub-directory 
// ---------------------------------- 
$dir = 'tmp';                                             //relative path to your WEB ROOT 
//$dir = $_SERVER['DOCUMENT_ROOT'].'/learn/phpcourse/tmp';    //full path to your WEB ROOT 

if ( ! is_dir($dir)){ 
    // NOT ALLOWED by CARDIFF UNI  
    //mkdir($dir); 
    //mkdir($dir,0777); 
    die("ERROR :: $dir is NOT a directory."); 
} 
if ( ! is_writable($dir)){ 
    // NOT ALLOWED by CARDIFF UNI  
    // chmod($dir,0777); 
    die("ERROR :: $dir is NOT writeble."); 
} 

// 2. Validate the form 
// -------------------- 
if (isset($_POST['submit']) && $_POST['submit'] == 'Generate'){ 
     
    $errors = array(); 
     
    if (empty($_POST['fileName'])){ 
        $errors[] = 'Please enter a filename'; 
    } 
     
    if (empty($_POST['fileContent'])){ 
        $errors[] = 'Please enter file content'; 
    } 
     
    if (count($errors) == 0){ 
         
        // If NO errors, Generate the file 
        //-------------------------------- 
         
        $str = $_POST['fileName']; 
         
        $str = trim($str);                                          // remove leading/trailing whitespace 
        $str = strip_tags($str);                                    // remove HTML tags 
        $str = strtolower($str);                                    // convert to lowercase 
         
        $str = preg_replace("/[^A-Za-z0-9 ]/", "", $str);           // remove everything except..         
        $str = str_replace(' ','-',$str);                           // replace spaces for underscores 
        $str = str_replace('.','',$str);                            // remove dots                 
         
        $filename = $str.'.txt';            // Generate a filename 
        $filepath = $dir.'/'.$filename;     // Generate the full path 
     
     
        // OLD WAY 
        // --------------------------------------------------------- 
        //$handle = fopen($filepath, "w");            // create file 
        //fwrite($handle,$_POST['fileContent']);      // write to file 
        //fclose($handle);                            // close file 
         
        // NEW WAY 
        // ----------------------------------------------- 
        file_put_contents($filepath,$_POST['fileContent']);   // creates, writes and closes file 
         
         
        // CLEAR POST VARS 
        // ---------------------------- 
        //unset($_POST['fileName']); 
        //unset($_POST['fileContent']); 
        //unset($_POST['submit']); 
         
        // REDIRECT to clear POST vars 
        // --------------------------------------- 
        header("Location: ".$_SERVER['PHP_SELF']); 
        exit; 
         
    } 
     
} 

// 4. Delete a file if it exists 
// ----------------------------- 
if ($_GET['action'] == 'delete'){ 
     
    $fileToDelete = urldecode($_GET['filename']); 
    $filePath = $_SERVER['DOCUMENT_ROOT'].'/learn/phpcourse/'.$dir.'/'.$fileToDelete; 
     
    if(file_exists($filePath)){ 
        unlink($filePath); 
    } 
     
    // Redirect to SELF to clear URL vars 
    header ("Location: ".$_SERVER['PHP_SELF']); 
    exit; 
     
} 

?> 
<!DOCTYPE html> 
<head> 
    <meta charset="utf-8"> 
    <title>Project : Create, Read and Write a File</title> 
    <link rel="stylesheet" href="resources/styles.css" type="text/css" /> 
</head> 

<body> 
     
    <?php echo $topLinks; ?> 
     
    <h1>Project : Create, Read and Write a File</h1> 
     
    <p>1. Create a 'writable' directory on the server.  (Check that this is in place and writeble)</p> 
    <p>2. Using the &lt;form&gt; to generate the filename and content, create a file, write some data to it and store it on the server.</p> 
    <p>3. List the contents of the directory with the ability to delete each file.</p>  
    <br/> 
     
    <?php 
    // Display Errors if they exist 
    if (count($errors) > 0){ 
        echo "\n<div class='errors'>"; 
        echo "\n<ul>"; 
        foreach ($errors as $error){ 
            echo "\n\t<li>$error</li>"; 
        } 
        echo "\n</ul>"; 
        echo "\n</div>"; 
    } 
    ?> 
     
    <form name="createFile" action="" method="post"> 
         
        <p> 
            <label for="fileName">Filename:</label> 
            <input name="fileName" type="text" value="<?php echo $_POST['fileName']?>" /> 
        </p> 
         
        <p> 
            <label for="fileContent">Content:</label> 
            <textarea name="fileContent"><?php echo $_POST['fileContent']?></textarea> 
        </p> 
         
        <p> 
            <label>&nbsp;</label> 
            <input type="submit" name="submit" value="Generate" /> 
        </p> 
         
    </form> 
         
    <hr> 
     
    <?php 
     
    // 3. Scan through the sub-directory and output all files 
    // ------------------------------------------------------- 

    $directoryHandle = opendir($dir); 

    if ($directoryHandle) { 

        echo "<h2>Contents of : $dir</h2>"; 

        while ($file = readdir($directoryHandle)) { 

            if ($file == '.')  continue;    // Ignore '.' 
            if ($file == '..') continue;    // Ignore '..' 

            if (is_file($dir.'/'.$file)){    // relative 

                // Determine filesize 
                $bytes = filesize($dir.'/'.$file); 
                $kbytes = $bytes/1000; 
                if ($kbytes < 1){ 
                    $filesize = '<1kb'; 
                } else { 
                    $filesize = floor($kbytes).'kb'; 
                } 

                echo "<p>" 
                    . "File : <a href='$dir/$file' target='_new'>$file</a> ($filesize) " 
                    . " <a href='?action=delete&amp;filename=".urlencode($file)."'>[DELETE]</a>" 
                    . "</p>"; 

            } 
        } 
        closedir($directoryHandle);     
    } 
     
     
?> 


<hr> 
         
<div class="related"> 
    <h2>Need Help..?</h2> 

    <p>Related sections in the course manual: 
        <ul> 
            <li>File & Directory Handling</li> 
        </ul> 
    </p> 

    <p><strong>$_POST</strong></p> 
<pre> 
<?php 
var_dump($_POST); 
?> 
</pre>  
             
<pre> 
&lt;form name='createFile' action='' method='post'&gt;  
    &lt;p&gt; 
        &lt;label for="fileName"&gt;Filename:&lt;/label&gt; 
    &lt;input type='text' name='fileName' value=''&gt; 
    &lt;/p&gt; 
    &lt;p&gt; 
        &lt;label for="fileContent"&gt;File content:&lt;/label&gt; 
        &lt;textarea name="fileContent"&gt;&lt;/textarea&gt; 
    &lt;/p&gt; 
    &lt;p&gt; 
    &lt;input type='submit' name='submit' value='Generate'&gt;  
    &lt;/p&gt; 
&lt;/form&gt;  
</pre>          
         
    </div> 
     
     
        
</body> 