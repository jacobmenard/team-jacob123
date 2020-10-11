<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Saltzpro | E-subz</title>

    <!-- Bootstrap -->
    <link href="{{asset('/plugins/vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{asset('/plugins/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{asset('/plugins/vendors/nprogress/nprogress.css')}}" rel="stylesheet">
    <!-- Animate.css -->
    <link href="{{asset('/plugins/vendors/animate.css/animate.min.css')}}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{asset('/plugins/build/css/custom.min.css')}}" rel="stylesheet">


    <!-- fonts imports  -->
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600&display=swap" rel="stylesheet">

    <!-- global css  -->
    <link href="{{asset('/plugins/others/css/global-style.css')}}" rel="stylesheet">

    <style>

        h1.quicksand {
            font-weight: 900;
            letter-spacing: 0.5px;
        }

        .btnCont > a {
            font-weight: 800;
            font-size: 14px !important;
            margin: 0 !important;
            background: #008eff;
            border-radius: 10px;
            min-width: 100px;
            border: none;
            transition: 0.5s;
            color: #000000;
            letter-spacing: 0.3px;
        }

        .btnCont > a:hover {
            box-shadow: 0px 0px 7px 3px #00000019;
            background: #00000030;
        }

    </style>
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form>
              <h1 class="quicksand">Saltzpro E-subz</h1>
              <div>
                <input type="text" class="form-control quicksand center-align" placeholder="Username" required="" />
              </div>
              <div>
                <input type="password" class="form-control quicksand center-align" placeholder="Password" required="" />
              </div>
              <div class="btnCont flex-center-all">
                <a class="btn btn-default submit quicksand" href="index.html">Log in</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Click here to sign up
                  <a href="#signup" class="to_register"> Create an super Agent account </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <!-- <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1> -->
                  <p>2020 All Rights Reserved. Saltzpro E-subz</p>
                </div>
              </div>
            </form>
          </section>
        </div>

        <!-- <div id="register" class="animate form registration_form">
          <section class="login_content">
            <form>
              <h1 class="quicksand">Sign up</h1>
              <div>
                <input type="text" class="form-control quicksand center-align" placeholder="Username" required="" />
              </div>

              <div>
                <input type="password" class="form-control quicksand center-align" placeholder="Password" required="" />
              </div>

              <div>
                <input type="cpassword" class="form-control quicksand center-align" placeholder="Confirm password" required="" />
              </div>

              <div>
                <input type="text" class="form-control quicksand center-align" placeholder="Complete present address" required="" />
              </div>


              <div>
                <a class="btn btn-default submit" href="index.html">Submit</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Already a member ?
                  <a href="#signin" class="to_register"> Log in </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                    
                  <p>2020 All Rights Reserved. Saltzpro E-subz</p>
                </div>
              </div>
            </form>
          </section>
        </div> -->
      </div>
    </div>
  </body>
</html>
