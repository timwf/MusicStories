import { src, dest, watch, series, parallel } from 'gulp';

import yargs from 'yargs';
import sass from 'gulp-sass';
import cleanCss from 'gulp-clean-css';
import gulpif from 'gulp-if';
import postcss from 'gulp-postcss';
import sourcemaps from 'gulp-sourcemaps';
import autoprefixer from 'autoprefixer';
import cssnano from 'cssnano';
import imagemin from 'gulp-imagemin';
import del from 'del';
import webpack from 'webpack-stream';
import named from 'vinyl-named';
import browserSync from "browser-sync";
import zip from "gulp-zip";
import info from "./package.json";
import replace from "gulp-replace";
import wpPot from "gulp-wp-pot";
import concat from "gulp-concat";
import plumber from "gulp-plumber";
import deporder from "gulp-deporder";
const PRODUCTION = yargs.argv.prod;

const options = {
    image: {
        optimizationLevel: 7,
        progressive: true,
        verbose: true,
        interlaced: true,
        multipass: true,
    },
    css: [
        autoprefixer({
            browsers: ['last 3 versions', 'IE 7'],
        }),
        cssnano(),
    ],
    babel: {
        presets: ['es2015'],
    },
}


// const server = browserSync.create();
// export const serve = done => {
//   server.init({
//     proxy: "http://localhost:8888/starter"
//   });
//   done();
// };
// export const reload = done => {
//   server.reload();
//   done();
// };
export const clean = () => del(['dist']);

export const styles = () => {
    return src(['src/scss/site.scss'])
        .pipe(gulpif(!PRODUCTION, sourcemaps.init()))
        .pipe(sass().on('error', sass.logError))
        .pipe(postcss(options.css))
        .pipe(gulpif(PRODUCTION, cleanCss({ compatibility: 'ie8' })))
        .pipe(gulpif(!PRODUCTION, sourcemaps.write()))
        .pipe(dest('dist/css'));
    //.pipe(server.stream());
}
export const images = () => {
    return src('src/images/**/*.{jpg,jpeg,png,svg,gif}')
        .pipe(imagemin())
        .pipe(dest('dist/images'));
}
export const copy = () => {
    return src(['src/**/*', '!src/{images,js,scss}', '!src/{images,js,scss}/**/*'])
        .pipe(dest('dist'));
}
export const scripts = () => {
    return src(['src/js/*.js'])
        .pipe(named())
        .pipe(webpack({
            module: {
                rules: [{
                    test: /\.js$/,
                    use: {
                        loader: 'babel-loader',
                        options: {
                            presets: []
                        }
                    }
                }]
            },
            mode: PRODUCTION ? 'production' : 'development',
            devtool: !PRODUCTION ? 'inline-source-map' : false,
            output: {
                filename: '[name].js'
            },
            externals: {
                jquery: 'jQuery'
            },
        }))
        .pipe(plumber())
        .pipe(deporder())
        .pipe(concat('js.js'))
        .pipe(dest('dist/js'));
}
export const compress = () => {
    return src([
            "**/*",
            "!node_modules{,/**}",
            "!bundled{,/**}",
            "!src{,/**}",
            "!.babelrc",
            "!.gitignore",
            "!gulpfile.babel.js",
            "!package.json",
            "!package-lock.json",
        ])
        .pipe(
            gulpif(
                file => file.relative.split(".").pop() !== "zip",
                replace("_themename", info.name)
            )
        )
        .pipe(zip(`${info.name}.zip`))
        .pipe(dest('bundled'));
};
export const pot = () => {
    return src("**/*.php")
        .pipe(
            wpPot({
                domain: "_themename",
                package: info.name
            })
        )
        .pipe(dest(`languages/${info.name}.pot`));
};
export const watchForChanges = () => {
    watch('src/scss/**/*.scss', styles);
    watch('src/images/**/*.{jpg,jpeg,png,svg,gif}', series(images));
    watch(['src/**/*', '!src/{images,js,scss}', '!src/{images,js,scss}/**/*'], series(copy));
    watch('src/js/**/*.js', series(scripts));
    //watch("**/*.php", reload);
}
export const dev = series(clean, parallel(styles, images, copy, scripts), watchForChanges);
export const build = series(clean, parallel(styles, images, copy, scripts), pot, compress);
export default dev;