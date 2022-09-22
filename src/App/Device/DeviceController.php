<?php

declare(strict_types=1);

namespace App\Device;

use App\Responder;
use App\TemplateRenderer;
use App\Device\DeviceMapper;

class DeviceController
{
    public function __construct(
        DeviceMapper $mapper,
        TemplateRenderer $template
    ) {
    }

    public function index()
    {
        $data = $this->mapper->getAll();
        if (! $data) {
            return (new Responder($this->template))->notFound();
        }
        return $this->template->render(
            // '../templates/home.php',
            'home.php',
            [
                'records' => $data,
                'view' => $this->template
            ]
        );
    }

    public function read(int $assetTag)
    {
        $data = $this->mapper->getById($assetTag);
        if (! $data) {
            return (new Responder($this->template))->notFound();
        }
        return $this->template->render(
            '../templates/single.php',
            [
                'record' => $data,
                'view' => $this->template
            ]
        );
    }

    public function new()
    {
        return $this->template->render(
            '../templates/create.php',
            [
                'view' => $this->template
            ]
        );
    }

    public function create(array $input)
    {
        $errors = $this->validate($input);
        if ($errors) {
            return $this->template->render(
                '../templates/create.php',
                [
                    'input'  => $input,
                    'errors' => $errors,
                    'view'   => $this->template
                ]
            );
        }

        # Need logic if this comes back false
        $this->mapper->create($input);
        header("Location: /");
    }

    public function edit(int $assetTag)
    {
        $data = $this->mapper->getById($assetTag);
        if (! $data) {
            return (new Responder($this->template))->notFound();
        }
        return $this->template->render(
            '../templates/update.php',
            [
                'record' => $data,
                'view' => $this->template
            ]
        );
    }

    public function update(array $input)
    {
        $data = $this->mapper->getById((int) $input['assetTag']);
        if (! $data) {
            return (new Responder($this->template))->notFound();
        }

        $errors = $this->validate($input);
        if ($errors) {
            return $this->template->render(
                '../templates/update.php',
                [
                    'record' => $input,
                    'errors' => $errors,
                    'view'   => $this->template
                ]
            );
        }

        # Need logic if this comes back false
        $this->mapper->update($input);
        header("Location: /");
    }

    public function deleteRequest(int $assetTag)
    {
        $data = $this->mapper->getById($assetTag);
        if (! $data) {
            return (new Responder($this->template))->notFound();
        }
        return $this->template->render(
            '../templates/delete.php',
            [
                'record' => ['assetTag' => $assetTag],
                'view'   => $this->template
            ]
        );
    }

    public function delete(int $assetTag)
    {
        $data = $this->mapper->getById($assetTag);
        if (! $data) {
            return (new Responder($this->template))->notFound();
        }

        # Need logic if this comes back false
        $this->mapper->delete($assetTag);
        header("Location: /");
    }

    private function validate(array $input): array
    {
        $errors = [];

        if (trim($input['assignedTo']) === '') {
            $errors['assignedTo'] = 'Missing assignedTo';
        }

        if (trim($input['dateBought']) === '') {
            $errors['dateBought'] = 'Missing dateBought';
        }

        if (trim($input['dateDecommissioned']) === '') {
            $errors['dateDecommissioned'] = 'Missing dateDecommissioned';
        }
        if (trim($input['deviceType']) === '') {
            $errors['deviceType'] = 'Missing deviceType';
        }

        if (trim($input['operatingSystem']) === '') {
            $errors['operatingSystem'] = 'Missing operatingSystem';
        }

        # Ideally should be in the domain/model layer
        // if (
        //     !array_key_exists('salary', $errors)
        //     && !is_numeric($input['salary'])
        //     && ctype_digit($input['salary']) === false
        // ) {
        //     $errors['salary'] = 'Salary needs to be a number';
        // }

        return $errors;
    }

}
