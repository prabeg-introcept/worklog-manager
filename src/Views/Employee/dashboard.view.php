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
            <?php foreach($viewData['worklogs'] as $worklog): ?>

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

    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <?php for($page = 1; $page <= $viewData['pages']; $page++):?>
                <li class="page-item">
                    <?= '<a class="page-link" href="/main?page='.$page.'">'.' '.$page.' '.'</a>'?>
                </li>
            <?php endfor?>
        </ul>
    </nav>

</div>

<?php require_once '../src/Views/templates/header.php'?>
