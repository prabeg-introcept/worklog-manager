<?php require_once '../src/Views/templates/header.php'?>
<?php require_once '../src/Views/templates/nav.view.php'?>

<div class="container">
    <h1>Edit Worklog</h1>
    <form action="/worklogs/<?= $viewData['input']['id']?>" method="post">
        <div class="mb-3">
            <label for="lastUpdatedAt" class="form-label">Last Updated At: </label>
            <input 
                type="text" 
                class="form-control" 
                readonly
                name="date"
                value="<?= date('Y-m-d, h:i A', strtotime($viewData['input']['updated_at']))?>"
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
        <input type="hidden" name="id" value="<?= $viewData['input']['id']?>">
        <input type="hidden" name="_method" value="PUT">
        <?php
            $dateCreated = strtotime(date('Y-m-d', strtotime($viewData['input']['updated_at'])));
            $dateToday = strtotime(date('Y-m-d'));
         if($dateCreated === $dateToday):?>
            <button type="submit" class="btn btn-primary">Save</button>
        <?php endif?>
    </form>
</div>

<br>
<?php if(!empty($viewData['feedback'])):?>
    <div class="container">
        <h2>Admin Feedbacks</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Created At</th>
                    <th scope="col">Feedback</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($viewData['feedback'] as $feedback): ?>
                <tr>
                    <td>
                        <?= date('Y-m-d, h:i A', strtotime($feedback->created_at))?>
                    </td>
                    <td>
                        <?= $feedback->feedback?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php endif?>

<?php require_once '../src/Views/templates/header.php'?>
