<?php
    $title ="Purnim Realty -Home Loans Us";
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
        //include "menu2buy.php";
        ?> 
</div>

<div class="container">
    <div class="container">
        <?php 
            include 'search.php';           
        ?>
    </div>
</div> 
<br>
<div class="row">
        <br>
    <div class="col-sm-12 col-md-6 fixed">
        <!--- Loan Application card begins --->
        <div class="card">
            <!--<div class="card-body">-->
            <!--    <p class="card-text">-->
                    <form action="home_loan_application.php" method = 'POST'>
                        <button type="submit" class="btn bt-sm" name = "home_loan_application_submit"> 
                            <span class="box1">Apply for a loan</span>
                        </button>
                    </form>
            <!--    </p>-->
            <!--</div>-->
        </div>
        <!--Loan Application card ends-->
        <br>
        <!--- Monthly payment calculator card begins --->
        <div class="card">
            <div class="card-body">
                <h5> EMI Calculator</h5>
                <p class ="card-body-text">
                    <form action ="" method="POST">
                        <div class="form-group row">
                            <label for="inputprincipal" class="col col-form-label">Principal:</label>
                             <div class="col">
                                <input type="text"  class="form-control my-2" id="inputprincipal" name="principal" required>
                            </div>
                        </div>
                    
                        <div class="form-group row">
                            <label for="inputInterest" class="col col-form-label">Annual Interest Rate (%) :</label>
                             <div class="col">
                                <input type="text"  class="form-control my-2" id="inputInterest" name="interest" required>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="inputLoanTerm" class="col col-form-label">Loan Term (in years)</label>
                             <div class="col">
                                <input type="text" class="form-control my-2"  id="inputLoanTerm" name="loanterm" required>
                            </div>
                        </div>
                        
                         <button type="submit" class="btn btn-primary mb-2 my-2" name="payment_calculator">Calculate EMI</button>
                    </form>
                    <br>
                    <?php
                   
                    //mortgage calculator
                    if(isset($_POST['payment_calculator'])){
                        $principal=$_POST['principal'];
                        $interest=$_POST['interest'];
                        $interest1=$interest*0.01/12.00;
                        $loanterm=$_POST['loanterm'];
                        $loanterm_year=$loanterm*12;

                        $pw_term=pow((1+$interest1),$loanterm_year);
                        $monthly_payment=$principal*$interest1*($pw_term)/($pw_term-1);
                        $monthly_payment=round($monthly_payment,0);
                        if($monthly_payment>0){
                            ?>
                            
                            <?php
                            echo "<p> <span class=\"box1 my-2\"><b> Calculation Summary </b></span></p>";
                            echo "<p style=\"color:blue;\">";
                            echo "Loan Amount = ".$principal."<br>";
                            echo "Annual Interest Rate = ".$interest."%<br>";
                            echo "Loan Terms = ".$loanterm." years<br>";
                          echo "EMI = ".$monthly_payment." per month<br></p>";
                          echo "<hr>";
                          echo "Please note that your EMI (Equated Monthly Installment) payment amount may change depending on your Bank's fees.<br></p>";
                          ?>
                          </p>
                          <?php
                        }
                        
                    }
                    else{
                        echo "Please enter all the values into the fields.";
                    }

                    ?>
                    
                <hr>
                <p>
                    The formula used for our calculation is 
                    <p>EMI = [p*r*(1+r)^n]/[(1+r)^n-1]</p>
                    where
                    <p> p = principal amount</p>
                    <p>r = (annual percentage rate in %)/(12*100)</p>
                    <p>n = (loan terms in years)*12</p>
                </p>
            </div>
        </div>
        <!--- Monthly payment calculator card begins --->
        </div>
        
        <?php
        //Bank data
        $Banks=array(array("name"=>"Bank of Kathmandu","interest_rate"=>"9.26 % - 16.26 %"),array("name"=>"Century Bank","interest_rate"=>"10.23% - 15.23%"),array("name"=>"Citizens Bank","interest_rate"=>"10.04% - 17.04%"),array("name"=>"Civil Bank","interest_rate"=>"10.46%-15.96%"),array("name"=>"Everest Bank","interest_rate"=>"8.82 % - 15.82 %"),array("name"=>"Global IME Bank","interest_rate"=>"11.90 % - 15.40 %"),array("name"=>"Krishi Bikash Bank","interest_rate"=>"8.60% - 11.60%"),array("name"=>"Kumari Bank","interest_rate"=>"12.57% - 17.07%"),array("name"=>"Laxmi Bank","interest_rate"=>"9.85% - 14.85%"),array("name"=>"Machhapuchhre Bank","interest_rate"=>"9.86% - 16.86%"),array("name"=>"Mega Bank","interest_rate"=>"10.10% - 17.10%"),array("name"=>"NCC Bank","interest_rate"=>"9.35% - 16.35%"),array("name"=>"Nepal Bangladesh Bank","interest_rate"=>"9.99% - 14.10%"),array("name"=>"Nepal SBI Bank","interest_rate"=>"9.61 % - 15.61 %"),array("name"=>"NIC Asia Bank","interest_rate"=>"9.35% - 16.35%"),array("name"=>"Prime Commercial Bank","interest_rate"=>"9.96 % - 16.95 %"),array("name"=>"Sanima Bank","interest_rate"=>"9.40% - 16.40%"),array("name"=>"Siddhartha Bank","interest_rate"=>"9.34 % - 14.34 %"),array("name"=>"Standard Charted Bank","interest_rate"=>"10.25% - 13.81%"),array("name"=>"Sunrise Bank","interest_rate"=>"10.01% - 16.01%"));
        ?>
        <div class="col-sm-12 col-md-6 scrollit">
        
        <div class="card">
            <!--<div class ="card-header">-->
            <p class="card-tex">
                <h5> Selected List of Banks</h5>
            <!--</div>-->
        <!--</div>-->
        
        <!-- Bank table div begins -->
        <!--<div>-->
            <table class="table table-hover table-sm">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">Bank Name</th>
                    <th scope="col">Interest Rate</th>
                    </tr>
                </thead>
                <?php
                $Banks_length=count($Banks);
        
            for($i=0;$i<$Banks_length;$i++){
                echo "<tr>";
                echo "<td> ".$Banks[$i]['name']."</td>";
                echo "<td> ".$Banks[$i]['interest_rate']."</td>";
                $Bank_name=$Banks[$i]['name'];
                
            }
            ?>
            </table>
            </p>
            
        </div>
        <!-- Bank table div ends -->
        <br>
            
        </div>
        </div>
        <p>
                <?php
                include '../footer.php';
                ?>
            </p>
        <!--- Partner Banks card ends --->
    </div>

</body>
</html>
