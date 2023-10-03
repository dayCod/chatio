<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Chatio Register</title>
</head>

<body>

    <div class="container">
      <div class="row align-items-center justify-content-center" style="height: 100vh">
        <div class="col-10">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-3">Chatio Register</h5>
              <form action="{{ route('auth.register') }}" method="POST">
                @csrf
                <div class="mb-3">
                  <label class="form-label">Name</label>
                  <input name="name" type="text" class="form-control" placeholder="Jonathan Alfred">
                </div>
                <div class="mb-3">
                  <label class="form-label">Email address</label>
                  <input name="email" type="email" class="form-control" placeholder="name@example.com" required>
                </div>
                <div class="mb-3">
                  <label class="form-label">Password</label>
                  <input name="password" type="password" class="form-control" placeholder="********" required>
                </div>
                <div class="mb-3">
                  <div class="d-grid">
                    <button type="submit" class="btn btn-success">Register</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
