import myTheme from './theme'

module.exports = {
    content: [
        "./theme/**/*.{php,twig,html,js}",
        "./theme/views/**/*.{php,twig,html,js}",
        "./node_modules/flowbite/**/*.js"
    ],
    theme: {
        extend: {
            colors: myTheme.colors,
            fontSize: myTheme.fontSize,
            fontFamily: myTheme.fontFamily
        },
    },
    plugins: [
        require('flowbite/plugin')
    ],
}