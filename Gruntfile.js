module.exports = function(grunt) {

  // Project configuration.
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    // compile sass files
    sass: {                              // Task
      dist: {                            // Target
        options: {                       // Target options
          style: 'compressed',
          noCache: true,
          update: false,
        },
        files: {
          'style.css': 'sass/style.scss',
        },
      }
    },

    // uglify our jS files
    uglify: {
      options: {
        banner: '/*! <%= pkg.name %> <%= grunt.template.today("yyyy-mm-dd") %> */\n'
      },
      build: {
        src: ['js/source/*.js'],
        dest: 'js/<%= pkg.name %>.min.js'
      }
    },

    // watch all files for changes and perform tasks accordingly
    watch: {
      options: {
        livereload: true,
        // debug: true,
      },
      livereload: {
        // reload page when images or php files change
        files: ['img/**/*.{png,jpg,jpeg,gif,webp,svg}', '**/*.php'],
      },
      // watch for JS changes
      scripts: {
        files: [ 'js/**/*.js' ],
        tasks: ['uglify'],
      },
      // watch for SASS changes
      styles: {
        files: ['sass/**/*.scss'],
        tasks: ['sass'],
      }
    }
  });

  // Load the plugin that provides the "uglify" task.
  grunt.loadNpmTasks('grunt-contrib-uglify');
  // Load the plugin that provides the "sass" task.
  grunt.loadNpmTasks('grunt-contrib-sass');
  // Load the plugin that provides the "watch" task.
  grunt.loadNpmTasks('grunt-contrib-watch');

  // Default task(s).
  grunt.registerTask('default', ['watch']);

};