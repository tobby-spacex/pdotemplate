<?php
    $host = 'localhost';
    $user = 'root';
    $password = 'root';
    $dbmane = 'pdobase';

    // Set DSN
    $dsn = 'mysql:host='. $host . ';dbname=' . $dbmane;

    //Create a PDO instance
    $pdo = new PDO($dsn, $user, $password);


    // Установка pdo fetch options  по умолчанию для всех параметров PDO, -->fetch() может определяться пустым
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,
    PDO::FETCH_OBJ);

    # PRDO QUERY
    //$stmt = $pdo->query('SELECT * FROM posts');

    //---------------------------------------------
    //возвращает массив:-> PDO::FETCH_ASSOC
    // while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    //     echo $row['title'] . '<br>';
    // }

    //---------------------------------------------
    //возвращает объект со свойствами:-> PDO::FETCH_OBJ
    // while($row = $stmt->fetch(PDO::FETCH_OBJ)){
    //     echo $row->title . '<br>';
    // }

    //---------------------------------------------
    // для всех видов по умолчанию, для использование необходимо установить pdo fetch options по умолчанию
    //    while($row = $stmt->fetch()){
    //        echo $row->title . '<br>';
    //    }


    //<------------ PREPARE & EXECUTE -------------->
    # PREPARED STATEMENTS (prepare & execute)

    // UNSAFE
    //$sql = "SELECT * FROM posts WHERE author = '$author' ";

    // FETCH MULTIPLE POSTS

    // User Input
    $author = 'Brad';
    $is_published = false;
    $id = 1;

    // Positional Params
    // $sql = 'SELECT * FROM posts WHERE author = ?';
    // $stmt = $pdo->prepare($sql);
    // $stmt->execute([$author]);
    // $posts = $stmt->fetchAll();

    // Named Params
    // $sql = 'SELECT * FROM posts WHERE author = :author && is_published = :is_published';
    // $stmt = $pdo->prepare($sql);
    // $stmt->execute(['author' => $author, 'is_published' => $is_published]);
    // $posts = $stmt->fetchAll();

    // //var_dump($posts);
    // foreach($posts as $post){
    //     echo $post->title . '<br>';
    // }

    // FETCH SINGLE POST
    // $sql = 'SELECT * FROM posts WHERE id = :id';
    // $stmt = $pdo->prepare($sql);
    // $stmt->execute(['id' => $id]);
    // $post = $stmt->fetch();
    // // echo $post->body;
    //
    //<h1><?php echo $post->body;
    //<p><?php echo $post->title;

    // GET ROW COUNT
    // $stmt = $pdo->prepare('SELECT * FROM POSTS WHERE author = ?');
    // $stmt->execute([$author]);
    // $postCount = $stmt->rowCount();

    // echo $postCount;

    //<------------ INSERT DATA -------------->
    // $title = 'Post Five';
    // $body = 'This is post ive';
    // $author = 'Kevin';

    // $sql = 'INSERT INTO posts(title, body, author) VALUES(:title, :body, :author)';
    // $stmt = $pdo->prepare($sql);
    // $stmt->execute(['title' => $title, 'body' => $body, 'author' => $author]);
    // echo 'Post added';

    //<------------ UPDATE DATA -------------->
    // $id = 5;
    // $body = 'This is updated post Five';

    // $sql = 'UPDATE posts SET body = :body WHERE id = :id';
    // $stmt = $pdo->prepare($sql);
    // $stmt->execute(['body' => $body, 'id' => $id]);
    // echo 'Post Updated';


    //<------------ DELETE DATA -------------->
    // $id = 3;

    // $sql = 'DELETE FROM posts WHERE id = :id';
    // $stmt = $pdo->prepare($sql);
    // $stmt->execute(['id' => $id]);
    // echo 'Post Deleted';

    //<------------ SEARCH DATA -------------->
    $search = "%post%"; // <-- here should be typed the searching value
    $sql = 'SELECT * FROM posts WHERE title LIKE ?';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$search]);
    $posts = $stmt->fetchAll();

    foreach($posts as $post){
        echo $post->title . '<br>';
    }