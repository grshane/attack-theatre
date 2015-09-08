'use strict';

module.exports = function (grunt) {

  // Project configuration.
  grunt.initConfig({
    sass: {
        files: {'css/styles.css' :  'sass/styles.scss'},
        options: {
          compass: true,
        },
      },
    watch: {
      sass: {
        files: '**/*.scss',
        tasks: ['sass']
      }
    },
    compass: {
      dev: {
         options: {
              config: 'config.rb',
          },
      },
    },
    browserSync: {
      default_options: {
        bsFiles: {
          src: [
            "*.css",
            "*.html"
          ]
        },
        options: {
          watchTask: true,
          injectChanges: true,
          proxy: "attacktheatre.local"
        }
      }
    },

    bsReload: {
            css: {
                reload: "css/styles.css"
            },
            all: {
                reload: true
            }
        }
  });

  grunt.loadNpmTasks('grunt-contrib-compass');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-contrib-sass');
  grunt.loadNpmTasks('grunt-browser-sync');



  // Launch BrowserSync + watch task
  grunt.registerTask('default', ['browserSync', 'watch']);
};
