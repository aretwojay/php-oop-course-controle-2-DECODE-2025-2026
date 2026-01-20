<?php

namespace App\Lib\Abstracts;

abstract class AbstractController {

	protected function renderView(string $view, array $data = []): string {
		$viewPath = dirname(__DIR__, 3) . '/views/' . $view;
        extract($data);
        ob_start();
        require_once $viewPath;
        $content = ob_get_clean();

		return require_once dirname(__DIR__, 3) . '/views/layout.php';
	}

}