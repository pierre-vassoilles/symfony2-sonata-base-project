module.exports = {
    scripts: {
        files: [
            '<%= config.privateJs %>/*.js',
            '<%= config.privateJs %>/**/*.js'
        ],
        tasks: [
            'concat',
            'babel',
            'uglify',
            'notify:concat'
        ],
        options: {
            spawn: false
        }
    },
    sass: {
        files: '<%= config.privateScss %>/**/**/*.scss',
        tasks: [
            'sass',
            'combine_mq',
            'autoprefixer',
            'cssmin',
            'notify:sass'
        ]
    }
};