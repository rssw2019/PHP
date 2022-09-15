<?php
    $title ="Purnim Realty -Job Application";
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
                <h5> Job Application Form</h5>
                <p>Please give us your honest answers. We will provide job trainings for you if you are selected for this position. Your answer as yes or no will not affect your selection for this job.</p>
            </div>
            <div class="card-body">
                <form action ="jobapplication_action.php"  method = "POST">  
                <div class="form-group">
                    
                    <label for="age">Age (You must be older than 18 years)</label>
                    <input type="number" min="18" class="form-control my-2" id="age" name ="age" required>
                </div>
                
                 <div class="form-group">
                    <label for="gender">What is your gender?</label>
                    <select class="form-select my-2"  id="gender" name="gender" required>
                        <option value="Select">  </option>
                        <option name ="male" value="male"> Male</option>
                        <option name ="female" value="female"> Female </option>
                    </select>
                </div>               
                
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
                    <label for="citizenshipnumber">Citizenship Number/Passport Number</label>
                    <input type="text"  class="form-control my-2" id="citizenshipnumber" name ="citizenshipnumber" required>
                </div>
                
                <div class="form-group">
                    <label for="citizenshipplace">Citizenship/Passport issued place</label>
                    <input type="text"  class="form-control my-2" id="citizenshipplace" name ="citizenshipplace" required>
                </div>
                
                <div class="form-group">
                    <label for="fathername">Father's Name</label>
                    <input type="text" class="form-control my-2" id="fathername" name ="fathername" required>
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
                    <input type="email" class="form-control my-2" id="email" name ="email">
                </div>
                
                <div class="form-group">
                    <label for="proptype">Have you done any job before?</label>
                    <select class="form-select my-2"  id="experience" name="experience" required>
                        <option value="Select">  </option>
                        <option name ="none" value="None"> No Job Experience </option>
                        <option name ="some" value="some"> Some Job Experience </option>
                        <option name ="alot" value="alot"> A Lot of Job Experience </option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="education">What is your education level?</label>
                    <select class="form-select my-2"  id="education" name="education" required>
                        <option value="Select">  </option>
                        <option name ="student" value="student"> College Student </option>
                        <option name ="recentgraduate" value="recentgradaute"> Recently Graduated  </option>
                        <option name ="longgraduate" value="longgraduate"> Graduated Long Ago </option>
                        <option name ="nocollege" value="nocollege"> No College Experience </option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="propdistrict">In which district do you want to work?</label>
                    <select class="form-select my-2"  id="district" name="district" required>
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
                    <label for="city">In which city do you want to work?</label>
                    <input type="text" class="form-control my-2" id="city" name="city">
                </div>
                
                <div class="form-group">
                    <label for="smartphone">Do you have a smart phone (Android/Apple)?</label>
                    <select class="form-select my-2"  id="smartphone" name="smartphone" required>
                        <option value="Select">  </option>
                        <option name ="yes" value="yes"> Yes</option>
                        <option name ="no" value="no"> No </option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="vibernumber">What is your Viber/WhatsApp number?</label>
                        <input type="tel" class="form-control my-2" id="phone" name="vibernumber" placeholder="" pattern="[0-9]{4}[0-9]{6}" required>
                </div>
                
                <div class="form-group">
                    <label for="realestateagent">Have you worked as a real estate agent before?</label>
                    <select class="form-select my-2"  id="realestateagent" name="realestateagent" required>
                        <option value="Select">  </option>
                        <option name ="yes" value="yes"> Yes</option>
                        <option name ="no" value="no"> No </option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="computerskills">Do you have basic computer skills?</label>
                    <select class="form-select my-2"  id="computerskills" name="computerskills" required>
                        <option value="Select">  </option>
                        <option name ="yes" value="yes"> Yes</option>
                        <option name ="no" value="no"> No </option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="internetskills">Do you have basic internet skills?</label>
                    <select class="form-select my-2"  id="internetskills" name="internetskills" required>
                        <option value="Select">  </option>
                        <option name ="yes" value="yes"> Yes</option>
                        <option name ="no" value="no"> No </option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="socialmediatype">Which social media do you use the most?</label>
                    <select class="form-select my-2"  id="socialmediatype" name="socialmediatype" required>
                        <option value="Select">  </option>
                        <option name ="facebook" value="facebook"> Facebook</option>
                        <option name ="tiktok" value="tiktok"> TikTok </option>
                        <option name ="instagram" value="instagram"> Instagram </option>
                        <option name ="snapchat" value="snapchat"> Snapchat </option>
                        <option name ="twitter" value="twitter"> Twitter </option>
                        <option name ="none" value="none"> None </option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="socialmediaact">What is your social media account name? (Facebook/TikTok/Instagram/...)?</label>
                    <input type="text" class="form-control my-2" id="socialmediaact" name="socialmediaact">
                </div>
                
                <?php
                    $confirmation =uniqid();
                    ?>
                <input type="hidden" name="confirmation" value="<?php echo $confirmation; ?>">
                <p> <button type="submit" class="btn btn-primary btn-sm my-2" name = "job_application_submit"> Submit Application</button> </p>
            </form>
            </div>
            
        </div>
        <!-- Form DIV ends -->
        
        
        
    </div>
    <!-- container div ends -->

</body>
</html>
