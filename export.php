<?php  
/*$fullname = $_POST['fullname'];
  $cin = $_POST['cin'];
  $address = $_POST['address'];
  $ville = $_POST['ville'];
  $date = $_POST['date'];
//export.php  
$connect = mysqli_connect('localhost','root','','farahistore');
$output = '';
if(isset($_POST["export"]))
{
 $query = "SELECT * FROM chomage";
 $result = mysqli_query($connect, $query);
   $output .= '
    <!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <title>CONFIRMATION</title>
  <link rel="stylesheet" type="text/css" href="style3.css">
</head>
<body>
      <h1><u>شهادة عدم العمل</u></h1>
      <p>انا الموقع أسفله السيد  '.$fullname.' الحامل للبطاقة الوطنية رقم   '.$cin.' الساكن ب  '.$address.'</p><br>
      
      <p>أشهد أنني التزم بكامل الرضا والقبول وبما تصح به الشهادة شرعا وقانونا وأنا في كامل الوعي والإدراك بأنني لا أمارس اية مهنة أو عمل يدر دخلا ماديا سواء بالقطاع العمومي أو الشبه العمومي أو الخاص.</p><br>
      
      <p>كما أتحمل كامل المسؤولية في حالة إثبات عكس ذلك، وإمضائي أسفله يحملني كامل المسؤولية الإدارية والقانونية.</p><br>
      
      <p>حرر ب  '.$ville.' في  : '.$date. '</p><br>
      <p style="text-align: center">إمضاء :</p>
      <p style="text-align: center">...................</p>
</body>
</html>';
  }
  echo $output;
  $filename = "شهادة عدم العمل.pdf";

header("Content-Length: " . filesize($filename));
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename=شهادة عدم العمل.pdf');

readfile($filename);*/
  
?>