<?php
    $title ="Purnim Realty -About Us";
?>

<?php
    include 'head.php';
?>

<body>
<div class="container">
    <?php
        include "menu1.php";
    ?>
</div>
<br>
<div class="container">
    <div class="container">
        <?php
        include "search.php";
        ?> 
    </div>
        
</div>
    <br>
    <div class="container">
            
            <!-- Email and Facebook logos begins -->
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <a class="text-decoration-none"  href="mailto:contactus@purnimonline.com " >
                            <span class="box1" style="color:black;"> Email: contactus@purnimonline.com  <img src="email_icon.png" style="width:30px;height:30px;"></span></a>
                </div>
                <br>
                <div class="col-md-6 col-sm-12">
                    <a class="text-decoration-none" href="https://www.facebook.com/people/Purnim-Poudel/100082189214495/">
                        <span class="box1" style="color:black;">
                            Contact us on Facebook  <img src="facebook_icon.jpeg" style="width:30px;height:30px;"></span></a>
                </div>
            </div>
            <br>
            <!-- Email and Facebook logos begins -->
            
            <div class="card ">
                <div class ="card-header mb-3 w-10">&nbsp;
                    <h4> Contact Us Form</h4>
                </div>
                <div class="card-body">
                    <p class ="card-body-text">
                        <form id="contact" action ="contact_action.php"  method = "POST">  
                            <div class="form-group my-2">
                                <input placeholder="Name" type="text" class="form-control" id="name" name ="name">
                            </div>
                
                            <div class="form-group my-2">
                                <input placeholder="Email" type="email" class="form-control" id="email" name ="email" required>
                            </div>
                
                            <div class="form-group my-2">
                                <input placeholder="Phone Number" type="number" class="form-control" id="phone" name ="phone" >
                            </div>
                
                            <div class="form-group my-2">
                                <input placeholder="Subject" type="text" class="form-control" id="subject" name ="subject" >
                            </div>
                
                            <div class="form-group my-2">
                                <textarea name="message" id="message" class="form-control" placeholder="Please type your message here..." required></textarea>
                            </div>
                
                            <p> 
                                <button type="submit" class="btn btn-primary" name = "submit"> Submit 
                                </button> 
                            </p>
                        </form>
                    </p>
                </div>
                <p>
                    <?php
                        include '../footer.php';
                    ?>
                </p>
            </div>
        <div>
    </div>

</body>
</html>