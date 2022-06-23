<? include $_SERVER['DOCUMENT_ROOT']."/include/DBconn.php"?>

<?
$idx = $_GET['idx'];

$SQL = "SELECT * FROM school where idx='$idx'";
$result = $conn -> query($SQL);
$row = $result -> fetch_assoc();
$file = $row['file'];

    if($img != "space.jpg"){
        unlink("./files/$file");
    }

$SQL = "DELETE FROM school where idx='$idx'";
$conn -> query($SQL);

?>
<script>
    location.href="form_list.php";
</script>





