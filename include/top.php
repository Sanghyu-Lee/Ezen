<html>
<head>
<title> 정보처리기능사 연습 </title>
<style>
    header{
        background-color:rgb(53, 53, 165);
        text-align:center;
        min-height:80px;
        line-height:80px;
        font-size:25px;
        color:white;
    }
    nav{
        background-color:#7c9bd9;
        height:30px;
        line-height:30px;
        font-size:14px;
    }
    section{
        background-color:#cccccc;
        min-height:550px;
    }
    footer{
        background-color:rgb(53, 53, 165);
        text-align:center;
        height:40px;
        line-height:40px;
        font-size:15px;
        color:white;
    }
    #section1{
        font-size:23px;
        text-align:center;
    }
    #body{
        width:80%;
        margin:auto;
    }

</style>

</head>
<body>
<div id=body>
<header>
(과정평가형 정보처리기능사) 성적조회 프로그램 Ver1.0
</header>

<?
$host = $_SERVER['HTTP_HOST'];
$path = "http://".$host;
$docu = $_SERVER['DOCUMENT_ROOT'];
?>

<nav>
    <!-- 링크로 이동할 때에는 인터넷절대경로 -->
&emsp;<a href="<?=$path?>/jungbo/form.php">성적입력</a>
&emsp;<a href="<?=$path?>/jungbo/list.php">학생목록/수정</a>
&emsp;<a href="<?=$path?>/member/member.php">회원가입</a>
&emsp;<a href="<?=$path?>/member/member_list.php">회원조회</a>
&emsp;<a href="<?=$path?>/join/join_list.php">테이블조인</a>
&emsp;<a href="<?=$path?>/index.php">홈으로</a>
&emsp;<a href="<?=$path?>/school/form.php">학생등록</a>
&emsp;<a href="<?=$path?>/school/form_list.php">학생조회</a>
&emsp;<a href="<?=$path?>/bigdata/list.php">빅데이터</a>
&emsp;<a href="<?=$path?>/bigdata/insert.php">빅데이터생성</a>
</nav>
