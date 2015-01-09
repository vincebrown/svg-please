var timer = require("grunt-timer");
module.exports = function(grunt) {
  timer.init(grunt, { deferLogs: true, friendlyTime: true, color: "blue" });
  require("matchdep").filterDev("grunt-*").forEach(grunt.loadNpmTasks);
  // ===========================================================================
  // CONFIGURE GRUNT ===========================================================
  // ===========================================================================
  grunt.initConfig({

    // get the configuration info from package.json ----------------------------
    // this way we can use things like name and version (pkg.name)
    pkg: grunt.file.readJSON('package.json'),

    // configure jshint to validate js files -----------------------------------
    jshint: {
      options: {
        reporter: require('jshint-stylish')
      },
      all: ['Gruntfile.js', 'src/**/*.js']
    },

    // configure uglify to minify js files -------------------------------------
    uglify: {
      options: {
        banner: '/*\n <%= pkg.name %> <%= grunt.template.today("yyyy-mm-dd") %> \n*/\n'
      },
      build: {
        files: {
          'dist/js/main.min.js': 'src/js/main.js'
        }
      }
    },
    
    // compile less stylesheets to css -----------------------------------------
    sass: {
      build: {
        options: {
          lineNumber: false,
          style: 'expanded',
          require: 'susy'
        },
        files: {
          'src/css/style.css': 'sass/style.scss'
        }
      }
    },

    autoprefixer: {
      build: {
        expand: true,
        cwd: 'src/css',
        src: [ 'style.css' ],
        dest: 'src/css'
      }
    },
    // configure cssmin to minify css files ------------------------------------
    cssmin: {
      options: {
        banner: '/*\n <%= pkg.name %> <%= grunt.template.today("yyyy-mm-dd") %> \n*/\n'
      },
      build: {
        files: {
          'dist/css/style.min.css': 'src/css/style.css'
        }
      }
    },

    // For common reusable svg Icons
    svgstore: {
      options: {
        prefix: 'shape-',
        svg: {
          viewBox: '0 0 24 24',
          style: "display:none;"
        }
      },
      default: {
        files: {
          "includes/svg-defs.svg": ["src/**/*.svg"]
        }
      }
    },
    imagemin: {
      png: {
        options: {
          optimizationLevel: 7
        },
        files: [
        {
          // Set to true to enable the following options…
          expand: true,
          // cwd is 'current working directory'
          cwd: 'src/',
          src: ['**/*.png'],
          // Could also match cwd line above. i.e. project-directory/img/
          dest: 'dist/images/',
          ext: '.png'
        }
        ]
      },
      jpg: {
        options: {
          progressive: true
        },
        files: [
        {
          // Set to true to enable the following options…
          expand: true,
          // cwd is 'current working directory'
          cwd: 'src/',
          src: ['**/*.jpg'],
          // Could also match cwd. i.e. project-directory/img/
          dest: 'dist/images/',
          ext: '.jpg'
        }
        ]
      }
    },

    // configure watch to auto update ------------------------------------------
    watch: {
      options: {
        livereload: true,
        port: 80
      },
      stylesheets: {
        files: 'sass/**/**/*.scss',
        tasks: ['sass','autoprefixer','cssmin']
      },
      scripts: {
        files: 'src/js/*.js',
        tasks: ['uglify']
      },
      svg:{
        files: ['src/**/*.svg'],
        tasks: ['svgstore']
      },
      images: {
        files: ['src/**/*.{png,jpg,gif}'],
        tasks: ['imagemin']
      },
    }

  });


  // ===========================================================================
  // CREATE TASKS ==============================================================
  // ===========================================================================
  grunt.registerTask('default', ['jshint', 'uglify', 'sass','autoprefixer',  'cssmin', 'imagemin']);
  grunt.registerTask('svg', ['svgstore']);
};