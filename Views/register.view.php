<?require 'templates/header.php'?>

<form action="/register" method="post">
    <div>
        <label for="">Username*: </label>
        <input 
            type="text" 
            name="username" 
            value="<?= $viewData['input']['username']?>" 
            />
        <div>
            <?= $viewData['error']['username']?>
        </div>
    </div>
    <div>
        <label for="">Email*: </label>
        <input 
            type="email" 
            name="email" 
            value="<?= $viewData['input']['email']?>"
        />
        <div>
            <?= $viewData['error']['email']?>
        </div>
    </div>
    <div>
        <label for="">Password*: </label>
        <input 
            type="password" 
            name="password" 
            value="<?= $viewData['input']['password']?>"
        />
        <div>
            <?= $viewData['error']['password']?>
        </div>
    </div>
    <div>
        <label for="">Confirm Password*: </label>
        <input 
            type="password" 
            name="confirmPassword" 
            value="<?= $viewData['input']['confirmPassword']?>"
        />
        <div>
            <?= $viewData['error']['confirmPassword']?>
        </div>
    </div>
    <button type="submit">Register</button>
</form>

<?require 'templates/footer.php'?>
