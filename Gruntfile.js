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
                style: 'compressed'
            },
            dist: {
                files: [{
                    expand: true,
                    cwd: '<%= config.assets %>/sass',
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
                    'assets/js/main.min.js': [
                        '<%= config.assets %>/js/main.js',
                        '<%= config.assets %>/js/lib/jquery-2.1.3.min.js',
                        '<%= config.assets %>/js/lib/bootstrap.js'
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