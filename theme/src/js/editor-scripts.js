(function () {
    let proseClassAdded = false;

    wp.data.subscribe(() => {
        addProseClass();
    })

    function addProseClass() {
        if(proseClassAdded) {
            return
        }

        const editor = document.querySelector('.is-root-container');
        if (!editor) {
            return;
        }

        const classes = ["prose", "prose-li:text-black-300", "!max-w-[1200px]", "mx-auto"]
        editor.classList.add(...classes);
        proseClassAdded = true;
    }
})();
