<? include "DBconn.php"?>

<?
    $ch1=$_GET['ch1'];
    $ch2=$_GET['ch2'];

    $sno=$_GET['sno'];

    $SQL = "DELETE FROM examtbl where sno='$sno'";

    $conn -> query($SQL);
?>

<script>
    location.href="list.php?ch1=<?=$ch1?>&ch2=<?=$ch2?>";
    // 쿼리문 실행하고 페이지 넘기기
</script>