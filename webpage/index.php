<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>Form Submit!</title>
</head>
<body>
<?php
session_start();

$name = isset($_SESSION['name']) ? $_SESSION['name'] : '';
$email = isset($_SESSION['email']) ? $_SESSION['email'] : '';
$username = isset($_SESSION['username']) ? $_SESSION['username'] : '';
$password = isset($_SESSION['password']) ? $_SESSION['password'] : '';
$confirmPassword = isset($_SESSION['confirmPassword']) ? $_SESSION['confirmPassword'] : '';
$dob = isset($_SESSION['dob']) ? $_SESSION['dob'] : '';
$address = isset($_SESSION['gender']) ? $_SESSION['dob'] : '';
$city = isset($_SESSION['city']) ? $_SESSION['city'] : '';
$phone = isset($_SESSION['phone']) ? $_SESSION['phone'] : '';
$creditCard = isset($_SESSION['creditCard']) ? $_SESSION['creditCard'] : '';
$creditCardExpiry = isset($_SESSION['creditCardExpiry']) ? $_SESSION['creditCardExpiry'] : '';
$website = isset($_SESSION['website']) ? $_SESSION['website'] : '';
$gpa = isset($_SESSION['gpa']) ? $_SESSION['gpa'] : '';

$isNameValid = true;
$isEmailValid = true;
$isUsernameValid = true;
$isPasswordValid = true;
$isConfirmPasswordValid = true;
$isDobValid = true;
$isAddressValid = true;
$isCityValid = true;
$isPhoneValid = true;
$isCardValid = true;
$isCardExpiryValid = true;
$isWebsiteValid = true;
$isGpaValid = true;

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = $_REQUEST["name"];
    $email = $_REQUEST["email"];
    $username = $_REQUEST["username"];
    $password = $_REQUEST["password"];
    $confirmPassword = $_REQUEST["confirmPassword"];
    $dob = $_REQUEST["dob"];
    $address = $_REQUEST["address"];
    $city = $_REQUEST["city"];
    $phone = $_REQUEST["phone"];
    $creditCard = $_REQUEST["creditCard"];
    $creditCardExpiry = $_REQUEST["creditCardExpiry"];
    $website = $_REQUEST["website"];
    $gpa = $_REQUEST["gpa"];

    $isNameValid = preg_match("/[a-z]{2,}/i", $name);
    $isEmailValid = preg_match("/\w*@[a-z]+\.[a-z]{2,3}/i", $email);
    $isUsernameValid = preg_match("/\w{5,}/i", $username);
    $isPasswordValid = preg_match("/(\w)|(\W){8,}/", $password);
    $isConfirmPasswordValid = $password == $confirmPassword;
    $isDobValid = preg_match("/\d{2}\.\d{2}\.\d{4}/", $dob);
    $isAddressValid = !!($address);
    $isCityValid = preg_match("/[a-z][a-z \-]*[a-z]$/i", $city);
    $isPhoneValid = preg_match("/9\d \d{7}/", $phone);
    $isCardValid = preg_match("/\d{4} \d{4} \d{4} \d{4}/", $creditCard);
    $isCardExpiryValid = preg_match("/\d{2}\.\d{2}\.\d{4}/", $creditCardExpiry);
    $isWebsiteValid = preg_match("/http:\/\/\w+\.[a-z]+/i", $website);
    $isGpaValid = preg_match("/[0-3](\.[0-9]*)|4(\.[0-5]*)/", $gpa);

    $isValid = $isNameValid&&$isEmailValid&&$isUsernameValid&&$isPasswordValid&&$isConfirmPasswordValid&&$isDobValid&&$isAddressValid&&$isCityValid&&$isPhoneValid&&$isCardValid&&$isCardExpiryValid&&$isGpaValid&&$isWebsiteValid;

    if($isValid){
        header('LOCATION: registered_new_page.php', TRUE, 301);
    }
}
?>
		<h1>Registration Form</h1>

		<p>
			This form validates user input and then displays "Thank You" page.
		</p>
		
		<hr />

