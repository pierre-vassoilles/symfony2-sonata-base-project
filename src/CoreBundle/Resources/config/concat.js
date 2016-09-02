module.exports = {
    app: {
        src: [
            '<%= config.privateJs %>/jquery.min.js',
            '<%= config.privateJs %>/objectFitPolyfill.min.js',
            '<%= config.privateJs %>/bootstrap.js',
            '<%= config.privateJs %>/script.js'
        ],
        dest: '<%= config.publicJs %>'
    }
};