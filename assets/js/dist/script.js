var nja = (function () {
	var fn = {};
	var data;
	var group_name = 'nja-group';
	var item_name = 'nja-item';
	var active_name = 'nja-active';
	var count_name = 'nja-count';

	// INIT
	fn.init = function(options) {
		data = options;
		var sets = document.querySelectorAll('[data-' + group_name + ']');
		for(var i=0; i<sets.length; i++) {
			var items = fn.getItems(sets[i]);

			for(var j=0; j<items.length; j++) {
				fn.initCount(items[j]);
				items[j].addEventListener('click', fn.action.bind(null, items[j], sets[i]), false);
			}
		}
	};

	// ACTION
	fn.action = function(item, group) {
		var active = fn.isActive(item);
		var count = fn.getCount(item);

		fn.addLoading(group);
		fn.reset(group, count);
		fn.toggle(item, group, active, count);
		fn.ajax(item, group, active, count);
	};

	// TOGGLE
	fn.toggle = function(item, group, active, count) {
		if(active) {
			fn.removeActive(item);
			fn.resetCount(item);
			fn.setValue(group, 0);
		} else {
			fn.addActive(item);
			fn.setCount(item, count);
			fn.setValue(group, fn.getValue(item));
		}
	};

	// RESET
	fn.reset = function(group, count) {
		var items = fn.getItems(group);
		for(var i=0; i<items.length; i++) {
			fn.resetCount(items[i], count);
			fn.removeActive(items[i]);
		}
	};

	// COUNT
	fn.initCount = function(item) {
		var count_obj = item.querySelector('[data-' + count_name + ']');
		var counter = parseInt(count_obj.innerHTML);
		var active = fn.isActive(item);
		if(active) {
			counter--;
		}
		count_obj.setAttribute('data-' + count_name, counter);
	};
	fn.getCount = function(item) {
		return item.querySelector('[data-' + count_name + ']').getAttribute('data-' + count_name);
	}
	fn.setCount = function(item, count) {
		item.querySelector('[data-' + count_name + ']').innerHTML = parseInt(count) + 1;
	};
	fn.resetCount = function(item, count) {
		var count_obj = item.querySelector('[data-' + count_name + ']');
		count_obj.innerHTML = count_obj.getAttribute('data-' + count_name);
	};

	// ITEMS
	fn.getItems = function(group) {
		return group.querySelectorAll('[data-' + item_name + ']');
	};

	// LOADING
	fn.addLoading = function(group) {
		group.classList.add('nja-loading');
	};
	fn.removeLoading = function(group) {
		group.classList.remove('nja-loading');
	};

	// ACTIVE
	fn.isActive = function(item) {
		return item.classList.contains(active_name);
	};
	fn.addActive = function(item) {
		item.classList.add(active_name);
	};
	fn.removeActive = function(item) {
		item.classList.remove('nja-active');
	};

	// VALUE
	fn.getValue = function(item) {
		return item.getAttribute('data-nja-item');
	};
	fn.setValue = function(group, count) {
		group.setAttribute('data-nja-value',count);
	};

	// ID
	fn.getId = function(group) {
		return group.getAttribute('data-nja-group');
	};

	// AJAX
	fn.ajax = function(item, group, active, count) {
		var xmlhttp = new XMLHttpRequest();

		xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == XMLHttpRequest.DONE ) {
				if (xmlhttp.status == 200) {
					fn.removeLoading(group);
					if(data && typeof data['ajaxCallback'] == 'function') {
						data.ajaxCallback(active, count, item, group);
					}
				}
				else {
				}
			}
		};

		xmlhttp.open('GET', 'nja/' + group.getAttribute('data-nja-value') + '/' + fn.getId(group), true);
		xmlhttp.send();
	};

	return fn;
})();