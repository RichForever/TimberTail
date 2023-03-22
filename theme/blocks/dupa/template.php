<?php
use Timber\Timber;

$context = Timber::context();
$context['block'] = $block;

Timber::render('blocks/dupa.twig', $context);