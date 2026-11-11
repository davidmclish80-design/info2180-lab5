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
<ul>
<?php foreach ($results as $row): ?>
  
  <li><?= $row['name'] . ' is ruled by ' . $row['head_of_state']; ?></li>
<?php endforeach; ?>
</ul>

