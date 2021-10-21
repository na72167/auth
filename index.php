<?php

  use \PDO;
  use \RuntimeException;
  use \Exception;
  use classes\debug\debugFunction;

  //デバック関係のメッセージも一通りまとめる。
  //デバックログスタートなどの補助的用自作関数も一通りまとめてメッセージファイルに継承する。
  debugFunction::logSessionSetUp();
  debugFunction::debug('「「「「「「「「「「「「「「「「「「「');
  debugFunction::debug('アカウント作成ページ');
  debugFunction::debug('「「「「「「「「「「「「「');
  debugFunction::debugLogStart();

  //登録処理を行う前に$formTransmission内にインスタンスを用意していないと
  //入力フォーム内にsignupクラスのgetterメソッドを使っている為,最初のホーム画面が部分的にしか映らなくなる。
  $formTransmission = new signup('','','','','','','');

  // ユーザー登録フォームから送信されたか判定
  if(!empty($_POST) && $_POST['user_register'] === '登録する'){

    debugFunction::debug('HelloWorld!');
  }

?>

<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <title><?php echo "ホーム" ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <!-- <link rel="stylesheet" href="root/css/style.css"> -->
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="./js/app.js"></script>
  </head>
  <body>

    <section>

      <main>
        <div>
          サインアップ
          <form method="post">

            <h2 class="hero__signup-title">SignUp</h2>
            <div class="hero__signup-commonMsgArea">
                  <!-- 接続エラー等のメッセージをここに出力させる。 -->
                  <!--例外処理発生時に出力されるメッセージを出す処理-->

                  <?php if(!empty($formTransmission->getCommonErr_ms())) echo $formTransmission->getCommonErr_ms();?>
                </div>

              <!-- メールアドレス入力欄 -->
              <div class="hero__signup-emailaddressField">
                <!-- 後にphpでエラー時用のスタイルを付属させる様にする。 -->

                <label class="#">
                    <!-- バリに引っかかった際には$err_msに関連するvalueが入るので、それを判定元にerrクラスを付属させる。 -->
                    <!-- value内は入力記録の保持 -->
                    <input class="hero__signup-emailForm <?php if(!empty($formTransmission->getEmailErr_ms())) echo 'err'; ?>" type="text" name="email" placeholder="Email" value="<?php if(!empty($formTransmission->getEmail())) echo $formTransmission->getEmail(); ?>">
                    <!-- 後にphpでエラーメッセージを出力させる様にする。-->
                    <div class="hero__signup-areaMsg">
                    <?php
                      if(!empty($formTransmission->getEmailErr_ms())) echo $formTransmission->getEmailErr_ms();
                    ?>
                    </div>
                </label>
              </div>

              <!-- パスワード入力 -->
              <div class="hero__signup-passwardField">
                <label class="#">
                  <!-- 後にphpでエラー時用のスタイルを付属させる様にする。 -->
                  <input class="hero__signup-passwordForm <?php if(!empty($formTransmission->getPassErr_ms())) echo 'err'; ?>" type="password" name="pass" placeholder="Password" value="<?php if(!empty($formTransmission->getPass())) echo $formTransmission->getPass(); ?>">
                  <div class="hero__signup-areaMsg">
                    <?php
                    if(!empty($formTransmission->getPassErr_ms())) echo $formTransmission->getPassErr_ms();
                    ?>
                  </div>
                </label>
              </div>

              <!-- 確認用パスワード入力 -->
              <div class="hero__signup-confirmationPasswardField">
                <!-- 後にphpでエラー時用のスタイルを付属させる様にする。 -->
                <label class="#">
                  <input class="hero__signup-passwordConfirmationForm" name="password_re" type="password" placeholder="Confirmation Password" value="<?php if(!empty($formTransmission->getPass_re())) echo $formTransmission->getPass_re(); ?>">
                </label>
                <div class="hero__signup-areaMsg">
                  <?php
                  if(!empty($formTransmission->getPassReErr_ms())) echo $formTransmission->getPassReErr_ms();
                  ?>
                </div>
              </div>

            <!-- ボタン -->
            <input type="submit" name="user_register" value="登録する">

          </form>
        </div>
      </main>

      <div>
        <div>
          <a href="login.php">ログイン</a>
        </div>
      </div>

      <div>
        <div>
          <a href="logout.php">ログアウト</a>
        </div>
      </div>

      <div>
        <div>
          <a href="withdrawal.php">退会</a>
        </div>
      </div>

    </section>
  </body>

</html>
