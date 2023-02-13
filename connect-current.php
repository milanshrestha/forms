<?php
if(isset($_POST['submit']))
{
        $checkin_date = $_POST['checkin-date'];
        $room_number = $_POST['room-number'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $info_clearness = $_POST['info-clearness'];
        $recommendation = $_POST['recommendation'];
        $room_quality = $_POST['room-quality'];
        $service_quality = $_POST['service-quality'];
        $location_quality = $_POST['location-quality'];
        $comments = $_POST['comments'];

        //connect to the database
        $conn = mysqli_connect('localhost', 'silverliningnpl_fbf', 'jVNDeehI^vkPb!zm', 'silverliningnpl_fbf');

        //insert data into table
        $sql = "INSERT INTO feedback_form (checkin_date, room_number, name, email, info_clearness, recommendation, room_quality, service_quality, location_quality, comments) VALUES ('$checkin_date', '$room_number', '$name', '$email', '$info_clearness', '$recommendation', '$room_quality', '$service_quality', '$location_quality', '$comments')";

        $query = mysqli_query($conn, $sql);

        if($query){
        $to = "milansystems.tech@gmail.com";
        $subject = "Feedback Form Submission";
        $message = "• Your Checked In Date:\n" . $checkin_date . "\n\n\n" . 
           "• Room Number:\n" .  $room_number . "\n\n\n" . 
           "• Name:\n" .  $name . "\n\n\n" . 
           "• Email:\n" .  $email . "\n\n\n" . 
           "• How would you rate the quality of the service?\n " . $service_quality . "\n\n\n" . 
           "• How likely is it that you would recommend this hotel to a friend or colleague?\n " . $recommendation . "\n\n\n" . 
           "• How clear was the information that our guest relation officer provided to you? \n" . $info_clearness . "\n\n\n" . 
           "• How was Room Quality?\n " . $room_quality . "\n\n\n" .
           "• How was Location?\n " . $location_quality . "\n\n\n" .
           "• Comments:\n " . $comments ;
        $headers = "From: " . $email;
        mail($to, $subject, $message, $headers);
        
        header('Location: thankyou.html');
        
            echo "Form submitted successfully!";
            
        }
}
?>