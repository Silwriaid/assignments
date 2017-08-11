
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Project : Ajax </title>
    <link rel="stylesheet" href="resources/styles.css" type="text/css" />
</head>

<body>
 
    <h2>Welsh towns and citys</h2>
    
    <div style="float:left; width:450px">
    
        <form name="" action="" method="">

            <input type="text" name="searchTerm" id="searchTerm" value="" style="width:400px;" placeholder="Where do you live..?"/>                        

        </form>

        <!-- AJAX <div> hidden by default using CSS -->
        <div id="ajaxSearchOptions" style="width:400px;padding:0px;display:none;">
            <!-- Populated Dynamically using AJAX -->
            
            
        </div>
       
    </div>       
    
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
    <script type='text/javascript'>
    /*
     * Ensure that jQuery is loaded first
     * so that we can use '$'
     */
    
    // Wait untill the document is fully loaded..
    $(document).ready(function() {
               
        // -----  FUNCTION 1 --------------------------
        // Find an element with an ID if 'searchTerm'
        // and on each 'keyup' action, run the following..
        $('#searchTerm').on('keyup', function(e) {
            
            // Prevent default behaviour
            e.preventDefault();
            
            // Store our input value into a variable
            var inputString = $('#searchTerm').val();
            
            // Do not do anything untill there are more than 1 character
            if(inputString.length > 0){                                
                
                /**  AJAX  ******************************* **/
                $.ajax({
                    // File to post the request to..
                    url: "_ajaxWelshPlaceNamesSearch.php",
                    // Form type..
                    type: "GET",
                    // Form fields
                    data: {
                        search: inputString 
                    },
                    // Funtion to run on success
                    success: function(response){
                        // Populate the element with ID 'ajaxSearchOptions'
                        // with the response from the AJAX page
                        $('#ajaxSearchOptions').html(response);
                    }
                });
                
                // Display the AJAX <div> (which is hidden by default using inline CSS)
                $('#ajaxSearchOptions').show();
                
            } else {
                
                // Less than 1 character..?  Hide the options <div>
                $('#ajaxSearchOptions').hide();
                
            }
        });
        
        
        // -----  FUNCTION 2 -------------------------- 
        // When an option is clicked..
        $('#ajaxSearchOptions').on('click', function(e) {
        
            // Prevent default behaviour
            e.preventDefault();
        
            // get the select value
            var selOption = $('#ajaxSearchOptions option:selected').text();
            
            // pul it in the sreach box
            $('#searchTerm').val(selOption);
            
            // and hide the options..
            $('#ajaxSearchOptions').hide();
        
        });
        
        
     });
    
    </script>
    
</body>

</html>
