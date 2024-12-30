import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'library': {
                    50: '#f0f9ff',
                    100: '#e0f2fe',
                    200: '#bae6fd',
                    300: '#7dd3fc',
                    400: '#38bdf8',
                    500: '#0ea5e9',
                    600: '#0284c7',
                    700: '#0369a1',
                    800: '#075985',
                    900: '#0c4a6e',
                }
            }
        },
    },
    plugins: [
        function ({ addComponents }) {
            addComponents({
                '.book-card': {
                    backgroundColor: 'white',
                    borderRadius: '.5rem',
                    padding: '1.5rem',
                    boxShadow: '0 2px 4px 0 rgba(0, 0, 0, 0.1)',
                    transition: 'transform 0.3s ease-in-out',
                    '&:hover': {
                        transform: 'translateY(-0.25rem)',
                        boxShadow: '0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06)',
                    }
                },
                '.book-cover': {
                    position: 'relative',
                    paddingBottom: '140%',
                    overflow: 'hidden',
                    borderRadius: '.375rem',
                    '& img': {
                        position: 'absolute',
                        height: '100%',
                        width: '100%',
                        objectFit: 'cover',
                    }
                }
            })
        }
    ],
};