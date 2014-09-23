module.exports = function(grunt) {

  grunt.initConfig({

    pkg: grunt.file.readJSON('package.json'),
    banner: '/*! <%= pkg.title || pkg.name %> - v<%= pkg.version %> - ' +
      '<%= grunt.template.today("yyyy-mm-dd") %>\n' +
      '<%= pkg.homepage ? "* " + pkg.homepage + "\\n" : "" %>' +
      '* Copyright (c) <%= grunt.template.today("yyyy") %> <%= pkg.author.name %>;' +
      ' Licensed <%= _.pluck(pkg.licenses, "type").join(", ") %> */\n',

    sass: {
      dist: {
        options: {
          style: 'compressed'
        },
        files: {
          "wp-content/themes/crucial-detail/src/css/style.css": "wp-content/themes/crucial-detail/src/sass/style.scss",
        }
      }
    },
    jshint: {
      options: {
        curly: true,
        eqeqeq: true,
        immed: true,
        latedef: true,
        newcap: true,
        noarg: true,
        sub: true,
        undef: true,
        unused: true,
        boss: true,
        eqnull: true,
        browser: true,
        globals: {
          jQuery: true
        }
      },
      gruntfile: {
        src: 'Gruntfile.js'
      },
      lib_test: {
        src: ['lib/**/*.js', 'test/**/*.js']
      }
    },
    autoprefixer: {
      dist: {
        files: {
          'wp-content/themes/crucial-detail/src/css/build/style.css': 'wp-content/themes/crucial-detail/src/css/style.css'
        }
      }
    },
    uglify: {
      dist: {
        src: 'wp-content/themes/crucial-detail/src/js/*.js',
        dest: 'wp-content/themes/crucial-detail/src/js/build/*.min.js'
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
      uglify: {
        files: ['wp-content/themes/crucial-detail/src/js/*.js'],
        tasks: ['uglify']
      }
    }
  });

  grunt.loadNpmTasks('grunt-autoprefixer');
  grunt.loadNpmTasks("grunt-contrib-sass");
  grunt.loadNpmTasks('grunt-contrib-jshint');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-contrib-uglify');

  grunt.registerTask('default', ['sass', 'autoprefixer', 'jshint', 'uglify']);

};
