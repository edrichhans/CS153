<html>
<head>
  <title>Create User</title>
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
</body>
	<h2>Create User</h2>
  <button type="button" onclick="window.location.replace('/')">Dashboard</button>
  <?php echo form_open(base_url( 'admin/create_user' ));?>
	  Name: <input type='text' name='name'></html></br>
	  Address: <input type='text' name='address'></br>
	  Birthday: <input type='text' name='birthday'></br>
	  Username: <input type='text' name='username'></br>
	  Password: <input type='password' name='password'></br>
	  <input type='submit' value='submit'>
  <?php echo form_close();?>
</body>
</html>