import themeConfig from './tailwind.theme.config'

module.exports = {
    content: [
        "./blocks/**/*.{php,twig,html,js}",
        "./lib/**/*.php",
        "./src/**/*.js",
        "./views/**/*.twig",
        "./*.{php,twig,html}"
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
        // require('@tailwindcss/forms')
    ],
    safelist: [
        'navbar.active',
    ]
}
