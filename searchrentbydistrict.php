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
        include "menu2rent.php";
        ?> 
</div>

<div class="container">
    <div class="row" >

<br>


<!-- Search by city form begins -->
    <div class="d-flex container-justify-content-center">
    <br>

    

    <form action="searchrentbydistrictresultview.php" method="GET" class="w-10"> <h5> Search Rental Properties by District </h5>
           <p> Please select your rent type (room, flat, house, etc.) below. </p> 
        <div class="input-group mb-3 my-3 w-10"> 
            <select class="form-select"  name="proptype" required>
                <option value="Select">  </option>
                <option value = "room" name = "room"> Room </option>
                <option value = "flat" name = "flat"> Flat </option>
                <option value = "house" name = "house"> House </option>
                <option value = "office" name = "office"> Office Space </option>
                <option value = "land" name = "land"> Land </option>
            </select>
        </div>
        <p> Please select a district below. </p> 
        <div class="input-group mb-3">            
            <select class="form-select"  name="district" required>
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

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary" name = "searchrentbydistrictsubmit"> Submit </button>
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