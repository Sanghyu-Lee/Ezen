<? include "top.php"?>
<style>
    table{
        width:350px;
        height:300px;
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
        alert("회원가입이 완료되었습니다.")
        }
    }

</script>

<section>
<br><br>
<div id=section1>회원가입</div>
<br>
<div align=center>
<form name=f1 action="member_ok.php" onsubmit="return ck1()" method=post enctype="multipart/form-data">
    <!-- form 형식의 형태 -->
<table border=1>
    <tr><td> 학 번 </td><td><input type=text name=sno></td></tr>
    <tr><td> 주 소 </td><td><input type=text name=addr></td></tr>
    <tr><td> 사 진 </td><td><input type=file name=img></td></tr>
    <tr><td colspan=2 align=center><input type="submit" value="회원가입"></td></tr>
</table>
</form>
</div>
<br>
</section>

<? include "bottom.php"?>