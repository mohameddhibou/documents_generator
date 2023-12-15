<?php
	$fullname = $_POST['fullname'];
	$date_n = $_POST['date_n'];
	$cin = $_POST['cin'];
	$address = $_POST['address'];
	$fullname1 = $_POST['fullname1'];
	$date_n1 = $_POST['date_n1'];
	$sexe1 = $_POST['sexe1'];
	$fullname2 = $_POST['fullname2'];
	$date_n2 = $_POST['date_n2'];
	$sexe2 = $_POST['sexe2'];
	$fullname3 = $_POST['fullname3'];
	$date_n3 = $_POST['date_n3'];
	$sexe3 = $_POST['sexe3'];
	$date = $_POST['date'];
	$sexe = $_POST['sexe'];

// Database connection
	$conn =new mysqli('localhost','id16202654_farahii','Mohamed@00740902','id16202654_farahistore');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else if (empty($sexe)) {
		header("Location: home2.php?error=المرجو ادخال  الجنس");
	    exit();
	} else if (empty($fullname)) {
		header("Location: home2.php?error=المرجو ادخال الاسم الكامل");
	    exit();
	}else if (empty($date_n)) {
		header("Location: home2.php?error=المرجو ادخال  تاريخ الازدياد");
	    exit();
	}else if (empty($cin)) {
		header("Location: home2.php?error=المرجو ادخال  رقم البطاقة الوطنية");
	    exit();
	}else if (empty($address)) {
		header("Location: home2.php?error=المرجو ادخال  العنوان");
	    exit();
	}else if (empty($fullname1)) {
		header("Location: home2.php?error=المرجو ادخال الاسم الكامل");
	    exit();
	}else if (empty($date_n1)) {
		header("Location: home2.php?error=المرجو ادخال  تاريخ الازدياد");
	    exit();
	}else if (empty($sexe1)) {
		header("Location: home2.php?error=المرجو ادخال  الجنس");
	    exit();
	}else if (empty($date)) {
		header("Location: home2.php?error=المرجو ادخال  تاريخ التحرير");
	    exit();
	}

	/* 1 child female and mother */
	else if ($sexe == "femme" && $sexe1 == "femme" && empty($fullname2) && empty($date_n2) && empty($fullname3) && empty($date_n3)) {

		$stmt = $conn->prepare("insert into prise_en_charge(fullname,date_n,cin,address,fullname1,date_n1,sexe1,fullname2,date_n2,sexe2,fullname3,date_n3,sexe3,date,sexe) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
	$stmt->bind_param("sssssssssssssss", $fullname,$date_n,$cin,$address,$fullname1,$date_n1,$sexe1,$fullname2,$date_n2,$sexe2,$fullname3,$date_n3,$sexe3,$date,$sexe);
		$execval = $stmt->execute();
		echo $execval;
		echo '<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
	<title>CONFIRMATION</title>
  <link rel="stylesheet" type="text/css" href="style3.css">
</head>
<body>
      <h1><u>إلتزام بتحمل المسؤولية</u></h1>
      <p><u>أنا الموقعة أسفله:</u></p><br>
      <p>السيدة '.$fullname.'، المزدادة بتاريخ: '.$date_n.'، الحاملة لبطاقة التعريف الوطنية رقم:'.$cin.' ، والساكنة: '.$address.'</p>
      <p>أشهد على نفسي وبكل مؤهلاتي الصحية والعقلية ومقومات التمييز والإدراك أنني الكفيلة بتحمل جميع مسؤولية شؤون ومصاريف ابني  '.$fullname1.'، المزداد بتاريخ: '.$date_n1.'، وبجميع نفقات عيشه من مأكل، مشرب، تطبيب، علاج، عناية، دراسة،... وكل ما يتعلق به، وأتحمل أي مسؤولية مخالفة لهذا التصريح.</p><br>
      <p>أمضيت هذا التصريح قصد الإدلاء به عند الاقتضاء والحاجة.</p>
      <p>حرر في: '.$date.'.</p>
      <p  style="text-align: center;">إمضاء:</p>
      <p style="text-align: center;">'.$fullname.'</p>
      <p style="text-align: center;">'.$cin.'</p>
      <form><input type="button" class="ecran" value="تأكيد النسخ" onClick="window.print()"></form>
</body>
';
		$stmt->close();
		$conn->close();
	}
	/* 1 child male and mother */
	else if ($sexe == "femme" && $sexe1 == "homme" && empty($fullname2) && empty($date_n2) && empty($fullname3) && empty($date_n3)) {

		$stmt = $conn->prepare("insert into prise_en_charge(fullname,date_n,cin,address,fullname1,date_n1,sexe1,fullname2,date_n2,sexe2,fullname3,date_n3,sexe3,date,sexe) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
	$stmt->bind_param("sssssssssssssss", $fullname,$date_n,$cin,$address,$fullname1,$date_n1,$sexe1,$fullname2,$date_n2,$sexe2,$fullname3,$date_n3,$sexe3,$date,$sexe);
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
      <h1><u>إلتزام بتحمل المسؤولية</u></h1>
      <p><u>أنا الموقعة أسفله:</u></p><br>
      <p>السيدة '.$fullname.'، المزدادة بتاريخ: '.$date_n.'، الحاملة لبطاقة التعريف الوطنية رقم:'.$cin.' ، والساكنة: '.$address.'</p>
      <p>أشهد على نفسي وبكل مؤهلاتي الصحية والعقلية ومقومات التمييز والإدراك أنني الكفيلة بتحمل جميع مسؤولية شؤون ومصاريف ابني  '.$fullname1.'، المزداد بتاريخ: '.$date_n1.'، وبجميع نفقات عيشه من مأكل، مشرب، تطبيب، علاج، عناية، دراسة،... وكل ما يتعلق به، وأتحمل أي مسؤولية مخالفة لهذا التصريح.</p><br>
      <p>أمضيت هذا التصريح قصد الإدلاء به عند الاقتضاء والحاجة.</p>
      <p>حرر في: '.$date.'.</p>
      <p  style="text-align: center;">إمضاء:</p>
      <p style="text-align: center;">'.$fullname.'</p>
      <p style="text-align: center;">'.$cin.'</p>
      <form><input type="button" class="ecran" value="تأكيد النسخ" onClick="window.print()"></form>
</body>
</html>
';
		$stmt->close();
		$conn->close();
	}
	/* 1 child male and father */
	else if ($sexe == "homme" && $sexe1 == "homme" && empty($fullname2) && empty($date_n2) && empty($fullname3) && empty($date_n3)) {

		$stmt = $conn->prepare("insert into prise_en_charge(fullname,date_n,cin,address,fullname1,date_n1,sexe1,fullname2,date_n2,sexe2,fullname3,date_n3,sexe3,date,sexe) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
	$stmt->bind_param("sssssssssssssss", $fullname,$date_n,$cin,$address,$fullname1,$date_n1,$sexe1,$fullname2,$date_n2,$sexe2,$fullname3,$date_n3,$sexe3,$date,$sexe);
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
      <h1><u>إلتزام بتحمل المسؤولية</u></h1>
      <p><u>أنا الموقع أسفله:</u></p><br>
      <p>السيد '.$fullname.'، المزداد بتاريخ: '.$date_n.'، الحامل لبطاقة التعريف الوطنية رقم:'.$cin.' ، والساكن: '.$address.'</p>
      <p>أشهد على نفسي وبكل مؤهلاتي الصحية والعقلية ومقومات التمييز والإدراك أنني الكفيل بتحمل جميع مسؤولية شؤون ومصاريف ابني  '.$fullname1.'، المزداد بتاريخ: '.$date_n1.'، وبجميع نفقات عيشه من مأكل، مشرب، تطبيب، علاج، عناية، دراسة،... وكل ما يتعلق به، وأتحمل أي مسؤولية مخالفة لهذا التصريح.</p><br>
      <p>أمضيت هذا التصريح قصد الإدلاء به عند الاقتضاء والحاجة.</p>
      <p>حرر في: '.$date.'.</p>
      <p  style="text-align: center;">إمضاء:</p>
      <p style="text-align: center;">'.$fullname.'</p>
      <p style="text-align: center;">'.$cin.'</p>
      <form><input type="button" class="ecran" value="تأكيد النسخ" onClick="window.print()"></form>
</body>
</html>
';
		$stmt->close();
		$conn->close();
	}
	/* 1 child female and father */
	else if ($sexe == "homme" && $sexe1 == "femme" && empty($fullname2) && empty($date_n2) && empty($fullname3) && empty($date_n3)) {

		$stmt = $conn->prepare("insert into prise_en_charge(fullname,date_n,cin,address,fullname1,date_n1,sexe1,fullname2,date_n2,sexe2,fullname3,date_n3,sexe3,date,sexe) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
	$stmt->bind_param("sssssssssssssss", $fullname,$date_n,$cin,$address,$fullname1,$date_n1,$sexe1,$fullname2,$date_n2,$sexe2,$fullname3,$date_n3,$sexe3,$date,$sexe);
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
      <h1><u>إلتزام بتحمل المسؤولية</u></h1>
      <p><u>أنا الموقع أسفله:</u></p><br>
      <p>السيد '.$fullname.'، المزداد بتاريخ: '.$date_n.'، الحامل لبطاقة التعريف الوطنية رقم:'.$cin.' ، والساكن: '.$address.'</p>
      <p>أشهد على نفسي وبكل مؤهلاتي الصحية والعقلية ومقومات التمييز والإدراك أنني الكفيل بتحمل جميع مسؤولية شؤون ومصاريف ابنتي  '.$fullname1.'، المزدادة بتاريخ: '.$date_n1.'، وبجميع نفقات عيشها من مأكل، مشرب، تطبيب، علاج، عناية، دراسة،... وكل ما يتعلق بها، وأتحمل أي مسؤولية مخالفة لهذا التصريح.</p><br>
      <p>أمضيت هذا التصريح قصد الإدلاء به عند الاقتضاء والحاجة.</p>
      <p>حرر في: '.$date.'.</p>
      <p  style="text-align: center;">إمضاء:</p>
      <p style="text-align: center;">'.$fullname.'</p>
      <p style="text-align: center;">'.$cin.'</p>
      <form><input type="button" class="ecran" value="تأكيد النسخ" onClick="window.print()"></form>
</body>
</html>
';
		$stmt->close();
		$conn->close();
	}
	/* M / HOMME / HOMME */
	else if ($sexe == "femme" && $sexe1 == "homme" && $sexe2 == "homme" && empty($fullname3) && empty($date_n3)) {
		$stmt = $conn->prepare("insert into prise_en_charge(fullname,date_n,cin,address,fullname1,date_n1,sexe1,fullname2,date_n2,sexe2,fullname3,date_n3,sexe3,date,sexe) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
	$stmt->bind_param("sssssssssssssss", $fullname,$date_n,$cin,$address,$fullname1,$date_n1,$sexe1,$fullname2,$date_n2,$sexe2,$fullname3,$date_n3,$sexe3,$date,$sexe);
		$execval = $stmt->execute();
		echo $execval;
		echo '<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
	<title>CONFIRMATION</title>
  <link rel="stylesheet" type="text/css" href="style3.css">
</head>
<body>
      <h1><u>إلتزام بتحمل المسؤولية</u></h1>
      <p><u>أنا الموقعة أسفله:</u></p><br>
      <p>السيدة '.$fullname.'، المزدادة بتاريخ: '.$date_n.'، الحاملة لبطاقة التعريف الوطنية رقم:'.$cin.' ، والساكنة: '.$address.'</p>
      <p>أشهد على نفسي وبكل مؤهلاتي الصحية والعقلية ومقومات التمييز والإدراك أنني الكفيلة بتحمل جميع مسؤولية شؤون ومصاريف أبنائي  '.$fullname1.'، المزداد بتاريخ: '.$date_n1.'،و   '.$fullname2.'، المزداد بتاريخ: '.$date_n2.'، وبجميع نفقات عيشهم من مأكل، مشرب، تطبيب، علاج، عناية، دراسة،... وكل ما يتعلق بهم، وأتحمل أي مسؤولية مخالفة لهذا التصريح.</p><br>
      <p>أمضيت هذا التصريح قصد الإدلاء به عند الاقتضاء والحاجة.</p>
      <p>حرر في: '.$date.'.</p>
      <p  style="text-align: center;">إمضاء:</p>
      <p style="text-align: center;">'.$fullname.'</p>
      <p style="text-align: center;">'.$cin.'</p>
      <form><input type="button" class="ecran" value="تأكيد النسخ" onClick="window.print()"></form>
</body>
</html>';
		$stmt->close();
		$conn->close();
	}
	/* M / HOMME / FEMME */
	else if ($sexe == "femme" && $sexe1 == "homme" && $sexe2 == "femme" && empty($fullname3) && empty($date_n3)) {
		$stmt = $conn->prepare("insert into prise_en_charge(fullname,date_n,cin,address,fullname1,date_n1,sexe1,fullname2,date_n2,sexe2,fullname3,date_n3,sexe3,date,sexe) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
	$stmt->bind_param("sssssssssssssss", $fullname,$date_n,$cin,$address,$fullname1,$date_n1,$sexe1,$fullname2,$date_n2,$sexe2,$fullname3,$date_n3,$sexe3,$date,$sexe);
		$execval = $stmt->execute();
		echo $execval;
		echo '<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
	<title>CONFIRMATION</title>
  <link rel="stylesheet" type="text/css" href="style3.css">
</head>
<body> 
<h1><u>إلتزام بتحمل المسؤولية</u></h1>
      <p><u>أنا الموقعة أسفله:</u></p><br>
      <p>السيدة '.$fullname.'، المزدادة بتاريخ: '.$date_n.'، الحاملة لبطاقة التعريف الوطنية رقم:'.$cin.' ، والساكنة: '.$address.'</p>
      <p>أشهد على نفسي وبكل مؤهلاتي الصحية والعقلية ومقومات التمييز والإدراك أنني الكفيلة بتحمل جميع مسؤولية شؤون ومصاريف أبنائي  '.$fullname1.'، المزداد بتاريخ: '.$date_n1.'،و   '.$fullname2.'، المزدادة بتاريخ: '.$date_n2.'، وبجميع نفقات عيشهم من مأكل، مشرب، تطبيب، علاج، عناية، دراسة،... وكل ما يتعلق بهم، وأتحمل أي مسؤولية مخالفة لهذا التصريح.</p><br>
      <p>أمضيت هذا التصريح قصد الإدلاء به عند الاقتضاء والحاجة.</p>
      <p>حرر في: '.$date.'.</p>
      <p  style="text-align: center;">إمضاء:</p>
      <p style="text-align: center;">'.$fullname.'</p>
      <p style="text-align: center;">'.$cin.'</p>
      <form><input type="button" class="ecran" value="تأكيد النسخ" onClick="window.print()"></form>
</body>
</html>';
		$stmt->close();
		$conn->close();
	}
	/* M / FEMME / HOMME */
	else if ($sexe == "femme" && $sexe1 == "femme" && $sexe2 == "homme" && empty($fullname3) && empty($date_n3)) {
		$stmt = $conn->prepare("insert into prise_en_charge(fullname,date_n,cin,address,fullname1,date_n1,sexe1,fullname2,date_n2,sexe2,fullname3,date_n3,sexe3,date,sexe) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
	$stmt->bind_param("sssssssssssssss", $fullname,$date_n,$cin,$address,$fullname1,$date_n1,$sexe1,$fullname2,$date_n2,$sexe2,$fullname3,$date_n3,$sexe3,$date,$sexe);
		$execval = $stmt->execute();
		echo $execval;
		echo '<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
	<title>CONFIRMATION</title>
  <link rel="stylesheet" type="text/css" href="style3.css">
</head>
<body>	
<h1><u>إلتزام بتحمل المسؤولية</u></h1>
      <p><u>أنا الموقعة أسفله:</u></p><br>
      <p>السيدة '.$fullname.'، المزدادة بتاريخ: '.$date_n.'، الحاملة لبطاقة التعريف الوطنية رقم:'.$cin.' ، والساكنة: '.$address.'</p>
      <p>أشهد على نفسي وبكل مؤهلاتي الصحية والعقلية ومقومات التمييز والإدراك أنني الكفيلة بتحمل جميع مسؤولية شؤون ومصاريف أبنائي  '.$fullname1.'، المزدادة بتاريخ: '.$date_n1.'،و   '.$fullname2.'، المزداد بتاريخ: '.$date_n2.'، وبجميع نفقات عيشهم من مأكل، مشرب، تطبيب، علاج، عناية، دراسة،... وكل ما يتعلق بهم، وأتحمل أي مسؤولية مخالفة لهذا التصريح.</p><br>
      <p>أمضيت هذا التصريح قصد الإدلاء به عند الاقتضاء والحاجة.</p>
      <p>حرر في: '.$date.'.</p>
      <p  style="text-align: center;">إمضاء:</p>
      <p style="text-align: center;">'.$fullname.'</p>
      <p style="text-align: center;">'.$cin.'</p>
      <form><input type="button" class="ecran" value="تأكيد النسخ" onClick="window.print()"></form>
</body>
</html>';
		$stmt->close();
		$conn->close();
	}
	/* M / FEMME / FEMME */
	else if ($sexe == "femme" && $sexe1 == "femme" && $sexe2 == "femme" && empty($fullname3) && empty($date_n3)) {
		$stmt = $conn->prepare("insert into prise_en_charge(fullname,date_n,cin,address,fullname1,date_n1,sexe1,fullname2,date_n2,sexe2,fullname3,date_n3,sexe3,date,sexe) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
	$stmt->bind_param("sssssssssssssss", $fullname,$date_n,$cin,$address,$fullname1,$date_n1,$sexe1,$fullname2,$date_n2,$sexe2,$fullname3,$date_n3,$sexe3,$date,$sexe);
		$execval = $stmt->execute();
		echo $execval;
		echo '<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
	<title>CONFIRMATION</title>
  <link rel="stylesheet" type="text/css" href="style3.css">
</head>
<body>	
<h1><u>إلتزام بتحمل المسؤولية</u></h1>
      <p><u>أنا الموقعة أسفله:</u></p><br>
      <p>السيدة '.$fullname.'، المزدادة بتاريخ: '.$date_n.'، الحاملة لبطاقة التعريف الوطنية رقم:'.$cin.' ، والساكنة: '.$address.'</p>
      <p>أشهد على نفسي وبكل مؤهلاتي الصحية والعقلية ومقومات التمييز والإدراك أنني الكفيلة بتحمل جميع مسؤولية شؤون ومصاريف بناتي  '.$fullname1.'، المزدادة بتاريخ: '.$date_n1.'،و   '.$fullname2.'، المزدادة بتاريخ: '.$date_n2.'، وبجميع نفقات عيشهن من مأكل، مشرب، تطبيب، علاج، عناية، دراسة،... وكل ما يتعلق بهن، وأتحمل أي مسؤولية مخالفة لهذا التصريح.</p><br>
      <p>أمضيت هذا التصريح قصد الإدلاء به عند الاقتضاء والحاجة.</p>
      <p>حرر في: '.$date.'.</p>
      <p  style="text-align: center;">إمضاء:</p>
      <p style="text-align: center;">'.$fullname.'</p>
      <p style="text-align: center;">'.$cin.'</p>
      <form><input type="button" class="ecran" value="تأكيد النسخ" onClick="window.print()"></form>
</body>
</html>';
		$stmt->close();
		$conn->close();
	}

/* F / HOMME / HOMME */
	else if ($sexe == "homme" && $sexe1 == "homme" && $sexe2 == "homme" && empty($fullname3) && empty($date_n3)) {
		$stmt = $conn->prepare("insert into prise_en_charge(fullname,date_n,cin,address,fullname1,date_n1,sexe1,fullname2,date_n2,sexe2,fullname3,date_n3,sexe3,date,sexe) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
	$stmt->bind_param("sssssssssssssss", $fullname,$date_n,$cin,$address,$fullname1,$date_n1,$sexe1,$fullname2,$date_n2,$sexe2,$fullname3,$date_n3,$sexe3,$date,$sexe);
		$execval = $stmt->execute();
		echo $execval;
		echo '<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
	<title>CONFIRMATION</title>
  <link rel="stylesheet" type="text/css" href="style3.css">
</head>
<body>
      <h1><u>إلتزام بتحمل المسؤولية</u></h1>
      <p><u>أنا الموقع أسفله:</u></p><br>
      <p>السيد '.$fullname.'، المزداد بتاريخ: '.$date_n.'، الحامل لبطاقة التعريف الوطنية رقم:'.$cin.' ، والساكن: '.$address.'</p>
      <p>أشهد على نفسي وبكل مؤهلاتي الصحية والعقلية ومقومات التمييز والإدراك أنني الكفيل بتحمل جميع مسؤولية شؤون ومصاريف أبنائي  '.$fullname1.'، المزداد بتاريخ: '.$date_n1.'،و   '.$fullname2.'، المزداد بتاريخ: '.$date_n2.'، وبجميع نفقات عيشهم من مأكل، مشرب، تطبيب، علاج، عناية، دراسة،... وكل ما يتعلق بهم، وأتحمل أي مسؤولية مخالفة لهذا التصريح.</p><br>
      <p>أمضيت هذا التصريح قصد الإدلاء به عند الاقتضاء والحاجة.</p>
      <p>حرر في: '.$date.'.</p>
      <p  style="text-align: center;">إمضاء:</p>
      <p style="text-align: center;">'.$fullname.'</p>
      <p style="text-align: center;">'.$cin.'</p>
      <form><input type="button" class="ecran" value="تأكيد النسخ" onClick="window.print()"></form>
</body>
</html>';
		$stmt->close();
		$conn->close();
	}
	/* F / HOMME / FEMME */
	else if ($sexe == "homme" && $sexe1 == "homme" && $sexe2 == "femme" && empty($fullname3) && empty($date_n3)) {
		$stmt = $conn->prepare("insert into prise_en_charge(fullname,date_n,cin,address,fullname1,date_n1,sexe1,fullname2,date_n2,sexe2,fullname3,date_n3,sexe3,date,sexe) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
	$stmt->bind_param("sssssssssssssss", $fullname,$date_n,$cin,$address,$fullname1,$date_n1,$sexe1,$fullname2,$date_n2,$sexe2,$fullname3,$date_n3,$sexe3,$date,$sexe);
		$execval = $stmt->execute();
		echo $execval;
		echo '<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
	<title>CONFIRMATION</title>
  <link rel="stylesheet" type="text/css" href="style3.css">
</head>
<body> 
<h1><u>إلتزام بتحمل المسؤولية</u></h1>
      <p><u>أنا الموقع أسفله:</u></p><br>
      <p>السيد '.$fullname.'، المزداد بتاريخ: '.$date_n.'، الحامل لبطاقة التعريف الوطنية رقم:'.$cin.' ، والساكن: '.$address.'</p>
      <p>أشهد على نفسي وبكل مؤهلاتي الصحية والعقلية ومقومات التمييز والإدراك أنني الكفيل بتحمل جميع مسؤولية شؤون ومصاريف أبنائي  '.$fullname1.'، المزداد بتاريخ: '.$date_n1.'،و   '.$fullname2.'، المزدادة بتاريخ: '.$date_n2.'، وبجميع نفقات عيشهم من مأكل، مشرب، تطبيب، علاج، عناية، دراسة،... وكل ما يتعلق بهم، وأتحمل أي مسؤولية مخالفة لهذا التصريح.</p><br>
      <p>أمضيت هذا التصريح قصد الإدلاء به عند الاقتضاء والحاجة.</p>
      <p>حرر في: '.$date.'.</p>
      <p  style="text-align: center;">إمضاء:</p>
      <p style="text-align: center;">'.$fullname.'</p>
      <p style="text-align: center;">'.$cin.'</p>
      <form><input type="button" class="ecran" value="تأكيد النسخ" onClick="window.print()"></form>
</body>
</html>';
		$stmt->close();
		$conn->close();
	}
	/* F / FEMME / HOMME */
	else if ($sexe == "homme" && $sexe1 == "femme" && $sexe2 == "homme" && empty($fullname3) && empty($date_n3)) {
		$stmt = $conn->prepare("insert into prise_en_charge(fullname,date_n,cin,address,fullname1,date_n1,sexe1,fullname2,date_n2,sexe2,fullname3,date_n3,sexe3,date,sexe) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
	$stmt->bind_param("sssssssssssssss", $fullname,$date_n,$cin,$address,$fullname1,$date_n1,$sexe1,$fullname2,$date_n2,$sexe2,$fullname3,$date_n3,$sexe3,$date,$sexe);
		$execval = $stmt->execute();
		echo $execval;
		echo '<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
	<title>CONFIRMATION</title>
  <link rel="stylesheet" type="text/css" href="style3.css">
</head>
<body>	
<h1><u>إلتزام بتحمل المسؤولية</u></h1>
      <p><u>أنا الموقع أسفله:</u></p><br>
      <p>السيد '.$fullname.'، المزداد بتاريخ: '.$date_n.'، الحامل لبطاقة التعريف الوطنية رقم:'.$cin.' ، والساكن: '.$address.'</p>
      <p>أشهد على نفسي وبكل مؤهلاتي الصحية والعقلية ومقومات التمييز والإدراك أنني الكفيل بتحمل جميع مسؤولية شؤون ومصاريف أبنائي  '.$fullname1.'، المزدادة بتاريخ: '.$date_n1.'،و   '.$fullname2.'، المزداد بتاريخ: '.$date_n2.'، وبجميع نفقات عيشهم من مأكل، مشرب، تطبيب، علاج، عناية، دراسة،... وكل ما يتعلق بهم، وأتحمل أي مسؤولية مخالفة لهذا التصريح.</p><br>
      <p>أمضيت هذا التصريح قصد الإدلاء به عند الاقتضاء والحاجة.</p>
      <p>حرر في: '.$date.'.</p>
      <p  style="text-align: center;">إمضاء:</p>
      <p style="text-align: center;">'.$fullname.'</p>
      <p style="text-align: center;">'.$cin.'</p>
      <form><input type="button" class="ecran" value="تأكيد النسخ" onClick="window.print()"></form>
</body>
</html>';
		$stmt->close();
		$conn->close();
	}
	/* F / FEMME / FEMME */
	else if ($sexe == "homme" && $sexe1 == "femme" && $sexe2 == "femme" && empty($fullname3) && empty($date_n3)) {
		$stmt = $conn->prepare("insert into prise_en_charge(fullname,date_n,cin,address,fullname1,date_n1,sexe1,fullname2,date_n2,sexe2,fullname3,date_n3,sexe3,date,sexe) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
	$stmt->bind_param("sssssssssssssss", $fullname,$date_n,$cin,$address,$fullname1,$date_n1,$sexe1,$fullname2,$date_n2,$sexe2,$fullname3,$date_n3,$sexe3,$date,$sexe);
		$execval = $stmt->execute();
		echo $execval;
		echo '<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
	<title>CONFIRMATION</title>
  <link rel="stylesheet" type="text/css" href="style3.css">
</head>
<body>	
<h1><u>إلتزام بتحمل المسؤولية</u></h1>
      <p><u>أنا الموقع أسفله:</u></p><br>
      <p>السيد '.$fullname.'، المزداد بتاريخ: '.$date_n.'، الحامل لبطاقة التعريف الوطنية رقم:'.$cin.' ، والساكن: '.$address.'</p>
      <p>أشهد على نفسي وبكل مؤهلاتي الصحية والعقلية ومقومات التمييز والإدراك أنني الكفيل بتحمل جميع مسؤولية شؤون ومصاريف بناتي  '.$fullname1.'، المزدادة بتاريخ: '.$date_n1.'،و   '.$fullname2.'، المزدادة بتاريخ: '.$date_n2.'، وبجميع نفقات عيشهن من مأكل، مشرب، تطبيب، علاج، عناية، دراسة،... وكل ما يتعلق بهن، وأتحمل أي مسؤولية مخالفة لهذا التصريح.</p><br>
      <p>أمضيت هذا التصريح قصد الإدلاء به عند الاقتضاء والحاجة.</p>
      <p>حرر في: '.$date.'.</p>
      <p  style="text-align: center;">إمضاء:</p>
      <p style="text-align: center;">'.$fullname.'</p>
      <p style="text-align: center;">'.$cin.'</p>
      <form><input type="button" class="ecran" value="تأكيد النسخ" onClick="window.print()"></form>
</body>
</html>';
		$stmt->close();
		$conn->close();
	}	









	/* M / HOMME / HOMME / HOMME */
	else if ($sexe == "femme" && $sexe1 == "homme" && $sexe2 == "homme" && $sexe3 == "homme") {
		$stmt = $conn->prepare("insert into prise_en_charge(fullname,date_n,cin,address,fullname1,date_n1,sexe1,fullname2,date_n2,sexe2,fullname3,date_n3,sexe3,date,sexe) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
	$stmt->bind_param("sssssssssssssss", $fullname,$date_n,$cin,$address,$fullname1,$date_n1,$sexe1,$fullname2,$date_n2,$sexe2,$fullname3,$date_n3,$sexe3,$date,$sexe);
		$execval = $stmt->execute();
		echo $execval;
		echo '<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
	<title>CONFIRMATION</title>
  <link rel="stylesheet" type="text/css" href="style3.css">
</head>
<body>
      <h1><u>إلتزام بتحمل المسؤولية</u></h1>
      <p><u>أنا الموقعة أسفله:</u></p><br>
      <p>السيدة '.$fullname.'، المزدادة بتاريخ: '.$date_n.'، الحاملة لبطاقة التعريف الوطنية رقم:'.$cin.' ، والساكنة: '.$address.'</p>
      <p>أشهد على نفسي وبكل مؤهلاتي الصحية والعقلية ومقومات التمييز والإدراك أنني الكفيلة بتحمل جميع مسؤولية شؤون ومصاريف أبنائي  '.$fullname1.'، المزداد بتاريخ: '.$date_n1.'،و   '.$fullname2.'، المزداد بتاريخ: '.$date_n2.'، و   '.$fullname3.'، المزداد بتاريخ: '.$date_n3.'، وبجميع نفقات عيشهم من مأكل، مشرب، تطبيب، علاج، عناية، دراسة،... وكل ما يتعلق بهم، وأتحمل أي مسؤولية مخالفة لهذا التصريح.</p><br>
      <p>أمضيت هذا التصريح قصد الإدلاء به عند الاقتضاء والحاجة.</p>
      <p>حرر في: '.$date.'.</p>
      <p  style="text-align: center;">إمضاء:</p>
      <p style="text-align: center;">'.$fullname.'</p>
      <p style="text-align: center;">'.$cin.'</p>
      <form><input type="button" class="ecran" value="تأكيد النسخ" onClick="window.print()"></form>
</body>
</html>';
		$stmt->close();
		$conn->close();
	}
	/* M / HOMME / FEMME / HOMME */
	else if ($sexe == "femme" && $sexe1 == "homme" && $sexe2 == "femme" && $sexe3 == "homme") {
		$stmt = $conn->prepare("insert into prise_en_charge(fullname,date_n,cin,address,fullname1,date_n1,sexe1,fullname2,date_n2,sexe2,fullname3,date_n3,sexe3,date,sexe) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
	$stmt->bind_param("sssssssssssssss", $fullname,$date_n,$cin,$address,$fullname1,$date_n1,$sexe1,$fullname2,$date_n2,$sexe2,$fullname3,$date_n3,$sexe3,$date,$sexe);
		$execval = $stmt->execute();
		echo $execval;
		echo '<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
	<title>CONFIRMATION</title>
  <link rel="stylesheet" type="text/css" href="style3.css">
</head>
<body>
      <h1><u>إلتزام بتحمل المسؤولية</u></h1>
      <p><u>أنا الموقعة أسفله:</u></p><br>
      <p>السيدة '.$fullname.'، المزدادة بتاريخ: '.$date_n.'، الحاملة لبطاقة التعريف الوطنية رقم:'.$cin.' ، والساكنة: '.$address.'</p>
      <p>أشهد على نفسي وبكل مؤهلاتي الصحية والعقلية ومقومات التمييز والإدراك أنني الكفيلة بتحمل جميع مسؤولية شؤون ومصاريف أبنائي  '.$fullname1.'، المزداد بتاريخ: '.$date_n1.'،و   '.$fullname2.'، المزدادة بتاريخ: '.$date_n2.'، و   '.$fullname3.'، المزداد بتاريخ: '.$date_n3.'، وبجميع نفقات عيشهم من مأكل، مشرب، تطبيب، علاج، عناية، دراسة،... وكل ما يتعلق بهم، وأتحمل أي مسؤولية مخالفة لهذا التصريح.</p><br>
      <p>أمضيت هذا التصريح قصد الإدلاء به عند الاقتضاء والحاجة.</p>
      <p>حرر في: '.$date.'.</p>
      <p  style="text-align: center;">إمضاء:</p>
      <p style="text-align: center;">'.$fullname.'</p>
      <p style="text-align: center;">'.$cin.'</p>
      <form><input type="button" class="ecran" value="تأكيد النسخ" onClick="window.print()"></form>
</body>
</html>';
		$stmt->close();
		$conn->close();
	}
	/* M / HOMME / HOMME / FEMME */
	else if ($sexe == "femme" && $sexe1 == "homme" && $sexe2 == "homme" && $sexe3 == "femme") {
		$stmt = $conn->prepare("insert into prise_en_charge(fullname,date_n,cin,address,fullname1,date_n1,sexe1,fullname2,date_n2,sexe2,fullname3,date_n3,sexe3,date,sexe) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
	$stmt->bind_param("sssssssssssssss", $fullname,$date_n,$cin,$address,$fullname1,$date_n1,$sexe1,$fullname2,$date_n2,$sexe2,$fullname3,$date_n3,$sexe3,$date,$sexe);
		$execval = $stmt->execute();
		echo $execval;
		echo '<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
	<title>CONFIRMATION</title>
  <link rel="stylesheet" type="text/css" href="style3.css">
</head>
<body>
      <h1><u>إلتزام بتحمل المسؤولية</u></h1>
      <p><u>أنا الموقعة أسفله:</u></p><br>
      <p>السيدة '.$fullname.'، المزدادة بتاريخ: '.$date_n.'، الحاملة لبطاقة التعريف الوطنية رقم:'.$cin.' ، والساكنة: '.$address.'</p>
      <p>أشهد على نفسي وبكل مؤهلاتي الصحية والعقلية ومقومات التمييز والإدراك أنني الكفيلة بتحمل جميع مسؤولية شؤون ومصاريف أبنائي  '.$fullname1.'، المزداد بتاريخ: '.$date_n1.'،و   '.$fullname2.'، المزداد بتاريخ: '.$date_n2.'، و   '.$fullname3.'، المزدادة بتاريخ: '.$date_n3.'، وبجميع نفقات عيشهم من مأكل، مشرب، تطبيب، علاج، عناية، دراسة،... وكل ما يتعلق بهم، وأتحمل أي مسؤولية مخالفة لهذا التصريح.</p><br>
      <p>أمضيت هذا التصريح قصد الإدلاء به عند الاقتضاء والحاجة.</p>
      <p>حرر في: '.$date.'.</p>
      <p  style="text-align: center;">إمضاء:</p>
      <p style="text-align: center;">'.$fullname.'</p>
      <p style="text-align: center;">'.$cin.'</p>
      <form><input type="button" class="ecran" value="تأكيد النسخ" onClick="window.print()"></form>
</body>
</html>';
		$stmt->close();
		$conn->close();
	}
	/* M / HOMME / FEMME / FEMME */
	else if ($sexe == "femme" && $sexe1 == "homme" && $sexe2 == "femme" && $sexe3 == "femme") {
		$stmt = $conn->prepare("insert into prise_en_charge(fullname,date_n,cin,address,fullname1,date_n1,sexe1,fullname2,date_n2,sexe2,fullname3,date_n3,sexe3,date,sexe) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
	$stmt->bind_param("sssssssssssssss", $fullname,$date_n,$cin,$address,$fullname1,$date_n1,$sexe1,$fullname2,$date_n2,$sexe2,$fullname3,$date_n3,$sexe3,$date,$sexe);
		$execval = $stmt->execute();
		echo $execval;
		echo '<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
	<title>CONFIRMATION</title>
  <link rel="stylesheet" type="text/css" href="style3.css">
</head>
<body>
      <h1><u>إلتزام بتحمل المسؤولية</u></h1>
      <p><u>أنا الموقعة أسفله:</u></p><br>
      <p>السيدة '.$fullname.'، المزدادة بتاريخ: '.$date_n.'، الحاملة لبطاقة التعريف الوطنية رقم:'.$cin.' ، والساكنة: '.$address.'</p>
      <p>أشهد على نفسي وبكل مؤهلاتي الصحية والعقلية ومقومات التمييز والإدراك أنني الكفيلة بتحمل جميع مسؤولية شؤون ومصاريف أبنائي  '.$fullname1.'، المزداد بتاريخ: '.$date_n1.'،و   '.$fullname2.'، المزدادة بتاريخ: '.$date_n2.'، و   '.$fullname3.'، المزدادة بتاريخ: '.$date_n3.'، وبجميع نفقات عيشهم من مأكل، مشرب، تطبيب، علاج، عناية، دراسة،... وكل ما يتعلق بهم، وأتحمل أي مسؤولية مخالفة لهذا التصريح.</p><br>
      <p>أمضيت هذا التصريح قصد الإدلاء به عند الاقتضاء والحاجة.</p>
      <p>حرر في: '.$date.'.</p>
      <p  style="text-align: center;">إمضاء:</p>
      <p style="text-align: center;">'.$fullname.'</p>
      <p style="text-align: center;">'.$cin.'</p>
      <form><input type="button" class="ecran" value="تأكيد النسخ" onClick="window.print()"></form>
</body>
</html>';
		$stmt->close();
		$conn->close();
	}
	/* M / FEMME / HOMME / HOMME */
	else if ($sexe == "femme" && $sexe1 == "femme" && $sexe2 == "homme" && $sexe3 == "homme") {
		$stmt = $conn->prepare("insert into prise_en_charge(fullname,date_n,cin,address,fullname1,date_n1,sexe1,fullname2,date_n2,sexe2,fullname3,date_n3,sexe3,date,sexe) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
	$stmt->bind_param("sssssssssssssss", $fullname,$date_n,$cin,$address,$fullname1,$date_n1,$sexe1,$fullname2,$date_n2,$sexe2,$fullname3,$date_n3,$sexe3,$date,$sexe);
		$execval = $stmt->execute();
		echo $execval;
		echo '<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
	<title>CONFIRMATION</title>
  <link rel="stylesheet" type="text/css" href="style3.css">
</head>
<body>
      <h1><u>إلتزام بتحمل المسؤولية</u></h1>
      <p><u>أنا الموقعة أسفله:</u></p><br>
      <p>السيدة '.$fullname.'، المزدادة بتاريخ: '.$date_n.'، الحاملة لبطاقة التعريف الوطنية رقم:'.$cin.' ، والساكنة: '.$address.'</p>
      <p>أشهد على نفسي وبكل مؤهلاتي الصحية والعقلية ومقومات التمييز والإدراك أنني الكفيلة بتحمل جميع مسؤولية شؤون ومصاريف أبنائي  '.$fullname1.'، المزدادة بتاريخ: '.$date_n1.'،و   '.$fullname2.'، المزداد بتاريخ: '.$date_n2.'، و   '.$fullname3.'، المزداد بتاريخ: '.$date_n3.'، وبجميع نفقات عيشهم من مأكل، مشرب، تطبيب، علاج، عناية، دراسة،... وكل ما يتعلق بهم، وأتحمل أي مسؤولية مخالفة لهذا التصريح.</p><br>
      <p>أمضيت هذا التصريح قصد الإدلاء به عند الاقتضاء والحاجة.</p>
      <p>حرر في: '.$date.'.</p>
      <p  style="text-align: center;">إمضاء:</p>
      <p style="text-align: center;">'.$fullname.'</p>
      <p style="text-align: center;">'.$cin.'</p>
      <form><input type="button" class="ecran" value="تأكيد النسخ" onClick="window.print()"></form>
</body>
</html>';
		$stmt->close();
		$conn->close();
	}
	/* M / FEMME / FEMME / HOMME */
	else if ($sexe == "femme" && $sexe1 == "femme" && $sexe2 == "femme" && $sexe3 == "homme") {
		$stmt = $conn->prepare("insert into prise_en_charge(fullname,date_n,cin,address,fullname1,date_n1,sexe1,fullname2,date_n2,sexe2,fullname3,date_n3,sexe3,date,sexe) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
	$stmt->bind_param("sssssssssssssss", $fullname,$date_n,$cin,$address,$fullname1,$date_n1,$sexe1,$fullname2,$date_n2,$sexe2,$fullname3,$date_n3,$sexe3,$date,$sexe);
		$execval = $stmt->execute();
		echo $execval;
		echo '<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
	<title>CONFIRMATION</title>
  <link rel="stylesheet" type="text/css" href="style3.css">
</head>
<body>
      <h1><u>إلتزام بتحمل المسؤولية</u></h1>
      <p><u>أنا الموقعة أسفله:</u></p><br>
      <p>السيدة '.$fullname.'، المزدادة بتاريخ: '.$date_n.'، الحاملة لبطاقة التعريف الوطنية رقم:'.$cin.' ، والساكنة: '.$address.'</p>
      <p>أشهد على نفسي وبكل مؤهلاتي الصحية والعقلية ومقومات التمييز والإدراك أنني الكفيلة بتحمل جميع مسؤولية شؤون ومصاريف أبنائي  '.$fullname1.'، المزدادة بتاريخ: '.$date_n1.'،و   '.$fullname2.'، المزدادة بتاريخ: '.$date_n2.'، و   '.$fullname3.'، المزداد بتاريخ: '.$date_n3.'، وبجميع نفقات عيشهم من مأكل، مشرب، تطبيب، علاج، عناية، دراسة،... وكل ما يتعلق بهم، وأتحمل أي مسؤولية مخالفة لهذا التصريح.</p><br>
      <p>أمضيت هذا التصريح قصد الإدلاء به عند الاقتضاء والحاجة.</p>
      <p>حرر في: '.$date.'.</p>
      <p  style="text-align: center;">إمضاء:</p>
      <p style="text-align: center;">'.$fullname.'</p>
      <p style="text-align: center;">'.$cin.'</p>
      <form><input type="button" class="ecran" value="تأكيد النسخ" onClick="window.print()"></form>
</body>
</html>';
		$stmt->close();
		$conn->close();
	}
	/* M / FEMME / FEMME / FEMME */
	else if ($sexe == "femme" && $sexe1 == "femme" && $sexe2 == "femme" && $sexe3 == "femme") {
		$stmt = $conn->prepare("insert into prise_en_charge(fullname,date_n,cin,address,fullname1,date_n1,sexe1,fullname2,date_n2,sexe2,fullname3,date_n3,sexe3,date,sexe) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
	$stmt->bind_param("sssssssssssssss", $fullname,$date_n,$cin,$address,$fullname1,$date_n1,$sexe1,$fullname2,$date_n2,$sexe2,$fullname3,$date_n3,$sexe3,$date,$sexe);
		$execval = $stmt->execute();
		echo $execval;
		echo '<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
	<title>CONFIRMATION</title>
  <link rel="stylesheet" type="text/css" href="style3.css">
</head>
<body>
      <h1><u>إلتزام بتحمل المسؤولية</u></h1>
      <p><u>أنا الموقعة أسفله:</u></p><br>
      <p>السيدة '.$fullname.'، المزدادة بتاريخ: '.$date_n.'، الحاملة لبطاقة التعريف الوطنية رقم:'.$cin.' ، والساكنة: '.$address.'</p>
      <p>أشهد على نفسي وبكل مؤهلاتي الصحية والعقلية ومقومات التمييز والإدراك أنني الكفيلة بتحمل جميع مسؤولية شؤون ومصاريف بناتي  '.$fullname1.'، المزدادة بتاريخ: '.$date_n1.'،و   '.$fullname2.'، المزدادة بتاريخ: '.$date_n2.'، و   '.$fullname3.'، المزدادة بتاريخ: '.$date_n3.'، وبجميع نفقات عيشهن من مأكل، مشرب، تطبيب، علاج، عناية، دراسة،... وكل ما يتعلق بهن، وأتحمل أي مسؤولية مخالفة لهذا التصريح.</p><br>
      <p>أمضيت هذا التصريح قصد الإدلاء به عند الاقتضاء والحاجة.</p>
      <p>حرر في: '.$date.'.</p>
      <p  style="text-align: center;">إمضاء:</p>
      <p style="text-align: center;">'.$fullname.'</p>
      <p style="text-align: center;">'.$cin.'</p>
      <form><input type="button" class="ecran" value="تأكيد النسخ" onClick="window.print()"></form>
</body>
</html>';
		$stmt->close();
		$conn->close();
	}
/* M / FEMME / HOMME / FEMME */
	else if ($sexe == "femme" && $sexe1 == "femme" && $sexe2 == "homme" && $sexe3 == "femme") {
		$stmt = $conn->prepare("insert into prise_en_charge(fullname,date_n,cin,address,fullname1,date_n1,sexe1,fullname2,date_n2,sexe2,fullname3,date_n3,sexe3,date,sexe) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
	$stmt->bind_param("sssssssssssssss", $fullname,$date_n,$cin,$address,$fullname1,$date_n1,$sexe1,$fullname2,$date_n2,$sexe2,$fullname3,$date_n3,$sexe3,$date,$sexe);
		$execval = $stmt->execute();
		echo $execval;
		echo '<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
	<title>CONFIRMATION</title>
  <link rel="stylesheet" type="text/css" href="style3.css">
</head>
<body>
      <h1><u>إلتزام بتحمل المسؤولية</u></h1>
      <p><u>أنا الموقعة أسفله:</u></p><br>
      <p>السيدة '.$fullname.'، المزدادة بتاريخ: '.$date_n.'، الحاملة لبطاقة التعريف الوطنية رقم:'.$cin.' ، والساكنة: '.$address.'</p>
      <p>أشهد على نفسي وبكل مؤهلاتي الصحية والعقلية ومقومات التمييز والإدراك أنني الكفيلة بتحمل جميع مسؤولية شؤون ومصاريف بناتي  '.$fullname1.'، المزدادة بتاريخ: '.$date_n1.'،و   '.$fullname2.'، المزداد بتاريخ: '.$date_n2.'، و   '.$fullname3.'، المزدادة بتاريخ: '.$date_n3.'، وبجميع نفقات عيشهن من مأكل، مشرب، تطبيب، علاج، عناية، دراسة،... وكل ما يتعلق بهن، وأتحمل أي مسؤولية مخالفة لهذا التصريح.</p><br>
      <p>أمضيت هذا التصريح قصد الإدلاء به عند الاقتضاء والحاجة.</p>
      <p>حرر في: '.$date.'.</p>
      <p  style="text-align: center;">إمضاء:</p>
      <p style="text-align: center;">'.$fullname.'</p>
      <p style="text-align: center;">'.$cin.'</p>
      <form><input type="button" class="ecran" value="تأكيد النسخ" onClick="window.print()"></form>
</body>
</html>';
		$stmt->close();
		$conn->close();
	}
	














	/* F / HOMME / HOMME / HOMME */
	else if ($sexe == "homme" && $sexe1 == "homme" && $sexe2 == "homme" && $sexe3 == "homme") {
		$stmt = $conn->prepare("insert into prise_en_charge(fullname,date_n,cin,address,fullname1,date_n1,sexe1,fullname2,date_n2,sexe2,fullname3,date_n3,sexe3,date,sexe) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
	$stmt->bind_param("sssssssssssssss", $fullname,$date_n,$cin,$address,$fullname1,$date_n1,$sexe1,$fullname2,$date_n2,$sexe2,$fullname3,$date_n3,$sexe3,$date,$sexe);
		$execval = $stmt->execute();
		echo $execval;
		echo '<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
	<title>CONFIRMATION</title>
  <link rel="stylesheet" type="text/css" href="style3.css">
</head>
<body>
      <h1><u>إلتزام بتحمل المسؤولية</u></h1>
      <p><u>أنا الموقع أسفله:</u></p><br>
      <p>السيد '.$fullname.'، المزداد بتاريخ: '.$date_n.'، الحامل لبطاقة التعريف الوطنية رقم:'.$cin.' ، والساكن: '.$address.'</p>
      <p>أشهد على نفسي وبكل مؤهلاتي الصحية والعقلية ومقومات التمييز والإدراك أنني الكفيل بتحمل جميع مسؤولية شؤون ومصاريف أبنائي  '.$fullname1.'، المزداد بتاريخ: '.$date_n1.'،و   '.$fullname2.'، المزداد بتاريخ: '.$date_n2.'، و   '.$fullname3.'، المزداد بتاريخ: '.$date_n3.'، وبجميع نفقات عيشهم من مأكل، مشرب، تطبيب، علاج، عناية، دراسة،... وكل ما يتعلق بهم، وأتحمل أي مسؤولية مخالفة لهذا التصريح.</p><br>
      <p>أمضيت هذا التصريح قصد الإدلاء به عند الاقتضاء والحاجة.</p>
      <p>حرر في: '.$date.'.</p>
      <p  style="text-align: center;">إمضاء:</p>
      <p style="text-align: center;">'.$fullname.'</p>
      <p style="text-align: center;">'.$cin.'</p>
      <form><input type="button" class="ecran" value="تأكيد النسخ" onClick="window.print()"></form>
</body>
</html>';
		$stmt->close();
		$conn->close();
	}
	/* F / HOMME / HOMME / FEMME */
	else if ($sexe == "homme" && $sexe1 == "homme" && $sexe2 == "homme" && $sexe3 == "femme") {
		$stmt = $conn->prepare("insert into prise_en_charge(fullname,date_n,cin,address,fullname1,date_n1,sexe1,fullname2,date_n2,sexe2,fullname3,date_n3,sexe3,date,sexe) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
	$stmt->bind_param("sssssssssssssss", $fullname,$date_n,$cin,$address,$fullname1,$date_n1,$sexe1,$fullname2,$date_n2,$sexe2,$fullname3,$date_n3,$sexe3,$date,$sexe);
		$execval = $stmt->execute();
		echo $execval;
		echo '<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
	<title>CONFIRMATION</title>
  <link rel="stylesheet" type="text/css" href="style3.css">
</head>
<body>
      <h1><u>إلتزام بتحمل المسؤولية</u></h1>
      <p><u>أنا الموقع أسفله:</u></p><br>
      <p>السيد '.$fullname.'، المزداد بتاريخ: '.$date_n.'، الحامل لبطاقة التعريف الوطنية رقم:'.$cin.' ، والساكن: '.$address.'</p>
      <p>أشهد على نفسي وبكل مؤهلاتي الصحية والعقلية ومقومات التمييز والإدراك أنني الكفيل بتحمل جميع مسؤولية شؤون ومصاريف أبنائي  '.$fullname1.'، المزداد بتاريخ: '.$date_n1.'،و   '.$fullname2.'، المزداد بتاريخ: '.$date_n2.'، و   '.$fullname3.'، المزدادة بتاريخ: '.$date_n3.'، وبجميع نفقات عيشهم من مأكل، مشرب، تطبيب، علاج، عناية، دراسة،... وكل ما يتعلق بهم، وأتحمل أي مسؤولية مخالفة لهذا التصريح.</p><br>
      <p>أمضيت هذا التصريح قصد الإدلاء به عند الاقتضاء والحاجة.</p>
      <p>حرر في: '.$date.'.</p>
      <p  style="text-align: center;">إمضاء:</p>
      <p style="text-align: center;">'.$fullname.'</p>
      <p style="text-align: center;">'.$cin.'</p>
      <form><input type="button" class="ecran" value="تأكيد النسخ" onClick="window.print()"></form>
</body>
</html>';
		$stmt->close();
		$conn->close();
	}
	/* F / HOMME / FEMME / HOMME */
	else if ($sexe == "homme" && $sexe1 == "homme" && $sexe2 == "femme" && $sexe3 == "homme") {
		$stmt = $conn->prepare("insert into prise_en_charge(fullname,date_n,cin,address,fullname1,date_n1,sexe1,fullname2,date_n2,sexe2,fullname3,date_n3,sexe3,date,sexe) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
	$stmt->bind_param("sssssssssssssss", $fullname,$date_n,$cin,$address,$fullname1,$date_n1,$sexe1,$fullname2,$date_n2,$sexe2,$fullname3,$date_n3,$sexe3,$date,$sexe);
		$execval = $stmt->execute();
		echo $execval;
		echo '<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
	<title>CONFIRMATION</title>
  <link rel="stylesheet" type="text/css" href="style3.css">
</head>
<body>
      <h1><u>إلتزام بتحمل المسؤولية</u></h1>
      <p><u>أنا الموقع أسفله:</u></p><br>
      <p>السيد '.$fullname.'، المزداد بتاريخ: '.$date_n.'، الحامل لبطاقة التعريف الوطنية رقم:'.$cin.' ، والساكن: '.$address.'</p>
      <p>أشهد على نفسي وبكل مؤهلاتي الصحية والعقلية ومقومات التمييز والإدراك أنني الكفيل بتحمل جميع مسؤولية شؤون ومصاريف أبنائي  '.$fullname1.'، المزداد بتاريخ: '.$date_n1.'،و   '.$fullname2.'، المزدادة بتاريخ: '.$date_n2.'، و   '.$fullname3.'، المزداد بتاريخ: '.$date_n3.'، وبجميع نفقات عيشهم من مأكل، مشرب، تطبيب، علاج، عناية، دراسة،... وكل ما يتعلق بهم، وأتحمل أي مسؤولية مخالفة لهذا التصريح.</p><br>
      <p>أمضيت هذا التصريح قصد الإدلاء به عند الاقتضاء والحاجة.</p>
      <p>حرر في: '.$date.'.</p>
      <p  style="text-align: center;">إمضاء:</p>
      <p style="text-align: center;">'.$fullname.'</p>
      <p style="text-align: center;">'.$cin.'</p>
      <form><input type="button" class="ecran" value="تأكيد النسخ" onClick="window.print()"></form>
</body>
</html>';
		$stmt->close();
		$conn->close();
	}
	/* F / HOMME / FEMME / FEMME */
	else if ($sexe == "homme" && $sexe1 == "homme" && $sexe2 == "femme" && $sexe3 == "femme") {
		$stmt = $conn->prepare("insert into prise_en_charge(fullname,date_n,cin,address,fullname1,date_n1,sexe1,fullname2,date_n2,sexe2,fullname3,date_n3,sexe3,date,sexe) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
	$stmt->bind_param("sssssssssssssss", $fullname,$date_n,$cin,$address,$fullname1,$date_n1,$sexe1,$fullname2,$date_n2,$sexe2,$fullname3,$date_n3,$sexe3,$date,$sexe);
		$execval = $stmt->execute();
		echo $execval;
		echo '<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
	<title>CONFIRMATION</title>
  <link rel="stylesheet" type="text/css" href="style3.css">
</head>
<body>
      <h1><u>إلتزام بتحمل المسؤولية</u></h1>
      <p><u>أنا الموقع أسفله:</u></p><br>
      <p>السيد '.$fullname.'، المزداد بتاريخ: '.$date_n.'، الحامل لبطاقة التعريف الوطنية رقم:'.$cin.' ، والساكن: '.$address.'</p>
      <p>أشهد على نفسي وبكل مؤهلاتي الصحية والعقلية ومقومات التمييز والإدراك أنني الكفيل بتحمل جميع مسؤولية شؤون ومصاريف أبنائي  '.$fullname1.'، المزداد بتاريخ: '.$date_n1.'،و   '.$fullname2.'، المزدادة بتاريخ: '.$date_n2.'، و   '.$fullname3.'، المزدادة بتاريخ: '.$date_n3.'، وبجميع نفقات عيشهم من مأكل، مشرب، تطبيب، علاج، عناية، دراسة،... وكل ما يتعلق بهم، وأتحمل أي مسؤولية مخالفة لهذا التصريح.</p><br>
      <p>أمضيت هذا التصريح قصد الإدلاء به عند الاقتضاء والحاجة.</p>
      <p>حرر في: '.$date.'.</p>
      <p  style="text-align: center;">إمضاء:</p>
      <p style="text-align: center;">'.$fullname.'</p>
      <p style="text-align: center;">'.$cin.'</p>
      <form><input type="button" class="ecran" value="تأكيد النسخ" onClick="window.print()"></form>
</body>
</html>';
		$stmt->close();
		$conn->close();
	}
	/* F / FEMME / HOMME / HOMME */
	else if ($sexe == "homme" && $sexe1 == "femme" && $sexe2 == "homme" && $sexe3 == "homme") {
		$stmt = $conn->prepare("insert into prise_en_charge(fullname,date_n,cin,address,fullname1,date_n1,sexe1,fullname2,date_n2,sexe2,fullname3,date_n3,sexe3,date,sexe) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
	$stmt->bind_param("sssssssssssssss", $fullname,$date_n,$cin,$address,$fullname1,$date_n1,$sexe1,$fullname2,$date_n2,$sexe2,$fullname3,$date_n3,$sexe3,$date,$sexe);
		$execval = $stmt->execute();
		echo $execval;
		echo '<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
	<title>CONFIRMATION</title>
  <link rel="stylesheet" type="text/css" href="style3.css">
</head>
<body>
      <h1><u>إلتزام بتحمل المسؤولية</u></h1>
      <p><u>أنا الموقع أسفله:</u></p><br>
      <p>السيد '.$fullname.'، المزداد بتاريخ: '.$date_n.'، الحامل لبطاقة التعريف الوطنية رقم:'.$cin.' ، والساكن: '.$address.'</p>
      <p>أشهد على نفسي وبكل مؤهلاتي الصحية والعقلية ومقومات التمييز والإدراك أنني الكفيل بتحمل جميع مسؤولية شؤون ومصاريف أبنائي  '.$fullname1.'، المزدادة بتاريخ: '.$date_n1.'،و   '.$fullname2.'، المزداد بتاريخ: '.$date_n2.'، و   '.$fullname3.'، المزداد بتاريخ: '.$date_n3.'، وبجميع نفقات عيشهم من مأكل، مشرب، تطبيب، علاج، عناية، دراسة،... وكل ما يتعلق بهم، وأتحمل أي مسؤولية مخالفة لهذا التصريح.</p><br>
      <p>أمضيت هذا التصريح قصد الإدلاء به عند الاقتضاء والحاجة.</p>
      <p>حرر في: '.$date.'.</p>
      <p  style="text-align: center;">إمضاء:</p>
      <p style="text-align: center;">'.$fullname.'</p>
      <p style="text-align: center;">'.$cin.'</p>
      <form><input type="button" class="ecran" value="تأكيد النسخ" onClick="window.print()"></form>
</body>
</html>';
		$stmt->close();
		$conn->close();
	}
	/* F / FEMME / FEMME / HOMME */
	else if ($sexe == "homme" && $sexe1 == "femme" && $sexe2 == "femme" && $sexe3 == "homme") {
		$stmt = $conn->prepare("insert into prise_en_charge(fullname,date_n,cin,address,fullname1,date_n1,sexe1,fullname2,date_n2,sexe2,fullname3,date_n3,sexe3,date,sexe) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
	$stmt->bind_param("sssssssssssssss", $fullname,$date_n,$cin,$address,$fullname1,$date_n1,$sexe1,$fullname2,$date_n2,$sexe2,$fullname3,$date_n3,$sexe3,$date,$sexe);
		$execval = $stmt->execute();
		echo $execval;
		echo '<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
	<title>CONFIRMATION</title>
  <link rel="stylesheet" type="text/css" href="style3.css">
</head>
<body>
      <h1><u>إلتزام بتحمل المسؤولية</u></h1>
      <p><u>أنا الموقع أسفله:</u></p><br>
      <p>السيد '.$fullname.'، المزداد بتاريخ: '.$date_n.'، الحامل لبطاقة التعريف الوطنية رقم:'.$cin.' ، والساكن: '.$address.'</p>
      <p>أشهد على نفسي وبكل مؤهلاتي الصحية والعقلية ومقومات التمييز والإدراك أنني الكفيل بتحمل جميع مسؤولية شؤون ومصاريف أبنائي  '.$fullname1.'، المزدادة بتاريخ: '.$date_n1.'،و   '.$fullname2.'، المزدادة بتاريخ: '.$date_n2.'، و   '.$fullname3.'، المزداد بتاريخ: '.$date_n3.'، وبجميع نفقات عيشهم من مأكل، مشرب، تطبيب، علاج، عناية، دراسة،... وكل ما يتعلق بهم، وأتحمل أي مسؤولية مخالفة لهذا التصريح.</p><br>
      <p>أمضيت هذا التصريح قصد الإدلاء به عند الاقتضاء والحاجة.</p>
      <p>حرر في: '.$date.'.</p>
      <p  style="text-align: center;">إمضاء:</p>
      <p style="text-align: center;">'.$fullname.'</p>
      <p style="text-align: center;">'.$cin.'</p>
      <form><input type="button" class="ecran" value="تأكيد النسخ" onClick="window.print()"></form>
</body>
</html>';
		$stmt->close();
		$conn->close();
	}
	/* F / FEMME / FEMME / FEMME */
	else if ($sexe == "homme" && $sexe1 == "femme" && $sexe2 == "femme" && $sexe3 == "femme") {
		$stmt = $conn->prepare("insert into prise_en_charge(fullname,date_n,cin,address,fullname1,date_n1,sexe1,fullname2,date_n2,sexe2,fullname3,date_n3,sexe3,date,sexe) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
	$stmt->bind_param("sssssssssssssss", $fullname,$date_n,$cin,$address,$fullname1,$date_n1,$sexe1,$fullname2,$date_n2,$sexe2,$fullname3,$date_n3,$sexe3,$date,$sexe);
		$execval = $stmt->execute();
		echo $execval;
		echo '<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
	<title>CONFIRMATION</title>
  <link rel="stylesheet" type="text/css" href="style3.css">
</head>
<body>
      <h1><u>إلتزام بتحمل المسؤولية</u></h1>
      <p><u>أنا الموقع أسفله:</u></p><br>
      <p>السيد '.$fullname.'، المزداد بتاريخ: '.$date_n.'، الحامل لبطاقة التعريف الوطنية رقم:'.$cin.' ، والساكن: '.$address.'</p>
      <p>أشهد على نفسي وبكل مؤهلاتي الصحية والعقلية ومقومات التمييز والإدراك أنني الكفيل بتحمل جميع مسؤولية شؤون ومصاريف بناتي  '.$fullname1.'، المزدادة بتاريخ: '.$date_n1.'،و   '.$fullname2.'، المزدادة بتاريخ: '.$date_n2.'، و   '.$fullname3.'، المزدادة بتاريخ: '.$date_n3.'، وبجميع نفقات عيشهن من مأكل، مشرب، تطبيب، علاج، عناية، دراسة،... وكل ما يتعلق بهن، وأتحمل أي مسؤولية مخالفة لهذا التصريح.</p><br>
      <p>أمضيت هذا التصريح قصد الإدلاء به عند الاقتضاء والحاجة.</p>
      <p>حرر في: '.$date.'.</p>
      <p  style="text-align: center;">إمضاء:</p>
      <p style="text-align: center;">'.$fullname.'</p>
      <p style="text-align: center;">'.$cin.'</p>
      <form><input type="button" class="ecran" value="تأكيد النسخ" onClick="window.print()"></form>
</body>
</html>';
		$stmt->close();
		$conn->close();
	}
/* F / FEMME / HOMME / FEMME */
	else if ($sexe == "homme" && $sexe1 == "femme" && $sexe2 == "homme" && $sexe3 == "femme") {
		$stmt = $conn->prepare("insert into prise_en_charge(fullname,date_n,cin,address,fullname1,date_n1,sexe1,fullname2,date_n2,sexe2,fullname3,date_n3,sexe3,date,sexe) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
	$stmt->bind_param("sssssssssssssss", $fullname,$date_n,$cin,$address,$fullname1,$date_n1,$sexe1,$fullname2,$date_n2,$sexe2,$fullname3,$date_n3,$sexe3,$date,$sexe);
		$execval = $stmt->execute();
		echo $execval;
		echo '<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
	<title>CONFIRMATION</title>
  <link rel="stylesheet" type="text/css" href="style3.css">
</head>
<body>
      <h1><u>إلتزام بتحمل المسؤولية</u></h1>
      <p><u>أنا الموقع أسفله:</u></p><br>
      <p>السيد '.$fullname.'، المزداد بتاريخ: '.$date_n.'، الحامل لبطاقة التعريف الوطنية رقم:'.$cin.' ، والساكن: '.$address.'</p>
      <p>أشهد على نفسي وبكل مؤهلاتي الصحية والعقلية ومقومات التمييز والإدراك أنني الكفيل بتحمل جميع مسؤولية شؤون ومصاريف بناتي  '.$fullname1.'، المزدادة بتاريخ: '.$date_n1.'،و   '.$fullname2.'، المزداد بتاريخ: '.$date_n2.'، و   '.$fullname3.'، المزدادة بتاريخ: '.$date_n3.'، وبجميع نفقات عيشهن من مأكل، مشرب، تطبيب، علاج، عناية، دراسة،... وكل ما يتعلق بهن، وأتحمل أي مسؤولية مخالفة لهذا التصريح.</p><br>
      <p>أمضيت هذا التصريح قصد الإدلاء به عند الاقتضاء والحاجة.</p>
      <p>حرر في: '.$date.'.</p>
      <p  style="text-align: center;">إمضاء:</p>
      <p style="text-align: center;">'.$fullname.'</p>
      <p style="text-align: center;">'.$cin.'</p>
      <form><input type="button" class="ecran" value="تأكيد النسخ" onClick="window.print()"></form>
</body>
</html>';
		$stmt->close();
		$conn->close();
	}
?>