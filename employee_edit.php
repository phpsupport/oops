
<?php




$id = $_GET['id'];

$selectData = mysqli_query($this->connection,"SELECT * FROM employee_details where id = $id");
$selectData = mysqli_fetch_array($this->connection,$selectData);
echo json_encode($selectData);

?>
