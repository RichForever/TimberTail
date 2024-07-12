import Alpine from "alpinejs";
window.Alpine = Alpine;
Alpine.start();

import anchorScroll from "./components/anchorScroll";
import scrollToUp from "./components/scrollToUp";
import { initBlock } from "./blocks";

const blockNames = ["sample-block-1"];

for (const item of blockNames) {
  initBlock(item).then((blocks) => {});
}

window.addEventListener("DOMContentLoaded", () => {
  anchorScroll();
  scrollToUp();
});
