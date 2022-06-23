<? include $_SERVER['DOCUMENT_ROOT']."/include/top.php"?>
<? include $_SERVER['DOCUMENT_ROOT']."/include/DBconn.php"?>

<?
if($_GET['idx'] == ""){
    $idx = 0;
} else {
    $idx = $_GET['idx'];
}

$sql_tc = "SELECT count(*) tc from board";
$result_tc = $conn -> query($sql_tc);
$row_tc = $result_tc -> fetch_assoc();

$SQL = "SELECT * FROM board limit $idx, 10";
$result = $conn -> query($SQL);

$total_page = ceil($row_tc['tc'] / 10);
$now_page = ($idx / 10) + 1;
$end_page = ($total_page - 1) * 10
?>

<style>
    table{
        width:600px;
    }
    td{
        text-align:center;
    }
</style>
<script>

</script>

<section>
<br>
<div id=section1>빅데이터조회</div>
<br>
<div align=center>
    전체 레코드 수 : <?=$row_tc['tc']?>  페이지수 : <?=$total_page?>  현재 페이지 : <?=$now_page?>
<table border=1>
    <tr>
        <td>순번</td>
        <td>이름</td>
        <td>나이</td>
        <td>과목</td>
        <td>설명</td>
    </tr>
<?
    while($row = $result -> fetch_assoc()){
?>
    <tr>
        <td><?=$row['idx']?></td>
        <td><?=$row['name']?></td>
        <td><?=$row['age']?></td>
        <td><?=$row['title']?></td>
        <td><?=$row['etc']?></td>
    </tr>
    <?}?>
</table>
<a href="list.php?idx=0"> 처음</a>

<?
if($idx == 0){
    echo "이전";
} else {?>
    <a href="list.php?idx=<?=$idx-10?>">이전</a>
<?}
if($now_page == $total_page){
    echo "다음";
} else {?>
    <a href="list.php?idx=<?=$idx+10?>">다음</a>
<?}?>
<a href="list.php?idx=<?=$end_page?>">마지막</a>
<br>
</div>
</section>

<? include $_SERVER['DOCUMENT_ROOT']."/include/bottom.php"?>