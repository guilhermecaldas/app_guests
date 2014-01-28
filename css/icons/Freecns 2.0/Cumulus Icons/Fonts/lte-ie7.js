/* Load this script using conditional IE comments if you need to support IE 7 and IE 6. */

window.onload = function() {
	function addIcon(el, entity) {
		var html = el.innerHTML;
		el.innerHTML = '<span style="font-family: \'Cumulus\'">' + entity + '</span>' + html;
	}
	var icons = {
			'Cumulus-Cloud' : '&#x21;',
			'Cumulus-Cloud-Sun' : '&#x22;',
			'Cumulus-Cloud-Moon' : '&#x23;',
			'Cumulus-Cloud-Rain' : '&#x24;',
			'Cumulus-Cloud-Rain-Sun' : '&#x25;',
			'Cumulus-Cloud-Rain-Moon' : '&#x26;',
			'Cumulus-Cloud-Snow' : '&#x27;',
			'Cumulus-Cloud-Snow-Sun' : '&#x28;',
			'Cumulus-Cloud-Snow-Moon' : '&#x29;',
			'Cumulus-Cloud-Lightning' : '&#x2a;',
			'Cumulus-Cloud-Lightning-Sun' : '&#x2b;',
			'Cumulus-Cloud-Lightning-Moon' : '&#x2c;',
			'Cumulus-Cloud-Wind' : '&#x2d;',
			'Cumulus-Cloud-Raindrop' : '&#x2e;',
			'Cumulus-Cloud-Raindrop-Sun' : '&#x2f;',
			'Cumulus-Cloud-Raindrop-Moon' : '&#x30;',
			'Cumulus-Cloud-Snowflake' : '&#x31;',
			'Cumulus-Cloud-Snowflake-Moon' : '&#x32;',
			'Cumulus-Cloud-Snowflake-Moon-2' : '&#x33;',
			'Cumulus-Clouds' : '&#x34;',
			'Cumulus-Cloud-Add' : '&#x35;',
			'Cumulus-Cloud-Remove' : '&#x36;',
			'Cumulus-Cloud-Warning' : '&#x37;',
			'Cumulus-Cloud-Fog' : '&#x38;',
			'Cumulus-Cloud-Fog-Sun' : '&#x39;',
			'Cumulus-Cloud-Fog-Moon' : '&#x3a;',
			'Cumulus-Cloud-2' : '&#x3b;',
			'Cumulus-Cloud-Sun-2' : '&#x3c;',
			'Cumulus-Cloud-Moon-2' : '&#x3d;',
			'Cumulus-Cloud-Rain-2' : '&#x3e;',
			'Cumulus-Cloud-Rain-Sun-2' : '&#x3f;',
			'Cumulus-Cloud-Rain-Moon-2' : '&#x40;',
			'Cumulus-Cloud-Snow-2' : '&#x41;',
			'Cumulus-Cloud-Snow-Sun-2' : '&#x42;',
			'Cumulus-Cloud-Snow-Moon-2' : '&#x43;',
			'Cumulus-Cloud-Lightning-2' : '&#x44;',
			'Cumulus-Cloud-Lightning-Sun-2' : '&#x45;',
			'Cumulus-Cloud-Lightning-Moon-2' : '&#x46;',
			'Cumulus-Cloud-Wind-2' : '&#x47;',
			'Cumulus-Cloud-Raindrop-2' : '&#x48;',
			'Cumulus-Cloud-Raindrop-Sun-2' : '&#x49;',
			'Cumulus-Cloud-Raindrop-Moon-2' : '&#x4a;',
			'Cumulus-Cloud-Snowflake-2' : '&#x4b;',
			'Cumulus-Cloud-Snowflake-Sun' : '&#x4c;',
			'Cumulus-Cloud-Snowflake-Moon-3' : '&#x4d;',
			'Cumulus-Clouds-2' : '&#x4e;',
			'Cumulus-Cloud-Add-2' : '&#x4f;',
			'Cumulus-Cloud-Remove-2' : '&#x50;',
			'Cumulus-Cloud-Warning-2' : '&#x51;',
			'Cumulus-Cloud-Arrow-Up' : '&#x52;',
			'Cumulus-Coud-Arrow-Down' : '&#x53;',
			'Cumulus-Cloud-Sync' : '&#x54;',
			'Cumulus-Cloud-Reload' : '&#x55;',
			'Cumulus-Sun' : '&#x56;',
			'Cumulus-Sun-2' : '&#x57;',
			'Cumulus-Sunrise' : '&#x58;',
			'Cumulus-Sunset' : '&#x59;',
			'Cumulus-Sunset-2' : '&#x5a;',
			'Cumulus-Sunset-3' : '&#x5b;',
			'Cumulus-Rainbow' : '&#x5c;',
			'Cumulus-Umbrella' : '&#x5d;',
			'Cumulus-Raindrops' : '&#x5e;',
			'Cumulus-Raindrop' : '&#x5f;',
			'Cumulus-Sunglasses' : '&#x60;',
			'Cumulus-Sunglasses-2' : '&#x61;',
			'Cumulus-Moon' : '&#x62;',
			'Cumulus-Moon-2' : '&#x63;',
			'Cumulus-Moon-Stars' : '&#x64;',
			'Cumulus-Moon-Stars-2' : '&#x65;',
			'Cumulus-Full-Moon' : '&#x66;',
			'Cumulus-Crescent' : '&#x67;',
			'Cumulus-Half-Moon' : '&#x68;',
			'Cumulus-Gibbous-Moon' : '&#x69;',
			'Cumulus-Moon-3' : '&#x6a;',
			'Cumulus-Gibbous-Moon-2' : '&#x6b;',
			'Cumulus-Half-Moon-2' : '&#x6c;',
			'Cumulus-Crescent-2' : '&#x6d;',
			'Cumulus-Stars' : '&#x6e;',
			'Cumulus-Thermometer' : '&#x6f;',
			'Cumulus-Thermometer-Low' : '&#x70;',
			'Cumulus-Thermometer-Quarter-Full' : '&#x71;',
			'Cumulus-Thermometer-Half-Full' : '&#x72;',
			'Cumulus-Thermometer-Three-Quarter-Full' : '&#x73;',
			'Cumulus-Thermometer-Full' : '&#x74;',
			'Cumulus-Fahrenheit' : '&#x75;',
			'Cumulus-Celsius' : '&#x76;',
			'Cumulus-Lightning' : '&#x77;',
			'Cumulus-Snowflake' : '&#x78;',
			'Cumulus-Compass' : '&#x79;',
			'Cumulus-Compass-2' : '&#x7a;',
			'Cumulus-Air-Sock' : '&#x7b;',
			'Cumulus-Wind-Wheel' : '&#x7c;',
			'Cumulus-Warning' : '&#x7d;',
			'Cumulus-Tornado' : '&#x7e;'
		},
		els = document.getElementsByTagName('*'),
		i, attr, html, c, el;
	for (i = 0; ; i += 1) {
		el = els[i];
		if(!el) {
			break;
		}
		attr = el.getAttribute('data-icon');
		if (attr) {
			addIcon(el, attr);
		}
		c = el.className;
		c = c.match(/Cumulus-[^\s'"]+/);
		if (c && icons[c[0]]) {
			addIcon(el, icons[c[0]]);
		}
	}
};