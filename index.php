<!doctype html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/style.css">
    <title>BPSセルフケア</title>
  </head>
  <body>
    <header>
      <nav class="navbar navbar-expand-md navbar-dark bg-secondary">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">BPSセルフケア</a>
         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span> 
          </button> 
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">ホーム</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">お問い合わせ</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>
    
    <body>
      <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card p-4 shadow" style="width: 100%; max-width: 400px;">
            <h2 class="text-center mb-4">ログイン</h2>

            <form name="form1" action="login_act.php" method="post">

                <div class="mb-3">
                    <label for="text" class="form-label">ID</label>
                    <input type="text" class="form-control" name="username" placeholder="IDを入力">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">パスワード</label>
                    <input type="password" class="form-control" name="password" placeholder="パスワードを入力">
                </div>
                <button type="submit" class="btn btn-primary w-100">ログイン</button>
            </form>
            <div class="text-center mt-3">
                <a href="register.html" class="text-decoration-none">パスワードをお忘れですか？</a>
            </div>
            <div class="text-center mt-2">
                <a href="register.html" class="text-decoration-none">アカウントをお持ちでない方はこちら</a>
            </div>
        </div>
    </div>

  
  </form>

    <footer class="bg-secondary text-center text-light p-1 mt-5">
      (c) compassion8008.com
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
  </body>
</html>