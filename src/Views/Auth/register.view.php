<?php require_once '../src/Views/templates/header.php'?>

<div class="container">
    <h1>Registration Form</h1>
    <form action="/register" method="post">
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
            <label for="email" class="form-label">Email*: </label>
            <input 
                type="email" 
                class="form-control" 
                name="email"
                value="<?= $viewData['input']['email']?>">
            <div class="error-feedback">
                <?= $viewData['error']['email']?>
            </div>
        </div>
        <div class="mb-3">
            <label for="department" class="form-label">Department*: </label>
            <select class="form-select" name="department_id">
                <option selected value="1">Digital Marketing</option>
                <option value="2">Project Management</option>
                <option value="3">Design</option>
                <option value="4">Development</option>
                <option value="5">QA</option>
                <option value="6">Customer Support</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password*: </label>
            <input 
                type="password" 
                class="form-control" 
                name="password"
                value="<?= $viewData['input']['password']?>">
            <div class="error-feedback">
                <?= $viewData['error']['password']?>
            </div>
        </div>
        <div class="mb-3">
            <label for="confirmPassword" class="form-label">Confirm Password*: </label>
            <input 
                type="password" 
                class="form-control" 
                name="confirmPassword"
                value="<?= $viewData['input']['confirmPassword']?>">
            <div class="error-feedback">
                <?= $viewData['error']['confirmPassword']?>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Register</button>
    </form>
    <br>
    <div>
        <p>Already Registered? <a href="/login">Login Here</a></p>
    </div>
</div>

<?php require_once '../src/Views/templates/header.php'?>
