/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function simpleDate() {
    
    return new Date();   
}

function simpleDate(dayOfMonth) {
    
    var month = 0; // January    
    var currentYear = new Date().getFullYear();
    
    return simpleDate(dayOfMonth, month, currentYear);
}

function simpleDate(dayOfMonth, month) {
    
    var currentYear = new Date().getFullYear();    
    return simpleDate(dayOfMonth, month, currentYear);
}

function simpleDate(dayOfMonth, month, year) {

    var today = new Date();    
    var args = arguments.length;
    
    console.log("args = " + args);
    this.day = function() {
        
        console.log("In this.day");
        if (args === 0) {
            
            return today.getDate();
        }        
    };

    this.month = function() {
        
        var janaury = 0; // January    
        
        console.log("In this.day");

        if (args < 2) {
            
            return janaury;
        }
    };

    this.year = function() {
        
        if (args < 3) {
            
            
        }
    };
    
//    if (this.day() < 31 && this.month < 12) {
//        var date = new Date(this.year, this.month, this.dayOfMonth);
//        return date;
//    }
    
  return this.day() + this.month();  
    
}    

function getValues() {
    
    console.log("In get values");
    var day = parseInt($('#day').val());
    var month = parseInt($('#month').val()) - 1;
    var year = parseInt($('#year').val());
    
    //console.log("Day = " + day);
    $('#theDate').html(simpleDate(day));
}
