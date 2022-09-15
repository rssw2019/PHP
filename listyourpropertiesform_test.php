<?php
//https://www.purnimonline.com/realty/listyourpropertiesform_test.php
// Initialize the session
session_start();

?>
 
 <?php
    $title ="Purnim Realty -Property Listing Form";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title><?php echo $title ?> </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Purnim, Purnim Realty, Purnim Real Estate, Real Estate, Real Estate in Nepal, the leading Nepalese properties, houses, buy, sell house in Nepal, buy land in Nepal - commercial plots, lands and markets - villas - apartments - bungalows - home buying and villa rentals."/>


  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" >
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>


</head>
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

<div class="card">
    <div class="card-header">
        <h5>Property Listing Form</h5>
    </div>
    <div class="card-body">
    <p class="card-text">
    <p> Please enter your property information as much as you know below. Add more details to the Seller's Message box including the exact location of the property, facing direction, road conditions, water and electricity lines, nearby cities, tourist attractions, important landmarks, or any other information that you think will add value to your listing.</p>
<form action ="listyourproperties_action_test.php"  method = "POST" enctype="multipart/form-data"> 
                
    <h5> Seller's Information</h5>
    <div class="form-group my-3">
        <label for="name">Seller's Full Name</label>
        <input type="text" class="form-control" id="name" name ="name" required>
    </div>
    <div class="form-group my-3">
        <label for="email">Seller's Email Address</label>
        <input type="email" class="form-control" id="email" name ="email">
    </div>
    <div class="form-group my-3">
        <label for="phone1">Seller's Mobile Phone (10 digits)</label>
        <input type="tel" class="form-control" id="phone1" name="phone1" placeholder="" pattern="[0-9]{4}[0-9]{6}" required>
    </div>
    <div class="form-group my-3">
        <label for="phone2">Seller's Land Line Phone (9 digits)</label>
        <input type="tel" class="form-control" id="phone2" name="phone2" placeholder="" pattern="[0-9]{3}[0-9]{6}">
    </div>
    
    <div class="form-group my-3">
        <label for="price">Price</label>
        <input type="number" min="1000" class="form-control" id="price" name ="price" required>
    </div>

    <h5> Transaction Type</h5>
    <div class="form-group my-3">
        <label for="selltype">Is this property for sell or for rent?</label>
        <select class="form-select"  id="selltype" name="selltype" required>
            <option value="Select">  </option>
            <option name ="sale" value="sale"> Sale </option>
            <option name ="rent" value="rent"> Rent </option>
        </select>
    </div>

    <h5> Property Type</h5>

    <div class="form-group my-3">
        <label for="proptype">Is this land or a house or an apartment/flat/room?</label>
        <select class="form-select"  id="proptype" name="proptype" required>
            <option value="Select">  </option>
            <option name ="land" value="land"> Land </option> 
            <option name ="house" value="house"> House </option>                        
            <option name ="apartment" value="apartment"> Apartment </option>
            <option name ="apartment" value="flat"> Flat </option>
            <option name ="apartment" value="room"> Room </option>
        </select>
    </div>
    
    <div class="form-group my-3">
        <label for="storynumber">If this is a house, how many stories/floors does it have?</label><br>
        <input type="number" min="1" max="100" class="form-control" id="storynumber" name="storynumber">
    </div>
    
    <div class="form-group my-3">
        <label for="storynumber">If this is a floor/room/appartment for rent, what is the floor level?</label>
        <select class="form-select"  type="text" id="storynumber" name="storynumber">
            <option value="Select">  </option>
            <option value ="groundfloor" name ="groundfloor"> Ground Floor </option>
            <option value ="firstfloor" name ="firstfloor"> First Floor </option>
            <option value ="secondfloor" name ="secondfloor"> Second Floor </option>
            <option value ="thirdfloor" name ="thirdfloor"> Third Floor </option>
            <option value ="fourthfloor" name ="fourthfloor"> Fourth Floor </option>
            <option value ="fifthfloor" name ="fifthfloor"> Above Fourth Floor </option>
        </select>
    </div>
    
    <div class="form-group my-3">
        <label for="bedroomnumber">If this is for sale or rent, what is the total number of bedrooms? </label>
        <input type="number" min="1" max="50" class="form-control" id="bedroomnumber" name ="bedroomnumber">
    </div>
    
    <div class="form-group my-3">
        <label for="age">If this is a house for sale or rent, how old is the house (in years)? </label>
        <input type="number" min="0" max="200" class="form-control" id="age" name ="age">
    </div>
    
    <h5> Property Address </h5>
    <div class="form-group my-3">
        <label for="district">District</label>
        <select class="form-select"  id="district" name="district" required>
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
    <div class="form-group my-3">
        <label for="vdc">Municipality</label>
        <input type="text" class="form-control" id="municipality" name ="municipality" required>
    </div>
    <div class="form-group my-3">
        <label for="ward">Ward Number</label>
        <input type="number" min="1" max="50" class="form-control" id="ward" name ="ward" required>
    </div>
     <div class="form-group my-3">
        <label for="city">City</label>
        <input type="text" class="form-control" id="city" name ="city" >
    </div>
    
    <div class="form-group my-3">
        <label for="housenumber">House Number/street number</label>
        <input type="text" class="form-control" id="housenumber" name ="housenumber" >
    </div>
    
    <div class="form-group my-3">
        <label for="street">Name of the road/street</label>
        <input type="text" class="form-control" id="street" name ="street" >
    </div>
    
     <div class="form-group my-3">
        <div class ="row">
            <div class = "col">
                <label for="area">If this is house or land for sale/rent, what is the total area?</label>
                <input type="number" min="1" class="form-control" id="area" name ="area" >
            </div>
            <div class="col">
                <label for="unit">Unit</label>
                <select class="form-select"  id="unit" name="unit" >
                    <option value="Select">  </option>
                    <option name="aana" value="aanas"> Aanas </option>
                    <option name="ropani" value="ropanis"> Ropanis </option>
                    <option name="square meters" value="square meters"> Square Meters </option>
                    <option name="sqare KM" value="square KM">  Square Km </option>
                    <option name="square feet" value="square feet"> Square ft</option>
                    <option name="haat" value="haat"> Haat  </option>
                    <option name="dhur" value="dhur"> Dhur </option>
                    <option name="kattha" value="kattha"> Kattha </option>
                    <option name="hectare" value="hectare"> Hechare </option>
                    <option name="yard" value="yard"> Square Yard </option>
                    <option name="miles" value="miles"> Square Miles </option>
                </select>
            </div>
        </div>
    </div>

    <div class="form-group my-3">
        <label for="message">Seller's Message</label>
        <textarea class="form-control" name="message" id="message" rows="3"></textarea>
    </div>
    <h5> Property Images</h5>
    <p> Upload your property images. You can upload upto five images. Your images must be less than 2MB. Only jpeg, jpg, PNG and png formats are allowed.
    </p>
    
    <div class="form-group my-3">
        <label for="image1">Image 1  </label>
        <input type="file" class="form-control-file" id="image1" name="image1">
    </div>
    
    <div class="form-group my-3">
        <label for="image2"> Image 2 </label>
        <input type="file" class="form-control-file" id="image2" name="image2">
    </div>
    
    <div class="form-group my-3">
        <label for="image3"> Image 3 </label>
        <input type="file" class="form-control-file" id="image3" name="imag3">
    </div>
    
    <div class="form-group my-3">
        <label for="image4"> Image 4 </label>
        <input type="file" class="form-control-file" id="image4" name="image4">
    </div>
    
    <div class="form-group">
        <label for="image5"> Image 5 </label>
        <input type="file" class="form-control-file" id="image5" name="image5">
    </div>
    
    <?php
    $confirmation =uniqid();
    
    ?>
    <input type="hidden" name="confirmation" value="<?php echo $confirmation; ?>">
    
    <p> <button type="submit" class="btn btn-primary my-4" name = "submit"> Submit </button> </p>
</form>
<?php
    include '../footer.php';
?>

</div>

</body>
</html>