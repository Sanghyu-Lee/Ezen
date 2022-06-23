<? include $_SERVER['DOCUMENT_ROOT']."/include/DBconn.php"?>

<?
    $sno = $_POST['sno'];
    $addr = $_POST['addr'];
    $nfile = $_FILES['img']['name'];
    $tmp = $_FILES['img']['tmp_name'];
    $SQL = "SELECT * FROM member where sno='$sno'";
    $result = $conn -> query($SQL);
    $row = $result -> fetch_assoc();
    $img = $row['img'];

    // 1. 신규파일이 존재하면
    if($nfile != ""){
        // 1-1. 존재하던 파일이 space.jpg이면
        if($img=="space.jpg"){
            if(file_exists("$docu/img/$nfile")){
                $f_fname = basename($nfile, strrchr($nfile, '.'));
                $time = date("His", time());
                $ext = strrchr($nfile, '.');
                $nfile = $f_fname."_".$time.$ext;
                move_uploaded_file($tmp, "$docu/img/$nfile");
                $SQL = "UPDATE member SET addr='$addr', img='$nfile' where sno='$sno'";
            } else {
                move_uploaded_file($tmp, "$docu/img/$nfile");
                $SQL = "UPDATE member SET addr='$addr', img='$nfile' where sno='$sno'";
            }
        } else {
        // 1-2. 존재하던 파일이 space.jpg가 아니면 삭제
            unlink("$docu/img/$img");
            if(file_exists("$docu/img/$nfile")){
                $f_fname = basename($nfile, strrchr($nfile, '.'));
                $time = date("His", time());
                $ext = strrchr($nfile, '.');
                $nfile = $f_fname."_".$time.$ext;
                move_uploaded_file($tmp, "$docu/img/$nfile");
                $SQL = "UPDATE member SET addr='$addr', img='$nfile' where sno='$sno'";
            } else {
                move_uploaded_file($tmp, "$docu/img/$nfile");
                $SQL = "UPDATE member SET addr='$addr', img='$nfile' where sno='$sno'";
            }
        }

        // 3. 새로운 파일이 존재하지 않으면 SQL 쿼리문 실행
    } else {
        $SQL = "UPDATE member SET addr='$addr', img='$img' where sno='$sno';";
    }
    $conn -> query($SQL);
?>

<script>
    location.href="member_list.php";
    // 쿼리문 실행하고 페이지 넘기기
</script>
