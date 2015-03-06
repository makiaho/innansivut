/**
 * 
 */

QuoteLog = function(loggable) {
	
	try {
		console.log(loggable);
	} catch (e) {
		QuoteLog = function() {}
	}
}

QuoteCommandCreate = {
	"execute": function(e) {
		if (!e) var e = window.event;
		QuoteLog(e);
		QuoteLog("QuoteCommandCreate.execute");
		
		var url = "index.php?app=quotesajax&view=create&ajax=1";
		jQuery.get(url, {}, function(data) {
			QuoteLog(data);
			QuoteCreateView.setForm(data.form);
			QuoteCreateView.setError(data.error,data.message);
			QuoteCreateView.display();
		}, 'json');
		
		e.cancelBubble = true;
		e.returnValue = false;
		//e.stopPropagation works only in Firefox.
		if (e.stopPropagation) {
			e.stopPropagation();
			e.preventDefault();
		}
	}
}

QuoteCommandSubmit = {
	"execute": function(e) {
		
		/* stop form from submitting normally */
		e.cancelBubble = true;
		e.returnValue = false;
		//e.stopPropagation works only in Firefox.
		if (e.stopPropagation) {
			e.stopPropagation();
			e.preventDefault();
		}    
	    
		/* get some values from elements on the page: */
	    var $form    = $("#quoteform");
	    var formdata = $form.serializeArray();
	    var url      = $form.attr( 'action' );

	    /* Send the data using post and put the results in a div */
	    jQuery.post( url, formdata,
	      function( data ) {
	    	Quote.bind(data.payload);
	    	QuoteReadView.setQuote(Quote);
	    	QuoteReadView.setError(data.error,data.message);
	    	QuoteReadView.display();
	    	
	      }, 'json'
	    );
		
	}		
}

QuoteCommandRead = {
	"execute": function() {}		
}

QuoteCommandDelete = {
	"execute": function(e,id) {
		QuoteLog("QuoteCommandDelete.execute");
		QuoteLog(e);
		QuoteLog(id);
		var confirmer = confirm("Realy Wanna Delete? ("+ id +")");
		if (confirmer) {
			jQuery.get("index.php?app=quotesajax&view=delete&ajax=1&id=" + id);
			QuoteCommandList.execute(new jQuery.Event);
		}
		
	}		
}

QuoteCommandUpdate = {
	"execute": function(e,id) {
		QuoteLog("QuoteCommandUpdate.execute");
		QuoteLog(e);
		QuoteLog(id);

		QuoteProxy.load(id,function(quote){
			QuoteLog(quote);
			QuoteUpdateView.setQuote(quote);
			//QuoteUpdateView.setError(data.error,data.message);
			QuoteUpdateView.display();
		});
		
		e.cancelBubble = true;
		e.returnValue = false;
		//e.stopPropagation works only in Firefox.
		if (e.stopPropagation) {
			e.stopPropagation();
			e.preventDefault();
		}
	}		
}

QuoteCommandList = {
	"execute": function(e) {
		if (!e) var e = window.event;
		QuoteLog(e);
		QuoteLog("QuoteCommandList.execute");
		QuotesProxy.load(function(data) {
			QuoteLog("----");
			QuoteLog(data);
			QuoteLog("----");
			
			QuoteListView.setRows(data);
			QuoteListView.display();						
		});
		e.cancelBubble = true;
		e.returnValue = false;

		//e.stopPropagation works only in Firefox.
		if (e.stopPropagation) {
			e.stopPropagation();
			e.preventDefault();
		}

	}
}

var Quote = {
	"id": null,
	"thequote": null,
	"bywhom": null,
	"whenyear": null,
	"getDataAsArray": function() {
		return [this.id, this.thequote,this.bywhom,this.whenyear];
	},
	"bind": function(data) {
		this.id       = data.id;
		this.thequote = data.thequote;
		this.bywhom   = data.bywhom;
		this.whenyear = data.whenyear;
	}
}

QuoteProxy = {
	"id": null,
	"thequote": null,
	"bywhom": null,
	"whenyear": null, 
	"load": function(id,fn) {
		// load using jquery.
		var url = "index.php?app=quotesajax&view=read&ajax=1&id=" + id;
		jQuery.getJSON(url, function(data) {
					if (data.errors == 0) {
						Quote.bind(data.payload);
						fn(Quote);
					} else {
						// to do error handling
						fn(data);
					}
		});
	},
	"reset": function() {
		this.id       = null;
		this.thequote = "";
		this.bywhom   = "";
		this.whenyear = "";
	}
	
}

QuotesProxy = {
	"rows": [],
	"load": function(fn) {
		var url = "index.php?app=quotesajax&view=quotes&ajax=1";
		jQuery.getJSON(url, function(data) {
			QuoteLog(data.errors);
			if (data.errors == 0) {
				QuoteLog("-------------------------");
				QuoteLog(this);
				QuoteLog("loaded data");
				QuoteLog(data.payload);
				QuoteLog("-------------------------");
				
				this.rows = data.payload;
				fn(data.payload);
			} else {
				// to do error handling
				fn(data);
			}
		});
	},
	"getRows": function() {
		return this.rows;
	}
}

