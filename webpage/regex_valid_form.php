<?php

	$pattern1="/(quick)/gi";
	$pattern2="/\w*@[a-z]+\.[a-z]{2,3}/gi";
	$pattern3="/\+998-\d{2}-\d{3}-\d{4}/gi";
	$pattern4="/\s*/";
	$pattern5="/[^0-9,\.]/";
	$text1="The quick brown fox";
	$text2="example@mail.com";
	$text3="+998-97-1444444";
	$text4='The quick " " brown fox';
	$text5='$123,34.00A';
	$replaceText="";
	$replacedText="";

	$match="Not checked yet.";

if ($_SERVER["REQUEST_METHOD"]=="POST") {
	$pattern=$_POST["pattern"];
	$text=$_POST["text"];
	$replaceText=$_POST["replaceText"];

	$replacedText=preg_replace($pattern5, $replaceText, $text5);

	if(preg_match($pattern5, $text5)) {
						$match="Match!";
					} else {
						$match="Does not match!";
					}

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Valid Form</title>
</head>
<body>
	<form action="regex_valid_form.php" method="post">
		<dl>
			<dt>Pattern</dt>
			<dd><input type="text" name="pattern" value="<?= $pattern5 ?>"></dd>

			<dt>Text</dt>
			<dd><input type="text" name="text" value="<?= $text5 ?>"></dd>

			<dt>Replace Text</dt>
			<dd><input type="text" name="replaceText" value="<?= $replaceText ?>"></dd>

			<dt>Output Text</dt>
			<dd><?=	$match ?></dd>

			<dt>Replaced Text</dt>
			<dd> <code><?=	$replacedText ?></code></dd>

			<dt>&nbsp;</dt>
			<dd><input type="submit" value="Check"></dd>
		</dl>

	</form>
</body>
</html>
