/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./**/*.php", // Scans all PHP files in your project
    "./assets/js/**/*.js",
    "./acf-blocks/**/*.{php,js}",
    "./assets/css/pages/**/*.css",
  ],
  theme: {
    extend: {
      colors: {
        primary: "#b9ff66",
        secondary: "#191a23",
        accent: "#f3f3f3",
        text: "#334155",
        border: "#e5e7eb",
        bodyBg: "#f9fafb",
        whatsapp: "#25d366",
        twitter: "#1da1f2",
        linkedin: "#0077b5",
        facebook: "#3b5998",
      },
    },
  },
  plugins: [],
};
