<?php
require_once "./Employee.php";

$employee1 = new Employee();
$employee2 = new Employee();
$employee3 = new Employee();
$employee4 = new Employee();
$employee5 = new Employee();
$employee6 = new Employee();

$employee1->name = "Ahmed";
$employee1->email = "abouzaid@gmail.com";
$employee1->salary = "8000 EG";
$employee1->is_manager = true;
$employee1->address = ['Kafr Elshikh', 'El Rai', 'Egypt'];

$employee2->name = "Hassan";
$employee2->email = "hassan@gmail.com";
$employee2->salary = "7000 EG";
$employee2->is_manager = true;
$employee2->address = ['Sidi Salem', 'El osra', 'Egypt'];

$employee3->name = "Ashour";
$employee3->email = "ashour@gmail.com";
$employee3->salary = "9000 EG";
$employee3->is_manager = false;
$employee3->address = ['Kafr Elshikh', 'El zeraa', 'Egypt'];

$employee4->name = "Abouzaid";
$employee4->email = "abouzaid@gmail.com";
$employee4->salary = "5000 EG";
$employee4->is_manager = true;
$employee4->address = ['Kafr Elshikh', 'Beala', 'Egypt'];

$employee5->name = "Ali";
$employee5->email = "ali@gmail.com";
$employee5->salary = "12000 EG";
$employee5->is_manager = false;
$employee5->address = ['Kafr Elshikh', 'El Ghanaam', 'Egypt'];

$employee6->name = "Abdo";
$employee6->email = "abdo@gmail.com";
$employee6->salary = "10000 EG";
$employee6->is_manager = false;
$employee6->address = ['Kafr Elshikh', 'Fewaa', 'Egypt'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Information</title>
    <!-- Google Fonts for Messiri -->
    <link href="https://fonts.googleapis.com/css2?family=El+Messiri:wght@400;500;700&display=swap" rel="stylesheet">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            font-family: 'El Messiri', sans-serif;
            background-color: #f8f9fa;
        }
        .table-container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #343a40; /* Light black color */
            font-weight: 600;
        }
        .table thead {
            background-color: #343a40; /* Light black color */
            color: #ffffff;
        }
        .table-hover tbody tr:hover {
            background-color: #e9f7fe;
        }
        .table td, .table th {
            vertical-align: middle;
        }
        .table td.salary {
            font-weight: bold;
        }
        .table td .fas {
            margin-right: 8px;
        }
        .text-low {
            color: #28a745;
        }
        .text-high {
            color: #dc3545;
        }
        .manager {
            color: #ffc107;
        }
        .address-cell {
            color: #6c757d;
            font-size: 0.9em;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <div class="table-container">
        <h2 class="text-center mb-4">Employee Information</h2>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Salary</th>
                    <th>Position</th>
                    <th>Address</th>
                </tr>
            </thead>
            <tbody>
                <?php $employees = [$employee1, $employee2, $employee3, $employee4, $employee5, $employee6]?>
                <?php foreach ($employees as $employee): ?>
                <tr>
                    <td><?= $employee->name; ?></td>
                    <td><?= $employee->email; ?></td>
                    <td class="salary text-<?= $employee->checkSalary(); ?>"><?= $employee->salary; ?></td>
                    <td class="<?= $employee->managerTextColor(); ?>">
                        <i class="fas <?= $employee->is_manager ? 'fa-user-tie' : 'fa-user'; ?>"></i>
                        <?= $employee->checkFromManager(); ?>
                    </td>
                    <td class="address-cell"><?= implode(" - ", $employee->address); ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
