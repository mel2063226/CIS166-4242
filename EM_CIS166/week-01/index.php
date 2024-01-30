ExampleGet your own PHP Server
<!DOCTYPE html>
<html>
<body>

<?php 
echo "<h1> Module 2 Assignment" //An page heading (H1)
echo "Mindy Benson" //Using 'echo' or 'print' display your name
//Display the following dates (one per line)
echo "Today is " . date("Y/m/d") . "<br>"; //Todays date
echo "The time is " . date("h:i:sa") . "<br>"; //Current time
echo "In one week it will be " . date('Y/m/d h:i:s', strtotime('+7 days', time())) . "<br>"; //The date/time one week in future
$date1 = strtotime('2023/1/1'); //How many days since 1/1/2023
$date2 = strtotime('2024/1/29');
$diff = $date2 - $date1;
$days = floor($diff / (60 * 60 * 24));
echo $days;

//How many weeks until this spring's graduation. 
function week_between_two_dates($date1, $date2)
{
    $first = DateTime::createFromFormat('Y/m/d', $date1);
    $second = DateTime::createFromFormat('Y/m/d', $date2);
    if($date1 > $date2) return week_between_two_dates($date2, $date1);
    return floor($first->diff($second)->days/7);
}

$dt1 = '2024/1/29';
$dt2 = '2024/5/10';
echo 'There are '. week_between_two_dates($dt1, $dt2). " weeks between now ($dt1) and spring's graduation ($dt2).<br>";
?>
</body>
</html>

