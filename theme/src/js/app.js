// function importAll(r) {
//   r.keys().forEach(r)
// }
//
// importAll(require.context("../../blocks/", true, /\/script\.js$/))
import { initBlock } from './blocks';

const blockNames = [
  "sample-block-1"
];

for (const item of blockNames) {
  initBlock(item).then((blocks) => {});
}