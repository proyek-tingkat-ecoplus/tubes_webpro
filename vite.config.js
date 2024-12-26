import {
    defineConfig
} from 'vite';
import laravel from 'laravel-vite-plugin';
import path from 'path';
import fs from 'fs';

// Function to recursively get all JS files in a directory
const getAllJsFiles = (dir) => {
    const files = fs.readdirSync(dir);
    let jsFiles = [];

    files.forEach((file) => {
        const filePath = path.join(dir, file);
        const stat = fs.statSync(filePath);

        if (stat.isDirectory()) {
            jsFiles = [...jsFiles, ...getAllJsFiles(filePath)]; // Recursively find JS files in subdirectories
        } else if (file.endsWith('.js')) {
            jsFiles.push(filePath); // Add file if it's a .js file
        }
    });

    return jsFiles;
};

// Path to the JS directory
const jsDir = path.resolve(__dirname, 'resources/js');

// Get all .js files in resources/js/ and subdirectories
const jsFiles = getAllJsFiles(jsDir).map(filePath => path.relative(__dirname, filePath)); // Make paths relative

// Log the collected jsFiles
console.log(jsFiles); // Verify the files

export default defineConfig({
    server: {
        host: '127.0.0.1',
        port: 3000, // Set an alternative port
    },
    base: "/",
    build: {
        minify: false, // Disable minification for easier debugging
        rollupOptions: {
            output: {
                manualChunks: undefined, // Disable chunking to simplify the build process
            },
        },
    },
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/pages/admin/maps/index.js',
                ...jsFiles, // Spread the list of all JS files (from subdirectories)
            ],
            refresh: true,
        }),
    ],
});
