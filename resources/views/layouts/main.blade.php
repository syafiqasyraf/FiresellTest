<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- My Styles-->
    <link rel="stylesheet" href="/css/style.css">
    
    <!-- <title>FiresellSystem | {{ $title }} </title> -->
  </head>
  <body>
    <div class="card mx-auto mt-5 " style="width: 40rem;height: auto;">
      <div class="card-body ">
        <h5 class="card-title">Firesell Compentency Test</h5>
            <div style="max-height: 350px;">
              <ul>
                  <li>First time user may register their account first before they can log in.</li>
                  <li>This system will enable user to log into their account and create their todo list.</li>
                  <li>For every todo list, the user can upload images too.</li>
                  <li>Only admin can access Myadmin to view all the users.</li>
                  
              </ul>
            </div>
      </div>
    </div>

    <div class="container mt-4">
      @yield('container')

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
</html>