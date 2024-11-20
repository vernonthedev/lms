<?php
// Database connection parameters
$host = "localhost"; // Change if your database host is different
$username = "root"; // Your database username
$password = ""; // Your database password
$database = "db_lms"; // Your database name

// Establish database connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to create the borrower_history table
$sql = "
CREATE TABLE IF NOT EXISTS `borrower_history` (
    `history_id` INT AUTO_INCREMENT PRIMARY KEY,
    `borrower_id` INT NOT NULL,
    `loan_id` INT NOT NULL,
    `loan_amount` DECIMAL(10,2) NOT NULL,
    `payment_date` DATETIME NOT NULL,
    `pay_amount` DECIMAL(10,2) NOT NULL,
    `penalty` DECIMAL(10,2) DEFAULT 0,
    `overdue` TINYINT(1) DEFAULT 0,
    `status` VARCHAR(50),
    FOREIGN KEY (`borrower_id`) REFERENCES `borrower`(`borrower_id`) ON DELETE CASCADE,
    FOREIGN KEY (`loan_id`) REFERENCES `loan`(`loan_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
";

// Execute the SQL query
if ($conn->query($sql) === TRUE) {
    echo "Table `borrower_history` created successfully!";
} else {
    echo "Error creating table: " . $conn->error;
}

// Close the database connection
$conn->close();
?>
