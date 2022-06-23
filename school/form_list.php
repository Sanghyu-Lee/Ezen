<? include $_SERVER['DOCUMENT_ROOT']."/include/top.php"?>
<? include $_SERVER['DOCUMENT_ROOT']."/include/DBconn.php"?>

<?
$ch1 = $_GET['ch1'];
$ch2 = $_GET['ch2'];

$SQL = "SELECT * FROM school";
    if($ch1==""){
        $SQL = $SQL . " order by idx asc";
    } 
    else if($ch1=="idx"){
        $SQL = $SQL . " where idx like '%$ch2%' order by idx asc";
    } 
    else if($ch1=="name"){
        $SQL = $SQL . " where name like '%$ch2%' order by name asc";
    } 

    $result = $conn -> query($SQL);
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
<script>


</script>


<section>
<br>
<div id=section1>학생목록조회</div>
<br>
<div align=center>
<table border=1>
    <tr>
        <td>순번</td>
        <td>이름</td>
        <td>파일명</td>
        <td>사진</td>
    </tr>
    
    <?
    while($row = $result -> fetch_assoc()){
    ?>
    <tr>
        <td><?=$row['idx']?></td>
        <td><?=$row['name']?></td>
        <td><?=$row['file']?></td>
        <td><a href="form_delete.php?idx=<?=$row['idx']?>"><img src="./files/<?=$row['file']?>" width=50 height=70></a></td>
    </tr>
    <?}?>
</table>
<br>
<form>
<select name=ch1>
    <option value="idx">순번</option>
    <option value="name">이름</option>
</select>
<input type="text" name="ch2">
<input type="submit" value="검색">
</form>
</div>
<br>
</section>

<? include $_SERVER['DOCUMENT_ROOT']."/include/bottom.php"?>