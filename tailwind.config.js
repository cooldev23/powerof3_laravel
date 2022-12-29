const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            backgroundImage: {
                'hero-image': 'url("/storage/images/closeup_land.jpg")',
                'house-image': 'url("/storage/images/listing-images/highland-hills.jpg")',
                'rec-image': 'url("/storage/images/rec-prop.jpg")'
            },
            colors: {
                'primary-color': '#446477',
                'primary-accent': '#304754',
            },
            boxShadow: {
                'main': '1px 1px 2px rgba(0,0,0,0.3)'
            }
        },
    },
    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/aspect-ratio'),
        require('@tailwindcss/typography'),
    ],
};
