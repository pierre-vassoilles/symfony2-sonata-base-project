module.exports = {
    target: {
        files: {
            '<%= config.publicCss %>': [
                '<%= config.publicCss %>',
                '<%= config.publicCssPath %>/bootstrap.css',
                '<%= config.publicCssPath %>/bootstrap-theme.css'
            ]
        }
    }
};