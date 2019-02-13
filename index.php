
<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
#form{
background-color:white;
color:#123456;
box-shadow:0px 1px 1px 1px gray;
font-Weight:400;
width:400px;
margin:50px 250px 0 50px;
float:left;
height:100%;
}
table {
		font-family: arial, sans-serif;
		border-collapse: collapse;
		width: 50%;
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
<center><body>  

<?php
include('DatabaseConn.php');

$nameErr = $lastnameErr = $idnumberErr = $cellErr = $provinceErr = $primarylangErr = $secondarylangErr = "";
$firstname = $lastname = $idnumber = $cell = $province = $primarylang = $secondarylang = $cellErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["firstname"])) {
      $firstnameErr = "Name is required";
      $Err = 1;
    } else {
     
      if (!preg_match("/^[a-zA-Z ]*$/",$firstname)) {
        $nameErr = "Only letters and white space allowed"; 
      }else{
        $firstname = test_input($_POST["firstname"]);
      }
    }

    if (empty($_POST["lastname"])) {
      $lastnameErr = "Lastname is required";
       $Err = 1;
    } else {
     
      if (!preg_match("/^[a-zA-Z ]*$/",$lastname)) {
        $lastnameErr = "Only letters and white space allowed"; 
      }else{
        $lastname = test_input($_POST["lastname"]);
      }
    }
    
    if (empty($_POST["idnumber"])) {
      $idnumberErr = "ID number is required";
       $Err = 1;
    } else {
     
      if (!preg_match("/^([0-9]{13}+)$/",$idnumber)) {
        $idnumberErr = "Only numbers allowed"; 
      }else{
        $idnumber = test_input($_POST["idnumber"]);
      }
    }

  if (empty($_POST["cell"])) {
    $cellErr = "Cellphone number is required";
    $Err = 1;
  } else {
    if (!preg_match("/^([0-9]+)$/",$cell)) {
      $cellErr = "Only numbers allowed"; 
    }else{
      $cell = test_input($_POST["cell"]);
    }
  }

  if (empty($_POST["province"])) {
    $provinceErr = "Province is required";
    $Err = 1;
  } else {
    $province = test_input($_POST["province"]);
  }
  if (empty($_POST["primarylang"])) {
    $primarylangErr = "Primary Language is required";
    $Err= 1;
  } else {
    $primarylang = test_input($_POST["primarylang"]);
  }

  if (empty($_POST["secondarylang"])) {
    $secondarylangErr = "Secondary Language is required";
    $Err = 1;
  } else {
    $secondarylang = test_input($_POST["secondarylang"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2>User Data Capture</h2>

<div id="mainform">
<div class="innerdiv">

<form id="form" name="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

<h3>Fill in Your Information!</h3>
<div>
        First Name: <input type="text" id="firstname" name="firstname">
        <br><br>
        Last Name: <input type="text" id="lastname" name="lastname">
        <br><br>
        ID Number: <input type="text" id="idnumber" name="idnumber">
        <br><br>
        Cellphone Number: <input type="text" id="cell" name="cell">
        <br><br>
        Province: <select id="province" name="province">
                  <option value="Western Cape">Western Cape</option> 
                  <option value="Eastern Cape">Eastern Cape</option> 
                  <option value="Northern Cape">Northern Cape</option>
                  <option value="Limpopo">Limpopo</option>
                  <option value="Free State">Free State</option>
                  <option value="Gauteng">Gauteng</option>
                  <option value="North West">North West</option>
                  <option value="Kwazulu Natal">Kwazulu Natal</option>
                  <option value="Mpumalanga">Mpumalanga</option>  
              </select>
        <br><br>
        Primary Langauge: <select id="primarylang" name="primarylang">
                  <option value="English">English</option> 
                  <option value="IsiXhosa">IsiXhosa</option> 
                  <option value="IsiZulu">IsiZulu</option>
                  <option value="Afrikaans">Afrikaans</option>
                  <option value="xiTsonga">xiTsonga</option>
                  <option value="Swati">Swati</option>
                  <option value="Venda">Venda</option>
                  <option value="Tswana">Tswana</option>
                  <option value="Ndebele">Ndebele</option>
                  <option value="Sotho">Sotho</option> 
                  <option value="Northern Sotho">Northern Sotho</option>   
              </select>
        <br><br>
        Secondary Language: <select id="secondarylang" name="secondarylang">
                  <option value="English">English</option> 
                  <option value="IsiXhosa">IsiXhosa</option> 
                  <option value="IsiZulu">IsiZulu</option>
                  <option value="Afrikaans">Afrikaans</option>
                  <option value="xiTsonga">xiTsonga</option>
                  <option value="Swati">Swati</option>
                  <option value="Venda">Venda</option>
                  <option value="Tswana">Tswana</option>
                  <option value="Ndebele">Ndebele</option>
                  <option value="Sotho">Sotho</option> 
                  <option value="Northern Sotho">Northern Sotho</option>   
              </select>
    <br>
    <br>
<input type="submit" name="submit" id="submit"  type="button" value="Submit">

</div>
</form>

</div>

</div>
<?php
if(isset($_POST['submit']))
{
    $sqlselect = "SELECT idnumber FROM userinformation Where idnumber = ".$_POST["idnumber"];
    $result = mysqli_query($conn, $sqlselect);
   
    if($result->num_rows > 0){
      echo "ID Number already exists";
    }
    else{
        $sql = "INSERT INTO userinformation (firstname, lastname, idnumber, cell, province, primarylang, secondarylang )
        VALUES ('".$_POST["firstname"]."','".$_POST["lastname"]."','".$_POST["idnumber"]."','".$_POST["cell"]."','".$_POST["province"]."','".$_POST["primarylang"]."','".$_POST["secondarylang"]."')";

        $result = mysqli_query($conn,$sql);
    }
    
}
?>

<form method="POST" action="index.php">
			<input type="text" name="q" placeholder="query">
			<input type="submit" name="search" value="Search">
    </form>
    <br>
    <br>
  <?php
 

$output = "";
if(isset($_POST['search'])){
	$q = $_POST['q'];
	$query = mysqli_query($conn,"SELECT firstname, lastname, idnumber, province, primarylang FROM userinformation WHERE firstname LIKE '%$q%' || lastname LIKE '%$q%'|| idnumber LIKE '%$q%'|| province LIKE '%$q%'"); 
//Replace table_name with your table name and `thing_to_search` with the column you want to search
	$count = mysqli_num_rows($query);
	if($count == "0"){
		$output = '<h2>No result found!</h2>';
	}else{
		
				echo '<table>
					<tr>
					<th>First Name</th>
					<th>Last Name</th>
					<th>Province</th>
					<th>Primary Language</th>
					<th></th>
					<th></th>
				  </tr>';
          
          
	
					while($row = mysqli_fetch_array($query)){
					$firstname = $row['firstname'];
					$lastname = $row['lastname'];
					$province = $row['province']; 
					$primarylang = $row['primarylang'];
					$idnumber  = $row['idnumber'];
	
					echo '<form method="post" action="/UserDataCapture/tableFunctionality.php"><tr>
					<input type="hidden" name="idnumber" id="idnumber" value='.$idnumber.'>
					<td>'.$firstname.'</td>
					<td>'.$lastname.'</td>  
					<td>'.$province.'</td> 
					<td>'.$primarylang.'</td> 
					<td><input type="submit" name="view" id="view" type="button" value="View"></td>
					<td><input type="submit" name="delete" id="delete" type="button" value="Delete"></td>
					</tr>
					</form>
					';
					
		}
		echo '</table>';
	}
}
		?>

</body>
</html>