<? include "DBconn.php"?>

<?
    $ch1=$_GET['ch1'];
    $ch2=$_GET['ch2'];

    $sno=$_GET['sno'];
    $sname=$_GET['sname'];
    $kor=$_GET['kor'];
    $eng=$_GET['eng'];
    $math=$_GET['math'];
    $hist=$_GET['hist'];

    $SQL = "INSERT INTO examtbl(sno, sname, kor, eng, math, hist)
            VALUES('$sno', '$sname', '$kor', '$eng', '$math', '$hist')";

    $conn -> query($SQL);
?>

<script>
    location.href="list.php?ch1=<?$ch1?>&%ch2=<?$ch2?>";
    // 쿼리문 실행하고 페이지 넘기기
</script>