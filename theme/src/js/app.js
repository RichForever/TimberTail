import Alpine from 'alpinejs';
window.Alpine = Alpine;
Alpine.start();

import hamburger from './components/hamburger';
import anchorScroll from './components/anchorScroll';
import scrollToUp from './components/scrollToUp';
import { initBlock } from './blocks';

const blockNames = [
  "sample-block-1"
];

for (const item of blockNames) {
  initBlock(item).then((blocks) => {});
}

window.addEventListener('DOMContentLoaded', () => {
  hamburger()
  anchorScroll()
  scrollToUp()
})