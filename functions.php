<?php

function decho( $s ) {
	echo '<pre>';
	echo print_r( $s, 1 );
	echo '</pre>';
}

function get_data( $s ) {
	switch ( $s ) {
		case '/topics':
			return array(
				'topics' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec iaculis feugiat mauris quis gravida. Praesent vitae fermentum diam. Nullam scelerisque nulla eget sollicitudin blandit. Mauris vulputate dui lacus, in fermentum ligula rutrum at. Praesent augue nisl, dignissim ut purus eu, tempor pellentesque odio. Phasellus a faucibus erat, sed tincidunt magna. Nullam blandit accumsan elit, et finibus risus tincidunt at. Aenean mollis scelerisque nulla a lacinia. Suspendisse id risus semper, congue nisl vulputate, interdum massa. Fusce auctor vestibulum varius. Donec ut luctus massa, ac vehicula lorem. Nam at felis ut arcu lacinia euismod. Praesent venenatis maximus nunc id mattis. Praesent sem dolor, placerat sed dolor posuere, rhoncus tempus neque. Proin tristique quam sit amet ultricies dignissim. Nullam at auctor lacus.',
			);

		case '/about':
			return array(
				'about' => 'Donec nibh ligula, tempus a tempor non, pulvinar sit amet turpis. Cras et dolor nec metus placerat facilisis in non magna. Sed at congue odio. Duis ut cursus elit, in iaculis nisl. Suspendisse nec elit et ligula pharetra sollicitudin. Pellentesque eget nulla nisl. Quisque ac ornare orci, a tempor risus. Donec pretium faucibus metus, a faucibus turpis rhoncus a. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Maecenas nec neque a turpis dapibus rutrum. Ut at magna id ante scelerisque laoreet. Nunc consectetur malesuada odio sit amet iaculis.',
			);

		default:
			return array();
	};
}

function ssr() {
	global $props, $rendered;

	$props = array();
	$props['data'] = get_data( $_SERVER['REQUEST_URI'] );
	$props['location'] = $_SERVER['REQUEST_URI'];
	$props = json_encode( $props );

	$v8    = new V8Js();
	$react = array();
	// stubs, react
	$react[] = 'var console = {warn: function(){}, error: print};';
	$react[] = 'var global = global || this, self = self || this, window = window || this;';
	// $react[] = file_get_contents( __DIR__ . '/test-app/node_modules/react/umd/react.production.min.js' );
	// $react[] = file_get_contents( __DIR__ . '/test-app/node_modules/react-dom/umd/react-dom.production.min.js' );
	// $react[] = file_get_contents( __DIR__ . '/test-app/node_modules/react-dom/umd/react-dom-server.browser.production.min.js' );
	// app's components
	$react[] = file_get_contents( __DIR__ . '/static/js/main.42952d76.js' );
	$react[] = 'var React = global.React, ReactDOM = global.ReactDOM, ReactDOMServer = global.ReactDOMServer;';
	$react[] = sprintf(
		'ReactDOMServer.renderToString(React.createElement(%s, %s))',
		'ServerApp',
	$props);
	$react[] = ';';

	try {
		// execute the js...
		$rendered = $v8->executeString( implode( ";\n", $react ) );
	} catch ( Exception $e ) {
		echo '<h1>', $e->getMessage(), '</h1>';
		echo '<pre>', $e->getTraceAsString(), '</pre>';
		exit;
	}

	return;
}
