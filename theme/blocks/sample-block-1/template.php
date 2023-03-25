<?php
use Timber\Timber;

$context = Timber::context();
$context['block'] = $block;
$context['block'] = [
	'id' => uniqid(),
	'name' => $block['name']
];
$context['attributes'] = $block['attributes'];

Timber::render('blocks/sample-block-1.twig', $context);