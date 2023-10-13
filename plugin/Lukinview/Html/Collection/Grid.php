<?php require(__DIR__ . '/../Core/Open.php') ?>

<main class="media-grid">
<header class="app-bar">
	<div></div>
	<div class="previous pagination"><a href="" class="button" title="Previous" disabled><img src="/img/arrow-left-bold.svg" alt="Previous Page"></a></div>
	<div class="index pagination"><a href="" class="button" title=""><img src="/img/arrow-up-bold.svg" alt=""></a></div>
	<div class="next pagination"><a href="" class="button" title="Next"><img src="/img/arrow-right-bold.svg" alt="Next Page"></a></div>
	<div class="about"><a href="" target="_blank" rel="noopener noreferrer" class="button" title="More information about this software">?</a></div>
</header>
<div id="media-grid" class="grid square"></div>
<script>let collection = '<?php echo htmlentities($this->collectionFolderName) ?>';let collectionData = <?php echo json_encode($this->collectionData, JSON_THROW_ON_ERROR | JSON_UNESCAPED_SLASHES) ?>;</script>
<script type="module" src="/js/components/Grid/Grid.js"></script>
<footer class="app-bar">
	<div></div>
	<div class="previous pagination"><a href="" class="button" title="Previous" disabled><img src="/img/arrow-left-bold.svg" alt="Previous Page"></a></div>
	<div></div>
	<div class="next pagination"><a href="" class="button" title="Next" disabled><img src="/img/arrow-right-bold.svg" alt="Next Page"></a></div>
	<div></div>
</footer>
</main>

<?php require(__DIR__ . '/../Core/Close.php') ?>
