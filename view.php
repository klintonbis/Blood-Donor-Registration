<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donor Information</title>
    <link rel="stylesheet" href="stylesview.css">
    
       
</head>
<body>
    <div class="header">
        <h1>Registered Donor Information</h1>
    </div>
    <div class="container">
        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>NID</th>
                        <th>Date of Birth</th>
                        <th>Email</th>
                        <th>Contact</th>
                        <th>Address</th>
                        <th>Blood Type</th>
                        <th>Height</th>
                        <th>Weight</th>
                        <th>Donated Before</th>
                        <th>Allergy</th>
                        <th>Disease</th>
                        <th>Anemia</th>
                        <th>Cardiac</th>
                        <th>Medication</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Database configuration
                    $servername = "localhost";
                    $username = "root"; // Use your database username
                    $password = ""; // Use your database password
                    $dbname = "lab6"; // Use your database name

                    // Create connection
                    $conn = new mysqli($servername, $username, $password, $dbname);

                    // Check connection
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    // Fetch data
                    $sql = "SELECT * FROM patient";
                    $result = $conn->query($sql);

                    // Check if there are any results
                    if ($result->num_rows > 0) {
                        // Output data for each row
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['nid']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['dob']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['contact']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['address']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['blood_type']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['height']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['weight']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['donated_before']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['allergy_details']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['disease_history']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['has_anemia']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['cardiac_patient']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['under_medication']) . "</td>";
                            
     // Assuming you are fetching the donor data from the database
// Example: $donor = fetchDonorFromDatabase($id); 

// Display donor details, checking if the keys exist before accessing them





                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='15'>No records found</td></tr>";
                    }

                    // Close connection
                    $conn->close();
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
