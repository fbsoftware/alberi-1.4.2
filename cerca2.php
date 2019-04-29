<?php
$dbhost = 'localhost';
$dbuser = 'root';
$dbname = 'my_alberi';
$dbpass = '';
try 
{
$conn = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
} 
catch(PDOException $e) 
{ 
echo $e->getMessage(); 
}
echo $sql ="SELECT * FROM tbl_isc WHERE cognome LIKE :term ";
$term = $_GET['term'] . "%";
$result = $conn->prepare($sql);
$result->bindValue(":term", $term);
$result->execute();
$return_arr = array();
$row_array  = array();

 while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

        $row_array['id'] = $row['id'];
        $row_array['nome'] = $row['nome'];
        $row_array['value'] = $row['cognome']."  ".$row['nome']."  ".$row['numero_iscrizione'];
        $row_array['cognome'] = $row['cognome'];
        $row_array['numero'] = $row['numero_iscrizione'];		
        array_push($return_arr,$row_array);
}
$conn = NULL;
echo json_encode($return_arr);
