<?php
#--- passing parameters ---#
$pgsqldbconfig = require_once 'pgsqldbconfig.php';
$table=$pgsqldbconfig['table'];
$datatable=$pgsqldbconfig['datatable'];
//----------------------------------------//
$col1 = $pgsqldbconfig['tab1col1'];
$col2 = $pgsqldbconfig['tab1col2'];
$col3 = $pgsqldbconfig['tab1col3'];
$col4 = $pgsqldbconfig['tab1col4'];
$col5 = $pgsqldbconfig['tab1col5'];
$col6 = $pgsqldbconfig['tab1col6'];
$col7 = $pgsqldbconfig['tab1col7'];
$col8 = $pgsqldbconfig['tab1col8'];
#$col9 = $pgsqldbconfig['tab1col9'];

$datcol1 = $pgsqldbconfig['datatabcol1'];
$datcol2 = $pgsqldbconfig['datatabcol2'];
$datcol3 = $pgsqldbconfig['datatabcol3'];
# //----------------------------------------// #
$dsn = "pgsql:host={$pgsqldbconfig['host']}; port={$pgsqldbconfig['port']}; dbname={$pgsqldbconfig['dbname']}";
$attributes = [
	PDO::ATTR_EMULATE_PREPARES   => false,							//turn off emulation mode for "real" prepared statements
	PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,			//turn on errors in the form of exceptions
	PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,				//make the default fetch be an associative array
];

try{
	$pdo = new PDO($dsn, $pgsqldbconfig['user'], $pgsqldbconfig['pass'], $attributes);
	if($pdo){
		echo "Connected to the ''{$pgsqldbconfig['dbname']}''<br>";
	}
}catch (PDOExcetion $e){
	#echo $e->getMessage();;
	error_log($e->getMessage());
	
	$pdo->query('SELECT pg_terminate_backend(pg_backend_pid());');
	$pdo = null;
	echo "get out";
	
	exit('Database error');
}

/*
#$staticDefault=DEFAULT;
$itemid='9Fe5z';
$datatrackid=00000000;
$city='Rzeszów';
$cena=1300;
$field=38.5;
$rooms=2;
$url='127.0.0.1/info.php';

$stmt = $pdo->prepare('INSERT INTO chomik (item_id, data_track_id, city, cena, powierzchnia, rooms, url)VALUES(:itemid,:datatrackid,:city,:cena,:powierzchnia,:rooms,:url)');
$stmt->bindParam(':itemid', $itemid);
$stmt->bindParam(':datatrackid', $datatrackid);
$stmt->bindParam(':city', $city);
$stmt->bindParam(':cena', $cena);
$stmt->bindParam(':powierzchnia', $field);
$stmt->bindParam(':rooms', $rooms);
$stmt->bindParam(':url', $url);
$stmt->execute();
echo "dodalem cos";
    $stmt->bindParam(':itemid', $dataids[$i]);
    $stmt->bindParam(':datatrackid', $datasids[$i]);
    $stmt->bindParam(':city', $citisies[$i]);
    $stmt->bindParam(':cena', $cenowka[$i]);
    $stmt->bindParam(':powierzchnia', $fielded[$i]);
    $stmt->bindParam(':rooms', $roomsed[$i]);
    $stmt->bindParam(':url', $linkeds[$i]);
    $stmt->execute();
*/
?>