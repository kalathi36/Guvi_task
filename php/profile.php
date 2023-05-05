<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Course Form</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
		<link rel="stylesheet" type="text/css" href="assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/profile.css">
    <script src="js/profile.js"></script>
    <script src="js/mongoose.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>
<body>
   
        

<form name="Form" onsubmit="return validateForm()" >
    <h2>Registration Form</h2>
<!----- Name ---------------------------------------------------------->
    <div class="box">
        <label>Full Name</label>
        <input type="text" name="name" id="name">
        <div class="error" id="nameErr"></div>
    </div>

<!----- Mobile Number ---------------------------------------------------------->
    <div class="box">
        <label>Mobile Number</label>
        <input type="text" name="mobile" maxlength="10" id="mobile">
        <div class="error" id="mobileErr"></div>
    </div>
<!----- Date Of Birth -------------------------------------------------------->
    <body translate="no">
  
        <script src="https://code.jquery.com/jquery-latest.min.js"></script>
        
    
        <div id="main_container">
            <div id="birth_date_input">Birth Date*<input type="date" name="dob" id="birth_date"></div>
            <br>
            <div id="calculate">submit</div>
            <h1 style="font-size: 12px;" >Age</h1>
            <div id="age_container"><span id="exact_age"><br><span id="age">0 years 0 months 11 days</span> old</span></div>
            
        </div>
    
    
        <script src="https://cpwebassets.codepen.io/assets/common/stopExecutionOnTimeout-1b93190375e9ccc259df3a57c1abc0e64599724ae30d7ea4c6877eb615f89387.js"></script>
    
      
          <script id="rendered-js">
    $(document).ready(function () {
      $("#calculate").click(function () {
        var mdate = $("#birth_date").val().toString();
        var yearThen = parseInt(mdate.substring(0, 4), 10);
        var monthThen = parseInt(mdate.substring(5, 7), 10);
        var dayThen = parseInt(mdate.substring(8, 10), 10);
    
        var today = new Date();
        var birthday = new Date(yearThen, monthThen - 1, dayThen);
    
        var differenceInMilisecond = today.valueOf() - birthday.valueOf();
    
        var year_age = Math.floor(differenceInMilisecond / 31536000000);
        var day_age = Math.floor(differenceInMilisecond % 31536000000 / 86400000);
    
        if (today.getMonth() == birthday.getMonth() && today.getDate() == birthday.getDate()) {
          alert("Happy B'day!!!");
        }
    
        var month_age = Math.floor(day_age / 30);
    
        day_age = day_age % 30;
    
        if (isNaN(year_age) || isNaN(month_age) || isNaN(day_age)) {
          $("#exact_age").text("Invalid birthday - Please try again!");
        } else
        {
          $("#exact_age").html("You are<br/><span id=\"age\">" + year_age + " years " + month_age + " months " + day_age + " days</span> old");
        }
      });
    });
    //# sourceURL=pen.js
        </script>

<!----- Gender ---------------------------------------------------------->
    <div class="box">
        <label>Gender</label>
        <div class="form-inline" id="gender">
            <label><input type="radio" name="gender" value="male"> Male</label>
            <label><input type="radio" name="gender" value="female"> Female</label> 
        </div>
        <div class="error" id="genderErr"></div>
    </div>
<!----- address ---------------------------------------------------------->
<div class="box">
    <label>Address</label>
    <input type="text" name="address" id="address">
    <div class="error" id="addressErr"></div>
</div>
        
<!----- Country ---------------------------------------------------------->

<div class="box">
    <label>Country</label>
    <select name="country" id="country">
        <option>Select</option>
        <option>London</option>
        <option>India</option>
        <option>America</option>
    </select> 
    <div class="error" id="countryErr"></div>
</div>

    <div class="box">
        <input type="submit" value="Submit">
    </div>
</form>


</body>
</html>