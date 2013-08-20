// --- NAMESPANCING -- \\
var WME = {
	Model: [],
	Collection: [],
	View: []
};


// --- SHOW MODEL -- \\
WME.Model.Show = Backbone.Model.extend({

	defaults: {
		venue: '',
		date: '',
		time: '',
		city: '',
		state: '',
		zip: '',
		deals: null,
		link_ticket: '',
		link_info: ''
	}
	
});


// --- SHOW COLLECTION -- \\
WME.Collection.Show = Backbone.Collection.extend({

	model: WME.Model.Show,
	url: 'api/shows'
	
});


// --- EDIT VIEW -- \\
WME.View.Edit = Backbone.View.extend({
	
	template: _.template($('#edit_template').html()),
	tagName: 'form',
	className: 'edit_show',
	
	events: {
		
		'click #save': 'saveShow',
		'click #delete': 'deleteShow',
		'click #cancel': 'cancel'
		
	},
	
	initialize: function() {
	
		if (!this.model)
			this.model = new WME.Model.Show;
	
		this.model.bind('hide', function() { $(this.el).hide(); }, this);
		this.model.bind('show', function() { $('form').hide(); $(this.el).show(); }, this);
	
		this.render();
		
	},
	
	render: function() {
	
		$(this.el).html(this.template(this.model.toJSON()));
		
		if (this.model.get('venue') != '') {
		
			$(this.el).find('legend').html('Edit Show: ' + this.model.get('venue'));
			$(this.el).find('#delete').show();
			$(this.el).find('#cancel').show();
			
		} else {
			
			$(this.el).show();
			
		}
		
		return this;
		
	},
	
	saveShow: function() {
		
		// get all of the fields
		var obj = $(this.el).gather();
		
		// validate the necessary fields
		if (obj.venue == '') {
			alert('Please enter in a venue');
			return false;
		} else if (obj.date == '') {
			alert('Please enter a show date');
			return false;
		} else if (obj.time == '') {
			alert('Please enter a show time');
			return false;
		} else if (obj.city == '') {
			alert('Please enter a city');
			return false;
		} else if (obj.sate == '') {
			alert('Please enter a state');
			return false;
		} /*else if (obj.zip == '') {
			alert('Please enter a zip code');
			return false;
		}*/
		
		// format the date appropriately
		obj.date = Date.parse(obj.date).toString('yyyy-MM-dd');
		
		var that = this;
		
		// save the model to the server
		if (this.model.id) {
			this.model.save(obj);
		} else {
			$.app.collection.create(obj);
		}
		
		// clear out the form
		this.model.trigger('hide');
		$('#app_view').prepend(new WME.View.Edit().render().el);
		
	},
	
	deleteShow: function() {
		
		this.model.destroy();
		$(this.el).remove();
		$('#app_view').prepend(new WME.View.Edit().render().el);
		
	},
	
	cancel: function() {
	
		$('form').show();
		
		$.app.collection.each(function(show) {
			show.trigger('hide');
		});
		
	}
	
});


// --- LIST VIEW -- \\
WME.View.List = Backbone.View.extend({

	collection: new WME.Collection.Show,
	el: '#show_list',
	
	initialize: function() {
		
		$('#app_view').prepend(new WME.View.Edit().render().el);
		
		this.collection.bind('reset add destroy', this.render, this);
		this.collection.fetch();
		
	},
	
	render: function() {
	
		$(this.el).html('');
	
		_.each(this.collection.models, function(show) {
		
			$(this.el).append(new WME.View.Show({model: show}).render().el);
			$('#app_view').prepend(new WME.View.Edit({model: show}).render().el);
			
		}, this);
		
	}
	
});


// --- SHOW VIEW -- \\
WME.View.Show = Backbone.View.extend({
	
	tagName: 'tr',
	template: _.template($('#show_template').html()),
	
	events: {
		
		'click': 'editShow'
		
	},
	
	render: function() {
		
		$(this.el).html(this.template(this.model.toJSON()));
		return this;
		
	},
	
	editShow: function() {
		
		this.model.trigger('show');
		
	}
	
});

// --- EDIT / CREATE VIEW -- \\


// --- START -- \\
$(function() {
	
	$.app = new WME.View.List;
	
});