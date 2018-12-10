/*! sprintf-js | Alexandru Marasteanu <hello@alexei.ro> (http://alexei.ro/) | BSD-3-Clause */

!function(a){function b(){var a=arguments[0],c=b.cache;return c[a]&&c.hasOwnProperty(a)||(c[a]=b.parse(a)),b.format.call(null,c[a],arguments)}function c(a){return Object.prototype.toString.call(a).slice(8,-1).toLowerCase()}function d(a,b){return Array(b+1).join(a)}var e={not_string:/[^s]/,number:/[dief]/,json:/[j]/,not_json:/[^j]/,text:/^[^\x25]+/,modulo:/^\x25{2}/,placeholder:/^\x25(?:([1-9]\d*)\$|\(([^\)]+)\))?(\+)?(0|'[^$])?(-)?(\d+)?(?:\.(\d+))?([b-fijosuxX])/,key:/^([a-z_][a-z_\d]*)/i,key_access:/^\.([a-z_][a-z_\d]*)/i,index_access:/^\[(\d+)\]/,sign:/^[\+\-]/};b.format=function(a,f){var g,h,i,j,k,l,m,n=1,o=a.length,p="",q=[],r=!0,s="";for(h=0;o>h;h++)if(p=c(a[h]),"string"===p)q[q.length]=a[h];else if("array"===p){if(j=a[h],j[2])for(g=f[n],i=0;i<j[2].length;i++){if(!g.hasOwnProperty(j[2][i]))throw new Error(b("[sprintf] property '%s' does not exist",j[2][i]));g=g[j[2][i]]}else g=j[1]?f[j[1]]:f[n++];if("function"==c(g)&&(g=g()),e.not_string.test(j[8])&&e.not_json.test(j[8])&&"number"!=c(g)&&isNaN(g))throw new TypeError(b("[sprintf] expecting number but found %s",c(g)));switch(e.number.test(j[8])&&(r=g>=0),j[8]){case"b":g=g.toString(2);break;case"c":g=String.fromCharCode(g);break;case"d":case"i":g=parseInt(g,10);break;case"j":g=JSON.stringify(g,null,j[6]?parseInt(j[6]):0);break;case"e":g=j[7]?g.toExponential(j[7]):g.toExponential();break;case"f":g=j[7]?parseFloat(g).toFixed(j[7]):parseFloat(g);break;case"o":g=g.toString(8);break;case"s":g=(g=String(g))&&j[7]?g.substring(0,j[7]):g;break;case"u":g>>>=0;break;case"x":g=g.toString(16);break;case"X":g=g.toString(16).toUpperCase()}e.json.test(j[8])?q[q.length]=g:(!e.number.test(j[8])||r&&!j[3]?s="":(s=r?"+":"-",g=g.toString().replace(e.sign,"")),l=j[4]?"0"===j[4]?"0":j[4].charAt(1):" ",m=j[6]-(s+g).length,k=j[6]&&m>0?d(l,m):"",q[q.length]=j[5]?s+g+k:"0"===l?s+k+g:k+s+g)}return q.join("")},b.cache={},b.parse=function(a){for(var b=a,c=[],d=[],f=0;b;){if(null!==(c=e.text.exec(b)))d[d.length]=c[0];else if(null!==(c=e.modulo.exec(b)))d[d.length]="%";else{if(null===(c=e.placeholder.exec(b)))throw new SyntaxError("[sprintf] unexpected placeholder");if(c[2]){f|=1;var g=[],h=c[2],i=[];if(null===(i=e.key.exec(h)))throw new SyntaxError("[sprintf] failed to parse named argument key");for(g[g.length]=i[1];""!==(h=h.substring(i[0].length));)if(null!==(i=e.key_access.exec(h)))g[g.length]=i[1];else{if(null===(i=e.index_access.exec(h)))throw new SyntaxError("[sprintf] failed to parse named argument key");g[g.length]=i[1]}c[2]=g}else f|=2;if(3===f)throw new Error("[sprintf] mixing positional and named placeholders is not (yet) supported");d[d.length]=c}b=b.substring(c[0].length)}return d};var f=function(a,c,d){return d=(c||[]).slice(0),d.splice(0,0,a),b.apply(null,d)};"undefined"!=typeof exports?(exports.sprintf=b,exports.vsprintf=f):(a.sprintf=b,a.vsprintf=f,"function"==typeof define&&define.amd&&define(function(){return{sprintf:b,vsprintf:f}}))}("undefined"==typeof window?this:window);

jQuery(document).ready(function($) {
	$('.mts-calorie-calculator .change-unit input').change(function(event) {
		var $this = $(this);
		var show = '.'+$this.val();
		var hide = (show == '.metric' ? '.imperial' : '.metric');
		var $widget = $this.closest('.mts-calorie-calculator');
		$widget.find(show).show();
		$widget.find(hide).hide().find('input').val('');
	});

	$('.mts-calorie-calculator').each(function(index, el) {
		$(this).find('.calculate a').click(function(event) {
			event.preventDefault();
			calculateCalories(el);
		});
	});

	function calculateCalories(form_selector) {
		var $form = $(form_selector);
		
		var unit = $form.find('input[name=unit]:checked').val();
		var age = parseInt($form.find('#cc-age').val());
		var heightCm = 0;
		var weightKg = 0;
		var goalKg = 0;

		var daily_intake = 0;

		if (unit == 'imperial') {
			var feet = parseInt($form.find('#cc-feet').val());
			var inches = parseInt($form.find('#cc-inches').val());
			var inchesTotal = inches + (12 * feet);
			heightCm = inchesTotal * 2.54;

			weightKg = parseFloat($form.find('#cc-lbs').val()) * 0.45359237;
			goalKg = parseFloat($form.find('#cc-goal-lbs').val()) * 0.45359237;
		} else {
			heightCm = parseInt($form.find('#cc-cm').val());
			weightKg = parseFloat($form.find('#cc-kg').val());
			goalKg = parseFloat($form.find('#cc-goal-kg').val());
		}
		
		/*
		console.log('heightCm '+heightCm);
		console.log('weightKg '+weightKg);
		console.log('goalKg '+goalKg);
		*/

		if (!heightCm || !weightKg || !goalKg ) {
			$form.find('.calculator-error').text(mts_calorie_calculator.error).show();
			$form.find('.calculator-results, .calculator-footer').hide();
			return;
		}
		
		daily_intake = Math.floor(((9.99 * weightKg) + (6.25 * heightCm) - (4.92 * age)) * 1.5); // 1.5 -> moderate activity (low=1.2 high=1.9)
		if (goalKg < weightKg) {
			diet_weeks = Math.round((weightKg - goalKg) / 0.45);
			diet_cals = daily_intake - 500;
		} else {
			diet_weeks = Math.round((goalKg - weightKg) / 0.45);
			diet_cals = daily_intake + 500;
		}
		
		// -500 cal/day = -0.45kg/week

		//$form.find('.calculator-results').text('Your daily intake: ' + daily_intake + ' calories');
		$form.find('.calculator-error').hide();
		$form.find('.calculator-results').show().text(sprintf(mts_calorie_calculator.result, daily_intake, diet_weeks, diet_cals));
		$form.find('.calculator-footer').show();
	}
});

