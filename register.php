<?php
// MySQL connection credentials
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "lab6"; 

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and escape form data, checking if keys exist
    $name = $conn->real_escape_string($_POST['name'] ?? '');
    $nid = $conn->real_escape_string($_POST['nid'] ?? '');
    $dob = $conn->real_escape_string($_POST['dob'] ?? '');
    $email = $conn->real_escape_string($_POST['email'] ?? '');
    $contact = $conn->real_escape_string($_POST['contact'] ?? '');
    $address = $conn->real_escape_string($_POST['address'] ?? '');
    $blood_type = $conn->real_escape_string($_POST['blood_type'] ?? '');
    $height = $conn->real_escape_string($_POST['height'] ?? '');
    $weight = $conn->real_escape_string($_POST['weight'] ?? '');
    
    // Convert checkbox values to 'Yes' or 'No'
    $donated_before = isset($_POST['donated_before']) ? 'Yes' : 'No';
    $allergy = $conn->real_escape_string($_POST['allergy'] ?? '');
    $disease = $conn->real_escape_string($_POST['disease'] ?? '');
    $anemia = isset($_POST['anemia']) ? 'Yes' : 'No';
    $cardiac = isset($_POST['cardiac']) ? 'Yes' : 'No';
    $medication = isset($_POST['medication']) ? 'Yes' : 'No';

    // Prepare SQL statement
    $sql = "INSERT INTO patient (name, nid, dob, email, contact, address, blood_type, height, weight, 
            donated_before, allergy_details, disease_history, has_anemia, cardiac_patient, under_medication)
            VALUES ('$name', '$nid', '$dob', '$email', '$contact', '$address', '$blood_type', '$height', 
            '$weight', '$donated_before', '$allergy', '$disease', '$anemia', '$cardiac', '$medication')";

    // Execute SQL query
    if ($conn->query($sql) === TRUE) {
        // Redirect to view.php after successful insertion
        header("Location: view.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close();
?>
