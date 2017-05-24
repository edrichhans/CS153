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
    <button type="button" onclick="window.location.replace('create_user')">Create User</button>
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
            Address
          </th>
          <th>
            Logged in?
          </th>
          <th>
            Super?
          </th>
          <th>
          </th>
          <th>
          </th>
          <th>
          </th>
          <th>
          </th>
        </tr>
        <?php 
          foreach($users as $user){
            $name = $user['name'];
            $birthday = $user['birthday'];
            $status = $user['status'];
            $super = $user['super'];
            $address = $user['address'];
            $id = $user['id'];
            echo "<tr>";
            echo "<td>$name</td>";
            echo "<td>$birthday</td>";
            echo "<td>$address</td>";
            echo "<td>$status</td>";
            echo "<td>$super</td>";
            echo "<td><input type='button' value='Edit' onclick='window.location.replace(\"edit_other_user?id=" . $id . "\")'></td>";
            echo "<td><input type='button' value='Delete' onclick='window.location.replace(\"delete_other_user?id=" . $id . "\")'></td>";
            echo "<td><input type='button' value='SUPER' onclick='window.location.replace(\"super_other_user?id=" . $id . "\")'></td>";
            echo "<td><input type='button' value='UN-SUPER' onclick='window.location.replace(\"unsuper_other_user?id=" . $id . "\")'></td>";
            echo "</tr>";
          }
        ?>
      </table>
  </body>
</html>