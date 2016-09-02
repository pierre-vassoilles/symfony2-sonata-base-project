// Gruntfile.js
module.exports = function (grunt) {

    require('load-grunt-tasks')(grunt);

    //loads the various task configuration files
    var configs = require('load-grunt-configs')(grunt, {

        // Config path default
        config: {
            nodeModules: 'node_modules',
            privateScss: 'private/scss',
            publicCssPath: 'public/css',
            publicCss: '<%= config.publicCssPath %>/app.min.css',
            privateJs: 'private/js',
            publicJsPath: 'public/js',
            publicJs: '<%= config.publicJsPath %>/app.min.js',
        },
        loadGruntTasks: {
            pattern: 'grunt-*'
        }

    });

    grunt.initConfig(configs);

    // Serveur PHP
    grunt.registerTask('serve', [
        'watch' // Any other watch tasks you want to run
    ]);

    // BrowserSync
    grunt.registerTask('proxy', [
        'watch' // Any other watch tasks you want to run
    ]);

    // Les tâches de productions
    grunt.registerTask('prod', [
        //'jshint',
        'concat',
        'babel',
        'uglify',
        'sass',
        'combine_mq',
        'autoprefixer',
        'cssmin',
        'notify:prod'
    ]);

};