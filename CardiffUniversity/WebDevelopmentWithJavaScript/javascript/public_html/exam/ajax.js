function loadXMLDoc() {
    // Make your synchronous AJAX call here
    // Use the GET method
    // The document you are requesting is called ajax.txt

    xhr = new XMLHttpRequest();
    xhr.open("GET", "ajax.txt", false);
    xhr.send();

    document.getElementById("response").innerHTML = xhr.responseText;
}

function loadXMLDoc() {
    // Create an xmlhttprequest object IE7+ and all other browsers

    xhr = new XMLHttpRequest();
    xhr.open('POST', 'http://learn.cf.ac.uk/staff/semahd/javascript/lesson8/ajax.php?r=' + Math.random(), true);
    xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xhr.send("");
    xhr.onreadystatechange = function(){

        document.getElementById("replacedtext").innerHTML = xhr.responseText;

    }

    // Make the request
    // NOTE:this script simulates a network delay
}

function postExample() {
    $.ajax({type: "POST",
        url: "http://www.peredur.net/whatserver/jsonp-server.php",
        data: {name: 'Fred'},
        success: function() { alert('success'); },
        jsonp: 'callback',
        jsonpCallback: 'jsonpCallback',
        dataType: "jsonp"});
    });

function jsonpCallback(data){
    $('#jsonpResult').text(data.message);
}


$("#useJSONP").click(function(){
    // Create a jquery ajax call using jsonp

    $.getJSON("http://www.peredur.net/whatserver/jsonp-server.php?callback=?", {name:'Fred'}, function (data) {

        $('#jsonpResult').text(data.message);
    });

    // set the callback function to jsonpCallback below
    // url: http://www.peredur.net/whatserver/jsonp-server.php
    // pass your name eg {name: 'Fred'} as data
});


