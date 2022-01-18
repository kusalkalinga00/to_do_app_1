<?php

$todos = [];
if(file_exists('todo.json')) {
    $json = file_get_contents('todo.json');
    $todos = json_decode($json , true);
}


?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-do-list</title>

    <!--Bootstrap css-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>

    <div class="container">
        <div class="container mt-3 p-2 d-flex">
            <form action="newtodo.php" method="POST">
            <input type="text" name="todo_name"
            placeholder="Enter your todo">
            <button class="btn m-2 btn-primary btn-sm">New Todo</button>
            </form>
        </div>

    

    <?php foreach ($todos as $todoName => $todo): ?>
        <div class="container d-flex justify-content-center">
            <table class="table mt-5">
                <tr>
                    <td><?php echo $todoName ?></td>

                    <td>
                        <form action="delete.php" method="POST" >
                        <input type="hidden" name="todo_name" value="<?php echo $todoName ?>">
                        <button class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            </table>
        </div>
    <?php endforeach; ?>

    <script>
        const checkboxes = document.querySelectorAll('input[type=checkbox]');
        checkboxes.forEach(ch =>{
            ch.onclick = function(){
                this.parentNode.submit();
            };
        })
    </script>

    </div>
    
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>