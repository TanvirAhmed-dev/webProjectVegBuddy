<?php   

function encrypt($password_string) {
	$encrypted_pass = password_hash($password_string, PASSWORD_DEFAULT);
    return $encrypted_pass;
}


include('../database/db_connection.php');

// echo $_POST['action'];
// echo $_POST['name'];
// echo $_POST['password'];
// echo $_POST['birth_date'];
// echo $_POST['email'];
// echo $_POST['cell_phone'];
// echo $_POST['gender'];
// echo $_POST['hobby'];
// echo $_POST['home_address'];
//echo $_POST['hidden_session'];
//echo $_POST['action'];

$name = $_POST['name'];
$password = encrypt($_POST['password']);
$birth_date = $_POST['birth_date'];
$email = $_POST['email'];
$cell_phone = $_POST['cell_phone'];
$gender = $_POST['gender'];
$hobby = $_POST['hobby'];
$home_address = $_POST['home_address'];



	$sql="select count(*) as last_user from user";
	$result=mysqli_query($conn, $sql);
	$data=mysqli_fetch_assoc($result);
	$temp2= $data['last_user']+1;//2+1
	$user_id= 'u'.$temp2;

    //for mail validation
    $sql_mail="select * from user where email='".$_POST['email']."'";
    $result_mail=mysqli_query($conn,$sql_mail);
    $num_mail=mysqli_num_rows($result_mail);
    //$data_mail=mysqli_fetch_assoc($result_email);

    if($num_mail>0){
        echo "<script>alert('this email is already used');location.href='../index.php';</script>";

    }
    else{
        $sql="insert into user(user_id,name,password,birth_date,email,cell_phone,gender,hobby,home_address,image,active) values('$user_id','$name','$password','$birth_date','$email','$cell_phone','$gender','$hobby','$home_address','0','0')";
        mysqli_query($conn, $sql);
    }



//properly kaj kore
// $sql="insert into user(user_id,name,password,birth_date,email,cell_phone,gender,hobby,home_address,image,active) values('$user_id','$name','$password','$birth_date','$email','$cell_phone','$gender','$hobby','$home_address','0','0')";

//  mysqli_query($conn, $sql);

$dest="user_pictures/".$user_id.".jpg";

//echo $patient_id;

if(isset($_FILES['image']['name'])):
	if(move_uploaded_file($_FILES['image']['tmp_name'],$dest)):
		$sqlim="update user set image=1 where user_id='".$user_id."'";
		mysqli_query($conn, $sqlim);
	else:
		echo "couldn't upload the file";
	endif;
endif;

echo "successful";

 echo "<script>alert('Request Received, You will be Notified Within 3 days via Email.');location.href='../index.php';</script>";

?>