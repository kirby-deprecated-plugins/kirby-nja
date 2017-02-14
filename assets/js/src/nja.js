var nja = (function () {
	var fn = {};
	var data;
	var group_name = 'nja-group';
	var item_name = 'nja-item';
	var active_name = 'nja-active';
	var count_name = 'nja-count';

	// Init
	fn.init = function(options) {
		data = options;
		var sets = document.querySelectorAll('[data-' + group_name + ']');
		for(var i=0; i<sets.length; i++) {
			var items = fn.getItems(sets[i]);

			for(var j=0; j<items.length; j++) {
				fn.setCountData(items[j]);
				items[j].addEventListener('click', fn.action.bind(null, items[j], sets[i]), false);
			}
		}
	};

	// Set count data
	fn.setCountData = function(item, parent) {
		var count_obj = item.querySelector('[data-' + count_name + ']');
		var counter = parseInt(count_obj.innerHTML);
		if(item.hasAttribute('data-nja-active')) {
			counter--;
		}
		count_obj.setAttribute('data-' + count_name, counter);
	};

	// Action
	fn.action = function(item, group) {
		var active = item.hasAttribute('data-' + active_name);
		var count = item.querySelector('[data-' + count_name + ']').getAttribute('data-' + count_name);

		group.setAttribute('data-nja-loading', '');

		fn.clear(group, count);
		fn.toggleData(item, group, active, count);
		fn.ajax(active, count, item, group);
	};

	// Clear counter and value
	fn.clear = function(group, count) {
		var items = fn.getItems(group);
		for(var i=0; i<items.length; i++) {
			fn.clearCounter(items[i], count);
			fn.clearValue(items[i]);
		}
	};

	fn.getItems = function(group) {
		return group.querySelectorAll('[data-' + item_name + ']');
	};

	// Clear value. Remove data value
	fn.clearValue = function(item) {
		item.removeAttribute('data-' + active_name);
	};

	// Clear counter. Reset to data attribute
	fn.clearCounter = function(item, count) {
		var count_obj = item.querySelector('[data-' + count_name + ']');
		count_obj.innerHTML = count_obj.getAttribute('data-' + count_name);
	};

	// Count up
	fn.countUp = function(item, count) {
		item.querySelector('[data-' + count_name + ']').innerHTML = parseInt(count) + 1;
	};

	// Toggle data
	fn.toggleData = function(item, group, active, count) {
		if(active) {
			fn.clearValue(item);
			fn.clearCounter(item);
			group.setAttribute('data-nja-value',0);
		} else {
			item.setAttribute('data-' + active_name, '');
			fn.countUp(item, count);
			group.setAttribute('data-nja-value',item.getAttribute('data-nja-item'));
		}
	};

	// Ajax call
	fn.ajax = function(active, count, item, group) {
		var xmlhttp = new XMLHttpRequest();

		xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == XMLHttpRequest.DONE ) {
				if (xmlhttp.status == 200) {
					group.removeAttribute('data-nja-loading', '');
					data.ajaxCallback(active, count, item, group);
				}
				else {
				}
			}
		};

		var id = group.getAttribute('data-nja-group');

		xmlhttp.open('GET', 'nja/' + group.getAttribute('data-nja-value') + '/' + id, true);
		xmlhttp.send();
	};

	return fn;
})();