import { defineConfig } from "vite";
import path from "path";
import { globSync } from "glob";

// Get all JS entry points from the pages directory, plus the main entry
const entries = globSync("./assets/js/pages/*.js").reduce(
  (acc, file) => {
    const entryName = path.basename(file, ".js");
    acc[entryName] = file;
    return acc;
  },
  { main: "./assets/js/main.js" }
);

export default defineConfig(({ command }) => {
  const isDevelopment = command === "serve";

  return {
    // The public path for assets.
    base: isDevelopment ? "/" : "/dist/",

    // Define plugins
    plugins: [],

    // Configuration for the build process
    build: {
      // The output directory for the build
      outDir: path.resolve(__dirname, "dist"),
      // Empty the output directory before building
      emptyOutDir: true,
      // Generate a manifest file for backend integration (e.g., in PHP)
      manifest: true,
      rollupOptions: {
        // Define multiple entry points for your application
        input: entries,
        output: {
          // Define the output format for your assets
          entryFileNames: "js/[name].js",
          chunkFileNames: "js/[name].js",
          assetFileNames: (assetInfo) => {
            // Place CSS into a 'css' folder
            if (assetInfo.name.endsWith(".css")) {
              return "css/[name]-[hash].css";
            }
            // Default asset file naming
            return "assets/[name]-[hash][extname]";
          },
        },
      },
    },

    // Configuration for the development server
    server: {
      // The port for the dev server
      port: 3000,
      // Enable strict port checking
      strictPort: true,
      // Enable Hot Module Replacement (HMR)
      hmr: {
        host: "localhost",
      },
      cors: {
        origin: "http://example.local", // Change to your local server URL.
        credentials: true,
      },
      // Proxy requests to your local WordPress server
      proxy: {
        // Proxy all requests except for static assets from the dev server
        "^(?!/assets/|/dist/|/@vite/|/node_modules/|/main.js|/pages/.*.js|/assets/.*.svg).*$":
          {
            target: "http://example.local/", // Change to your local server URL
            changeOrigin: true,
            // Intercept and rewrite redirect headers
            configure: (proxy, options) => {
              proxy.on("proxyRes", (proxyRes, req, res) => {
                if (proxyRes.headers.location) {
                  const newLocation = proxyRes.headers.location.replace(
                    "http://example.local/",
                    `http://${req.headers.host}/`
                  );
                  proxyRes.headers.location = newLocation;
                }
              });
            },
          },
      },
    },

    // Resolve aliases for easier imports
    resolve: {
      alias: {
        "@": path.resolve(__dirname, "./assets"),
      },
    },
  };
});
