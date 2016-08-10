module.exports = function(grunt) {
    /*
    ALTERNATIVE COLORS
    color-b6902f
    color-DD7E50
    color-F8DB1B
    color-72634E
    color-889456
    color-D1272F
    color-415CA1 
    */
  // Project configuration.
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    watch: {
      files: ['css/*.less'],
      tasks: ['less:main'],
    },
    less: {
        main: {
            files: {
                "css/build.css": "css/build.less"
            }
        },
        colorB6902F: {
            options: {
                modifyVars: {
                    'main-color': '#b6902f',
                    'header-color': '#2c2c2c'
                }
            },
            files: {
                "css/build-B6902F.css": "css/build.less"
            }
        },
        colorDD7E50: {
            options: {
                modifyVars: {
                    'main-color': '#DD7E50',
                    'header-color': '#2c2c2c'
                }
            },
            files: {
                "css/build-DD7E50.css": "css/build.less"
            }
        },
        colorF8DB1B: {
            options: {
                modifyVars: {
                    'main-color': '#F8DB1B',
                    'header-color': '#2c2c2c'
                }
            },
            files: {
                "css/build-F8DB1B.css": "css/build.less"
            }
        },
        color72634E: {
            options: {
                modifyVars: {
                    'main-color': '#72634E',
                    'header-color': '#352e25'
                }
            },
            files: {
                "css/build-72634E.css": "css/build.less"
            }
        },
        color889456: {
            options: {
                modifyVars: {
                    'main-color': '#889456',
                    'header-color': '#2c2c2c'
                }
            },
            files: {
                "css/build-889456.css": "css/build.less"
            }
        },
        colorD1272F: {
            options: {
                modifyVars: {
                    'main-color': '#D1272F',
                    'header-color': '#2c2c2c'
                }
            },
            files: {
                "css/build-D1272F.css": "css/build.less"
            }
        },
        color415CA1: {
            options: {
                modifyVars: {
                    'main-color': '#415CA1',
                    'header-color': '#2c2c2c'
                }
            },
            files: {
                "css/build-415CA1.css": "css/build.less"
            }
        },
        mainDark: {
            options: {
                modifyVars: {
                    'header-color': '#211F20'
                }
            },
            files: {
                "css/build-dark.css": ["css/build.less", 'css/dark.less']
            }
        },
        colorB6902FDark: {
            options: {
                modifyVars: {
                    'main-color': '#B6902F',
                    'header-color': '#171819'
                }
            },
            files: {
                "css/build-B6902F-dark.css": ["css/build.less", 'css/dark.less']
            }
        },
        colorDD7E50Dark: {
            options: {
                modifyVars: {
                    'main-color': '#DD7E50',
                    'header-color': '#171819'
                }
            },
            files: {
                "css/build-DD7E50-dark.css": ["css/build.less", 'css/dark.less']
            }
        },
        colorF8DB1BDark: {
            options: {
                modifyVars: {
                    'main-color': '#F8DB1B',
                    'header-color': '#171819'
                }
            },
            files: {
                "css/build-F8DB1B-dark.css": ["css/build.less", 'css/dark.less']
            }
        },
        color72634EDark: {
            options: {
                modifyVars: {
                    'main-color': '#72634E',
                    'header-color': '#171819'
                }
            },
            files: {
                "css/build-72634E-dark.css": ["css/build.less", 'css/dark.less']
            }
        },
        color889456Dark: {
            options: {
                modifyVars: {
                    'main-color': '#889456',
                    'header-color': '#171819'
                }
            },
            files: {
                "css/build-889456-dark.css": ["css/build.less", 'css/dark.less']
            }
        },
        colorD1272FDark: {
            options: {
                modifyVars: {
                    'main-color': '#D1272F',
                    'header-color': '#171819'
                }
            },
            files: {
                "css/build-D1272F-dark.css": ["css/build.less", 'css/dark.less']
            }
        },
        color415CA1Dark: {
            options: {
                modifyVars: {
                    'main-color': '#415CA1',
                    'header-color': '#171819'
                }
            },
            files: {
                "css/build-415CA1-dark.css": ["css/build.less", 'css/dark.less']
            }
        },
    }
  });

  // Load the plugin that provides the "uglify" task.
  grunt.loadNpmTasks('grunt-contrib-less');
  grunt.loadNpmTasks('grunt-contrib-watch');

  // Default task(s).
  grunt.registerTask('default', ['less']);
  grunt.registerTask('main', ['less:main']);

};
