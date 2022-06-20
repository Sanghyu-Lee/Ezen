<? include "DBconn.php"?>

<?
    $sno=$_REQUEST['sno'];
    $addr=$_REQUEST['addr'];
    // 파일을 받아올 때 쓰는 구문
    $mfile = $_FILES['img']['name'];
    $tmp = $_FILES['img']['tmp_name'];

    if($mfile==""){
        $mfile='space.jpg';
    } else {
        if(file_exists("./img/$mfile")){
            // 확장자 앞 이름만 가져옴
            $f_fname = basename($mfile, strrchr($mfile, "."));
            // 난수 날짜
            $randomNum = date("HIS",time());
            $fileinfo = pathinfo($mfile);
            $ext = $fileinfo['extension'];
            $mfile = $f_fname."_".$randomNum.".".$ext;
            move_uploaded_file($tmp, "./img/$mfile");
        } else {
            move_uploaded_file($tmp, "./img/$mfile");

        }
    }

    move_uploaded_file($tmp, "./img/$mfile");

    $SQL = "INSERT INTO member(sno, addr, img)
            VALUES('$sno', '$addr', '$mfile')";

    $conn -> query($SQL);
?>

<script>
    location.href="list.php";
    // 쿼리문 실행하고 페이지 넘기기
</script>