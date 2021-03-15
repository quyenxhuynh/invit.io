<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <?php include("styles.html") ?>
    <link rel="stylesheet" href="css/events.css">

    <title>Event Name</title>
  </head>
  <body>
    <?php include('navbar.html') ?>

    <div class="container">
      <div class="header">
        <h2>Event Name</h2>
        <div>
          <img id="heart" src="https://i.imgur.com/kDDHION.png" alt="" class="mx-1" style="width: 25px">
          <img src="https://i.imgur.com/My5FbZN.png" alt="" class="mx-1" style="width: 25px">
        </div>
        
        <!-- <input type="image" onclick='changeFav()' src="https://i.imgur.com/pw5U3Vy.png" style="width: 25px;margin-right: 7px; filter:invert(100%)"> -->
      </div>

      <div class="content">
        <div class="left rounded-outline">
          <div class="description">
            Full description and details of event. <br>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores ab voluptas aperiam modi iusto labore eveniet impedit dolore distinctio dolorem exercitationem minima ut, quod unde natus optio doloribus atque facilis, praesentium magni? Quasi, nam. Iusto, ab perspiciatis? Repellat tenetur rem facere eaque. Exercitationem ratione mollitia fugiat, itaque doloribus reprehenderit a.
          </div>
        </div>

        <div class="right rounded-outline">
          <div class="row">
            <img class="profile-pic mx-3" src="media/profile-picture.jpg" alt="">
            <h5>John Doe</h5>
          </div>
          <div class="row justify-content-center">
            Tuesday, March 23, 2021 <br>
            2:00pm
          </div>
        </div>
      </div>
    </div>

    <?php include('js.html') ?>
    <script src="js/event.js"></script>
  </body>
</html>