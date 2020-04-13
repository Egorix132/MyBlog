<!DOCTYPE html>
<html lang="en">

<head>
    <base href="http://localhost/blog/">
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Shareen - Personal Blog Template</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/fonts/elegant-font/style.css">
    <link href="https://fonts.googleapis.com/css?family=Cormorant:300,300i,400,400i,500,500i,600,600i,700,700i&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/fonts/font-awesome/css/font-awesome.min.css">

    <link rel="stylesheet" href="assets/styles/bootstrap.css" />
    <link rel="stylesheet" href="assets/styles/main.css" />
    <link rel="stylesheet" href="assets/styles/additional.css" />
 </head>

<body style="text-align: center;">


    <div class="auth-window">
      <div class="widget-header">
        <h4>Login</h4>
      </div>
      <form action="./index.php" method="post">
          <div class="widget-content">
              <label>Login:</label>

              <?php if(isset($array['result']['login'])){ ?>
                  <label><br><span class="error-text"><?= $array['result']['login']?></span></label>
              <?php }?>

              <p>
                <h4><input type="text" class="form-control" placeholder="Enter name" name="login" value="<?php if(isset($array['values']['login'])) echo $array['values']['login'] ?>"></h4>
              </p>
              <label>Password:</label>

              <?php if(isset($array['result']['password'])){ ?>
                  <label><br><span class="error-text"><?= $array['result']['password']?></span></label>
              <?php }?>

              <p>
                  <h4><input type="password" class="form-control" placeholder="Enter password" name="password"  value="<?php if(isset($array['values']['password'])) echo $array['values']['password'] ?>"></h4>
              </p>
              <?php if( $array['method'] == 'register'){ ?>
                  <label>Confirm Password:</label>
                  <?php if(isset($array['result']['confirm'])){ ?>
                      <label><br><span class="error-text"><?= $array['result']['confirm']?></span></label>
                  <?php }?>
                    <p>
                        <h4><input type="password" class="form-control" placeholder="Enter password" name="confirm_password"></h4>
                    </p>
                    <?php } ?>

              <input type="hidden" class="form-control-file border" name="c" value="auth">
              <input type="hidden" class="form-control-file border" name="m" value="<?= $array['method'] ?>">

              <div>
                <button type="submit">Submit</button>
                <?php if( $array['method'] == 'login'){ ?>
                    <a href="auth/register/">Not registered?</a>
                <?php } else { ?>
                    <a href="auth/login/">Already registered?</a>
                <?php } ?>
              </div>

          </div>
      </form>
    </div>



</body>

</html>
