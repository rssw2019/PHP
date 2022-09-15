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
        <?php
        //include "menu2.php";
        ?> 
</div>

<div class="container">
    <div class="row">    
        <div class="col-sm-12 col-md-12">
            <?php 
                include 'search.php';           
            ?>
        </div>
        <br>

        <!--- Card begins --->
        <div class="card">
            <div class ="card-header">
                <h5> About Us</h5>
            </div>
            <div class="card-body">
                <p class ="card-body-text">
                    Hello and welcome to Purnim Realty! We provide a better platform for buying, renting and selling real estate properties in Nepal. Our goal is to make real estate business better than ever. If you are a potential buyer or tenant, we are here to help you search the property that best meets your needs. You can easily browse the properties and contact the sellers or our agents in this platform. If you are a seller, we can help you to list your properties so that potential buyers from all over the world can view your listings. If you want to list your real estate property on our website, please submit your information <a href="listyourpropertiesform.php"> here.</a> You can list your properties for free. We also have featured listing services for a minimal fees.
                </p>
            </div>
            <p>
                <?php
                    include '../footer.php';
                ?>
            </p>
        </div>
    </div>

</body>
</html>
