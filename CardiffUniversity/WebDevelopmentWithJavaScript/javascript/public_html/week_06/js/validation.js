function checkForm() {
            
    // Reset the background colour to white on each of the form elements
    // The element's ids are name, address, memtype, magrad and agreepar
    // Use document.getElementById("element-name").style.backgroundColor = "white";
    
    $("#firstname").css('background-color', "white");
    
    var isFormOK = true;
    var errorString = "The following fields are incorrect";
    
    // Check if the first name field is blank
    var theElement = $('firstname');
    if (theElement.length === 0) {
        errorString += '\n* Give your name';
        $("firstname").css('border-color', 'red');
        isFormOK = false;
    }

        // Check if the last name field is blank
    var theElement = $('lastname');
    if (theElement.length === 0) {
        errorString += '\n* Give your last name';
        $("lastname").css('background-color', 'red');
        isFormOK = false;
    }

    // Check if the 1st line of addeess field is blank
    var theElement = $('add1');
    if (theElement.length === 0) {
        errorString += '\n* Give your address';
        $("add1").css('color', 'red');
        isFormOK = false;
    }

    // Check if the 1st line of addeess field is blank
    var theElement = $('postcode');
    if (theElement.length === 0) {
        errorString += '\n* Give your postcode';
        $("postcode").css('color', 'red');
        isFormOK = false;
    }
    
        // Check if the 1st line of addeess field is blank
    var theElement = $('#email');
    if (theElement.length === 0) {
        errorString += '\n* Give your email';
        $("postcode").css('color', 'red');
        isFormOK = false;
    }
                   
    var res = (/[A-Za-z.]{2,}@[A-Za-z]{2,}.[A-Za-z]{2,}/.test( $('#email').val() ));
    if (!res) {
        errorString += '\n* Invalid email';
        $("email").css('color', 'red');
        isFormOK = false;
    }
        
    var validTelNo = (/[0-9 ]/).test( $('#tel').val() );
    if (!validTelNo) {
        errorString += '\n* Invalid telephone number';
        $("tel").css('color', 'red');
        isFormOK = false;
    }
        
    // Check whether the form is valid.  If not print the error message to the 'notes' element
    // if (the form is not OK)
    //    set the notes element's inner HTML to '<pre>' + errorString + '</pre>';
    if (isFormOK === false) {
        
        $("#notes").html("<pre>" + errorString + "</pre>");
    }
    // return the validation boolean
    return isFormOK;
} //end checkForm()