<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <?php include('styles.html') ?>

    <title>invit.io - Settings</title>
  </head>
  <body>
    <?php include('navbar.html') ?>

    <div class="container">
        <h2>Settings</h2>
        <p>
            <form>
                <div class="form-group row" >
                    <label class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input id="name" class="form-control" type="text" placeholder="Current User" value="Current User">
                        <span class="error_message" id="err_name"></span>
                    </div>
                </div>
                <div class="form-group row" >
                    <label class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input id="email" class="form-control" type="email" placeholder="Current Email" value="Current Email">
                        <span class="error_message" id="err_name"></span>
                    </div>
                </div>
                <div class="form-group row" >
                    <label class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input id="password" class="form-control" type="password" placeholder="*********" value="*********">
                        <span class="error_message" id="err_name"></span>
                    </div>
                </div>
                <div class="form-group row" >
                    <label class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input id="password2" class="form-control" type="password" placeholder="*********" value="*********">
                        <span class="error_message" id="err_name"></span>
                    </div>
                </div>
                <button class="btn-blue-muted float-right px-4" type="submit">Save Settings</button>
            </form>
        </p>
    </div>

    <?php include('js.html') ?>
  </body>
</html>


