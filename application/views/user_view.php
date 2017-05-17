<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	  <title>User View</title>
	  <!--link the bootstrap css file-->
	  <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
	  
	  <style type="text/css">
      body{
        margin: 5% 10%;
      }
  	  .colbox {
  	    margin-left: 0px;
  	    margin-right: 0px;
  	  }
      table {
      font-family: arial, sans-serif;
      border-collapse: collapse;
      width: 100%;
      }

      td, th {
          border: 1px solid #dddddd;
          text-align: left;
          padding: 8px;
      }

      tr:nth-child(even) {
          background-color: #dddddd;
      }
	  </style>
	</head>
	<body>
    <h2>Welcome, <?php echo $name?></h2>
    <button type="button" onclick="window.location.replace('edit_user')">Edit Profile</button>
    <button type="button" onclick="window.location.replace('logout')">Logout</button>
	    <h4>
        Username: <?php echo $username ?>
      </h4>
      <h4>
        Birthday: <?php echo $birthday ?>
      </h4>
      <h4>
        Address: <?php echo $address ?>
      </h4>
      <h3>Users</h3>
      <table>
        <tr>
          <th>
            Name
          </th>
          <th>
            Birthday
          </th>
          <th>
            Logged in?
          </th>
        </tr>
        <?php 
          foreach($users as $user){
            $name = $user['name'];
            $birthday = $user['birthday'];
            $status = $user['status'];
            echo "<tr>";
            echo "<td>$name</td>";
            echo "<td>$birthday</td>";
            echo "<td>$status</td>";
            echo "</tr>";
          }
        ?>
      </table>
  </body>
</html>