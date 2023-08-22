module.exports = {
    content: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
        './node_modules/tw-elements/dist/js/**/*.js',
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: [
                    'Nunito',
                    '-apple-system',
                    'BlinkMacSystemFont',
                    '"Segoe UI"',
                    'Roboto',
                    '"Helvetica Neue"',
                    'Arial',
                    '"Noto Sans"',
                    'sans-serif',
                    '"Apple Color Emoji"',
                    '"Segoe UI Emoji"',
                    '"Segoe UI Symbol"',
                    '"Noto Color Emoji"',
                ],
                montserrat: [
                    'Montserrat',
                    'sans-serif',
                ],
            },
            colors: {
                'custom-gray': '#575F65',
                'custom-blue': '#249EEA',
            },
            fontSize: {
                '50px': ['50px', 1],
            },
        },
    },
    plugins: [
        require('tw-elements/dist/plugin'),
        require('@tailwindcss/line-clamp'),
    ],
}
