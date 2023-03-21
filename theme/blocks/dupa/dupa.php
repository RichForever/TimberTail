<?php
use Timber\Timber;

$context = Timber::context();
$context['block'] = $block;

Timber::render('block-sample.twig', $context);