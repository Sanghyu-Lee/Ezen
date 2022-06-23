<!-- 데이터베이스 연동 -->
<!-- 변수명=new mysqli($servername, $username, $password, $dbname) -->
<?

$conn = new mysqli("localhost", "root", "autoset", "korea");
$host = $_SERVER['HTTP_HOST'];
$path = "http://".$host;
$docu = $_SERVER['DOCUMENT_ROOT'];
?>
