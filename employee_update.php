<?php
class database {


    function __construct() {
        $this->connection = new mysqli("192.168.0.63:3306", "vasanth", "SmartWork", "object_db");
    }
	function update(){
		
	

$id = $_GET['id'];
$name = $_POST['name'];
$email = $_POST['email'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$hobbies = $_POST['hobbies'];
$designation = $_POST['designation'];
$salary = $_POST['salary'];
$image = $_POST['fileToUpload']['name'];
if (['fileToUpload']['name']) {
    $sql = "update employee_details set name='" . $name . "' , email='" . $email . "' , age = '" . $age . "', gender = '" . $gender . "' , hobbies='" . $hobbies . "' , designation = '" . $designation . "', salary = '" . $salary . "', image='" . $_FILES['fileToUpload']['name'] . "' where id='" . $id . "' ";
} else {

    $sql = "update employee_details set name='" . $name . "' , email='" . $email . "' , age = '" . $age . "', gender = '" . $gender . "' , hobbies='" . $hobbies . "' , designation = '" . $designation . "', salary = '" . $salary . "' where id='" . $id . "' ";
}
mysqli_query($this->connection,$sql);

function view() {
    $selectData = mysqli_query($this->connection,"SELECT * FROM employee_details where id = $id");
    echo $selectData;
    ?>
    <table>

        <?php
        while ($row = mysql_fetch_array($selectData)) {
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
                <td><img src="<?php echo $row['image']; ?>"></img></td> 

                <td>
                    <a href="#" onclick ="return update('<?php echo $row['id']; ?>')">Edit </a></td>
                <td>
                    <a href="#" onclick ="return createsuccess('<?php echo $row['id']; ?>')">delete </a></td>
            </tr>



            <?php
        }
        ?>
    </table>
<?php
view();
}
	}
}
$object = new database();
$object->update();
?>
