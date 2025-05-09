<?php
include 'header.php';
?>
<style>
::placeholder {
  color: black;
  opacity: 1; /* Firefox */
}

:-ms-input-placeholder { /* Internet Explorer 10-11 */
 color: black;
}

::-ms-input-placeholder { /* Microsoft Edge */
 color: black;
}
</style>

    <!-- Banner area -->
    <section class="banner_area" data-stellar-background-ratio="0.5">
        <h2>Contact Us</h2>
        <ol class="breadcrumb">
            <li><a href="index.php">Home</a></li>
            <li><a href="#" class="active">Contact</a></li>
        </ol>
    </section>
    <!-- End Banner area -->

    <!-- All contact Info -->
    <section class="all_contact_info">
        <div class="container">
            <div class="row contact_row">
                <div class="col-sm-6 contact_info">
                    <h2>Contact Info</h2><br>
                     <img src="images/contact.jpg" style="height: 300px;width: 450px; padding-top: 10px;"alt="">
                    <div class="location">
                        <div class="location_laft">
                            <a>location</a>
                            <a>phone</a>
                            <a>phone</a>
                            <a>email</a>
                        </div>
                        <div class="address">
                            <a href="#">Block 18,Sidheshwar Park,Meera Nagar, Jule Solapur, Solapur-4.</a>
                            <a href="tel:+91 9922885929">+91 9922885929</a>
                            <a href="tel:+91 9922400069">+91 9922400069</a>
                            <a href="mailto:atlancemspl99@gmail.com">atlancemspl99@gmail.com</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 contact_info send_message">
                    <h2>Send Us a Message</h2>
                    <form action="contactformhandler.php" class="form-inline contact_box">
                        <input type="text" class="form-control input_box" placeholder="Name *" required="" name="name">
                        <!-- <input type="text" class="form-control input_box" placeholder="Last Name *" required=""> -->
                        <input type="text" class="form-control input_box" placeholder="Your Email *" required="" name="email">
                        <input type="text" class="form-control input_box" placeholder="Subject" required="" name="subject">
                        <!-- <input type="text" class="form-control input_box" placeholder="Your Website"> -->
                        <textarea class="form-control input_box" placeholder="Message" required="" name="message"></textarea>
                        <button type="submit" class="btn btn-default">Send Message</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- End All contact Info -->
    <!-- Map -->
   <!--  <div class="contact_map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d3802.192735890858!2d75.89626091435657!3d17.641028300084674!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m1!1m0!5e0!3m2!1sen!2sin!4v1601097944677!5m2!1sen!2sin" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
    </div> -->
    <!-- End Map -->

    <!-- Footer Area -->
     <?php
    include 'footer.php';
    include 'scripts.php';
    ?>