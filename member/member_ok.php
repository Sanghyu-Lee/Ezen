<? include $_SERVER['DOCUMENT_ROOT']."/include/DBconn.php"?>
<?
    $sno = $_POST['sno'];
    $addr = $_POST['postcode']." ". $_POST['roadAddress']. " ".$_POST['detailAddress'] . $_POST['extraAddress'];
    $mfile = $_FILES['img']['name']; // 파일명
    $tmp = $_FILES['img']['tmp_name'];

    if($mfile ==""){
        $mfile = "space.jpg";
    } else {
        if(file_exists("$docu/img/$mfile")){
            // basename : 파일명 추출 / strrchr : 마지막 .이하를 리턴
            $f_fname = basename($mfile, strrchr($mfile, '.'));
            // 시간(시분초)
            $time = date("His", time());
            // 확장자
            $ext = strrchr($mfile, '.');
            $mfile = $f_fname."_".$time.$ext;
            move_uploaded_file($tmp, "$docu/img/$mfile");
        } else {
            // 업로드된 파일을 새 위치로 옮기는 함수
            move_uploaded_file($tmp, "$docu/img/$mfile");
        }
    }
    
$SQL = "INSERT INTO member(sno, addr, img) VALUES('$sno', '$addr', '$mfile')";

$conn -> query($SQL);

?>

<script>
    location.href="member_list.php";
    // 쿼리문 실행하고 페이지 넘기기
</script>