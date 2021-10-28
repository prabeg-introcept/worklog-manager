<?require 'templates/header.php'?>

<h1>New Task</h1>
<form method="POST" class="post-form user-form" action="/worklogs">
    <div>
        <label for="date">Date:</label>
        <input 
            name="created_at" 
            type="text" 
            value="<?= htmlspecialchars($viewData['input']['created_at'])?>" 
        />
    </div>
    <div>
        <label for="task-description">Description: </label>
        <textarea name="description" rows="12" cols="70">
            <?= htmlspecialchars($viewData['input']['description'])?>
        </textarea>
        <div>
            <?= $viewData['error']['description'];?>
        </div>
    </div>
    <input type="hidden" name="user_id" value="<?= App\Core\Session::get('user_id')?>">
    <button type="submit">Save</button>
</form>

<?require 'templates/footer.php'?>
