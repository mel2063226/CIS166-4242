<!DOCTYPE html>
<!--Mindy Benson-->
<!--2/26/2024-->
<!--CIS166AE Module 6-->

<?php

// This is a sample of a multidimensional array containing customer information.
// Each person is keyed by customer number, then several pieces of information.
$people = [
    '1205' => [
        'name' => 'John Smith',
        'phone' => '555-1121',
        'email' => 'John.Smith@gmail.com',
        'age' => 52,
        'total_purchases' => 2,
        'average_spent' => '55.76'
    ],
    '2500' => [
        'name' => 'Fred Jones',
        'phone' => '555-11141',
        'email' => 'smithy@gmail.com',
        'age' => 49,
        'total_purchases' => 5,
        'average_spent' => '155.24'
    ],
    '8026' => [
        'name' => 'Susan Rademew',
        'phone' => '555-1311',
        'email' => 'deadpool344@gmail.com',
        'age' => 18,
        'total_purchases' => 21,
        'average_spent' => '65.43'
    ],
    '3687' => [
        'name' => 'Joe Larette',
        'phone' => '555-1116',
        'email' => 'yankeesfan536@gmail.com',
        'age' => 35,
        'total_purchases' => 12,
        'average_spent' => '15.24'
    ],
    '1008' => [
        'name' => 'Mary Friedstin',
        'phone' => '555-1911',
        'email' => 'Mary3448@gmail.com',
        'age' => 20,
        'total_purchases' => 9,
        'average_spent' => '33.42'
    ]
];

// Sorting the $people array by customer ID
ksort($people);

// Displaying the table
echo '<table border="1">';

// Displaying table headers
echo '<tr>';
foreach (array_keys(reset($people)) as $key) {
    echo "<th>$key</th>";
}
echo '</tr>';

// Displaying the table rows with customer information
foreach ($people as $person) {
    echo '<tr>';
    foreach ($person as $value) {
        echo "<td>$value</td>";
    }
    echo '</tr>';
}
echo '</table>';

// Displaying a list of customer IDs
echo "<p>List of customer IDs: " . implode(", ", array_keys($people)) . "</p>";

?>

