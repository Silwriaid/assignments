function checkForm() {
    
    // Reset the background colour  to white
    $('name').style.background = 'white';
    $('address').style.background = 'white';
    $('memtype').style.background = 'white';
    $('magrad').style.background = 'white';
    $('agreepar').style.background = 'white';
    
    var isFormOk = true;
    var errorString = "The following fields are incorrect";
    
    // Check if the name field is blank
    var theElement = $F('name');
    if (theElement.length == 0) {
        errorString += '\n* Give your name';
        $('name').style.background = 'red';
        isFormOk = false;
    }
    
    // Check if the address field is blank
    theElement = $F('address');
    if (theElement.length == 0) {
        errorString += '\n* Give your address';
        $('address').style.background = 'red';
        isFormOk = false;
    }
    
    // Check the magazine options
    theElement = document.forms[0]['mag'];
    if (!theElement[0].checked && !theElement[1].checked) {
        errorString += '\n* You need to select a magazine';
        $('magrad').style.background = 'red';
        isFormOk = false;
    }
    
    
    // Check selected membership type is not the default
    theElement = $F('memtype');
    if (theElement == 'x') {
        errorString += '\n* You need to select membership type';
        $('memtype').style.background = 'red';
        isFormOk = false;
    }
    
    // Check the agreed field has been checked
    theElement = $('agree');
    if (!theElement.checked) {
        errorString += '\n* You must read and agree to the terms of membership';
        $('agreepar').style.background = 'red';
        isFormOk = false;
    }
    
    // Check whether the form is valid.  If not print the error message to the 'notes' element
    if (!isFormOk)
        $('notes').innerHTML = '<pre>' + errorString + '</pre>';
        
    return isFormOk;
}
