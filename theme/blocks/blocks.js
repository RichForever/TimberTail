const blockNames = [
    "dupa"
]

async function initBlock(blockName) {
    const blocks = document.querySelectorAll(`${blockName}-block`);
    if(blocks.length > 0) {
        await import(`./${blockName}/style.scss`)
        await import(`./${blockName}/script.js`)
    }
    return blocks;
}

for (const item of blockNames) {
    initBlock(item).then((blocks) => {})
}