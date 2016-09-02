module.exports = {
    options: {
        browsers: ['last 2 versions']
    },
    dist: {
        files: {
            '<%= config.publicCss %>': '<%= config.publicCss %>'
        }
    }
};