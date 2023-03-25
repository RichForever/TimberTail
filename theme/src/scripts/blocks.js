export async function initBlock(blockName) {
    const blocks = document.querySelectorAll(`[data-block="${blockName}"]`);
    if(blocks.length > 0) {
        await import(/* webpackChunkName: "[request]" */ `../../blocks/${blockName}/style.scss`)
        await import(/* webpackChunkName: "[request]" */ `../../blocks/${blockName}/script.js`)
    }
    return blocks;
}