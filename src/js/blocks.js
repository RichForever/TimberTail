export async function initBlock(blockName) {
    const blocks = document.querySelectorAll(`[data-block="${blockName}"]`);
    if(blocks.length > 0) {
        await import(`../../blocks/${blockName}/style.scss`)
        await import(`../../blocks/${blockName}/script.js`)
    }
    return blocks;
}