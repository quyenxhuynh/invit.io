<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <?php include('styles.html') ?>

    <title>invit.io</title>
  </head>
  <body>
    <?php include('navbar.html') ?>

    <div class="container">
        <h2>Create a New Event</h2>
        <p>
            <form onsubmit="return checkRegistration()">
                <div class="form-group row" >
                    <label class="col-sm-2 col-form-label">Event Name</label>
                    <div class="col-sm-10">
                        <input id="name" class="form-control" type="text" placeholder="Christmas Party!">
                        <span class="error_message" id="err_name"></span>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Location</label>
                    <div class="col-sm-10">
                        <input id="loc" class="form-control" type="text" placeholder="Charlottesville, VA">
                        <span class="error_message" id="err_loc"></span>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Date</label>
                    <div class="col-sm-10">
                        <input id="date" class="form-control" type="date" value="2021-12-24" placeholder="2021-12-24">
                        <span class="error_message" id="err_date"></span>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Time</label>
                    
                    <div class="col-sm-10">
                        <input id="time" class="form-control" type="time" value="18:00:00" placeholder="18:00:00">
                        <span class="error_message" id="err_time"></span>
                    </div>
                </div>
                <div class="form-group row ml-2">
                    <div class="form-check form-check-inline">
                        <input id="public" class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                        <label class="form-check-label" for="inlineRadio1">Public</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input id="private" class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                        <label class="form-check-label" for="inlineRadio2">Private</label>
                    </div>
                    <span class="error_message" id="err_public_private"></span>
                </div>
                <button class="btn-blue-muted float-right px-4" type="submit" onsubmit="return checkRegistration()">Create Event</button>
            </form>
        </p>
    </div>

    <?php include('js.html') ?>
    <script>

// check that name is less than 10 characters DONE
// check that location has a comma in it DONE
//check that date is correct
//check that the private and public has been selected
// time is already good


function checkRegistration(){

    var number_error = 0;

    var name = document.getElementById("name"); 

    if(name.value.length>100 || name.value.length == 0)
    {
      number_error++;
      document.getElementById("name").value = name.value;
      if(name.value.length>100){
        document.getElementById("err_name").innerHTML = "Event name must be less than 100 characters";
      }
      else{
        document.getElementById("err_name").innerHTML = "No name given, please enter an event name";
      }
   }   
   else {
      document.getElementById("err_name").innerHTML = "";
   }

   var loc = document.getElementById("loc"); 
   var loc_split = loc.value.split(',')

    if(!loc.value.includes(',') || !(loc_split.length==2) || !(loc_split[0].trim(' ').length>0) || !(loc_split[1].trim(' ').length>0))
    {
      number_error++;
      document.getElementById("loc").value = loc.value;
      if(loc.value == ''){
        document.getElementById("err_loc").innerHTML = "No location given, please enter an event location";
      }
      else{
        document.getElementById("err_loc").innerHTML = "Location should be in the format, \"city, state\"";
      }
      
   }   
   else {
      document.getElementById("err_loc").innerHTML = "";
   }

   var public = document.getElementById('public').checked
   var private = document.getElementById('private').checked

   if(!public && !private)
   {
    number_error++;
    document.getElementById("err_public_private").innerHTML = "Please select either public or private for your event";
   }
   else
   {
    document.getElementById("err_public_private").innerHTML = "";
   }

   if (number_error > 0)
   {
      return false;
   }
   else     // Data types and values are acceptable, format looks OK; form can be submitted.
      return true; 
    
}

</script>
  </body>
</html>



