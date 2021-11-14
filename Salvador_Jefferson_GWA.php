<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GWA Calculator</title>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 720px;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>

    <?php
        function convert($grade){
            if($grade >= 99){
                $GLOBALS['converted'] = '1.00';
                $GLOBALS['rating'] = 'A+';
                $GLOBALS['remarks'] = 'Excellent+';
            }elseif($grade >= 96){
                $GLOBALS['converted'] = '1.25';
                $GLOBALS['rating'] = 'A';
                $GLOBALS['remarks'] = 'Excellent-';
            }elseif($grade >= 93){
                $GLOBALS['converted'] = '1.50';
                $GLOBALS['rating'] = 'A-';
                $GLOBALS['remarks'] = 'Very Good+';
            }elseif($grade >= 90){
                $GLOBALS['converted'] = '1.75';
                $GLOBALS['rating'] = 'B+';
                $GLOBALS['remarks'] = 'Very Good-';
            }elseif($grade >= 87){
                $GLOBALS['converted'] = '2.00';
                $GLOBALS['rating'] = 'B';
                $GLOBALS['remarks'] = 'Good+';
            }elseif($grade >= 84){
                $GLOBALS['converted'] = '2.25';
                $GLOBALS['rating'] = 'B-';
                $GLOBALS['remarks'] = 'Good-';
            }elseif($grade >= 81){
                $GLOBALS['converted'] = '2.50';
                $GLOBALS['rating'] = 'C+';
                $GLOBALS['remarks'] = 'Fair+';
            }elseif($grade >= 78){
                $GLOBALS['converted'] = '2.75';
                $GLOBALS['rating'] = 'C';
                $GLOBALS['remarks'] = 'Fair-';
            }elseif($grade >= 75){
                $GLOBALS['converted'] = '3.00';
                $GLOBALS['rating'] = 'C-';
                $GLOBALS['remarks'] = 'Passed+';
            }elseif($grade >= 72){
                $GLOBALS['converted'] = '4.00';
                $GLOBALS['rating'] = 'D';
                $GLOBALS['remarks'] = 'Conditional';
            }else{
                $GLOBALS['converted'] = '5.00';
                $GLOBALS['rating'] = 'E';
                $GLOBALS['remarks'] = 'Failed';
            }
        }

        function calculateGWA(){
            $CCS101 = $_POST['CCS101'] * 3;
            $CCS102 = $_POST['CCS102'] * 5;
            $EMC101 = $_POST['EMC101'] * 3;
            $GEC001 = $_POST['GEC001'] * 3;
            $GEC004 = $_POST['GEC004'] * 3;
            $PE111 = $_POST['PE111'] * 2;

            $totalGradeEq = $CCS101 + $CCS102 + $EMC101 + $GEC001 + $GEC004 + $PE111;
            $totalUnits = 3 + 5 + 3 + 3 + 3 + 2;
            $gwa = $totalGradeEq/ $totalUnits;
            convert($gwa);
            return $gwa;
        }
    ?>
</head>
<body>
    <form id="frmGWA" method="post">
    <table>
        <tr>
            <th>Code</th>
            <th>Unit</th>
            <th>Description</th>
            <th>Grade</th>
        </tr>
        <tr>
            <td>CCS101</td>
            <td>3</td>
            <td>INTRODUCTION TO COMPUTING</td>
            <td>
                <input type="number" name="CCS101" min="70" max="100"/>
            </td>
        </tr>
        <tr>
            <td>CCS102</td>
            <td>5</td>
            <td>COMPUTER PROGRAMMING1</td>
            <td>
                <input type="number" name="CCS102" min="70" max="100"/>
            </td>
        </tr>
        <tr>
            <td>EMC101</td>
            <td>3</td>
            <td>DRAFRING</td>
            <td>
                <input type="number" name="EMC101" min="70" max="100"/>
            </td>
        </tr>
        <tr>
            <td>GEC001</td>
            <td>3</td>
            <td>UNDERSTANDING THE SELF</td>
            <td>
                <input type="number" name="GEC001" min="70" max="100"/>
            </td>
        </tr>
        <tr>
            <td>GEC004</td>
            <td>3</td>
            <td>MATHEMATICS IN THE MODERN WORLD</td>
            <td>
                <input type="number" name="GEC004" min="70" max="100"/>
            </td>
        </tr>
        <tr>
            <td>PE111</td>
            <td>2</td>
            <td>PHYSICAL FITNESS AND WELLNESS</td>
            <td>
                <input type="number" name="PE111" min="70" max="100"/>
            </td>
        </tr>
        <tr>
            <td>NSTP111</td>
            <td>3</td>
            <td>NSTP(CWTS)1</td>
            <td>
                <input type="number" name="NSTP111" min="70" max="100" />
            </td>
        </tr>
    </table>
    <br>
    <input type="submit" form="frmGWA">
    </form>

    <?php
        if(isset($_POST['CCS101'])){
            echo '    
            <br>
            <table>
            <tr>
                <th>Code</th>
                <th>Grade</th>
                <th>Converted</th>
                <th>Rating</th>
                <th>Remarks</th>
            </tr>
            <tr>
                <td>CCS101</td>
                <td>'.
                $_POST['CCS101'].'
                </td>
                <td>'.convert($_POST['CCS101']).$converted.'</td>
                <td>'.$rating.'</td>
                <td>'.$remarks.'</td>
            </tr>
            <tr>
                <td>CCS102</td>
                <td>'.
                $_POST['CCS102'].'
                </td>
                <td>'.convert($_POST['CCS102']).$converted.'</td>
                <td>'.$rating.'</td>
                <td>'.$remarks.'</td>
            </tr>
            <tr>
                <td>EMC101</td>
                <td>'.
                $_POST['EMC101'].'
                </td>
                <td>'.convert($_POST['EMC101']).$converted.'</td>
                <td>'.$rating.'</td>
                <td>'.$remarks.'</td>
            </tr>
            <tr>
                <td>GEC001</td>
                <td>'.
                $_POST['GEC001'].'
                </td>
                <td>'.convert($_POST['GEC001']).$converted.'</td>
                <td>'.$rating.'</td>
                <td>'.$remarks.'</td>
            </tr>
            <tr>
                <td>GEC004</td>
                <td>'.
                $_POST['GEC004'].'
                </td>
                <td>'.convert($_POST['GEC004']).$converted.'</td>
                <td>'.$rating.'</td>
                <td>'.$remarks.'</td>
            </tr>
            <tr>
                <td>PE111</td>
                <td>'.
                $_POST['PE111'].'
                </td>
                <td>'.convert($_POST['PE111']).$converted.'</td>
                <td>'.$rating.'</td>
                <td>'.$remarks.'</td>
            </tr>
            <tr>
                <td>NSTP111</td>
                <td>'.
                    $_POST['NSTP111'].'
                </td>
                <td>'.convert($_POST['NSTP111']).$converted.'</td>
                <td>'.$rating.'</td>
                <td>'.$remarks.'</td>
            </tr>
        </table>
        <br>
        <p>GWA: '.round(calculateGWA(),2).'</p>
        <p>Converted GWA: '.$converted.'</p>
        <p>Rating: '.$rating.'</p>
        <p>Remarks: '.$remarks.'</p>
        <p>Note: NSTP are not included in the computation of GWA</p>
        ';
        }
    ?>
</body>
</html>