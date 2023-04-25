<!--
/**
* CS 4342 Database Management
* @author Instruction team Fall 2021 with contribution from L. Garnica
* @version 2.0
* Description: The purpose of these file is to provide PHP basic elements for an
interface to access a DB.
* Resources: https://getbootstrap.com/docs/4.5/components/alerts/ -- bootstrap
examples
* Modified by: Jose Luis Espinoza Gonzalez
*/
-->
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Team 4 Project</title>

    <!-- Bootstrap CSS library https://getbootstrap.com/ -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <!-- Font Awesome icons https://fontawesome.com/ -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-R8EfBkGVPHX9Ktxvp1iKv0RdOJ6oFnNRw2rz/wvU6ISNlQxKj6Dl90pef/RL5Av5WdMEcmNZ5K5c5Vqzr3rL8A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 16px;
            background-color: #F4F4F4;
            background-repeat: no-repeat;
            background-size: cover;
            background-image: url("https://i.imgur.com/oS6NBVZ.jpeg");
        }

        h1, h2 {
            margin-top: 30px;
            margin-bottom: 20px;
            text-align: center;
            text-transform: uppercase;
            font-weight: bold;
            letter-spacing: 2px;
        }

        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }

        li {
            margin-bottom: 10px;
        }

        a {
            color: #007bff;
            text-decoration: none;
            border-bottom: 1px solid #007bff;
            transition: border-color 0.2s ease-in-out;
        }

        a:hover {
            border-color: #0056b3;
        }

        .btn-icon {
            display: inline-block;
            text-align: center;
            vertical-align: middle;
            padding: 6px 12px;
            border-radius: 4px;
            transition: all 0.2s ease-in-out;
        }

        .btn-icon i {
            font-size: 1.2rem;
            margin-right: 8px;
        }

        .btn-icon:hover {
            transform: translateY(-2px);
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }
        ul li a {
            color: white;
        }
    </style>

</head>

<body>
    <div class="container">
        <h1><i class="fas fa-cubes"></i> Team 4 Project</h1>
        <h2>Subdirectories</h2>
        <ul>
  <li>
    <a href="DB4342_PhP_jlespinozag/" class="btn btn-primary">
      <i class="fas fa-folder"></i> Jlespinozag
    </a>
  </li>
  <li>
    <a href="DB4342_PhP_rcarmoname/" class="btn btn-primary">
      <i class="fas fa-folder"></i> Rcarmoname
    </a>
  </li>
  <li>
    <a href="DB4342_PhP_damares/" class="btn btn-primary">
      <i class="fas fa-folder"></i> Damares
    </a>
  </li>
  <li>
    <a href="DB4342_PhP_javenegas8/" class="btn btn-primary">
      <i class="fas fa-folder"></i> Javenegas8
    </a>
  </li>
  <li>
    <a href="team_4/" class="btn btn-primary">
      <i class="fas fa-folder"></i> Team 4
    </a>
  </li>
</ul>
</div>
<div class="container">
    <h2>Project Menu</h2>
    <ul style="color: white;">
        <li>
            <a href="list_companies.php" class="btn btn-secondary btn-icon">
                <i class="fas fa-list"></i> List All Companies
            </a>
        </li>
        <li>
            <a href="edit_company_form.php" class="btn btn-warning btn-icon">
                <i class="fas fa-edit"></i> Edit a company
            </a>
        </li>
        <li>
            <a href="delete_company_form.php" class="btn btn-danger btn-icon">
                <i class="fas fa-trash"></i> Delete a company
            </a>
        </li>
     </li>
            <a href="licenses.php" class="btn btn-dark btn-icon">
                <i class="fas fa-license"></i> Licenses Registered
            </a>
    </ul>
</div>

<!-- Font Awesome icons https://fontawesome.com/ -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js" integrity="sha512-qajvPq3SkJQ2V0ig/ahmrh71mtCq3dYXQV7H0tFSxNtZIEXe0phbgyM4fn4i/M4v/sSrPKYz8ElEcD50dfS5iQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- Bootstrap JS library https://getbootstrap.com/ -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
    crossorigin="anonymous"></script>