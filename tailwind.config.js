import themeConfig from './tailwind.theme.config'

module.exports = {
    content: [
        "./theme/**/*.{php,twig,html,js}",
        "./theme/views/**/*.{php,twig,html,js}",
        "./theme/src/js/**/*.js",
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