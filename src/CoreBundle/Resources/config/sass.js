module.exports = {
    options: {
        includePaths: [
            '<%= config.privateScss %>'
        ]
    },
    dist: {
        options: {
            outputStyle: 'expanded',
            sourceMap: true
        },
        files: {
            '<%= config.publicCss %>': '<%= config.privateScss %>/styles.scss'
        }
    }
};