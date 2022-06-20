<? include "top.php"?>
<? include "DBconn.php"?>

<?

    $SQL = "SELECT * FROM member";
    $result = $conn -> query($SQL);
?>

<style>
    table{
        width:500px;
    }
    td{
        height:30px;
        text-align:center;
    }

</style>
<section>
<br>
<div id=section1>회원 조회</div>
<br>
<div align=center>
<table border=1>
    <tr>
        <td>학번</td>
        <td>주소</td>
        <td>사진</td>
    </tr>
    
    <?
    $i=0;
    // 실행한 쿼리문으로 DB값출력 while문
    while($row = $result -> fetch_assoc()){
 

    ?>
    <tr>
        <td><?=$row['sno']?></td>
        <td><?=$row['addr']?></td>
        <td><img src=./img/<?=$row['img']?> width=50 height=50></td>
    </tr>
    <?}?>
</table>
<br>
</div>
<br>
</section>

<? include "bottom.php"?>