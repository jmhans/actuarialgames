<?php 

// This is just an example of reading server side data and sending it to the client.
// It reads a json formatted text file and outputs it.


 $dataType = $_GET['data_type'];


$string = file_get_contents('../data/' . $dataType . 'data.json');
echo $string;

// Instead you can query your database and parse into JSON etc etc

?>