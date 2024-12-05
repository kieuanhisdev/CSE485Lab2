
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <h3>management</h3>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">title</th>
            <th scope="col">content</th>
            <th scope="col">image</th>
            <th scope="col">created_at</th>
            <th scope="col">category_id</th>
        </tr>
        </thead>
        <tbody>
        <?php

        foreach ($news as $item) : ?>
            <tr>
              <th scope="row"><?= $item->get_id(); ?></th>
              <th ><?= $item->get_title(); ?></th>
              <th ><?= $item->get_content(); ?></th>
              <th ><?= $item->get_image(); ?></th>
              <th ><?= $item->get_created_at(); ?></th>
              <th ><?= $item->get_category_id(); ?></th>


            </tr>
        <?php endforeach;
        ?>

        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>