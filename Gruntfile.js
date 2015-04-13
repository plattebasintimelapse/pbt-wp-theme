module.exports = function(grunt) {

    var config = {
        assets: 'assets'
    };

    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        config: config,

        watch: {
            sass: {
                files: '**/*.scss',
                tasks: ['sass']
            },
            livereload: {
                options: { livereload: true },
                files: ['*.css']
            }

        },

        sass: {
            options: {
                sourcemap: 'none',
                style: 'compact'
            },
            dist: {
                files: [{
                    expand: true,
                    cwd: '<%= config.assets %>/stylesheets',
                    src: ['*.scss'],
                    dest: '',
                    ext: '.css'
                }]
            }
        },
        uglify: {
            my_target: {
                options: {
                    banner: '/*! <%= pkg.name %> - v<%= pkg.version %> - ' +
                        '<%= grunt.template.today("yyyy-mm-dd") %> */'
                },
                files: {
                    'assets/scripts/main.min.js': [
                        'bower_components/jquery/dist/jquery.js',
                        'bower_components/bootstrap-sass-official/assets/javascripts/bootstrap.js',
                        '<%= config.assets %>/scripts/main.js'
                    ]
                }
            }
        }
    });

    grunt.loadNpmTasks('grunt-contrib-sass');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-watch');

    grunt.registerTask('default', [
        'watch'
    ]);

    grunt.registerTask('build', [
        'sass',
        'uglify'
    ]);

    grunt.registerTask('ysha', function (target) {
        grunt.log.writeln( '*****************');
        grunt.log.writeln( '*****************');
        grunt.log.writeln( '** Ysha rules! **');
        grunt.log.writeln( '*****************');
        grunt.log.writeln( '*****************');
        grunt.log.writeln(  );
    });

};