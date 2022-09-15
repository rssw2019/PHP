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
        <div class="container">
            <?php
            include "search.php";
            ?> 
        </div>
    </div>
    <br>
    
    <!-- container div begins -->
    <div class="container">
        <?php
        //$bank=$_GET['bank'];
        
        ?>
        
        <!-- Application Form card DIV starts -->
            <div class ="card">
            <div class="card-header">
                <h5> Loan Application Form</h5>
            </div>
            <div class="card-body">
                <form action ="homeloanapplication_action.php"  method = "POST">  

                <div class="form-group">
                    <label for="name">Full Name</label>
                    <input type="text" class="form-control my-2" id="name" name ="name" required>
                </div>
                    
                <div class="form-group">
                    <label for="citizenship">Citizenship Status</label>
                    <select class="form-select my-2"  id="citizenship" name="citizenship" required>
                        <option value="Select">  </option>
                        <option name ="nepali" value="Nepali"> Nepali </option>
                        <option name ="nonresidentnepali" value="NRN"> Non Resident Nepali </option>
                        <option name ="foreigner" value="foreigner"> Foreign National </option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" class="form-control my-2" id="adress" name ="address" required>
                </div>
       
                
                <div class="form-group">
                    <label for="phone">Mobile Phone (10 digits)</label>
                    <input type="tel" class="form-control my-2" id="phone" name="phone" placeholder="" pattern="[0-9]{4}[0-9]{6}" required>
                </div>
                
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" class="form-control my-2" id="email" name ="email" required>
                </div>
                
                <div class="form-group">
                    <label for="proptype">Property Type</label>
                    <select class="form-select my-2"  id="proptype" name="proptype" required>
                        <option value="Select">  </option>
                        <option name ="house" value="house"> House </option>
                        <option name ="land" value="land"> Land </option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="propdistrict">Property District</label>
                    <select class="form-select my-2"  id="propdistrict" name="propdistrict" required>
                        <option value="Select">  </option>
                        <option value ="Kathmandu" name ="Kathmandu"> Kathmandu </option>
                        <option value ="Lalitpur" name ="Lalitpur"> Lalitpur </option>
                        <option value ="Bhaktapur" name ="Bhaktapur"> Bhaktapur </option>
                        <option value ="Kavrepalanchok" name ="Kavrepalanchok"> Kavrepalanchok </option>
                        <option value ="Kaski" name ="Kaski"> Kaski </option>
                        <option value ="Achham" name ="Achham"> Achham </option>
                        <option value ="Arghakhanchi" name ="Arghakhanchi"> Arghakhanchi </option>
                        <option value ="Baglung" name ="Baglung"> Baglung </option>
                        <option value ="Baitadi" name ="Baitadi"> Baitadi </option>
                        <option value ="Bajhang" name ="Bajhang"> Bajhang </option>
                        <option value ="Bajura" name ="Bajura"> Bajura </option>
                        <option value ="Banke" name ="Banke"> Banke </option>
                        <option value ="Bara" name ="Bara"> Bara </option>
                        <option value ="Bardiya" name ="Bardiya"> Bardiya </option>
                        <option value ="Bhojpur" name ="Bhojpur"> Bhojpur </option>
                        <option value ="Chitwan" name ="Chitwan"> Chitwan </option>
                        <option value ="Dadeldhura" name ="Dadeldhura"> Dadeldhura </option>
                        <option value ="Dailekh" name ="Dailekh"> Dailekh </option>
                        <option value ="Dang" name ="Dang"> Dang </option>
                        <option value ="Darchula" name ="Darchula"> Darchula </option>
                        <option value ="Dhading" name ="Dhading"> Dhading </option>
                        <option value ="Dhankuta" name ="Dhankuta"> Dhankuta </option>
                        <option value ="Dhanusha" name ="Dhanusha"> Dhanusha </option>
                        <option value ="Dolakha" name ="Dolakha"> Dolakha </option>
                        <option value ="Dolpa" name ="Dolpa"> Dolpa </option>
                        <option value ="Doti" name ="Doti"> Doti </option>
                        <option value ="Eastern Rukum" name ="Eastern Rukum"> Eastern Rukum	</option>
                        <option value ="Gorkha" name ="Gorkha"> Gorkha </option>
                        <option value ="Gulmi" name ="Gulmi"> Gulmi </option>
                        <option value ="Humla" name ="Humla"> Humla </option>
                        <option value ="Ilam" name ="Ilam"> Ilam </option>
                        <option value ="Jajarkot" name ="Jajarkot"> Jajarkot </option>
                        <option value ="Jhapa" name ="Jhapa"> Jhapa </option>
                        <option value ="Jumla" name ="Jumla"> Jumla </option>
                        <option value ="Kailali" name ="Kailali"> Kailali </option>
                        <option value ="Kalikot" name ="Kalikot"> Kalikot </option>
                        <option value ="Kanchanpur" name ="Kanchanpur"> Kanchanpur </option>
                        <option value ="Kapilvastu" name ="Kapilvastu"> Kapilvastu </option>
                        <option value ="Khotang" name ="Khotang"> Khotang </option>
                        <option value ="Lamjung" name ="Lamjung"> Lamjung </option>
                        <option value ="Mahottari" name ="Mahottari"> Mahottari </option>
                        <option value ="Makwanpur" name ="Makwanpur"> Makwanpur </option>
                        <option value ="Manang" name ="Manang"> Manang </option>
                        <option value ="Morang" name ="Morang"> Morang </option>
                        <option value ="Mugu" name ="Mugu"> Mugu </option>
                        <option value ="Mustang" name ="Mustang"> Mustang </option>
                        <option value ="Myagdi" name ="Myagdi"> Myagdi </option>
                        <option value ="Nawalpur" name ="Nawalpur"> Nawalpur </option>
                        <option value ="Nuwakot" name ="Nuwakot"> Nuwakot </option>
                        <option value ="Okhaldhunga" name ="Okhaldhunga"> Okhaldhunga </option>
                        <option value ="Palpa" name ="Palpa"> Palpa </option>
                        <option value ="Panchthar" name ="Panchthar"> Panchthar </option>
                        <option value ="Parasi" name ="Parasi"> Parasi </option>
                        <option value ="Parbat" name ="Parbat"> Parbat </option>
                        <option value ="Parsa" name ="Parsa"> Parsa </option>
                        <option value ="Pyuthan" name ="Pyuthan"> Pyuthan </option>
                        <option value ="Ramechhap" name ="Ramechhap"> Ramechhap </option>
                        <option value ="Rasuwa" name ="Rasuwa"> Rasuwa </option>
                        <option value ="Rautahat" name ="Rautahat"> Rautahat </option>
                        <option value ="Rolpa" name ="Rolpa"> Rolpa </option>
                        <option value ="Rupandehi" name ="Rupandehi"> Rupandehi</option>
                        <option value ="Salyan" name ="Salyan"> Salyan </option>
                        <option value ="Sankhuwasabha" name ="Sankhuwasabha"> Sankhuwasabha </option>
                        <option value ="Saptari" name ="Saptari"> Saptari </option>
                        <option value ="Sarlahi" name ="Sarlahi"> Sarlahi </option>
                        <option value ="Sindhuli" name ="Sindhuli"> Sindhuli </option>
                        <option value ="Sindhupalchok" name ="Sindhupalchok"> Sindhupalchok </option>
                        <option value ="Siraha" name ="Siraha"> Siraha </option>
                        <option value ="Solukhumbu" name ="Solukhumbu"> Solukhumbu </option>
                        <option value ="Sunsari" name ="Sunsari"> Sunsari </option>
                        <option value ="Surkhet" name ="Surkhet"> Surkhet </option>
                        <option value ="Syangja" name ="Syangja"> Syangja </option>
                        <option value ="Tanahun" name ="Tanahun"> Tanahun </option>
                        <option value ="Taplejung" name ="Taplejung"> Taplejung </option>
                        <option value ="Tehrathum" name ="Tehrathum"> Tehrathum </option>
                        <option value ="Udayapur" name ="Udayapur"> Udayapur </option>
                        <option value ="Western Rukum" name ="Western Rukum"> Western Rukum </option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="propmunicipality">Property Municipality</label>
                    <input type="text" class="form-control my-2" id="propmunicipality" name="propmunicipality">
                </div>
                
                <div class="form-group">
                    <label for="propward">Property Ward Number</label>
                    <input type="number" min="1" class="form-control my-2" id="propward" name="propward">
                </div>
                
                <div class="form-group">
                    <label for="propcity">Property City</label>
                    <input type="text" class="form-control my-2" id="propcity" name="propcity">
                </div>
                
                
                <div class="form-group">
                    <label for="income">What is your monthly income?</label>
                    <input type="number" min="1" class="form-control my-2" id="income" name="income" required>
                </div>
                
                <div class="form-group">
                    <label for="incomesource">What is the source of your income</label>
                    <select class="form-select my-2"  id="incomesource" name="incomesource" required>
                        <option value="Select">  </option>
                        <option name ="employment" value="Employment"> employment</option>
                        <option name ="business" value="Business"> business </option>
                        <option name ="rent" value="Rent"> Rental Income </option>
                        <option name ="other" value="Other"> Other Source </option>
                    </select>
                </div>
                
                <?php
                    $confirmation =uniqid();
                    ?>
                <input type="hidden" name="confirmation" value="<?php echo $confirmation; ?>">
                <p> <button type="submit" class="btn btn-primary btn-sm my-2" name = "home_loan_application_submit"> Submit Application</button> </p>
            </form>
            </div>
            
        </div>
        <!-- Form DIV ends -->
        
        
        
    </div>
    <!-- container div ends -->

</body>
</html>
