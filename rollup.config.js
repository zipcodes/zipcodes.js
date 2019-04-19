import babel from 'rollup-plugin-babel'
import resolve from 'rollup-plugin-node-resolve'
import minify from 'rollup-plugin-babel-minify'

export default {
  input: "src/index.js",
  output: {
    file: ".build/zipcode.min.js",
    format: "cjs"
  },
  plugins: [
    resolve(),
    babel({
      exclude: 'node_modules/**'
    }),
    minify()
  ]
}