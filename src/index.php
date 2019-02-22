<?php
    // sudo chmod 4755 /bin/ping 

    require './URL.php';
    require './URL1.php';
    use App\URL;
    use App\URL1;

    $originalString = 'This string will be sluggified';
    $expectedResult = 'this-string-will-be-sluggified';

    $url = new URL();
    $url1 = new URL1();
    $result = $url->sluggify($originalString);
    $result = $url1->sluggify($originalString);

    echo ($result);
    echo ($result1);
?>
<br>
<?php
$servername = "172.17.0.1:3300";
$username = "root";
$password = "root";
$dbname = "data";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM mytable";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Name: " . $row["name"]. "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>