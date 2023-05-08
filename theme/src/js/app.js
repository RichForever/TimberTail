// function importAll(r) {
//   r.keys().forEach(r)
// }
//
// importAll(require.context("../../blocks/", true, /\/script\.js$/))
import hamburger from './components/hamburger';
import { initBlock } from './blocks';

const blockNames = [
  "sample-block-1"
];

for (const item of blockNames) {
  initBlock(item).then((blocks) => {});
}

window.addEventListener('DOMContentLoaded', () => {
  hamburger()
})