
<html>
    <head><title>form</title></head>
    <body bgcolor="skyblue">

        <form name="employee" action="" onsubmit="return validateForm()" enctype="multipart/form-data"  method="POST" id ="form1">

<table>

           <tr><td>

            <tr><b><td>Name</td></b>       	<td>	    :    </td> 		<td><input type="text" name="name" id="name" value="<?php //echo $name ?>" placeholder="Name" maxlength = "20"></td></tr>
            <tr><b style ="padding-left: 9px;"><td>Email</td></b>         	 <td>   :</td>       	<td><input type="text" name="email" id="email" value="<?php //echo $email ?>" placeholder="Email" maxlength = "20"></td></tr>
            <tr><b style ="padding-left: 9px;"><td>Age</td></b>          		<td>: </td>     	   <td><input type="text" name="age" id="age" value="<?php //echo $age ?>" placeholder="Age" maxlength = "2"></td></tr>
            <tr><b style ="padding-left: 9px;"><td>Gender</td></b>        	    <td>:  </td>     	<td><input type="radio" name="gender" value="male" id="radio">Male
														   <input type="radio" name="gender" value="female" id="radio1">Female</td></tr>
															
            <tr><b style ="padding-left: 9px;"><td>Hobbies</td></b>      		<td>: </td><td><input type="checkbox" name="hobbies1" value="singing" id="checkbox"value="">singing
														    <input type="checkbox" name="hobbies2" value="Dancing" id="checkbox1">Dancing
														    <input type="checkbox" name="hobbies3" value="Read novels" id="checkbox2"value="">Read novels</td></tr>
            <tr><b style ="padding-left: 9px;"><td>Desig</td></b>           	   <td> : </td>         <td> <input type="text" name="designation" id="designation"value="<?php //echo $designation ?>" placeholder="Designation"maxlength = "10"></td></tr>
            <tr><b style ="padding-left: 9px;"><td>Salary</td></b>       	   <td> :  </td>    		<td><input type="text" name="salary" id="salary" value="<?php //echo $salary ?>" placeholder="Salary" maxlength = "6"></td></tr>
            <tr><b style ="padding-left: 9px;"><td>Image</td></b>         	   <td> :   </td>    	<td><input type="file" name="fileToUpload" id="fileToUpload" value="<?php //echo $fileToUpload ?>"></td></tr>
            
           <div id="createSuccess"></div><tr><td><input type ="submit" name="submit" value="insert" >
           <input type="reset" value="Reset" tabindex="13"/></td></tr></td></tr>
