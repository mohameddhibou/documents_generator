<?php
	$fullname = $_POST['fullname'];
	$cin = $_POST['cin'];
	$address = $_POST['address'];
	$ville = $_POST['ville'];
	$date = $_POST['date'];
	$sexe = $_POST['sexe'];

// Database connection
	$conn =new mysqli('localhost','id16202654_farahii','Mohamed@00740902','id16202654_farahistore');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else if (empty($fullname)) {
		header("Location: home.php?error=المرجو ادخال الاسم الكامل");
	    exit();
	}else if (empty($cin)) {
		header("Location: home.php?error=المرجو ادخال  رقم البطاقة الوطنية");
	    exit();
	}else if (empty($address)) {
		header("Location: home.php?error=المرجو ادخال  العنوان");
	    exit();
	}else if (empty($ville)) {
		header("Location: home.php?error=المرجو ادخال  المدينة");
	    exit();
	}else if (empty($date)) {
		header("Location: home.php?error=المرجو ادخال  تاريخ التحرير");
	    exit();
	}else if ($sexe == "homme") {

		$stmt = $conn->prepare("insert into chomage(fullname, cin, address, ville, date, sexe) values(?, ?, ?, ?, ?, ?)");
	$stmt->bind_param("ssssss", $fullname, $cin, $address, $ville, $date ,$sexe);
		$execval = $stmt->execute();
		echo $execval;
		echo '
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
      <p style="text-align: center">'.$fullname.'</p>
      <p style="text-align: center">'.$cin.'</p>
      <form><input type="button" class="ecran" value="تأكيد النسخ" onClick="window.print()"></form>
</body>
</html>';
		$stmt->close();
		$conn->close();
	}else if ($sexe == "femme") {

		$stmt = $conn->prepare("insert into chomage(fullname, cin, address, ville, date, sexe) values(?, ?, ?, ?, ?, ?)");
	$stmt->bind_param("ssssss", $fullname, $cin, $address, $ville, $date, $sexe);
		$execval = $stmt->execute();
		echo $execval;
		echo '
		<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
	<title>CONFIRMATION</title>
  <link rel="stylesheet" type="text/css" href="style3.css">
</head>
<body>
      <h1><u>شهادة عدم العمل</u></h1>
      <p>انا الموقعة أسفله السيدة  '.$fullname.' الحاملة للبطاقة الوطنية رقم   '.$cin.' الساكنة ب  '.$address.'</p><br>
      
      <p>أشهد أنني التزم بكامل الرضا والقبول وبما تصح به الشهادة شرعا وقانونا وأنا في كامل الوعي والإدراك بأنني لا أمارس اية مهنة أو عمل يدر دخلا ماديا سواء بالقطاع العمومي أو الشبه العمومي أو الخاص.</p><br>
      
      <p>كما أتحمل كامل المسؤولية في حالة إثبات عكس ذلك، وإمضائي أسفله يحملني كامل المسؤولية الإدارية والقانونية.</p><br>
      
      <p>حرر ب  '.$ville.' في  : '.$date. '</p><br>
      <p style="text-align: center">إمضاء :</p>
      <p style="text-align: center">'.$fullname.'</p>
      <p style="text-align: center">'.$cin.'</p>
      <form><input type="button" class="ecran" value="تأكيد النسخ" onClick="window.print()"></form>
</body>
</html>';
		$stmt->close();
		$conn->close();
	}
?>