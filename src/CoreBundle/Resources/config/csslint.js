module.exports = {
    options: {
        csslintrc: '.csslintrc',
        formatters: [
            {id: require('csslint-stylish'), dest: 'public/csslint-report/csslint_stylish.xml'}
        ]
    },
    lax: {
        options: {
            import: false
        },
        src: ['<%= config.publicCss %>']
    }
};