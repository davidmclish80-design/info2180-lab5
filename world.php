<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", 
$username, $password);

$search = $_GET["country"] ?? "";

// $conn->query("SELECT * FROM countries");
if($search){
  $stmt = $conn -> prepare("select * from countries where name like :search");
  $stmt -> execute([
    "search" => "%$search%"
  ]);
}
else {
  $stmt = $conn->query("select * from countries");
}


$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<?php
  function sendQueryResult($array){
?>
    <table>
      <thead>
        <tr>
          <th>Country Name</th> <th>Continent</th> <th>Independence Year</th> <th>Head of State</th>
        </tr>
      </thead>
      <tbody>
        
<?php foreach($array as $row): ?>
    <tr>
      <td><?=$row["name"]?></td>
      <td><?=$row["continent"]?></td>
      <td><?=$row["independence_year"]?></td>
      <td><?=$row["head_of_state"]?></td>   
    </tr>
<?php endforeach; ?>
    </tbody>
  </table>
<?php } 
  sendQueryResult($results);
?>



