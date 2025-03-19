Control.TextArea.ToolBar.BBCode = Class.create();
Object.extend(Control.TextArea.ToolBar.BBCode.prototype,{
	textarea: false,
	toolbar: false,
	options: {
		preview: false
	},
	initialize: function(textarea,options){
		this.textarea = new Control.TextArea(textarea);
		this.toolbar = new Control.TextArea.ToolBar(this.textarea);
		if(options)
			for(o in options)
				this.options[o] = options[o];

		//buttons
		this.toolbar.addButton('Bold',function(){
			this.wrapSelection('[b]','[/b]');
		},{
			id: 'bbcode_bold_button'
		});

		this.toolbar.addButton('Italics',function(){
			this.wrapSelection('[i]','[/i]');
		},{
			id: 'bbcode_italics_button'
		});

        this.toolbar.addButton('Underline',function(){
            this.wrapSelection('[u]','[/u]');
        },{
            id: 'bbcode_underline_button'
        });

        this.toolbar.addButton('Quote',function(){
            this.wrapSelection('[quote]','[/quote]');
        },{
            id: 'bbcode_quote_button'
        });

        this.toolbar.addButton('Small size',function(){
            this.wrapSelection('[size=small]','[/size]');
        },{
            id: 'bbcode_smallsize_button'
        });

        this.toolbar.addButton('Large size',function(){
            this.wrapSelection('[size=large]','[/size]');
        },{
            id: 'bbcode_largesize_button'
        });

        this.toolbar.addButton('Code',function(){
            this.wrapSelection('[code]','[/code]');
        },{
            id: 'bbcode_code_button'
        });

        this.toolbar.addButton('Link',function(){
            var address = this.getSelection();
            var displayAddress = address;
            var protocol = 'http://';
            var result = address.match(/^\s*(\w+:\/*)?([^\(\)\?&"'\s]*)([^:\(\)"'\s]*).*/);
            if (result != null){
                address = result[2] + result[3];
                displayAddress = result[2];
                if (address.search(/\./) == -1){
                    protocol = '';
                    address = result[2];
                }
                address = address.replace(/\[.*?\]/g, '');
            }
            this.replaceSelection('[url=' + protocol + address + ']' + displayAddress + '[/url]');
        },{
			id: 'bbcode_link_button'
		});
    },

    addColorSelect: function(initial_text,colors,autowidth){
        var select = document.createElement('select');
        if (autowidth){
            var buttonsWidth = 170;
            if (navigator.appVersion.match(/\bMSIE\b/)) {
                buttonsWidth += 4;
            }
            select.style.width = (Element.getDimensions(this.textarea.textarea).width - buttonsWidth) + 'px';
        }
        var self = this;
        Event.observe(select, "change", function(e){
            Event.stop(e);
            var color = Event.element(e).value;
            select.selectedIndex = 0;
            self.textarea.wrapSelection('[color=' + color + ']','[/color]');
        });
        var option = document.createElement('option');
        option.innerHTML = initial_text;
        select.appendChild(option);
        select.selectedIndex = 0;
        for(var color in colors){
            option = document.createElement('option');
            option.innerHTML = colors[color][1];
            option.style.color = colors[color][0];
            option.value = color;
            select.appendChild(option);
        }
        this.toolbar.toolbar.appendChild(select);
    }

});
