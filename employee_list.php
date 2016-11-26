<?php
class database {


    function __construct() {
        $this->connection = new mysqli("192.168.0.63:3306", "vasanth", "SmartWork", "object_db");
    }
	function list_data(){
		
	
$query = "SELECT * FROM employee_details";
$result = mysqli_query($this->connection,$query);
?>
<table>
    <?php
    while ($row = mysqli_fetch_array($result)) {
        ?>
        <tr>
             
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['age']; ?></td>
            <td><?php echo $row['gender']; ?></td>
            <td><?php echo $row['hobbies']; ?></td>
            <td><?php echo $row['designation']; ?></td>
            <td><?php echo $row['salary']; ?></td>
            <td><img src="<?php echo $row['image']; ?>" style = "width:200px; height:200px" ></img></td>
            <td>
                <a href="#" onclick ="update('<?php echo $row['id']; ?>')">Edit </a></td>
            <td>
                <a href="#" onclick ="delete_row('<?php echo $row['id']; ?>')">delete </a></td>
        </tr>
        <?php
    }
    ?>

</table>

<?php
	}
}
$object = new database();
$object->list_data();
?>