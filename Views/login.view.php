<?require 'templates/header.php'?>

<form action="/login" method="post">
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
        <label for="">Password*: </label>
        <input 
            type="password" 
            name="password"
            value="<?= $viewData['input']['password']?>"     
        />
        <div>
            <?= $viewData['error']['Password']?>
        </div>
    </div>
    <button type="submit">Login</button>
</form>

<div>
    <p>New? Register <a href="/register">Here</a></p>
</div>
      
<?require 'templates/footer.php'?>