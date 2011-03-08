/*
    tabSlideOUt v1.3
    
    By William Paoli: http://wpaoli.building58.com

    To use you must have an image ready to go as your tab
    Make sure to pass in at minimum the path to the image and its dimensions:
    
    example:
    
        $('.slide-out-div').tabSlideOut({
                tabHandle: '.handle',                         //class of the element that will be your tab -doesnt have to be an anchor
                pathToTabImage: 'images/contact_tab.gif',     //relative path to the image for the tab *required*
                imageHeight: '133px',                         //height of tab image *required*
                imageWidth: '44px',                           //width of tab image *required*    
        });

    
*/


(function($){
    $.fn.tabSlideOut = function(callerSettings) {
        var settings = $.extend({
            tabHandle: '.handle',
            speed: 300, 
            action: 'click',
            tabLocation: 'left',
            topPos: null,
            leftPos: null,
            fixedPosition: false,
            positioning: 'absolute',
            pathToTabImage: null,
            imageHeight: null,
            imageWidth: null,
            onLoadSlideOut: false,
            afterOpen: function(){console.log('afteropen');}                       
        }, callerSettings||{});

        settings.tabHandle = $(settings.tabHandle);
        var obj = this;

        
        if (settings.fixedPosition === true) {
            settings.positioning = 'fixed';
        } else {
            settings.positioning = 'absolute';
        }
        
        //ie6 doesn't do well with the fixed option
        if (document.all && !window.opera && !window.XMLHttpRequest) {
            settings.positioning = 'absolute';
        }
        

        
        //set initial tabHandle css
        
        if (settings.pathToTabImage != null) {
            settings.tabHandle.css({
            'background' : 'url('+settings.pathToTabImage+') no-repeat',
            'width' : settings.imageWidth,
            'height': settings.imageHeight
            });
        }else{ // DDC Settings
            settings.tabHandle.css({
            'width' : settings.imageWidth,
            'height': settings.imageHeight
            }); // end DDC Settings
		}
        
        settings.tabHandle.css({ 
            'display': 'block',
            'textIndent' : '-99999px',
            'outline' : 'none',
            'position' : 'absolute'
        });
        
        obj.css({
            'line-height' : '1',
            'position' : settings.positioning
        });

        
        var properties = {
                    containerWidth: parseInt(obj.outerWidth(), 10) + 'px',
                    containerHeight: parseInt(obj.outerHeight(), 10) + 'px',
                    tabWidth: parseInt(settings.tabHandle.outerWidth(), 10) + 'px',
                    tabHeight: parseInt(settings.tabHandle.outerHeight(), 10) + 'px'
                };

        //set calculated css
        if(settings.tabLocation === 'top' || settings.tabLocation === 'bottom') {
            obj.css({'left' : settings.leftPos});
            settings.tabHandle.css({'right' : 0});
        }
        
        if(settings.tabLocation === 'top') {
            obj.css({'top' : '-' + properties.containerHeight});
            settings.tabHandle.css({'bottom' : '-' + properties.tabHeight});
        }

        if(settings.tabLocation === 'bottom') {
            obj.css({'bottom' : '-' + properties.containerHeight, 'position' : 'fixed'});
            settings.tabHandle.css({'top' : '-' + properties.tabHeight});
            
        }
        
        if(settings.tabLocation === 'left' || settings.tabLocation === 'right') {
            obj.css({
                'height' : properties.containerHeight,
                'top' : settings.topPos
            });
            
            settings.tabHandle.css({'top' : 0});
        }
        
        if(settings.tabLocation === 'left') {
            obj.css({ 'left': '-' + properties.containerWidth});
            settings.tabHandle.css({'right' : '-' + properties.tabWidth});
        }

        if(settings.tabLocation === 'right') {
            obj.css({ 'right': '-' + properties.containerWidth});
            settings.tabHandle.css({'left' : '-' + properties.tabWidth});
            
            $('html').css('overflow-x', 'hidden');
        }

        //functions for animation events
        
        settings.tabHandle.click(function(event){
            event.preventDefault();
        });
        
        var slideIn = function(i) {
            
            if (settings.tabLocation === 'top') {
                obj.eq(i).animate({top:'-' + properties.containerHeight}, settings.speed).removeClass('open');
            } else if (settings.tabLocation === 'left') {
                obj.eq(i).animate({left: '-' + properties.containerWidth}, settings.speed).removeClass('open');
            } else if (settings.tabLocation === 'right') {
                obj.eq(i).animate({right: '-' + properties.containerWidth}, settings.speed).removeClass('open');
            } else if (settings.tabLocation === 'bottom') {
                obj.eq(i).animate({bottom: '-' + properties.containerHeight}, settings.speed).removeClass('open');
            }    
            
        };
        
        var slideOut = function(i) {
            if (settings.tabLocation == 'top') {
                obj.eq(i).animate({top:'-3px'},  settings.speed).addClass('open');
            } else if (settings.tabLocation == 'left') {
                obj.eq(i).animate({left:'-3px'},  settings.speed).addClass('open');
            } else if (settings.tabLocation == 'right') {
                obj.eq(i).animate({right:'-3px'},  settings.speed).addClass('open');
            } else if (settings.tabLocation == 'bottom') {
                obj.eq(i).animate({bottom:'-3px'},  settings.speed).addClass('open');
            }
        };

        var clickScreenToClose = function() {
            obj.click(function(event){
                event.stopPropagation();
            });
            
            
                $(document).click(function(){
                    obj.each(function(i){

                    slideIn(i);
                });
            });

        };
        
        var clickAction = function(){
            
            settings.tabHandle.each(function(i){
                
                $(this).click(function(){

                    
                    if (obj.eq(i).hasClass('open')) {
                        slideIn(i);
                    } else {
                        obj.each(function(x){
                            slideIn(x);
                        });
                        slideOut(i);                        
                    }

                })

                
                
            });

            clickScreenToClose();
        };
        
        var hoverAction = function(){
            obj.hover(
                function(){
                    slideOut();
                },
                
                function(){
                    slideIn();
                });
                
                settings.tabHandle.click(function(event){
                    if (obj.hasClass('open')) {
                        slideIn();
                    }
                });
                clickScreenToClose();
                
        };
        
        var slideOutOnLoad = function(){
            slideIn();
            setTimeout(slideOut, 500);
        };
        
        //choose which type of action to bind
        if (settings.action === 'click') {
            clickAction();
        }
        
        if (settings.action === 'hover') {
            hoverAction();
        }
        
        if (settings.onLoadSlideOut) {
            slideOutOnLoad();
        };
        
    };
})(jQuery);
