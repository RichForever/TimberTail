import themeConfig from './tailwind.theme.config'

module.exports = {
    content: [
        "./blocks/**/*.{php,twig,html,js}",
        "./lib/**/*.php",
        "./src/**/*.js",
        "./views/**/*.twig",
        "./*.{php,twig,html}",
        "./node_modules/flowbite/**/*.js"
    ],
    theme: {
        extend: {
            colors: themeConfig.colors,
            fontSize: themeConfig.fontSize,
            fontFamily: themeConfig.fontFamily,
            container: themeConfig.container,
            gridTemplateRows: themeConfig.gridTemplateRows,
            gridRowEnd: themeConfig.gridRowEnd
        },
    },
    plugins: [
        require('flowbite/plugin'),
        // require('@tailwindcss/forms')
    ],
    safelist: [
        'navbar.active',
    ]
}