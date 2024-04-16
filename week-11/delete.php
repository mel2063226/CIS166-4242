<?php
  // Mindy Benson
  // 4/15/2024
  // CIS166AE Module 12

// Function to delete record
function deleteRecord($conn, $id) {
    $id = mysqli_real_escape_string($conn, $id);
    $query = "DELETE FROM user WHERE id = '$id'";
    if (mysqli_query($conn, $query)) {
        return true; // Record deleted successfully
    } else {
        return false; // Error deleting record
    }
}

// Check if ID is provided in query string
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Check if delete button is clicked
    if (isset($_POST['delete'])) {
        // Delete the record
        if (deleteRecord($conn, $id)) {
            echo "Record deleted successfully.";
            exit; // Exit to prevent further execution
        } else {
            echo "Error deleting record.";
        }
    }}

    ?>