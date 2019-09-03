var RotatingCounter;
$(document).ready(function(){

	Number.prototype.formatMoney = function(c, d, t){
	var n = this,
	    c = isNaN(c = Math.abs(c)) ? 2 : c,
	    d = d == undefined ? "." : d,
	    t = t == undefined ? "," : t,
	    s = n < 0 ? "-" : "",
	    i = String(parseInt(n = Math.abs(Number(n) || 0).toFixed(c))),
	    j = (j = i.length) > 3 ? j % 3 : 0;
	   return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
	 };


	//Here how to call above plugin from everywhere in your application document body
	$('.main-cta-button').on('mouseenter mouseleave',function(){
		$('body').toggleClass('cta-is-hovered');
	});
	$('.toggler-pwd').click(function(){
		var pwd = $('#suf_Password'),
			type = $('#suf_Password').attr('type');
			if( type == 'text' )
				pwd.attr('type', 'password');
			else
				pwd.attr('type', 'text');
	});

	$('body').click(function(e){
		var trg = $(e.target),
			_b = $(this);
		// if( _b.hasClass('form-focused') && !trg.parents('.form-container').length && ((trg[0].nodeName == 'A') || trg.parents('a') ) )
		// 	e.preventDefault();

		if( !trg.parents('.form-container').length && !trg.hasClass('form-container') && ((trg[0].nodeName != 'A') && !trg.parents('a').length ) )
			$('body').removeClass('form-focused');
	});


	/* JACKPOT STUFF - {REWRITE IN PROPER OBJECT SINGULARITY} */

	RotatingCounter = {

		interval: 180,
		parent: 'fancy-jackpot',
		i_class: 'single-char',
		height: $('.fancy-jackpot').height(), // default

		start:  function(){
			var counter = $(".jackpot-counter").children('a'),
				obj = this,
				jackpot = initial_jackpot; // we will store the number here
				this.height = $('.'+this.i_class).height();
			setInterval( function(){
				prev_jackpot = jackpot; // saving for comparation and changingn dom only where digits were changed
				jackpot = (parseFloat(jackpot) + 1 / 100).toFixed(2); // adding up 0.01
					var formatted = obj.formatNumber(jackpot, ',');
					obj.replaceChanged(formatted);
			} , obj.interval + obj.interval/8 );
		},

		formatNumber: function (num, separator){
			var floated = parseFloat(num).toFixed(2) % 1,
				naturalNum = Math.round(num - floated).toString(),
				chunks = [];
			for (var i = naturalNum.length - 1; i >= 0; i--) {
				if( ( (i % 3) == 0) && (i != 0) ){
					chunk = naturalNum.substr(naturalNum.length - i , 3);
					chunks.push(chunk);
				}
			}
			notwholesome = naturalNum.length - chunks.join('').length;
			if( notwholesome > 0 ){
				last_chunk = naturalNum.toString().substr(0, notwholesome);
				chunks.unshift(last_chunk);
			}
			joined = chunks.join(separator);
			fixed_floated = floated.toFixed(2).replace('0.', '');
			return f = joined + '.' + fixed_floated;
		},

		format: function(number){
			var num = number.toString(),
				pre_html = [],
				html = '';
			for (var i = num.length - 1; i >= 0; i--) {
				el_class = this.i_class;
				if( !$.isNumeric(num[i]) ){
					el_class += ' a-symbol'; // we mark those characters that are NOT numbers to refer to them easily when they require an update
				}
				pre_html.push("<li class='"+ el_class +"'><span>"+num[i]+"</span></li>");
			}
			html += pre_html.reverse().join('');
			return '<ul class="'+this.parent+'">'+html+'</ul>';
			// format with html all the numbers
		},
		replaceChanged: function(number){ // formatting and returning only changed values
			var num = number.toString(),
				prev_formtd = this.formatNumber(prev_jackpot, ',');
				// global jackpot formatted to match

			for (var i = num.length - 1; i >= 0; i--) {
				var parent = $('.'+this.parent);
				if(prev_formtd[i] != num[i]){ // TODO: case of big numbers
					var r = parent.children('.'+this.i_class).eq(i);
					this.changeChar(r, num[i], i, num);
				}
			}
		},
		changeChar: function(elem, char, i, num){
			var newVal = '<span>'+char+'</span>';
			var el = $(elem);
			$(newVal).appendTo(elem);

			el.animate({
			  		scrollTop: RotatingCounter.height
				},
				RotatingCounter.getDelay(i, num), // getting different delay for every row so it will look nicer
				function(){
					el.children('span').eq(0).remove(); // removing previous number after animation is completed
				}
			);
		},
		getDelay: function(i, num){
			if( (num.length - 1) != i )
				delay = Math.abs( ((num.length - 1) / i ) * (this.interval/ 2 * ((num.length - 1) / i )) + this.interval );
			else
				delay = this.interval;
			return delay;
		}
	}

	/* END JACKPOT STUFF */

});
