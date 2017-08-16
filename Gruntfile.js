module.exports = function(grunt) {

  // Project configuration.
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),

    sass: {                              // Task
      dist: {                            // Target
        options: {                       // Target options
          style: 'compressed'
        },
        files: {
          'style.css': 'sass/style.scss',
        },
        // [{
        //   expand: true,
        //   cwd: 'styles',
        //   src: ['*.scss'],
        //   dest: '../css/style.css',
        //   ext: '.css'
        // }]
      }
    },


    uglify: {
      options: {
        banner: '/*! <%= pkg.name %> <%= grunt.template.today("yyyy-mm-dd") %> */\n'
      },
      build: {
        src: ['js/source/*.js'],
        dest: 'build/<%= pkg.name %>.min.js'
      }
    },

    watch: {
      options: {
        livereload: true,
      },
      livereload: {
        // reload page when css, js, images or php files changed
        files: ['img/**/*.{png,jpg,jpeg,gif,webp,svg}', '**/*.php']
      },
      scripts: {
        files: [ 'js/source/*.js' ],
        task: ['uglify'],
        options: {
          reload: true
        }
      },
      styles: {
        files: ['sass/*.scss'],
        task: ['sass'],
        options: {
          reload: true
        }
      }
    }
  });

  // Load the plugin that provides the "uglify" task.
  grunt.loadNpmTasks('grunt-contrib-uglify');

  grunt.loadNpmTasks('grunt-contrib-sass');

  grunt.loadNpmTasks('grunt-contrib-watch');

  // Default task(s).
  grunt.registerTask('default', ['watch']);

};