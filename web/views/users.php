<html>
    <body>
        <div class="container">
            <h3>Сортировать по</h3>
        <form action="" method="post">
            <select class="form-select" name="sort_by">
                <option value="" selected>Выберите поле</option>  
                <option value="id">id</option>
                <option value="name">имя</option>
                <option value="email">почта</option>
            </select>
            <button class="btn btn-info" type="submit" name="submit">Сортировать</button>
        </form>
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Имя</th>
                    <th scope="col">Email</th>
                    <th scope="col">Фото</th>
                    <th scope="col">Ключ</th>
                    </tr>
                </thead>
                <?php
                use work\app\database\DB;
                $query = ' SELECT * from users';
                
                if(!Empty($_POST['sort_by'])) 
                {
                    $query.=' ORDER BY '.$_POST['sort_by'].' asc';
                }
                $result =  DB::getConnection()->query($query, MYSQLI_STORE_RESULT);
                $data = $result->fetch_all();
                foreach($data as $row){
                    echo '<tr>';
                    foreach($row as $value){
                            echo "<td>$value</td>";
                    }
                    echo '</tr>';
                }
                
                ?>
                <tbody>
                </tbody>
            </table>
        </div>
    </body>
</html>