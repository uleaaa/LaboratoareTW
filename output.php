<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DB output</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body style="margin: 50px;">
    <h1>List of Candidats</h1>
    <br>
    <table class="table">
        <thead>
			<tr>
				<th>ID</th>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Email</th>
				<th>Phone</th>
				<th>City</th>
                <th>Profession</th>
				<th>Education title</th>
                <th>Graduation date</th>
                <th>Education type</th>
                <th>Job name</th>
                <th>Start date</th>
                <th>End date</th>
                <th>Location</th>
                <th>Company name</th>
			</tr>
		</thead>

        <tbody>
            <?php
            $servername = "localhost";
			$username = "root";
			$password = "";
			$database = "lab5";

			// Create connection
			$connection = new mysqli($servername, $username, $password, $database);

            // Check connection
			if ($connection->connect_error) {
				die("Connection failed: " . $connection->connect_error);
			}

            // read all row from database table
			$sql = "SELECT * FROM registration";
			$result = $connection->query($sql);

            if (!$result) {
				die("Invalid query: " . $connection->error);
			}

            // read data of each row
			while($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>" . $row["id"] . "</td>
                    <td>" . $row["firstname"] . "</td>
                    <td>" . $row["lastname"] . "</td>
                    <td>" . $row["email"] . "</td>
                    <td>" . $row["phonenumber"] . "</td>
                    <td>" . $row["city"] . "</td>
                    <td>" . $row["profession"] . "</td>
                    <td>" . $row["edutitle"] . "</td>
                    <td>" . $row["graduation"] . "</td>
                    <td>" . $row["edutype"] . "</td>
                    <td>" . $row["jobname"] . "</td>
                    <td>" . $row["startdate"] . "</td>
                    <td>" . $row["enddate"] . "</td>
                    <td>" . $row["location"] . "</td>
                    <td>" . $row["company"] . "</td>
                    <td>
                        <a class='btn btn-primary btn-sm' href='update'>Update</a>
                        <a class='btn btn-danger btn-sm' href='delete'>Delete</a>
                    </td>
                </tr>";
            }

            $connection->close();
            ?>
        </tbody>
    </table>
</body>
</html>
