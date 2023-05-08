const hamburger = () => {
    const navbar = document.querySelector('nav.navbar')
    const hamburgerButton = document.querySelector('.navbar__hamburger')

    hamburgerButton.addEventListener('click', (e) => {
        e.preventDefault()
        navbar.classList.toggle('active')
    })
}

export default hamburger