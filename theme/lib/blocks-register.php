<?php
$blocks = [];

foreach (new DirectoryIterator(dirname(__FILE__, 2) . '/blocks') as $dir) {
	if ($dir->isDot()) continue;

	if (file_exists($dir->getPathname() . '/block.json')) {
		$blocks[] = $dir->getPathname();
	}
}

asort($blocks);

foreach($blocks as $block) {
	register_block_type($block);
}