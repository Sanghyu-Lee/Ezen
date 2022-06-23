<? include $_SERVER['DOCUMENT_ROOT']."/include/top.php"?>
<style>
    table{
        width:500px;
        height:200px;
    }
    .td1{
        text-align:center;
    }
</style>

<script>
    function ck1(){
        if(f1.name.value==""){
        alert("이름을 입력해주세요.");
        f1.name.focus();
        return false;
        } else {
        alert("입력되었습니다.")
        }
    }
</script>

<section>
<br><br>
<div id=section1>학생정보수집</div>
<br>
<div align=center>
<form name=f1 action="form_ok.php" method="post" enctype="multipart/form-data" onsubmit="return ck1()">
    <table border=1>
        <tr><td width=100  class="td1">이름</td><td><input type="text" name="name"></td></tr>
        <tr><td class="td1">특이사항</td>
        <td><textarea cols="40" rows="5" name="etc"></textarea>
        <tr><td class="td1">사진</td><td><input type="file" name="file"></td></tr>
        </td></tr>
        <tr><td colspan=2 class="td1"><input type="submit" value="저장하기"></td></tr>
    </table>
</fome>
</div>
<br>
</section>

<? include $_SERVER['DOCUMENT_ROOT']."/include/bottom.php"?>