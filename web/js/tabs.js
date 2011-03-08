
         $(function(){
             $('.slide-out-div').tabSlideOut({
                 tabHandle: '.handle',                              //class of the element that will be your tab
                 pathToTabImage: null,          //path to the image for the tab (optionaly can be set using css)
                 imageHeight: '122px',                               //height of tab image
                 imageWidth: '40px',                               //width of tab image    
                 tabLocation: 'left',                               //side of screen where tab lives, top, right, bottom, or left
                 speed: 300,                                        //speed of animation
                 action: 'click',                                   //options: 'click' or 'hover', action to trigger animation
                 topPos: null,                                   //position from the top
                 fixedPosition: true                               //options: true makes it stick(fixed position) on scroll
             });


         });

