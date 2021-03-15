<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <?php include("styles.html") ?>
    <link rel="stylesheet" href="css/profile.css">

    <title>invit.io</title>
  </head>
  <body>
    <?php include('navbar.html') ?>

    <!-- <div class="main">
      <div class="header">
        <img class="profile-pic-lg" src="media/profile-picture.jpg" alt=""> <h2>John Doe</h2>
      </div>

      <div class="content">
        <div class="left">
          <div class="invitations">
            <h4>Invitations</h4>

            <div class="event-list">
              <div class="row">
                <div class="event rounded-outline">
                  <h6>Event Title</h6>
                  <p>Event Description</p>
                </div>
                <div class="event rounded-outline">
                  <h6>Event Title</h6>
                  <p>Event Description</p>
                </div>
              </div>
              <div class="row">
                <div class="event rounded-outline">
                  <h6>Event Title</h6>
                  <p>Event Description</p>
                </div>
                <div class="event rounded-outline">
                  <h6>Event Title</h6>
                  <p>Event Description</p>
                </div>
              </div>
            </div>
          </div>

          <hr>

          <div class="user-events">
            <h4>Events Organized</h4>

            <div class="event-list">
              
                <div class="event rounded-outline">
                  <div class="row">
                    <div class="event-title">Event Title</div>
                    <div class="button-group">
                      <button class="w-4rem">Yes</button>
                      <button class="w-4rem">No</button>
                      <button class="w-4rem">Maybe</button>
                    </div>
                  </div>
                  <div class="row">
                    <button class="w-7rem">Message Host</button>
                  </div>
                  
                </div>
                <div class="event rounded-outline">
                  <h6>Event Title</h6>
                  <p>Event Description</p>
                </div>
                <div class="event rounded-outline">
                  <h6>Event Title</h6>
                  <p>Event Description</p>
                </div>
                <div class="event rounded-outline">
                  <h6>Event Title</h6>
                  <p>Event Description</p>
                </div>
            </div>
          </div>
        </div>
    
        <div class="right">
          <h5>About Me</h5>
            <div class="bio rounded-outline">
            
              <p>Event Description</p>
            </div>
        </div>
      </div>
    </div> -->
      <div class="row">
            <div class="col-9">
                <div>
                
                    <h2 style="color:black;" >Invitations</h2>
                    <div class="rcorners2">
                        <div>
                            <p style="display:inline-block; font-weight: bold;">Event</p>
                            <button style="font-size: 0.8em; float: right; margin:2px;" type="button" class="btn btn-outline-dark btn-sm py-0">Maybe</button>
                            <button style="font-size: 0.8em; float: right; margin:2px;" type="button" class="btn btn-outline-dark btn-sm py-0">No</button>
                            <button style="font-size: 0.8em; float: right; margin:2px;" type="button" class="btn btn-outline-dark btn-sm py-0">Yes</button>
                        </div>
                        <div>
                            <p style="display:inline-block; font-size: 13px;">Even Description</p>
                            <button style="font-size: 0.8em; float: right; margin:2px;" type="button" class="btn btn-outline-dark btn-sm py-0">Messaging Host</button>
                        </div>
                        <div>
                          <i id="heart1" class="far fa-share-square"></i>
                          <i id="heart2" class="far fa-heart" onclick="toggleSave()"></i>
                          
                          <span onclick="toggleSave()"><i class="far fa-heart"></i></span>
                          
                        </div>
                    </div>
                    <div class="rcorners2">
                        <div>
                            <p style="display:inline-block; font-weight: bold;">Event</p>
                            <button style="font-size: 0.8em; float: right; margin:2px;" type="button" class="btn btn-outline-dark btn-sm py-0">Attending</button>
                        </div>
                        <div>
                            <p style="display:inline-block; font-size: 13px;">Even Description</p>
                            <button style="font-size: 0.8em; float: right; margin:2px;" type="button" class="btn btn-outline-dark btn-sm py-0">Messaging Host</button>
                        </div>
                        <div>
                            <img style="float: right; width: 24px; height: 24px; margin-top:8px; margin-right:5px;" src="media/upload.png" alt="">
                            <img style="float: right; width: 24px; height: 24px; margin-top:8px; margin-right:5px;" src="media/heart.png" alt="">
                        </div>
                    </div>
                    <div class="rcorners2">
                        <div>
                            <p style="display:inline-block; font-weight: bold;">Event</p>
                            <button style="font-size: 0.8em; float: right; margin:2px;" type="button" class="btn btn-outline-dark btn-sm py-0">Attending</button>
                        </div>
                        <div>
                            <p style="display:inline-block; font-size: 13px;">Event Description</p>
                            <button style="font-size: 0.8em; float: right; margin:2px;" type="button" class="btn btn-outline-dark btn-sm py-0">Messaging Host</button>
                        </div>
                        <div>
                            <img style="float: right; width: 24px; height: 24px; margin-top:8px; margin-right:5px;" src="media/upload.png" alt="">
                            <img style="float: right; width: 24px; height: 24px; margin-top:8px; margin-right:5px;" src="media/heart.png" alt="">
                        </div>
                    </div>
                    <div class="rcorners2">
                        <div>
                            <p style="display:inline-block; font-weight: bold;">Event</p>
                            <button style="font-size: 0.8em; float: right; margin:2px;" type="button" class="btn btn-outline-dark btn-sm py-0">Denied</button>
                        </div>
                        <div>
                            <p style="display:inline-block; font-size: 13px;">Event Description</p>
                            <button style="font-size: 0.8em; float: right; margin:2px;" type="button" class="btn btn-outline-dark btn-sm py-0">Messaging Host</button>
                        </div>
                        <div>
                            <img style="float: right; width: 24px; height: 24px; margin-top:8px; margin-right:5px;" src="media/upload.png" alt="">
                            <img style="float: right; width: 24px; height: 24px; margin-top:8px; margin-right:5px;" src="media/heart.png" alt="">
                        </div>
                    </div>

                    <br></br>
                    <h2 style="color:black;" >Events Organized</h2>
                    <div class="rcorners2">
                        <div>
                            <p style="display:inline-block; font-weight: bold;">Event 1</p>
                            <button style="font-size: 0.8em; float: right; margin:2px;" type="button" class="btn btn-outline-dark btn-sm py-0">Invite</button>
                        </div>
                        <div>
                            <br></br>
                        </div>
                        <div>
                            <img style="float: right; width: 24px; height: 24px; margin-top:8px; margin-right:5px;" src="media/upload.png" alt="">
                            <img style="float: right; width: 24px; height: 24px; margin-top:8px; margin-right:5px;" src="media/heart.png" alt="">
                        </div>
                    </div>
                    <div class="rcorners2">
                        <div>
                            <p style="display:inline-block; font-weight: bold;">Event 2</p>
                            <button style="font-size: 0.8em; float: right; margin:2px;" type="button" class="btn btn-outline-dark btn-sm py-0">Invite</button>
                        </div>
                        <div>
                            <br></br>
                        </div>
                        <div>
                            <img style="float: right; width: 24px; height: 24px; margin-top:8px; margin-right:5px;" src="media/upload.png" alt="">
                            <img style="float: right; width: 24px; height: 24px; margin-top:8px; margin-right:5px;" src="media/heart.png" alt="">
                        </div>
                    </div>
                    <div class="rcorners2">
                        <div>
                            <p style="display:inline-block; font-weight: bold;">Event 2</p>
                            <button style="font-size: 0.8em; float: right; margin:2px;" type="button" class="btn btn-outline-dark btn-sm py-0">Invite</button>
                        </div>
                        <div>
                            <br></br>
                        </div>
                        <div>
                            <img style="float: right; width: 24px; height: 24px; margin-top:8px; margin-right:5px;" src="media/upload.png" alt="">
                            <img style="float: right; width: 24px; height: 24px; margin-top:8px; margin-right:5px;" src="media/heart.png" alt="">
                        </div>
                    </div>
                    <div class="rcorners2">
                        <div>
                            <p style="display:inline-block; font-weight: bold;">Event 2</p>
                            <button style="font-size: 0.8em; float: right; margin:2px;" type="button" class="btn btn-outline-dark btn-sm py-0">Invite</button>
                        </div>
                        <div>
                            <br></br>
                        </div>
                        <div> 
                            <img style="float: right; width: 24px; height: 24px; margin-top:8px; margin-right:5px;" src="media/upload.png" alt="">
                            <img style="float: right; width: 24px; height: 24px; margin-top:8px; margin-right:5px;" src="media/heart.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <h2 style="color:black;" >About me</h2>
                <div class="bio">
                    <p>Bio</p>
                </div>
            </div>
          </div>
    </div>

    <?php include('js.html') ?>
    <script src=></script>
  </body>
</html>