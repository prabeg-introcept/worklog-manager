<?php require_once '../src/Views/templates/header.php'?>
<?php require_once '../src/Views/templates/nav.view.php'?>

<div class="container">
    <h1>Feedback</h1>
    <form action="/worklog-feedback/<?= $viewData['input']['id']?>" method="post">
        <div class="row">
            <div class="col">
                <label for="createdAt" class="form-label">Created At: </label>
                <input 
                    type="text" 
                    class="form-control" 
                    readonly
                    name="date"
                    value="<?= date($viewData['input']['created_at'])?>"
                />
            </div>
            <div class="col">
                <label for="createdBy" class="form-label">Created By: </label>
                <input 
                    type="text" 
                    class="form-control" 
                    readonly
                    name="username"
                    value="<?= $viewData['input']['username']?>"
                />
            </div>
            <div class="col">
                <label for="department" class="form-label">Department: </label>
                <input 
                    type="text" 
                    class="form-control" 
                    readonly
                    name="department"
                    value="<?= $viewData['input']['department']?>"
                />
            </div>
        </div>
        <div class="mb-3">
            <label for="Description" class="form-label">Description: </label>
            <textarea class="form-control" name="description" rows="3" readonly><?= htmlspecialchars($viewData['input']['description'])?></textarea>
        </div>
        <?php if(!empty($viewData['feedback'])):?>
            <div class="container">
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

        <div class="mb-3">
            <label for="feedback" class="form-label">Feedback*: </label>
            <textarea class="form-control" name="feedback" rows="3"><?= htmlspecialchars($viewData['input']['feedback'])?></textarea>
            <div class="error-feedback">
                <?= $viewData['error']['feedback']?>
            </div>
        <br>    
        <button type="submit" class="btn btn-primary">Submit Feedback</button>
    </form>
</div>

<?php require_once '../src/Views/templates/header.php'?>
