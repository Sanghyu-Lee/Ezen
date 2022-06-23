<? include $_SERVER['DOCUMENT_ROOT']."/include/top.php"?>
<? include $_SERVER['DOCUMENT_ROOT']."/include/DBconn.php"?>

<?
$sno=$_GET['sno'];
$SQL = "SELECT * FROM member where sno='$sno'";
$result = $conn -> query($SQL);
$row = $result -> fetch_assoc();
?>

<style>
    table{
        width:350px;
        height:400px;
        text-align:center;
    }
    td{
        text-align:center;
    }
</style>

<script>
    function ck1(){
        if(f1.sno.value==""){
        alert("학번을 입력해주세요.");
        f1.sno.focus();
        return false;
        } else {
        alert("회원 정보가 수정되었습니다.")
        }
    }
    function ck2(sno){
        alert("확인 : " + sno);
        location.href="member_del.php?sno=" + sno;
    }

</script>

<section>
<br><br>
<div id=section1>회원 정보 수정</div>
<br>
<div align=center>
<form name=f1 action="member_update.php" onsubmit="return ck1()" method=post enctype="multipart/form-data">
    <!-- form 형식의 형태 -->
    <table border=1>
    <tr><td colspan=2><img src="<?=$path?>/img/<?=$row['img']?>" width=350 height=300></td></tr>
    <tr><td> 학 번 </td><td><input type=text name=sno value="<?=$row['sno']?>"></td></tr>
    <tr><td> 주 소 </td><td><input type=text name=addr value="<?=$row['addr']?>"></td></tr>
    <tr><td> 사 진 </td><td><input type=file name=img value="<?=$row['img']?>">
    </td></tr>
    <tr><td colspan=2 align=center><input type="submit" value="수정하기">
    &emsp;<input type="button" value="삭제하기" onClick="return ck2('<?=$sno?>')"></td></tr>
</table>
</form>
</div>
<br>
</section>

<? include $_SERVER['DOCUMENT_ROOT']."/include/bottom.php"?>