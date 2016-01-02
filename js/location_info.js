var location_div = '#location_info';
var padding = 'style="padding-left: 30px;"';

function populate_data(id) {
  url = 'http://beta.puzzledpint.com/events/' + id + '/locations'
  console.log('getting data from..' + url);
  var jqxhr = $.ajax(url)
    .done(function(msg) {
      console.log('received: ');
      console.log(msg);
      render_locations(msg.locations);
    })
    .fail(function(msg) {
      console.log('something went wrong');
      $(location_div).html('<h1>An error as occured. Please contact GC\
         <a href="mailto:gamecontrol@puzzledpint.com">gamecontrol@puzzledpint.com</a></h1>');
    });
}

function render_locations(locations) {
  var locations_html = '';
  locations.forEach(function(location) {
    if (location.locations) {
      locations_html += render_parent_city(location)
    } else {
      locations_html += '<hr />';
      locations_html += render_bar_details(location);
    }
    console.log(location);
  });

  $(location_div).html(locations_html);
}

function render_bar_details(bar, child) {
  child = child || false;

  var view = city_name(bar.city, child);
  view += '<p class="p1"><strong>' + bar.start_time + '</strong><br /></p>';
  view += '<p class="p1">' + bar.notes + '</p>';

  var address = bar.address;

  view += '<p><strong>' + bar.bar + '<br />';
  view += address.street_1 + '<br />';
  if (address.street_2) {
    view += address.street_2 + '<br />';
  }
  view += address.city + ',' + address.state + ' ' + address.postal_code;
  view += '</strong></p>'

  return view;
}

function render_parent_city(city) {
  var view = '<hr />';
  view += '<p class="p1"><strong style="font-size: 1.5em;">' + city.city + '</strong></p>';
  city.locations.forEach(function(location) {
    view += '<div ' + padding + '>';
    view += render_bar_details(location, true);
    view += '</div>';
  });

  return view
}

function city_name(city, child) {
  if (child) {
    return '<h3><span style="text-decoration: underline;"><strong>' +
      city + '</strong></span></h3>';
  } else {
    return '<h2><strong>' + city +  '</strong></h2>';
  }
}

