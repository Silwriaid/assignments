/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function myFunction() {
                                                
    var sub = document.getElementsByClassName("sub");
    sub[0].style.backgroundColor = 'blue';

    var para1 = document.getElementById("para1");    
    para1.style.color = 'lightgrey';
    para1.innerHTML = "Hello world!";      
    
    //  Add a listener to para 1, hide para 2
    para1.addEventListener("click", hide);
};

function hide() {
    
    var x = document.getElementById('para2');    
    x.style.display = 'none';    
};