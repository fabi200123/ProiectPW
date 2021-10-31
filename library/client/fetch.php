<?php
include('db.php');
include('function.php');
$query = '';
$output = array();
$query .= "SELECT * FROM jocuri ";
if(isset($_POST["search"]["value"]))
{
 $query .= 'WHERE nume LIKE "%'.$_POST["search"]["value"].'%" ';
}
if(isset($_POST["order"]))
{
 $query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
 $query .= 'ORDER BY id DESC ';
}
if($_POST["length"] != -1)
{
 $query .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}
$statement = $connection->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$data = array();
$filtered_rows = $statement->rowCount();
foreach($result as $row)
{
 $sub_array = array();
 $sub_array[] = $row["nume"];
 $sub_array[] = $row["pret"];
 $sub_array[] = $row["producator"];
 $sub_array[] = $row["varsta"];
 $sub_array[] = $row["platforma"];
 $sub_array[] = '<button type="button" name="request" id="'.$row["id"].'" class="btn btn-warning btn-xs request">Request</button>';
 $data[] = $sub_array;
}
$output = array(
 "draw"    => intval($_POST["draw"]),
 "recordsTotal"  =>  $filtered_rows,
 "recordsFiltered" => get_total_all_records(),
 "data"    => $data
);
echo json_encode($output);
?>