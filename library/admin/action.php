<?php  
//action.php
$connect = mysqli_connect('localhost', 'root', '', 'magazin');

$input = filter_input_array(INPUT_POST);

$pret = mysqli_real_escape_string($connect, $input["pret"]);
$producator = mysqli_real_escape_string($connect, $input["producator"]);
$varsta = mysqli_real_escape_string($connect, $input["varsta"]);
$platforma = mysqli_real_escape_string($connect, $input["platforma"]);

if($input["action"] === 'edit')
{
 $query = "
 UPDATE jocuri 
 SET pret = '".$pret."', 
 producator = '".$producator."', 
 varsta = '".$varsta."', 
 platforma = '".$platforma."', 
 WHERE nume = '".$input["nume"]."'
 ";

 mysqli_query($connect, $query);

}
if($input["action"] === 'delete')
{
 $query = "
 DELETE FROM jocuri 
 WHERE nume = '".$input["nume"]."'
 ";
 mysqli_query($connect, $query);
}

echo json_encode($input);

?>