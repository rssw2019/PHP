<?php
   //Connect the the database 
   require "../config.php";
?>
<?php
    $title ="Purnim Realty -Search by City";
?>
<?php 

//Calculating Total days from posting
function timeDiff($firstTime,$lastTime){
    // convert to unix timestamps
    $firstTime=strtotime($firstTime);
    $lastTime=strtotime($lastTime);

    // perform subtraction to get the difference (in seconds) between times
    $timeDiff=$lastTime-$firstTime;

    // return the difference
    return $timeDiff;
    }
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
        include "menu2.php";
        ?> 
</div>

<div class="container">
    <div class="row" >

<br>


<!-- Search by city form begins -->
    <div class="wrapper" >
    <br>

    <h5> Search by Major City </h5>
    <p> Please select a city from the list of cities below. </p>
    <form action="searchresltview.php" method="GET">  
        <div class="input-group mb-3">            
            <select class="form-select"  name="city">
                <option value="Select">  </option>
                <option value = "Kathmandu" name = "Kathmandu"> Kathmandu </option>
                <option value = "Pokhara" name = "Pokhara"> Pokhara </option>
                <option value = "Bharatpur" name = "Bharatpur"> Bharatpur </option>
                <option value = "Lalitpur" name = "Lalitpur"> Lalitpur </option>
                <option value = "Birgunj" name = "Birgunj"> Birgunj </option>
                <option value = "Biratnagar" name = "Biratnagar"> Biratnagar </option>
                <option value = "Dhangadhi" name = "Dhangadhi"> Dhangadhi </option>
                <option value = "Ghorahi" name = "Ghorahi"> Ghorahi </option>
                <option value = "Itahari" name = "Itahari"> Itahari </option>
                <option value = "Hetauda" name = "Hetauda"> Hetauda </option>
                <option value = "Janakpur" name = "Janakpur"> Janakpur </option>
                <option value = "Butwal" name = "Butwal"> Butwal </option>
                <option value = "Tulsipur" name = "tulsipur"> tulsipur </option>
                <option value = "Dharan" name = "Dharan"> Dharan </option>
                <option value = "Nepalgunj" name = "Nepalgunj"> Nepalgunj </option>
                <option value = "Birendranagar" name = "Birendranagar"> Birendranagar </option>
                <option value = "Kalaiya" name = "Kalaiya"> Kalaiya </option>
                <option value = "Gaighat" name = "Gaighat"> Gaighat </option>
                <option value = "Bhaktapur" name = "Bhaktapur"> Bhaktapur </option>
                <option value = "Rajbiraj" name = "Rajbiraj"> Rajbiraj </option>
                <option value = "Malangawa" name = "Malangawa"> Malangawa </option>
                <option value = "Besisahar" name = "Besisahar"> Besisahar </option>
                <option value = "Gaur" name = "Gaur"> Gaur </option>
                <option value = "Dhulikhel" name = "Dhulikhel"> Dhulikhel </option>
                <option value = "Tansen" name = "Tansen"> Tansen </option>
                <option value = "Panauti" name = "Panauti"> Panauti </option>
                <option value = "Bidur" name = "Bidur"> Bidur </option>
                <option value = "Dhankuta" name = "Dhankuta"> Dhankuta </option>
                <option value = "Khandbari" name = "Khandbari"> Khandbari </option>
                <option value = "Dipayal Silghadhi" name = "Dipayal Silghadhi"> Dipayal Silghadhi </option>
                <option value = "Ilam" name = "Ilam"> Ilam </option>
                <option value = "Bhadrapur" name = "Bhadrapur"> Bhadrapur </option>
                <option value = "Tokha" name = "Tokha"> Tokha </option>
                <option value = "Khalanga" name = "Khalanga"> Khalanga </option>
                <option value = "Bhadrapur" name = "Bhadrapur"> Bhadrapur </option>
                <option value = "Achham" name = "Achham"> 	Achham	</option>
                <option value = "Arghakhanchi" name = "Arghakhanchi"> 	Arghakhanchi	</option>
                <option value = "Baglung" name = "Baglung"> 	Baglung	</option>
                <option value = "Bajhang" name = "Bajhang"> 	Bajhang	</option>
                <option value = "Banepa" name = "Banepa"> 	Banepa	</option>
                <option value = "Banke" name = "Banke"> 	Banke	</option>
                <option value = "Barbardiya" name = "Barbardiya"> 	Barbardiya	</option>
                <option value = "Bardibas" name = "Bardibas"> 	Bardibas	</option>
                <option value = "Beni" name = "Beni"> 	Beni	</option>
                <option value = "Besisahar" name = "Besisahar"> 	Besisahar	</option>
                <option value = "Bhimdatta" name = "Bhimdatta"> 	Bhimdatta	</option>
                <option value = "Bhojpur" name = "Bhojpur"> 	Bhojpur	</option>
                <option value = "Butwal" name = "Butwal"> 	Butwal	</option>
                <option value = "Chalydandigadhi" name = "Chalydandigadhi"> 	Chalydandigadhi	</option>
                <option value = "Chandaragi" name = "Chandaragi"> 	Chandaragi	</option>
                <option value = "Chautara" name = "Chautara"> 	Chautara	</option>
                <option value = "Damak" name = "Damak"> 	Damak	</option>
                <option value = "Dasharathchand" name = "Dasharathchand"> 	Dasharathchand	</option>
                <option value = "Dhankuta" name = "Dhankuta"> 	Dhankuta	</option>
                <option value = "Dolpo" name = "Dolpo"> 	Dolpo	</option>
                <option value = "Dudhauli" name = "Dudhauli"> 	Dudhauli	</option>
                <option value = "Gamgadni" name = "Gamgadni"> 	Gamgadni	</option>
                <option value = "Gaur" name = "Gaur"> 	Gaur	</option>
                <option value = "Gorkha" name = "Gorkha"> 	Gorkha	</option>
                <option value = "Helambu" name = "Helambu"> 	Helambu	</option>
                <option value = "Humla" name = "Humla"> 	Humla	</option>
                <option value = "Jaleshwar" name = "Jaleshwar"> 	Jaleshwar	</option>
                <option value = "Jayapnthvi" name = "Jayapnthvi"> 	Jayapnthvi	</option>
                <option value = "Jiri" name = "Jiri"> 	Jiri	</option>
                <option value = "Jitpursimar" name = "Jitpursimar"> 	Jitpursimar	</option>
                <option value = "Jojarkot" name = "Jojarkot"> 	Jojarkot	</option>
                <option value = "Jomson" name = "Jomson"> 	Jomson	</option>
                <option value = "Jumla" name = "Jumla"> 	Jumla	</option>
                <option value = "Kamalamai" name = "Kamalamai"> 	Kamalamai	</option>
                <option value = "Kanchanpur" name = "Kanchanpur"> 	Kanchanpur	</option>
                <option value = "Kapilavasty" name = "Kapilavasty"> 	Kapilavasty	</option>
                <option value = "Khadbari" name = "Khadbari"> 	Khadbari	</option>
                <option value = "Khotang" name = "Khotang"> 	Khotang	</option>
                <option value = "Kusma" name = "Kusma"> 	Kusma	</option>
                <option value = "Lalbandhi" name = "Lalbandhi"> 	Lalbandhi	</option>
                <option value = "Lamjung" name = "Lamjung"> 	Lamjung	</option>
                <option value = "Liwang" name = "Liwang"> 	Liwang	</option>
                <option value = "Mahendranagar" name = "Mahendranagar"> 	Mahendranagar	</option>
                <option value = "Mai" name = "Mai"> 	Mai	</option>
                <option value = "Mangalsen" name = "Mangalsen"> 	Mangalsen	</option>
                <option value = "Manma" name = "Manma"> 	Manma	</option>
                <option value = "Manthali" name = "Manthali"> 	Manthali	</option>
                <option value = "Morang" name = "Morang"> 	Morang	</option>
                <option value = "Mugu" name = "Mugu"> 	Mugu	</option>
                <option value = "Myagdhi" name = "Myagdhi"> 	Myagdhi	</option>
                <option value = "Okhaldhunga" name = "Okhaldhunga"> 	Okhaldhunga	</option>
                <option value = "Parbat" name = "Parbat"> 	Parbat	</option>
                <option value = "Putalibazar" name = "Putalibazar"> 	Putalibazar	</option>
                <option value = "Pyuthan" name = "Pyuthan"> 	Pyuthan	</option>
                <option value = "Ramechhap" name = "Ramechhap"> 	Ramechhap	</option>
                <option value = "Rasuwa" name = "Rasuwa"> 	Rasuwa	</option>
                <option value = "Rautahat" name = "Rautahat"> 	Rautahat	</option>
                <option value = "Rolpa" name = "Rolpa"> 	Rolpa	</option>
                <option value = "Rupandehi" name = "Rupandehi"> 	Rupandehi	</option>
                <option value = "Salyan" name = "Salyan"> 	Salyan	</option>
                <option value = "Sankhuwasabha" name = "Sankhuwasabha"> 	Sankhuwasabha	</option>
                <option value = "Siddharthanagar" name = "Siddharthanagar"> 	Siddharthanagar	</option>
                <option value = "Simikot" name = "Simikot"> 	Simikot	</option>
                <option value = "Sindhulimadi" name = "Sindhulimadi"> 	Sindhulimadi	</option>
                <option value = "Sindhulipalchok" name = "Sindhulipalchok"> 	Sindhulipalchok	</option>
                <option value = "Siundhuli" name = "Siundhuli"> 	Siundhuli	</option>
                <option value = "Syangia" name = "Syangia"> 	Syangia	</option>
                <option value = "Tanahun" name = "Tanahun"> 	Tanahun	</option>
                <option value = "Tansen" name = "Tansen"> 	Tansen	</option>
                <option value = "Taplenjung" name = "Taplenjung"> 	Taplenjung	</option>
            </select>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary" name = "citysearchsubmit"> Submit </button>
    </form>
   
</div>

    <?php
        fclose($myfile);
    ?>
</div>

<br>

</body>
</html>

<?php
include '../footer.php';
?>