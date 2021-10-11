<?php require_once '../src/Views/templates/header.php'?>
<?php require_once '../src/Views/templates/nav.view.php'?>

<div class="container">
    <h2>My Worklogs</h2>
    <table class="table table-striped">
        <thead>
            <tr>
            <th scope="col">Created At</th>
            <th scope="col">Worklog</th>
            <th scope="col">Updated At</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($viewData as $worklog): ?>
            <tr>
                <td>
                    <?= date('Y-m-d, h:i A', strtotime($worklog->created_at))?>                             
                </td>
                <td>
                    <a href="/worklogs/<?= $worklog->id?>">
                        <?= $worklog->description?>
                    </a>
                </td>
                <td>
                    <?= date('Y-m-d, h:i A', strtotime($worklog->updated_at))?>                             
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php require_once '../src/Views/templates/header.php'?>
