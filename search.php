
<div class = "container" style="background-color:darkblue; ">
<br>
<form action="searchresultview.php" method="GET"> 
    <div class="row">
    <div class="col-sm-12 col-xs-12 col-md-2">
    <!-- Minimum Price --->
        <input type="number" min="0"  name ="minprice" class="form-control form-control-sm my-2" placeholder="Min Price" required> </input> 
    </div>
    <div class="col-sm-12 col-xs-12 col-md-2">
    <!-- Maximum Price --->
        <input type="number" min="100000" name ="maxprice" class="form-control form-control-sm my-2" placeholder="Max Price" required> </input> 
    </div>
    <div class="col-sm-12 col-xs-12 col-md-2 my-2">
    <!-- Search By Discrict --->                          
        <select class="form-select form-select-sm"  name="district" required>
            <option value="" disabled selected hidden>District</option>
            <option value="Select">  </option>
            <option value ="Kathmandu" name ="Kathmandu"> Kathmandu </option>
            <option value ="Lalitpur" name ="Lalitpur"> Lalitpur </option>
            <option value ="Bhaktapur" name ="Bhaktapur"> Bhaktapur </option>
            <option value ="Kavrepalanchok" name ="Kavrepalanchok"> Kavrepalanchok </option>
            <option value ="Kaski" name ="Kaski"> Kaski </option>
            <option value ="Chitwan" name ="Chitwan"> Chitwan </option>
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
            <option value ="Eastern Rukum" name ="Eastern Rukum"> Eastern Rukum </option>
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
    <div class="col-sm-12 col-xs-12 col-md-2">
    <!---Search by Property Type ---->      
        <select class="form-select form-select-sm my-2"  name="proptype" required>
            <option value="" disabled selected hidden>Type</option>
            <option value="Select">  </option>
            <option value ="house" name ="house"> House </option>
            <option value ="land" name ="land"> Land </option>
            <option value ="room" name ="room"> Room </option>
            <option value ="flat" name ="flat"> Flat </option>
        </select>
    </div>
    <div class="col-sm-12 col-xs-12 col-md-2 my-2">
        <!---Search by Sale Type ----> 
        <select class="form-select form-select-sm"  name ="selltype" title="Transaction" required>
            <option value="" disabled selected hidden>Transaction</option>
            <option value="Select">  </option>            
            <option value = "sale" name = "sale"> Sale </option>             
            <option value = "rent" name = "rent"> Rent </option>
            <option value = "lease" name = "lease"> Lease </option>
        </select>
    </div>
    <div class="col-sm-12 col-xs-12 col-md-2">
        <!-- Submit Button -->
        <button type="submit" class="btn btn-warning btn-sm my-2" name = "searchsubmit"> Search </button> 
    </div>
</form>
</div>





