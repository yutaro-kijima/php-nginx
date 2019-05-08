<?php
include '../app/vendor/autoload.php';
include '../app/src/Dao/ArticleDao.php';
//TODO 隠す
$dsn = 'mysql:host=mysql;dbname=ameba_clone;charset=utf8;port=3306';
$pdo = new PDO($dsn, 'root', 'root');
$articleDao = new App\Dao\ArticleDao($pdo);

if (!empty($_POST)) {
    $articleDao->create($_POST['name'], $_POST['title'], $_POST['text']);
}


?><!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link rel='stylesheet prefetch'
        href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.min.css'>
  <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
  <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/octicons/4.4.0/font/octicons.min.css'>
  <!-- Custom css-->
  <link rel="stylesheet" href="style.css">

  <script type="javascript">
    document.getElementById("show-timeline").onclick = function () {
      document.getElementById("timeline").style.display = "block";
      document.getElementById("create-area").style.display = "none";
    };
    document.getElementById("show-create").onclick = function () {
      document.getElementById("timeline").style.display = "none";
      document.getElementById("create-area").style.display = "block";
    };
  </script>
  <title> ブログ </title>
</head>
<body>

<nav class="navbar navbar-toggleable-md fixed-top">
  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
          data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false"
          aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse container">
    <!-- Navbar navigation links -->
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" id="show-timeline"><i class="octicon octicon-home" aria-hidden="true"></i> タイムライン <span
            class="sr-only">(current)</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" id="show-create"><i class="octicon octicon-inbox"></i> 投稿　</a>
      </li>
    </ul>

  </div>
</nav>

<div class="col-6" is="timeline">
  <ol class="tweet-list">
      <?php foreach ($articleDao->read() as $tweet) { ?>
        <li class="tweet-card">
          <div class="tweet-content">
            <div class="tweet-header">
                <span class="fullname">
                  <strong><?= htmlspecialchars($tweet['title']) ?></strong>
                </span>
              <span class="username"><?= htmlspecialchars($tweet['user_name']) ?></span>
              <span class="tweet-time"><?= htmlspecialchars($tweet['created']) ?></span>
            </div>

            <div class="tweet-text">
              <p class="" lang="es" data-aria-label-part="0">
                  <?= htmlspecialchars($tweet['text']) ?>
              </p>
            </div>
            <div class="tweet-footer">

              <a class="tweet-footer-btn">
                <i class="octicon octicon-sync" aria-hidden="true"></i>
                update
              </a>
              <a class="tweet-footer-btn">
                <i class="octicon octicon-heart" aria-hidden="true"></i>
                delete
              </a>

            </div>
          </div>
        </li>
      <? } ?>

  </ol>
</div>


<div id="create-area">
  <h4>投稿画面</h4>
  <form>
    <div class="form-group">
      <label>タイトル</label>
      <input type="text" class="form-control"/>
    </div>

    <div class="form-group">
      <label>本文</label>
      <textarea class="form-control"></textarea>
    </div>

    <div class="form-group">
      <label>名前</label>
      <input type="text" class="form-control"/>
    </div>

    <!-- 送信ボタン -->
    <button type="submit" class="btn btn-default">投稿</button>
  </form>
</div>
</body>
</html>
