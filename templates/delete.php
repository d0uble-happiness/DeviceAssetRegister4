<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Delete Record</title>
    </head>
    <body>
        <h2>Delete Record</h2>
        <form action="?action=delete&id=<?= $view->escape($record['assetTag']) ?>" method="post">
            <p>Are you sure you want to delete this employee record?</p>
            <p>
                <input type="submit" value="Yes">
                <a href="/">No</a>
            </p>
            <input type="hidden" name="assetTag" value="<?= $view->escape($record['assetTag']) ?>">
        </form>

    </body>
</html>