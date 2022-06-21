<? include "top.php"?>
<? include "DBconn.php"?>

<?
/* MySQL select문 상위 7개만 나타내는 구문 
   $SQL = "SELECT * FROM member order by sno asc limit 0, 7"; */
    $SQL = "SELECT * FROM member order by sno asc";
    $result = $conn -> query($SQL);

    $C_SQL = "SELECT COUNT(*) as \"CT\" FROM member";
    $C_result = $conn -> query($C_SQL);
    $count = $C_result -> fetch_assoc();
?>

<style>
    table{
        width:600px;
    }
    td{
        height:50px;
        text-align:center;
    }

</style>
<section>
<br>
<div id=section1>회원목록(<?=$count['CT']?>명)</div>
<br>
<div align=center>
<table border=1>
    <tr>
        <td>학번</td>
        <td>주소</td>
        <td>파일명</td>
        <td>사진</td>
    </tr>
    
    <?
    $i=0;
    // 실행한 쿼리문으로 DB값출력 while문
    while($row = $result -> fetch_assoc()){
    ?>
    <tr>
        <td><?=$row['sno']?></td>
        <td><a href="member_edit.php?sno=<?=$row['sno']?>"><?=$row['addr']?></a></td>
        <td><?=$row['img']?></td>
        <td><img src="./img/<?=$row['img']?>" width=50 height=70></td>
    </tr>
    <?}?>
</table>
<br>
</div>
<br>
</section>

<? include "bottom.php"?>