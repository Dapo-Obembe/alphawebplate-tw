# AlphaWeb WordPress Tailwind Boilerplate

A modern WordPress + TailwindCSS boilerplate for building fast WordPress themes made and managed by [Dapo Obembe](https://www.dapoobembe.com). This lightweight, performance-focused WordPress Tailwind boilerplate provides a solid foundation for custom WordPress theme development with TailwindCss, Vite and Advanced Custom Fields (ACF) integration.

There is no overly-complicated set up in the backend.

## Who is AlphaWeb WordPress Tailwind boilerplate for?

This WordPress TailwindCSS boilerplate is for developers who would love to use Vite, TailwindCss to build amazing Themes. The data are set up using ACF/SCF. You can either use classic approach or build blocks inside your theme.

If I can do something with WordPress, is to ensure it is fast. This approach helps me get at least 80/100 in performance and 100 in other Lighthouse metrics.

## Features

- 🎨 TailwindCSS integration for utility-first styling
- 🧩 Advanced Custom Fields (ACF) or Secure Custom Fields (SCF) support and integration
- VITE for better development which include HMR
- 📱 Responsive design out of the box
- 🔍 SEO-friendly structure
- 🔒 Security best practices
- ⚡ Performance optimized
- 💻 Developer-friendly architecture
- 🧩 Simple and straightforward build process

## Requirements

- WordPress 5.8+
- PHP 7.4+
- Node.js 14+
- npm or yarn
- Advanced Custom Fields plugin (PRO is needed if you want repeater fields and others)
- Basic knowledge of PHP, JS, WordPress, TailwindCSS, and ACF

## Getting Started

### Installation

1. Clone the repository to your WordPress themes directory:

   ```bash
   cd wp-content/themes/
   git clone https://github.com/Dapo-Obembe/alphawebplate-tw.git your-theme-name
   cd your-theme-name
   ```

2. IMPORTANT: Change every instances of https://example.local to your wordpress local URL and change the port: 9000 to any number you wish.

3. Install dependencies:

   ```bash
   npm install
   ```

4. Update `style.css` with your theme information:

   ```css
   /*
   Theme Name: Your Theme Name
   Theme URI: https://yourwebsite.com
   Author: Your Name
   Author URI: https://yourwebsite.com
   Description: Your theme description
   Version: 1.0.0
   License: GNU General Public License v2 or later
   License URI: http://www.gnu.org/licenses/gpl-2.0.html
   Text Domain: your-theme-name
   */
   ```

5. Ensure ACF PRO or Secured Custom Fields is installed and activated.

6. Activate the theme in the WordPress admin panel.

## WPCS and PHPCS Setup

If you want your code (for theme) to follow the WPCS (WordPress Coding standards):

1. Run `composer install`
2. Ensure you install and activate these extensions (php snifer by wongjn and phpcs by shevaua) installed
3. Then you can lint and fix via: `composer lint` and `composer fix`

4. create .vscode/settings.json in the root of your theme and paste the code below:
5. ```json
   {
     "phpcbf.enable": true,
     "phpcbf.documentFormattingProvider": true,
     "phpcbf.standard": "WordPress",
     "phpcbf.onsave": true,
     "phpcbf.executablePath": "vendor\\bin\\phpcbf.bat",

     "phpSniffer.autoDetect": true,
     "phpSniffer.executablesFolder": "vendor\\bin",
     "phpSniffer.standard": "WordPress",

     "[php]": {
       "editor.formatOnSave": true,
       "editor.defaultFormatter": "wongjn.php-sniffer"
     }
   }
   ```

````
5. Ensure you install these plugins: PHPCS by Shevaua and PHP Sniffer by wongjn
6. Edit your VSCODE Settings.json and paste this somewhere:
        "[php]": {
            "editor.defaultFormatter": "wongjn.php-sniffer"
        },
7. Restart your VSCODE and your WPC and PHPCS should be working.

## Development Workflow

### Development Mode

Start the development environment with:

```bash
npm run dev
````

Because we are using Vite for bundling the files, the local environment is set up to pick the assets using @vite-client. When you run npm run build, the dist/ will be created (which has been set up to work in production).

- You can then access your work on http://localhost:9000 or whatever port you choose to use.
- Your changes will be saved immediately and you see them on the frontend wihtout refreshing your browser. Thanks to Vite's HMR.

### Production Build

Create a production-ready build with:

```bash
npm run build
```

This will:

- Minify and optimize all assets
- Purge unused TailwindCSS classes
- Generate production CSS and JS files in the dist/

## Theme Structure

```
your-theme-name/
|-- .vscode/                # settings for WPCS
|-- acf-blocks/             # Custom acf blocks you need (See the Note below this section)
|-- acf-json/               # Your ACF data stored here in JSON immediately you create them in the backend
├── dist/                   # Compiled assets (auto-generated)
│   ├── css/
│   ├── js/                 # css and js compiled/bundled
|   |-- icons/
├── inc/                    # PHP includes
│   ├── partials/           # Reusable functions for items like buttons, img, etc
│   ├── custom-functions/   # Custom functions that act independently of the theme templates
│   ├── google-recaptcha/   # Google recaptcha setup
│   ├── head-and-footer-codes/ # Adds codes/tags to the theme head
│   ├── post-types/         # Register all your post types
│   ├── shortcodes/         # Shortcodes used in the theme
│   ├── filters/            # All filtering actions
│   ├── setup/              # Theme setup files
│   └── template-tags/      # Template tags
├── assets/                    # Source files
│   ├── css/                # CSS source files
│   ├── js/                 # JavaScript source files
│   └── icons/              # SVG icons
│   └── fonts/              # Fonts
│   └── swiperjs/           # SwiperJs files
│   └── sprite.svg          # Sprite for your svg icons
├── template-parts/         # Template partials for modularization
│   ├── components/         # Component template parts
│   ├── elements/           # Elements used across the website. Remove or leave as is
│   └── frontpage/          # Files for the frontpage
├── functions.php           # Theme functions
├── index.php               # Main template file/Blog Archive
├── front-page.php          # Home page (if you set static homepage)
├── header.php              # Header template
├── footer.php              # Footer template
├── sidebar.php             # Sidebar template
├── page.php                # Page template
├── single.php              # Single post template
├── archive.php             # Archive template
├── search.php              # Search template
├── 404.php                 # 404 template
├── style.css               # Theme metadata
├── composer.json           # Composer set up for WPCS
├── tailwind.config.js      # TailwindCSS configuration
├── vite.config.js          # Vite configuration
├── package.json            # NPM dependencies and scripts
└── README.md               # This file
```

## ACF Block Usage

If you will be using acf blocks in your block editor,
it means you will need to structure that particular page or pages
to accommodate blocks. E.g, see the style of the index.php below that support using blocks.

```php
<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package AlphaWebConsult
 */

get_header();
?>

		<?php
		if ( have_posts() ) {

			while ( have_posts() ) {
				the_post();

				the_content();
			}
		}
		?>

<?php
get_footer();

```

## Customization

### TailwindCSS Configuration

Customize TailwindCSS in the `tailwind.config.js` file:

```js
module.exports = {
  content: [
    "./**/*.php", // Scan all PHP files
    "./assets/js/**/*.js", // Scan all JavaScript files
    "./assets/css/pages/**/*.css",
  ],
  theme: {
    extend: {},
  },
  plugins: [],
};
```

### Advanced Custom Fields Integration

This boilerplate is built with ACF support in mind and includes:

- ACF JSON for version control of field groups
- Helper functions for ACF fields in the `inc/acf/` directory
- Template parts that integrate with ACF flexible content fields
- Examples of ACF field usage in various components

#### ACF Field Setup

ACF Fields you create in the backend are auto-saved in the acf-json/.
Check the inc/acf/ for the acf setup function.


### WordPress Hooks

The theme uses WordPress hooks for extensibility. Check files in `inc/filters/` and `inc/setup/` for examples of how to use action and filter hooks.

## Best Practices To Follow

### PHP

- Follow WordPress PHP coding standards
- Use namespaced functions when possible
- Validate and sanitize user input
- Use WordPress' native functions for database queries

### TailwindCSS

- Use TailwindCSS utility classes instead of custom CSS when possible
- Create components for reusable UI elements
- Use responsive variants for mobile-first design
- Extract common patterns to custom components

### Advanced Custom Fields

- Store field groups in JSON for version control
- Use ACF flexible content for modular page building
- Create reusable field groups with the clone field
- Limit field visibility with conditional logic

### JavaScript

- Use modern ES6+ syntax
- Split code into modular components
- Use event delegation for better performance
- Avoid jQuery when possible (use vanilla JS)

## Performance Optimization

- TailwindCSS is purged of unused classes in production
- CSS and JavaScript are minified for production
- Proper enqueuing of scripts and styles
- Optimized asset loading
- Efficient ACF field usage and queries

## Security Considerations

- All user input is sanitized
- Admin-ajax.php endpoints are nonce-protected
- Template files are protected against direct access
- No sensitive information in public-facing files
- Google reCAPTCHA integration for forms

## Troubleshooting

### Common Issues

- **CSS not updating**: Clear browser cache or run `npm run build` again
- **PHP errors**: Check the WordPress debug log
- **Node errors**: Delete `node_modules` and run `npm install` again
- **ACF fields not showing**: Check if ACF Pro is activated and fields are properly registered

## Contributing

Contributions are welcome! Please feel free to submit a Pull Request.

## License

This project is licensed under the GPL v2 or later.

## Credits

- Built by [Dapo Obembe]: https://www.dapoobembe.com
- TailwindCSS: https://tailwindcss.com
- WordPress: https://wordpress.org
- Advanced Custom Fields: https://www.advancedcustomfields.com

## Contact

For support or inquiries, please contact [obembedapo@gmail.com].
