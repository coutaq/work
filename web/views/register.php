<?php
echo '
<div class="container">
<h1>Регистрация</h1>
<form action="../app/controllers/UserController.php" method="post">
<label for="name" class="form-label">Ваше имя</label>
<input id="name" name="name" class="form-control">
<label for="email" class="form-label">Ваш email</label>
<input type="email" id="email" name="email" class="form-control">
<label for="photo" class="form-label">Ваше фото</label>
<input id="photo" name="photo" class="form-control">
<label for="name" class="form-label">Ваш ключ</label>
<input id="key" name="key" class="form-control">
<button type="submit" class="btn btn-primary">Зарегестрироваться</button>
</form>
</div>
'
?>