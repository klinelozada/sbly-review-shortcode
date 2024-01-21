const fs = require('fs');

// Read the package.json file to get the new version
const packageJson = require('./package.json');
const newVersion = packageJson.version;

// Read the plugin file
let pluginPhp = fs.readFileSync('./sbly-review-shortcode.php', 'utf-8');

// Replace the old version with the new version
pluginPhp = pluginPhp.replace(/Version:\s*([0-9]+\.[0-9]+\.[0-9]+)/, `Version: ${newVersion}`);

// Write the updated content back to sbly-review-shortcode.php
fs.writeFileSync('./sbly-review-shortcode.php', pluginPhp);