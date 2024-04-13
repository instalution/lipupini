<?php

use Module\Lipupini\Collection\Utility;
use Module\Lipupini\L18n\A;

$collectionUtility = new Utility($this->system);
$mediaTypesByExtension = $collectionUtility->mediaTypesByExtension();

require(__DIR__ . '/../Core/Open.php') ?>

<main id="folder">
<header>
	<nav>
		<div class="pagination previous"><a href="<?php echo $this->prevUrl ? htmlentities($this->prevUrl) : 'javascript:void(0)' ?>" class="button" title="<?php echo A::z('Previous') ?>"<?php if (! $this->prevUrl) : ?> disabled<?php endif ?>><img src="/img/arrow-left-bold.svg" alt="<?php echo A::z('Previous') ?>"></a></div>
		<div class="pagination parent"><a href="/<?php echo htmlentities($this->parentPath) ?>" class="button" title="<?php echo $this->parentPath ? htmlentities($this->parentPath) : A::z('Homepage') ?>"><img src="/img/arrow-up-bold.svg" alt="<?php echo $this->parentPath ? htmlentities($this->parentPath) : A::z('Homepage') ?>"></a></div>
		<div class="pagination next"><a href="<?php echo $this->nextUrl ? htmlentities($this->nextUrl) : 'javascript:void(0)' ?>" class="button" title="<?php echo A::z('Next') ?>"<?php if (!$this->nextUrl) : ?> disabled<?php endif ?>><img src="/img/arrow-right-bold.svg" alt="<?php echo A::z('Next') ?>"></a></div>
	</nav>
</header>
<main id="media-grid">
<?php
foreach ($this->collectionData as $fileName => $item) :
$extension = pathinfo($fileName, PATHINFO_EXTENSION);
if ($extension) :
switch ($mediaTypesByExtension[$extension]['mediaType']) :
case 'audio' :

$style = !empty($item['thumbnail']) ? ' style="background-image:url(\'' .  addslashes($this->system->staticMediaBaseUri . $this->collectionFolderName . '/thumbnail/' . $fileName . '.png')  . '\')"' : '';
?>

<div class="audio-container audio-waveform-seek"<?php echo $style ?>>
	<div class="caption"><a href="/@<?php echo htmlentities($this->collectionFolderName . '/' . $fileName) ?>.html"><?php echo htmlentities($item['caption']) ?></a></div>
	<div class="waveform" style="background-image:url('<?php echo addslashes($this->system->staticMediaBaseUri . $this->collectionFolderName . '/thumbnail/' . $fileName . '.waveform.png') ?>')">
		<div class="elapsed hidden"></div>
	</div>
	<audio controls="controls" preload="metadata">
		<source src="<?php echo htmlentities($this->system->staticMediaBaseUri . $this->collectionFolderName . '/audio/' . $fileName) ?>" type="<?php echo htmlentities($mediaTypesByExtension[$extension]['mimeType']) ?>">
	</audio>
</div>
<?php break;
case 'image' : ?>

<a href="/@<?php echo htmlentities($this->collectionFolderName . '/' . $fileName) ?>.html" class="image-container">
	<div style="background-image:url('<?php echo addslashes($this->system->staticMediaBaseUri . $this->collectionFolderName . '/image/thumbnail/' . $fileName) ?>')">
		<img src="/img/1x1.png" title="<?php echo htmlentities($item['caption']) ?>" loading="lazy">
	</div>
</a>
<?php break;
case 'text' : ?>

<div class="text-container">
	<a href="/@<?php echo htmlentities($this->collectionFolderName . '/' . $fileName) ?>.html">
		<div><?php echo htmlentities($item['caption']) ?></div>
	</a>
</div>
<?php break;
case 'video' : ?>

<div class="video-container">
	<video class="video-js" controls="" preload="metadata" loop="" title="<?php echo htmlentities($item['caption']) ?>" poster="<?php echo htmlentities($item['thumbnail']) ?>" data-setup="{}">
		<source src="<?php echo htmlentities($this->system->staticMediaBaseUri . $this->collectionFolderName . '/video/' . $fileName) ?>" type="<?php echo htmlentities($mediaTypesByExtension[$extension]['mimeType']) ?>">
	</video>
</div>
<?php break;
endswitch;
else : ?>

<div class="folder-container">
	<a href="/@<?php echo htmlentities($this->collectionFolderName . '/' . $fileName) ?>" title="<?php echo htmlentities($item['caption']) ?>">
		<span><?php echo htmlentities($item['caption']) ?></span>
	</a>
</div>
<?php endif ?>

<?php endforeach ?>

</main>
<footer>
	<nav>
		<div class="pagination previous"><a href="<?php echo $this->prevUrl ? htmlentities($this->prevUrl) : 'javascript:void(0)' ?>" class="button" title="<?php echo A::z('Previous') ?>"<?php if (!$this->prevUrl) : ?> disabled<?php endif ?>><img src="/img/arrow-left-bold.svg" alt="<?php echo A::z('Previous') ?>"></a></div>
		<div class="pagination parent"></div>
		<div class="pagination next"><a href="<?php echo $this->nextUrl ? htmlentities($this->nextUrl) : 'javascript:void(0)' ?>" class="button" title="<?php echo A::z('Next') ?>"<?php if (!$this->nextUrl) : ?> disabled<?php endif ?>><img src="/img/arrow-right-bold.svg" alt="<?php echo A::z('Next') ?>"></a></div>
	</nav>
	<div class="about">
		<a href="https://github.com/lipupini/lipupini" target="_blank" rel="noopener noreferrer" class="button" title="<?php echo A::z('More information about this software') ?>">?</a>
	</div>
</footer>
</main>

<?php require(__DIR__ . '/../Core/Close.php') ?>
