
<html>
    <head><title>mani</title></head>
	 
    <body>
        <?php
        

       

        $name = mysqli_real_escape_string($_POST['name']);
        $email = $_POST['email'];
        $age = $_POST['age'];
        $gender = $_POST['gender'];
		
		// to concatenation to hobbies values
        $hobbies = '';
		
        $designation = $_POST['designation'];
        $salary = $_POST['salary'];
		
        if (isset($_POST['hobbies1'])) {
        $hobbies .= $_POST['hobbies1'] . ',';
          }
		if (isset($_POST['hobbies2'])) {
        $hobbies .= $_POST['hobbies2'] . ',';
          }
	    if (isset($_POST['hobbies3'])) {
        $hobbies .= $_POST['hobbies3'] . ',';
         }
		
		
		
		
        $select = "select * from employee_details where email='$email'";

        $search = mysqli_query($this->connection,$select);
        $row = mysqli_affected_rows();

        if ($row > 0) {
            echo "email already exist";
        } else {


           
            $query = "INSERT INTO employee_details (name,email,age,gender,hobbies,designation,image,salary) VALUES ('" . $name . "','" . $email . "','" . $age . "','" . $gender . "','" . $hobbies . "','" . $designation . "','" . $_FILES['fileToUpload']['name'] . "','" . $salary . "')";
            mysqli_query($this->connection,$query);
            //echo $query;
        }

        if (isset($_FILES['fileToUpload']['error']) && $_FILES['fileToUpload']['error'] == UPLOAD_ERR_OK) {
            
            $tmp_name = $_FILES["fileToUpload"]["tmp_name"];
            $name = $_FILES["fileToUpload"]["name"];
            move_uploaded_file($tmp_name, "$name");
        }

        function view() {
            $selectData = mysqli_query($this->connection,"SELECT * FROM employee_details where id = $id");
            //echo $selectData;
            ?>
            <table>

                <?php
                while ($row = mysqli_fetch_array($selectData)) {
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
                        <td><img src="<?php echo $row['image']; ?>" style = "width:200px; height:200px" id ="myimg"></img><p id="demo"></p></td> 

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

        view();
		
        ?>
        
    </body>
</html>
