<?php require_once '../src/Views/templates/header.php'?>
<?php require_once '../src/Views/templates/nav.view.php'?>

<div class="container">
    <h1>Add Worklog</h1>
    <form action="/worklogs" method="post">
        <div class="mb-3">
            <label for="Date" class="form-label">Date: </label>
            <input 
                type="text" 
                class="form-control" 
                readonly
                name="date"
                value="<?= date('Y-m-d, h:i A')?>"
            />
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description*: </label>
            <textarea class="form-control" name="description" rows="3"><?= htmlspecialchars($viewData['input']['description'])?></textarea>
            <div class="error-feedback">
                <?= $viewData['error']['description']?>
            </div>
        </div>
        <input type="hidden" name="user_id" value="<?= App\Core\Session::get('user_id')?>">
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<?php require_once '../src/Views/templates/header.php'?>
