import customConfig from './tailwind.theme.config'

module.exports = {
    content: [
        "./theme/**/*.{php,twig,html,js}",
        "./theme/views/**/*.{php,twig,html,js}",
        "./theme/src/js/**/*.js",
        "./node_modules/flowbite/**/*.js"
    ],
    theme: {
        extend: {
            colors: customConfig.colors,
            fontSize: customConfig.fontSize,
            fontFamily: customConfig.fontFamily,
            container: customConfig.container,
            gridTemplateRows: customConfig.gridTemplateRows,
            gridRowEnd: customConfig.gridRowEnd
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