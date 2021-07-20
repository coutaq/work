<!DOCTYPE html>
<html>
    <body>
    <nav class="navbar navbar-dark bg-dark">
    <div class="container-fluid">
        <?php 
        use work\app\database\DB;
        use work\app\auth\auth;
            if(Auth::isAuth()){
                $query = ' SELECT name FROM users WHERE id = "'.$_SESSION['id'].'"';
                $result =  DB::getConnection()->query($query, MYSQLI_STORE_RESULT);
                echo '<p class="navbar-brand">Хай, '.$result->fetch_row()[0].'</p>';
                echo '<form method="post"><input type="submit" class="btn btn-secondary" name="logout" value="Выход" onclick="Auth::logout();"/></form>';
            }else{
                echo '<p class="navbar-brand">Вы не авторизованы!</p>';
            }
            if(array_key_exists('logout', $_POST)) {
                Auth::logout();
            }
        ?>
        </div>
    </nav>
    </body>
    <style>
        body{
            margin:0;
        }
        header{
            padding: 3px;
            background-color: tan;
            display:flex;
            justify-content: space-between;
        }
    </style>
</html>