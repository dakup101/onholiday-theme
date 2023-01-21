module.exports = {
    jit: true,
    content: [
        './functions/*.php',
        './components/*.php',
        './components/**/*.php',
        './components/**/*.html',
        './views/*.php',
        './views/**/*.php',
        './index.php',
        './footer.php',
        './header.php',
        './functions.php',
        './404.php',
    ],
    theme: {
        colors: {
            'dark' : '#0F172A',
            'dark-light' : '#878B94',
            'white' : '#ffffff',
            'current' : 'currentColor',
            'transparent' : 'transparent',
            'accent' : '#FFA000',
            'blueish' : '#F0F7FF'
        },
        borderWidth: {
            DEFAULT: '1px',
            '0': '0',
            '2': '2px',
            '3': '3px',
            '4': '4px',
            '6': '6px',
            '8': '8px',
            '10': '10px',
            '12': '12px',
          },
        container: {
            padding: {
                DEFAULT: '1rem',
                sm: '1.5rem'
            },
        }
    },
}