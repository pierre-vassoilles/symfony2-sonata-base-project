module.exports = {
    options: {
        sourceMap: true,
        presets: ['es2015'],
        compact: false
    },
    dist: {
        files: {
            '<%= config.publicJs %>': '<%= config.publicJs %>'
        }
    }
};