import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import { glob } from 'glob'
import path from 'node:path'
import { fileURLToPath } from 'node:url'

const main = Object.fromEntries(
	glob.sync([
		'resources/js/app.js',
	], {
		ignore: 'resources/js/bootstrap.js',
	}).map(file => {
		const ext = path.extname(file)
		const from = ext === '.js' ? 'resources/js' : 'resources'
		return [
			// This remove `resources/js/` as well as the file extension from each file, so e.g.
			// resources/js/nested/foo.js becomes nested/foo
			path.relative(from, file.slice(0, file.length - ext.length)),
			fileURLToPath(new URL(file, import.meta.url))
		]
	})
)
const pages = Object.fromEntries(
	glob.sync('resources/js/pages/**/*.js').map(file => [
		path.relative('resources/js/pages', file.slice(0, file.length - path.extname(file).length)),
		fileURLToPath(new URL(file, import.meta.url))
	])
)
const input = Object.assign(main, pages)

export default defineConfig({
    plugins: [
        laravel({
            // input: ['resources/css/app.css', 'resources/js/app.js'],
            input,
            refresh: true,
        }),
    ],
		resolve: {
			alias: {
				'~fontawesome': path.resolve(__dirname, 'node_modules/@fortawesome/fontawesome-free'),
			}
		}
});
