<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Dashboard</title>
    </head>
    <body>
        <h2>Devices Details</h2>
        <a href="?action=create" >Add New Device</a>
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
        <?php foreach ($records as $row) { ?>
                <tr>
                    <td><?= $view->escape($row['assetTag']) ?></td>
                    <td><?= $view->escape($row['assignedTo']) ?></td>
                    <td><?= $view->escape($row['dateBought']) ?></td>
                    <td><?= $view->escape($row['dateDecommissioned']) ?></td>
                    <td><?= $view->escape($row['deviceType']) ?></td>
                    <td><?= $view->escape($row['operatingSystem']) ?></td>
                    <td>
                        <a href="?action=read&id=<?= $view->escape($row['assetTag']) ?>">Read</a> |
                        <a href="?action=update&id=<?= $view->escape($row['assetTag']) ?>">Update</a> |
                        <a href="?action=delete&id=<?= $view->escape($row['assetTag']) ?>">Delete</a>
                    </td>
                </tr>
        <?php } ?>
            </tbody>
        </table>
    </body>
</html>