
module.exports = function(grunt) {

  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    banner: '/*! <%= pkg.title || pkg.name %> - v<%= pkg.version %> - ' +
      '<%= grunt.template.today("yyyy-mm-dd") %>\n' +
      '<%= pkg.homepage ? "* " + pkg.homepage + "\\n" : "" %>' +
      '* Copyright (c) <%= grunt.template.today("yyyy") %> <%= pkg.author.name %>;' +
      ' Licensed <%= _.pluck(pkg.licenses, "type").join(", ") %> */\n',

    sass: {
      src: {
        options: {
          style: 'compressed'
        },
        files: {
          "wp-content/themes/crucial-detail/src/css/style.css": "wp-content/themes/crucial-detail/src/sass/style.scss",
        }
      }
    },
    autoprefixer: {
      src: {
        files: {
          'wp-content/themes/crucial-detail/build/css/style.css': 'wp-content/themes/crucial-detail/src/css/style.css'
        }
      }
    },
    // uglify: {
    //   files: [{
    //     cwd: 'wp-content/themes/crucial-detail/src/js',
    //     src: '**/*.js',
    //     dest: 'wp-content/themes/crucial-detail/build/js/'
    //   }]
    // },
    responsive_images: {
      myTask: {
        options: {
          sizes: [{
            width: 320,
          },{
            width: 640,
          },{
            width: 1024,
          }]
        },
        files: [{
          expand: true,
          src: ['**.{jpg,gif,png}'],
          cwd: 'wp-content/themes/crucial-detail/src/img/imgOrg',
          custom_dest: 'wp-content/themes/crucial-detail/src/img/imgGen/{%= width %}/'
        }]
      }
    },
    imagemin: {
      dynamic: {
        options: {
          optimizationLevel: 5
        },
        files: [{
          expand: true,
          cwd: 'wp-content/themes/crucial-detail/src/img/',
          src: ['**/*.{png,jpg,gif}'],
          dest: 'wp-content/themes/crucial-detail/build/img/'
        }]
      }
    },
    svgmin: {                       // Task
      options: {                  // Configuration that will be passed directly to SVGO
        plugins: [{
          removeViewBox: false,
          removeUselessStrokeAndFill: true,
          removeEmptyAttrs: true
        }]
      },           
      dist: { 
        files: [{
          expand: true,
          cwd: 'wp-content/themes/crucial-detail/src/svg/',
          src: ['**/*.svg'],
          dest: 'wp-content/themes/crucial-detail/build/svg/',
          ext: '.min.svg'
        }]
      }
    },
    webfont: {
      icons: {
        src: 'wp-content/themes/crucial-detail/build/svg/*.svg',
        dest: 'wp-content/themes/crucial-detail/build/fonts',
        options: {
          syntax: 'bem',
          engine: 'node',
          templateOptions: {
            baseClass: 'glyph-icon',
            classPrefix: 'glyph_',
            mixinPrefix: 'glyph-'
          }
        }
      }
    },
    watch: {
      sass: {

        files: ["wp-content/themes/crucial-detail/src/sass/*.scss"],
        tasks: ["sass"]
      },
      autoprefixer: {
        files: ['wp-content/themes/crucial-detail/src/css/style.css'],
        tasks: ['autoprefixer']
      }
      // , uglify: {
      //   files: ['wp-content/themes/crucial-detail/src/js/*.js'],
      //   tasks: ['uglify']
      // }
    }
  });

  grunt.loadNpmTasks('grunt-autoprefixer');
  grunt.loadNpmTasks("grunt-responsive-images");
  grunt.loadNpmTasks("grunt-contrib-sass");
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-svgmin');
  grunt.loadNpmTasks('grunt-contrib-imagemin');
  grunt.loadNpmTasks('grunt-contrib-copy');
  grunt.loadNpmTasks('grunt-webfont');
  grunt.loadNpmTasks('grunt-newer');
  // grunt.loadNpmTasks('grunt-contrib-uglify');

  grunt.registerTask('default', ['sass', 'autoprefixer', 'responsive_images', 'svgmin', 'webfont', 'newer:imagemin:dynamic']);

};
