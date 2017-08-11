function checkForm() {
            
    // Reset the background colour to white on each of the form elements
    // The element's ids are name, address, memtype, magrad and agreepar
    // Use document.getElementById("element-name").style.backgroundColor = "white";
    
    document.getElementById("name").style.backgroundColor = "white";
    document.getElementById("address").style.backgroundColor = "white";
    
    var isFormOK = true;
    var errorString = "The following fields are incorrect";
    
    // Check if the name field is blank
//    var theElement = document.getElementById('name').value;
    var theElement = $('name');
    if (theElement.length === 0) {
        errorString += '\n* Give your name';
        document.getElementById("name").style.backgroundColor = "red";
        isFormOK = false;
    }
    
    // Check if the address field is blank
    // Modify the code used for the name field
    var address = document.getElementById("address").value;
    if (address === "") {
        errorString += '\n* Address is missing';
        document.getElementById("address").style.backgroundColor = "red";
        isFormOK = false;
    }
        
    // Check the magazine options
    // Get all the 'mag' elements from the first form on the field
    // Use: document.forms[the-first-one]['the-element-name']
    var magOptions = document.forms[0]['mag'];
    
    
    // if (the-first-mag-element-is-not-checked && the-second-mag-element-is-not-checked) {
    //    add to the error string (in the same way as for the name and address fields above)
    //    set the background colour of the magrad element to red
    //    set the validation boolean variable to false (as shown above, for the name element)
    // }

    if ( !magOptions[0].checked && !magOptions[1].checked) {
        
        document.getElementById("magrad").style.backgroundColor = "red";
        errorString += '\n* Mag is not selected';
        isFormOK = false;
    }
    
    // Check selected membership type is not the default
    // Get the value of the 'memtype' element using document.getElementById(...).value
    // if (the value of the memtype elemnent is not the default value of 'x') {
    //    add another error message to the error message string
    //    set the memtype element background colour to red
    //    set the validation boolean variable to false
    // }
    var memtype = document.getElementById("memtype").value;
    if (memtype === 'x') {
        errorString += '\n* Please select membership type';
        isFormOK = false;
    }
    
    // Check the agreed field has been checked
    // Get the 'agree' element
    // if (the agree element is not checked) {
    //    add to the error string
    //    set the agree element's backgroun colour to red
    //    set the validation boolean variable to false
    // }
    var agree = document.getElementById("agree").checked;
    if (agree === false) {
        errorString += '\n* Agree is missing';
        document.getElementById("agreepar").style.backgroundColor = "red";
        isFormOK = false;
    }
        
    // Check whether the form is valid.  If not print the error message to the 'notes' element
    // if (the form is not OK)
    //    set the notes element's inner HTML to '<pre>' + errorString + '</pre>';
    if (isFormOK === false) {
        
        document.getElementById("notes").innerHTML="<pre>" + errorString + "</pre>";
    }
    // return the validation boolean
    return isFormOK;
} //end checkForm()