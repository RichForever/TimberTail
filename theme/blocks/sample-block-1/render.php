<?php

$context = Timber::context();
$context['block'] = [
	'id' => uniqid(),
	'name' => $block['name'],
	'anchor' => !empty( $block['anchor'] ) ? 'id="' . esc_attr( $block['anchor'] ) . '" ' : '',
	'customClass' => !empty( $block['className'] ) ? 'sample-block ' . $block['className'] : 'sample-block'
];
$context['attributes'] = $block['attributes'];

Timber::render('block.twig', $context);