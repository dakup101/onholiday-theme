module.exports = {
    content: [
        './functions/*.php',
        './components/*.php',
        './components/**/*.php',
        './components/**/*.html',
        './woocommerce/*.php',
        './woocommerce/**/*.php',
        './views/*.php',
        './views/**/*.php',
        './index.php',
        './footer.php',
        './header.php',
        './functions.php',
        './page.php',
        './page-home.php',
        './archive-recipe.php',
        './single-recipe.php',
        './single-post.php',
        './404.php',
    ],
    theme: {
        colors: {
            'dark' : '#222222',
            'dark-light' : '#565656',
            'white' : '#ffffff',
            'current' : 'currentColor',
            'transparent' : 'transparent',
            'biege' : '#f3f3ef',
            'biege-dark' : '#f5f4eb',
            'sand' : '#eedbac',
            'accent' : '#cdab7c',
            'brown' : '#7e5c20',
            'brown-light' : '#bf993c',
            'brownish' : '#cdac7b',
            'brownish-light' : '#EEDBAC'
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
        screens: {
            xxs: '396px',
            midxs: '468px',
            xs: '568px',
            sm: '991px',
            md: '1240px',
            lg: '1520px',
            xl: '1720px',
        },
        container: {
            padding: {
                DEFAULT: '1rem',
                sm: '1.5rem'
            },
            screens: {
                xs: '768px',
                sm: '991px',
                md: '1000px',
                lg: '1240px',
                xl: '1640px',
            }
        }
    },
}