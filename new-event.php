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
            <form>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Event Name</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" placeholder="Christmas Party!">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Location</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" placeholder="Charlottesville, VA">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Date</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="date" value="2021-12-24" placeholder="2021-12-24">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Time</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="time" value="18:00:00" placeholder="18:00:00">
                    </div>
                </div>
                <div class="form-group row ml-2">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                        <label class="form-check-label" for="inlineRadio1">Public</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                        <label class="form-check-label" for="inlineRadio2">Private</label>
                    </div>
                </div>
                <button class="btn-blue-muted float-right px-4" type="submit">Create Event</button>
            </form>
        </p>
    </div>

    <?php include('js.html') ?>
  </body>
</html>