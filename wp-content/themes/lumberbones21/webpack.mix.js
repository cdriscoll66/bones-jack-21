const config = {
    host: "bonesjack21.lndo.site",
    sourcePath: "assets",
    publicPath: "dist",
};

const mix = require("laravel-mix");
const { exit } = require("browser-sync");

/** Set Public Path */
mix.setPublicPath(config.publicPath);

/** Path Helpers */
const sourcePath = (path) => `${config.sourcePath}/${path}`;
const publicPath = (path) => `${mix.config.publicPath}/${path}`; // use mix.setPublicPath

/** BrowserSync */
mix.browserSync({
    open: false,
    host: config.host,
    socket: {
        domain: "sync-" + config.host,
    },
    files: [
        config.publicPath + "/styles/*.css",
        config.publicPath + "/scripts/*.js",
        "views/**/*.*",
    ],
    proxy: {
        target: "http://appserver_nginx",
    },
});

/** Styles */
mix.sass(sourcePath("styles/login.scss"), publicPath("styles"));
mix.sass(sourcePath("styles/admin.scss"), publicPath("styles"));
mix.sass(sourcePath("styles/theme.scss"), publicPath("styles"));
mix.sass(sourcePath("styles/editor.scss"), publicPath("styles"));
//   mix.sass(sourcePath('styles/print.scss'), publicPath('styles'));

/** Scripts */
//   mix.js(sourcePath('scripts/login.js'), publicPath('scripts'));
//   mix.js(sourcePath('scripts/admin.js'), publicPath('scripts'));
mix.js(sourcePath("scripts/blocks.js"), publicPath("scripts"));
mix.js(sourcePath("scripts/theme.js"), publicPath("scripts"));

/** Images */
// mix.copyDirectory(sourcePath('images'), publicPath('images'));
require("laravel-mix-imagemin");
mix.imagemin(
    {
        // CopyWebpackPlugin patterns
        context: sourcePath("images"),
        from: "**",
        to: "images",
    },
    {}, // CopyWebpackPlugin options
    {
        // ImageminWebpackPlugin options
        test: /\.(jpe?g|png|gif|ico)$/i, // Including SVG removes feDropShadow AND borks SVGSpritemapPlugin, without it SVGs are not minified
        svgo: {},
    }
);

/** Fonts */
mix.copyDirectory(sourcePath("fonts"), publicPath("fonts"));

/** Options */
mix.options({
    postCss: [require("postcss-svg")],
    processCssUrls: false,
    cssNano: {
        calc: false,
        mergeRules: false,
    },
});

/** webpack Config Override */
// const SVGSpritemapPlugin = require('svg-spritemap-webpack-plugin');
mix.webpackConfig({
    externals: {
        jquery: "jQuery",
    },
    plugins: [
        // new SVGSpritemapPlugin(sourcePath('images/spritemap/**/*.svg'), {
        //   output: {
        //     filename: 'images/spritemap.svg',
        //     chunk: {
        //       name: 'scripts/spritemap',
        //       keep: true,
        //     },
        //     svg4everybody: false,
        //     // svgo: false,
        //     svgo: {
        //       // removeViewBox: false
        //     },
        //   },
        //   sprite: {
        //     prefix: 'spritemap-',
        //     gutter: 0,
        //   },
        // })
    ],
});

/** Source Maps */
mix.sourceMaps();

/** Hash and version files */
mix.version();
