<?
    require_once('connect.php');
    session_start();

    $input = file_get_contents('php://input');
    $data = json_decode($input, true);
    $message = array();

    $name = $data['name'];
    $gender = $data['gender'];
    $email = $data['email'];
    $contact_no = $data['contact_no'];
    $address = $data['address'];

    $query = mysqli_query($con, "insert into customers_tbl(name, gender, email, contact_number, address, dateandtime_application) values('$name','$gender','$email','$contact_no','$address', now()");
    if($query){
        http_response_code(201);
        $message['status'] = 'Success';
    }
    else {
        http_response_code(422);
        $message['status'] = 'Error';
    }

    echo json_encode($message);
    echo mysqli_error($con);
?>