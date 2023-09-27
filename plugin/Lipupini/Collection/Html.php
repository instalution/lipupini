<?php

namespace Plugin\Lipupini\Collection;

use System\Plugin;
use Plugin\Lipupini\ActivityPub;

class Html extends Plugin {
	public function start(array $state): array {
		if (empty($state['collectionDirectory'])) { // We should be able to assume this directory exists here
			return $state;
		}

		if (!ActivityPub::getClientAccept('html')) {
			return $state;
		}

		header('Content-type: text/html');

		$this->renderHtml();

		return [...$state,
			'lipupini' => 'shutdown',
		];
	}

	public function renderHtml() {
		echo '<div>Lipupini</div>';
	}
}
