<?php

include 'include/config.php';
include ('include/functions.php');
 if(isset($_POST['submit'])){
    //print_r($_POST); die;
  $name=$_POST['name'];
 $email=$_POST['email'];
  $phone=$_POST['phone'];
  $subject=$_POST['subject'];
    $message=$_POST['message'];

  $sql=$obj->query("insert into tbl_enquiry set name='$name',email='$email',phone='$phone',subject='$subject',message='$message',status=1");

 $to = "support@deepanjalisalon.com";
 $subject = "Contact Us";
 $to = "info@deepanjalisalon.com";
 $subject = "HTML email";
 $message = '<table>
 <tr>
 <td>Name</td>
 <td>'.$name.'</td>
 </tr>
 <tr>
 <td>Email</td>
 <td>'.$email.'</td>
 <td>Doe</td>
 </tr>
 <tr>
 <td>Phone</td>
 <td>'.$phone.'</td>
 <td>Doe</td>
 </tr>
 <tr>
 <td>Subject</td>
 <td>'.$subject.'</td>
 <td>Doe</td>
 </tr>
 <tr>
 <td>Message</td>
 <td>'.$message.'</td>
 <td>Doe</td>
 </tr>
</table>';

 $headers = "MIME-Version: 1.0" . "\r\n";
 $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
 $headers .= 'From: <info@gmail.com>' . "\r\n";
 $headers .= 'Cc: myboss@example.com' . "\r\n";
 mail($to,$subject,$message,$headers);
}

 ?>   
    <!-- contact -->
    <div class="mail py-5" id="contact">
        <div class="container pb-xl-5 pb-lg-3">
            <div class="price-sty position-relative mb-5">
                <h3 class="tittle text-center text-bl mb-2">Contact Us</h3>
                <span class="text-style-bot font-weight-bold">C</span>
            </div>
            <div class="row pt-4">
                <div class="col-lg-7 contctf_mail_grid_right">
                    <h3 class="sub-w3ls-headf">Please fill this form to contact with us.</h3>
                    <form action="#" method="post">
                        <div class="row">
                            <div class="col-sm-6 form-group">
                                <input class="form-control" type="text" name="name" placeholder="Name" required="">
                            </div>
                            <div class="col-sm-6 form-group">
                                <input class="form-control" type="email" name="email" placeholder="Email" required="">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 form-group">
                                <input class="form-control" type="text" name="phone" placeholder="Telephone" required="">
                            </div>
                            <div class="col-sm-6 form-group">
                                <input class="form-control" type="text" name="subject" placeholder="Subject" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <textarea placeholder="type your message here" class="form-control" required="" name="message"></textarea>
                        </div>
                        <button type="submit" name="submit" class="btn mr-2">Submit</button>
                        <button type="reset" class="btn">Clear</button>
                    </form>
                </div>
                <div class="col-lg-5 contactf-left pl-xl-5 mt-lg-0 mt-5">
                    <h3 class="sub-w3ls-headf">Contact Info</h3>
                    <div class="row contactf-mail mb-4">
                        <div class="col-md-2 col-sm-2 col-2 contact-icon-sidef text-lg-left text-center">
                            <span class="fa fa-home" aria-hidden="true"></span>
                        </div>
                        <div class="col-md-10 col-sm-10 col-10 contact-para-w3pvt">
                            <h4>Visit us</h4>
                            <p>Cologne, Ehrenfeld Gutenbergstr. 50823 Cologne, Germany</p>
                        </div>
                    </div>
                    <div class="row contactf-mail mb-4">
                        <div class="col-md-2 col-sm-2 col-2 contact-icon-sidef text-lg-left text-center">
                            <span class="fa fa-envelope" aria-hidden="true"></span>
                        </div>
                        <div class="col-md-10 col-sm-10 col-10 contact-para-w3pvt">
                            <h4>Mail us</h4>
                            <p><a href="mailto:info@example.com">info@example.com</a></p>
                        </div>
                    </div>
                    <div class="row contactf-mail mb-4">
                        <div class="col-md-2 col-sm-2 col-2 contact-icon-sidef text-lg-left text-center">
                            <span class="fa fa-phone" aria-hidden="true"></span>
                        </div>
                        <div class="col-md-10 col-sm-10 col-10 contact-para-w3pvt">
                            <h4>Call us</h4>
                            <p>+18044261149</p>
                        </div>
                    </div>
                    <div class="row contactf-mail">
                        <div class="col-md-2 col-sm-2 col-2 contact-icon-sidef text-lg-left text-center">
                            <span class="fa fa-clock-o" aria-hidden="true"></span>
                        </div>
                        <div class="col-md-10 col-sm-10 col-10 contact-para-w3pvt">
                            <h4>Work hours</h4>
                            <p>Mon-Sat 09:00 AM - 05:00PM</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    