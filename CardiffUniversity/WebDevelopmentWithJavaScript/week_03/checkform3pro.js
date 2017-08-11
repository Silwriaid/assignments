function checkForm() {
    
    // Reset the background colour to white
    document.getElementById("name").style.backgroundColor = "white"; 
    document.getElementById("address").style.backgroundColor = "white";
    document.getElementById("memtype").style.backgroundColor = "white";
    document.getElementById("magrad").style.backgroundColor = "white";
    document.getElementById("agreepar").style.backgroundColor = "white";

    var isFormOK = true;
    var errorString = "The following fields are incorrect";
    
    // Check if the name field is blank
    var theElement = document.getElementById('name').value;
    if (theElement.length == 0) {
        errorString += '\n* Give your name';
        document.getElementById("name").style.backgroundColor = "red";
        isFormOK = false;
    }
    
    // Check if the address field is blank
    theElement = document.getElementById("address").value;
    if (theElement.length == 0) {
        errorString += '\n* Give your address';
        document.getElementById("address").style.backgroundColor = "red";
        isFormOK = false;
    }
    
    // Check the magazine options
    theElement = document.forms[0]['mag'];
    if (!theElement[0].checked && !theElement[1].checked) {
        errorString += '\n* You need to select a magazine';
        document.getElementById("magrad").style.backgroundColor = "red";
        isFormOK = false;
    }

    // Check selected membership type is not the default
    theElement = document.getElementById("memtype").value;
    if (theElement == 'x') {
        errorString += '\n* You need to select membership type';
        document.getElementById("memtype").style.backgroundColor = "red";
        isFormOK = false;
    }

    // Check the agreed field has been checked
    theElement = document.getElementById('agree');
    if (!theElement.checked) {
        errorString += '\n* You must read and agree to the terms of membership';
        document.getElementById("agreepar").style.backgroundColor = "red";
        isFormOK = false;
    }
    
    // Check whether the form is valid.  If not print the error message to the 'notes' element
    if (!isFormOK)
        document.getElementById('notes').innerHTML = '<pre>' + errorString + '</pre>';
        
    return isFormOK;
} //end checkForm()
