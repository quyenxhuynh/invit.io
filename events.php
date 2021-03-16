<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <?php include("styles.html") ?>
    <link rel="stylesheet" href="css/events.css">

    <title>invit.io</title>
  </head>
  <body>
    <?php include('navbar.html') ?>

    <div class="container">
      <div class="header">
        <h2>All Events</h2>

        <!-- SORT OPTIONS -->
        <div class="btn-group btn-group-toggle" data-toggle="buttons">
          <label class="btn btn-secondary active">
            <input type="radio" name="options" id="option1" autocomplete="off" checked> Name
          </label>
          <label class="btn btn-secondary">
            <input type="radio" name="options" id="option2" autocomplete="off"> Upcoming
          </label>
          <label class="btn btn-secondary">
            <input type="radio" name="options" id="option3" autocomplete="off"> New
          </label>
        </div>
      </div>

      <!-- ALL EVENTS -->
      <div class="events-list-lg">
        <div class="event rounded-outline">
          <h5><a href="event.php">Event Name</a></h5>
          <!-- <a href="event.php"><h5>Event Name</h5></a> -->
          <p>Event Description</p>
        </div>
      </div>
      

    </div>

    <?php include('js.html') ?>
  </body>
</html>