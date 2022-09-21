<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>View Record</title>
    </head>
    <body>
        <h1>View Record</h1>
        <table>
            <thead>
                <tr>
                    <th>assetTag</th>
                    <th>assignedTo</th>
                    <th>dateBought</th>
                    <th>dateDecommissioned</th>
                    <th>deviceType</th>
                    <th>operatingSystem</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?= $view->escape($record['assetTag']) ?></td>
                    <td><?= $view->escape($record['assignedTo']) ?></td>
                    <td><?= $view->escape($record['dateBought']) ?></td>
                    <td><?= $view->escape($record['dateDecommissioned']) ?></td>
                    <td><?= $view->escape($record['deviceType']) ?></td>
                    <td><?= $view->escape($record['operatingSystem']) ?></td>
                    <td>
                        <a href="?action=update&id=<?= $view->escape($record['assetTag']) ?>">Update</a> |
                        <a href="?action=delete&id=<?= $view->escape($record['assetTag']) ?>">Delete</a>
                    </td>
                </tr>
            </tbody>
        <p><a href="/">Back</a></p>
    </body>
</html>