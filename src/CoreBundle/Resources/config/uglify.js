module.exports = {
    my_target: {
        options: {
            sourceMap: false,
            sourceMapName: '<%= config.publicJsPath %>/app.min.map'
        },
        files: {
            '<%= config.publicJs %>': ['<%= config.publicJs %>']
        }
    }
};