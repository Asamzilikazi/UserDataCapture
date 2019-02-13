<?php
include_once('DatabaseConn.php');
 if (isset($_POST['delete'])){
$sql = "DELETE FROM userinformation WHERE idnumber = ".$_POST["idnumber"];

if (mysqli_query($conn, $sql)) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}


header("Location: index.php");
}
if(isset($_POST['view'])){
    $sql1 = "SELECT * FROM userinformation WHERE idnumber = ".$_POST["idnumber"];

    $result = $conn->query($sql1);

if ($result->num_rows > 0) {
    
    while($row = $result->fetch_assoc()) {
        
        echo "<div ><b> Your personal details</b></div></br>";
        echo '<table >
                        <tr>
                        <td>First Name</td>
                        <td>'. $row["firstname"].'</td>.
                         </tr>
                        <tr>
                        <td>Last Name</td>
                        <td>'. $row["lastname"].'</td>.
                        </tr><tr>
                        <td>ID Number</td>
                        <td>'. $row["idnumber"].'</td>.
                        </tr><tr>
                        <td>Cellphone Number</td>
                        <td>'. $row["cell"].'</td>.
                        </tr><tr>
                        <td>Province</td>
                        <td>'. $row["province"].'</td>.
                        </tr><tr>
                        <td>Primary Language</td>
                        <td>'. $row["primarylang"].'</td>.
                        </tr><tr>
                        <td>Secondary Language</td>
                        <td>'. $row["secondarylang"].'</td>.
                        </tr>
                  </table>';

        echo  "<br><button onclick=\"location.href='index.php'\">Back to Home</button> </div>";
                  

       
        
    }
} else {
    echo "0 results";
}
}

mysqli_close($conn);
?>