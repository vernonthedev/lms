<?php
require_once 'class.php';
$db = new db_class();

$borrower_id = $_GET['borrower_id'];
$history = $db->display_borrower_history($borrower_id);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Borrower History</title>
</head>
<body>
    <h1>Borrower History</h1>
    <table border="1">
        <thead>
            <tr>
                <th>Loan Ref No</th>
                <th>Loan Amount</th>
                <th>Payment Date</th>
                <th>Payment Amount</th>
                <th>Penalty</th>
                <th>Overdue</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $history->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['ref_no']; ?></td>
                <td><?php echo $row['loan_amount']; ?></td>
                <td><?php echo $row['payment_date']; ?></td>
                <td><?php echo $row['pay_amount']; ?></td>
                <td><?php echo $row['penalty']; ?></td>
                <td><?php echo $row['overdue'] ? 'Yes' : 'No'; ?></td>
                <td><?php echo $row['status']; ?></td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>
