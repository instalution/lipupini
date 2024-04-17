<?php

use Module\Lipupini\L18n\A;

$parentPathLastSegment = explode('/', $this->parentPath)[substr_count($this->parentPath, '/')];

require(__DIR__ . '/../Core/Open.php') ?>

<div id="folder">
<header class="app-bar">
	<nav>
		<div class="pagination previous"><a href="<?php echo $this->prevUrl ? htmlentities($this->prevUrl) : 'javascript:void(0)' ?>" class="button" title="<?php echo A::z('Previous') ?>"<?php if (! $this->prevUrl) : ?> disabled<?php endif ?>><img src="/img/arrow-left-bold.svg" alt="<?php echo A::z('Previous') ?>"></a></div>
		<div class="pagination parent"><a href="/<?php echo htmlentities($this->parentPath) ?>" class="button" title="<?php echo $this->parentPath ? htmlentities($parentPathLastSegment) : A::z('Homepage') ?>"><img src="/img/arrow-up-bold.svg" alt="<?php echo $this->parentPath ? htmlentities($parentPathLastSegment) : A::z('Homepage') ?>"></a></div>
		<div class="pagination next"><a href="<?php echo $this->nextUrl ? htmlentities($this->nextUrl) : 'javascript:void(0)' ?>" class="button" title="<?php echo A::z('Next') ?>"<?php if (!$this->nextUrl) : ?> disabled<?php endif ?>><img src="/img/arrow-right-bold.svg" alt="<?php echo A::z('Next') ?>"></a></div>
	</nav>
</header>
<main class="grid"></main>
<script>let baseUri='<?php echo addslashes($this->system->staticMediaBaseUri) ?>';let collection='<?php echo addslashes($this->collectionName) ?>';let collectionData=<?php echo json_encode($this->collectionData, JSON_THROW_ON_ERROR | JSON_UNESCAPED_SLASHES) ?>;let fileTypes=<?php echo json_encode($this->system->mediaType, JSON_THROW_ON_ERROR | JSON_UNESCAPED_SLASHES) ?></script>
<script type="module">
import { Folder } from '/js/component/Folder.js'
Folder({collection, collectionData, baseUri})
</script>
<footer>
	<div class="app-bar">
		<nav>
			<div class="pagination previous"><a href="<?php echo $this->prevUrl ? htmlentities($this->prevUrl) : 'javascript:void(0)' ?>" class="button" title="<?php echo A::z('Previous') ?>"<?php if (!$this->prevUrl) : ?> disabled<?php endif ?>><img src="/img/arrow-left-bold.svg" alt="<?php echo A::z('Previous') ?>"></a></div>
			<div class="pagination parent"></div>
			<div class="pagination next"><a href="<?php echo $this->nextUrl ? htmlentities($this->nextUrl) : 'javascript:void(0)' ?>" class="button" title="<?php echo A::z('Next') ?>"<?php if (!$this->nextUrl) : ?> disabled<?php endif ?>><img src="/img/arrow-right-bold.svg" alt="<?php echo A::z('Next') ?>"></a></div>
		</nav>
	</div>
	<div class="about">
		<a href="https://github.com/lipupini/lipupini" target="_blank" rel="noopener noreferrer" class="button" title="<?php echo A::z('More information about this software') ?>">?</a>
	</div>
</footer>
</div>

<?php require(__DIR__ . '/../Core/Close.php') ?>
