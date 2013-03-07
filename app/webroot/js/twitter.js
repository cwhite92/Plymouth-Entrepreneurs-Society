jQuery.fn.extend(
{
	pixTwitter : function(options) {
		// Author: Ed Torba
		// www.edtorba.com
		// Version: 1.0.0
		var $this = $(this);

		// Default Options
		this.defaultOptions = {
			username: 'twitter',
			posts: 3
		};

		// Refreshing Settings
		var ops = $.extend({}, this.defaultOptions, options);
		$.getJSON("http://api.twitter.com/1/statuses/user_timeline/" + ops.username + ".json?callback=?", { count: ops.posts, include_rts: "true", include_entities: "true" }, function(data) {
			$.each(data, function(index, item) {
				$this.append('<li><a href="http://twitter.com/' + ops.username + '" target="_blank">@' + ops.username + '</a><p class="text">' + item.text.clean() + ' ' + '<span class="date">' + item.created_at.timeAgo() + '</span>' + '</p></li>');
			});
		});
	} // END pixTwitter
});

// Convert Twitter API Timestamp to "Time Ago"
String.prototype.timeAgo = function() {
	var time = this;
	var values = time.split(" ");
	time = values[1] + " " + values[2] + ", " + values[5] + " " + values[3];
	var parsed_date = Date.parse(time);
	var relative_to = (arguments.length > 1) ? arguments[1] : new Date();
	var delta = parseInt((relative_to.getTime() - parsed_date) / 1000);
	delta = delta + (relative_to.getTimezoneOffset() * 60);

	var r = '';
	if (delta < 60) { //60 sec
	    r = 'less than a minute ago';
	} else if(delta < 120) { //2 min
	    r = 'a minute ago';
	} else if(delta < (60*60)) { //60 min
	    r = (parseInt(delta / 60)).toString() + ' minutes ago';
	} else if(delta < (120*60)) { //2 hours
	    r = 'an hour ago';
	} else if(delta < (24*60*60)) { //1 day
	    r = (parseInt(delta / 3600)).toString() + ' hours ago';
	} else if(delta < (48*60*60)) { //2 days
	    r = 'a day ago';
	} else { // > 2 days
	    r = (parseInt(delta / 86400)).toString() + ' days ago';
	}

	return r;
};

// Create Usable Links
String.prototype.clean = function() {
	return hash(at(list(link(this))));
};

function link(b) {
    return b.replace(/\b(((https*\:\/\/)|www\.)[^\"\']+?)(([!?,.\)]+)?(\s|$))/g, function (a, b, g, f, h) {
        return '<a class="pixTwitterLink" href="' + (g.match(/w/) ? "http://" : "") + b + '" target="_blank">' + (25 < b.length ? b.substr(0, 24) + "..." : b) + "</a>" + h;
    })
}
function at(b) {
    return b.replace(/\B[@@]([a-zA-Z0-9_]{1,20})/g, function (a, b) {
        return '<a class="pixTwitterAt" href="http://twitter.com/intent/user?screen_name=' + b + '" target="_blank">@' + b + "</a>";
    })
}
function list(b) {
    return b.replace(/\B[@@]([a-zA-Z0-9_]{1,20}\/\w+)/g, function (a, b) {
        return '<a class="pixTwitterList" href="http://twitter.com/' + b + '" target="_blank">@' + b + "</a>";
    })
}
function hash(b) {
    return b.replace(/(^|\s+)#(\w+)/gi, function (a, b, g) {
        return b + '<a class="pixTwitterHash" href="http://twitter.com/search?q=%23' + g + '" target="_blank">#' + g + "</a>";
    })
}