/*************************************************************************
 * ***********************************************************************
 * 
 * VIEWS START HERE
 * 
 * ***********************************************************************
 */

QuoteCreateView = {
	
	"form": null,
	"error": null,
	"message": null,
	
	"setForm": function(form) {
		this.form = form;
	},
	"setError": function(error,message) {
		this.error = error;
		this.message = message;
	},
	"display": function() {
		if (this.error > 0) {
			jQuery("#quotes").html(this.message);
		}
		jQuery("#quotesstage").html(this.form);
		

	}
}

QuoteUpdateView = {
		"quote": null,
		"error": null,
		"message": null,
		
		"setQuote": function(quote) {
			this.quote = quote;
		},
		"setError": function(error,message) {
			this.error = error;
			this.message = message;
		},
		"display": function() {
			
			jQuery("body").html(
			"<div id='quotesstage'><h1></h1>"+
			"<div id='quoteformholder'>"+
			"</div>"+
			"</div>"
			);
			if (this.error > 0) {
				jQuery("#quoteformholder").html(this.message);
			} else {
				jQuery("h1").html("Edit Quote");
				jQuery("#quoteformholder").html(
						'<div class="clearfix"></div>'
						+'<style>'
						+'.formrow label {'
						+'	width:200px;'
						+'	display:block;'
						+'	float:left;'
						+'}'
						+'</style>'
						+'<form '
						+'	action="index.php?app=quotesajax&view=update&issubmit=1&id='+this.quote.id+'&ajax=1"' 
						+'	onsubmit="javascript:QuoteCommandSubmit.execute(event)" '
						+'	method="post"'
						+'	id="quoteform"'
						+'	>'
						+'	'
						+'	<div class="formrow">'
						+'	<label for="thequote">Quote:</label>'
						+'	<textarea name="thequote">'+this.quote.thequote+'</textarea>'
						+'	</div>'
						+'	'
						+'	<div class="formrow">'
						+'	<label for="bywhom">Who:</label>'
						+'	<input type="text" name="bywhom" value="'+this.quote.bywhom+'" />'
						+'	</div>'
						+'	'
						+'	<div class="formrow">'
						+'	<label for="whenyear">When:</label>'
						+'	<input type="text" name="whenyear" value="'+this.quote.whenyear+'" />'
						+'	</div>'
						+'	'
						+'	<div class="formrow">'
						+'	<input type="submit" value="Send" />'
						+'	</div>'
						+'<input type="hidden" name="id" value="'+this.quote.id+'" />'
						+'</form>'
				);
			}

		}
}

QuoteReadView = {
	"error": null,
	"message": null,
	"quote" : null,
	"setError": function(error,message) {
		this.error = error;
		this.message = message;
	},
	"setQuote": function(quote) {
		this.quote = quote;
	},
	"display": function() {
		
		var stage="<div id='quotesstage'><h1></h1>\
<div id='quote'><blockquote></blockquote>\
<tt></tt>\
<p><a href='#' onclick='javascript:QuoteCommandList.execute(event)'>All Quotes</a></p></div>";
		
		jQuery("body").html(stage);

		if (this.error > 0) {
			jQuery("#quote").html(this.message);
		} else {
			jQuery("#quotesstage h1").html("#" + this.quote.id);
			jQuery("#quote blockquote").html(this.quote.thequote);
			jQuery("#quote tt").html(this.quote.bywhom + " / " +  this.quote.whenyear);
		}
		
	}
}

QuoteDeleteView = {
	
}

/**
 * bind to div with id quotes
 */
QuoteListView = {
	"rows": null,
	"setRows":function(rows) {
		this.rows = rows;
	},
	"display": function() {
		// create table and insert it to DOM
		var tbl = "<table border='1'><tr><th>#</th><th>Quote</th><th>Who</th><th>When</th><th>&nbsp;-</th></tr>";
		// foreach row in rows
		if (this.rows.length > 0) {
			
			for(var i=0;i<this.rows.length; i++) {
				tbl += "<tr><td>";	
				QuoteLog(this.rows[i]);
				Quote.bind(this.rows[i]);
				tbl += Quote.getDataAsArray().join("</td><td>"); 
				tbl += "</td>";
				tbl += "<td><span style='cursor:pointer' onclick='javascript:QuoteCommandDelete.execute(event,"+Quote.id+")'>Del</span> / <span style='cursor:pointer' onclick='javascript:QuoteCommandUpdate.execute(event,"+Quote.id+")'>Edit</span></td>";
				tbl += "</tr>";
			}			
		} else {
			
		}
		
		tbl += "</table>";
		
		
		var stage="<div id='quotesstage'>\
		<h1>Quotes</h1>\
		<div id='quotes'></div>\
		<a href='#' onclick='javascript:QuoteCommandCreate.execute(event)'>Create New</a></div>";

	
		jQuery("body").html(stage);
		jQuery("#quotes").html(tbl);
	}
}