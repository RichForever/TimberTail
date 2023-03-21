<?php
use Timber\Timber;

$context = Timber::context();
$context['block'] = $block['data'];

Timber::render('block-sample.twig', $context);