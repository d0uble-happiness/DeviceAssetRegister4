<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Create Record</title>
    </head>
    <body>
        <h2>Create Record</h2>
        <p>Please fill this form and submit to add device record to the database.</p>
        <form action="?action=create" method="post">
            <label>assignedTo</label>
            <input type="text" name="assignedTo" value="<?= isset($input['assignedTo']) ? $view->escape($input['assignedTo']) : '' ?>">
            <span class="error"><?= isset($errors['assignedTo']) ? $view->escape($errors['assignedTo']) : '' ?></span>
            <br>
            <label>dateBought</label>
            <textarea name="dateBought"><?= isset($input['dateBought']) ? $view->escape($input['dateBought']) : '' ?></textarea>
            <span class="error"><?= isset($errors['dateBought']) ? $view->escape($errors['dateBought']) : '' ?></span>
            <br>
            <label>dateDecommissioned</label>
            <input type="text" name="dateDecommissioned" value="<?= isset($input['dateDecommissioned']) ? $view->escape($input['dateDecommissioned']) : '' ?>">
            <span class="error"><?= isset($errors['dateDecommissioned']) ? $view->escape($errors['dateDecommissioned']) : '' ?></span>
            <br>
            <label>deviceType</label>
            <textarea name="deviceType"><?= isset($input['deviceType']) ? $view->escape($input['deviceType']) : '' ?></textarea>
            <span class="error"><?= isset($errors['deviceType']) ? $view->escape($errors['deviceType']) : '' ?></span>
            <br>
            <label>operatingSystem</label>
            <input type="text" name="operatingSystem" value="<?= isset($input['operatingSystem']) ? $view->escape($input['operatingSystem']) : '' ?>">
            <span class="error"><?= isset($errors['operatingSystem']) ? $view->escape($errors['operatingSystem']) : '' ?></span>
            <br>
            <input type="submit" value="Submit">
            <a href="/">Cancel</a>
        </form>
    </body>
</html>