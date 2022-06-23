<?
$conn = new mysqli("localhost", "root", "autoset", "korea");
$host = $_SERVER['HTTP_HOST'];
$path = "http://".$host;
$docu = $_SERVER['DOCUMENT_ROOT'];
?>
<?

for($i=0; $i<=20; $i++){


// 난수발생기
$randomName = mt_rand(0, 9);
$randomAge = mt_rand(0, 3);
$randomTitle1 = mt_rand(0, 4);
$randomTitle2 = mt_rand(0, 4);
$randomEtc1 = mt_rand(0, 4);
$randomEtc2 = mt_rand(0, 4);
$randomEtc3 = mt_rand(0, 4);

//배열
$name = array('아이언맨', '캡틴아메리카', '토르', '블랙위도우', '헐크', '호크아이', '스칼렛위치', '스파이더맨', '앤트맨', '워머신');
$age = array('12', '13', '14', '15');
$title1 = array('ASP', 'JSP', 'PHP', 'JAVA', 'C#');
$title2 = array('초급', '중급', '고급', '심화', '실무');
$etc = array('산', '바다', '강', '하늘', '땅');

$name = $name[$randomName];
$age = $age[$randomAge];
$title = $title1[$randomTitle1].", ".$title2[$randomTitle2];
$etc = $etc[$randomEtc1].", ".$etc[$randomEtc2].", ".$etc[$randomEtc3];

$SQL = "INSERT INTO board(name, age, title, etc) values('$name', '$age', '$title', '$etc')";
$conn -> query($SQL);
}
?>
<script>
    location.href="list.php";

</script>