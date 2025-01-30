/** @type {import('tailwindcss').Config} */
export default {
    presets: [require("./vendor/wireui/wireui/tailwind.config.js")],
    darkMode: "class",
  
    content: [
      "./resources/**/*.blade.php",
      "./resources/**/*.js",
      "./resources/**/*.vue",
  
      "./vendor/wireui/wireui/src/*.php",
      "./vendor/wireui/wireui/ts/**/*.ts",
      "./vendor/wireui/wireui/src/WireUi/**/*.php",
      "./vendor/wireui/wireui/src/Components/**/*.php",
  
      './vendor/wireui/breadcrumbs/src/Components/**/*.php',
      './vendor/wireui/breadcrumbs/src/views/**/*.blade.php',
    ],
    theme: {
        container: {
            center: true,
            screens: {
                sm: '100%',    // Default container width at 'sm' breakpoint
                md: '100%',    // Default container width at 'md' breakpoint
                lg: '1024px',   // Default container width at 'lg' breakpoint
                xl: '1280px',   // Default container width at 'xl' breakpoint
                '2xl': '1536px' // Default container width at '2xl' breakpoint
              },
        },
        extend: {
            colors: {
                // visit https://uicolors.app/create for generating colors
                brand: {
                  50: "#fff4ed",
                  100: "#ffe6d4",
                  200: "#ffc9a8",
                  300: "#ffa470",
                  400: "#ff7237",
                  500: "#ff541a", //primary
                  600: "#f03106", 
                  700: "#c72107",
                  800: "#9e1b0e", 
                  900: "#7f1a0f",
                  950: "#450905",
              },
            },
        },
    },
    plugins: [
        require("@tailwindcss/forms"),
        require("@tailwindcss/typography"),
        require("@tailwindcss/aspect-ratio"),
        function ({ addVariant }) {
            addVariant("child", "& > *");
            addVariant("child-hover", "& > *:hover");
        },
    ],
  };
  