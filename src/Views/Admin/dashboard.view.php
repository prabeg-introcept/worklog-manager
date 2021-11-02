<?php require_once '../src/Views/templates/header.php'?>
<?php require_once '../src/Views/templates/nav.view.php'?>

<div class="container">
    <h1>Worklogs</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Created At</th>
                <th scope="col">Created By</th>
                <th scope="col">Department</th>
                <th scope="col">Worklog</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($viewData['worklogs'] as $worklog): ?>

                <tr>
                    <td>
                        <?= date('Y-m-d, h:i A', strtotime($worklog->created_at))?>                             
                    </td>
                    <td>
                        <?= $worklog->username?>
                    </td>
                    <td>
                        <?= $worklog->department?>
                    </td>
                    <td>
                        <a href="/worklog-feedback/<?= $worklog->id?>">
                            <?= $worklog->description?>
                        </a>
                    </td>
                    <td>
                        <form action="/worklogs/<?= $worklog->id?>" method="POST">
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-secondary">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <?php for($page = 1; $page <= $viewData['pages']; $page++):?>
                <li class="page-item">
                    <?= '<a class="page-link" href="/admin-dashboard?page='.$page.'">'.' '.$page.' '.'</a>'?>
                </li>
            <?php endfor?>
        </ul>
    </nav>

</div>

<?php require_once '../src/Views/templates/header.php'?>