<div class="container">
    <div class="row">
        <div class="col">
            <h2>Please, fill below fields correctly</h2>

            <form action="index.php" method="post">
                <div class="mb-3">
                    <label for="name" class="form-label">Enter your name</label>
                    <input class="form-control <?= $isNameValid ? "" : "is-invalid" ?>" id="name" name="name" placeholder="Enter your name" value="<?= $name ?>">
                    <div class="invalid-feedback">
                        This field is required. It has to contain at least 2 chars.
                    </div>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Enter your email</label>
                    <input class="form-control <?= $isEmailValid ? "" : "is-invalid" ?>" id="email" name="email" placeholder="Enter your email" value="<?= $email ?>">
                    <div class="invalid-feedback">
                        This field is required. It should correspond to email format.
                    </div>
                </div>

                <div class="mb-3">
                    <label for="username" class="form-label">Enter username</label>
                    <input class="form-control <?= $isUsernameValid ? "" : "is-invalid" ?>" id="username" name="username" placeholder="Enter username" value="<?= $username ?>">
                    <div class="invalid-feedback">
                        This field is required. It has to contain at least 5 chars.
                    </div>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Enter password</label>
                    <input type="password"  class="form-control <?= $isPasswordValid ? "" : "is-invalid" ?>" id="password" name="password" placeholder="Enter password" value="<?= $password ?>">
                    <div class="invalid-feedback">
                        This eld is required. It has to contain at least 8 chars.
                    </div>
                </div>
                <div class="mb-3">
                    <label for="confirmPassword" class="form-label">Confirm password</label>
                    <input type="password" class="form-control <?= $isUsernameValid ? "" : "is-invalid" ?>" id="confirmPassword" name="confirmPassword" placeholder="Confirm password" value="<?= $username ?>">
                    <div class="invalid-feedback">
                        Passwords did not match.
                    </div>
                </div>
                <div class="mb-3">
                    <label for="dob" class="form-label">Date of Birth</label>
                    <input class="form-control <?= $isDobValid ? "" : "is-invalid" ?>" id="dob" name="dob" placeholder="Enter date of birth" value="<?= $dob ?>">
                    <div class="invalid-feedback">
                        Date should be written in dd.MM.yyyy format. For ex, 07.03.2019.
                    </div>
                </div>
                <div class="mb-3">
                    <label for="gender" class="form-label">Gender</label>
                    <input type="checkbox" name="gender[]" value="male">Male
                    <input type="checkbox" name="gender[]" value="female">Female
                </div>
                <div class="mb-3">
                    <label for="status" class="form-label">Marital Status</label>
                    <select name="status">
                        <option value="single">Single</option>
                        <option value="married">Married</option>
                        <option value="divorced">Divorced</option>
                        <option value="widowed">Widowed</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Enter address</label>
                    <input class="form-control <?= $isAddressValid ? "" : "is-invalid" ?>" id="address" name="address" placeholder="Enter address" value="<?= $address ?>">
                    <div class="invalid-feedback">
                        This field is required.
                    </div>
                </div>
                <div class="mb-3">
                    <label for="city" class="form-label">Enter city</label>
                    <input class="form-control <?= $isCityValid ? "" : "is-invalid" ?>" id="city" name="city" placeholder="Enter city" value="<?= $city ?>">
                    <div class="invalid-feedback">
                        This field is required.
                    </div>
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Enter phone</label>
                    <input class="form-control <?= $isPhoneValid ? "" : "is-invalid" ?>" id="phone" name="phone" placeholder="Enter phone" value="<?= $phone ?>">
                    <div class="invalid-feedback">
                        This is required field. It should follow 9 digit format. For ex, 97 1234567.
                    </div>
                </div>
                <div class="mb-3">
                    <label for="creditCard" class="form-label">Enter credit card</label>
                    <input class="form-control <?= $isCardValid ? "" : "is-invalid" ?>" id="creditCard" name="creditCard" placeholder="Enter credit card" value="<?= $creditCard ?>">
                    <div class="invalid-feedback">
                        This is required field. It should follow 16 digit format. For ex, 1234 1234 1234 1234.
                    </div>
                </div>
                <div class="mb-3">
                    <label for="creditCardExpiry" class="form-label">Enter credit card expiry date</label>
                    <input class="form-control <?= $isCardExpiryValid ? "" : "is-invalid" ?>" id="creditCardExpiry" name="creditCardExpiry" placeholder="Enter credit card expiry date" value="<?= $creditCardExpiry ?>">
                    <div class="invalid-feedback">
                        Date should be written in dd.MM.yyyy format.
                    </div>
                </div>
                <div class="mb-3">
                    <label for="website" class="form-label">Enter website</label>
                    <input class="form-control <?= $isCardExpiryValid ? "" : "is-invalid" ?>" id="website" name="website" placeholder="Enter website" value="<?= $website ?>">
                    <div class="invalid-feedback">
                        This is required field. It should match URL format. For ex, http://github.com
                    </div>
                </div>
                <div class="mb-3">
                    <label for="gpa" class="form-label">Enter GPA</label>
                    <input class="form-control <?= $isGpaValid ? "" : "is-invalid" ?>" id="gpa" name="gpa" placeholder="Enter GPA" value="<?= $gpa ?>">
                    <div class="invalid-feedback">
                        This is required field. It should be a floating point number less than 4
                    </div>
                </div>
                <div class="mb-3">
                    <input type="submit" class="btn btn-success" value="Register"/>
                </div>
            </form>
        </div>
    </div>
</div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
	</body>
</html>