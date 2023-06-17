<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script type="text/javascript" src="../js/jquery-1.5.1.min.js"></script>
    <script src="../js/jquery.js" type="text/javascript"></script>
    <script src="../js/jquery.ui.core.js"></script>
    <script src="../js/jquery.ui.widget.js"></script>
    <script src="../js/jquery.validate.js" type="text/javascript"></script>
    <script src="../js/jquery.ui.datepicker.js"></script>

    <link rel="stylesheet" href="../css/signUp.css">
    <style type="text/css">
        .ui-datepicker {
            background: blanchedalmond;
            border: 1px solid red;
            color: white;
        }
    </style>
    <title>Sign Up</title>

    <script type="text/javascript">
        //http://stackoverflow.com/questions/19840301/jquery-to-validate-phone-number
        jQuery.validator.addMethod("phoneBD", function(phone_number, element) {
            phone_number = phone_number.replace(/\s+/g, "");
            return this.optional(element) || phone_number.length > 9 &&
                phone_number.match(/^[0-9]{11}$/);
        }, "Please specify a valid phone number");

        $().ready(function() {


            // validate signup form on keyup and submit
            $("#signupForm").validate({
                rules: {
                    name: {
                        required: true,
                        minlength: 2
                    },

                    password: {
                        required: true,
                        minlength: 6
                    },

                    confirm_password: {
                        required: true,
                        minlength: 6,
                        equalTo: "#password"
                    },

                    birth_date: {
                        required: true,
                        //minlength: 16
                    },

                    email: {
                        required: true,
                        email: true
                    },

                    cell_phone: {
                        required: true,
                        minlength: 11,
                        phoneBD: true
                    },

                    hobby: {
                        required: true,
                    },

                    home_address: {
                        required: true,
                        minlength: 10
                    },
                },
                messages: {
                    name: {
                        required: "This field is required",
                        minlength: "Your username must consist of at least 2 characters"
                    },

                    password: {
                        required: "Please provide a password",
                        minlength: "Password must be 6 characters long"
                    },

                    confirm_password: {
                        required: "Please provide a password",
                        minlength: "Password must be 6 characters long",
                        equalTo: "Please enter the same password as above"
                    },

                    email: {
                        required: 'This field is required',
                        email: "Please enter a valid email address"
                    },

                    cell_phone: {
                        required: "This field is required",
                        minlength: "Must consist of at least 11 characters e.g. 01715000000",
                        phoneBD: "Please use this format 01715000000"
                    },

                    hobby: {
                        required: "This field is required",
                    },

                    home_address: {
                        required: "Please enter an home address",
                        minlength: "Must be 10 characters long",
                    },
                }
            });
        });
    </script>

    <script type="text/javascript">
        $().ready(function() {
            $("#birth_date").datepicker({
                changeMonth: true,
                changeYear: true,
                yearRange: '1970:2014',
                dateFormat: 'yy-mm-dd'
            });
        });
    </script>


</head>

<body>

    <div class="main_div" style="text-align:;">
        <h3>Sign Up</h3>
        <form class="cmxform" action="signup_submit.php" id="signupForm" method="POST" enctype='multipart/form-data'>
            <table style="width: auto; height: auto; margin: 0 auto;" border="0">

                <tr class="form_input">
                    <td><label>Full Name :</label></td>
                    <td><input id="name" name="name" style="width:300px" /></td>
                </tr>

                <tr class="form_input">
                    <td><label> Password :</label></td>
                    <td><input type="password" name="password" id="password" style="width:300px" /></td>
                </tr>

                <tr class="form_input">
                    <td><label>Confirm Password :</label></td>
                    <td><input type="password" name="confirm_password" id="confirm_password" style="width:300px" /></td>
                </tr>

                <tr class="form_input">
                    <td><label>Birth Date :</label></td>
                    <td><input type="text" name="birth_date" id="birth_date" style="width:300px" /></td>
                </tr>

                <tr class="form_input">
                    <td><label>Email :</label></td>
                    <td><input type="text" name="email" id="email" style="width:300px" /></td>
                </tr>

                <tr class="form_input">
                    <td><label>Cell Phone :</label></td>
                    <td><input type="text" name="cell_phone" id="cell_phone" style="width:300px" /></td>
                </tr>

                <tr class="form_input">
                <td><label>Gender :</label></td>
							<td><input type="radio" name="gender" id="gender" size="35" value ="male"> Male &nbsp;
								<input type="radio" name="gender" id="gender" size="35" value ="female"> Female</td>
                </tr>


                <tr class="form_input">
                    <td><label>Hobby :</label></td>
                    <td><select name="hobby" id="hobby" style="width:300px">
                            <option>Selec From the List</option>
                            <option value='Programming'>Programming</option>
                            <option value='Travelling'>Travelling</option>
                            <option value='Reading Books'>Reading Books</option>
                            <option value='Swimming'>Swimming</option>
                        </select>
                    </td>
                </tr>

                <tr class="form_input">
                    <td><label>Home Address :</label></td>
                    <td><textarea style="width:300px" rows="4" cols="40" name="home_address" id="home_address"></textarea></td>
                </tr>

                <tr class="form_input">
                    <td><label>Image :</label></td>
                    <td><input type="file" name='image' style="width:185px"></td>
                </tr>
            </table>
            <!-- <p>
                <input type="hidden" name="action" id="action" value="<?= $action ?>">
                <input type="hidden" name="user_id" id="user_id" value="<?= $user_id ?>">
            </p> -->
            <br />
            <div align="center"><input style="width:100px;height:30px;background:#8CB3FF" class="button" type="submit" value="Submit"></div>

        </form>
        <img src="../images/Young_man_gesture_and_say_hi_generated-removebg-preview.png">
    </div>

    <br /><br />

    </div>
</body>

</html>