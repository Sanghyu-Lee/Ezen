<? include $_SERVER['DOCUMENT_ROOT']."/include/DBconn.php"?>

<?
// 1. 조회 후 파일삭제
$sno=$_GET['sno'];
$SQL = "SELECT * FROM member where sno='$sno'";
$result = $conn -> query($SQL);
$row = $result -> fetch_assoc();
$img = $row['img'];

if($img != "space.jpg"){
    // 파일삭제함수
    unlink("$docu/img/$img");
}
// 2. 데이터베이스 값 삭제
$SQL = "DELETE FROM member where sno='$sno'";
$conn -> query($SQL);
?>

<script>
    location.href="member_list.php";
    // 쿼리문 실행하고 페이지 넘기기
</script>