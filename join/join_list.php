<? include $_SERVER['DOCUMENT_ROOT']."/include/top.php"?>
<? include $_SERVER['DOCUMENT_ROOT']."/include/DBconn.php"?>

<?
$ch1 = $_GET['ch1'];
$ch2 = $_GET['ch2'];

    $SQL = "SELECT e.sno, sname, kor, eng, math, img, hist, addr,  kor + eng + math + hist as sum, round((kor + eng + math + hist)/4, 1) as avg FROM examtbl e LEFT OUTER JOIN member m ON e.sno = m.sno";

    if($ch1==""){
        $SQL = $SQL . " order by e.sno asc";
    } 
    else if($ch1=="e.sno"){
        $SQL = $SQL . " where e.sno like '%$ch2%' order by e.sno asc";
    } 
    else if($ch1=="sname"){
        $SQL = $SQL . " where sname like '%$ch2%' order bye. sno asc";
    } 
    else if($ch1=="kor"){
        $SQL = $SQL . " where kor like '%$ch2%' order by e.sno asc";
    }
$result = $conn -> query($SQL);
?>

<style>
    table{
        width:700px;
        font-size:12px;
    }
    td{
        height:30px;
        text-align:center;
    }

</style>
<section>
<br>
<div id=section1>학생 성적 조회</div>
<br>
<div align=center>
<table border=1>
    <tr style="font-size:15px;">
        <td>사진</td>
        <td>학번</td>
        <td>이름</td>
        <td width=200>주소</td>
        <td>국어</td>
        <td>영어</td>
        <td>수학</td>
        <td>역사</td>
        <td>합계</td>
        <td>평균</td>
        <td>평점</td>
    </tr>
    
    <?
    $i=0;
    $img=0;
    // 실행한 쿼리문으로 DB값출력 while문
    while($row = $result -> fetch_assoc()){
 
    $i = $i + 1;

    if($row['avg']>=90){
        $grd="A";
    } else if($row['avg']>=80){
        $grd="B";
    } else if($row['avg']>=70){
        $grd="C";
    } else {$grd="F";}
    
    $s_kor = $s_kor + $row['kor'];
    $s_eng = $s_eng + $row['eng'];
    $s_math = $s_math + $row['math'];
    $s_hist = $s_hist + $row['hist'];
    $s_sum = $s_sum + $row['sum'];
    $s_avg = $s_avg + $row['avg'];

    if($row['img'] == ""){
        $img = "space.jpg";
    } else {
        $img = $row['img'];
    }
    ?>
    <tr>
        <td><img src="<?=$path?>/img/<?=$img?>" width=30 height=40></td>
        <td><a href="<?=$path?>/member/member.php?sno=<?=$row['sno']?>"><?=$row['sno']?></a></td>
        <td><a href="<?=$path?>/jungbo/edit.php?sno=<?=$row['sno']?>&ch1=<?=$ch1?>&ch2=<?=$ch2?>"><?=$row['sname']?></a></td>
        <td><?=$row['addr']?></td>
        <td><?=$row['kor']?></td>
        <td><?=$row['eng']?></td>
        <td><?=$row['math']?></td>
        <td><?=$row['hist']?></td>
        <td><?=$row['sum']?></td>
        <td><?=$row['avg']?></td>
        <td><?=$grd?></td>
    </tr>
    <?}?>
    <tr>
        <td colspan=4>총점</td>
        <td><?=$s_kor?></td>
        <td><?=$s_eng?></td>
        <td><?=$s_math?></td>
        <td><?=$s_hist?></td>
        <td><?=$s_sum?></td>
        <td><?=$s_avg?></td>
        <td></td>
    </tr>
    <tr>
        <td colspan=4>평균(<?=$i?>명)</td>
        <td><?=round($s_kor/$i, 1)?></td>
        <td><?=round($s_eng/$i, 1)?></td>
        <td><?=round($s_math/$i, 1)?></td>
        <td><?=round($s_hist/$i, 1)?></td>
        <td><?=round($s_sum/$i, 1)?></td>
        <td><?=round($s_avg/$i, 1)?></td>
        <td></td>
    </tr>
</table>
<br>
<form>
<select name=ch1>
    <option value="sno">학번</option>
    <option value="sname">이름</option>
    <option value="kor">국어점수</option>
</select>
<input type="text" name="ch2">
<input type="submit" value="검색">
</form>
</div>
<br>
</section>

<? include $_SERVER['DOCUMENT_ROOT']."/include/bottom.php"?>