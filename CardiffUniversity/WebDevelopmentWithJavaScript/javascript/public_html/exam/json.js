$(function() {		//jQuery execute onload

    employees = {
        employee: [{
            fullname: {
                first: 'fred',
                last: 'Bloggs'
            },
            age: 21,
            job: 'manager'
        }, {
            fullname: {
                first: 'jo',
                last: 'soap'
            },
            age: 32,
            job: 'director'
        }]
    };

    // Get first employee's first name using dot notation
    x = employees.employee[1].fullname.first;
    alert('employee[1].fullname.first = ' + x);

    x = employees.employee[1].fullname.last;
    alert('employee[1].fullname.last = ' + x);


    employee = {
        fullname : 'fred bloggs',
        age : 21,
        job : 'manager',
        print : function() {

            var hobby = "sport";
            alert('The full name, from the print() function is: ' + this.fullname + " hobby = " + hobby);
        }
    };

    // access the function using dot notation
    employee.print();
}