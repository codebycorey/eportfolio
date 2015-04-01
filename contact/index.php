<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>Contact | Robert O'Donnell</title>

    <link href="http://www.rcodonnell.com/resources/css/style.css" rel="stylesheet">
    <!--<link href="../resources/css/style.css" rel="stylesheet">-->



  </head>

  <body>

  <?php
  //Define variables and set to empty values
  $fnameErr = $lnameErr = $emailErr = $addressErr = $cityErr = $stateErr = $zipErr = $countryErr = $phoneErr = $messageErr = $mathErr = "";
  $fname = $lname = $name = $email = $subject = $message = $math =  $spamcheck = "";
  $flag = 0;
  $thisIsMe = "rcoreyodonnell@gmail.com";
  $continue = 0;

  function test_input($data) {
      $data = trim($data);
      $data = stripcslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }


  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["fname"])) {
      $flag = 1;
      $fnameErr = "Please enter your First fname <br />";
    } else {
      $fname = test_input($_POST["fname"]);
    }

    if (empty($_POST["lname"])) {
      $flag = 1;
      $lnameErr = "Please enter your Last fname <br />";
    } else {
      $lname = test_input($_POST["lname"]);
    }

    if (empty($_POST["email"])) {
      $flag = 1;
      $emailErr = "Please enter a valid Email Address <br />";
    } else {
      $email = test_input($_POST["email"]);
      // check if e-mail address syntax is valid
      if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email)) {
        $flag = 1;
        $emailErr = "Invalid email format";
     }
    }

    if (empty($_POST["message"])) {
      $flag = 1;
      $messageErr = "Please leave a message <br />";
    } else {
      $message = test_input($_POST["message"]);
    }

    if(empty($_POST["math"])) {
      $flag = 1;
      $mathErr = "Please enter a number under Spam Check <br />";
    } else if($_POST["math"] != 25) {
      $flag = 1;
      $mathErr = "Please check your math on the Spam Check <br />";
    }

    if(!empty($_POST["spam-check"])) {
      $flag = 1;
      $spamcheck = "Please do not spam me";
    }

    if($flag == 0) {
      $name = "$fname $lname";
      mail($thisIsMe, $subject, "$name $message", "From: $email\n");
      $flag = 2;
      }

  }



  ?>
    <!-- HEADER -->
    <header>
      <div class="header">
        <div class="contained">
          <span>
            <a href="http://www.rcodonnell.com/"><img src="../resources/img/clear.gif" class="logo" alt="Robert C O'Donnell"></a>
          </span>
          <span class="cta">
            <!-- Incomplete -->
          </span>
        </div>
      </div>

      <nav id="nav">
        <ul>
          <li class=""><a href="http://www.rcodonnell.com/">Home</a></li>
          <li class=""><a href="http://www.rcodonnell.com/portfolio/">Portfolio</a></li>
          <li class=""><a href="http://www.rcodonnell.com/education/">Education</a></li>
          <li class="active"><a href="http://www.rcodonnell.com/contact/">Contact</a></li>
          <li class=""><a href="http://www.rcodonnell.com/resume/ODonnell.pdf" target="_blank">Resume</a></li>
        </ul>
      </nav>
    </header>

    <!-- Contact -->
    <section id="contact" class="container contact">
      <div class="contained">
      <h1>Get in Contact</h1>
        <!-- Question FORM -->
        <form id="contact-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
          <div>
            <label class="no-margin" for="contact-fname">First Name</label>
            <input type="text" name="fname" value="<?php if(isset($_POST['fname'])) { echo htmlentities ($_POST['fname']); }?>" id="contact-name" placeholder="First Name">
          </div>
          <div>
            <label for="contact-lname">Last Name</label>
            <input type="text" name="lname" value="<?php if(isset($_POST['lname'])) { echo htmlentities ($_POST['lname']); }?>" id="contact-lname" placeholder="Last Name">
          </div>
          <div>
            <label for="contact-email">Email Address</label>
            <input type="email" name="email" value="<?php if(isset($_POST['email'])) { echo htmlentities ($_POST['email']); }?>" id="contact-email" placeholder="email@example.com">
          </div>
          <div class="textarea">
            <label for="contact-message">Your Message</label>
            <textarea name="message" id="contact-message" placeholder="Please include any additional information pertaining to your inquiry."></textarea>
          </div>
          <div class="hidden">
            <label for="contact-spam-check">Do not fill out this field:</label>
            <input name="spam-check" type="text" value="" id="contact-spam-check">
          </div>
          <div>
            <label for="contact-spam-prevention">Spam Check<span> 10 + 15 = ?</span></label>
            <input type="text" name="math" value="<?php if(isset($_POST['math'])) { echo htmlentities ($_POST['math']); }?>" id="contact-math" placeholder="What is 10 Plus 15?">
            <input type="submit" value="Submit">
            <input type="reset" value="Reset">
          </div>
        <div id="response" class="hidden">
          <?php
            if($flag == 1) {
              echo "$fnameErr $lnameErr $emailErr $addressErr $cityErr $stateErr $zipErr $countryErr $phoneErr $messageErr $mathErr $spamcheck";
            }
            if($flag ==2) {
              echo "<h4>YOUR EMAIL SENT SUCCESSFULLY.</h4><br />";
              echo "<p>Thank you for contacting me $name, I will do my best to contact you back withing <strong>48 Hours</strong>.";
            }
          ?>
        </div>
      </form>
      </div>
      <br /><br /><br /><br /><br />
    </section>

    <!-- FOOTER -->
    <footer class="container">
      <div class="contained">
        <span>Social Channel</span>
        <span><a href="index.html">Robert C. O'Donnell</a> © 2014</span>
        <span>
          <a href="https://www.linkedin.com/in/rcodonnell" class="linkedin-color" target="_blank">LinkedIn / </a>
          <a href="https://www.facebook.com/TheRCODonnell" class="facebook-color" target="_blank">Facebook / </a>
          <a href="https://plus.google.com/u/0/+CoreyODonnell/" rel="publisher" class="google-color" target="_blank">Google+</a>
        </span>
        <span>
          <a href="http://www.rcodonnell.com">Home</a> //
          <a href="http://www.rcodonnell.com/portfolio/">Portfolio</a> //
          <a href="http://www.rcodonnell.com/education/">Education</a> //
          <a href="http://www.rcodonnell.com/contact/">Contact</a> //
          <a href="http://www.rcodonnell.com/resume/ODonnell.pdf" target="_blank">Resume</a>
        </span>
      </div>
    </footer>


    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
      ga('create', 'UA-52350725-1', 'auto');
      ga('send', 'pageview');
    </script>
</body>
</html>
