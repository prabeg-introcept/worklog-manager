<?php require_once '../src/Views/templates/header.php'?>

<div class="container">
    <h1>Login Page</h1>
    <form action="/login" method="post">
        <div class="mb-3">
            <label for="username" class="form-label">Username*: </label>
            <input 
                type="text" 
                class="form-control" 
                name="username"
                value="<?= $viewData['input']['username']?>" 
            />
            <div class="error-feedback">
                <?= $viewData['error']['username']?>
            </div>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password*: </label>
            <input 
                type="password" 
                class="form-control" 
                name="password"
                value="<?= $viewData['input']['password']?>" 
            />
            <div class="error-feedback">
                <?= $viewData['error']['password']?>
            </div>
        </div>
        <div class="error-feedback">
                <?= $viewData['error']['both']?>
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
    <br>
    <div>
        <p>Not Registered Yet? <a href="/register">Register Here</a></p>
    </div>
</div>
      
<?php require_once '../src/Views/templates/header.php'?>
