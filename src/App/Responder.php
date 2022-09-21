<?php

declare(strict_types=1);

namespace App;

use App\TemplateRenderer;

class Responder
{
    public function __construct(
        private TemplateRenderer $template
    ) {
    }

    public function notFound()
    {
        echo $this->template->render('../templates/404.php');
        http_response_code(404);
    }
}