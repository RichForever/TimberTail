const anchorScroll = () => {
    const navbarItems = document.querySelectorAll("nav .navbar__menu a") // get all navbar items with anchor class
    navbarItems.forEach((item) => {

        item.addEventListener("click", (e) => {
            // e.preventDefault();
            const href = item.getAttribute("href").substring(1); // remove # tag from string and get target value
            if (!href) return;

            const targetSection = document.querySelector(`#${href}`); // get target section based on clicked url
            if (!targetSection) {
                let targetUrl = `${wp.siteUrl}#${href}`;
                window.location.replace(targetUrl);
            }

        })
    })
}

export default anchorScroll