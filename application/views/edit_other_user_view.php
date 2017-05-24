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
    <h2>Edit page for <?php echo $username; ?></h2>
    <button type="button" onclick="window.location.replace('/')">Dashboard</button>
    <!-- <form action='admin/update_other_user' method='post'> -->
    <?php echo form_open(base_url( 'admin/update_other_user' ));?>
      <input type='hidden' name='username' value=<?php echo "\"{$username}\"" ?>>
      Name: <input type='text' name='name' value=<?php echo "\"{$name}\"" ?> >
      Address: <input type='text' name='address' value=<?php echo "\"{$address}\""; ?> >
      Birthday: <input type='text' name='birthday' value=<?php echo "\"{$birthday}\""; ?> >
      <input type='submit' value='submit'>
    <?php echo form_close();?>
  </body>
</html>