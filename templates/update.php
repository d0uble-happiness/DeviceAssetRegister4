<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Update Record</title>
    </head>
    <body>
        <h2>Update Record</h2>
        <p>Please edit the input values and submit to update the employee record.</p>
        <form action="?action=update&id=<?= $view->escape($record['assetTag']) ?>" method="post">
            <label>assignedTo</label>
            <input type="text" name="assignedTo" value="<?= isset($record['assignedTo']) ? $view->escape($record['assignedTo']) : '' ?>">
            <span class="error"><?= isset($errors['assignedTo']) ? $view->escape($errors['assignedTo']) : '' ?></span>
            <br>
            <label>dateBought</label>
            <textarea name="dateBought"><?= isset($record['dateBought']) ? $view->escape($record['dateBought']) : '' ?></textarea>
            <span class="error"><?= isset($errors['dateBought']) ? $view->escape($errors['dateBought']) : '' ?></span>
            <br>
            <label>dateDecommissioned</label>
            <input type="text" name="dateDecommissioned" value="<?= isset($record['dateDecommissioned']) ? $view->escape($record['dateDecommissioned']) : '' ?>">
            <span class="error"><?= isset($errors['dateDecommissioned']) ? $view->escape($errors['dateDecommissioned']) : '' ?></span>
            <br>
            <label>deviceType</label>
            <textarea name="deviceType"><?= isset($record['deviceType']) ? $view->escape($record['deviceType']) : '' ?></textarea>
            <span class="error"><?= isset($errors['deviceType']) ? $view->escape($errors['deviceType']) : '' ?></span>
            <br>
            <label>operatingSystem</label>
            <input type="text" name="operatingSystem" value="<?= isset($record['operatingSystem']) ? $view->escape($record['operatingSystem']) : '' ?>">
            <span class="error"><?= isset($errors['operatingSystem']) ? $view->escape($errors['operatingSystem']) : '' ?></span>
            <br>
            <input type="hidden" name="assetTag" value="<?= $view->escape($record['assetTag']) ?>">
            <input type="submit" value="Submit">
            <a href="/">Cancel</a>
        </form>
    </body>
</html>