</table>
        </form>
		
            <div>
            <input type="submit" value="search" onclick =" return search()" name="search"> 
            <input type ="submit" onclick="edit()"name =" return update" value = "update" > 
			<input type="button" value="NameAscending" onclick=" return nameascending()">
            <input type="button" value="NameDescending" onclick=" return namedescending()">
			<input type="button" value="EmailAscending" onclick=" return emailascending()">
            <input type="button" value="EmailDescending" onclick=" return emaildescending()">
            <div id ="search1"></div>
            </div>
			
			
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
        <script type="text/javascript">
            var rowid = ''
			 $(document).ready(function () {
			 var salary = $("#salary").val();
			 var age = $("#age").val();
			  $('#salary').keyup(function () {
                    var d = $(this).attr('numeric');
                    var val = $(this).val();
                    var orignalValue = val;
                    val = val.replace(/[0-9]*/g, "");
                    if (val != '') {
                        orignalValue = orignalValue.replace(/([^0-9].*)/g, "")
                        $(this).val(orignalValue);

                    }
                });
				$('#age').keyup(function () {
                    var d = $(this).attr('numeric');
                    var val = $(this).val();
                    var orignalValue = val;
                    val = val.replace(/[0-9]*/g, "");
                    if (val != '') {
                        orignalValue = orignalValue.replace(/([^0-9].*)/g, "")
                        $(this).val(orignalValue);

                    }
                });
			 
		 });
            function validateForm()
            {
				var name = document.forms["employee"]["name"].value;
				if (name == null || name == "") {
					alert("Please Enter the Name...!!!!!");
					employee.name.focus();
					return false;
				}
                 var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
				if (employee.email.value == "" || employee.email.value == null)
                    {
                        alert("Please Enter the valid Email Address....!!!!");
                        employee.email.focus();
                        return false;
                    }
                    else if (!employee.email.value.match(mailformat))
                    {
                        alert("You have entered an invalid email address.....!!!!!");
                        employee.email.focus();
                        return false;
                    }
		
                var age = /^[1-9]?[0-9]{1}$|^100$/;
               if(employee.age.value == "" || employee.age.value == null)
					{
					alert("Please Enter Your Age");
					employee.age.focus();
					return false;
					}
					else if(!employee.age.value.match(age))  
					
					{
					alert("Age must have Two numbers only.....!!!!");
					employee.age.focus();	
					return false;  
					} 

                var gender = document.querySelectorAll('input[name="gender"]:checked');
                if (!gender.length) {
                    alert('You must select male or female.....!!!!');
					
                    return false;
                }
                    var count = 0;
                    {
                        if (document.getElementById('checkbox').checked)
                        {
                            count++;
                            //alert('box1 is checked');
                        }
                        else
                        {
                            //alert('the box1 is not checked');
                        }
                        if (document.getElementById('checkbox1').checked)
                        {
                            count++;
                            //alert('the box2 is checked');
                        }
                        else
                        {
                            //alert('the box2 is not checked');
                        }

                        if (document.getElementById('checkbox2').checked)
                        {
                            count++;
                            //alert('the box3 is checked');
                        }
                        else
                        {
                            //alert('the box3 is not checked');
                        }
                       
                        if (count < 2)
                        {
                            alert("select minimum 2 boxes");
                            return false;
                        }
                        else
                        {
                            //alert(count);

                        }
                    }

                var designation = /^[A-Za-z]+$/;
				if(employee.designation.value == "" || employee.designation.value == null)
					{
					alert("Please Enter Your Designation....!!!!!");
					employee.designation.focus();
					return false;
					}
					else if(!employee.designation.value.match(designation))  
					
					{
					alert("Designation must have alphabet characters only....!!!!!");
					employee.designation.focus();	
					return false;  
					} 

                var salary = /^\d{1,6}(?:\.\d{0,2})?$/;
                if(employee.salary.value == "" || employee.salary.value == null)
					{
					alert("Please Enter Your salary.....!!!!!");
					employee.salary.focus();
					return false;
					}
					else if(!employee.salary.value.match(salary))  
					
					{
					alert("Salary must have 6 numbers only.......!!!!!");
					employee.salary.focus();	
					return false;  
					} 
				var file = document.getElementById("fileToUpload").value;
                if(file == 0 || file == "")
                {
                    alert("Please choose the file.....!!!!!");
                    return false;
                }
			
                sendFunction();
                return false;
                 
            }
            function sendFunction() {
                var xmlhttpCreate;
                xmlhttpCreate = new XMLHttpRequest();
                xmlhttpCreate.onreadystatechange = function () {
                    if (xmlhttpCreate.readyState == 4) {
						list();
                        document.getElementById("createSuccess").innerHTML = xmlhttpCreate.responseText;
                    }
                }

                var name = document.getElementById('name').value;
                var email = document.getElementById('email').value;
                var age = document.getElementById('age').value;
                var gender = document.getElementById('radio').value;
                //var hobbies = document.getElementById('checkbox').value;
				 
                //if (document.getElementById('radio').checked) {
					//document.getElementById('radio').checked
                    //var gender = 'male';
                //} else if (document.getElementById('radio1').checked) {
					//document.getElementById('radio1').checked
                    //var gender = 'female';
                //}


                //if (document.getElementById('checkbox').checked) {
					//document.getElementById('checkbox').checked = true;
                    //var hobbies = 'Singing';

              // } 
				//else if (document.getElementById('checkbox1').checked) {

				//document.getElementById('checkbox1').checked = true;		
                   // var hobbies = 'Dancing';

               // }
               // if (document.getElementById('checkbox2').checked) {
					//document.getElementById('checkbox2').checked = true;
                  //  hobbies = 'Read novels';
               // }



                var designation = document.getElementById('designation').value;
                var salary = document.getElementById('salary').value;
                //var image = document.getElementById('fileToUpload').value;
				  //var x = document.getElementById("myimg").src;
                  //document.getElementById("demo").innerHTML = x;

                var formData = new FormData(document.getElementById('form1'));
                xmlhttpCreate.open("POST", "insert.php", true);
                

                xmlhttpCreate.send(formData);
                  

            }
            list();
            function search()
            {
                var xmlhttpCreate;
                xmlhttpCreate = new XMLHttpRequest();
                xmlhttpCreate.onreadystatechange = function () {
                    if (xmlhttpCreate.readyState == 4) {
						//list();
                        document.getElementById("search1").innerHTML = xmlhttpCreate.responseText;
                    }
                }
                var name = document.getElementById('name').value;
                var email = document.getElementById('email').value;
                var age = document.getElementById('age').value;
                //var gender = document.getElementById('radio').value;
                //var gender = document.getElementById('radio1').value;
                //var hobbies = document.getElementById('checkbox').value;
                //var hobbies = document.getElementById('checkbox1').value;
                //var hobbies = document.getElementById('checkbox2').value;
				
				
                //if (document.getElementById('radio').checked) {
                    //var gender = 'male';
                //} else if (document.getElementById('radio1').checked) {
                   // var gender = 'female';
                //}
                //if (document.getElementById('checkbox').checked) {
                   // hobbies += 'Singing';
					//document.getElementById('checkbox').checked = true;
                //}

                //else if (document.getElementById('checkbox1').checked) {
                    //hobbies += 'Dancing';
					//document.getElementById('checkbox1').checked = true;
				
                //}
                //else{
					 //hobbies += 'Read novels';
					
				//}

                var designation = document.getElementById('designation').value;
                var salary = document.getElementById('salary').value;
				//var image = document.getElementById('fileToUpload').value;

                var formData = new FormData(document.getElementById('form1'));
                xmlhttpCreate.open("POST", "search.php", true);
               
                xmlhttpCreate.send(formData);
			

            }

            function update(id)
            {

                rowid = id;
                var xmlhttpCreate;
                xmlhttpCreate = new XMLHttpRequest();
                xmlhttpCreate.onreadystatechange = function () {
                    if (xmlhttpCreate.readyState == 4) {
						list();
                        var response = xmlhttpCreate.responseText;
                        var obj = JSON.parse(response);
                        //console.log(obj);
                         
                        document.getElementById("name").value = obj.name;
                        document.getElementById("email").value = obj.email;
                        document.getElementById("age").value = obj.age;
                        //document.getElementById("radio").value = obj.gender;
                        //document.getElementById("radio1").value = obj.gender;
                        //document.getElementById("checkbox").value = obj.hobbies;
                        //document.getElementById("checkbox1").value = obj.hobbies;
                        //document.getElementById("checkbox2").value = obj.hobbies;
						//var hobbies = document.getElemnetById("checkbox").value = obj.hobbies;
						var hobbies;
						if(document.getElementById("radio").value == obj.gender){
							document.getElementById("radio").checked=true;
							//alert("ghjf");
						}
						else{
							document.getElementById("radio1").checked=true;
							//alert("shgasahjgd");
						} 
						
						for(var i = 0; i < obj.hobbies.length; i++)
						{
							if(document.getElementById("checkbox").value == obj.hobbies[i]){
								document.getElementById("checkbox").checked=true;
								//alert();
							}
							else if(document.getElementById("checkbox1").value == obj.hobbies[i]){
								document.getElementById("checkbox1").checked=true;
							}
							else{
								document.getElementById("checkbox2").checked=true;
							}
						}
						
						/*
						if(document.getElementById("checkbox").value == obj.hobbies)
						{
							document.getElementById("checkbox").checked=true;
							//alert(123);
						}
						else if(document.getElementById("checkbox1").value == obj.hobbies){
							document.getElementById("checkbox1").checked=true;
							//alert(1234);
						}
						else{
							document.getElementById("checkbox2").checked=true;
							//alert(12345);
						}
						*/
						//if(document.getElementById("checkbox").value == obj.hobbies)
						//{
							//document.getElementById("checkbox").checked=true;
						//}
						//else if(document.getElementById("checkbox1").value == obj.hobbies){
							//document.getElementById("checkbox1").checked=true;
						//}
						//else{
							//document.getElementById("checkbox2").checked=true;
						//}
                        document.getElementById("designation").value = obj.designation;
                        document.getElementById("salary").value = obj.salary;
					    //document.getElementById('fileToUpload').value = obj.fileToUpload;
                    }
                }


                var queryString = "id=" + id;
                xmlhttpCreate.open("GET", "edit.php?" + queryString, true);
                xmlhttpCreate.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xmlhttpCreate.send();

            }
            function edit()
            {

                var xmlhttpCreate;
                xmlhttpCreate = new XMLHttpRequest();
                xmlhttpCreate.onreadystatechange = function () {

                    if (xmlhttpCreate.readyState == 4) {
                        list();
                        
                    }
                }
                var queryString = "id=" + rowid;
                var formData = new FormData(document.getElementById('form1'));
                xmlhttpCreate.open("POST", "update.php?" + queryString, true);
                xmlhttpCreate.send(formData);
            }


            function delete_row(id)
            {
      
                var xmlhttpCreate;
                xmlhttpCreate = new XMLHttpRequest();
                xmlhttpCreate.onreadystatechange = function () {
                    if (xmlhttpCreate.readyState == 4) {
                      list();
					                 
						
				}
				
                }
				if (confirm('Are you sure you want to delete this item!')){	
                var queryString = "id=" + id;
                xmlhttpCreate.open("GET", "delete.php?" + queryString, true);
                //xmlhttpCreate.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xmlhttpCreate.send();
				
            }
			}
          
            function list()
            {
                var xmlhttpCreate;
                xmlhttpCreate = new XMLHttpRequest();
                xmlhttpCreate.onreadystatechange = function () {

                    if (xmlhttpCreate.readyState == 4) {

                        document.getElementById("search1").innerHTML = xmlhttpCreate.responseText;

            



                    }


                }
                
                xmlhttpCreate.open("POST", "list.php", true);
                xmlhttpCreate.send();
            }
            function nameascending()
            {
                var xmlhttpCreate;
                xmlhttpCreate = new XMLHttpRequest();
                xmlhttpCreate.onreadystatechange = function () {

                    if (xmlhttpCreate.readyState == 4) {
                             
                        document.getElementById("search1").innerHTML = xmlhttpCreate.responseText;
                        
            



                    }


                }
                
                xmlhttpCreate.open("POST", "order.php", true);
                xmlhttpCreate.send();
            }
			function namedescending()
            {
                var xmlhttpCreate;
                xmlhttpCreate = new XMLHttpRequest();
                xmlhttpCreate.onreadystatechange = function () {

                    if (xmlhttpCreate.readyState == 4) {
                         list();
                        document.getElementById("search1").innerHTML = xmlhttpCreate.responseText;
                        
            



                    }


                }
                
                xmlhttpCreate.open("POST", "namedesc.php", true);
                xmlhttpCreate.send();
            }
			
			
			
			
			
			
			function emailascending()
            {
                var xmlhttpCreate;
                xmlhttpCreate = new XMLHttpRequest();
                xmlhttpCreate.onreadystatechange = function () {

                    if (xmlhttpCreate.readyState == 4) {
                             
                        document.getElementById("search1").innerHTML = xmlhttpCreate.responseText;
                        
            



                    }


                }
                
                xmlhttpCreate.open("POST", "emailasc.php", true);
                xmlhttpCreate.send();
            }
			function emaildescending()
            {
                var xmlhttpCreate;
                xmlhttpCreate = new XMLHttpRequest();
                xmlhttpCreate.onreadystatechange = function () {

                    if (xmlhttpCreate.readyState == 4) {
                         list();
                        document.getElementById("search1").innerHTML = xmlhttpCreate.responseText;
                        
            



                    }


                }
                
                xmlhttpCreate.open("POST", "emaildesc.php", true);
                xmlhttpCreate.send();
            }


        </script>

        <?php
       // mysql_close($conn);
        ?>
    </body>
</html>
