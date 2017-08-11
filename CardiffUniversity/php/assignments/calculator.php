<?php

/*
 * PHP Scripting for the Web 2017
 * Written by Andrew Hoard
 */

$formCompleted = false;

$operand1 = 0;
$operand2 = 0;
$operator = '';
$result = 0;

$operatorOptions = array(
    'plus' => '+',
    'minus' => '-',
    'times' => 'x',
    'divide' => '/');

if ( isset($_POST['formName']) && $_POST['formName'] == 'CalculatorForm') {

    $operand1 = $_POST['operand1'];
    $operand2 = $_POST['operand2'];
    $operator = $_POST['operator'];

    // Validate the first operand. Note that "empty" function will return true for zero. Hence the extra != zero check
    if ( (empty($operand1) && $operand1 != 0) || !is_numeric($operand1) ) {
            
        $operand1 = 0;
        $operand2 = 0;
    }

    // Validate the second operand. Note that "empty" function  will return true for zero. Hence the extra != zero check
    if ( (empty($operand2) && $operand2 != 0) || !is_numeric($operand2) ) {
    
        $operand2 = 0;
        $operand1 = 0;
    }

    //  Perform the maths
    if ($operator == 'plus') {
        
        $result = $operand1 + $operand2;
    }
    elseif ($operator == 'minus') {
        $result = $operand1 - $operand2;
    }
    elseif ($operator == 'times') {
        $result = $operand1 * $operand2;
    }
    elseif ($operator == 'divide') {
        
        //  Check for divide by zero
        if ($operand2 != 0) {
            $result = $operand1 / $operand2;
        }
        else {
            
            $operand1 = 0;
        }
    }    
}   
?>

<html>

<body>
                   
    <form name='myCalculator' method='post' action=''>
        <table>
            <tr>
                <td>
                    <input name="operand1" type="text" value="<?php echo $operand1 ?>" />
                </td>
                <td>
                    <select name="operator">

                <?php 
                
                   foreach ($operatorOptions as $key => $value) { 
                    
                        $selected = $key == $_POST['operator'] ? 'selected' : '';
                        
                        echo "\n\t <option value='$key' $selected>$value</option>";
                ?>
                                                                                                          
                <?php } ?>
                   
                    </select>
                </td>
                <td>
                    <input name="operand2" type="text" value="<?php echo $operand2 ?>" />
                </td>
                <td>    
                    <input name="" type="submit" value="=" />
                </td>
                <td>        
                    <input name="" type="text" value="<?php echo $result ?>" disabled />
                </td>
            </tr>
        </table>
        
        <input  type="hidden"  name="formName" value="CalculatorForm" />
</form>
    
    <?php 
                
        echo '<p><a href="' . $_SERVER['PHP_SELF'] . '">Reset</a></p>';
    ?>
</body>
</html>
    